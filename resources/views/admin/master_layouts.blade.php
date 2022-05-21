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
