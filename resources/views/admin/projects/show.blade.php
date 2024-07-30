@extends('layouts.admin') 

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-5 d-flex justify-content-center align-items-center">
                {{-- test --}}
                @if ($project->cover)   
                    <div style="width: 70%; height:auto;">
                        <img src="{{asset('storage/'. $project->cover)}}" style="width: 100%;min-width: 50px;border-radius:0.5rem"" alt="">
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <h3 class="text-white text-uppercase mb-3">{{ $project->title }}</h3>

                <p class="text-white">{{ $project->description }}</p>

                <p class="text-white">
                    <strong>Category: </strong>
                    {{ $project->category ? $project->category->title : 'Categoria non definita' }}
                </p>

                <h5 class="text-white">Tecnologie Utilizzate:</h5>
                @if ($project->technologies->isNotEmpty())
                    <ul>
                        @foreach ($project->technologies as $technology)
                            <li class="text-white">{{ $technology->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-white">Nessuna tecnologia utilizzata.</p>
                @endif
                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning rounded-1">
                    <i class="fa-solid fa-pencil" style="color: #ffffff;"></i>
                </a>

                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger rounded-1">
                        <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection



