@extends('agencies.template')
@section('sub_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Submit New Post</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/post/'.Auth::user()->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="client_name" class="col-md-4 col-form-label text-md-right">{{ __('Client\'s Name') }}</label>

                            <div class="col-md-6">
                                <input id="client_name" type="text" class="form-control @error('client_name') is-invalid @enderror" name="client_name" value="{{ old('client_name') }}" required autocomplete="client_name" autofocus>

                                @error('client_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="client_email" class="col-md-4 col-form-label text-md-right">{{ __('Client\'s E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="client_email" type="email" class="form-control @error('client_email') is-invalid @enderror" name="client_email" value="{{ old('client_email') }}" required autocomplete="client_email">

                                @error('client_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="post" class="col-md-4 col-form-label text-md-right">{{ __('Post') }}</label>

                            <div class="col-md-6">
                                <input id="post" type="file" class="form-control @error('post') is-invalid @enderror" name="post" value="{{ old('post') }}" required autocomplete="post">

                                @error('post')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="scheduled_at" class="col-md-4 col-form-label text-md-right">{{ __('Scheduled At') }}</label>

                            <div class="col-md-6">
                                <input id="scheduled_at" type="date" class="form-control @error('scheduled_at') is-invalid @enderror" placeholder="DD-MM-YYYY" min="{{date('Y-m-d')}}" name="scheduled_at" autocomplete="scheduled_at" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection