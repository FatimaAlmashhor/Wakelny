<nav class="navbar navbar-expand-lg px-5 main-nav">
    <!-- <div class="container-fluid"> -->
    <a class="navbar-brand fw-bold fs-3 brand" href="{{ route('home') }}">كلفني</a>

    <button
        class="navbar-toggler text-light collapsed
                        d-flex d-lg-none flex-column justify-content-around
                        "
        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">

        <span class="toggler-icon top-bar"></span>
        <span class="toggler-icon middle-bar"></span>
        <span class="toggler-icon bottom-bar"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active fw-bolder nav-links" aria-current="page"
                    href="{{ route('home') }}">{{ __('navigation.home') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-links" href="{{ route('freelancers') }}">{{ __('navigation.freelancers') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fs-6 nav-links" href="{{ route('projectlancer') }}">{{ __('navigation.available_projects') }}</a>
            </li>
        </ul>
        @if (Auth::check())
            @role('provider')
                <p>{{ auth()->user()->role }}</p>
            @endrole
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item ms-3 user-items">
                    <a class="nav-link color-offwhite fs-5" href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
                </li>
                <li class="nav-item ms-3 user-items">
                    <a class="nav-link color-offwhite fs-5" href="#"><i class="fa-solid fa-comment-dots"></i></a>
                </li>
                <li class="nav-item ms-3 user-items">
                    <a class="nav-link color-offwhite fs-5" href="#"><i class="fa-solid fa-bell"></i></a>
                </li>
                <li class="dropdown rtl">
                    <img class="img-avatar rounded-circle dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false"
                        src={{ $item->avatar ?? '/assets/client/images/user-profile-2.png' }}>

                    <ul class="dropdown-menu dropdown-menu-right mt-2" aria-labelledby="dropdownMenuButton1">
                        <li class="">
                            <a class="dropdown-item color-black" href="{{ route('userProfile', Auth::user()->id) }}">
                                <i class="fa-solid fa-user ms-1"></i>
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item color-black" href="#">
                                <i class="fa-solid fa-bookmark ms-1"></i>
                                <span>{{ __('navigation.favorite') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item color-black" href="#">
                                <i class="fa-solid fa-dollar-sign ms-1"></i>
                                <span>{{ __('navigation.balance') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item color-black" href="{{ route('profile') }}">
                                <i class="fa-solid fa-sliders ms-1"></i>
                                <span>{{ __('navigation.update_settings') }}</span>
                            </a>
                        </li>
                        <hr>
                        <li>
                            <a class="dropdown-item color-black" href="{{ route('logout') }}">
                                <i class="fa-solid fa-arrow-right-from-bracket ms-1"></i>
                                <span>{{ __('navigation.logout') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        @elseif (Auth::guest())
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fs-6 nav-links" href="{{ route('login') }}">{{ __('navigation.login') }}</a>
                </li>
            </ul>
        @endif
    </div>
    <!-- </div> -->
</nav>
