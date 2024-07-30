@extends('layouts.admin')

{{-- create categories --}}

@section('content')
    <h3 class="text-white text-uppercase">crea nuova categoria</h3>

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

    <form action="{{route('admin.categories.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title" class="text-white">Categoria</label>
            <input type="text" name="title" id="title" class="form-control"  placeholder="nome della categoria">
        </div>
        <div class="col-md-12 d-flex justify-content-start">
            <button type="submit" class="btn btn-primary mt-3">Create</button>
        </div>
    </form>
@endsection