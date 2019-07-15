<nav class="nav navbar-expand-lg navbar-light bg-light p-3 mx-sm-0 mx-lg-6">
    <a class="navbar-brand" href="/">Ln-Qz</a>
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#nav-drop" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ml-auto justify-content-sm-center justify-content-md-end justify-content-lg-end" id="nav-drop">
        <ul class="navbar-nav">
            <li class="nav-item mx-auto">
                <a class="nav-link" href="/linqz">Linqz</a>
            </li>
            @auth()
            <li class="nav-item dropdown align-self-center">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Account
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/dashboard">Dashboard</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                </div>
            </li>
            @endauth
            @guest
                <li class="nav-item mx-auto">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item mx-auto">
                    <a class="nav-link" href="/register">Register</a>
                </li>
            @endguest
        </ul>
    </div>

</nav>