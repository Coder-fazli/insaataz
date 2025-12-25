{{-- NEW HEADER DESIGN --}}
<div class="new-header">
    {{-- Blue Top Bar --}}
    <div class="header-top-bar"></div>

    {{-- Main Header --}}
    <header class="header-main">
        <div class="header-content">
            {{-- Logo Section --}}
            <a href="{{route('home')}}" class="logo-section" style="text-decoration: none;">
                <div class="logo-container">
                    <img src="{{asset('storage/'.$logo)}}" alt="{{config('app.name')}}" class="logo-img" />
                </div>
                <div style="display: flex; flex-direction: column;">
                    <span class="logo-text-main" style="font-size: 2.25rem; font-weight: 900; color: #1a1a1a; line-height: 1; letter-spacing: -0.05em; text-transform: uppercase; transition: all 0.3s ease;">OREL</span>
                    <span style="font-size: 12px; font-weight: 900; color: #2C468F; text-transform: uppercase; letter-spacing: 0.5em; margin-top: 0.5rem; opacity: 0.9;">iNSAAT</span>
                </div>
            </a>

            {{-- Right Actions (Desktop) --}}
            <div class="header-right-actions" style="display: flex; align-items: center; gap: 2rem;">
                {{-- Social Icons --}}
                <div style="display: flex; align-items: center; gap: 0.625rem;">
                    @if($settings->facebook)
                        <a href="{{$settings->facebook}}" class="social-link" target="_blank" title="Facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    @endif
                    @if($settings->instagram)
                        <a href="{{$settings->instagram}}" class="social-link" target="_blank" title="Instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    @endif
                    @if($settings->twitter)
                        <a href="{{$settings->twitter}}" class="social-link" target="_blank" title="X">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                    @endif
                    <a href="https://www.tiktok.com/@orelinsaat?_r=1&_t=ZS-926NHQsFEgr" class="social-link" target="_blank" title="TikTok">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                    <a href="https://wa.me/994102900101" class="social-link" target="_blank" title="WhatsApp">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>

                {{-- Premium Contact Pill --}}
                <a href="tel:+994102900101" class="contact-pill" style="display: flex; align-items: center; gap: 1.25rem; padding: 1rem 1.75rem; border-radius: 1.5rem; cursor: pointer; text-decoration: none;">
                    <div class="contact-icon-box pulse-effect" style="width: 48px; height: 48px; border-radius: 50%; background: #F0F4FF; display: flex; align-items: center; justify-content: center; color: #2C468F;">
                        <i class="fa-solid fa-phone-volume" style="font-size: 1rem;"></i>
                    </div>
                    <div style="display: flex; flex-direction: column;">
                        <span class="contact-label" style="font-size: 10px; font-weight: 900; color: #9ca3af; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 2px;">ELAQE</span>
                        <span class="contact-number" style="font-size: 1.25rem; font-weight: 900; color: #1a1a1a; letter-spacing: -0.025em;">+994 10 290 01 01</span>
                    </div>
                </a>

                {{-- Language Switcher --}}
                @include('components.lang-switcher')

                {{-- Cart --}}
                <div class="dropdown cart-dropdown">
                    <a href="{{route('cart')}}" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle"
                       role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"
                       style="display: flex; align-items: center; justify-content: center; width: 42px; height: 42px; border-radius: 50%; background: #f8fafc; border: 1px solid #f1f5f9; color: #64748b; transition: all 0.3s ease;">
                        <i class="minicart-icon"></i>
                        <span class="cart-count badge-circle @if($products->sum('qty')==0) d-none @endif">{{$products->sum('qty')}}</span>
                    </a>

                    <div class="cart-overlay"></div>

                    <div class="dropdown-menu mobile-cart">
                        <a href="#" title="Close (Esc)" class="btn-close">x</a>
                        <div class="dropdownmenu-wrapper custom-scrollbar cart-box">
                            @include('site.partials._modalCart',['products'=>$products])
                        </div>
                    </div>
                </div>
            </div>

            {{-- Mobile Menu Toggle --}}
            <button class="mobile-menu-toggler" type="button" style="display: none; background: none; border: none; font-size: 24px; color: #1a1a1a; cursor: pointer;">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        {{-- Navigation --}}
        <div class="header-nav">
            <nav>
                <a href="{{route('home')}}" class="nav-link-new {{\Illuminate\Support\Facades\Route::currentRouteName()=='home' ? 'active' : ''}}">{{__('site.home')}}</a>
                <a href="{{route('about')}}" class="nav-link-new {{\Illuminate\Support\Facades\Route::currentRouteName()=='about' ? 'active' : ''}}">{{__('site.about')}}</a>
                <a href="{{route('categories')}}" class="nav-link-new {{\Illuminate\Support\Facades\Route::currentRouteName()=='categories' ? 'active' : ''}}">{{__('site.products')}}</a>
                <a href="{{route('portfolio')}}" class="nav-link-new {{\Illuminate\Support\Facades\Route::currentRouteName()=='portfolio' ? 'active' : ''}}">{{__('site.portfolio')}}</a>
                <a href="{{route('blog')}}" class="nav-link-new {{\Illuminate\Support\Facades\Route::currentRouteName()=='blog' ? 'active' : ''}}">{{__('site.blog')}}</a>
                <a href="{{route('contact')}}" class="nav-link-new {{\Illuminate\Support\Facades\Route::currentRouteName()=='contact' ? 'active' : ''}}">{{__('site.contact')}}</a>
            </nav>
        </div>
    </header>
</div>

<style>
    /* Mobile menu toggler visibility */
    @media (max-width: 768px) {
        .new-header .mobile-menu-toggler {
            display: block !important;
        }
    }
</style>

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

        {{-- Mobile Social Links --}}
        <div style="display: flex; gap: 0.5rem; padding: 1rem; justify-content: center;">
            @if($settings->facebook)
                <a href="{{$settings->facebook}}" class="social-link" target="_blank" style="width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: #2C468F; color: white; text-decoration: none;">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
            @endif
            @if($settings->instagram)
                <a href="{{$settings->instagram}}" class="social-link" target="_blank" style="width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: #2C468F; color: white; text-decoration: none;">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            @endif
            <a href="https://wa.me/994102900101" class="social-link" target="_blank" style="width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: #25D366; color: white; text-decoration: none;">
                <i class="fa-brands fa-whatsapp"></i>
            </a>
        </div>

        {{-- Mobile Contact --}}
        <div style="padding: 1rem; text-align: center;">
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
