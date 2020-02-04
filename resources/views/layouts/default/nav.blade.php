<nav class="navbar navbar-expand-lg navbar-dark main-dark-purple-bgd py-1">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('storage/img/logo_without_bgd.svg') }}" width="40">
    </a>
    <button class="navbar-toggler outline-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">

            <li class="nav-item @if (Route::currentRouteNamed('welcome')) active @endif">
                <a class="nav-link" href="{{ route('welcome') }}">{{ __('menu.main') }}</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                   href="#"
                   id="navbarDropdownMenuLink"
                   data-toggle="dropdown"
                   aria-haspopup="true"
                   aria-expanded="false"
                >
                    @auth
                        {{ auth()->user()->name }}
                    @else
                        {{ __('auth.profile') }}
                    @endauth
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @guest
                        @if (!Route::currentRouteNamed('login'))
                            <a class="dropdown-item" href="{{ route('login') }}">{{ __('menu.login') }}</a>
                        @endif
                        @if (Route::has('register') && !Route::currentRouteNamed('register'))
                            <a class="dropdown-item" href="{{ route('register') }}">{{ __('menu.register') }}</a>
                        @endif
                    @else
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('menu.logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </div>
            </li>
        </ul>
    </div>
</nav>
