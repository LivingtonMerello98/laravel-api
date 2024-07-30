@extends('layouts.admin')

{{-- technologies index --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-white text-uppercase">technologies</h3>
            </div>
            <div class="col-md-12">
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

            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th class="text-uppercase">#</th>
                        <th class="text-uppercase">Technology</th>
                        <th class="text-uppercase text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology)
                        <tr>
                            <td>
                                {{ $counter++}}
                            </td>
                            <td>
                                <div>
                                    <p class="text-white text-uppercase">{{ $technology->name }}</p>
                                </div>
                            </td>

                            
                            <td class="text-center">
                                <a href="{{ route('admin.technologies.show', $technology->id) }}" class="btn btn-info rounded-1">
                                    <i class="fa-regular fa-eye" style="color: #ffffff;"></i>
                                </a>
                                
                                <a href="{{ route('admin.technologies.edit', $technology->id) }}" class="btn btn-warning rounded-1">
                                    <i class="fa-solid fa-pencil" style="color: #ffffff;"></i>
                                </a>

                                <form action="{{ route('admin.technologies.destroy', $technology->id) }}" method="POST" style="display:inline-block;">
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



        </div>
    </div>
@endsection