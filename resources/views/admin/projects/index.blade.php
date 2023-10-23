@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="container text-center my-5">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-success">
            Crea nuovo progetto
        </a>
    </div>

    <h1 class="my-5">I miei progetti</h1>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Updated at</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td>{{ $project->title }}</td>
                            <td class="w-75">{{ $project->slug }}</td>
                            <td class="w-75">{{ $project->created_at }}</td>
                            <td class="w-75">{{ $project->updated_at }} <i class="fa-solid fa-eye"></i></td>
                            <td class="w-75">
                                <a href="{{ route('admin.projects.show', $project->id) }}">
                                    Show
                                </a>
                                {{-- <a class="btn btn-primary" href="{{ route('projects.edit', $project->id) }}"><i
                                            class="fa-solid fa-gear fa-bounce"></i>
                                    </a> --}}

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $projects->links('pagination::bootstrap-5') }}
    </div>
@endsection
