@extends('site.layouts.app')
@section('title',"$service->title")
@section('content')
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs img4">
        <div class="container">
            <div class="breadcrumbs-inner">
                <div class="row y-middle">
                    <div class="col-lg-7">
                        <div class="breadcrumbs-wrap mb-48 md-mb-0">
                            <h2 class="page-title">
                                {!! $service->banner_title !!}
                            </h2>
                            <p class="description"> {!! $service->banner_subtitle !!}
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="about-img">
                            <img src="{{get_image($service->banner_image,'banner')}}" alt="{{$service->title}}">
                        </div>
                    </div>
                </div>
                <div class="shape-animation">
                    <div class="dot-animate">
                        <img class="scale" src="assets/images/breadcrumbs/shape/img2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Services Section Start -->
    <div class="rs-services services-details bg3 pt-160 pb-160 md-pt-80 md-pb-80">
        <div class="container">
            <div class="container">
                <div class="row y-middle">
                    <div class="col-lg-6 md-mb-50">
                        <div class="ser-details">
                            <img class="js-tilt" src="{{asset('storage/'. $service->image)}}"
                                 alt="{{$service->title}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="sec-title">
                            <h2 class="title pb-35">
                                {{$service->title}}
                            </h2>
                            <p class="desc pb-45">

                                {!! $service->description !!}
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rs-services services-main-home bg1 pt-153 pb-160 md-pt-75 md-pb-80">
        <div class="container custom">
            <div class="sec-title text-center mb-55 md-mb-35">

                <h2 class="title">
                    {!! __('site.other_services') !!}
                </h2>
            </div>
            @include('site.partials._services',['services'=>$o_services])

        </div>
    </div>
@endsection
