@extends('layouts.admin') 

{{-- edit projects --}}
@section('content')
<div class="container py-5">
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
        <div class="col-md-5 d-flex justify-content-center align-items-center">
            <div style="width: 90%; height:auto;">
                <img src="{{asset('storage/'. $project->cover)}}" style="width: 100%;border-radius:0.5rem"" alt="">
            </div>
        </div>
        <div class="col-md-7">
            <h3 class="text-white text-uppercase">Edit Project</h3>
            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group mb-3">
                    <label for="url" class="text-white">Url del sito</label>
                    <input type="text" name="url" id="url" class="form-control" value="{{ old('url', $project->url) }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="title" class="text-white">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $project->title) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="categories" class="text-white">Type:</label>
                    <select class="form-select" aria-label="Default select example" name="category_id">
                        <option value="" disabled>seleziona categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{ old('category_id', $project->category_id) == $category->id ? 'selected' : '' }}>{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="description" class="text-white">Description</label>
                    <textarea name="description" id="description" class="form-control " rows="7">{{ old('description', $project->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="cover" class="form-label text-white">Cover image</label>
                    <input class="form-control" type="file" id="cover" name="cover">
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

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
