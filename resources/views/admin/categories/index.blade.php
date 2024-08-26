@extends('layouts.admin')

{{-- category index --}}
@section('content')

    <div class="container mb-3">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <i class="fa-solid fa-layer-group" style="color: #ffffff;"></i>
                    <span class="fw-medium fs-3 text-light text-capitalize d-none d-md-inline-block mx-3">categories</span> 
                </div>
                <div class="col-md-10">
                    <p class="fw-light text-light">
                        Welcome to the Categories Area. Here, you can easily manage all your categories.
                    </p>
                </div>
            </div>   
            <div class="col-md-6 d-flex justify-content-end">
                <a href="{{ url('admin/categories/create') }}" class="nav-link text-white bg-light-hover">
                    <div class="bg-secondary d-flex align-items-center justify-content-center rounded-1 p-2">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>

<div class="container">

        <div class="card bg-dark text-light border-0 py-1 col-md-12  shadow mb-5 rounded">
            {{-- header --}}
            <div class="card-header bg-secondary bg-gradient border-0">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active bg-dark text-light fw-normal border-0" aria-current="true" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fw-light border-0 fw-capitalize" href="{{ url('admin/categories/create') }}">Create New Category</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="container py-3">
                        {{-- errors handler --}}
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
                    
                    <div class="row justify-content-start"  style="overflow-y: scroll; overflow-x:hidden; max-height: 50vh; scrollbar-width: none; -ms-overflow-style: none; -webkit-overflow-scrolling: touch;">
                        @if ($categories && count($categories) > 0)
                            @foreach ( $categories as $category )
                                <div class="card text-white bg-dark mb-3 border-0 shadow" style="width:100%;">
                                    <span class="card-header text-bg-success fw-medium">{{ $category->title}}</span>
                                    <div class="card-body">
                                        <p class="card-text fw-light">{{$category->description ?? 'no description have been set'}}</p>
                                        <hr class="text-white">
                                        <div class="text-end">
                                            <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-info btn-sm rounded-1">
                                                <i class="fa-regular fa-eye" style="color: #ffffff;"></i>
                                            </a>
                                            {{-- settings --}}
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning btn-sm rounded-1">
                                                <i class="fa-solid fa-gear" style="color: #ffffff;"></i>
                                            </a>

                                            {{-- modal for delete --}}
                                            <button type="submit" class="btn btn-danger btn-sm rounded-1" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $category->id }}">
                                                <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @else

                            <div class="container">
                                <div class="col-md-12">
                                    <p class="text-light fw-light fst-italic">You haven't created categories yet</p>
                                </div>
                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>

        @foreach ( $categories as $category )
                <!-- Modal per Conferma Cancellazione -->
                <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $category->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-dark text-light">
                            <div class="modal-header text-bg-danger border-bottom-0">
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

</div>
@endsection
