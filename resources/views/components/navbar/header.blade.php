<div class="header-middle header-middle-ptb-1 d-none d-lg-block">
    <div class="container">
        <div class="header-wrap">
            <div class="logo logo-width-1">
                <a href="{{route('home')}}"><img src="assets/imgs/theme/logo.svg" alt="logo" /></a>
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
                            <a href="{{route('wishlist')}}">
                                <img class="svgInject" alt="Nest" src="assets/imgs/theme/icons/icon-heart.svg" />
                                <span class="pro-count blue">6</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="{{route('cart')}}">
                                <img alt="Nest" src="assets/imgs/theme/icons/icon-cart.svg" />
                                <span class="pro-count blue">2</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a href="{{url('/user')}}">
                                <img class="svgInject" alt="Nest" src="assets/imgs/theme/icons/icon-user.svg" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
