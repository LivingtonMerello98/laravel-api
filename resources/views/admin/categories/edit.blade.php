@extends('layouts.admin')
{{-- category edit --}}

@section('content')


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

<div class="container ">
    <div class="row">
        <div class="col-md-6">
            <div class="d-flex align-items-center mb-3">
                <a href="{{ url('admin/categories') }}" class="nav-link text-white bg-light-hover me-2">
                    <div class="bg-secondary d-flex align-items-center justify-content-center rounded-1 p-2">
                        <i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i>
                    </div>
                </a>
                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning btn-sm rounded-1">
                    <i class="fa-solid fa-gear" style="color: #ffffff;"></i>
                </a>
                <span class="fw-medium fs-3 text-light d-md-inline-block mx-3">Category Editing</span> 
            </div>
            <div class="col-md-10">
                <p class="fw-light text-light">
                    In this area you can modify <span class="fw-medium fst-italic">{{$category->title}}</span> and update to your database.
                </p>
            </div>
        </div>   
        <div class="col-md-6 d-flex justify-content-end">
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.categories.update', $category->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group mb-3">
                    <label for="title" class="text-white fw-light mb-2">Category</label>
                    <input type="text" name="title" id="title" class="form-control bg-dark text-light border-secondary" value="{{ old('title', $category->title) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="description" class="text-light fw-light mb-2">Description</label>
                    <textarea name="description" id="description" class="form-control bg-dark text-light border-secondary" rows="7">{{ old('description', $category->description) }}</textarea>
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

@endsection

