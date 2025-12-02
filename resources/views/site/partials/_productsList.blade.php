@foreach($products as $product)
    <div class="col-6 col-sm-3 product-box">
        <div class="product-default">
            @if (Auth::guard('client') && $product->isCompare($product->id))
                <a href="{{route('profile.removeFromCompare',$product->id)}}" class="compare-btn compare-active">
                    <i class="fa fa-chart-simple"></i>
                </a>
            @else
                <a href="{{route('profile.addCompare',$product->id)}}" class="compare-btn">
                    <i class="fa fa-chart-simple"></i>
                </a>
            @endif

            @if (Auth::guard('client') && $product->isFavorite(Auth::guard('client')->id()))
                <a href="{{route('profile.removeFromFavorite',$product->id)}}"  class="fav-btn">
                    <i class="fas fa-heart text-danger"></i>
                </a>
            @else
                <a href="{{route('profile.addFavorite',$product->id)}}"  class="fav-btn">
                    <i class="far fa-heart"></i>
                </a>
            @endif

            <figure>
                @if($product->photos->count())
                    <a href="{{route('product',$product->slug)}}">
                        @if($product->front_image and $product->back_image)

                            <img src="{{get_image($product->front_image,'list')}}" width="280" height="280"
                                 alt="product"/>
                            <img src="{{get_image($product->back_image,'list')}}" width="280" height="280"
                                 alt="product"/>
                        @else
                            <img src="{{get_image($product->photos[0]->image,'list')}}" width="280" height="280"
                                 alt="product"/>
                            <img src="{{get_image($product->photos[0]->image,'list')}}" width="280" height="280"
                                 alt="product"/>
                        @endif

                    </a>

                    <div class="label-group">
                        @if($product->is_best_seller)
                            <div class="product-label label-hot">{{__('site.best_seller')}}</div>
                        @endif

{{--                        @if($discount=calculate_discount($product))--}}
{{--                            <div class="product-label label-sale">-{{$discount}}%</div>--}}
{{--                        @endif--}}
                    </div>
                @endif
            </figure>
            <div class="product-details" style="color:black;">
                        @if($product->category?->slug)
                <div class="category-wrap">
                    <div class="category-list">
                        <a href="https://orelinsaat.az/{{app()->getLocale()}}/products?sort=&brand_id=&category_id={{$product->category?->id}}&min_price=0&max_price=1000" class="product-category">{{$product->category?->title}}</a>
                    </div>
                </div>
                        @endif
                <h3 class="product-title"><a href="{{route('product',$product->slug)}}">{{Str::limit($product->title,33)}}</a></h3>
                @include('site.partials._productFooterBox',['product'=>$product])

            </div>
        </div>
    </div>
@endforeach
