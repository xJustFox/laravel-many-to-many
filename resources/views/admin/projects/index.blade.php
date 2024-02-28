@extends('layouts.admin')

@section('content')
    <div class="rightMain px-3 overflow-y-auto ">
        <div class="d-flex justify-content-between align-items-center ">
            <h2 class="fs-4 my-4 px-3 ">
                {{ __('My Projects') }}
            </h2>

            <a class="btn btn-sm btn-primary mx-3" href="{{ route('admin.projects.create') }}">
                <i class="fa-solid fa-folder-plus px-1"></i>
                Add Project
            </a>

        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th class="text-center" scope="col">type</th>
                    <th scope="col">description</th>
                    <th class="text-center" scope="col">command</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project['id'] }}</th>
                        <td>{{ $project['name'] }}</td>
                        <td class="text-center">{{ $project->type ? $project->type->name : 'Without type' }}</td>
                        <td>{{ Str::limit($project['description'], 50) }}</td>
                        <td class="d-flex justify-content-center ">
                            <a href="{{ route('admin.projects.show', ['project' => $project->slug]) }}"
                                class="btn btn-sm btn-primary">
                                <i class="fa-solid fa-eye fa-xs"></i>
                            </a>
                            <a href="{{route('admin.projects.edit', $project->slug) }}" class="btn btn-sm btn-warning mx-2 ">
                                <i class="fa-solid fa-pen-to-square fa-xs"></i>
                            </a>
                            {{-- <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare questo progetto?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa-solid fa-trash-can fa-xs"></i>
                                </button>
                            </form> --}}
                            <button class="btn btn-sm btn-danger delete-button" data-bs-toggle="modal" data-bs-target="#modal_delete" data-path="projects" data-slug="{{ $project->slug }}">
                                <i class="fa-solid fa-trash-can fa-xs"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('partials.modal_delete')
@endsection
