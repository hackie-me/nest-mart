<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8"/>
    <title>Nest - Multipurpose eCommerce Platform</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.svg"/>
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/plugins/slider-range.css"/>
    <link rel="stylesheet" href="assets/css/main.css"/>

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
    <x-customs.navbar.top/>

    {{-- Header--}}
    <x-customs.navbar.header/>

    {{-- Navigation--}}
    <x-customs.navbar.menu/>
</header>
{{--Mobile menu--}}
<x-customs.navbar.mobile-menu/>
<!--End header-->
<main class="main">
    <!--Start hero-->
    <x-components.hero-section/>
    <!--End hero-->
    <!--Start banner-->
    <div class="container mb-30">
        <div class="row">
            <div class="col-lg-4-5">
                <section class="product-tabs section-padding position-relative">
                    <div class="section-title style-2">
                        <h3>Popular Products</h3>
                        <ul class="nav nav-tabs links" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab"
                                        data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one"
                                        aria-selected="true">All
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two"
                                        type="button" role="tab" aria-controls="tab-two" aria-selected="false">Milks &
                                    Dairies
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab"
                                        data-bs-target="#tab-three" type="button" role="tab" aria-controls="tab-three"
                                        aria-selected="false">Coffes & Teas
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="nav-tab-four" data-bs-toggle="tab"
                                        data-bs-target="#tab-four" type="button" role="tab" aria-controls="tab-four"
                                        aria-selected="false">Pet Foods
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="nav-tab-five" data-bs-toggle="tab"
                                        data-bs-target="#tab-five" type="button" role="tab" aria-controls="tab-five"
                                        aria-selected="false">Meats
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="nav-tab-six" data-bs-toggle="tab" data-bs-target="#tab-six"
                                        type="button" role="tab" aria-controls="tab-six" aria-selected="false">
                                    Vegetables
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="nav-tab-seven" data-bs-toggle="tab"
                                        data-bs-target="#tab-seven" type="button" role="tab" aria-controls="tab-seven"
                                        aria-selected="false">Fruits
                                </button>
                            </li>
                        </ul>
                    </div>
                    <!--End nav-tabs-->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                            <!--Start product-grid-4-->
                            <div class="row product-grid-4">
                                <!--Start single-product-->
                                <x-components.cards.product-card/>
                                <!--End single-product-->
                            </div>
                            <!--End product-grid-4-->
                        </div>
                        <!--En tab seven-->
                    </div>
                    <!--End tab-content-->
                </section>
                <!--Products Tabs-->
                <section class="section-padding pb-5">
                    <div class="section-title">
                        <h3 class="">Deals Of The Day</h3>
                        <a class="show-all" href="shop-grid-right.html">
                            All Deals
                            <i class="fi-rs-angle-right"></i>
                        </a>
                    </div>
                    <div class="row">
                        <x-components.cards.d-o-d-card/>
                    </div>
                </section>
            </div>
            <!--End Shop Product-->
            <!--Start Shop Sidebar-->
            <div class="col-lg-1-5 primary-sidebar sticky-sidebar pt-30">
                <!-- Aside Category -->
                <x-components.side.aside-category/>
                <!-- Fillter By Price -->
                <x-components.side.aside-filter/>

                {{--                <!-- Product sidebar Widget -->--}}
                {{--                <x-components.side.aside-new-products/>--}}
            </div>
            <!--End Shop Sidebar-->
        </div>
    </div>
    <!--End Shop-->
    <!--Start category slider-->
    <section class="popular-categories section-padding">
        <div class="container">
            <div class="section-title">
                <div class="title">
                    <h3>Shop by Categories</h3>
                    <a class="show-all" href="">
                        All Categories
                        <i class="fi-rs-angle-right"></i>
                    </a>
                </div>
                <div class="slider-arrow slider-arrow-2 flex-right carausel-8-columns-arrow"
                     id="carausel-8-columns-arrows"></div>
            </div>
            <div class="carausel-8-columns-cover position-relative">
                <div class="carausel-8-columns" id="carausel-8-columns">
                    <x-components.cards.category-card/>
                    <x-components.cards.category-card/>
                    <x-components.cards.category-card/>
                    <x-components.cards.category-card/>
                    <x-components.cards.category-card/>
                    <x-components.cards.category-card/>
                    <x-components.cards.category-card/>
                </div>
            </div>
        </div>
    </section>
    <!--End category slider-->
    <!--Start Shop By Brand-->
    <section class="section-padding mb-30">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0">
                    <h4 class="section-title style-1 mb-30 animated animated">Top Selling</h4>
                    <div class="product-list-small animated animated">
                        <x-components.cards.product-card-horizontal/>
                        <x-components.cards.product-card-horizontal/>
                        <x-components.cards.product-card-horizontal/>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0">
                    <h4 class="section-title style-1 mb-30 animated animated">Trending Products</h4>
                    <div class="product-list-small animated animated">
                        <x-components.cards.product-card-horizontal/>
                        <x-components.cards.product-card-horizontal/>
                        <x-components.cards.product-card-horizontal/>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block">
                    <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                    <div class="product-list-small animated animated">
                        <x-components.cards.product-card-horizontal/>
                        <x-components.cards.product-card-horizontal/>
                        <x-components.cards.product-card-horizontal/>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block">
                    <h4 class="section-title style-1 mb-30 animated animated">Top Rated</h4>
                    <div class="product-list-small animated animated">
                        <x-components.cards.product-card-horizontal/>
                        <x-components.cards.product-card-horizontal/>
                        <x-components.cards.product-card-horizontal/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Shop By Brand-->
</main>
<x-components.subscriber-card/>
<x-components.footer-card/>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center">
                <img src="assets/imgs/theme/loading.gif" alt=""/>
            </div>
        </div>
    </div>
</div>
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
