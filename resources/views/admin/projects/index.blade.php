@extends('layouts.admin')


{{-- projects index --}}
@section('content')
<div class="container mb-3">
    <div class="row">
        <div class="col-md-6">
            <div class="d-flex align-items-center mb-3">
                <i class="fa-solid fa-diagram-project" style="color: #ffffff;"></i>
                <span class="fw-medium fs-3 text-light d-none d-md-inline-block mx-3">Projects</span> 
            </div>
            <div class="col-md-10">
                <p class="fw-light text-light">
                    Welcome to the Projects Area. Here, you can easily manage all your projects.
                </p>
            </div>
        </div>   
        <div class="col-md-6 d-flex justify-content-end">
            <a href="{{ url('admin/projects/create') }}" class="nav-link text-white bg-light-hover">
                <div class="bg-secondary d-flex align-items-center justify-content-center rounded-1 p-2">
                    <i class="fa-solid fa-plus"></i>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="container">
    <div class="card bg-dark text-light border-0 py-1 col-md-12  shadow mb-5 rounded">
        {{-- header --}}
        <div class="card-header bg-secondary bg-gradient border-0">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link active bg-dark text-light fw-normal border-0" aria-current="true" href="{{ url('/admin/projects') }}">Projects</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light fw-light border-0" href="{{ url('admin/projects/create') }}">Create New Project</a>
            </li>
          </ul>
        </div>
    
        <div>
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
            
                <div class="container">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                {{-- <th class="text-uppercase">#</th> --}}
                                <th class="text-uppercase fw-light">cover</th>
                                <th class="text-uppercase fw-light">Name</th>
                                <th class="text-uppercase fw-light text-center">Options</th>
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
                                            <p class="text-white fw-normal text-capitalize">{{ $project->title }}</p>
                                        </div>
                                    </td>
                                    {{-- cta --}}
                                    <td class="text-center">
                                        {{-- show --}}
                                        <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-info btn-sm rounded-1">
                                            <i class="fa-regular fa-eye" style="color: #ffffff;"></i>
                                        </a>
                                        {{-- settings --}}
                                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning btn-sm rounded-1">
                                            <i class="fa-solid fa-gear" style="color: #ffffff;"></i>
                                        </a>
                                        {{-- modal for delete --}}
                                        <button type="submit" class="btn btn-danger btn-sm rounded-1" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $project->id }}">
                                            <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                                        </button>
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
    </div>
</div>

@foreach ($projects as $project)
    <!-- Modal per Conferma Cancellazione -->
    <div class="modal fade" id="deleteModal{{ $project->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $project->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-light">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="deleteModalLabel{{ $project->id }}">Delete Confirmation</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="fw-light">Are you sure you want to delete the project <strong>{{ $project->title }}</strong>? This action cannot be undone.</p>
                </div>
                <hr class="text-light">
                <div class="modal-footer text-left border-top-0">
                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm rounded-1">
                            <i class="fa-solid fa-trash" style="color: #ffffff;"></i> Delete
                        </button>
                    </form>
                    <button type="button" class="btn btn-secondary btn-sm rounded-1" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endforeach



<div class="container">
    <div class="row justify-content-between">
        <div class="col-md-12 mb-3">
            <h3 class="fw-medium text-light mb-3">Explore Categories</h3> 
            <div class="col-md-10">
                <p class="fw-light text-light">
                   Here you can find all project's categories.
                </p>
            </div>
        </div>

        @foreach ( $projects as $project )
        <div class="card bg-dark border-0 shadow p-3 mb-5 rounded text-light col-md-3 ">
            <img src="https://i0.wp.com/plopdo.com/wp-content/uploads/2021/07/Screenshot-1.png?resize=1210%2C642&ssl=1" alt="">
          <div class="card-body">
            <h4 class="fw-normal">{{$project->category->title}}</h4>
            <p class="card-text fw-light">{{$project->category->updated_at}}</p>
            <a href="#" class="btn bg-primary bg-gradient text-light">Go somewhere</a>
          </div>
        </div>
        @endforeach

    </div>
</div>

@endsection
