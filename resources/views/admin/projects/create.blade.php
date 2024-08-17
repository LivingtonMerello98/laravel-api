@extends('layouts.admin') 


{{-- create projects --}}
@section('content')

    <div class="card bg-dark text-light border-0 py-2">
        <div class="card-header bg-secondary border-0">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link text-white border-0" href="{{ url('/admin/projects') }}">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-mute bg-dark text-light border-0" aria-current="true" href="{{ url('admin/projects/create') }}">Create New Project</a>
              </li>
            {{-- <li class="nav-item">
              <a class="nav-link disabled text-muted border-0" aria-disabled="true">Disabled</a>
            </li> --}}
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
                                <label for="url" class="text-white">Web-Site URL</label>
                                <input type="text" class="form-control" id="url" name="url" placeholder="url del sito" value="{{ old('url') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="title" class="text-white">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="nome del sito" value="{{ old('title') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="categories" class="text-white">Type:</label>
                                <select class="form-select" aria-label="Default select example" name="category_id">
                                    <option value="" disabled>seleziona categoria</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
        
                            <div class="form-group mb-3 d-flex justify-content-around flex-wrap">
                                @foreach ($technologies as $technology)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $technology->id }}" id="flexCheckDefault{{$technology->id}}" name="technology_id[]">
                                        <label class="form-check-label text-white" for="flexCheckDefault{{$technology->id}}">
                                            {{ $technology->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
        
                        </div>
        
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="description" class="text-white">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="7" placeholder="descrizione">{{ old('description') }}</textarea>
                            </div>
        
                            <div class="mb-3">
                                <label for="cover" class="form-label text-white">Cover image</label>
                                <input class="form-control" type="file" id="cover" name="cover">
                            </div>
                        </div>
                        
                        <div class="col-md-12 d-flex justify-content-start">
                            <button type="submit" class="btn btn-primary mt-3">Create</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
      </div>
      
@endsection
