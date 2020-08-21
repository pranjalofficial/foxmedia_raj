@extends('account_manager.template')
@section('sub_content')
<div class="container">
    <div class="row">
        <a href="/addclient" class="btn btn-primary" style="margin:5px;margin-left:15px;">Add New client</a>
    </div>
    <table class="table table-striped" style="margin: 20px auto;">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                
            <tr>
                <th scope="row">{{$client->name}}</th>
                <td>{{$client->email}}</td>
                <td>{{$client->phone_no}}</td>
                <td>{{$client->status}}</td>
            </tr>
            
            @endforeach
        </tbody>  
    </table>
</div>    
@endsection