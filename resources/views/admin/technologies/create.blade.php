@extends('layouts.admin')

@section('content')
    <div class="container-fluid overflow-y-auto formProj">
        <div class="container w-25">
            <h1 class="my-4">Add Technology</h1>
            <form class="row" action="{{ route('admin.technologies.store')}}" method="post">
                @csrf
    
                {{-- Name Technology --}}
                <div class="col-10 mt-3 ">
                    <label class="form-label my-label" for="nameTechnology">Name Technology</label>
                    <input class="form-control form-control-sm @error('name') is-invalid border-danger @enderror" type="text" name="name" id="nameTechnology" aria-describedby="nameError" required value="{{ old('name') }}">
                    @error('name')
                        <div id="nameError" class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>

                {{-- Color Technology --}}
                <div class="col-2 mt-3 ">
                    <label class="form-label my-label" for="colorTechnology" >Color</label>
                    <input class="form-control form-control-sm @error('color') is-invalid border-danger @enderror" type="color" name="color" id="colorTechnology" aria-describedby="colorError" required value="{{ old('color') }}">
                    @error('color')
                        <div id="colorError" class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="col-12 mt-3 text-end">
                    <button class="btn btn-sm btn-primary" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection