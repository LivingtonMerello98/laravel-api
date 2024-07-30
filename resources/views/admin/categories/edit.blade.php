@extends('layouts.admin')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <h3 class="text-white text-uppercase">edit category</h3> 
           <hr class="text-white">
           
            <form action="{{ route('admin.categories.update', $category->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group mb-3">
                    <label for="title" class="text-white text-uppercase">categoria</label>
                    <input type="title" name="url" id="title" class="form-control" value="{{ old('title', $category->title) }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>
</div>

@endsection

