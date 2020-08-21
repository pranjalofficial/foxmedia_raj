@extends('account_manager.template')
@section('sub_content')
<div class="container">
    <div class="row">
        <a href="/addagency" class="btn btn-primary" style="margin:5px;margin-left:15px;">Add New Agency</a>
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
            @foreach ($agencies as $agency)
                
            <tr>
                <th scope="row">{{$agency->name}}</th>
                <td>{{$agency->email}}</td>
                <td>{{$agency->phone_no}}</td>
                <td>{{$agency->status}}</td>
            </tr>
            
            @endforeach
        </tbody>  
    </table>
</div>    
@endsection