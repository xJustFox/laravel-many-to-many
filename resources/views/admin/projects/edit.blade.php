@extends('layouts.admin')

@section('content')
    <div class="container-fluid overflow-y-auto formProj">
        <div class="container w-50">
            <h1 class="my-4">Modify Project</h1>
            <form class="row" action="{{ route('admin.projects.update', $project->slug)}}" enctype="multipart/form-data" method="post" >
                @csrf
                @method('PUT')
    
                {{-- Name Proj --}}
                <div class="col-6 mt-3 ">
                    <label class="form-label my-label" for="nameProject">Name Project</label>
                    <input class="form-control form-control-sm @error('name') is-invalid border-danger @enderror" type="text" name="name" id="nameProject" aria-describedby="nameError" required value="{{$project['name']}}">
                    @error('name')
                        <div id="nameError" class="form-text text-danger">{{$message}}</div>
                    @enderror
                    @if ($error_message != null)
                    <div id="nameError" class="form-text text-danger">{{$error_message}}</div>
                    @endif
                </div>
    
                {{-- Link Proj --}}
                <div class="col-6 mt-3 ">
                    <label class="form-label my-label" for="linkProject">Link Project</label>
                    <input class="form-control form-control-sm @error('repository_link') is-invalid border-danger @enderror" type="text" name="repository_link" id="linkProject" aria-describedby="linkProjectError" required value="{{$project['repository_link']}}">
                    @error('repository_link')
                        <div id="linkProjectError" class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>
    
                {{-- Img Proj --}}
                <div class="col-6 mt-3 ">
                    <label class="form-label my-label" for="imgProject">Project Image</label>
                    <input class="form-control form-control-sm @error('img') is-invalid border-danger @enderror" accept="image/*" type="file" name="img" id="imgProject">
                    @if (Str::contains($project->img, 'https'))
                    <img class="my-2" src="{{ $project->img }}" alt="" width="200">
                    @else
                    <img class="my-2" src="{{asset('/storage/' . $project->img)}}" alt="" width="200">
                    @endif
                    @error('img')
                        <div id="imgProject" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Select Type --}}
                <div class="col-6 mt-3 ">
                    <label class="form-label my-label" for="typeProject">Project Type</label>
                    <select class="form-select form-select-sm @error('type_id') is-invalid border-danger @enderror" name="type_id" id="typeProject">
                        <option value="{{old('type_id')}}" selected>Select type</option>
                        @foreach ($types as $type)
                        <option value="{{$type->id}}" @selected($type->id == old('type_id', $project->type ? $project->type->id : ''))>{{$type->name}}</option>  
                        @endforeach

                    </select>
                    @error('type_id')
                        <div id="dateStartError" class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>
    
                {{-- Date Start Proj --}}
                <div class="col-6 mt-3 ">
                    <label class="form-label my-label" for="startDateProject">Start Date Project</label>
                    <input class="form-control form-control-sm @error('date_start') is-invalid border-danger @enderror" type="date" name="date_start" id="startDateProject" aria-describedby="startDateError" required value="{{$project['date_start']}}">
                    @error('date_start')
                        <div id="dateStartError" class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>
    
                {{-- Date End Proj --}}
                <div class="col-6 mt-3 ">
                    <label class="form-label my-label" for="endDateProject">End Date Project</label>
                    <input class="form-control form-control-sm @error('date_end') is-invalid border-danger @enderror" type="date" name="date_end" id="endDateProject" aria-describedby="endDateError" value="{{$project['date_end']}}">
                    @error('date_end')
                        <div id="dateEndError" class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>

                {{-- Technology Proj --}}
                <div class="col-12 mt-3 ">
                    <label class="form-label my-label">Project Technology</label>
                    <div>
                        @foreach ($technologies as $technology)
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" name="technologies[]" id="tech-{{$technology->id}}" value="{{$technology->id}}" {{$project->technologies->contains($technology->id) ? 'checked' : ''}}>
                                <label for="" class="form-check-label ms-1 badge rounded-pill text-black" style="background-color: {{$technology->color}}">{{$technology->name}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                {{-- Desctiption Proj --}}
                <div class="col-12 mt-3 ">
                    <label class="form-label my-label" for="descriptionProject">Project Description</label>
                    <textarea class="form-control form-control-sm @error('description') is-invalid border-danger @enderror" name="description" id="descriptionProject" cols="30" rows="10" aria-describedby="descriptionError" required>{{$project['description']}}</textarea>
                    @error('description')
                        <div id="descriptionError" class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="col-12 mt-3 text-end">
                    <button class="btn btn-sm btn-primary" type="submit">Modify</button>
                </div>
            </form>
        </div>
    </div>
@endsection