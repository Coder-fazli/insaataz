@extends('site.layouts.app')
@section('title',__('site.seo_title'))
@section('content')

    <main class="main">
        <div class="container slider-container">
            <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big mb-2 text-uppercase"
                 data-owl-options="{
				'loop': true,
				'nav': true,
				'dots': true
			}">
                @foreach($sliders as $slider)
                    <div class="home-slide home-slide1 banner">
                        <img class="slide-bg" src="{{get_image($slider->image)}}" width="1903"
                             height="499" alt="slider image">
                        <div class="container d-flex align-items-center">
                            <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                                <h2 class="text-transform-none m-b-3">{{$slider->title}}</h2>
                                <h4 class="text-transform-none mb-0">{{$slider->subtitle}}</h4>
                                {{--                        <h3 class="m-b-3">70% Off</h3>--}}
                                {{--                        <h5 class="d-inline-block mb-0">--}}
                                {{--                            <span>Starting At</span>--}}
                                {{--                            <b class="coupon-sale-text text-white bg-secondary align-middle"><sup>$</sup><em--}}
                                {{--                                    class="align-text-top">199</em><sup>99</sup></b>--}}
                                {{--                        </h5>--}}
                                {{--                        <a href="category.html" class="btn btn-dark btn-lg">Shop Now!</a>--}}
                            </div>
                            <!-- End .banner-layer -->
                        </div>
                    </div>
                @endforeach

            </div>
        </div>


    {{--        <div class="container">--}}
    {{--            <div class="info-boxes-slider owl-carousel owl-theme mb-2" data-owl-options="{--}}
    {{--					'dots': false,--}}
    {{--					'loop': false,--}}
    {{--					'responsive': {--}}
    {{--						'576': {--}}
    {{--							'items': 2--}}
    {{--						},--}}
    {{--						'992': {--}}
    {{--							'items': 3--}}
    {{--						}--}}
    {{--					}--}}
    {{--				}">--}}
    {{--                <div class="info-box info-box-icon-left">--}}
    {{--                    <i class="icon-shipping"></i>--}}

    {{--                    <div class="info-box-content">--}}
    {{--                        <h4>FREE SHIPPING &amp; RETURN</h4>--}}
    {{--                        <p class="text-body">Free shipping on all orders over $99.</p>--}}
    {{--                    </div>--}}
    {{--                    <!-- End .info-box-content -->--}}
    {{--                </div>--}}
    {{--                <!-- End .info-box -->--}}

    {{--                <div class="info-box info-box-icon-left">--}}
    {{--                    <i class="icon-money"></i>--}}

    {{--                    <div class="info-box-content">--}}
    {{--                        <h4>MONEY BACK GUARANTEE</h4>--}}
    {{--                        <p class="text-body">100% money back guarantee</p>--}}
    {{--                    </div>--}}
    {{--                    <!-- End .info-box-content -->--}}
    {{--                </div>--}}
    {{--                <!-- End .info-box -->--}}

    {{--                <div class="info-box info-box-icon-left">--}}
    {{--                    <i class="icon-support"></i>--}}

    {{--                    <div class="info-box-content">--}}
    {{--                        <h4>ONLINE SUPPORT 24/7</h4>--}}
    {{--                        <p class="text-body">Lorem ipsum dolor sit amet.</p>--}}
    {{--                    </div>--}}
    {{--                    <!-- End .info-box-content -->--}}
    {{--                </div>--}}
    {{--                <!-- End .info-box -->--}}
    {{--            </div>--}}
    {{--            <!-- End .info-boxes-slider -->--}}


    {{--        </div>--}}
    <!-- End .container -->

        <!-- Partner section start -->
        @if(isset($partners) && !$partners->isEmpty())
        <section id="partners-section">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12">
                        <div class="center" style="text-align: center;">
                            <h2 class="section-title heading-border ls-20 border-0">{{__('site.partner_title')}}</h2>
                        </div>
                    </div>
                    <div class="col-12" style="display:flex; align-items:center;gap:20px;">
                        <div class="partner-next"><i class="fa-solid fa-chevron-left"></i></div>
                        <div class="swiper partners__slider">
                            <div class="swiper-wrapper">
                                @foreach($partners as $value)
                                    <div class="swiper-slide">
                                        @if(!empty($value->link))
                                            <a href="{{$value->link}}" target="_blank" rel="noopener noreferrer">
                                                <img src="{{asset('storage/'.$value->image)}}" alt="{{$value->title}}">
                                            </a>
                                        @else
                                            <div>
                                                <img src="{{asset('storage/'.$value->image)}}" alt="{{$value->title}}">
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="partner-prev"><i class="fa-solid fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
        </section>
        @else
        <!-- DEBUG: Partners empty or not set -->
        @endif
        <!-- Partner section end -->

        @if(!$chosenProducts->isEmpty())
            <section class="featured-products-section">
                <div class="container">
                    <h2 class="section-title heading-border ls-20 border-0">{{__('site.chosen_for_you')}}</h2>

                    <div class="row">


                        @include('site.partials._productsList',['products'=>$chosenProducts])


                    </div>
                    <!-- End .featured-proucts -->
                </div>
            </section>
        @endif

        @if(!$bestSellerProducts->isEmpty())
            <section class="new-products-section">
                <div class="container">
                    <h2 class="section-title heading-border ls-20 border-0">{{__('site.best_seller')}}</h2>

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
                        @include('site.partials._productsHomeSlider',['products'=>$bestSellerProducts])


                    </div>

                <!-- End .featured-proucts -->

{{--                    <div class="banner banner-big-sale appear-animate" data-animation-delay="200"--}}
{{--                         data-animation-name="fadeInUpShorter"--}}
{{--                         style="background: #2A95CB center/cover url('assets/images/demoes/demo4/banners/banner-4.jpg');">--}}
{{--                        <div class="banner-content row align-items-center mx-0">--}}
{{--                            <div class="col-md-9 col-sm-8">--}}
{{--                                <h2 class="text-white text-uppercase text-center text-sm-left ls-n-20 mb-md-0 px-4">--}}
{{--                                    <b class="d-inline-block mr-3 mb-1 mb-md-0">Big Sale</b> All new fashion brands--}}
{{--                                    items up--}}
{{--                                    to 70% off--}}
{{--                                    <small class="text-transform-none align-middle">Online Purchases Only</small>--}}
{{--                                </h2>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-3 col-sm-4 text-center text-sm-right">--}}
{{--                                <a class="btn btn-light btn-white btn-lg" href="category.html">View Sale</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    {{--                    <h2 class="section-title categories-section-title heading-border border-0 ls-0 appear-animate"--}}
                    {{--                        data-animation-delay="100" data-animation-name="fadeInUpShorter">Browse Our Categories--}}
                    {{--                    </h2>--}}

                    {{--                    <div class="categories-slider owl-carousel owl-theme show-nav-hover nav-outer">--}}
                    {{--                        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">--}}
                    {{--                            <a href="category.html">--}}
                    {{--                                <figure>--}}
                    {{--                                    <img src="/webcoder/assets/images/demoes/demo4/products/categories/category-1.jpg"--}}
                    {{--                                         alt="category" width="280" height="240"/>--}}
                    {{--                                </figure>--}}
                    {{--                                <div class="category-content">--}}
                    {{--                                    <h3>Dress</h3>--}}
                    {{--                                    <span><mark class="count">3</mark> products</span>--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                        </div>--}}

                    {{--                        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">--}}
                    {{--                            <a href="category.html">--}}
                    {{--                                <figure>--}}
                    {{--                                    <img src="/webcoder/assets/images/demoes/demo4/products/categories/category-2.jpg"--}}
                    {{--                                         alt="category" width="220" height="220"/>--}}
                    {{--                                </figure>--}}
                    {{--                                <div class="category-content">--}}
                    {{--                                    <h3>Watches</h3>--}}
                    {{--                                    <span><mark class="count">3</mark> products</span>--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                        </div>--}}

                    {{--                        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">--}}
                    {{--                            <a href="category.html">--}}
                    {{--                                <figure>--}}
                    {{--                                    <img src="/webcoder/assets/images/demoes/demo4/products/categories/category-3.jpg"--}}
                    {{--                                         alt="category" width="220" height="220"/>--}}
                    {{--                                </figure>--}}
                    {{--                                <div class="category-content">--}}
                    {{--                                    <h3>Machine</h3>--}}
                    {{--                                    <span><mark class="count">3</mark> products</span>--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                        </div>--}}

                    {{--                        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">--}}
                    {{--                            <a href="category.html">--}}
                    {{--                                <figure>--}}
                    {{--                                    <img src="/webcoder/assets/images/demoes/demo4/products/categories/category-4.jpg"--}}
                    {{--                                         alt="category" width="220" height="220"/>--}}
                    {{--                                </figure>--}}
                    {{--                                <div class="category-content">--}}
                    {{--                                    <h3>Sofa</h3>--}}
                    {{--                                    <span><mark class="count">3</mark> products</span>--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                        </div>--}}

                    {{--                        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">--}}
                    {{--                            <a href="category.html">--}}
                    {{--                                <figure>--}}
                    {{--                                    <img src="/webcoder/assets/images/demoes/demo4/products/categories/category-6.jpg"--}}
                    {{--                                         alt="category" width="220" height="220"/>--}}
                    {{--                                </figure>--}}
                    {{--                                <div class="category-content">--}}
                    {{--                                    <h3>Headphone</h3>--}}
                    {{--                                    <span><mark class="count">3</mark> products</span>--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                        </div>--}}

                    {{--                        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">--}}
                    {{--                            <a href="category.html">--}}
                    {{--                                <figure>--}}
                    {{--                                    <img src="/webcoder/assets/images/demoes/demo4/products/categories/category-5.jpg"--}}
                    {{--                                         alt="category" width="220" height="220"/>--}}
                    {{--                                </figure>--}}
                    {{--                                <div class="category-content">--}}
                    {{--                                    <h3>Sports</h3>--}}
                    {{--                                    <span><mark class="count">3</mark> products</span>--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </section>
        @endif

        @if(!$discountedRandomProducts->isEmpty())
            <section class="new-products-section">
                <div class="container">
                    <h2 class="section-title heading-border ls-20 border-0">{{__('site.discounted_products')}}</h2>

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
                        @include('site.partials._productsHomeSlider',['products'=>$discountedRandomProducts])
                    </div>

                <!-- End .featured-proucts -->
                </div>
            </section>

        @endif
{{--        <section class="feature-boxes-container">--}}
{{--            <div class="container appear-animate" data-animation-name="fadeInUpShorter">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="feature-box px-sm-5 feature-box-simple text-center">--}}
{{--                            <div class="feature-box-icon">--}}
{{--                                <i class="icon-earphones-alt"></i>--}}
{{--                            </div>--}}

{{--                            <div class="feature-box-content p-0">--}}
{{--                                <h3>Customer Support</h3>--}}
{{--                                <h5>You Won't Be Alone</h5>--}}

{{--                                <p>We really care about you and your website as much as you do. Purchasing Porto or any--}}
{{--                                    other theme from us you get 100% free support.</p>--}}
{{--                            </div>--}}
{{--                            <!-- End .feature-box-content -->--}}
{{--                        </div>--}}
{{--                        <!-- End .feature-box -->--}}
{{--                    </div>--}}
{{--                    <!-- End .col-md-4 -->--}}

{{--                    <div class="col-md-4">--}}
{{--                        <div class="feature-box px-sm-5 feature-box-simple text-center">--}}
{{--                            <div class="feature-box-icon">--}}
{{--                                <i class="icon-credit-card"></i>--}}
{{--                            </div>--}}

{{--                            <div class="feature-box-content p-0">--}}
{{--                                <h3>Fully Customizable</h3>--}}
{{--                                <h5>Tons Of Options</h5>--}}

{{--                                <p>With Porto you can customize the layout, colors and styles within only a few minutes.--}}
{{--                                    Start creating an amazing website right now!</p>--}}
{{--                            </div>--}}
{{--                            <!-- End .feature-box-content -->--}}
{{--                        </div>--}}
{{--                        <!-- End .feature-box -->--}}
{{--                    </div>--}}
{{--                    <!-- End .col-md-4 -->--}}

{{--                    <div class="col-md-4">--}}
{{--                        <div class="feature-box px-sm-5 feature-box-simple text-center">--}}
{{--                            <div class="feature-box-icon">--}}
{{--                                <i class="icon-action-undo"></i>--}}
{{--                            </div>--}}
{{--                            <div class="feature-box-content p-0">--}}
{{--                                <h3>Powerful Admin</h3>--}}
{{--                                <h5>Made To Help You</h5>--}}

{{--                                <p>Porto has very powerful admin features to help customer to build their own shop in--}}
{{--                                    minutes without any special skills in web development.</p>--}}
{{--                            </div>--}}
{{--                            <!-- End .feature-box-content -->--}}
{{--                        </div>--}}
{{--                        <!-- End .feature-box -->--}}
{{--                    </div>--}}
{{--                    <!-- End .col-md-4 -->--}}
{{--                </div>--}}
{{--                <!-- End .row -->--}}
{{--            </div>--}}
{{--            <!-- End .container-->--}}
{{--        </section>--}}
        <!-- End .feature-boxes-container -->

        {{--        <section class="promo-section bg-dark" data-parallax="{'speed': 2, 'enableOnMobile': true}"--}}
        {{--                 data-image-src="/webcoder/assets/images/demoes/demo4/banners/banner-5.jpg">--}}
        {{--            <div class="promo-banner banner container text-uppercase">--}}
        {{--                <div class="banner-content row align-items-center text-center">--}}
        {{--                    <div class="col-md-4 ml-xl-auto text-md-right appear-animate"--}}
        {{--                         data-animation-name="fadeInRightShorter" data-animation-delay="600">--}}
        {{--                        <h2 class="mb-md-0 text-white">Top Fashion<br>Deals</h2>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-md-4 col-xl-3 pb-4 pb-md-0 appear-animate" data-animation-name="fadeIn"--}}
        {{--                         data-animation-delay="300">--}}
        {{--                        <a href="category.html" class="btn btn-dark btn-black ls-10">View Sale</a>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-md-4 mr-xl-auto text-md-left appear-animate" data-animation-name="fadeInLeftShorter"--}}
        {{--                         data-animation-delay="600">--}}
        {{--                        <h4 class="mb-1 mt-1 font1 coupon-sale-text p-0 d-block ls-n-10 text-transform-none">--}}
        {{--                            <b>Exclusive--}}
        {{--                                COUPON</b></h4>--}}
        {{--                        <h5 class="mb-1 coupon-sale-text text-white ls-10 p-0"><i class="ls-0">UP TO</i><b--}}
        {{--                                class="text-white bg-secondary ls-n-10">$100</b> OFF</h5>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </section>--}}

{{--        <section class="blog-section pb-0">--}}
{{--            <div class="container">--}}
{{--                <h2 class="section-title heading-border border-0 appear-animate" data-animation-name="fadeInUp">--}}
{{--                    Latest News</h2>--}}

{{--                <div class="owl-carousel owl-theme appear-animate" data-animation-name="fadeIn" data-owl-options="{--}}
{{--						'loop': false,--}}
{{--						'margin': 20,--}}
{{--						'autoHeight': true,--}}
{{--						'autoplay': false,--}}
{{--						'dots': false,--}}
{{--						'items': 2,--}}
{{--						'responsive': {--}}
{{--							'0': {--}}
{{--								'items': 1--}}
{{--							},--}}
{{--							'480': {--}}
{{--								'items': 2--}}
{{--							},--}}
{{--							'576': {--}}
{{--								'items': 3--}}
{{--							},--}}
{{--							'768': {--}}
{{--								'items': 4--}}
{{--							}--}}
{{--						}--}}
{{--					}">--}}
{{--                    <article class="post">--}}
{{--                        <div class="post-media">--}}
{{--                            <a href="single.html">--}}
{{--                                <img src="/webcoder/assets/images/blog/home/post-1.jpg" alt="Post" width="225"--}}
{{--                                     height="280">--}}
{{--                            </a>--}}
{{--                            <div class="post-date">--}}
{{--                                <span class="day">26</span>--}}
{{--                                <span class="month">Feb</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- End .post-media -->--}}

{{--                        <div class="post-body">--}}
{{--                            <h2 class="post-title">--}}
{{--                                <a href="single.html">Top New Collection</a>--}}
{{--                            </h2>--}}
{{--                            <div class="post-content">--}}
{{--                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam--}}
{{--                                    non tellus sem. Aenean...</p>--}}
{{--                            </div>--}}
{{--                            <!-- End .post-content -->--}}
{{--                            <a href="single.html" class="post-comment">0 Comments</a>--}}
{{--                        </div>--}}
{{--                        <!-- End .post-body -->--}}
{{--                    </article>--}}
{{--                    <!-- End .post -->--}}

{{--                    <article class="post">--}}
{{--                        <div class="post-media">--}}
{{--                            <a href="single.html">--}}
{{--                                <img src="/webcoder/assets/images/blog/home/post-2.jpg" alt="Post" width="225"--}}
{{--                                     height="280">--}}
{{--                            </a>--}}
{{--                            <div class="post-date">--}}
{{--                                <span class="day">26</span>--}}
{{--                                <span class="month">Feb</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- End .post-media -->--}}

{{--                        <div class="post-body">--}}
{{--                            <h2 class="post-title">--}}
{{--                                <a href="single.html">Fashion Trends</a>--}}
{{--                            </h2>--}}
{{--                            <div class="post-content">--}}
{{--                                <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised--}}
{{--                                    in the 1960s with the release of...</p>--}}
{{--                            </div>--}}
{{--                            <!-- End .post-content -->--}}
{{--                            <a href="single.html" class="post-comment">0 Comments</a>--}}
{{--                        </div>--}}
{{--                        <!-- End .post-body -->--}}
{{--                    </article>--}}
{{--                    <!-- End .post -->--}}

{{--                    <article class="post">--}}
{{--                        <div class="post-media">--}}
{{--                            <a href="single.html">--}}
{{--                                <img src="/webcoder/assets/images/blog/home/post-3.jpg" alt="Post" width="225"--}}
{{--                                     height="280">--}}
{{--                            </a>--}}
{{--                            <div class="post-date">--}}
{{--                                <span class="day">26</span>--}}
{{--                                <span class="month">Feb</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- End .post-media -->--}}

{{--                        <div class="post-body">--}}
{{--                            <h2 class="post-title">--}}
{{--                                <a href="single.html">Right Choices</a>--}}
{{--                            </h2>--}}
{{--                            <div class="post-content">--}}
{{--                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem--}}
{{--                                    Ipsum has been the...</p>--}}
{{--                            </div>--}}
{{--                            <!-- End .post-content -->--}}
{{--                            <a href="single.html" class="post-comment">0 Comments</a>--}}
{{--                        </div>--}}
{{--                        <!-- End .post-body -->--}}
{{--                    </article>--}}
{{--                    <!-- End .post -->--}}

{{--                    <article class="post">--}}
{{--                        <div class="post-media">--}}
{{--                            <a href="single.html">--}}
{{--                                <img src="/webcoder/assets/images/blog/home/post-4.jpg" alt="Post" width="225"--}}
{{--                                     height="280">--}}
{{--                            </a>--}}
{{--                            <div class="post-date">--}}
{{--                                <span class="day">26</span>--}}
{{--                                <span class="month">Feb</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- End .post-media -->--}}

{{--                        <div class="post-body">--}}
{{--                            <h2 class="post-title">--}}
{{--                                <a href="single.html">Perfect Accessories</a>--}}
{{--                            </h2>--}}
{{--                            <div class="post-content">--}}
{{--                                <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised--}}
{{--                                    in the 1960s with the release of...</p>--}}
{{--                            </div>--}}
{{--                            <!-- End .post-content -->--}}
{{--                            <a href="single.html" class="post-comment">0 Comments</a>--}}
{{--                        </div>--}}
{{--                        <!-- End .post-body -->--}}
{{--                    </article>--}}
{{--                    <!-- End .post -->--}}
{{--                </div>--}}


{{--                <x-partners/>--}}
{{--                <hr class="mt-4 m-b-5">--}}
{{--                <div class="product-widgets-container row pb-2">--}}
{{--                    <div class="col-lg-4 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter"--}}
{{--                         data-animation-delay="200">--}}
{{--                        <h4 class="section-sub-title">{{__('site.chosen_products')}}</h4>--}}
{{--                        @include('site.partials.miniProductBoxs',['products'=>$chosenRandomProducts])--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-4 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter"--}}
{{--                         data-animation-delay="500">--}}
{{--                        <h4 class="section-sub-title">{{__('site.best_seller_products')}}</h4>--}}
{{--                        @include('site.partials.miniProductBoxs',['products'=>$bestSellerRandomProducts])--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-4 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter"--}}
{{--                         data-animation-delay="800">--}}
{{--                        <h4 class="section-sub-title">{{__('site.latest_products')}}</h4>--}}
{{--                        @include('site.partials.miniProductBoxs',['products'=>$latestRandomProducts])--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
    </main>
@endsection

@push('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<style>
    /* Slider Container - Box Style */
    .slider-container {
        margin-top: 20px;
        margin-bottom: 30px;
        position: relative;
        overflow: hidden;
        border-radius: 16px;
    }

    .slider-container .home-slider {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        border-radius: 16px;
        overflow: hidden !important;
    }

    .slider-container .home-slide {
        border-radius: 16px;
        overflow: hidden;
    }

    .slider-container .home-slide img {
        border-radius: 16px;
        display: block;
        width: 100%;
    }

    /* Скрываем другие слайды по краям - ВАЖНО! */
    .slider-container .home-slider .owl-stage-outer {
        overflow: hidden !important;
        border-radius: 16px;
    }

    .slider-container .home-slider .owl-stage {
        display: flex !important;
    }

    .slider-container .home-slider .owl-item {
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .slider-container .home-slider .owl-item.active {
        opacity: 1;
    }

    /* Минималистичные стрелки навигации */
    .slider-container .home-slider .owl-nav {
        margin: 0 !important;
    }

    .slider-container .home-slider .owl-nav button.owl-prev,
    .slider-container .home-slider .owl-nav button.owl-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.9) !important;
        border: none !important;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
        z-index: 10;
    }

    .slider-container .home-slider .owl-nav button.owl-prev {
        left: 20px;
    }

    .slider-container .home-slider .owl-nav button.owl-next {
        right: 20px;
    }

    .slider-container .home-slider .owl-nav button.owl-prev:hover,
    .slider-container .home-slider .owl-nav button.owl-next:hover {
        background: rgba(255, 255, 255, 1) !important;
        transform: translateY(-50%) scale(1.1);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
    }

    .slider-container .home-slider .owl-nav button span {
        font-size: 24px;
        color: #333;
        font-weight: bold;
        line-height: 1;
    }

    /* Минималистичные dots (точки) */
    .slider-container .home-slider .owl-dots {
        position: absolute;
        bottom: 20px;
        width: 100%;
        display: flex;
        justify-content: center;
        gap: 8px;
        z-index: 10;
    }

    .slider-container .home-slider .owl-dots .owl-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        border: none;
        transition: all 0.3s ease;
        padding: 0;
    }

    .slider-container .home-slider .owl-dots .owl-dot:hover {
        background: rgba(255, 255, 255, 0.8);
        transform: scale(1.2);
    }

    .slider-container .home-slider .owl-dots .owl-dot.active {
        background: rgba(255, 255, 255, 1);
        width: 30px;
        border-radius: 5px;
    }

    .slider-container .home-slider .owl-dots .owl-dot span {
        display: none;
    }

    @media (max-width: 767px) {
        .slider-container {
            margin-top: 15px;
            margin-bottom: 20px;
            border-radius: 12px;
        }

        .slider-container .home-slider {
            border-radius: 12px;
        }

        .slider-container .home-slide {
            border-radius: 12px;
        }

        .slider-container .home-slide img {
            border-radius: 12px;
        }

        .slider-container .home-slider .owl-stage-outer {
            border-radius: 12px;
        }

        .slider-container .home-slider .owl-nav button.owl-prev {
            left: 10px;
            width: 35px;
            height: 35px;
        }

        .slider-container .home-slider .owl-nav button.owl-next {
            right: 10px;
            width: 35px;
            height: 35px;
        }

        .slider-container .home-slider .owl-nav button span {
            font-size: 18px;
        }

        .slider-container .home-slider .owl-dots {
            bottom: 15px;
        }
    }

    #partners-section {
        padding: 30px 0;
    }

    #partners-section .partners__slider {
        width: 100%;
        height: 120px;
    }

    #partners-section .swiper-wrapper {
        display: flex;
        align-items: center;
    }

    #partners-section .swiper-slide {
        display: flex !important;
        align-items: center;
        justify-content: center;
        height: 120px !important;
        width: auto;
        background-color: #f0f0f0;
        padding: 15px;
        transition: border 0.3s;
        box-sizing: border-box;
    }

    #partners-section .swiper-slide:hover {
        border: 2px solid #cfd8dc;
    }

    #partners-section .swiper-slide a,
    #partners-section .swiper-slide > div {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #partners-section .swiper-slide img {
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
        object-fit: contain;
        display: block;
    }

    #partners-section .partner-next,
    #partners-section .partner-prev {
        display: none; /* Mobil üçün gizlət */
    }

    #partners-section .center h2 {
        margin-bottom: 20px;
        font-size: 22px;
    }

    #partners-section .col-12[style*="display:flex"] {
        gap: 0 !important;
        justify-content: center;
    }

    /* Swiper pagination */
    #partners-section .swiper-pagination {
        position: relative;
        margin-top: 15px;
        bottom: auto;
    }

    #partners-section .swiper-pagination-bullet {
        width: 8px;
        height: 8px;
        background: #999;
        opacity: 0.5;
    }

    #partners-section .swiper-pagination-bullet-active {
        background: #08C;
        opacity: 1;
    }

    /* Tablet və Desktop üçün */
    @media (min-width: 768px) {
        #partners-section {
            padding: 40px 0;
        }

        #partners-section .partners__slider {
            height: 150px;
        }

        #partners-section .swiper-slide {
            height: 150px !important;
            padding: 20px;
        }

        #partners-section .partner-next,
        #partners-section .partner-prev {
            display: block; /* Tablet və desktop üçün göstər */
            font-size: 24px;
            color: #333;
            transition: color 0.3s;
            cursor: pointer;
            flex-shrink: 0;
            z-index: 10;
            width: 40px;
            text-align: center;
        }

        #partners-section .partner-next:hover,
        #partners-section .partner-prev:hover {
            color: #08C;
        }

        #partners-section .center h2 {
            margin-bottom: 30px;
            font-size: 28px;
        }

        #partners-section .col-12[style*="display:flex"] {
            gap: 20px !important;
        }

        /* Tablet və desktop üçün pagination gizlət */
        #partners-section .swiper-pagination {
            display: none;
        }
    }

    /* Böyük ekranlar üçün */
    @media (min-width: 1200px) {
        #partners-section .partners__slider {
            height: 187px;
        }

        #partners-section .swiper-slide {
            height: 187px !important;
            padding: 30px;
        }
    }
</style>
@endpush

@push('foot')
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    // Инициализация слайдера партнеров
    window.addEventListener('load', function() {
        console.log('Initializing Partners Swiper...');

        const swiperEl = document.querySelector('.partners__slider');
        if (swiperEl) {
            console.log('Swiper element found!');
            console.log('Slides count:', document.querySelectorAll('.partners__slider .swiper-slide').length);

            try {
                const partnersSwiper = new Swiper(".partners__slider", {
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    navigation: {
                        nextEl: ".partner-prev",
                        prevEl: ".partner-next",
                    },
                    loop: true,
                    slidesPerView: 4,
                    spaceBetween: 20,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        320: {
                            slidesPerView: 2,
                            spaceBetween: 10
                        },
                        576: {
                            slidesPerView: 2,
                            spaceBetween: 15
                        },
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 15
                        },
                        992: {
                            slidesPerView: 4,
                            spaceBetween: 20
                        },
                        1200: {
                            slidesPerView: 4,
                            spaceBetween: 20
                        }
                    },
                    on: {
                        init: function() {
                            console.log('Swiper initialized successfully!');
                        },
                    },
                });
                console.log('Partners Swiper object:', partnersSwiper);
            } catch(e) {
                console.error('Swiper initialization error:', e);
            }
        } else {
            console.error('Swiper element NOT found!');
        }
    });
</script>
@endpush
