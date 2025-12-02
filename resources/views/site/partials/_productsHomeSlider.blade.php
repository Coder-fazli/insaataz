@foreach($products as $product)
    <div class="product-default " data-animation-name="fadeInRightShorter">
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

        @if($product->photos->count())
            <figure>
                <a href="{{route('product',$product->slug)}}">

                    @if($product->front_image and $product->back_image)

                        <img src="{{get_image($product->front_image,'list')}}"width="220" height="220"
                             alt="{{$product->title}}"/>
                        <img src="{{get_image($product->back_image,'list')}}" width="220" height="220"
                             alt="{{$product->title}}"/>
                    @else
                        <img src="{{get_image($product->photos[0]->image,'list')}}" width="220" height="220"
                             alt="{{$product->title}}"/>
                        <img src="{{get_image($product->photos[0]->image,'list')}}" wwidth="220" height="220"
                             alt="{{$product->title}}"/>
                    @endif
                    
                </a>
                <div class="label-group">
                    @if($product->is_best_seller)
                        <div class="product-label label-hot">{{__('site.best_seller')}}</div>
                    @endif
                </div>
            </figure>
        @endif

        <div class="product-details">
            @if($product->category?->slug)
                <div class="category-list">
                    <a href="{{route('category',$product->category?->slug)}}" class="product-category">{{$product->category?->title}}</a>
                </div>
            @endif
            <h3 class="product-title">
                <a href="{{route('product',$product->slug)}}">{{$product->title}}</a>
            </h3>
            @include('site.partials._productFooterBox',['product'=>$product])
        </div>
    </div>
@endforeach
