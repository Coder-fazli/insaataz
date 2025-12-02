

@extends('site.layouts.app')

@push('head')

<link rel="stylesheet" href="{{asset('webcoder/assets/css/portfolio.css')}}"/>

    <link rel="stylesheet" href="{{asset('webcoder/assets/dist/simple-lightbox.css?v2.14.0')}}" />
@endpush

@section('content')

<main>
    <section class="featured-products-section" style="background-color: transparent">
        <div class="container">
            <!--<h2 class="text-center">{{__('site.portfolio')}}</h2>-->
            <!--<h2 class="section-title heading-border ls-20 border-0">{{__('site.portfolio')}}</h2>-->
            <div class="row gallery" style="margin-top: 2.5rem; margin-bottom: 2.5rem;">
               @foreach($portfolio as $value)
                    <div class="col-6 col-sm-3">
                        {{--@php
                            if($value->slug != null):
                                $link = $value->slug;
                                $target = 'target="_blank"';
                            else:
                                $link = 'javascript:void(0)';
                                $target = '';
                            endif
                        @endphp --}}
                        <a href="{{asset('storage/'.$value->image)}}">
                            <div class="product-default">
                                <div class="product-details">
                                    <div class="img-container">
                                       <img src="{{asset('storage/'.$value->image)}}" title="{{$value->title}}"  alt="{{$value->title}}" /> 
                                    </div> 
                                    <h5>{{$value->title}}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                <ul class="pagination">
                    <!-- Önceki sayfa bağlantısı -->
                    @if ($portfolio->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $portfolio->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                    @endif
                    
                    @if ($portfolio->lastPage() > 1)
                        @for ($i = 1; $i <= $portfolio->lastPage(); $i++)
                            <a class="page-link {{ $portfolio->currentPage() == $i ? 'active' : '' }}" href="{{ $portfolio->url($i) }}">{{ $i }}</a>
                        @endfor
                    @endif
                
                    <!-- Sonraki sayfa bağlantısı -->
                    @if ($portfolio->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $portfolio->nextPageUrl() }}" rel="next">&raquo;</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                    @endif
                </ul>
            </div>
            </div>
    </section>
</main>

@endSection

@push('foot')
    <script src="{{asset('webcoder/assets/dist/simple-lightbox.js?v2.14.0')}}"></script>
    <script>
        let gallery = new SimpleLightbox('.gallery a');
    </script>

@endpush