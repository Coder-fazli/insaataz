<style>
    :root {
        --brand-blue: #2C468F;
        --brand-light: #F0F4FF;
    }
    .logo-section {
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }
    .logo-container {
        width: 100px;
        height: 100px;
        background: #ffffff;
        border-radius: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        padding: 8px;
        border: 1px solid #f1f5f9;
        box-shadow:
            0 12px 24px -8px rgba(0, 0, 0, 0.1),
            0 0 0 1px rgba(0, 0, 0, 0.02);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .logo-img {
        width: 90%;
        height: 90%;
        object-fit: contain;
        transition: transform 0.4s ease;
    }
    .logo-section:hover .logo-container {
        transform: translateY(-4px) scale(1.02);
    }
    .header-search {
        background: #ffffff;
        border: 2px solid #f1f5f9;
        transition: all 0.3s ease;
        height: 64px;
    }
    .header-search:focus-within {
        border-color: var(--brand-blue);
        box-shadow: 0 0 0 4px rgba(44, 70, 143, 0.08);
    }
    .social-link {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8fafc;
        color: #64748b;
        transition: all 0.3s ease;
        font-size: 16px;
        border: 1px solid #f1f5f9;
        text-decoration: none;
    }
    .social-link:hover {
        background: var(--brand-blue);
        color: white;
        transform: translateY(-3px);
    }
    .contact-pill {
        background: #F8FAFC;
        border: 1px solid #F1F5F9;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
    }
    .contact-pill::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--brand-blue);
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        z-index: 0;
    }
    .contact-pill:hover::before {
        transform: scaleX(1);
        transform-origin: left;
    }
    .contact-pill:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 35px -5px rgba(44, 70, 143, 0.25);
        border-color: var(--brand-blue);
    }
    .contact-pill > * {
        position: relative;
        z-index: 1;
        transition: all 0.4s ease;
    }
    .contact-pill:hover .text-gray-400 {
        color: rgba(255,255,255,0.7) !important;
    }
    .contact-pill:hover .text-gray-900 {
        color: #ffffff !important;
    }
    .contact-pill:hover .contact-icon-box {
        background: rgba(255,255,255,0.15) !important;
        color: #ffffff !important;
        transform: rotate(15deg) scale(1.1);
    }
    .contact-icon-box {
        transition: all 0.4s ease;
    }
    .pulse-effect {
        animation: phonePulse 2s infinite;
    }
    @keyframes phonePulse {
        0% { box-shadow: 0 0 0 0 rgba(44, 70, 143, 0.4); }
        70% { box-shadow: 0 0 0 15px rgba(44, 70, 143, 0); }
        100% { box-shadow: 0 0 0 0 rgba(44, 70, 143, 0); }
    }
    .contact-pill:hover .pulse-effect {
        animation: none;
    }
    .nav-link {
        transition: color 0.3s ease;
    }
    .nav-link:hover {
        color: var(--brand-blue) !important;
    }
    .nav-link.active {
        color: var(--brand-blue) !important;
        position: relative;
    }
    .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -18px;
        left: 0;
        width: 100%;
        height: 3.5px;
        background: var(--brand-blue);
        border-radius: 10px;
    }
</style>

{{-- Blue Top Bar --}}
<div class="h-1.5 w-full bg-[#2C468F]"></div>

{{-- Header --}}
<header class="bg-white border-b border-gray-100 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 h-36 flex justify-between items-center gap-12">
        {{-- Logo Section --}}
        <a href="{{route('home')}}" class="logo-section cursor-pointer group" style="text-decoration: none;">
            <div class="logo-container">
                <img src="{{asset('storage/'.$logo)}}" alt="{{config('app.name')}}" class="logo-img" />
            </div>
            <div class="flex flex-col">
                <span class="text-4xl font-black text-gray-900 leading-none tracking-tighter uppercase group-hover:text-[#2C468F] transition-all">OREL</span>
                <span class="text-[12px] font-black text-[#2C468F] uppercase tracking-[0.5em] mt-2 opacity-90">iNSAAT</span>
            </div>
        </a>

        {{-- Search Bar --}}
        <div class="hidden md:flex flex-1 max-w-xl">
            <form action="{{route('search')}}" method="get" class="w-full">
                <div class="header-search flex items-center w-full px-8 rounded-2xl">
                    <input type="text" name="q" placeholder="Mehsul, xidmet ve ya material axtarin..." class="bg-transparent w-full outline-none text-[15px] font-semibold text-gray-700 placeholder-gray-300" />
                    <button type="submit" class="bg-transparent border-none cursor-pointer">
                        <i class="fa-solid fa-magnifying-glass text-gray-300 text-lg ml-4"></i>
                    </button>
                </div>
            </form>
        </div>

        {{-- Right Actions --}}
        <div class="hidden lg:flex items-center gap-8">
            <div class="flex items-center gap-2.5">
                @if($settings->facebook)
                    <a href="{{$settings->facebook}}" class="social-link" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                @endif
                @if($settings->instagram)
                    <a href="{{$settings->instagram}}" class="social-link" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                @endif
                <a href="https://www.linkedin.com/company/orelinsaat" class="social-link" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="https://wa.me/994102900101" class="social-link" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
            </div>

            {{-- Premium Contact Pill --}}
            <a href="tel:+994102900101" class="contact-pill flex items-center gap-5 px-7 py-4 rounded-[1.5rem] cursor-pointer" style="text-decoration: none;">
                <div class="contact-icon-box w-12 h-12 rounded-full bg-[#F0F4FF] flex items-center justify-center text-[#2C468F] pulse-effect">
                    <i class="fa-solid fa-phone-volume text-base"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-0.5">ELAQE</span>
                    <span class="text-xl font-black text-gray-900 tracking-tight">+994 10 290 01 01</span>
                </div>
            </a>
        </div>

        {{-- Mobile Menu Toggle --}}
        <button class="mobile-menu-toggler lg:hidden" type="button" style="background: none; border: none; font-size: 24px; color: #1a1a1a; cursor: pointer;">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>

    {{-- Navigation --}}
    <div class="max-w-7xl mx-auto px-6 border-t border-gray-50 bg-white hidden md:block">
        <nav class="flex justify-center space-x-12 text-[12px] font-bold text-gray-400 items-center uppercase tracking-[0.2em] h-16">
            <a href="{{route('home')}}" class="nav-link {{\Illuminate\Support\Facades\Route::currentRouteName()=='home' ? 'active' : ''}} py-4">{{__('site.home')}}</a>
            <a href="{{route('about')}}" class="nav-link {{\Illuminate\Support\Facades\Route::currentRouteName()=='about' ? 'active' : ''}} py-4">{{__('site.about')}}</a>
            <a href="{{route('categories')}}" class="nav-link {{\Illuminate\Support\Facades\Route::currentRouteName()=='categories' ? 'active' : ''}} py-4">{{__('site.products')}}</a>
            <a href="{{route('portfolio')}}" class="nav-link {{\Illuminate\Support\Facades\Route::currentRouteName()=='portfolio' ? 'active' : ''}} py-4">{{__('site.portfolio')}}</a>
            <a href="{{route('blog')}}" class="nav-link {{\Illuminate\Support\Facades\Route::currentRouteName()=='blog' ? 'active' : ''}} py-4">{{__('site.blog')}}</a>
            <a href="{{route('contact')}}" class="nav-link {{\Illuminate\Support\Facades\Route::currentRouteName()=='contact' ? 'active' : ''}} py-4">{{__('site.contact')}}</a>
        </nav>
    </div>
</header>

{{-- Mobile Menu Overlay --}}
<div class="mobile-menu-overlay"></div>

{{-- Mobile Menu Container --}}
<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li class="{{\Illuminate\Support\Facades\Route::currentRouteName()=='home' ? 'active' : ''}}"><a href="{{route('home')}}">{{__('site.home')}}</a></li>
                <li class="{{\Illuminate\Support\Facades\Route::currentRouteName()=='about' ? 'active' : ''}}"><a href="{{route('about')}}">{{__('site.about')}}</a></li>
                <li class="{{\Illuminate\Support\Facades\Route::currentRouteName()=='categories' ? 'active' : ''}}"><a href="{{route('categories')}}">{{__('site.products')}}</a></li>
                <li class="{{\Illuminate\Support\Facades\Route::currentRouteName()=='portfolio' ? 'active' : ''}}"><a href="{{route('portfolio')}}">{{__('site.portfolio')}}</a></li>
                <li class="{{\Illuminate\Support\Facades\Route::currentRouteName()=='blog' ? 'active' : ''}}"><a href="{{route('blog')}}">{{__('site.blog')}}</a></li>
                <li class="{{\Illuminate\Support\Facades\Route::currentRouteName()=='contact' ? 'active' : ''}}"><a href="{{route('contact')}}">{{__('site.contact')}}</a></li>
            </ul>

            <ul class="mobile-menu">
                <li><a href="{{route('cart')}}">{{__('site.cart')}}</a></li>
            </ul>
        </nav>

        {{-- Mobile Search --}}
        <form class="search-wrapper mb-2" action="{{route('search')}}">
            <input type="text" name="q" class="form-control mb-0" placeholder="{{__('site.search')}}" required/>
            <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
        </form>

        {{-- Mobile Social Links --}}
        <div class="flex gap-2 p-4 justify-center">
            @if($settings->facebook)
                <a href="{{$settings->facebook}}" class="social-link" target="_blank" style="background: #2C468F; color: white;">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
            @endif
            @if($settings->instagram)
                <a href="{{$settings->instagram}}" class="social-link" target="_blank" style="background: #2C468F; color: white;">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            @endif
            <a href="https://wa.me/994102900101" class="social-link" target="_blank" style="background: #25D366; color: white;">
                <i class="fa-brands fa-whatsapp"></i>
            </a>
        </div>

        {{-- Mobile Contact --}}
        <div class="p-4 text-center">
            <a href="tel:+994102900101" style="color: #2C468F; font-weight: 700; font-size: 1.25rem; text-decoration: none;">
                <i class="fa-solid fa-phone"></i> +994 10 290 01 01
            </a>
        </div>
    </div>
</div>

{{-- Sticky Bottom Navbar for Mobile --}}
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
                <span class="cart-count badge-circle">{{$products->sum('qty')}}</span>
            </i>{{__('site.cart')}}
        </a>
    </div>
</div>
