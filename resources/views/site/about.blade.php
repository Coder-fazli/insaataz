@extends('site.layouts.app')
@push('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<link rel="stylesheet" href="{{asset('webcoder/assets/css/about.css')}}"/>

    <link rel="stylesheet" href="{{asset('webcoder/assets/dist/simple-lightbox.css?v2.14.0')}}" />
@endpush
@section('content')
    <style>
        #breadcrumb {
            padding: 10px 16px;
            background-color: #eee;
        }
        ul.breadcrumb_ul{
            list-style: none;
            text-align: center;
            margin: auto;
        }
        ul.breadcrumb_ul li {
            display: inline;
            font-size: 18px;
        }
        ul.breadcrumb_ul li+li:before {
            padding: 8px;
            color: black;
            content: "/\00a0";
        }
        ul.breadcrumb_ul li a {
            color: #000;
            text-decoration: none;
            font-size: 2.5rem;
        }
        ul.breadcrumb_ul li a:hover {
            color: #08C;
            text-decoration: underline;
        }
        ul.breadcrumb_ul li.active{
            color: #08C;
            font-size: 2.5rem;
        }
        #partners .margin-0 {
            margin-left: 0;
            margin-right: 0;
        }
        #partners .pl-0 {
            padding: 0 10px 10px 0;
        }
        #partners a {
            font: 14px ProximaNovaRegular;
            font-weight: 400;
            font-stretch: normal;
            font-style: normal;
            line-height: normal;
            letter-spacing: normal;
            color: #3b3b3b;
        }
        #partners .partner-item {
            height: 187px;
            width: 100%;
            background-color: #f0f0f0;
            padding: 30px;
        }
        #partners .partner-item:hover {
            border: 2px solid #cfd8dc;
        }
        #partners .partner-item img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .videos_container{
           display: flex;
           flex-direction: column;
           gap: 50px;
           margin-top: 80px;
           margin-bottom: 80px;
        }

        .videos > video{
            width: 100%;
            height: auto;
        }
    </style>
    
    <!--<section id="trainingCenter">-->

    <!--    <div id="breadcrumb">-->
    <!--        <ul class="breadcrumb_ul">-->
    <!--          <li><a href="{{route('home')}}">{{__('site.home')}}</a></li>-->
    <!--          <li class="active">{{__('site.about_us')}}</li>-->
    <!--        </ul>-->
    <!--    </div>-->
    <!--</section>-->

    <section id="aboutUs" style="color:black;" >
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="left">
                        <div class="head">
                            <img src="{{asset('storage/'.$about->image)}}">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="right"class="color:black;">
                        <!-- <h3>{{$about->title}}</h3> -->
                        <p>{!! $about->description !!}</p>
                        <!--<div class="overlayText ">-->
                        <!--    <div class="txtBtn">-->
                        <!--        <a id="moreText" href="#">{{__('site.more')}}</a>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About section end -->
    <!-- ============================================= -->
    <!-- Certificate section start -->
    <section id="certificate">
        <div class="container gallery">
            <div class="row justify-content-between align-items-center">
                <div class="col-12">
                    <div class="center">
                        <h2>{{__('site.cert_title')}}</h2>
                        <!--<p>{{__('site.cert_desc')}}</p>-->
                    </div>
                </div>
                <div class="col-12" style="display:flex; align-items:center;gap:20px;">
                     <div class="swiper-next" style="cursor:pointer;"><i class="fa-solid fa-chevron-left"></i></div>
                    <div class="swiper about__slider"  >
                        
                            <div class="swiper-wrapper">
                          @foreach($certificates as $value)
                            <div class="swiper-slide">
                                <a href="{{asset('storage/'.$value->image)}}" class="w-100">
                                    <img src="{{asset('storage/'.$value->image)}}" alt="{{$value->title}}">
                                </a>
                            </div>
                          @endforeach
                          
                        </div>
                        
                        <!--<div class="swiper-button-next"></div>-->
                        <!--<div class="swiper-button-prev"></div>-->
                        
                      </div>
                         <div class="swiper-prev" style="cursor:pointer;"><i class="fa-solid fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Certificate section end -->
    <!-- ================================= -->
    <!-- Partner section start -->
    
    <section id="certificate">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-12" >
                    <div class="center">
                        <h2>{{__('site.partner_title')}}</h2>
                        <!--<p>{{__('site.cert_desc')}}</p>-->
                    </div>
                </div>
                <div class="col-12" style="display:flex; align-items:center;gap:20px;">
                      <div class="partner-next" style="cursor:pointer;"><i class="fa-solid fa-chevron-left"></i></div>
                    <div class="swiper partners__slider" >
                      
                        <div class="swiper-wrapper">
                          @foreach($partners as $value)
                            @if(!empty($value->slug))
                                @php
                                    $slug = $value->slug;
                                    $target_blank = 'target="_blank"';
                                @endphp
                            @else
                                @php
                                    $slug = 'javascript:void(0)';
                                    $target_blank = '';
                                @endphp
                            @endif
                            <div class="swiper-slide">
                                <a href="{{$slug}}" {{$target_blank}} class="w-100">
                                    <img src="{{asset('storage/'.$value->image)}}" alt="{{$value->title}}">
                                </a>
                            </div>
                          @endforeach
                          
                        </div>
                        
                        
                        
                      </div>
                      
                      <div class="partner-prev" style="cursor:pointer;"><i class="fa-solid fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="videos_container">
    <div class="videos">
        <div class="container">
        <div class="col-12" >
            <div class="center">
                <h2>{{__('site.ghazanxana_title')}}</h2>
                <!--<p>{{__('site.cert_desc')}}</p>-->
            </div>
        </div>
        <video style="max-width: 100%" width="100%" height="auto" controls>
            <source src="{{asset('storage/videos/video-qazanxana.mp4')}}" type="video/mp4">
        </video> 
        </div>
    </div>
      <div class="videos">
        <div class="container">
        <div class="col-12" >
            <div class="center">
                <h2>{{__('site.radio_title')}}</h2>
                <!--<p>{{__('site.cert_desc')}}</p>-->
            </div>
        </div>
        <video style="max-width: 100%" width="100%" height="auto" controls>
            <source src="{{asset('storage/videos/video-radio.mp4')}}" type="video/mp4">
        </video> 
        </div>
    </div>
    </div>

    <!-- Partner section end -->
    <!-- ================================= -->
@endsection
@push('foot')
   <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{asset('webcoder/assets/js/slider.js')}}"/>></script>
    
    
    <script src="{{asset('webcoder/assets/dist/simple-lightbox.js?v2.14.0')}}"></script>
    <script>
        let gallery = new SimpleLightbox('.gallery a');
    </script>
@endpush