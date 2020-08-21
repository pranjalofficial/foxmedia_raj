@extends('../layouts.app')
@section('content')
<div class="sidenav">
    <a href="{{url('/dashboard/account_manager/'.Auth::user()->id)}}">Dashboard</a>
    <a href="{{url('/clients/'.Auth::user()->id)}}">Manage Clients</a>
    <a href="{{url('/agencies/'.Auth::user()->id)}}">Manage Agencies</a>
    {{-- <a href="{{url('/notifications/account_manager/'.Auth::user()->id)}}">Notifications</a> --}}
    <a href="{{url('/profile/account_manager/'.Auth::user()->id)}}">Edit Profile</a>
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