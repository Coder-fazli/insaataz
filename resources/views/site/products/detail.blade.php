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
            background-color: #2C468F;
            color: #fff;
            border: 2px solid #2C468F;
            border-radius: 25px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
        }
        .product-contact-buttons .btn-call:hover {
            background-color: #1e3266;
            border-color: #1e3266;
            color: #fff;
        }
        .product-contact-buttons .btn-call svg,
        .product-contact-buttons .btn-whatsapp svg {
            width: 16px;
            height: 16px;
            fill: currentColor;
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
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                                Zəng et
                            </a>
                            <a href="https://wa.me/994102900101" target="_blank" class="btn-whatsapp">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
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
