@extends('site.layouts.app')
@section('title',__('menu.portfolio'))

@push('head')
    <link rel="stylesheet" href="/webcoder/assets/css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.min.css">
    <style>
       
       
.brandFilter a, .sidebar-wrapper a {
    cursor: pointer;
}
.cat-list span, .cat-list i {
    cursor: pointer;
}

.category_list_first {
    padding: 2rem;
    margin-bottom: 0 !important;
}

.category_list_first, .category_list_second {
    border-bottom: 1px solid #e7e7e7;
    height: 20px;
    overflow: hidden;
    transition: height 0.3s ease;
}

.category_list_first li:last-child {
    border-bottom: 0;
}

.category_list_second {
    padding-right: 3px;
}

.category_list_third {
    border-bottom: 1px solid #e7e7e7;
}

.cat-list i.active {
    transform: rotate(90deg);
    transition: transform 0.3s ease;
}
.category_list_first.active, .category_list_second.active {
    height: max-content;
}
.cat-list span:hover, .cat-list span.active{
    text-decoration: underline;
    color: #bdc9d9;
}

@media(max-width: 1199px) {
    .sidebar-wrapper {
        float: inline-end;
        right: 0%;
    }
}

    </style>
@endpush

@section('content')

    <main class="main">
        {{--        <div class="category-banner-container bg-gray">--}}
        {{--            <div class="category-banner banner text-uppercase" style="background: no-repeat 60%/cover url('/webcoder/assets/images/banners/banner-top.jpg');">--}}
        {{--                <div class="container position-relative">--}}
        {{--                    <div class="row">--}}
        {{--                        <div class="pl-lg-5 pb-5 pb-md-0 col-sm-5 col-xl-4 col-lg-4 offset-1">--}}
        {{--                            <h3>Electronic<br>Deals</h3>--}}
        {{--                            <a href="category.html" class="btn btn-dark">Get Yours!</a>--}}
        {{--                        </div>--}}
        {{--                        <div class="pl-lg-3 col-sm-4 offset-sm-0 offset-1 pt-3">--}}
        {{--                            <div class="coupon-sale-content">--}}
        {{--                                <h4 class="m-b-1 coupon-sale-text bg-white text-transform-none">Exclusive COUPON--}}
        {{--                                </h4>--}}
        {{--                                <h5 class="mb-2 coupon-sale-text d-block ls-10 p-0"><i class="ls-0">UP TO</i><b class="text-dark">$100</b> OFF</h5>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}

        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    {{--                    <li class="breadcrumb-item"><a href="demo4.html"><i class="icon-home"></i></a></li>--}}
                    {{--                    <li class="breadcrumb-item"><a href="#">Men</a></li>--}}
                    {{--                    <li class="breadcrumb-item active" aria-current="page">Accessories</li>--}}
                </ol>
            </nav>

            <div class="row">
                <div class="col-lg-9 main-content">
                    <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                        <div class="toolbox-left">
                            <a href="#" class="sidebar-toggle">
                                <svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                    <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                    <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                    <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                    <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                    <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                    <path
                                        d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                        class="cls-2"></path>
                                    <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                    <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                    <path
                                        d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                        class="cls-2"></path>
                                </svg>
                                <span>{{__('site.filter')}}</span>
                            </a>
                            <div class="toolbox-item toolbox-sort">
                                <label>{{__('site.sortBy')}}:</label>

                                <div class="select-custom">
                                    <select name="orderby" class="form-control sort-select">
                                        <option value="price_asc" >{{__('site.price_asc')}}</option>
                                        <option value="price_desc">{{__('site.price_desc')}}</option>
                                        <option value="date_asc" selected="selected">{{__('site.date_asc')}}</option>
                                        <option value="date_desc">{{__('site.date_desc')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </nav>

                    <div class="row" id="productBox">

                       

                    </div>
                    <div data-page="1" data-more="{{__('site.more')}}" class="load-more btn btn-primary mx-auto" data-container="#productBox">
                             {{__('site.loadMore')}}
                        </div>
              

                </div>
                <div class="sidebar-overlay"></div>
                <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                    <div class="sidebar-wrapper">
                        <div class="widget">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true"
                                   aria-controls="widget-body-2">{{__('site.categories')}}</a>
                            </h3>

                            <div class="collapse show" id="widget-body-2">
                                <div class="widget-body">
                                 <ul class="cat-list">
                                    @php
                                        $sortedCategories = $categories->sortBy('order');
                                    @endphp
                                    @foreach($sortedCategories as $category)
                                        <li class="category_list_first" style="color:black;">
                                            <div class="d-flex align-items-center justify-content-between" style="height: 0px;">
                                                <span data-id="{{$category->id}}">{{ $category->title }}</span>
                                                @if($category->getChildren->count()>0)
                                                <i class="fa-solid fa-angle-right"></i>
                                                @endif
                                            </div>
                                            <ul style="margin-left: 10px; margin-top: 20px">
                                                @foreach($category->getChildren as $secondCategory)
                                                    @if($secondCategory->status == 1)
                                                    <li class="category_list_second">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <span data-id="{{$secondCategory->id}}">{{ $secondCategory->title }}</span> 
                                                            @if($secondCategory->getChildren->count()>0)
                                                            <i class="fa-solid fa-angle-right"></i>
                                                            @endif
                                                        </div>
                                                        <ul style="margin-left: 15px; margin-top: 10px">
                                                            @foreach($secondCategory->getChildren as $thirdCategory)
                                                                @if($thirdCategory->status == 1)
                                                                <li class="category_list_third">
                                                                    <span data-id="{{$thirdCategory->id}}">{{ $thirdCategory->title }}</span>
                                                                </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>

                                </div>
                                <!-- End .widget-body -->
                            </div>
                            <!-- End .collapse -->
                        </div>
                        <!-- End .widget -->

                        <div class="widget" style="border-top: 0;">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true"
                                   aria-controls="widget-body-3">{{__('site.price')}} {!! currency_index() !!}</a>
                            </h3>

                            <div class="collapse show" id="widget-body-3">
                                <div class="widget-body pb-0">
                                    <form action="#">
                                        <div class="price-slider-wrappers">
                                            <div id="price-sliders"></div>
                                            <!-- End #price-slider -->
                                        </div>
                                        <!-- End .price-slider-wrapper -->

                                        <div class="filter-price-action d-flex align-items-center justify-content-between flex-wrap" style="padding-left: 2rem; padding-right: 2rem;">
                                            <div class="filter-price-text">
                                                {{__('site.price')}}:
                                                <span id="min-price">0</span> - <span id="max-price">10000</span>
                                            </div>
                                            <!-- End .filter-price-text -->
                                        </div>
                                        <!-- End .filter-price-action -->
                                    </form>
                                </div>
                                <!-- End .widget-body -->
                            </div>
                            <!-- End .collapse -->
                        </div>
                        <!-- End .widget -->


                        <div class="widget widget-size">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-body-5" role="button" aria-expanded="true"
                                   aria-controls="widget-body-5">{{__('site.brand')}}</a>
                            </h3>

                            <div class="collapse show" id="widget-body-5">
                                <div class="widget-body pb-0">
                                    <ul class="config-size-list brands" style="padding: 2rem 2rem 0 2rem;">
                                        @foreach($brands as $brand)
                                            <li class="brandFilter"><a data-brand="{{$brand->id}}">  {{$brand->title}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>


                    {{--                                                                    <div class="widget widget-color">--}}
                    {{--                                                                        <h3 class="widget-title">--}}
                    {{--                                                                            <a data-toggle="collapse" href="#widget-body-4" role="button" aria-expanded="true"--}}
                    {{--                                                                               aria-controls="widget-body-4">Color</a>--}}
                    {{--                                                                        </h3>--}}

                    {{--                                                                        <div class="collapse show" id="widget-body-4">--}}
                    {{--                                                                            <div class="widget-body pb-0">--}}
                    {{--                                                                                <ul class="config-swatch-list">--}}
                    {{--                                                                                    <li class="active">--}}
                    {{--                                                                                        <a href="#" style="background-color: #000;"></a>--}}
                    {{--                                                                                    </li>--}}
                    {{--                                                                                    <li>--}}
                    {{--                                                                                        <a href="#" style="background-color: #0188cc;"></a>--}}
                    {{--                                                                                    </li>--}}
                    {{--                                                                                    <li>--}}
                    {{--                                                                                        <a href="#" style="background-color: #81d742;"></a>--}}
                    {{--                                                                                    </li>--}}
                    {{--                                                                                    <li>--}}
                    {{--                                                                                        <a href="#" style="background-color: #6085a5;"></a>--}}
                    {{--                                                                                    </li>--}}
                    {{--                                                                                    <li>--}}
                    {{--                                                                                        <a href="#" style="background-color: #ab6e6e;"></a>--}}
                    {{--                                                                                    </li>--}}
                    {{--                                                                                </ul>--}}
                    {{--                                                                            </div>--}}
                    {{--                                                                            <!-- End .widget-body -->--}}
                    {{--                                                                        </div>--}}
                    {{--                                                                        <!-- End .collapse -->--}}
                    {{--                                                                    </div>--}}
                    <!-- End .widget -->


                        <!-- End .widget -->


                    </div>
                </aside>
            </div>
        </div>

        <div class="mb-4"></div>
    </main>

@endsection

@push('foot')
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.min.js"></script>

<script>
    const wrapper = document.querySelector('#productBox');
    const lang = document.querySelector('html').getAttribute('lang');
    const load = document.querySelector('.load-more');
    const brandFilters = document.querySelectorAll('.brandFilter');
    const sortSelect = document.querySelector('.sort-select');
    let sort = getUrlParameter('sort') || "";
    let brand_id = getUrlParameter('brand_id') || "";
    let min_price = getUrlParameter('min_price') || 0;
    let max_price = getUrlParameter('max_price') || 10000;
    let page = 1;
    let category_id = getUrlParameter('category_id') || "";
    let categories = document.querySelectorAll('.cat-list span');
    var slider = document.querySelector('.price-slider-wrappers');
    const category_list_first_lists = document.querySelectorAll('.category_list_first i')
    const category_list_second_lists = document.querySelectorAll('.category_list_second i')
    noUiSlider.create(slider, {
        start: [+min_price, +max_price],
        connect: true,
        range: {
            'min': 0,
            'max': 10000
        }
    });

    setDefaultPrices();

    async function fetchCategories(url) {
        try {
            const response = await fetch(url, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            });

            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            const datas = await response.json();
            if (datas.length < 9) {
                load.style.visibility = "hidden";
            } else {
                load.style.visibility = "visible";
            }
            datas.forEach(data => {
                const element = `
                <div class="col-6 col-sm-4 product-box">
                    <div class="product-default" style="color:black;">
                        <a href="https://orelinsaat.az/${lang}/product/${data.slug[lang]}" style="color:black;" class="compare-btn">
                            <i class="fa fa-chart-simple"></i>
                        </a>
                        <a href="https://orelinsaat.az/${lang}/product/${data.slug[lang]}"  class="fav-btn text-center" style="z-index: 2;">
                            <i class="far fa-heart" style="line-height: 3.3rem;"></i>
                        </a>
                        <a href="https://orelinsaat.az/${lang}/product/${data.slug[lang]}"></a>
                        <figure>
                            <a href="https://orelinsaat.az/${lang}/product/${data.slug[lang]}">
                                <img src="https://orelinsaat.az/storage/${data.photos[0].image}" width="280" height="280" alt="product">
                                <img src="https://orelinsaat.az/storage/${data.photos[0].image}" width="280" height="280" alt="product">
                            </a>
                            <div class="label-group"></div>
                        </figure>
                        <div class="product-details"style="color:black;">
                            <div class="category-wrap">
                                <div class="category-list" style="color:black;">
                                    <a data-category='${data.category.id}' style="color:black;" class="product-category">${data.category.title[lang]}</a>
                                </div>
                            </div>
                            <h3 class="product-title"><a href="https://orelinsaat.az/${lang}/product/${data.slug[lang]}">${data.title[lang]}</a></h3>
                            <div class="price-box">
                                <span class="product-price">₼ ${data.price}</span>
                            </div>
                            <div class="product-action">
                                <a class="btn-icon-wish btnAddToCart" data-id="${data.id}" title="site.wishlist"><i class="icon-cart"></i></a>
                                <a href="https://orelinsaat.az/${lang}/product/${data.slug[lang]}" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>${load.getAttribute('data-more')}</span></a>
                                <a href="https://orelinsaat.az/api/product/quick-view/${data.id}" class="btn-quickview" title="Sürətli Baxış"><i class="fas fa-external-link-alt"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                `;
                wrapper.insertAdjacentHTML('beforeend', element);
            });
        } catch (error) {
            console.error('Error fetching categories:', error);
        }
    }

    function updateURL() {
        const params = new URLSearchParams({
            sort,
            brand_id,
            category_id,
            min_price,
            max_price,
        });
        history.replaceState(null, '', '?' + params.toString());
    }

    function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        const regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        const results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }

    // Initial fetch based on URL parameters
    fetchCategories(`https://orelinsaat.az/api/category?sort=${sort}&brand_id=${brand_id}&category_id=${category_id}&min_price=${min_price}&max_price=${max_price}&page=${page}`);

    load.addEventListener('click', () => {
        page++;
        fetchCategories(`https://orelinsaat.az/api/category?sort=${sort}&brand_id=${brand_id}&category_id=${category_id}&min_price=${min_price}&max_price=${max_price}&page=${page}`);
    });
   

    categories.forEach(category => {
        category.addEventListener('click', () => {
            
            if (category.hasAttribute('data-id')) {
                category_id = category.getAttribute('data-id');
              
                page = 1;
                wrapper.replaceChildren();
                updateURL();
                fetchCategories(`https://orelinsaat.az/api/category?sort=${sort}&brand_id=${brand_id}&category_id=${category_id}&min_price=${min_price}&max_price=${max_price}&page=${page}`);
            }
        });
    });

    slider.noUiSlider.on('set', function (values, handle) {
        min_price = values[0];
        max_price = values[1];
        page = 1;
        wrapper.replaceChildren();
        updateURL();
        setDefaultPrices();
        fetchCategories(`https://orelinsaat.az/api/category?sort=${sort}&brand_id=${brand_id}&category_id=${category_id}&min_price=${min_price}&max_price=${max_price}&page=${page}`);
    });

    brandFilters.forEach(link => {
        let linkA = link.querySelector('a');
        link.addEventListener('click', () => {
            brand_id = linkA.getAttribute('data-brand');
            page = 1;
            wrapper.replaceChildren();
            updateURL();
            fetchCategories(`https://orelinsaat.az/api/category?sort=${sort}&brand_id=${brand_id}&category_id=${category_id}&min_price=${min_price}&max_price=${max_price}&page=${page}`);
        });
    });

    sortSelect.addEventListener('change', (e) => {
        sort = e.target.value;
        page = 1;
        wrapper.replaceChildren();
        updateURL();
        fetchCategories(`https://orelinsaat.az/api/category?sort=${sort}&brand_id=${brand_id}&category_id=${category_id}&min_price=${min_price}&max_price=${max_price}&page=${page}`);
    });

    function setDefaultPrices() {
        document.querySelector('#min-price').textContent = min_price;
        document.querySelector('#max-price').textContent = max_price;
    }
    
    document.addEventListener('click', (e) => {
        if(e.target.classList.contains('product-category')) {
           category_id = e.target.getAttribute('data-category')
           wrapper.replaceChildren();
           fetchCategories(`https://orelinsaat.az/api/category?sort=${sort}&brand_id=${brand_id}&category_id=${category_id}&min_price=${min_price}&max_price=${max_price}&page=${page}`);
        }
    })
    
    category_list_first_lists.forEach((list, i) => {
        list.addEventListener('click', (e) => {
            list.parentElement.parentElement.classList.toggle('active');
            const icon = list.parentElement.nextElementSibling;
            e.target.classList.toggle('active')
            e.target.parentElement.classList.toggle('active')
            
            if (icon && icon.tagName === 'I') {
                icon.classList.toggle('active');
            }
        });
    });
  
   document.querySelectorAll('.cat-list span').forEach(span => {
        if (span.hasAttribute('data-id')) {
            // Yalnız birinci uyğun spanı aktiv edirik
            if(span.getAttribute('data-id') == category_id) {
                   span.classList.add('active');
            return;
            }
         
        }
    });
    
    const spans = document.querySelectorAll('.category_list_second span')
    
    spans.forEach(span => {
        // console.log(span.length)
       if(span.textContent.length > 25) {
            span.style.fontSize = '12px'
       }
    })
    
    document.addEventListener("DOMContentLoaded", ()=> {
        function setAsideWidth() {
            const sidebar = document.querySelector(".sidebar-wrapper")
            setTimeout(function() {
                if (window.innerWidth < 1220) {
                    sidebar.setAttribute("style", "width: 280px !important;");
                } 
                // else {
                //     sidebar.setAttribute("style", "width: 280px !important;");
                // }
            }, 1000)
        }
      
        setAsideWidth();
        window.addEventListener("resize", ()=>{
          setAsideWidth();
        })
    })
    
    document.querySelectorAll('.cat-list span').forEach(span => {
        span.addEventListener('click', (e) => {
            if (span.hasAttribute('data-id')) {
            // Remove active class and styles from all spans
            document.querySelectorAll('.cat-list span').forEach(span => {
                span.classList.remove('active');
                const parent = span.closest('.category_list_first');
                if (parent) {
                    parent.style.backgroundColor = '';
                    parent.style.color = '';
                }
            });
            
            // Add active class and styles to the clicked span
            span.classList.add('active');
            const parent = span.closest('.category_list_first');
            if (parent) {
                parent.style.backgroundColor = '#08C';
                parent.style.color = '#fff';
            }

            console.log(e.target.parentElement.parentElement);
        }
       });
    });
</script>


@endpush
