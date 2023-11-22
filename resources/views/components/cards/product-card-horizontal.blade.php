<article class="row align-items-center hover-up">
    <figure class="col-md-4 mb-0">
        <a href="#"><img src="{{url('/')}}/storage/{{$product->image}}" alt="" /></a>
    </figure>
    <div class="col-md-8 mb-0">
        <h6>
            <a href="#">{{$product->name}}</a>
        </h6>
        <div class="product-rate-cover">
            <div class="product-rate d-inline-block">
                <div class="product-rating" style="width: 90%"></div>
            </div>
            <span class="font-small ml-5 text-muted"> (4.0)</span>
        </div>
        <div class="product-price">
            <span>${{$product->price}}</span>
            <span class="old-price">${{ $product->price + rand(0, 100) * ($product->price) / 100 }}</span>
        </div>
    </div>
</article>
