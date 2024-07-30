@extends('layouts.admin')


{{-- projects index --}}
@section('content')
<div class="container">
    <div class="container d-flex mb-5">
        <div class="col-md-6">
            <h3 class="text-uppercase text-white card-header">projects</h3>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-secondary rounded-1 mx-4">
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
                {{-- <th class="text-uppercase">#</th> --}}
                <th class="text-uppercase">Image</th>
                <th class="text-uppercase">Title</th>
                <th class="text-uppercase text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    {{-- <td>
                        {{ $counter++}}
                    </td> --}}
                    <td>
                        <div>
                            @if ($project->cover)
                                <img src="{{asset('storage/'. $project->cover)}}" alt="" class="w-100" style="max-width: 50px; min-width: 50px;">
                            @endif
                        </div>
                    </td>
                    <td>
                        <div>
                            <p class="text-white fw-bolder">{{ $project->title }}</p>
                            <p class="text-white">
                                <strong>Category: </strong>
                                {{ $project->category ? $project->category->title : 'Categoria non definita' }}
                            </p>
                        </div>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-info rounded-1">
                            <i class="fa-regular fa-eye" style="color: #ffffff;"></i>
                        </a>
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning rounded-1">
                            <i class="fa-solid fa-pencil" style="color: #ffffff;"></i>
                        </a>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
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
    {{-- paginatore --}}
    <div class="col-md-12 d-flex justify-content-end">
        {{$projects->links('vendor.pagination.bootstrap-5')}}
    </div>
</div>
@endsection
