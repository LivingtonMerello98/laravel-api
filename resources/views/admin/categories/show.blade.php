@extends('layouts.admin')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-white text-uppercase">Category</h3>
            <hr class="text-white">
            <p class="text-white text-uppercase">{{ $category->title}}</p>
        </div>
        <div class="col-md-12 d-flex">
            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning rounded-1 mx-2">
                <i class="fa-solid fa-pencil" style="color: #ffffff;"></i>
            </a>
            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger rounded-1">
                    <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                </button>
            </form>
        </div>
    </div>
</div>

@endsection