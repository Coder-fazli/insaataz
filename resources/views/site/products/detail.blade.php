@extends('site.layouts.app')
@section('title',"$product->title")
@push('head')

@endpush

 <style>
        .shema_images{
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .product-contact-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        .product-contact-buttons .btn-call {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 22px;
            background-color: transparent;
            color: #2C468F;
            border: 2px solid #2C468F;
            border-radius: 25px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
        }
        .product-contact-buttons .btn-call:hover {
            background-color: #2C468F;
            color: #fff;
        }
        .product-contact-buttons .btn-whatsapp {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 22px;
            background-color: #25d366;
            color: #fff;
            border: 2px solid #25d366;
            border-radius: 25px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
        }
        .product-contact-buttons .btn-whatsapp:hover {
            background-color: #1da851;
            border-color: #1da851;
            color: #fff;
        }
        @media (max-width: 576px) {
            .product-contact-buttons {
                flex-direction: column;
            }
        }
    </style>
@section('content')

    <main class="main">
        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="demo1.html"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('menu.home')}}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{$product->category?->title}}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{$product->title}}</a></li>
                </ol>
            </nav>
            <div class="product-single-container product-single-default">
                <div class="cart-message d-none">
                    <strong class="single-cart-notice">“Men Black Sports Shoes”</strong>
                    <span>has been added to your cart.</span>
                </div>

                <div class="row">
                    <div class="col-lg-5 col-md-6 product-single-gallery">
                        <div class="product-slider-container">
                            <div class="label-group">

                                @if($product->is_best_seller)
                                    <div class="product-label label-hot">{{__('site.best_seller')}}</div>
                                @endif
                                {{--                                @if($discount=calculate_discount($product))--}}
                                {{--                                    <div class="product-label label-sale">-{{$discount}}%</div>--}}
                                {{--                                @endif--}}


                            </div>
                            
                            <div class="icon-container">
                                
                            @if (Auth::guard('client') && $product->isCompare($product->id))
                                <a href="{{route('profile.removeFromCompare',$product->id)}}" class="compare-btn text-center compare-active" style="z-index: 2;">
                                    <i class="fa fa-chart-simple" style="line-height: 3.3rem;"></i>
                                </a>
                            @else
                                <a href="{{route('profile.addCompare',$product->id)}}" class="compare-btn text-center" style="z-index: 2;">
                                    <i class="fa fa-chart-simple" style="line-height: 3.3rem;"></i>
                                </a>
                            @endif

                            @if (Auth::guard('client') && $product->isFavorite(Auth::guard('client')->id()))
                                <a href="{{route('profile.removeFromFavorite',$product->id)}}" class="fav-btn text-center" style="z-index: 2;">
                                    <i class="fas fa-heart text-danger" style="line-height: 3.3rem;"></i>
                                </a>
                            @else
                                <a href="{{route('profile.addFavorite',$product->id)}}"  class="fav-btn text-center" style="z-index: 2;">
                                    <i class="far fa-heart" style="line-height: 3.3rem;"></i>
                                </a>
                            @endif
                            
                            </div>

                            <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                @foreach($images as $image)
                                    <div class="product-item">
                                        <img class="product-single-image" src="{{get_imageAspect($image->image,'big')}}"
                                             data-zoom-image="{{get_imageAspect($image->image,'big')}}" width="468"
                                             height="468" alt="{{$product->title}}"/>
                                    </div>
                                @endforeach
                            </div>
                            <!-- End .product-single-carousel -->
                            <span class="prod-full-screen">
                                    <i class="icon-plus"></i>
                                </span>
                        </div>

                        <div class="prod-thumbnail owl-dots">
                            @foreach($images as $image)
                                <div class="owl-dot">
                                    <img src="{{get_image($image->image,'list')}}" width="110" height="110"
                                         alt="{{$product->title}}"/>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="col-lg-7 col-md-6 product-single-details">
                        <h1 class="product-title">{{$product->title}}</h1>
                        @if(session('success'))
                            <div class="alert alert-light text-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <hr class="short-divider">

                        <div class="product-desc">
                            <p>
                                {!! $product->desc !!}
                            </p>
                        </div>

                        <ul class="single-info-list">
                            <li>
                                {{__('site.code')}}
                                <strong>{{$product->code}}</strong>
                            </li>

                        </ul>

                        <div class="product-contact-buttons">
                            <a href="tel:+994102900101" class="btn-call">
                                <i class="fas fa-phone-alt"></i>
                                Zəng et
                            </a>
                            <a href="https://wa.me/994102900101" target="_blank" class="btn-whatsapp">
                                <i class="fab fa-whatsapp"></i>
                                WhatsApp
                            </a>
                        </div>

                        {{--                        <hr class="divider mb-0 mt-0">--}}

                        {{--                        <div class="product-single-share mb-2">--}}
                        {{--                            <label class="sr-only">Share:</label>--}}

                        {{--                            <div class="social-icons mr-2">--}}
                        {{--                                <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"--}}
                        {{--                                   title="Facebook"></a>--}}
                        {{--                                <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"--}}
                        {{--                                   title="Twitter"></a>--}}
                        {{--                                <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"--}}
                        {{--                                   title="Linkedin"></a>--}}
                        {{--                                <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank"--}}
                        {{--                                   title="Google +"></a>--}}
                        {{--                                <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank"--}}
                        {{--                                   title="Mail"></a>--}}
                        {{--                            </div>--}}
                        {{--                            <!-- End .social-icons -->--}}

                        {{--                            <a href="wishlist.html" class="btn-icon-wish add-wishlist" title="Add to Wishlist"><i--}}
                        {{--                                    class="icon-wishlist-2"></i><span>Add to--}}
                        {{--                                        Wishlist</span></a>--}}
                        {{--                        </div>--}}
                    </div>
                    <!-- End .product-single-details -->
                </div>
                <!-- End .row -->
            </div>
            <!-- End .product-single-container -->

            @if(!$features->isEmpty())

                <div class="product-single-tabs">
                    <ul class="nav nav-tabs" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" id="product-tab-tags" data-toggle="tab"
                               href="#product-tags-content"
                               role="tab" aria-controls="product-tags-content"
                               aria-selected="false">{{__('site.additional')}}</a>
                        </li>


                    </ul>

                    <div class="tab-content">


                        <div class="tab-pane fade show active" id="product-tags-content" role="tabpanel"
                             aria-labelledby="product-tab-tags">
                            <table class="table table-striped mt-2">
                                <tbody>
                                @foreach($features as $feature)
                                    <tr>
                                        <th>{{$feature->title}}</th>
                                        <td>{{$feature->desc}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- End .tab-content -->
                </div>
                <!-- End .product-single-tabs -->
            @endif


            @if($product->product_shema_images)
                <div class="shema_images" >
                    @foreach($product->product_shema_images as $product_shema_image)
                    <a href="{{get_image($product_shema_image->img)}}" target="_blank" class="shema_image">
                        <img src="{{get_image($product_shema_image->img)}}" alt="" width="500" height="600">
                    </a>
                    @endforeach
                </div>
   
            @endif
            <div class="products-section pt-0">
                <h2 class="section-title">{{__('site.relatedProducts')}}</h2>

                <div
                    class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center mb-2"
                    data-owl-options="{
						'dots': false,
						'nav': true,
						'responsive': {
							'992': {
								'items': 4
							},
							'1200': {
								'items': 5
							}
						}
					}">
                    @include('site.partials._productsHomeSlider',['products'=>$relatedProducts])


                </div>
            </div>

        </div>

    </main>
@endsection

@push('foot')


@endpush
