@extends('admin.template')
@section('sub_content')
<div class="container">
    <div class="row">
        <a href="/admin/addagency" class="btn btn-primary" style="margin:5px;margin-left:15px;">Add New Agency</a>
    </div>
    @if (count($agencies)>0)
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($agencies as $agency)
            <tr>
                <th scope="row"><a href="{{url('/agency/details/'.$agency->id)}}">{{$agency->company_name}}</a></th>
                <td><a href="{{url($agency->company_website)}}" target="_blank">{{$agency->company_website}}</a></td>
                <td>
                    <a href="{{url('/viaadmin/agency/'.$agency->id)}}" class="btn btn-warning">Edit</a>
                    <form action="{{url('/agencies/'.$agency->id)}}" method="post" style="display: inline-block;">
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
            <h5 class="h5-responsive text-center font-weight-bold">No Agencies Registered yet!</h5>
        </div>
    @endif
</div>
@endsection