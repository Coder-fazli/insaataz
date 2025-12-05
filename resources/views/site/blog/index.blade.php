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

    <style>
        /* Современный минималистичный дизайн блога */

        .blog {
            padding: 80px 0;
            background: #f8f9fa;
        }

        .blog__main {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }

        .blog__card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
        }

        .blog__card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 35px rgba(43, 87, 151, 0.15);
        }

        .blog__card a {
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .blog__card .card__img {
            width: 100%;
            height: 220px;
            overflow: hidden;
            position: relative;
            background: #f0f0f0;
        }

        .blog__card .card__img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.4s ease;
        }

        .blog__card:hover .card__img img {
            transform: scale(1.1);
        }

        .blog__card .card__img::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.1) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .blog__card:hover .card__img::after {
            opacity: 1;
        }

        .blog__card .card__text {
            padding: 25px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .blog__card .card__text h5 {
            font-size: 13px;
            color: #7a7a7a;
            font-weight: 500;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .blog__card .card__text h5 i {
            color: #2b5797;
            font-size: 12px;
        }

        .blog__card .card__text h4 {
            font-size: 19px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 12px;
            line-height: 1.4;
            transition: color 0.3s ease;
        }

        .blog__card:hover .card__text h4 {
            color: #2b5797;
        }

        .blog__card .card__text p {
            font-size: 14px;
            color: #5a5a5a;
            line-height: 1.6;
            font-weight: 400;
            flex: 1;
        }

        /* Пагинация */
        .pagination {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .pagination .page-item {
            list-style: none;
        }

        .pagination .page-link {
            padding: 10px 16px;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            background: #fff;
            color: #333;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .pagination .page-link:hover {
            background: #2b5797;
            color: #fff;
            border-color: #2b5797;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(43, 87, 151, 0.2);
        }

        .pagination .page-link.active {
            background: #2b5797;
            color: #fff;
            border-color: #2b5797;
        }

        .pagination .page-item.disabled .page-link {
            opacity: 0.5;
            cursor: not-allowed;
            background: #f5f5f5;
        }

        /* Адаптивность */
        @media (max-width: 768px) {
            .blog {
                padding: 50px 0;
            }

            .blog__main {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .blog__card .card__img {
                height: 200px;
            }

            .blog__card .card__text {
                padding: 20px;
            }

            .blog__card .card__text h4 {
                font-size: 17px;
            }
        }
    </style>
@endsection
