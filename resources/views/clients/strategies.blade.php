@extends('clients.template')
@section('sub_content')
    <div class="container">
        <div class="row">
            <a href="/strategy/new_inside" class="btn btn-primary" style="margin:15px;margin-left:15px;">Add New Strategy</a>
        </div>
        @if(count($strategies)>0)
            
            @foreach ($strategies as $strategy)
                <a href="{{url('/strategy/show/'.$strategy->id)}}">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
                    <div class="card bg-primary shadow-soft border-light mb-6">
                        <div class="card-body px-5 py-5 text-center text-md-left">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="mb-3">For: {{$strategy->company_name}}</h2>
                                    <h6 class="card-text h6-responsive">Budget: &#x20B9;{{$strategy->budget}}</h6>
                                </div>
                                <div class="col-sm-2">
                                    @if ($strategy->status=='In-process')
                                    <div class="progress-wrapper">
                                        <div class="progress-info">
                                            <div class="progress-label">
                                                <span class="text-info">In-process</span>
                                            </div>
                                            <div class="progress-percentage">
                                                <span>Intial</span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="progress-wrapper">
                                        <div class="progress-info">
                                            <div class="progress-label">
                                                <span class="text-success">Approved</span>
                                            </div>
                                            <div class="progress-percentage">
                                                <span>100%</span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
            {{-- Keep all cards clickable, on click, redirect to detail page. --}}
                {{-- If approved, don't show all responses,only show the approved response --}}
                {{-- If not approved, show all responses with approved and reject button --}}
        @else
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="alert alert-secondary alert-dismissible shadow-soft fade show" role="alert">
                    <span class="alert-inner--icon"><span class="fas fa-exclamation-circle"></span></span>
                    <span class="alert-inner--text"><strong>No!</strong> Stratigies yet in the dashboard.</span>
                    <button type="button" class="close text-dark" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
    </div>    
@endsection