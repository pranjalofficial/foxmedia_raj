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
            <a class="navbar-brand shadow-soft py-2 px-3 rounded border border-light mr-lg-4" href="../../index.html">
            <!-- <img class="navbar-brand-light" src={{ asset('img/logo.png') }} alt="Fox Media Logo">  -->
               The FOX Media
            </a>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="../../index.html" class="navbar-brand shadow-soft py-2 px-3 rounded border border-light">
                                <img class="navbar-brand-light" src="" alt="Logo dark">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <a href="#navbar_global" class="fas fa-times" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" title="close" aria-label="Toggle navigation"></a>
                        </div>
                    </div>
                </div>
            </div>
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
                    <div class="col-lg-6 col-xl-6" style="top:-60px;">
                        <!-- <h1 class="display-2 mb-3" style="font-family:Russo One;">Fox Media</h1> -->
                        <img src={{ asset('img/logo1.png') }} alt="Fox Media Logo" style="top:100px;"> 
                        <p class="lead px-md-6 mb-5" style="font-family:Roboto;">Fox media provides you with the best <strong>digital marketing</strong> strategicies and connection that your company requires.</p>
                        <div class="d-flex flex-column flex-wrap flex-md-row justify-content-md-center mb-5">
                            <ul class="d-flex list-unstyled mb-5 mb-lg-0">
                            <li class="mr-2">
                                <a href="https://twitter.com/themesberg" target="_blank" class="btn btn-icon-only btn-pill btn-primary" aria-label="twitter social link"
                                data-toggle="tooltip" data-placement="top" title="Follow @themesberg on Twitter">
                                    <span aria-hidden="true" class="fa fa-twitter"></span>
                                </a>
                            </li>
                            <li class="mr-2">
                                <a href="https://www.facebook.com/themesberg/" target="_blank" class="btn btn-icon-only btn-pill btn-primary" aria-label="facebook social link"
                                data-toggle="tooltip" data-placement="top" title="Like @themesberg on Facebook">
                                    <span aria-hidden="true" class="fa fa-facebook"></span>
                                </a>
                            </li>
                            <li class="mr-2">
                                <a href="https://github.com/themesberg" target="_blank" class="btn btn-icon-only btn-pill btn-primary" aria-label="github social link"
                                data-toggle="tooltip" data-placement="top" title="Open source projects">
                                    <span aria-hidden="true" class="fa fa-github"></span>
                                </a>
                            </li>
                            <li>
                                <a href="https://dribbble.com/themesberg" target="_blank" class="btn btn-icon-only btn-pill btn-primary" aria-label="dribbble social link"
                                data-toggle="tooltip" data-placement="top" title="Follow us on Dribbble">
                                    <span aria-hidden="true" class="fa fa-dribbble"></span>
                                </a>
                            </li>
                        </ul>  
                    </div>
                </div>
                <div class="col-6 col-lg-4 mb-5 mb-lg-0">
                    <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_xprXnu.json"  background="transparent"  speed="1" style ="width:500px; height:300px;" loop  autoplay></lottie-player>
                </div>  
                </div>
            </div>
        </section>

</main>

                    <div class="card-body px-5 py-5 text-center text-md-left">
                        <div class="row align-items-center">
            <div class="col-12">
                <div class="card bg-primary shadow-soft border-light px-4 py-5">
                    <div class="card-header pb-0 text-center">
                        <h2 class="h1 mb-3">Get the most out of your network.</h2>
                        <p class="mb-5 lead">
                            Contact management designed for teams and individuals
                        </p>
                    </div>
                    <div class="card-body pt-2 px-0 px-lg-7">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8">
                                <form action="/sendmail" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <div class="text-center">
                                            <label for="exampleInputEmail1"><h5 class="font-weight-bold">Looking for a Digital Marketing Strategy? We'll help you</h5></label>
                                        </div>
                                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter your email here">
                                        <small id="emailHelp" class="form-text text-muted text-center">We'll never share your email with anyone else.You will recieve an Email from us attached with password and login page link.</small>
                                        <div class="text-center" style="margin:10px;">
                                            <button type="submit" class="btn btn-lg btn-primary">Sign Up!</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


        <!-- <form action="/sendmail" method="post">
            @csrf
            <div class="form-group">
                <div class="text-center">
                    <label for="exampleInputEmail1"><h5 class="font-weight-bold">Looking for a Business Strategy? We'll help you</h5></label>
                </div>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter your email here">
                <small id="emailHelp" class="form-text text-muted text-center">We'll never share your email with anyone else.</small>
                <div class="text-center" style="margin:10px;">
                    <button type="submit" class="btn btn-lg btn-primary">Subscribe</button>
                </div>
            </div>
        </form> -->
    </div>



    
@endsection