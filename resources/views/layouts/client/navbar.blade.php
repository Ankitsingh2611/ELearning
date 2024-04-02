<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <i class="bi-back"></i>
            <span>Topic</span>
        </a>

        <div class="d-lg-none ms-auto me-4">
            <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-5 me-lg-auto">
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_1">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_2">Browse Topics</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_3">How it works</a>
                </li>

                @if (Auth::user())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>

                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                            <li><a class="dropdown-item" href="topics-listing.html">Profile</a></li>


                            <li>
                                <a class="dropdown-item" href="{{route('logout')}}"  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="{{route('login')}}">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="{{route('register')}}">Register</a>
                    </li>
                @endif
            </ul>

            <div class="d-none d-lg-block">
                <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
            </div>
        </div>
    </div>
</nav>
