@extends('layouts.guest')

@section('content')
    <main class="main">
        <div class="page-header mt-30 mb-50">
            <div class="container">
                <div class="archive-header">
                    <div class="row align-items-center">
                        <div class="col-xl-3">
                            <h1 class="mb-15">Products</h1>
                            <div class="breadcrumb">
                                <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                                <span></span> Products
                            </div>
                        </div>
                        <div class="col-xl-9 text-end d-none d-xl-block">
                            <ul class="tags-list">
                                @forelse($topCategories as $item)
                                    <li class="hover-up">
                                        <a href="#"><i class="fi-rs-cross mr-10"></i>{{$item->name}}</a>
                                    </li>
                                @empty
                                @endforelse

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-lg-4-5">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>We found <strong class="text-brand">{{$products->count()}}</strong> items for you!</p>
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps"></i>Show:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">50</a></li>
                                        <li><a href="#">100</a></li>
                                        <li><a href="#">150</a></li>
                                        <li><a href="#">200</a></li>
                                        <li><a href="#">All</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">Featured</a></li>
                                        <li><a href="#">Price: Low to High</a></li>
                                        <li><a href="#">Price: High to Low</a></li>
                                        <li><a href="#">Release Date</a></li>
                                        <li><a href="#">Avg. Rating</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-list mb-50">
                        @forelse($products as $product)
                            <div class="product-cart-wrap">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <div class="product-img-inner">
                                            <a href="{{route('product', [$product->id, $product->name])}}">
                                                <img class="default-img" src="{{url('/')}}/storage/{{$product->image}}" alt="" />
                                                <img class="hover-img" src="{{url('/')}}/storage/{{$product->image}}" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Add To Wishlist" class="action-btn" href="#"><i class="fi-rs-heart"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="#">{{$product->category->name}}</a>
                                    </div>
                                    <h2><a href="{{route('product', [$product->id, $product->name])}}">{{$product->name}}</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        <span class="ml-30">500g</span>
                                    </div>
                                    <p class="mt-15 mb-15">{{$product->summary}}</p>
                                    <div class="product-price">
                                        <span>${{$product->price}}</span>
                                        <span class="old-price">${{ $product->price + rand(0, 100) * ($product->price) / 100 }}</span>
                                    </div>
                                    <div class="mt-30 d-flex align-items-center">
                                        <a aria-label="Buy now" class="btn" href="#"><i class="fi-rs-shopping-cart mr-5"></i>Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <!-- Show Empty Message -->
                            <div class="col-lg-12">
                                <div class="alert alert-danger">
                                    <h3 class="text-center">No Products Found</h3>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <!--product grid-->
                    <div class="pagination-area mt-20 mb-20">
                        {{$products->links()}}
                    </div>
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                    <x-side.aside-category :items="$categories"/>
                    <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
                        <img src="{{url('assets/imgs/banner/banner-11.png')}}" alt="" />
                        <div class="banner-text">
                            <span>Oganic</span>
                            <h4>
                                Save 80% <br />
                                on <span class="text-brand">Oganic</span><br />
                                Juice
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
