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

    <section id="aboutUs" style="background: #fff; padding: 100px 0; position: relative; overflow: hidden;">
        <!-- Декоративные элементы -->
        <div style="position: absolute; top: -100px; right: -100px; width: 300px; height: 300px; background: linear-gradient(135deg, rgba(43, 87, 151, 0.05) 0%, rgba(43, 87, 151, 0.02) 100%); border-radius: 50%; z-index: 0;"></div>
        <div style="position: absolute; bottom: -50px; left: -50px; width: 200px; height: 200px; background: linear-gradient(135deg, rgba(43, 87, 151, 0.03) 0%, rgba(43, 87, 151, 0.01) 100%); border-radius: 50%; z-index: 0;"></div>

        <div class="container" style="position: relative; z-index: 1;">
            <div class="row justify-content-between align-items-center" style="gap: 60px 0;">
                <!-- Левая колонка с логотипом -->
                <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                    <div class="about-logo-wrapper" style="position: relative;">
                        <!-- Акцентная линия сверху -->
                        <div style="width: 80px; height: 4px; background: linear-gradient(90deg, #2b5797 0%, #4a7bc8 100%); margin-bottom: 40px; border-radius: 2px;"></div>

                        <!-- Логотип с анимацией -->
                        <div class="about-logo-container" style="background: #fff; padding: 50px; border-radius: 20px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08); transition: all 0.4s ease; position: relative;">
                            <img src="{{asset('storage/'.$about->image)}}" alt="OREL İnşaat" style="width: 100%; height: auto; transition: transform 0.4s ease;">
                        </div>

                        <!-- Декоративный акцент -->
                        <div style="position: absolute; bottom: -20px; right: -20px; width: 100px; height: 100px; background: linear-gradient(135deg, #2b5797 0%, #4a7bc8 100%); border-radius: 20px; z-index: -1; opacity: 0.15;"></div>
                    </div>
                </div>

                <!-- Правая колонка с текстом -->
                <div class="col-12 col-sm-12 col-md-7 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="about-content-card" style="background: #fff; padding: 45px; border-radius: 16px; box-shadow: 0 5px 25px rgba(0, 0, 0, 0.06); border: 1px solid rgba(43, 87, 151, 0.08);">
                        <!-- Заголовок секции -->
                        <div style="margin-bottom: 25px;">
                            <span style="display: inline-block; color: #2b5797; font-weight: 600; font-size: 12px; text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 12px;">Haqqımızda</span>
                            <h2 style="font-size: 28px; font-weight: 600; color: #1a1a1a; line-height: 1.4; margin-bottom: 20px;">OREL İnşaat</h2>
                        </div>

                        <!-- Описание -->
                        <div class="about-description" style="color: #5a5a5a; font-size: 15px; line-height: 1.7; font-weight: 400;">
                            {!! $about->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            /* Hover эффект для логотипа */
            .about-logo-container:hover {
                transform: translateY(-10px);
                box-shadow: 0 20px 50px rgba(43, 87, 151, 0.15);
            }

            .about-logo-container:hover img {
                transform: scale(1.05);
            }

            /* Стили для списков в описании */
            #aboutUs .about-description ul {
                list-style: none;
                padding: 0;
                margin: 20px 0;
            }

            #aboutUs .about-description ul li {
                position: relative;
                padding-left: 38px;
                margin-bottom: 14px;
                color: #5a5a5a;
                font-size: 15px;
                line-height: 1.6;
                font-weight: 400;
                transition: all 0.3s ease;
            }

            #aboutUs .about-description ul li:before {
                content: "\f00c";
                font-family: "Font Awesome 6 Free";
                font-weight: 900;
                position: absolute;
                left: 0;
                top: 2px;
                width: 22px;
                height: 22px;
                background: linear-gradient(135deg, #2b5797 0%, #4a7bc8 100%);
                color: #fff;
                font-size: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 4px;
                transition: all 0.3s ease;
            }

            #aboutUs .about-description ul li:hover {
                color: #2b5797;
                padding-left: 42px;
            }

            #aboutUs .about-description ul li:hover:before {
                transform: scale(1.1);
                box-shadow: 0 3px 10px rgba(43, 87, 151, 0.3);
            }

            /* Стили для параграфов */
            #aboutUs .about-description p {
                margin-bottom: 18px;
                font-weight: 400;
                font-size: 15px;
                line-height: 1.7;
                color: #5a5a5a;
            }

            #aboutUs .about-description p strong,
            #aboutUs .about-description p b {
                color: #1a1a1a;
                font-weight: 500;
            }

            /* Адаптивность */
            @media (max-width: 768px) {
                #aboutUs {
                    padding: 60px 0 !important;
                }

                .about-content-card {
                    padding: 30px 25px !important;
                    margin-top: 40px;
                }

                .about-content-card h2 {
                    font-size: 24px !important;
                }

                .about-logo-container {
                    padding: 30px !important;
                }

                #aboutUs .about-description p,
                #aboutUs .about-description ul li {
                    font-size: 14px !important;
                }
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