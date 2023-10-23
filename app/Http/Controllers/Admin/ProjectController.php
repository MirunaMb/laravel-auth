<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $projects = Project::paginate(10);
       return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make(
            $data,
            [
                'title' => 'required|string|max:75',
                'content'=>'required|string|max:75',
                'slug' => 'required|string|max:75',
                'created' => 'required|string|max:75',
                'updated' => 'required|string|max:75',
            ],
            [
                'title.required' => 'Il titolo è obbligatorio',
                'title.string' => 'Il titolo deve essere una stringa',
                'title.max' => 'Il titolo deve contenere meno di 75 caratteri',
                'content.required' => 'Il content è obbligatorio',
                'content.string' => 'Il content deve essere una stringa',
                'content.max' => 'Il content deve contenere meno di 75 caratteri',

                'slug.required' => 'Lo slug è obbligatorio',
                'slug.string' => 'Lo slug deve essere una stringa',
                'slug.max' => 'Lo slug deve contenere meno di 75 caratteri',
                'created.required' => 'Il campo "creato" è obbligatorio',
                'created.string' => 'Il campo "creato" deve essere una stringa',
                'created.max' => 'Il campo "creato" deve contenere meno di 75 caratteri',
                'updated.required' => 'Il campo "aggiornato" è obbligatorio',
                'updated.string' => 'Il campo "aggiornato" deve essere una stringa',
                'updated.max' => 'Il campo "aggiornato" deve contenere meno di 75 caratteri',
            ],
        );
        // Verifica se la validazione ha avuto successo
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Crea e salva un nuovo comic nel database
        $project = Project::create($data);

        // Reindirizza alla pagina di visualizzazione del comic appena creato
        return redirect()->route('admin.projects.show', $project->id);
    }

 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projects = Project::findOrfail($id); 
        return view('admin.projects.show', compact('projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
