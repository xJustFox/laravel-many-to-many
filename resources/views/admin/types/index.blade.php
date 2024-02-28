@extends('layouts.admin')

@section('content')
    <div class="rightMain px-3 overflow-y-auto ">
        <div class="d-flex justify-content-between align-items-center ">
            <h2 class="fs-4 my-4 px-3 ">
                {{ __('Types') }}
            </h2>

            <a class="btn btn-sm btn-primary mx-3" href="{{ route('admin.types.create') }}">
                <i class="fa-solid fa-square-plus px-1"></i>
                Add Types
            </a>

        </div>

        <table class="table text-center ">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">project</th>
                    <th scope="col">last edit</th>
                    <th scope="col">command</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <th scope="row">{{ $type->id }}</th>
                        <td>{{ $type->name }}</td>
                        <td>{{ count($type->projects) }}</td>
                        <td>{{ $type->updated_at }}</td>
                        <td class="d-flex justify-content-center ">
                            <a href="{{route('admin.types.edit', $type->slug) }}" class="btn btn-sm btn-warning me-2">
                                <i class="fa-solid fa-pen-to-square fa-xs"></i>
                            </a>

                            <button class="btn btn-sm btn-danger delete-button" data-bs-toggle="modal" data-bs-target="#modal_delete" data-path="types" data-slug="{{ $type->slug }}">
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
