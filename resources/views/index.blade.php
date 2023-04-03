<!doctype html>
<html lang="en" dir="ltr">

<!-- Mirrored from demo.dashboardmarket.com/hexadash-html/ltr/demo2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Mar 2023 05:38:39 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cars - Gara cho thuê xe hơi</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/plugin.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="icon" type="{{ url('image/png') }}" sizes="16x16" href="{{ url('img/favicon.png') }}') }}">
    <link rel="stylesheet" href="{{ url('unicons.iconscout.com/release/v4.0.0/css/line.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="layout-light side-menu">

    @include('components.mobile-search')
    @include('layouts.header')
    @include('components.overlay')

    <main class="main-content">
        @include('layouts.menu-sidebar')
        @yield('content')
        @yield('js');
        @include('layouts.footer')
    </main>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgYKHZB_QKKLWfIRaYPCadza3nhTAbv7c"></script>
    <script src="{{ url('js/active.js') }}"></script>
    <script src="{{ url('js/plugins.min.js') }}"></script>
    <script src="{{ url('js/script.min.js') }}"></script>
</body>

<!-- Mirrored from demo.dashboardmarket.com/hexadash-html/ltr/demo2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Mar 2023 05:38:42 GMT -->

</html>
