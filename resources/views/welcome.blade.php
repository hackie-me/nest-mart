@extends('layouts.guest')

@section('content')
    <!--Start hero-->
    <x-hero-section/>
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
                            @forelse($popularCategories as $index => $category)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="nav-tab-{{ $index }}" data-bs-toggle="tab"
                                            data-bs-target="#tab-{{ $index }}" type="button" role="tab"
                                            aria-controls="tab-{{ $index }}" aria-selected="false">{{ $category->name }}
                                    </button>
                                </li>
                            @empty
                                {{-- Do Nothing --}}
                            @endforelse
                        </ul>
                    </div>
                    <!--End nav-tabs-->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                            <!--Start product-grid-4 for All-->
                            <div class="row product-grid-4">
                                @foreach($popularProducts as $product)
                                    <!--Start single-product-->
                                    <x-cards.product-card :product="$product"/>
                                    <!--End single-product-->
                                @endforeach
                            </div>
                            <!--End product-grid-4-->
                        </div>
                        @forelse($popularCategories as $index => $category)
                            <div class="tab-pane fade" id="tab-{{ $index }}" role="tabpanel" aria-labelledby="tab-{{ $index }}">
                                <!--Start product-grid-4 for {{ $category->name }}-->
                                <div class="row product-grid-4">
                                    @forelse($category->products as $product)
                                        <!--Start single-product-->
                                        <x-cards.product-card :product="$product"/>
                                        <!--End single-product-->
                                    @empty
                                            {{-- Do Nothing --}}
                                    @endforelse
                                </div>
                                <!--End product-grid-4-->
                            </div>
                        @empty
                            {{-- Do Nothing --}}
                        @endforelse
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
                        <x-cards.d-o-d-card/>
                    </div>
                </section>
            </div>
            <!--End Shop Product-->
            <!--Start Shop Sidebar-->
            <div class="col-lg-1-5 primary-sidebar sticky-sidebar pt-30">
                <!-- Aside Category -->
                <x-side.aside-category :items="$categories"/>
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
                    @forelse($shopByCategory as $category)
                        <x-cards.category-card :items="$category"/>
                    @empty
                        {{-- Do Nothing --}}
                    @endforelse
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
                        @forelse($topSellingProducts as $product)
                            <x-cards.product-card-horizontal :product="$product"/>
                        @empty
                            {{-- Do Nothing --}}
                        @endforelse
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0">
                    <h4 class="section-title style-1 mb-30 animated animated">Trending Products</h4>
                    <div class="product-list-small animated animated">
                        @forelse($trendingProducts as $product)
                            <x-cards.product-card-horizontal :product="$product"/>
                        @empty
                            {{-- Do Nothing --}}
                        @endforelse
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block">
                    <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                    <div class="product-list-small animated animated">
                        @forelse($recentlyAdded as $product)
                            <x-cards.product-card-horizontal :product="$product"/>
                        @empty
                            {{-- Do Nothing --}}
                        @endforelse
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block">
                    <h4 class="section-title style-1 mb-30 animated animated">Top Rated</h4>
                    <div class="product-list-small animated animated">
                        @forelse($topRated as $product)
                            <x-cards.product-card-horizontal :product="$product"/>
                        @empty
                            {{-- Do Nothing --}}
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Shop By Brand-->
@endsection
