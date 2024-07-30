@extends('layouts.admin')

{{-- technologies create --}}
@section('content')
    <div class="container py-5 mx-3">

        <h3 class="text-white text-uppercase mb-3">Create new Technology</h3>

        <div class="col-md-12">
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

        <form action="{{ route('admin.technologies.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group mb-3 col-md-6">
                    <label for="name" class="text-white">Insert new Technology</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="ex: Vue.js" value="{{ old('name') }}">
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-start">
                <button type="submit" class="btn btn-primary mt-3">Create</button>
            </div>
        </form>
        
    </div>
@endsection