<div class="product-action">
    <a  class="btn-icon-wish btnAddToCart" data-id="{{$product->id}}" title="{{__('site.wishlist')}}"><i
            class="icon-cart"></i></a>
    <a href="{{route('product',$product->slug)}}" class="btn-icon  btn-add-cart "><i
            class="fa fa-arrow-right"></i><span>{{__('site.more')}}</span></a>
    <a href="{{route('product.quickView',$product->id)}}" class="btn-quickview" title="{{__('site.Quick_View')}}"><i
            class="fas fa-external-link-alt"></i></a>
</div>
