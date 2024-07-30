@extends('layouts.admin')

{{-- technologies show --}}
@section('content')

    {{-- da ritoccare --}}

    <p class="text-white">{{ $technology->name }}</p>
    
    
     @foreach ($technology->projects as $project)
        <ul>
            <li class="text-white">{{$project->title}}</li>
        </ul>
    @endforeach

@endsection