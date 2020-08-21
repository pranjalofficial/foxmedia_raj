@extends('agencies.template')
@section('sub_content')
    <div class="container">
    @if(count($campaigns)>0)
        @foreach ($campaigns as $camp)
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-10">
                            <h5 class="card-title h5-responsive">{{$camp->client_name}}</h5>
                            <h6 class="card-text h6-responsive">{{$camp->strategy}}</h6>
                        </div>
                        <div class="col-sm-2">
                            <h5 class="h5-responsive">&#8377 {{$camp->cost}}</h5>
                            @if($camp->status=="Completed")
                                <h6 class="h6-responsive" style="color: green">Completed</h6>
                            @else
                                <h6 class="h6-responsive" style="color: warning">Active</h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="jumbotron">
            <h5 class="text-center h5-responsive font-weight-bold">No Campaigns yet!</h5>
        </div>
    @endif
    </div>
@endsection