@extends('site.layouts.app')
@section('title',__('menu.services'))

@section('content')

    <div class="rs-services services-main-home bg1 pt-153 pb-160 md-pt-75 md-pb-80">
        <div class="container custom">
            <div class="sec-title text-center mb-55 md-mb-35">

                <h2 class="title">
                    {!! __('site.services_subtitle') !!}
                </h2>
            </div>
@include('site.partials._services',['services'=>$services])



        </div>
    </div>
@endsection
