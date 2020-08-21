@extends('admin.template')
@section('sub_content')
<div class="container">
    <div class="row">
        <a href="/admin/Client" class="btn btn-primary" style="margin:5px;margin-left:15px;">Add New Client</a>
    </div>
    {{-- horizontal cards with the client's name and status on Lhs, edit and delete button on rhs --}}
    @if (count($clients)>0)
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">Name</th>
        <th scope="col">Contact Number</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($clients as $client)
        <tr>
            <th scope="row"><a href="{{url('/client/details/'.$client->id)}}">{{$client->name}}</a></th>
            <td>{{$client->phone_no}}</td>
            <td>
                <a href="{{url('/profile/Client/'.$client->id)}}" class="btn btn-warning">Edit</a>
                <form action="{{url('/clients/'.$client->id)}}" method="post" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>
    @else
        <div class="jumbotron">
            <h5 class="h5-responsive text-center font-weight-bold">No Clients Registered yet!</h5>
        </div>
    @endif
</div>
@endsection