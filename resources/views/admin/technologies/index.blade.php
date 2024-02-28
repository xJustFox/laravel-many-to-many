@extends('layouts.admin')

@section('content')
    <div class="rightMain px-3 overflow-y-auto ">
        <div class="d-flex justify-content-between align-items-center ">
            <h2 class="fs-4 my-4 px-3 ">
                {{ __('Technologies') }}
            </h2>

            <a class="btn btn-sm btn-primary mx-3" href="{{ route('admin.technologies.create') }}">
                <i class="fa-solid fa-square-plus px-1"></i>
                Add Technologies
            </a>

        </div>

        <table class="table text-center ">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">color</th>
                    <th scope="col">projects</th>
                    <th scope="col">command</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($technologies as $technology)
                    <tr>
                        <th scope="row">{{ $technology->id }}</th>
                        <td>{{ $technology->name }}</td>
                        <td>
                            <i class="fa-solid fa-square" style="color: {{$technology->color}};"></i>
                            {{ $technology->color }}
                        </td>
                        <td>{{ count($technology->projects) }}</td>
                        <td class="d-flex justify-content-center ">
                            <a href="{{route('admin.technologies.edit', $technology->slug) }}" class="btn btn-sm btn-warning me-2">
                                <i class="fa-solid fa-pen-to-square fa-xs"></i>
                            </a>

                            <button class="btn btn-sm btn-danger delete-button" data-bs-toggle="modal" data-bs-target="#modal_delete" data-path="technologies" data-slug="{{ $technology->slug }}">
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
