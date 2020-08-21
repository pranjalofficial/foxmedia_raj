@extends('admin.template')
@section('sub_content')
<div class="container">
    <div class="row">
        <a href="/admin/Account_Manager" class="btn btn-primary" style="margin:5px;margin-left:15px;">Add New Manager</a>
    </div>
    @if (count($account_managers)>0)
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($account_managers as $account_manager)
            <tr>
                <th scope="row"><a href="{{url('/acc_manager/details/'.$account_manager->id)}}">{{$account_manager->name}}</a></th>
                <td>{{$account_manager->phone_no}}</td>
                <td>
                    <a href="{{url('/profile/Account_Manager/'.$account_manager->id)}}" class="btn btn-warning">Edit</a>
                    <form action="{{url('/account_managers/'.$account_manager->id)}}" method="post" style="display: inline-block;">
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
            <h5 class="h5-responsive text-center font-weight-bold">No Managers Registered yet!</h5>
        </div>
    @endif
</div>
@endsection