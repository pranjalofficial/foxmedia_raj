@extends('../layouts.app')
@section('content')

<!-- <div class="sidenav">
    <div class="nav-wrapper position-relative">
        <div class="nav nav-pills nav-fill flex-column flex-sm-row">
    <a data-toggle="tab" href="{{url('/dashboard/clients/'.Auth::user()->id)}}">Dashboard</a>
    <a href="{{url('/campaigns/clients/'.Auth::user()->id)}}">Manage Campaigns</a>
    <a href="{{url('/reports/clients/'.Auth::user()->id)}}">Reports</a>
    {{-- <a href="{{url('/notifications/clients/'.Auth::user()->id)}}">Notifications</a> --}}
    <a href="{{url('/strategies/clients/'.Auth::user()->id)}}">Manage Strategies</a>
    <a href="{{url('/account/clients/'.Auth::user()->id)}}">Account Details</a>
    <a href="{{url('/profile/clients/'.Auth::user()->id)}}">Edit Profile</a>
     <a href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
    </a> -->

    <!--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div> -->
</div>
</div>
<div class="main">
    @include('layouts.messages')
    @yield('sub_content')
</div>
@endsection