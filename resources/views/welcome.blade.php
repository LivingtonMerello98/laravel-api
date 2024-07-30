@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-dark rounded-3">
        <div class="container py-5">

            <h1 class="display-5 fw-bold text-white">
                Welcome to Laravel+Bootstrap
            </h1>

            <p class="col-md-8 fs-4 text-white">Using a series of utilities, you can create this jumbotron, just like the one in
                previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your
                liking.</p>
            <button class="btn btn-secondary btn-lg" type="button">Example button</button>
        </div>
    </div>

    <div class="content bg-dark">
        <div class="container bg-dark">
            <p class="text-white">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi
                deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis
                accusamus dolores!</p>
        </div>
    </div>
@endsection
