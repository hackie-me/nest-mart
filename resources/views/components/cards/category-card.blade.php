<div class="card-1">
    <figure class="img-hover-scale overflow-hidden">
        <a href="#">
            @if($category->image)
                <img src="{{url('/')}}/storage/{{$category->image}}" alt="" />
            @else
                <img src="assets/imgs/theme/icons/category-1.svg" alt="" />
            @endif
        </a>
    </figure>
    <h6>
        <a href="#">{{$category->name}}</a>
    </h6>
</div>
