@extends('layouts.admin') 


{{-- create projects --}}
@section('content')

    <div class="container mb-3">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                    <span class="fw-medium fs-3 text-light d-none d-md-inline-block mx-3">Create a New Project</span> 
                </div>
                <div class="col-md-10">
                    <p class="fw-light text-light">
                       Start a new project to showcase in your portfolio.
                    </p>
                </div>
            </div>               
            <div class="col-md-6 d-flex justify-content-end">
                <a href="{{ url('/admin/projects') }}"class="nav-link text-white bg-light-hover">
                    <div class="bg-secondary d-flex align-items-center justify-content-center rounded-1 p-2">
                        <i class="fa-solid fa-diagram-project" style="color: #ffffff;"></i>
                    </div>
                </a>
            </div>
            
        </div>
    </div>

    <div class="card bg-dark text-light border-0 py-2  shadow mb-5 rounded">
        <div class="card-header bg-secondary border-0">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link text-white text-light fw-light border-0" href="{{ url('/admin/projects') }}">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active bg-dark text-light fw-normal border-0" aria-current="true" href="{{ url('admin/projects/create') }}">Create New Project</a>
              </li>
          </ul>
        </div>
        <div class="card-body">

            {{-- contenuto --}}
            <div class="container py-5 mx-3">
                {{-- <h3 class="text-white text-uppercase mb-3">Create New Project</h3> --}}
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="url" class="text-light fw-light mb-2">Web-Site URL</label>
                                <input type="text" class="form-control bg-dark text-light border-secondary" id="url" name="url" placeholder="url del sito" value="{{ old('url') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="title" class="text-light fw-light mb-2">Title</label>
                                <input type="text" name="title" id="title" class="form-control bg-dark text-light border-secondary" placeholder="nome del sito" value="{{ old('title') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="categories" class="text-light fw-light mb-2">Type:</label>
                                <select class="form-select bg-dark text-light border-secondary" aria-label="Default select example" name="category_id">
                                    <option value="" disabled>seleziona categoria</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                
                            <div class="form-group mb-3 d-flex justify-content-between flex-wrap">
                                <label for="technology_id[]" class="text-light fw-light mb-2">Technologies:</label>
                                @foreach ($technologies as $technology)
                                    <div class="form-check">
                                        <input class="form-check-input bg-dark text-light border-secondary" type="checkbox" value="{{ $technology->id }}" id="flexCheckDefault{{$technology->id}}" name="technology_id[]">
                                        <label class="form-check-label text-light fw-light mb-2" for="flexCheckDefault{{$technology->id}}">
                                            {{ $technology->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                
                        </div>
                
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="description" class="text-light fw-light mb-2">Description</label>
                                <textarea name="description" id="description" class="form-control bg-dark text-light border-secondary" rows="5" placeholder="descrizione">{{ old('description') }}</textarea>
                            </div>
                
                            <div class="mb-3">
                                <label for="cover" class="form-label text-light fw-light mb-2">Cover image</label>
                                <input class="form-control bg-dark text-light border-secondary" type="file" id="cover" name="cover">
                            </div>
                        </div>
                        
                        <div class="col-md-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mt-3 col-md-10">
                                <i class="fa-solid fa-file me-1" style="color: #ffffff;"></i>
                                Create
                            </button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
      </div>
      
@endsection
