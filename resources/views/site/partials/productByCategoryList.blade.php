@foreach($products as $product)
    <div class="col-6 col-sm-4 product-box">
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
                        <img src="{{get_image($product->front_image,'list')}}" width="280" height="280" alt="product"/>
                        <img src="{{get_image($product->back_image,'list')}}" width="280" height="280" alt="product"/>
                    </a>
    
                    <div class="label-group">
                        @if($product->is_best_seller)
                            <div class="product-label label-hot">{{__('site.best_seller')}}</div>
                        @endif
                    </div>
            @endif
                </figure>

            <div class="product-details">
                @if(isset($product->category))
                    <div class="category-wrap">
                        <div class="category-list">
                            <a href="{{route('category',$product->category->slug)}}"
                               class="product-category">{{$product->category?->title}}</a>
                        </div>
                    </div>
                @endif
                <h3 class="product-title"><a href="{{route('product',$product->slug)}}">{{$product->title}}</a></h3>

                @include('site.partials._productFooterBox',['product'=>$product])

            </div>
            <!-- End .product-details -->
        </div>
    </div>
@endforeach