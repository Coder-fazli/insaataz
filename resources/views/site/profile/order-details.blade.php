@extends('site.layouts.app')
@push('head')

@endpush
@section('content')
    <div class="container">
        <h2 class="mt-3 mb-2">{{__('site.order_details')}}</h2>
        <main class="main">
            <div class="container">
                <div class="row" id="productBox">
                    <div class="col-6 col-sm-4 ">
                        <h5 class="mb-1">{{__('site.order_id_inOrders')}}:</h5>
                        <p>{{$order->id}}</p>
                    </div>
                    <div class="col-6 col-sm-4 ">
                        <h5 class="mb-1">{{__('site.fullname_inOrders')}}:</h5>
                        <p>{{$order->name}}</p>
                    </div>
                    <div class="col-6 col-sm-4 ">
                        <h5 class="mb-1">{{__('site.email_inOrders')}}:</h5>
                        <p>{{$order->email}}</p>
                    </div>
                    <div class="col-6 col-sm-4 ">
                        <h5 class="mb-1">{{__('site.phone_inOrders')}}:</h5>
                        <p>{{$order->phone}}</p>
                    </div>
                    @php
                        if($order->payment == 'card') {
                            $payment = __('site.card_inOrder');
                        } elseif($order->payment == 'cash'){
                            $payment = __('site.cash_inOrder');
                        } else {
                            $payment = $order->payment;
                        }
                        
                        if($order->delivery == 'take'){
                            $delivery = __('site.takeFromOffice_inOrder');
                        } else {
                            $delivery = $order->delivery;
                        }
                    @endphp
                    <div class="col-6 col-sm-4 ">
                        <h5 class="mb-1">{{__('site.payment_inOrders')}}:</h5>
                        <p>{{$payment}}</p>
                    </div>
                    <div class="col-6 col-sm-4 ">
                        <h5 class="mb-1">{{__('site.delivery_inOrders')}}:</h5>
                        <p>{{$delivery}}</p>
                    </div>
                    <div class="col-6 col-sm-4 ">
                        <h5 class="mb-1">{{__('site.total_inOrders')}}:</h5>
                        <p>{{$order->total}}</p>
                    </div>
                    <div class="col-12">
                        <h5 class="mb-1">{{__('site.message_inOrders')}}:</h5>
                        <p>{{$order->message}}</p>
                    </div>
                </div>
                
                <h2 class="mt-3 mb-2">{{__('site.order_products')}}</h2>
                <div class="row" id="productBox">
                    @foreach($order->items as $item)
                        @php
                            $product = $item->product;
                        @endphp
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
                                            <img src="{{get_image($product->front_image,'list')}}" width="280" height="280"
                                                 alt="product"/>
                                            <img src="{{get_image($product->back_image,'list')}}" width="280" height="280"
                                                 alt="product"/>
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
                                <div class="product-details">
                                    @if($product->category?->slug)
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="{{route('category',$product->category?->slug)}}" class="product-category">{{$product->category?->title}}</a>
                                            </div>
                                        </div>
                                    @endif
                                    <h3 class="product-title"><a href="{{route('product',$product->slug)}}">{{Str::limit($product->title,33)}}</a></h3>

                                    <div class="price-box">
                                        <span class="product-qyt">{{__('site.price_inOrder') . ": " . $item->price}}</span> <br />
                                        <span class="product-qyt">{{__('site.count_inOrder') . ": " . $item->qty}}</span>
                                    </div>
                                    
                                    <div class="price-box">
                                        <span class="product-price">{{__('site.total_inOrder') . ": " . $item->total}}</span>
                                    </div>
                                    
                                    <div class="product-action">
                                        <a  class="btn-icon-wish btnAddToCart" data-id="{{$product->id}}" title="{{__('site.wishlist')}}"><i
                                                class="icon-cart"></i></a>
                                        <a href="{{route('product',$product->slug)}}" class="btn-icon btn-add-cart"><i
                                                class="fa fa-arrow-right"></i><span>{{__('site.more')}}</span></a>
                                        <a href="{{route('product.quickView',$product->id)}}" class="btn-quickview" title="{{__('site.Quick_View')}}"><i
                                                class="fas fa-external-link-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mb-6"></div>
        </main>
    </div>
@endsection