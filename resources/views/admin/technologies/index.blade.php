@extends('layouts.admin')

{{-- technologies index --}}

@section('content')
    <div class="container mb-3">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <i class="fa-solid fa-microchip" style="color: #ffffff;"></i>
                    <span class="fw-medium fs-3 text-light d-none d-md-inline-block mx-3">Technologies</span> 
                </div>
                <div class="col-md-10">
                    <p class="fw-light text-light">
                        Welcome to the Technologies Area. Here, you can easily manage all your projects.
                    </p>
                </div>
            </div>   
            <div class="col-md-6 d-flex justify-content-end">
                <a href="{{ url('admin/technologies/create') }}" class="nav-link text-white bg-light-hover">
                    <div class="bg-secondary d-flex align-items-center justify-content-center rounded-1 p-2">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>

    {{-- card --}}
    <div class="container">
        <div class="card bg-dark text-light border-0 py-1 col-md-12 shadow mb-5 rounded">
            {{-- header --}}
            <div class="card-header bg-secondary bg-gradient border-0">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active bg-dark text-light fw-normal border-0" aria-current="true" href="{{ url('/admin/technologies') }}">
                            Technologies
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fw-light border-0" href="{{ url('admin/technologies/create') }}">
                            Create New Technology
                        </a>
                    </li>
                </ul>
            </div>

            <div class="container-fluid py-3">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="container">
                    @foreach ($technologies as $technology)
                        <div class="d-flex justify-content-between align-items-center bg-dark text-light p-3 mb-3 rounded shadow ">
                            <div class="flex-grow-1">
                                <h5 class="mb-0 text-capitalize fw-normal fw-light">{{ $technology->name }}</h5>
                            </div>
                            <div class="d-flex">
                                {{-- show --}}
                                <a href="{{ route('admin.technologies.show', $technology->id) }}" class="btn btn-info btn-sm me-2 rounded-1">
                                    <i class="fa-regular fa-eye" style="color: #ffffff;"></i>
                                </a>
                                {{-- settings --}}
                                <a href="{{ route('admin.technologies.edit', $technology->id) }}" class="btn btn-warning btn-sm me-2 rounded-1">
                                    <i class="fa-solid fa-gear" style="color: #ffffff;"></i>
                                </a>
                                {{-- modal --}}
                                <button type="submit" class="btn btn-danger btn-sm rounded-1" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $technology->id }}">
                                    <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach

                    {{-- paginatore --}}
                    {{-- <div class="d-flex justify-content-end">
                        {{$technologies->links('vendor.pagination.bootstrap-5')}}
                    </div> --}}
                </div>

                {{-- Modal per Conferma Cancellazione --}}
                @foreach ($technologies as $technology)
                    <div class="modal fade" id="deleteModal{{ $technology->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $technology->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content bg-dark text-light">
                                <div class="modal-header border-bottom-0 text-bg-danger">
                                    <h5 class="modal-title" id="deleteModalLabel{{ $technology->id }}">Delete Confirmation</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="fw-light">Are you sure you want to delete the technology <strong>{{ $technology->name }}</strong>? This action cannot be undone.</p>
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

            </div>
        </div>
    </div>
@endsection
