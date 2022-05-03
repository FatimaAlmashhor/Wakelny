<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>واجهة لوحة التحكم بالنظام</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
        integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/admin/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/admin/vendors/iconly/bold.css">

    <link rel="stylesheet" href="/assets/admin/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/admin/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/admin/css/app.css">
    <link rel="shortcut icon" href="/assets/admin/images/favicon.svg" type="image/x-icon">
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
            background-color: rgba(77, 212, 172, 1);
        }

        .logo {
            color: rgba(77, 212, 172, 1);
        }

        .wak_btn {
            padding: .4rem .9rem;
            width: 60px;
            border: none;
            border-radius: 5px;
            background-color: rgba(77, 212, 172, 1);
            color: white;
        }

       .dropdown-menu-end.show {
    right: auto;
    text-align: right;
    direction: rtl;
    padding: 0px 15px;
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
                <nav class="navbar navbar-expand navbar-light " dir="ltr">
                    <div class="container-fluid">


                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">

                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="/images/im2.png">
                                            </div>
                                        </div>

                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                    style="">
                                    <li>
                                        <h6 class="dropdown-header">اهلا, أفنان</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i>
                                            ملفي الشخصي
                                        </a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                            الاعدادات</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                            المحفظة</a></li>

                                    <li>
                                    <li><a class="dropdown-item" href="{{ route('change-password') }}"><i
                                                class="icon-mid bi bi-wallet me-2"></i>
                                            تغيير كلمة السر</a></li>

                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/logout"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> تسجيل خروج</a></li>
                                </ul>
                            </div>
                            <ul class="navbar-nav  mb-2 mb-lg-0">

                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle text-gray-600" href="#"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-bell bi-sub fs-4"></i>
                                    </a>

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
        <script src="/assets/admin/vendors/apexcharts/apexcharts.js"></script>
        <script src="/assets/admin/js/pages/dashboard.js"></script>
        <script src="/assets/admin/js/mazer.js"></script>


</body>

</html>
