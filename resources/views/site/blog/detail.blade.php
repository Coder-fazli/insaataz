@extends('site.layouts.app')

@push('head')

<link rel="stylesheet" href="{{asset('webcoder/assets/css/blogDetail.css')}}"/>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<link rel="stylesheet" href="{{asset('webcoder/assets/css/about.css')}}"/>

<link rel="stylesheet" href="{{asset('webcoder/assets/dist/simple-lightbox.css?v2.14.0')}}" />

@endpush

@section('content')
    <section class="blog__detail">
        <div class="container">
            <div class="detail__main">
                <div class="main-img">
                    <img src="{{asset('storage/'.$blog->image)}}">
                </div>
                <!--<h3>{{$blog->title}}</h3>-->
                <h5 class="d-flex align-items-center mt-1">
                    <span class="mr-3">
                        <i class="fa fa-clock mr-1"></i>
                        {{ $blog->created_at->format('d.m.Y') }}
                    </span>
                    <span class="mr-3">|</span>
                    <span>
                        <i class="fa fa-eye mr-1"></i>
                        {{$blog->view}}
                    </span>
                </h5>
                {!!$blog->description!!}
                
                @if($photos->count() > 0)
            </div>
        </div>
    </section>

    <section id="certificate">
        <div class="container gallery">
            <div class="row justify-content-between align-items-center">
                <div class="col-12" style="display:flex; align-items:center;gap:20px;">
                     <div class="swiper-next" style="cursor:pointer;"><i class="fa-solid fa-chevron-left"></i></div>
                    <div class="swiper about__slider"  >
                        
                        <div class="swiper-wrapper">
                            @foreach($photos as $value)
                                <div class="swiper-slide">
                                    <a href="{{asset('storage/'.$value->image)}}" class="w-100">
                                        <img src="{{asset('storage/'.$value->image)}}" alt="{{$blog->title}}">
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

    <section class="blog__detail">
        <div class="container">
            <div class="detail__main">
                @endif

                <div class="share-options d-flex align-items-center mt-3">
                    <h5 class="mr-2" style="line-height: 2.5;">{{__('site.share_word')}}:</h5>
                    <!--Social Links-->
                    <ul class="social-links">
                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style d-flex">
                            <li class="mr-1"><a class="a2a_dd" href="https://www.addtoany.com/share" title="Social Links"></a></li>
                            <li class="mr-1"><a class="a2a_button_whatsapp"></a></li>
                            <li class="mr-1"><a class="a2a_button_facebook"></a></li>
                            <li class="mr-1"><a class="a2a_button_twitter"></a></li>
                            <li class="mr-1"><a class="a2a_button_email"></a></li>
                            <li class="mr-1"><a class="a2a_button_facebook_messenger"></a></li>
                            <li><a class="a2a_button_copy_link"></a></li>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('foot')
   <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{asset('webcoder/assets/js/slider.js')}}"/>></script>
    
    
    <script src="{{asset('webcoder/assets/dist/simple-lightbox.js?v2.14.0')}}"></script>
    <script>
        let gallery = new SimpleLightbox('.gallery a');
    </script>
@endpush