@extends('layouts.admin')

{{-- create categories --}}

@section('content')
    <div class="container mb-3">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                    <span class="fw-medium fs-3 text-light d-none d-md-inline-block mx-3">Create a New Category</span> 
                </div>
                <div class="col-md-10">
                    <p class="fw-light text-light">
                    Create a New Category to which your Projects will belong
                    </p>
                </div>
            </div>               
            <div class="col-md-6 d-flex justify-content-end">
                <a href="{{ url('/admin/categories') }}"class="nav-link text-white bg-light-hover">
                    <div class="bg-secondary d-flex align-items-center justify-content-center rounded-1 p-2">
                        <i class="fa-solid fa-layer-group" style="color: #ffffff;"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    
    {{-- card --}}
    <div class="container">
        <div class="card bg-dark text-light border-0 py-1 col-md-12  shadow mb-5 rounded">
            {{-- header --}}
            <div class="card-header bg-secondary bg-gradient border-0">
              <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                  <a class="nav-link text-light fw-light border-0" aria-current="true" href="{{ url('/admin/categories') }}">Categories</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active bg-dark text-light fw-normal border-0" href="{{ url('admin/categories/create') }}">Create New Category</a>
                </li>
              </ul>
            </div>
        
            <div class="container-fluid py-3">
                <form action="{{ route('admin.categories.store') }}" method="POST" class="bg-dark p-3 rounded text-light">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title" class="text-light fw-light mb-2">Category</label>
                        <input type="text" name="title" id="title" class="form-control bg-dark text-light border-secondary" placeholder="Nome della categoria">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="description" class="text-light fw-light mb-2">Description</label>
                        <textarea name="description" id="description" class="form-control bg-dark text-light border-secondary" rows="5" placeholder="Category Description"></textarea>
                    </div>
                    
                    <div class="col-md-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mt-3 col-md-10">
                            <i class="fa-solid fa-file me-1" style="color: #ffffff;"></i>
                            Create
                        </button>
                    </div>
                </form>     
            </div>
        </div>
    </div>

@endsection