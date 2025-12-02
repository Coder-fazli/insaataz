@if(!$products->isEmpty())
    <div class="dropdown-cart-header">{{__('site.shopping_cart')}}</div>

    <div class="dropdown-cart-products">
        @foreach($products as $product)
            <div class="product">
                <div class="product-details">
                    <h4 class="product-title">
                        <a href="{{route('product',$product->slug)}}">{{$product->title}}</a>
                    </h4>
                    <span class="cart-product-info">
						<span class="cart-product-qty">{{$product->qty}}</span> × {!! currency_index() !!} {{$product->discount_price ?? $product->price }}
                    </span>
                </div>
                <figure class="product-image-container">
                    <a href="{{route('product',$product->slug)}}" class="product-image">
                        <img src="{{get_image($product->front_image,'list')}}" alt="{{$product->title}}"
                             width="80" height="80">
                    </a>
                    <a href="#" class="btn-remove btnRemove" title="Remove Product"
                       data-row="{{$product->rowId}}"><span>×</span></a>
                </figure>
            </div>
        @endforeach
    </div>
    <div class="dropdown-cart-total">
        <span>{{__('site.total')}}:</span>

        <span class="cart-total-price float-right">{!! currency_index() !!} {{$products->sum('total')}}</span>
    </div>

    <div class="dropdown-cart-action">
        <a href="{{route('cart')}}"
           class="btn btn-gray btn-block view-cart">{{__('site.view_cart')}}</a>
    </div>
@else
    <div class="dropdown-cart-header">{{__('site.shopping_cart')}}</div>

    <h4 class="product-title">
        {{__('site.add_product_to_cart')}}
    </h4>
@endif
