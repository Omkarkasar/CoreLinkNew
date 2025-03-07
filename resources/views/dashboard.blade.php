<!-- Login and Logout Functionality(gp) -->
@if(session()->has('id'))
    <li><a href="{{route('logout')}}">Logout</a></li>
@else
    <li><a href="{{route('register')}}">Register</a></li>
    <li><a href="{{route('login')}}">Login</a></li>
@endif
