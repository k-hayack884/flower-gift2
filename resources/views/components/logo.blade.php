@if (auth('admin')->user())
<a href="{{ route('admin.dashboard') }}">
<img src="{{asset('images/logo-cutout.png')}}" class="w-28 h-10 ">
</a>
@elseif (auth('users')->user())
<a href="{{ route('user.dashboard') }}">
    <img src="{{asset('images/logo-cutout.png')}}" class="w-28 h-10 ">
    </a>
@else
    <img src="{{asset('images/logo-cutout.png')}}" class="w-28 h-10 ">
@endif