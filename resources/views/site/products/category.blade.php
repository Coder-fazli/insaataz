@extends('site.layouts.app')
@section('title',__('menu.portfolio'))

@push('head')
    <link rel="stylesheet" href="/webcoder/assets/css/style.min.css">
@endpush

@section('content')

    <main class="main">
        {{--        <div class="category-banner-container bg-gray">--}}
        {{--            <div class="category-banner banner text-uppercase" style="background: no-repeat 60%/cover url('/webcoder/assets/images/banners/banner-top.jpg');">--}}
        {{--                <div class="container position-relative">--}}
        {{--                    <div class="row">--}}
        {{--                        <div class="pl-lg-5 pb-5 pb-md-0 col-sm-5 col-xl-4 col-lg-4 offset-1">--}}
        {{--                            <h3>Electronic<br>Deals</h3>--}}
        {{--                            <a href="category.html" class="btn btn-dark">Get Yours!</a>--}}
        {{--                        </div>--}}
        {{--                        <div class="pl-lg-3 col-sm-4 offset-sm-0 offset-1 pt-3">--}}
        {{--                            <div class="coupon-sale-content">--}}
        {{--                                <h4 class="m-b-1 coupon-sale-text bg-white text-transform-none">Exclusive COUPON--}}
        {{--                                </h4>--}}
        {{--                                <h5 class="mb-2 coupon-sale-text d-block ls-10 p-0"><i class="ls-0">UP TO</i><b class="text-dark">$100</b> OFF</h5>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}

        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    {{--                    <li class="breadcrumb-item"><a href="demo4.html"><i class="icon-home"></i></a></li>--}}
                    {{--                    <li class="breadcrumb-item"><a href="#">Men</a></li>--}}
                    {{--                    <li class="breadcrumb-item active" aria-current="page">Accessories</li>--}}
                </ol>
            </nav>

            <div class="row">
                <div class="col-lg-9 main-content">
                    <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                        <div class="toolbox-left">
                            <a href="#" class="sidebar-toggle">
                                <svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                    <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                    <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                    <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                    <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                    <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                    <path
                                        d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                        class="cls-2"></path>
                                    <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                    <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                    <path
                                        d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                        class="cls-2"></path>
                                </svg>
                                <span>{{__('site.filter')}}</span>
                            </a>
                            <div class="toolbox-item toolbox-sort">
                                <label>{{__('site.sortBy')}}:</label>

                                <div class="select-custom">
                                    <select name="orderby" class="form-control">
                                        <option value="price_asc" selected="selected">{{__('site.price_asc')}}</option>
                                        <option value="price_desc">{{__('site.price_desc')}}</option>
                                        <option value="date_asc">{{__('site.date_asc')}}</option>
                                        <option value="date_desc">{{__('site.date_desc')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </nav>

                    <div class="row" id="productBox">

                        @include('site.partials.productByCategoryList',['products'=>$products])

                    </div>
                    
                    @if($products->lastPage() > 1)
                        <div class="load-more btn btn-primary mx-auto" data-container="#productBox">
                           {{__('site.loadMore')}}
                        </div>
                    @endif

                </div>
                <div class="sidebar-overlay"></div>
                <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                    <div class="sidebar-wrapper">
                        <div class="widget">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true"
                                   aria-controls="widget-body-2">{{__('site.categories')}}</a>
                            </h3>

                            <div class="collapse show" id="widget-body-2">
                                <div class="widget-body">
                             <ul class="cat-list">
                                        @foreach($categories as $cat)
                                            <li>
                                                @if ($cat->children && $cat->children->count() > 0)
                                                    <a href="#widget-category-1" data-toggle="collapse" role="button"
                                                    aria-expanded="true" aria-controls="widget-category-1">
                                                        {{$cat->title}}
                                                         <!-- <span class="products-count">({{$cat->children->count()}})</span> -->
                                                        <span class="toggle"></span>
                                                    </a>
                                                @else
                                                    <a href="{{route('category',$cat->slug)}}">{{$cat->title}}</a>
                                                @endif
                                                <div class="collapse show" id="widget-category-1">
                                                    <ul class="cat-sublist">
                                                        @foreach($cat->children as $child)
                                                            <li>
                                                                <a href="{{route('category',$child->slug)}}">{{$child->title}}</a>
                                                                 <!-- <span
                                                                    class="products-count">({{$child->products->count()}})</span> -->
                                                                       <ul>
                                                                           @foreach($child->children as $ch)
                                                                           <li>
                                                                              <a href="{{route('category',$ch->slug)}}">{{$ch->title}}</a>
                                                                              <!-- <span
                                                                                class="products-count">({{$ch->products->count()}})</span> -->
                                                                           </li>
                                                                           @endforeach
                                                                       </ul>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- End .widget-body -->
                            </div>
                            <!-- End .collapse -->
                        </div>
                        <!-- End .widget -->

                        <div class="widget">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true"
                                   aria-controls="widget-body-3">{{__('site.price')}} {!! currency_index() !!}</a>
                            </h3>

                            <div class="collapse show" id="widget-body-3">
                                <div class="widget-body pb-0">
                                    <form action="#">
                                        <div class="price-slider-wrapper">
                                            <div id="price-slider"></div>
                                            <!-- End #price-slider -->
                                        </div>
                                        <!-- End .price-slider-wrapper -->

                                        <div
                                            class="filter-price-action d-flex align-items-center justify-content-between flex-wrap">
                                            <div class="filter-price-text">
                                                {{__('site.price')}}:
                                                <span id="filter-price-range"></span>
                                            </div>
                                            <!-- End .filter-price-text -->

                                            {{--                                            <button type="submit" class="btn btn-primary">Filter</button>--}}
                                        </div>
                                        <!-- End .filter-price-action -->
                                    </form>
                                </div>
                                <!-- End .widget-body -->
                            </div>
                            <!-- End .collapse -->
                        </div>
                        <!-- End .widget -->


                        <div class="widget widget-size">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-body-5" role="button" aria-expanded="true"
                                   aria-controls="widget-body-5">{{__('site.brand')}}</a>
                            </h3>

                            <div class="collapse show" id="widget-body-5">
                                <div class="widget-body pb-0">
                                    <ul class="config-size-list brands">
                                        @foreach($brands as $brand)
                                            <li class="brandFilter"><a data-id="{{$brand->id}}">  {{$brand->title}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>


                    {{--                                                                    <div class="widget widget-color">--}}
                    {{--                                                                        <h3 class="widget-title">--}}
                    {{--                                                                            <a data-toggle="collapse" href="#widget-body-4" role="button" aria-expanded="true"--}}
                    {{--                                                                               aria-controls="widget-body-4">Color</a>--}}
                    {{--                                                                        </h3>--}}

                    {{--                                                                        <div class="collapse show" id="widget-body-4">--}}
                    {{--                                                                            <div class="widget-body pb-0">--}}
                    {{--                                                                                <ul class="config-swatch-list">--}}
                    {{--                                                                                    <li class="active">--}}
                    {{--                                                                                        <a href="#" style="background-color: #000;"></a>--}}
                    {{--                                                                                    </li>--}}
                    {{--                                                                                    <li>--}}
                    {{--                                                                                        <a href="#" style="background-color: #0188cc;"></a>--}}
                    {{--                                                                                    </li>--}}
                    {{--                                                                                    <li>--}}
                    {{--                                                                                        <a href="#" style="background-color: #81d742;"></a>--}}
                    {{--                                                                                    </li>--}}
                    {{--                                                                                    <li>--}}
                    {{--                                                                                        <a href="#" style="background-color: #6085a5;"></a>--}}
                    {{--                                                                                    </li>--}}
                    {{--                                                                                    <li>--}}
                    {{--                                                                                        <a href="#" style="background-color: #ab6e6e;"></a>--}}
                    {{--                                                                                    </li>--}}
                    {{--                                                                                </ul>--}}
                    {{--                                                                            </div>--}}
                    {{--                                                                            <!-- End .widget-body -->--}}
                    {{--                                                                        </div>--}}
                    {{--                                                                        <!-- End .collapse -->--}}
                    {{--                                                                    </div>--}}
                    <!-- End .widget -->


                        <!-- End .widget -->


                    </div>
                </aside>
            </div>
        </div>

        <div class="mb-4"></div>
    </main>

@endsection

@push('foot')
    <script src="/webcoder/assets/js/nouislider.min.js"></script>
    <script>
        $(function () {
            var minPrice = {{ $minPrice }};
            var maxPrice = {{ $maxPrice }};
            var e = document.getElementById("price-slider");
            e.noUiSlider.updateOptions({
                range: {
                    'min': minPrice,
                    'max': maxPrice,
                },
                // step: 1,
            });
            getPrice()
        })


        function getPrice() {
            var e = document.getElementById("price-slider");
            let val = e.noUiSlider.get();

            return val;
        }


        $(function () {
            var e = document.getElementById("price-slider");
            e.noUiSlider.on('change', function () {
                getProducts();
            });
            $('.brands li').on('click', function () {
                let that = $(this)
                let _brand = brandChange(that);
                console.log(_brand)
                // alert(_brand)
                getProducts()
            })

            $('select[name="orderby"]').on('change', function () {
                getProducts()
            })


        })


        function sliderChange(priceSlider) {
            priceSlider.om
            alert(78)
            getProducts()
        }

        function getProducts() {
            $('.load-more').removeClass('d-none');
            let _productBox = $('#productBox');
            $.ajax({
                type: 'get',
                url: window.location.href,
                dataType: 'json',
                data: {
                    ...getFilteredData(),

                },
                beforeSend: function () {
                    loadingSwal()
                },
                success: function (response) {
                    if (response.success) {
                        closeLoading()

                        _productBox.html(response.html)
                        try {
                            $('.view-cart').removeClass('d-none');
                        } catch (e) {
                        }
                    } else {
                        message('error', response.message)
                    }
                },
                error: function (errors) {

                }
            });

        }

        function brandChange(that) {
            // $('.brands li').find('a').removeClass('active')
            if (!that.find('a').hasClass('active')) {
                that.find('a').addClass('active')
            } else {
                that.find('a').removeClass('active')
            }
            return getBrand()
        }

        function getBrand() {
            let data = $('.brands li a[class="active"]').map(function () {
                return $(this).data("id");
            }).get()
            return data;
            // return $('.brands li a[class="active"]').data('id')
        }

        function getSortBy() {
            return $('select[name="orderby"]').val()
        }


        try {
            var page = 2;
            $('.load-more').on('click', function (e) {
                e.preventDefault();
                var url = window.location.href;
                var dataContainer = $(this).attr('data-container');
                $.ajax({
                    method: 'get',
                    url: url,
                    data: {
                        ...getFilteredData(),
                        page: page
                    },
                    success(response) {
                        if (!response.html) {
                            $('.load-more').addClass('d-none');
                        }
                        if(response.next == 'not_have'){
                            $('.load-more').addClass('d-none');
                        }
                        page++;
                        $(dataContainer).append(response.html);
                    }
                })
            });


        } catch (e) {

        }


        function getFilteredData() {
            return {
                maxPrice: getPrice()[1],
                minPrice: getPrice()[0],
                brand: getBrand(),
                sortBy: getSortBy(),
            };
        }

    </script>
@endpush
