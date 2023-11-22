<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8"/>
    <title>Nest - Multipurpose eCommerce Platform</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("assets/imgs/theme/favicon.svg")}}"/>
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/plugins/slider-range.css")}}"/>
    <link rel="stylesheet" href="{{asset("assets/css/main.css")}}"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body>
<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
    </div>
    {{-- Top Bar --}}
    <x-navbar.top/>

    {{-- Header--}}
    <x-navbar.header/>

    {{-- Navigation--}}
    <x-navbar.menu/>
</header>
{{--Mobile menu--}}
<x-navbar.mobile-menu/>
<!--End header-->
<main class="main">
    @yield('content')
</main>
<x-subscriber-card/>
<x-footer-card/>
<!-- Preloader Start -->
{{--<div id="preloader-active">--}}
{{--    <div class="preloader d-flex align-items-center justify-content-center">--}}
{{--        <div class="preloader-inner position-relative">--}}
{{--            <div class="text-center">--}}
{{--                <img src="assets/imgs/theme/loading.gif" alt=""/>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- Vendor JS-->
<script src="{{asset("assets/js/vendor/modernizr-3.6.0.min.js")}}"></script>
<script src="{{asset("assets/js/vendor/jquery-3.6.0.min.js")}}"></script>
<script src="{{asset("assets/js/vendor/jquery-migrate-3.3.0.min.js")}}"></script>
<script src="{{asset("assets/js/vendor/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("assets/js/plugins/slick.js")}}"></script>
<script src="{{asset("assets/js/plugins/jquery.syotimer.min.js")}}"></script>
<script src="{{asset("assets/js/plugins/wow.js")}}"></script>
<script src="{{asset("assets/js/plugins/slider-range.js")}}"></script>
<script src="{{asset("assets/js/plugins/perfect-scrollbar.js")}}"></script>
<script src="{{asset("assets/js/plugins/magnific-popup.js")}}"></script>
<script src="{{asset("assets/js/plugins/select2.min.js")}}"></script>
<script src="{{asset("assets/js/plugins/waypoints.js")}}"></script>
<script src="{{asset("assets/js/plugins/counterup.js")}}"></script>
<script src="{{asset("assets/js/plugins/jquery.countdown.min.js")}}"></script>
<script src="{{asset("assets/js/plugins/images-loaded.js")}}"></script>
<script src="{{asset("assets/js/plugins/isotope.js")}}"></script>
<script src="{{asset("assets/js/plugins/scrollup.js")}}"></script>
<script src="{{asset("assets/js/plugins/jquery.vticker-min.js")}}"></script>
<script src="{{asset("assets/js/plugins/jquery.theia.sticky.js")}}"></script>
<script src="{{asset("assets/js/plugins/jquery.elevatezoom.js")}}"></script>
<!-- Template JS -->
<script src="{{asset("assets/js/main.js")}}"></script>
<script src="{{asset("assets/js/shop.js")}}"></script>
@livewireScripts
</body>

</html>
