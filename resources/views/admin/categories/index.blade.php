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
                <a href="{{ url('admin/categoriesn /create') }}" class="nav-link text-white bg-light-hover">
                    <div class="bg-secondary d-flex align-items-center justify-content-center rounded-1 p-2">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>

<div class="container">
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

        @foreach ($categories as $category)
            <p class="text-light">{{$category->title}}</p>
        @endforeach


        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
                </ul>
            </div>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

</div>
@endsection
