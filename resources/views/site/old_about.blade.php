@extends('site.layouts.app')
@section('content')
    <section id="trainingCenter">

        <div id="trainingSlider" class="trainingSlider two">
            <div style="background: url({{asset('webcoder/assets/img/Slide.jpg')}});" class="sliderContent swiper-slide">
                <div class="d-flex justify-content-between">
                    <div class="sliderText">
                        <p>{{data_get(explode(' ',$about->title),0)}}</p>
                        <h1>{{data_get(explode(' ',$about->title),2)}}</h1>
                    </div>

                    <div class="scroll">
                        <p>{{__('site.scroll')}}</p>
                        <i class="fa-solid fa-arrow-down-long"></i>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="responsiveTrainingCenter">
        <div class="slidersTraining">
            <div style="background: url({{asset('webcoder/assets/img/Slide.jpg')}});" class="swiper-slide sliderContent">
                <div class="slideText">
                    <p>{{data_get(explode(' ',$about->title),0)}}</p>
                    <h1 class="text-break">{{data_get(explode(' ',$about->title),2)}}</h1>
                </div>
            </div>
        </div>
    </section>

    <section id="aboutUs">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="left">
                        <div class="head">
                            <h3>{{$about->title}}</h3>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                    <div class="counter">
                                        <h2 class="counterNumber">{{$about->members}}</h2>
                                        <h5>{{__('about.members')}}</h5>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                    <div class="counter">
                                        <h2 class="counterNumber">{{$about->trainings}}</h2>
                                        <h5>{{__('about.trainings')}}</h5>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                    <div class="counter">
                                        <h2 class="counterNumber">{{$about->corporate_trainings}}</h2>
                                        <h5>{{__('about.corporate_trainings')}}</h5>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                    <div class="counter">
                                        <h2 class="counterNumber">{{$about->work_experience}}</h2>

                                        <h5>{{__('about.experience')}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="right">
                        <p>{!! $about->desc !!}</p>
                        <div class="overlayText ">
                            <div class="txtBtn">
                                <a id="moreText" href="#">{{__('site.more')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($about->instructor)
        @include('site.includes.instructor',['instructor' => $about->instructor])
    @endif

    <!-- leader education section end -->
    <!-- ============================================= -->

    <!-- Certificate section start -->
    <section id="certificate">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="left">
                        <img src="{{\App\Utils\Helper::i($about->cert_image)}}" alt="{{$about->cert_title}}">
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="right">
                        <h2>{{$about->cert_title}}</h2>
                        <p>{!! $about->cert_desc !!}</p>
                        <a id="certificateModal" style="cursor:pointer;">{{__('site.show_certificate')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- certificate Modal -->
    <div class="galleryFancy">
        @foreach($certifiactes as $certificate)
            <a style="display: none;" class="{{$loop->first ? 'firstGallery' : ''}}" href="{{\App\Utils\Helper::i($certificate->image)}}">
                <img src="{{\App\Utils\Helper::i($certificate->image)}}" alt="{{$about->title}}">
            </a>
        @endforeach
    </div>
    <!-- Certificate section end -->
    <!-- ================================= -->


    <!-- GALLERY SECTION START -->
    <section id="gallery">
        <div class="container">
            <div class="headText">
                <h1>{{__('about.history')}}</h1>
            </div>
            <div class="galleryContent">
                <div class="top">
                    <div id="gallery-list" class="row">
                        @include('site.includes.gallery-list')
                    </div>
                </div>
                @if($galleries->total() > 4)
                    <div data-aos="fade-up" data-aos-duration="3000" class="more">
                        <a id="load-gallery" href="javascript:void">{{__('site.show_more')}}</a>
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- GALLERY SECTION END -->
    <!-- ======================================== -->

    <!-- maps section start -->
    <section id="googleMaps">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="left">
                        <h2>{{$about->find_title}}</h2>
                        <p>{!! $about->find_text !!}</p>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                    <div id="map" class="right">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3039.580978140875!2d49.8280193157684!3d40.37381456617168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307db96783cc19%3A0xa995ef96e8352f50!2sKarnegi%20klub%20Treninq%20M%C9%99rk%C9%99zi!5e0!3m2!1str!2s!4v1657782360088!5m2!1str!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" type="text/css" media="screen"/>
@endpush
@push('footer')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script>
        var page = 2;
        $('#load-gallery').on('click', function (e) {
            e.preventDefault();
            $.ajax({
                method: 'get',
                url: "{{route('load-history-images')}}",
                data: {page: page},
                success(response) {
                    if (!response) {
                        e.target.parentElement.remove();
                    }
                    page++;
                    $('#gallery-list').append(response);
                }
            })
        });
    </script>
@endpush

