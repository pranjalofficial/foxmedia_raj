@extends('agencies.template')
@section('sub_content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h4 class="card-title">&#8377 {{$done}}</h4>
                    <h5 class="card-text">Paid Amount</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h4 class="card-title">&#8377 {{$due}}</h4>
                    <h5 class="card-text">Due Amount</h5>
                </div>
            </div>
        </div>
    </div>

    {{-- Other details if Raj asks to put, like GST number and all. --}}
</div>
@endsection