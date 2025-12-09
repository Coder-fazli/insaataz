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

    <section id="aboutUs" style="color:black; padding: 80px 0;" >
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-5 col-xxl-5">
                    <div class="left">
                        <div class="head" style="background: #fff; padding: 40px; border-radius: 16px; box-shadow: 0 5px 20px rgba(0,0,0,0.08);">
                            <img src="{{asset('storage/'.$about->image)}}" style="width: 100%; height: auto;">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="right about-text-card" style="background: #fff; padding: 40px; border-radius: 16px; box-shadow: 0 5px 20px rgba(0,0,0,0.06); border: 1px solid #f0f0f0;">
                        <div class="about-text-content">
                            @php
                                $description = $about->description;
                                // Заменяем <li> на <li> с чекбоксом
                                $description = preg_replace('/<li>/', '<li>✅ ', $description);
                            @endphp
                            {!! $description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            /* Стили ТОЛЬКО для секции aboutUs */
            #aboutUs .about-text-content {
                font-size: 15px;
                line-height: 1.7;
                color: #333;
                font-weight: 500;
            }

            #aboutUs .about-text-content h1,
            #aboutUs .about-text-content h2,
            #aboutUs .about-text-content h3,
            #aboutUs .about-text-content h4,
            #aboutUs .about-text-content h5,
            #aboutUs .about-text-content h6 {
                font-size: 15px !important;
                font-weight: 500 !important;
                line-height: 1.7;
                margin-bottom: 15px;
                color: #333;
            }

            #aboutUs .about-text-content p {
                font-size: 15px !important;
                font-weight: 500 !important;
                line-height: 1.7;
                margin-bottom: 15px;
            }

            #aboutUs .about-text-content strong,
            #aboutUs .about-text-content b {
                font-weight: 500 !important;
            }

            #aboutUs .about-text-content ul {
                list-style: none !important;
                padding-left: 0 !important;
                margin: 15px 0 !important;
            }

            #aboutUs .about-text-content ul li {
                font-size: 15px !important;
                font-weight: 500 !important;
                line-height: 1.7 !important;
                margin-bottom: 12px !important;
                list-style: none !important;
            }
        </style>
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
    
    <div class="videos_container">
        <div class="videos">
            <div class="container">
                <div class="col-12">
                    <div class="center">
                        <h2>Mediada biz</h2>
                    </div>
                </div>
                <div class="youtube-video-wrapper" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; background: #000; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                    <iframe
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"
                        src="https://www.youtube.com/embed/qTKguKditog"
                        title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Минималистичные улучшения для всей страницы */

        /* Карточки сертификатов и партнеров */
        #certificate .swiper-slide img {
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            background: #fff;
            padding: 15px;
        }

        #certificate .swiper-slide img:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(43, 87, 151, 0.2);
        }

        /* Кнопки навигации слайдера */
        .swiper-next, .swiper-prev {
            width: 45px;
            height: 45px;
            background: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            color: #2b5797;
        }

        .swiper-next:hover, .swiper-prev:hover {
            background: #2b5797;
            color: #fff;
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(43, 87, 151, 0.3);
        }

        /* Секции - добавляем padding и фон */
        #certificate {
            padding: 60px 0;
            background: #fafbfc;
        }

        #certificate:first-of-type {
            background: #fff;
        }

        /* Заголовки секций */
        #certificate .center h2 {
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 40px;
            position: relative;
            display: inline-block;
        }

        #certificate .center h2:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #2b5797 0%, #4a7bc8 100%);
            border-radius: 2px;
        }

        /* YouTube видео контейнер */
        .youtube-video-wrapper {
            transition: all 0.3s ease;
        }

        .youtube-video-wrapper:hover {
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3) !important;
            transform: translateY(-5px);
        }

        /* Улучшение карточки aboutUs */
        #aboutUs .about-text-card {
            transition: all 0.3s ease;
        }

        #aboutUs .about-text-card:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12) !important;
            transform: translateY(-3px);
        }

        #aboutUs .head {
            transition: all 0.3s ease;
        }

        #aboutUs .head:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12) !important;
            transform: translateY(-3px);
        }

        /* Адаптивность */
        @media (max-width: 768px) {
            #certificate {
                padding: 40px 0;
            }

            .swiper-next, .swiper-prev {
                width: 35px;
                height: 35px;
                font-size: 14px;
            }
        }
    </style>
@endsection
@push('foot')
   <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{asset('webcoder/assets/js/slider.js')}}"/>></script>
    
    
    <script src="{{asset('webcoder/assets/dist/simple-lightbox.js?v2.14.0')}}"></script>
    <script>
        let gallery = new SimpleLightbox('.gallery a');
    </script>
@endpush