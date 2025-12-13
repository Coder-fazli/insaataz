{{--<div class="top-notice bg-primary text-white">--}}
{{--    <div class="container text-center">--}}
{{--        <h5 class="d-inline-block">Get Up to <b>40% OFF</b> New-Season Styles</h5>--}}
{{--        <a href="category.html" class="category">MEN</a>--}}
{{--        <a href="category.html" class="category ml-2 mr-3">WOMEN</a>--}}
{{--        <small>* Limited time only.</small>--}}
{{--        <button title="Close (Esc)" type="button" class="mfp-close">×</button>--}}
{{--    </div>--}}
{{--</div>--}}

<header class="header">
    <div class="header-top bg-primary text-white">
        <div class="container">
        {{--            <div class="header-left d-none d-sm-block">--}}
        {{--                <p class="top-message text-uppercase">FREE Returns. Standard Shipping Orders $99+</p>--}}
        {{--            </div>--}}
        <!-- End .header-left -->

            <div class="header-right header-dropdowns  ml-sm-auto ">
                <div>
                    {{--                    <a href="#">Links</a>--}}
                    <div class="header-menu" style="display: none;">
                        <ul>
                            {{--                            <li><a href="">About Us</a></li>--}}
                            {{--                            <li><a href="">Blog</a></li>--}}
                            <!--<li><a href="{{route('cart')}}">{{__('site.cart')}}</a></li>-->

                            @auth('client')
                                <a href="{{route('profile.wishList')}}"><i class="fas fa-heart"></i></a>
                                <a href="{{route('profile.compare')}}" class="compare_a_tag">
                                    <i class="fa fa-chart-simple"></i>
                                    <!--<span class="cart-count badge-circle  @if($products->sum('qty')==0) d-none   @endif ">{{$products->sum('qty')}}</span>-->
                                </a>
                                <div class="client__li">
                                    <a href="{{route('profile.index')}}"><i class="fa fa-user"></i></a>
                                    <ul class="dropdown-list">
                                        <li><a href="{{route('profile.index')}}">{{__('menu.profile')}}</a></li>
                                        <li><a href="{{route('profile.showOrders')}}">{{__('menu.myOrders')}}</a></li>
                                        <li><a href="{{route('profile.wishList')}}">{{__('menu.wishlist')}}</a></li>
                                        <li><a href="{{route('profile.logout')}}">{{__('menu.logout')}}</a></li>
                                    </ul>
                                </div>
                            @else
                                <li><a href="{{route('profile.login')}}">{{__('site.LoginInHeader')}}</a></li>
                                <li><a href="{{route('profile.register')}}">{{__('site.RegisterInHeader')}}</a></li>
                            @endauth
                        </ul>
                    </div>
                    <!-- End .header-menu -->
                </div>
                <!-- End .header-dropown -->

                <span class="separator"></span>
                @include('components.lang-switcher')


                <span class="separator"></span>

            @include('site.partials._social_links')

            <!-- End .social-icons -->
            </div>
            <!-- End .header-right -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .header-top -->

    <div class="header-middle sticky-header align-items-center" data-sticky-options="{'mobile': true}">
        <!--<div id="menuToggle">-->
        <!--      <input type="checkbox" />-->
        <!--      <span></span>-->
        <!--      <span></span>-->
        <!--      <span></span>-->
              
        <!--      <ul id="menu">-->
        <!--          <li><a href="{{route('home')}}">{{__('site.home')}}</a></li>-->
        <!--          <li><a href="{{route('about')}}">{{__('site.about')}}</a></li>-->
        <!--          <li><a href="{{route('products')}}">{{__('site.products')}}</a></li>-->
        <!--          <li><a href="{{route('portfolio')}}">{{__('site.portfolio')}}</a></li>-->
        <!--          <li><a href="{{route('blog')}}">{{__('site.blog')}}</a></li>-->
        <!--          <li><a href="{{route('contact')}}">{{__('site.contact')}}</a></li>-->
        <!--      </ul>-->
        <!--</div>-->
        <div class="container">
            <button class="mobile-menu-toggler mr-2" type="button">
                    <i class="fas fa-bars"></i>
                    <!--{{__('site.catalogue')}}-->
            </button>
            <div class="header-left col-lg-2 w-auto pl-0">

                <a href="{{route('home')}}" class="logo-container {{config('app.name')}}">
                    <img src="{{asset('storage/'.$logo)}}"
                         alt="{{config('app.name')}}">
                </a>
            </div>
            <!-- End .header-left -->

            <div class="header-right w-lg-max">
 
                <div
                    class="header-icon header-search header-search-inline header-search-category w-lg-max text-right mt-0">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                    <form action="{{route('search')}}" method="get">
                        <div class="header-search-wrapper">
                            <input type="search" class="form-control" name="q" id="q"
                                   placeholder="{{__('site.search')}}" required>
                        {{--                            <div class="select-custom">--}}
                        {{--                                <select id="cat" name="cat">--}}
                        {{--                                    <option value="">All Categories</option>--}}
                        {{--                                    <option value="4">Fashion</option>--}}
                        {{--                                </select>--}}
                        {{--                            </div>--}}
                        <!-- End .select-custom -->
                            <button class="btn icon-magnifier p-0" title="search" type="submit"></button>
                        </div>
                        <!-- End .header-search-wrapper -->
                    </form>
                </div>
                <!-- End .header-search -->
                <div class="header-contact d-none d-lg-flex pl-4 pr-4">
                    <img alt="phone" src="/webcoder/assets/images/phone.png" width="30" height="30" class="pb-1">
                    <h6><span>{{__('site.call_us')}}</span><a href="tel:+994102900101"
                                                   class="text-dark font1">+994 10 290 01 01</a>
                    </h6>
                </div>
                <div class="dropdown cart-dropdown">
                    <a href="{{route('cart')}}" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle"
                       role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="minicart-icon"></i>

                        <span
                            class="cart-count badge-circle  @if($products->sum('qty')==0) d-none   @endif ">{{$products->sum('qty')}}</span>

                    </a>

                    <div class="cart-overlay"></div>

                    <div class="dropdown-menu mobile-cart">
                        <a href="#" title="Close (Esc)" class="btn-close">×</a>

                        <div class="dropdownmenu-wrapper custom-scrollbar cart-box">
                            @include('site.partials._modalCart',['products'=>$products])
                        </div>
                        <!-- End .dropdownmenu-wrapper -->
                    </div>
                    <!-- End .dropdown-menu -->
                </div>
                  

                <!-- End .dropdown -->
            </div>
            <!-- End .header-right -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .header-middle -->

    <div class="header-bottom sticky-header" data-sticky-options="{'mobile': true}">
                
        <div class="container">
            <nav class="main-nav w-100">
                <ul class="menu">  
                  <li class="{{\Illuminate\Support\Facades\Route::currentRouteName()=='home' ? 'active' : ''}} "><a href="{{route('home')}}">{{__('site.home')}}</a></li>
                  <li class="{{\Illuminate\Support\Facades\Route::currentRouteName()=='about' ? 'active' : ''}} "><a href="{{route('about')}}">{{__('site.about')}}</a></li>
                  <li class="{{\Illuminate\Support\Facades\Route::currentRouteName()=='categories' ? 'active' : ''}} "><a href="{{route('categories')}}">{{__('site.products')}}</a></li>
                  <li class="{{\Illuminate\Support\Facades\Route::currentRouteName()=='portfolio' ? 'active' : ''}} "><a href="{{route('portfolio')}}">{{__('site.portfolio')}}</a></li>
                  <li class="{{\Illuminate\Support\Facades\Route::currentRouteName()=='blog' ? 'active' : ''}} "><a href="{{route('blog')}}">{{__('site.blog')}}</a></li>
                  <li class="{{\Illuminate\Support\Facades\Route::currentRouteName()=='contact' ? 'active' : ''}} "><a href="{{route('contact')}}">{{__('site.contact')}}</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>


<div class="mobile-menu-overlay"></div>
<!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
        <nav class="mobile-nav">
            <ul class="mobile-menu">
      <li class="{{\Illuminate\Support\Facades\Route::currentRouteName()=='home' ? 'active' : ''}} "><a href="{{route('home')}}">{{__('site.home')}}</a></li>
                  <li class="{{\Illuminate\Support\Facades\Route::currentRouteName()=='about' ? 'active' : ''}} "><a href="{{route('about')}}">{{__('site.about')}}</a></li>
                  <li class="{{\Illuminate\Support\Facades\Route::currentRouteName()=='categories' ? 'active' : ''}} "><a href="{{route('categories')}}">{{__('site.products')}}</a></li>
                  <li class="{{\Illuminate\Support\Facades\Route::currentRouteName()=='portfolio' ? 'active' : ''}} "><a href="{{route('portfolio')}}">{{__('site.portfolio')}}</a></li>
                  <li class="{{\Illuminate\Support\Facades\Route::currentRouteName()=='blog' ? 'active' : ''}} "><a href="{{route('blog')}}">{{__('site.blog')}}</a></li>
                  <li class="{{\Illuminate\Support\Facades\Route::currentRouteName()=='contact' ? 'active' : ''}} "><a href="{{route('contact')}}">{{__('site.contact')}}</a></li>

            </ul>

            <!--<ul class="mobile-menu mt-2 mb-2">-->
            <!--    <li class="border-0">-->
            <!--        <a href="#">-->
            <!--            Special Offer!-->
            <!--        </a>-->
            <!--    </li>-->
            <!--    <li class="border-0">-->
            <!--        <a href="#" target="_blank">-->
            <!--            Buy Porto!-->
            <!--            <span class="tip tip-hot">Hot</span>-->
            <!--        </a>-->
            <!--    </li>-->
            <!--</ul>-->

            <ul class="mobile-menu">
           
                <li><a href="{{route('cart')}}">{{__('site.cart')}}</a></li>
                <!--<li><a href="login.html" class="login-link">Log In</a></li>-->
            </ul>
        </nav>
        <!-- End .mobile-nav -->

        <form class="search-wrapper mb-2" action="{{route('search')}}">
            <input type="text" name="q" class="form-control mb-0" placeholder="{{__('site.search')}}" required/>
            <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
        </form>

        @include('site.partials._social_links')

    </div>
    <!-- End .mobile-menu-wrapper -->
</div>
<!-- End .mobile-menu-container -->

<div class="sticky-navbar">
    <div class="sticky-info">
        <a href="{{route('home')}}">
            <i class="icon-home"></i>{{__('site.home')}}
        </a>
    </div>
    <div class="sticky-info">
        <a href="{{route('products')}}" class="">
            <i class="icon-bars"></i>{{__('site.products')}}
        </a>
    </div>
    @auth('client')
    <div class="sticky-info">
        <a href="{{route('profile.wishList')}}" class="">
            <i class="icon-wishlist-2"></i>{{__('menu.wishlist')}}
        </a>
    </div>
    <div class="sticky-info">
        <a href="{{route('profile.index')}}" class="">
            <i class="icon-user-2"></i>{{__('menu.profile')}}
        </a>
    </div>
    @endauth
    <div class="sticky-info">
        <a href="{{route('cart')}}" class="">
            <i class="icon-shopping-cart position-relative">
                <span class="cart-count badge-circle">3</span>
            </i>{{__('site.cart')}}
        </a>
    </div>
</div>
