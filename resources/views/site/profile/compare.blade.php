@extends('site.layouts.app')
@push('head')
<link rel="stylesheet" href="{{asset('webcoder/assets/css/wishList.css')}}"/>
@endpush
@section('content')
    <div class="container">
        <h2 class="mt-3 mb-2">{{__('site.compare')}}</h2>
        <div class="row">
            @include('site.partials._productsList', ['products' => $products])
        </div>
        <div class="d-flex justify-content-center mt-3 mb-4">
            <ul class="pagination">
                <!-- Önceki sayfa bağlantısı -->
                @if ($products->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                @endif
                
                @if ($products->lastPage() > 1)
                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                        <a class="page-link {{ $products->currentPage() == $i ? 'active' : '' }}" href="{{ $products->url($i) }}">{{ $i }}</a>
                    @endfor
                @endif
            
                <!-- Sonraki sayfa bağlantısı -->
                @if ($products->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next">&raquo;</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                @endif
            </ul>
        </div>
    </div>
@endsection