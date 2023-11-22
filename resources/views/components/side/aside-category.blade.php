<div class="sidebar-widget widget-category-2 mb-30">
    <h5 class="section-title style-1 mb-30">Category</h5>
    <ul>
        @forelse($categories as $category)
            <li>
                <a href="#">
                    @if($category->image)
                        <img src="{{url('/')}}/storage/{{$category->image}}" alt="" />
                    @else
                        <img src="assets/imgs/theme/icons/category-1.svg" alt="" />
                    @endif
                    {{$category->name}}
                </a>
                <span class="count">
                    {{$category->products->count()}}
                </span>
            </li>
        @empty
            {{-- Do Nothing --}}
        @endforelse
    </ul>
</div>
