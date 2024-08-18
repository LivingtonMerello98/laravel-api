@extends('layouts.admin') 

@section('content')
    
    {{-- column --}}

    <div class="container mb-3">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <a href="{{ url('admin/projects') }}" class="nav-link text-white bg-light-hover me-2">
                        <div class="bg-secondary d-flex align-items-center justify-content-center rounded-1 p-2">
                            <i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i>
                        </div>
                    </a>
                    <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-info btn-sm rounded-1">
                        <i class="fa-regular fa-eye" style="color: #ffffff;"></i>
                    </a>
                    <span class="fw-medium fs-3 text-light d-none d-md-inline-block mx-3">Project Show</span> 
                </div>
                <div class="col-md-10">
                    <p class="fw-light text-light">
                        Here you can see in detail <span class="fw-medium fst-italic">{{$project->title}}</span> project and modify or delete.
                    </p>
                </div>
            </div>   
            <div class="col-md-6 d-flex justify-content-end">
                
                <div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex justify-content-center align-items-center">
                {{-- test --}}
                @if ($project->cover)   
                    <div style="width: 100%; height:auto;" class="shadow">
                        <img src="{{asset('storage/'. $project->cover)}}" style="width: 100%;min-width: 50px;border-radius:0.5rem"" alt="{{$project->title}}">
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <div class="card text-white bg-dark border-0 border-secondary">
                    {{-- <div class="card-header bg-secondary bg-gradient">
                      <span class="fw-light">lorem ipsum</span>
                    </div> --}}
                    <div class="card-body">
                        <div class="title-group d-flex">

                            <div class="col-md-6">
                                <span class="fw-medium fs-5 text-light d-none d-md-inline-block ">{{ $project->title }}</span>
                            </div>

                            <div class="col-md-6 text-end">
                                <span class="badge text-bg-primary mb-3">{{ $project->category ? $project->category->title : 'Categoria non definita' }}</span>
                            </div>
                        </div>
                        <hr class="tex-light mb-3">

                        <p class="text-light fw-light mb-5">
                            {{ $project->description }}
                        </p>
        
                        {{-- <p class="fw-light fs-6 text-light d-none d-md-inline-block mb-3">
                            Category:
                            <span class="fs-6 fw-normal">{{ $project->category ? $project->category->title : 'Categoria non definita' }}</span>
                        </p> --}}
        
                        <div class="card mb-3 border-secondary" style="width: auto;">
                            <div class="card-header bg-secondary border-secondary">
                                <span class="fw-light text-light">Technologies</span>
                            </div>
                            <ul class="list-group list-group-flush">
                                @if ($project->technologies->isNotEmpty())
                                    @foreach ($project->technologies as $technology)
                                        <li class="list-group-item bg-dark fw-light text-light border-secondary">{{ $technology->name }}</li>
                                    @endforeach
                                @else
                                    <li class="list-group-item text-white bg-dark border-secondary">Nessuna tecnologia utilizzata.</li>
                                @endif
                            </ul>
                        </div>
                        

                        <div class="action-group mb-3">
                            {{-- settings --}}
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning btn-sm rounded-1">
                                <i class="fa-solid fa-gear" style="color: #ffffff;"></i>
                            </a>
                            {{-- modal for delete --}}
                            <button type="submit" class="btn btn-danger btn-sm rounded-1" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $project->id }}">
                                <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                            </button>
                        </div>
                  </div>
                  
            </div>
        </div>
    </div>



    @foreach ($projects as $project)
        <!-- Modal per Conferma Cancellazione -->
        <div class="modal fade" id="deleteModal{{ $project->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $project->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark text-light">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="deleteModalLabel{{ $project->id }}">Delete Confirmation</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="fw-light">Are you sure you want to delete the project <strong>{{ $project->title }}</strong>? This action cannot be undone.</p>
                    </div>
                    <hr class="text-light">
                    <div class="modal-footer text-left border-top-0">
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded-1">
                                <i class="fa-solid fa-trash" style="color: #ffffff;"></i> Delete
                            </button>
                        </form>
                        <button type="button" class="btn btn-secondary btn-sm rounded-1" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection



