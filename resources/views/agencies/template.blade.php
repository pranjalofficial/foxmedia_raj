@extends('../layouts.app')
@section('content')
<div class="sidenav">
    <a href="{{url('/dashboard/agencies/'.Auth::user()->id)}}">Dashboard</a>
    <a href="{{url('/manage/campaigns/'.Auth::user()->id)}}">Manage Campaigns</a>
    <a href="{{url('/manage/posts/'.Auth::user()->id)}}">Manage Posts</a>
    {{-- <a href="{{url('/notifications/agencies/'.Auth::user()->id)}}">Notifications</a> --}}
    <a href="{{url('/account/agencies/'.Auth::user()->id)}}">Account Details</a>
    <a href="{{url('/profile/agencies/'.Auth::user()->id)}}">Edit Profile</a>
    <a href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
<div class="main">
    @yield('sub_content')
</div>
@endsection