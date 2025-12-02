@foreach($products as $product)
    <div class="product-default left-details product-widget">
        <figure>
            <a href="{{route('product',$product->slug)}}">
                <img src="{{get_image($product->front_image,'list')}}" width="84"
                     height="84" alt="product">
                <img src="{{get_image($product->back_image,'list')}}" width="84"
                     height="84" alt="product">
            </a>
        </figure>

        <div class="product-details">
            <h3 class="product-title"><a href="{{route('product',$product->slug)}}">{{Str::limit($product->title,80)}}</a></h3>



            <div class="price-box">
                @if($product->discount_price)

                    <span class="old-price">{!! currency_index() !!} {{$product->price}}</span>
                    <span class="new-price">{!! currency_index() !!} {{$product->discount_price}}</span>
                @else
                    <span class="new-price">{!! currency_index() !!} {{$product->price}}</span>
                @endif
            </div>
            <!-- End .price-box -->
        </div>
        <!-- End .product-details -->
    </div>
@endforeach
