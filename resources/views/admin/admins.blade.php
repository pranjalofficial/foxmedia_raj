@extends('admin.template')
@section('sub_content')
<div class="container">
    <div class="row">
        <a href="/admin/Admin" class="btn btn-primary" style="margin:5px;margin-left:15px;">Add New Admin</a>
    </div>
    @if (count($admins)>0)
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($admins as $admin)
            <tr>
                <th scope="row">{{$admin->name}}</th>
                <td>{{$admin->email}}</td>
                <td>
                    <a href="{{url('/profile/Admin/'.$admin->id)}}" class="btn btn-warning">Edit</a>
                    <form action="{{url('/admins/'.$admin->id)}}" method="post" style="display: inline-block;">
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
            <h5 class="h5-responsive text-center font-weight-bold">No Admins Registered yet!</h5>
        </div>
    @endif
</div>
@endsection