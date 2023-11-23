<div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
    <div class="product-cart-wrap mb-30">
        <div class="product-img-action-wrap">
            <div class="product-img product-img-zoom">
                <a href="{{route('product', [$product->id, $product->name])}}">
                    <img class="default-img" src="{{url('/')}}/storage/{{$product->image}}" alt="" />
                    <img class="hover-img" src="{{url('/')}}/storage/{{$product->image}}" alt="" />
                </a>
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
            </div>
            <div>
            </div>
            <div class="product-card-bottom">
                <div class="product-price">
                    <span>${{$product->price}}</span>
                    <span class="old-price">${{ $product->price + rand(0, 100) * ($product->price) / 100 }}</span>
                </div>
                <div class="add-cart">
                    <a class="add" href="#"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                </div>
            </div>
        </div>
    </div>
</div>
