@extends('agencies.template')
@section('sub_content')
    <div class="container">
        <div class="row">
            <a href="/posts/new" class="btn btn-primary" style="margin:5px;margin-left:15px;">Submit New Post</a>
        </div>
    @if(count($posts)>0)
        @foreach ($posts as $post)
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="" alt="post ka image" class="card-img">
                        </div>
                        <div class="col-sm-6">
                            <h5 class="card-title h5-responsive">{{$post->client_name}}</h5>
                            <h6 class="card-text h6-responsive">{{$post->scheduled_at}}</h6>
                        </div>
                        <div class="col-sm-2">
                            @if($post->status=="Approved")
                                <h6 class="h6-responsive" style="color: green">Approved</h6>
                            @else
                                <h6 class="h6-responsive" style="color: warning">Modify</h6>
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