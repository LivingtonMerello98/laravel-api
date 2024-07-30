@extends('layouts.admin')

{{-- category index --}}
@section('content')
<div class="container">
    <div class="container d-flex mb-5">
        <div class="col-md-6">
            <h3 class="text-uppercase text-white card-header">categories</h3>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <a href="" class="btn btn-secondary rounded-1 mx-4">
                <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
            </a>
        </div>
    </div>
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
    
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th class="text-uppercase">#</th>
                <th class="text-uppercase">title</th>
                <th class="text-uppercase text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>
                        {{ $counter++}}
                    </td>
                    <td>
                        <div>
                            <p class="text-white fw-bolder">{{ $category->title }}</p>
                            <ul>
                                @foreach ($category->projects as $project)
                                    <li>{{ $project->title }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-info rounded-1">
                            <i class="fa-regular fa-eye" style="color: #ffffff;"></i>
                        </a>
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning rounded-1">
                            <i class="fa-solid fa-pencil" style="color: #ffffff;"></i>
                        </a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-1">
                                <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-md-12 d-flex justify-content-end">
        {{$categories->links('vendor.pagination.bootstrap-5')}}
    </div>

</div>
@endsection
