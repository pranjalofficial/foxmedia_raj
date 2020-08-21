@extends('../layouts.app')
@section('content')
<div class="sidenav">
    <a href="{{url('/dashboard/admin/'.Auth::user()->id)}}">Dashboard</a>
    <a href="{{url('/manage/clients/'.Auth::user()->id)}}">Manage Clients</a>
    <a href="{{url('/manage/agencies/'.Auth::user()->id)}}">Manage Agencies</a>
    <a href="{{url('/manage/account_manager/'.Auth::user()->id)}}">Manage Account Managers</a>
    <a href="{{url('/manage/admins/'.Auth::user()->id)}}">Manage Admins</a>
    <a href="{{url('/profile/Admin/'.Auth::user()->id)}}">Edit Profile</a>
    <a href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
<div class="main">
    @include('layouts.messages')
    @yield('sub_content')
</div>
@endsection