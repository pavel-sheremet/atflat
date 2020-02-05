<nav class="navbar navbar-expand-lg navbar-dark main-dark-purple-bgd py-1">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('storage/img/logo_without_bgd.svg') }}" width="40">
    </a>
    <button class="navbar-toggler outline-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav w-100">

            <li class="nav-item @if (Route::currentRouteNamed('welcome')) active @endif">
                <a class="nav-link" href="{{ route('welcome') }}">{{ __('menu.main') }}</a>
            </li>

            <li class="nav-item @if (Route::currentRouteNamed('agency')) active @endif">
                <a class="nav-link" href="{{ route('agency') }}">{{ __('agency.nav') }}</a>
            </li>

            <li class="nav-item mr-auto"></li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                   href="#"
                   id="profileNavBarDropDownLink"
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
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileNavBarDropDownLink">
                    @guest
                        @if (!Route::currentRouteNamed('login'))
                            <a class="dropdown-item" href="{{ route('login') }}">{{ __('menu.login') }}</a>
                        @endif
                        @if (Route::has('register') && !Route::currentRouteNamed('register'))
                            <a class="dropdown-item" href="{{ route('register') }}">{{ __('menu.register') }}</a>
                        @endif
                    @else
                        @if (!Route::currentRouteNamed('agent.profile'))
                            <a class="dropdown-item" href="{{ route('agent.profile') }}">{{ __('agent.nav') }}</a>
                        @endif
                        @if (!Route::currentRouteNamed('profile'))
                            <a class="dropdown-item" href="{{ route('profile') }}">{{ __('auth.profile') }}</a>
                        @endif
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
