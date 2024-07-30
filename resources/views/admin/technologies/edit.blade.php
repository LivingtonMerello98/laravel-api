@extends('layouts.admin')

{{-- technologies edit --}}
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
            <div class="col-md-7">
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
            </div>
        </div>
    </div>
@endsection