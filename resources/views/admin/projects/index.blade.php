@extends('layouts.admin')


{{-- projects index --}}
@section('content')

<div class="card bg-dark text-light border-0 py-2">
    {{-- header --}}
    <div class="card-header bg-secondary border-0">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link active bg-dark text-light border-0" aria-current="true" href="{{ url('/admin/projects') }}">Projects</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white border-0" href="{{ url('admin/projects/create') }}">Create New Project</a>
        </li>
      </ul>
    </div>


    <div class="py-5">
        <div class="container-fluid py-2">
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
    </div>
</div>

@endsection
