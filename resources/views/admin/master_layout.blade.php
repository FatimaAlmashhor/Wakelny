<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/admin//css/bootstrap.css">

    <link rel="stylesheet" href="/assets/admin//vendors/iconly/bold.css">

    <link rel="stylesheet" href="/assets/admin//vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/admin//vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/admin//css/app.css">
    <link rel="shortcut icon" href="/assets/admin//images/favicon.svg" type="image/x-icon">
</head>

<body>
    <section id="app">
        @include('admin.components.aside')
        <div id="main">
            @yield('content')
        </div>
    </section>
    <script src="/assets/admin//vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/admin//js/bootstrap.bundle.min.js"></script>

    <script src="/assets/admin//vendors/apexcharts/apexcharts.js"></script>
    <script src="/assets/admin//js/pages/dashboard.js"></script>

    <script src="/assets/admin//js/mazer.js"></script>
</body>

</html>
