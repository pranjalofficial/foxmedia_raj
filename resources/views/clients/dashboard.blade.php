@extends('clients.template')
@section('sub_content')
    <div class="container">
        {{-- Posts for approval as a list of cards on jumbotron --}}
            {{-- Title: from which company --}}
            {{-- Subtitle: Scheduled for which date --}}
        {{-- All cards must be clickable. On click, open detail page --}}
            {{-- Photo/ video --}}
            {{-- From which company --}}
            {{-- Scheduled for datetime --}}
            {{-- Approve and Modify buttons --}}

        {{-- Approved Posts as a list of horizontal cards --}}
            {{-- LHS: image/video --}}
            {{-- Title: Company name  --}}
            {{-- Subtitle: Scheduled for datetime --}}
        {{-- @foreach ($posts as $post)
            @if($post->status=='Approved')
                <div class="alert alert-secondary shadow-soft mb-4 mb-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="sm-4">
                                    <img src="" alt="Image/Video" class="card-img">
                                </div>
                                <div class="col-sm-6">
                                    <h5 class="card-title h5-responsive">Agency: {{$post->agency_name}}</h5>
                                    <h6 class="card-text h6-responsive">Scheduled for: {{$post->scheduled_at}}</h6>
                                </div>
                                <div class="col-sm-2">
                                    <h6 class="h6-responsive">&#8377 {{$camp->cost}}</h6>
                                    <h6 class="h6-responsive" style="color: green">Approved</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach --}}
        <div class="row justify-content-center">
        <div class="alert alert-success alert-dismissible shadow-soft fade show" role="alert">
                    <span class="alert-inner--icon"><span class="fa fa-thumbs-up"></span></span>
                    <span class="alert-inner--text" style="font-size:40px;"><strong>Welcome!</strong> to your Dashboard.</span>
                    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
        </div>
    </div>
@endsection