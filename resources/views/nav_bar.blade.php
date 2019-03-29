<nav>
    <ul>
        @guest
        <li><a href="{{route('home')}}">Log in</a></li>
        @endguest
        <li><a href="{{route('search')}}">Home</a></li>
        <li><a href="#">Profile</a>
            <ul>
                <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
