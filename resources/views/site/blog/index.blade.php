@extends('site.layouts.app')
@push('head')

<link rel="stylesheet" href="{{asset('webcoder/assets/css/blog.css')}}"/>
@endpush
@section('content')
     
    <section class='blog'>
        <div class="container">
            <!--<h2>{{__('site.blog')}}</h2>-->
            <div class="blog__main">
                @foreach($blog as $value)
                    <div class="blog__card">
                        <a class="clearfix" href="{{route('blog.detail', $value->slug)}}">
                            <div class="card__img mb-1">
                              <img src="{{asset('storage/'.$value->image)}}"/>
                            </div>
                            <div class="card__text">
                                <h5 class="d-flex justify-content-between align-items-center">
                                    <span>
                                        <i class="fa fa-calendar mr-1"></i>
                                        {{ $value->created_at->format('d.m.Y') }}
                                    </span>
                                    <span>
                                        <i class="fa fa-eye mr-1"></i>
                                        {{$value->view}}
                                    </span>
                                </h5>
                                <h4 class="blog-header-text">{{$value->title}}</h4>
                                {!! Str::limit($value->description, 170)!!}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

           <div class="d-flex justify-content-center">
                <ul class="pagination">
                    <!-- Önceki sayfa bağlantısı -->
                    @if ($blog->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $blog->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                    @endif
                    
                    @if ($blog->lastPage() > 1)
                        @for ($i = 1; $i <= $blog->lastPage(); $i++)
                            <a class="page-link {{ $blog->currentPage() == $i ? 'active' : '' }}" href="{{ $blog->url($i) }}">{{ $i }}</a>
                        @endfor
                    @endif
                
                    <!-- Sonraki sayfa bağlantısı -->
                    @if ($blog->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $blog->nextPageUrl() }}" rel="next">&raquo;</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                    @endif
                </ul>
            </div>
        </div>
    </section>
   

    <!-- Blog section end -->
@endsection
