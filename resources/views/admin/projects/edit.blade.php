@extends('layouts.admin')


{{-- edit projects --}}
@section('content')
<div class="container mb-3">
    <div class="row">
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
        {{-- window --}}
        <div class="container ">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex align-items-center mb-3">
                        <a href="{{ url('admin/projects') }}" class="nav-link text-white bg-light-hover me-2">
                            <div class="bg-secondary d-flex align-items-center justify-content-center rounded-1 p-2">
                                <i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i>
                            </div>
                        </a>
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning btn-sm rounded-1">
                            <i class="fa-solid fa-gear" style="color: #ffffff;"></i>
                        </a>
                        <span class="fw-medium fs-3 text-light d-none d-md-inline-block mx-3">Project Editing</span> 
                    </div>
                    <div class="col-md-10">
                        <p class="fw-light text-light">
                            In this area you can modify <span class="fw-medium fst-italic">{{$project->title}}</span> and update to your database.
                        </p>
                    </div>
                </div>   
                <div class="col-md-6 d-flex justify-content-end">
                </div>
            </div>
        </div>
        <div class="card bg-dark text-light border-0 shadow mb-5 rounded">
            {{-- header --}}
            {{-- <div class="card-header bg-secondary bg-gradient border-0">
                    <span class="fw-medium fs-6 text-light d-none d-md-inline-block mx-3">Project Editing</span> 
            </div> --}}
        
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
            </div>

            {{-- colonne --}}
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
    
                            <div class="form-group mb-3">
                                <label for="url" class="text-light fw-light mb-2">Url del sito</label>
                                <input type="text" name="url" id="url" class="form-control bg-dark text-light border-secondary" value="{{ old('url', $project->url) }}" required>
                            </div>
    
                            <div class="form-group mb-3">
                                <label for="title" class="text-light fw-light mb-2">Title</label>
                                <input type="text" name="title" id="title" class="form-control bg-dark text-light border-secondary" value="{{ old('title', $project->title) }}" required>
                            </div>
    
    
                            <div class="mb-3">
                                <label for="cover" class="form-label text-light fw-light mb-2">Cover image</label>
                                <input class="form-control bg-dark text-light border-secondary" type="file" id="cover" name="cover">
                            </div>
                    </div>
    
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        <div style="width: 45%; height:auto;">
                            <img src="{{ $project->cover }}" style="width: 100%; border-radius:0.5rem" alt="Project Cover Image">
                        </div>
                    </div>
    
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="description" class="text-light fw-light mb-2">Description</label>
                            <textarea name="description" id="description" class="form-control bg-dark text-light border-secondary" rows="7">{{ old('description', $project->description) }}</textarea>
                        </div>
                
                        <div class="form-group mb-3">
                            @if ($categories->isNotEmpty())
                                <label for="categories" class="text-light fw-light mb-2">Categories:</label>
                                <select class="form-select bg-dark text-light border-secondary" aria-label="Default select example" name="category_id">
                                    <option value="" class="fw-light text-sceondary">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $project->category_id) == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            @else
                                <p class="text-danger fw-light text-decoration-underline">There are not Category yet.</p>
                            @endif

                        </div>
                
                        <div class="form-group mb-3 d-flex justify-content-between flex-wrap">
                            @if ($technologies-> isNotEmpty())
                                <label for="technology_id[]" class="text-light fw-light mb-2">Technologies:</label>
                                @foreach ($technologies as $technology) 
                                    <div class="form-check">
                                        <input class="form-check-input bg-dark text-light border-secondary" type="checkbox" value="{{ $technology->id }}" id="flexCheckDefault{{ $technology->id }}" name="technology_id[]" 
                                        {{ in_array($technology->id, old('technology_id', $project->technologies->pluck('id')->toArray())) ? 'checked' : '' }}>
                                        <label class="form-check-label text-white" for="flexCheckDefault{{ $technology->id }}">
                                            {{ $technology->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-danger fw-light text-decoration-underline">There are not Technologies yet.</p>
                            @endif
                        </div>
                            <div class="col-md-12 d-flex justify-content-center py-4">
                                <button type="submit" class="btn text-dark bg-warning col-md-10">
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                    Update
                                </button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
