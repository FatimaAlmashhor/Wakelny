<nav class="navbar navbar-expand-lg px-5 main-nav">
    <!-- <div class="container-fluid"> -->
    <a class="navbar-brand fw-bold fs-3 brand" href="{{ route('home') }}">متاح</a>

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
                    href="{{ route('home') }}">الرئيسية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-links" href="{{ route('freelancers') }}">المستقلون</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fs-6 nav-links" href="{{ route('projectlancer') }}">المشاريع المتاحه </a>
            </li>
        </ul>

        @if (Auth::check())
            @role('seeker')
                <p>{{ auth()->user()->role }}</p>

                <ul class="navbar-nav  ">
                    <li class="nav-item ">
                        <a class="nav-link fs-6 nav-links" href="{{ route('myProject') }}">مشاريعي </a>
                    </li>
                </ul>
            @endrole
        @endif

        @if (Auth::check())
            @role('provider')
                <p>{{ auth()->user()->role }}</p>

                <ul class="navbar-nav  ">
                    <li class="nav-item ">
                        <a class="nav-link fs-6 nav-links" href="{{ route('myWorks') }}">اعمالي </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link fs-6 nav-links" href="{{ route('workonProject') }}">اعمل على </a>
                    </li>
                </ul>
            @endrole
        @endif



        @if (Auth::check())

            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex jusify-content-center align-item-center">

                <li class="nav-item ms-2 user-items">
                    <a class="nav-link color-offwhite fs-5" href="#"><i
                            class="fa-solid fa-magnifying-glass font-sm"></i></a>
                </li>
                <li class="nav-item ms-2 user-items">
                    <a class="nav-link color-offwhite fs-5" href="#"><i
                            class="fa-solid fa-comment-dots font-sm"></i></a>
                </li>
                <li class="nav-item ms-2 user-items">
                    <div class="nav-link color-offwhite fs-5 " aria-expanded="false" type="button"
                        id="dropdownMenuButton1" data-bs-toggle="dropdown" style="position: relative">
                        <i class="fa-solid fa-bell font-sm"></i>
                        @if (auth()->user()->unreadNotifications->count() > 0)
                            <span
                                style=" position: absolute; width:12px; height:12px ; border-radius : 50% ;background:red ; bottom: 10px ; left: 20px;">
                                {{-- {{ auth()->user()->unreadNotifications->count() }} --}}
                            </span>
                        @endif
                    </div>

                    <ul class="dropdown-menu dropdown-menu-right mt-1 mx-5" aria-labelledby="dropdownMenuButton1"
                        style="overflow: auto; width:340px ; hieght 70vh">

                        @foreach (auth()->user()->unreadNotifications as $notification)
                            <li class=""
                                style="color: gray ; overflow-wrap: break-word; height: fit-content ;   ">
                                <a class="dropdown-item color-black my-2 p-3" href="{{ $notification->data['url'] }}"
                                    style=' color: gray ; border-right: 4px solid {{ $notification->read_at == null ? 'red' : 'gray' }}  ; padding-right: 2px ; width:inherit; height: fit-content; '>
                                    @if ($notification->data['type'] == 'comment')
                                        {{-- <a href="{{ route('markAsReadOne', $notification->id) }}"> --}}
                                        <span> قام بأضافه
                                            {{ $notification->data['name'] }}
                                            عرض جديد على مشروعك</span>
                                        {{-- </a> --}}
                                    @else
                                        {{-- <a href="{{ route('markAsReadOne', $notification->id) }}"> --}}
                                        <span>
                                            {{ $notification->data['message'] }}
                                        </span>
                                        {{-- </a> --}}
                                    @endif

                                </a>
                            </li>
                        @endforeach
                    </ul>



                </li>
                <li class="dropdown rtl">

                    <div class=" mt-2 rounded-circle position-relative  dropdown-toggle" aria-expanded="false"
                        type="button" id="dropdownMenuButton1" style="width: 32px ; height: 32px;"
                        data-bs-toggle="dropdown">
                        {{-- @if (!Auth::user()->hasRole('admin'))
                            @if ($item->avatar !== 'http://localhost:8000/images/')
                                <img src="{{ $item->avatar }}" class="profile-avatar position-absoulte"
                                    style="width: 100%; height:100%; object-fit: cover">
                            @else
                                <img src="/assets/client/images/user-profile-2.png"
                                    class="profile-avatar position-absoulte dropdown-toggle"
                                    style="width: 100%; height:100%; object-fit: cover">
                            @endif
                        @else
                            <img src="/assets/client/images/user-profile-2.png"
                                class="profile-avatar position-absoulte dropdown-toggle"
                                style="width: 100%; height:100%; object-fit: cover">
                        @endif --}}

                        <img src="/assets/client/images/user-profile-2.png"
                            class="profile-avatar position-absoulte dropdown-toggle"
                            style="width: 100%; height:100%; object-fit: cover">
                    </div>
                    {{-- <img class="img-avatar rounded-circle dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false"
                        src={{ $item->avatar ?? '/assets/client/images/user-profile-2.png' }}> --}}

                    <ul class="dropdown-menu dropdown-menu-right mt-2" aria-labelledby="dropdownMenuButton1">
                        @if (!Auth::user()->hasRole('admin'))
                            <li class="">
                                <a class="dropdown-item color-black"
                                    href="{{ route('userProfile', Auth::user()->id) }}">
                                    <i class="fa-solid fa-user ms-1 font-xs"></i>
                                    <span>{{ Auth::user()->name }}</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item color-black" href="#">
                                    <i class="fa-solid fa-bookmark  ms-1 font-xs"></i>
                                    <span>المفضلة</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item color-black" href="#">
                                    <i class="fa-solid fa-dollar-sign ms-1 font-xs"></i>
                                    <span>الرصيد</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item color-black" href="{{ route('profile') }}">
                                    <i class="fa-solid fa-sliders ms-1 font-xs"></i>
                                    <span>تعديل الحساب</span>
                                </a>
                            </li>
                        @else
                            <li>
                                <a class="dropdown-item color-black" href="{{ route('admin') }}">
                                    <i class="fa-solid fa-sliders ms-1 font-xs"></i>
                                    <span>لوحه التحكم</span>
                                </a>
                            </li>
                        @endif

                        <hr>
                        <li>
                            <a class="dropdown-item color-black" href="{{ route('logout') }}">
                                <i class="fa-solid fa-arrow-right-from-bracket ms-1 font-xs"></i>
                                <span>تسجيل الخروج</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        @elseif (Auth::guest())
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fs-6 nav-links " href="{{ route('login') }}">تسجيل الدخول</a>
                </li>

                <li class="nav-item border">
                    <a class="nav-link fs-6 nav-links " href="{{ route('create_user') }}">حساب جديد </a>
                </li>
            </ul>
        @endif
    </div>
    <!-- </div> -->
</nav>
