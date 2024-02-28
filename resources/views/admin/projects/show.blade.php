@extends('layouts.admin')

@section('content')
<div class=" w-100 overflow-y-auto">
    <div class="container-lg mt-3 detailesPrj">
        @if ($project['img'] != null)
            @if (Str::contains($project->img, 'https'))
            <img class="float-end mx-2" src="{{ $project->img }}" alt="">
            @else
            <img class="float-end mx-2" src="{{asset('/storage/' . $project->img)}}" alt="">
            @endif
        @else
            <img class="float-end mx-2" src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg" alt="">
        @endif
        <h1>{{$project['name']}}</h1>
        {{-- Technology --}}
        <div class="my-2">
            @forelse ($project->technologies as $technology)
                <span class="badge rounded-pill text-black" style="background-color: {{$technology->color}}">{{$technology->name}}</span>
            @empty
            There are no technologies
            @endforelse
        </div>
        <p>{{$project['description']}}</p>
        {{-- Type --}}
        <div>
            Type: 
            @if ($project->type)
                {{$project->type->name}}
            @else
                Without type
            @endif
        </div>
        {{-- Start/End Project --}}
        <div>
            <span>
                Start Project:
                {{$project['date_start']}}
            </span>
            &VerticalSeparator;
            <span>
                End Project:
                @if ($project['date_end'] != null)
                    {{$project['date_end']}} 
                @else
                    In progress...
                @endif
            </span>
        </div>
        <div class="text-end mt-4">
            <a class="px-2" href="{{$project['repository_link']}}">Link Repository</a>
        </div>
    </div>
</div>
@endsection