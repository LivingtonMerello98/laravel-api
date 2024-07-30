@extends('layouts.guest')

@section('about')

<section class="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12 py-5 justify-content-center d-flex flex-wrap">

                <div class="col-md-8 text-center">
                    <h3 class="text-white py-3 text-uppercase">About Me</h3>
                </div>

                <div class="col-md-6 text-center mb-3">
                    <p class="text-white fs-6 fw-lighter">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur dicta, veniam tenetur est possimus placeat, nulla sit corrupti quos qui minima voluptas. Molestias beatae earum voluptates. Quia accusantium aliquid dolorum.</p>
                </div>

                <div class="col-md-8 d-flex cart text-center mb-3">
                    <div class="col-md-6 py-4 d-flex flex-column px-5">

                        <div class=" col-md-12 d-flex justify-content-end mb-4">
                            <div class="img-container-sm">
                                <img src="https://avatars.githubusercontent.com/u/162736759?v=4" alt="Profile Image" class="img">
                            </div>
                        </div>

                        <div class="col-md-12 d-flex flex-column align-items-end ">
                            <p class="text-white mb-3"><span class="text-success block">FullName: </span>Livington Merello</p>

                            <p class="text-white mb-3"><span class="text-success block">Birthday: </span>26 sept 1998</p>

                            <p class="text-white mb-3"><span class="text-success block">Number: </span>+39 13345678</p>

                            <p class="text-white mb-3"><span class="text-success block">Email: </span>livington@gmail.com</p>
                        </div>
                        
                    </div> 

                    <div class="col-md-6 py-4 text-start px-3">
                        <h5 class="text-uppercase text-white mb-4">
                            skills
                        </h5>

                        <div class="label mb-3">
                            <p class="text-white mb-2 language text-uppercase">html/css</p>
                            <div class=" col-md-8 rounded-2 bg-success">
                                <p class="text-white percentage mx-2">90%</p>
                            </div>
                        </div>
                        <div class="label mb-3">
                            <p class="text-white mb-2 language text-uppercase">js</p>
                            <div class=" col-md-5 rounded-2 bg-success">
                                <p class="text-white percentage mx-2">90%</p>
                            </div>
                        </div>
                        <div class="label mb-3">
                            <p class="text-white mb-2 language text-uppercase">php</p>
                            <div class=" col-md-6 rounded-2 bg-success">
                                <p class="text-white percentage mx-2">90%</p>
                            </div>
                        </div>
                        <div class="label mb-3">
                            <p class="text-white mb-2 language text-uppercase">wordpress</p>
                            <div class=" col-md-6 rounded-2 bg-success">
                                <p class="text-white percentage mx-2">90%</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
    
@endsection

@section('content')

    <section class="content">
        <div class="container py-5">
            <div class="col-md-12 mb-5 text-center">
                <h3 class=" text-uppercase text-white title">portfolio</h3>
            </div>

            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-md-4">
                        <div class=" custom-card mb-4">
                            @if ($project->cover)
                                <img src="{{asset('storage/'. $project->cover)}}" alt="{{$project->title}}" class="card-img-top" >
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $project->title }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>

    </section>

@endsection



@section('contact')

<section class="contact">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12 text-center mb-3">
                <h3 class="text-white text-uppercase">Contacts</h3>
            </div>

            <div class="col-md-6 py-2">
                <form action="" method="post">

                    <div class="form-group mb-3 mx-2">
                        <label for="name" class="text-white">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                    </div>

                    <div class="form-group mb-3 mx-2">
                        <label for="email" class="text-white">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                    </div>
                </form>
            </div>

            <div class="col-md-6 py-2 ">
                <form action="" method="post">

                    <div class="form-group mb-3 mx-2">
                        <label for="subject" class="text-white">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter the subject">
                    </div>

                    <div class="form-group mb-3 mx-2">
                        <label for="phone" class="text-white">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                    </div>
                </form>
            </div>

            <div class="col-md-12 py-2">
                <form action="" method="post">

                    <div class="form-group mb-4 mx-2">
                        <label for="message" class="text-white">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Enter your message"></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Send Message</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

@endsection

