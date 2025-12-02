@extends('site.layouts.app')
@section('title',__('site.seo_title'))
@section('content')

    <main class="main">
        @if(!$products->isEmpty())
            <section class="featured-products-section">
                <div class="container">
                    <h2 class="section-title heading-border ls-20 border-0">{{__('site.search_page')}}</h2>

                    <div class="row">


                        @include('site.partials._productsList',['products'=>$products])


                    </div>
                    <!-- End .featured-proucts -->
                </div>
            </section>
        @else
            <section class="featured-products-section">
                <div class="container">
                    <h2 class="section-title heading-border ls-20 border-0">{{__('site.search_page')}}</h2>

                    <div class="row">


                        <div class="col-12">
                            {{__('site.no_product')}}
                        </div>


                    </div>
                    <!-- End .featured-proucts -->
                </div>
            </section>
        @endif

    </main>
@endsection
