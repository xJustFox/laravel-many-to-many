@extends('layouts.admin')

@section('content')
    <div class="container-fluid overflow-y-auto formProj">
        <div class="container w-25">
            <h1 class="my-4">Modify Type</h1>
            <form class="row" action="{{ route('admin.types.update', $type->slug)}}" method="post">
                @csrf
                @method('PUT')
    
                {{-- Name Type --}}
                <div class="col-12 mt-3 ">
                    <label class="form-label my-label" for="nameType">Name Type</label>
                    <input class="form-control form-control-sm @error('name') is-invalid border-danger @enderror" type="text" name="name" id="nameType" aria-describedby="nameError" required value="{{$type['name']}}">
                    @error('name')
                        <div id="nameError" class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="col-12 mt-3 text-end">
                    <button class="btn btn-sm btn-primary" type="submit">Modify</button>
                </div>
            </form>
        </div>
    </div>
@endsection