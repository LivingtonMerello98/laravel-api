@extends('layouts.admin')

{{-- categories show --}}

@section('content')

<div class="container mb-3">
    <div class="row">
        <div class="col-md-6">
            <div class="d-flex align-items-center mb-3">
                <a href="{{ url('admin/categories') }}" class="nav-link text-white bg-light-hover me-2">
                    <div class="bg-secondary d-flex align-items-center justify-content-center rounded-1 p-2">
                        <i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i>
                    </div>
                </a>
                <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-info btn-sm rounded-1">
                    <i class="fa-regular fa-eye" style="color: #ffffff;"></i>
                </a>
                <span class="fw-medium fs-3 text-light d-none d-md-inline-block mx-3">Category Show</span> 
            </div>
            <div class="col-md-10 mb-3">
                <p class="fw-light text-light">
                    Here you can see in detail <span class="fw-medium fst-italic">{{$category->title}}</span> category and modify or delete.
                </p>
            </div>
        </div>   
        <div class="col-md-6 d-flex justify-content-end">
            
        </div>
        <div class="col-md-12 mb-3">
            <p class="text-light fw-light">{{$category->description}}</p>
        </div>
        <div class="col-md-12 d-flex">
            <div class="action-group mb-3">
                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-warning rounded-1 me-1">
                    <i class="fa-solid fa-pencil" style="color: #ffffff;"></i>
                </a>
                <button type="submit" class="btn btn-danger btn-sm rounded-1" data-bs-toggle="modal"
                data-bs-target="#deleteModal{{ $category->id }}">
                <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                </button>
            </div>
        </div>
    </div>
</div>

@foreach ( $categories as $category )
        <!-- Modal per Conferma Cancellazione -->
        <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $category->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark text-light">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="deleteModalLabel{{ $category->id }}">Delete Confirmation</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="fw-light">Are you sure you want to delete the category <strong>{{ $category->title }}</strong>? This action cannot be undone.</p>
                    </div>
                    <hr class="text-light">
                    <div class="modal-footer text-left border-top-0">
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
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