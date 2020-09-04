@extends('layouts.app')
@section('content')
    @include('layouts.messages')

    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&family=Staatliches&display=swap" rel="stylesheet">
    </head>
    <header class="header-global">
    <nav id="navbar-main" aria-label="Primary navigation" class="navbar navbar-main navbar-expand-lg navbar-theme-primary headroom navbar-light">
        <div class="container position-relative">
            <a class="navbar-brand shadow-soft py-2 px-3 rounded border border-light mr-lg-4" href="#">
            <!-- <img class="navbar-brand-light" src={{ asset('img/logo.png') }} alt="Fox Media Logo">  -->
               The FOX Media
            </a>
            <div class="d-flex align-items-center">
                <a href="{{url('/logins')}}" target="_blank" class="btn btn-primary d-none d-md-inline-block"><i class="fa fa-book"></i>Log In</a>
                <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
</header>




<main>      
        <!-- Hero -->
        <section class="section section bg-soft pb-5 overflow-hidden z-2">
            <div class="container z-2">
                <div class="row justify-content-center text-center pt-6">
                    <div class="col-lg-8 col-xl-8">
                        <h1 class="display-2 mb-3"><img src={{ asset('img/logo1.png') }} alt="Fox Media Logo" style="margin: 0;top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);"></h1>                       
                    </div>
                </div>
            </div>
            <div class="card-body pt-2 px-0 px-lg-7" style="-ms-transform: translateY(-30%);transform: translateY(-30%);">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8">
                                <form action="/sendmail" method="post">
                                    @csrf
                                    <div class="form-group">
                                    <h2 id="emailHelp" class="form-text text-muted text-center">Looking for a <strong>Digital Marketing</strong>  Strategy? We'll help you.</h2>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter your email here">                                        <small id="emailHelp" class="form-text text-muted text-center">We'll never share your email with anyone else.You will recieve an Email from us attached with password and login page link.</small>
                                        <div class="text-center" style="margin:10px;">
                                            <button type="submit" class="btn btn-lg btn-primary">Sign Up!</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
            </div>
        </section>
    </main>



    
@endsection