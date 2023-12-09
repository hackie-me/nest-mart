<div class="header-middle header-middle-ptb-1 d-none d-lg-block">
    <div class="container">
        <div class="header-wrap">
            <div class="logo logo-width-1">
                <a href="{{route('home')}}"><img src="{{url('assets/imgs/theme/logo.svg')}}" alt="logo" /></a>
            </div>
            <div class="header-right">
                <div class="search-style-2">
                    <form action="#">
                        <input type="text" placeholder="Search for items..." />
                    </form>
                </div>
                <div class="header-action-right">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="{{$wishlist}}">
                                <img class="svgInject" alt="Nest" src="{{url('assets/imgs/theme/icons/icon-heart.svg')}}" />
                                @auth
                                    <span class="pro-count blue">
                                        {{auth()->user()->wishLists()->count()}}
                                    </span>
                                @endauth
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="{{$cart}}">
                                <img alt="Nest" src="{{url('assets/imgs/theme/icons/icon-cart.svg')}}" />
                                @auth
                                    <span class="pro-count blue">
                                        {{auth()->user()->carts()->count()}}
                                    </span>
                                @endauth
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a href="{{route('login')}}">
                                <img class="svgInject" alt="Nest" src="{{url('assets/imgs/theme/icons/icon-user.svg')}}" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
