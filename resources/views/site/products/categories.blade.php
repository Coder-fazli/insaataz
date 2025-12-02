@extends('site.layouts.app')
@section('title',__('menu.portfolio'))

@push('head')
    <link rel="stylesheet" href="/webcoder/assets/css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.min.css">
    <style>


        .brandFilter a, .sidebar-wrapper a {
            cursor: pointer;
        }
        .cat-list span, .cat-list i {
            cursor: pointer;
        }

        .category_list_first {
            padding: 2rem;
            margin-bottom: 0 !important;
        }

        .category_list_first, .category_list_second {
            border-bottom: 1px solid #e7e7e7;
            height: 20px;
            overflow: hidden;
            transition: height 0.3s ease;
        }

        .category_list_first li:last-child {
            border-bottom: 0;
        }

        .category_list_second {
            padding-right: 3px;
        }

        .category_list_third {
            border-bottom: 1px solid #e7e7e7;
        }

        .cat-list i.active {
            transform: rotate(90deg);
            transition: transform 0.3s ease;
        }
        .category_list_first.active, .category_list_second.active {
            height: max-content;
        }
        .cat-list span:hover, .cat-list span.active{
            text-decoration: underline;
            color: #bdc9d9;
        }

        @media(max-width: 1199px) {
            .sidebar-wrapper {
                float: inline-end;
                right: 0%;
            }
        }
        .categories .product-default:hover figure img:first-child {
            opacity: 1;
        }

        .categories .product-default {
            height: auto;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .categories .product-details{
            padding-top: 5px;
            border-top: 1px solid #ddd;
        }

        .toolbox.sticky-header{
            display: none;
        }

        .categories{
            margin-top: -9px;
        }

        @media only screen and (max-width:992px){
            .toolbox.sticky-header{
                display: block;
            }
            .categories{
                margin-top: 0;
            }
        }
        .categories .product-default figure img{
            max-height: 182px;
            height: 182px !important;
            object-fit: contain;
        }
    </style>
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
                <div class="col-lg-12 main-content">
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
                        </div>
                    </nav>

                    @php
                        $sortedCategories = $allCategories->sortBy('order');
                    @endphp

                    <div class="row categories">

                        @foreach($sortedCategories as $category)

                            <div class="col-12 col-md-4 col-lg-3 col-sm-6  product-box">
                                <div class="product-default" style="color:black;">
                                    <a href="{{route('categories', $category->id)}}">
                                        <figure>
                                            <img src="{{asset('/storage/'.$category->image)}}" width="280" height="280" alt="{{$category->title}}">
                                            <div class="label-group"></div>
                                        </figure>
                                        <div class="product-details" style="color:black;">
                                            <h3 class="product-title">{{$category->title}}</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        @endforeach


                    </div>


                </div>
                <div class="sidebar-overlay"></div>
                <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar" style="display:none">
                    <div class="sidebar-wrapper">
                        <div class="widget">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true"
                                   aria-controls="widget-body-2">{{__('site.categories')}}</a>
                            </h3>

                            <div class="collapse show" id="widget-body-2">
                                <div class="widget-body">
                                    <ul class="cat-list">
                                        @php
                                            $sortedCategories = $categories->sortBy('order');
                                        @endphp
                                        @foreach($sortedCategories as $category)
                                            <li class="category_list_first" style="color:black;">
                                                <div class="d-flex align-items-center justify-content-between" style="height: 0px;">
                                                    <span data-id="{{$category->id}}">{{ $category->title }}</span>
                                                    @if($category->getChildren->count()>0)
                                                        <i class="fa-solid fa-angle-right"></i>
                                                    @endif
                                                </div>
                                                <ul style="margin-left: 10px; margin-top: 20px">
                                                    @foreach($category->getChildren as $secondCategory)
                                                        @if($secondCategory->status == 1)
                                                            <li class="category_list_second">
                                                                <div class="d-flex align-items-center justify-content-between">
                                                                    <span data-id="{{$secondCategory->id}}">{{ $secondCategory->title }}</span>
                                                                    @if($secondCategory->getChildren->count()>0)
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    @endif
                                                                </div>
                                                                <ul style="margin-left: 15px; margin-top: 10px">
                                                                    @foreach($secondCategory->getChildren as $thirdCategory)
                                                                        @if($thirdCategory->status == 1)
                                                                            <li class="category_list_third">
                                                                                <span data-id="{{$thirdCategory->id}}">{{ $thirdCategory->title }}</span>
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>

        <div class="mb-4"></div>
    </main>

@endsection

@push('foot')


@endpush
