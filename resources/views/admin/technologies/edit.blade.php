@extends('layouts.admin')

{{-- technologies edit --}}

@section('content')
    <div class="container mb3">
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
        </div>
    </div>

    <div class="container mb-3">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <a href="{{ url('admin/technologies') }}" class="nav-link text-white bg-light-hover me-2">
                        <div class="bg-secondary d-flex align-items-center justify-content-center rounded-1 p-2">
                            <i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i>
                        </div>
                    </a>
                    <a href="{{ route('admin.technologies.edit', $technology->id) }}" class="btn btn-warning btn-sm rounded-1">
                        <i class="fa-solid fa-gear" style="color: #ffffff;"></i>
                    </a>
                    <span class="fw-medium fs-3 text-light d-none d-md-inline-block mx-3">Technology Editing</span> 
                </div>
                <div class="col-md-10">
                    <p class="fw-light text-light">
                        In this area you can modify <span class="fw-medium fst-italic">{{$technology->title}}</span> and update to your database.
                    </p>
                </div>
            </div>   
            <div class="col-md-6 d-flex justify-content-end">
            </div>
        </div>

        <div class="card bg-dark text-light border-0 shadow mb-5 rounded">

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

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.technologies.update', $technology->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group mb-3 col-auto">
                                <label for="name" class="text-light fw-light mb-2">edit</label>
                                <input type="text" class="form-control bg-dark text-light border-secondary" id="name" name="name" value="{{ old('name', $technology->name) }}" required>
                            </div>
                            <div class="col-auto d-flex justify-content-center py-4">
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



@endsection



{{-- <div class="col-md-7">
    <h3 class="text-white text-uppercase">Edit technology</h3>
    <form action="{{ route('admin.technologies.update', $technology->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group mb-3 col-md-6">
            <label for="name" class="text-white">edit</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $technology->name) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div> --}}