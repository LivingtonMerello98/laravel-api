@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col mt-4">
                <div class="card bg-dark mb-5">
                    <div class="card-header text-white bg-dark bg-gradient ">{{ __('Dashboard') }}</div>

                    <div class="card-body bg-secondary">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div class="text-warning">
                                {{ __('You are logged in!') }}
                            </div>
                    </div>
                </div>
                <div class="card bg-dark">
                    <div class="card-header text-white bg-primary bg-gradient ">Welcome Back</div>

                    <div class="card-body bg-secondary">
                       <p class="text-white">Explore projects, edit, and create with complete freedom. Whether you're experimenting with new ideas or refining existing ones, you have the flexibility to shape your vision as you see fit!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
