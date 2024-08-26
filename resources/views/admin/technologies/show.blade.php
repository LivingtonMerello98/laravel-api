@extends('layouts.admin')

{{-- technologies show --}}
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="d-flex align-items-center mb-3">
                <a href="{{ url('admin/technologies') }}" class="nav-link text-white bg-light-hover me-2">
                    <div class="bg-secondary d-flex align-items-center justify-content-center rounded-1 p-2">
                        <i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i>
                    </div>
                </a>
                <a href="{{ route('admin.technologies.show', $technology->id) }}" class="btn btn-info btn-sm rounded-1">
                    <i class="fa-regular fa-eye" style="color: #ffffff;"></i>
                </a>
                <span class="fw-medium fs-3 text-light d-none d-md-inline-block mx-3">Technology Show</span> 
            </div>
            <div class="col-md-10 mb-3">
                <p class="fw-light text-light">
                    Here you can see in detail <span class="fw-medium fst-italic">{{$technology->name}}</span> technology and modify or delete.
                </p>
            </div>
        </div>   
        <div class="col-md-6 d-flex justify-content-end">
            
        </div>

        <div class="col-md-12">

            <div class="card mb-3 border-secondary" style="width: auto;">
                <div class="card-header bg-secondary border-secondary">
                    <span class="fw-light text-light">Projects in which this technology is used</span>
                </div>
                <ul class="list-group list-group-flush">
                    @if ($technology->projects->isNotEmpty())
                        @foreach ($technology->projects as $project)
                            <li class="list-group-item bg-dark fw-light text-light border-secondary">{{ $project->title }}</li>
                        @endforeach
                    @else
                        <li class="list-group-item text-danger fw-light bg-dark border-secondary">No Project assigned</li>
                    @endif
                </ul>
            </div>

            <div class="action-group mb-3">
                {{-- settings --}}
                <a href="{{ route('admin.technologies.edit', $technology->id) }}" class="btn btn-warning btn-sm rounded-1">
                    <i class="fa-solid fa-gear" style="color: #ffffff;"></i>
                </a>
                {{-- modal for delete --}}
                <button type="submit" class="btn btn-danger btn-sm rounded-1" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $technology->id }}">
                    <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                </button>
            </div>

        </div>
    </div>
</div>
    

@foreach ($technologies as $technology)
<!-- Modal per Conferma Cancellazione -->
<div class="modal fade" id="deleteModal{{ $technology->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $technology->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="deleteModalLabel{{ $technology->id }}">Delete Confirmation</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="fw-light">Are you sure you want to delete the technology <strong>{{$technology->name }}</strong>? This action cannot be undone.</p>
            </div>
            <hr class="text-light">
            <div class="modal-footer text-left border-top-0">
                <form action="{{ route('admin.technologies.destroy', $technology->id) }}" method="POST" style="display:inline-block;">
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
