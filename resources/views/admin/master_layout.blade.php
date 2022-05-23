<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>واجهة لوحة التحكم بالنظام</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
        integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/admin/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/admin/vendors/iconly/bold.css">

    <link rel="stylesheet" href="/assets/admin/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/admin/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/admin/css/app.css">
    <link rel="shortcut icon" href="/assets/admin/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="/assets/client/dist/css/tailwind.css">
    <link rel="stylesheet" href="/assets/client/dist/css/main.css">

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>متاح</title>
    <link rel="stylesheet" href="/assets/admin/vendors/rater-js/style.css">
    <style>
        #sidebar.active .sidebar-wrapper {

            right: 0px;

        }

        #sidebar:not(.active) .sidebar-wrapper {


            right: -300px;

        }

        @media (min-width: 1200px) {
            #main {
                margin-right: 300px;
                padding: 2rem;
                margin-left: 0;
            }
        }

        body {
            background-color: rgb(209 215 209 / 20%);
        }

        .navbar-expand .navbar-collapse {
            display: flex !important;
            flex-basis: auto;
            background-color: white;
            border-radius: 10px;
            padding: 1px 20px;
        }

        .sidebar-wrapper .menu .sidebar-item.active>.sidebar-link {
            background-color: #373483;
        }

        .logo {
            color: #373483;
        }

        .wak_btn {
            padding: .4rem .9rem;
            width: 60px;
            border: none;
            border-radius: 5px;
            background-color: #373483;
            color: white;
        }


    </style>
</head>

<body dir="rtl">

    {{-- alerts --}}
    @if (session()->has('message'))
        <div id='alert' class="px-4 alert position-fixed {{ session()->get('type') }}" role="alert"
            style="width: fit-content; position: absolute; bottom: 20% ; right: 0px ; z-index: 9999999">

            {{ session()->get('message') }}
        </div>
    @endif

    <section id="app">

        @include('admin.components.aside')
        <div id="main">
            <div>
                <nav class=" navbar-expand navbar-light " dir="ltr">
                    <div class="container-fluid">


                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">

                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="/assets/admin//images/faces/1.jpg">
                                            </div>
                                        </div>

                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                   style="   text-align: right;
            direction: rtl;
            padding: 0px 15px;" >
                                    <li>
                                        @if (Auth::check())
                                            <h6 class="dropdown-header">اهلا, {{ auth()->user()->name }}</h6>
                                        @endif
                                    </li>
                                    <!-- <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i>
                                            ملفي الشخصي
                                        </a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                            الاعدادات</a></li> -->
                                    <li><a class="dropdown-item" href="{{ route('wallet') }}"><i class="icon-mid bi bi-wallet me-2"></i>
                                            المحفظة</a></li>

                                    <li>
                                    <li><a class="dropdown-item" href="{{ route('change-password') }}"><i class="fas fa-unlock-alt me-2"></i>
                                            تغيير كلمة السر</a></li>

                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/logout"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> تسجيل خروج</a></li>
                                </ul>
                            </div>
                            <ul class="navbar-nav  mb-2 mb-lg-0">

                                <li class="nav-item ms-2 user-items">
                                    <div class="nav-link active dropdown-toggle text-gray-600" aria-expanded="false"
                                        type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                        style="position: relative">
                                        <i class="bi bi-bell bi-sub fs-4"></i>
                                        @if (auth()->user()->unreadNotifications->count() > 0)
                                            <span
                                                style=" position: absolute; width:12px; height:12px ; border-radius : 50% ;background:red ; bottom: 10px ; left: 20px;">
                                                {{-- {{ auth()->user()->unreadNotifications->count() }} --}}
                                            </span>
                                        @endif
                                    </div>

                                    <ul class="dropdown-menu dropdown-menu-right mt-1 mx-5"
                                        aria-labelledby="dropdownMenuButton1"
                                        style="overflow: auto; width:340px ; hieght 70vh">

                                        @foreach (auth()->user()->unreadNotifications as $notification)
                                            <li class=""
                                                style="color: gray ; overflow-wrap: break-word; height: fit-content ;   ">
                                                <a class="dropdown-item color-black my-2 p-3"
                                                    href="{{ $notification->data['url'] }}"
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

                            </ul>
                        
                        </div>
                    </div>
                </nav>
            </div>

            @yield('content')
        </div>
        </div>

        <script src="/assets/admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="/assets/admin/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/assets/admin/vendors/apexcharts/apexcharts.js"></script>
        <script src="/assets/admin/js/pages/dashboard.js"></script>

        <script src="/assets/admin/vendors/rater-js/rater-js.js"></script>
        <script src="/assets/admin/js/extensions/rater-js.js"></script>
        <script src="/assets/admin/js/mazer.js"></script>

        <script src="{{ asset('assets/client/js/report.js') }}"></script>



</body>

</html>
