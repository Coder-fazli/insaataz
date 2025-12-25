<style>
    .new-header-wrapper * {
        box-sizing: border-box;
    }
    .new-header-wrapper {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }
    .new-header-topbar {
        height: 6px;
        width: 100%;
        background: #2C468F;
    }
    .new-header-main {
        background: #ffffff;
        border-bottom: 1px solid #f3f4f6;
        position: sticky;
        top: 0;
        z-index: 1000;
    }
    .new-header-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        height: 144px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 48px;
    }
    .new-header-logo {
        display: flex;
        align-items: center;
        gap: 24px;
        text-decoration: none;
        flex-shrink: 0;
    }
    .new-header-logo-box {
        width: 100px;
        height: 100px;
        background: #ffffff;
        border-radius: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 8px;
        border: 1px solid #f1f5f9;
        box-shadow: 0 12px 24px -8px rgba(0, 0, 0, 0.1), 0 0 0 1px rgba(0, 0, 0, 0.02);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .new-header-logo:hover .new-header-logo-box {
        transform: translateY(-4px) scale(1.02);
    }
    .new-header-logo-img {
        width: 90%;
        height: 90%;
        object-fit: contain;
    }
    .new-header-logo-text {
        display: flex;
        flex-direction: column;
    }
    .new-header-logo-main {
        font-size: 36px;
        font-weight: 900;
        color: #1a1a1a;
        line-height: 1;
        letter-spacing: -0.05em;
        text-transform: uppercase;
        transition: color 0.3s ease;
    }
    .new-header-logo:hover .new-header-logo-main {
        color: #2C468F;
    }
    .new-header-logo-sub {
        font-size: 12px;
        font-weight: 900;
        color: #2C468F;
        text-transform: uppercase;
        letter-spacing: 0.5em;
        margin-top: 8px;
        opacity: 0.9;
    }
    .new-header-search {
        flex: 1;
        max-width: 560px;
        display: flex;
        align-items: center;
    }
    .new-header-search form {
        width: 100%;
        margin: 0;
    }
    .new-header-search-box {
        background: #ffffff;
        border: 2px solid #f1f5f9;
        height: 64px;
        display: flex;
        align-items: center;
        width: 100%;
        padding: 0 32px;
        border-radius: 16px;
        transition: all 0.3s ease;
    }
    .new-header-search-box:focus-within {
        border-color: #2C468F;
        box-shadow: 0 0 0 4px rgba(44, 70, 143, 0.08);
    }
    .new-header-search-input {
        background: transparent;
        border: none;
        outline: none;
        width: 100%;
        font-size: 15px;
        font-weight: 600;
        color: #374151;
    }
    .new-header-search-input::placeholder {
        color: #d1d5db;
    }
    .new-header-search-btn {
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 0;
        margin-left: 16px;
        display: flex;
        align-items: center;
    }
    .new-header-actions {
        display: flex;
        align-items: center;
        gap: 32px;
        flex-shrink: 0;
    }
    .new-header-socials {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .new-header-social {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8fafc;
        color: #64748b;
        transition: all 0.3s ease;
        border: 1px solid #f1f5f9;
        text-decoration: none;
    }
    .new-header-social:hover {
        background: #2C468F;
        color: white;
        transform: translateY(-3px);
    }
    .new-header-social svg {
        fill: currentColor;
    }
    .new-header-contact {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 16px 28px;
        border-radius: 24px;
        background: #F8FAFC;
        border: 1px solid #F1F5F9;
        text-decoration: none;
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .new-header-contact::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #2C468F;
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        z-index: 0;
    }
    .new-header-contact:hover::before {
        transform: scaleX(1);
        transform-origin: left;
    }
    .new-header-contact:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 35px -5px rgba(44, 70, 143, 0.25);
        border-color: #2C468F;
    }
    .new-header-contact > * {
        position: relative;
        z-index: 1;
    }
    .new-header-contact-icon {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: #F0F4FF;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #2C468F;
        transition: all 0.4s ease;
        animation: phonePulse 2s infinite;
    }
    @keyframes phonePulse {
        0% { box-shadow: 0 0 0 0 rgba(44, 70, 143, 0.4); }
        70% { box-shadow: 0 0 0 15px rgba(44, 70, 143, 0); }
        100% { box-shadow: 0 0 0 0 rgba(44, 70, 143, 0); }
    }
    .new-header-contact:hover .new-header-contact-icon {
        background: rgba(255,255,255,0.15);
        color: #ffffff;
        transform: rotate(15deg) scale(1.1);
        animation: none;
    }
    .new-header-contact-text {
        display: flex;
        flex-direction: column;
    }
    .new-header-contact-label {
        font-size: 10px;
        font-weight: 900;
        color: #9ca3af;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        margin-bottom: 2px;
        transition: color 0.4s ease;
    }
    .new-header-contact:hover .new-header-contact-label {
        color: rgba(255,255,255,0.7);
    }
    .new-header-contact-number {
        font-size: 20px;
        font-weight: 900;
        color: #1a1a1a;
        letter-spacing: -0.025em;
        transition: color 0.4s ease;
    }
    .new-header-contact:hover .new-header-contact-number {
        color: #ffffff;
    }
    .new-header-mobile-btn {
        display: none;
        background: none;
        border: none;
        cursor: pointer;
        padding: 8px;
    }
    .new-header-nav-wrapper {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        border-top: 1px solid #f9fafb;
        background: white;
    }
    .new-header-nav {
        display: flex;
        justify-content: center;
        gap: 48px;
        height: 64px;
        align-items: center;
    }
    .new-header-nav-link {
        font-size: 12px;
        font-weight: 700;
        color: #9ca3af;
        text-transform: uppercase;
        letter-spacing: 0.2em;
        text-decoration: none;
        padding: 16px 0;
        position: relative;
        transition: color 0.3s ease;
    }
    .new-header-nav-link:hover {
        color: #2C468F;
    }
    .new-header-nav-link.active {
        color: #2C468F;
    }
    .new-header-nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 3.5px;
        background: #2C468F;
        border-radius: 10px;
    }
    @media (max-width: 1024px) {
        .new-header-container {
            height: auto;
            padding: 16px 24px;
            gap: 24px;
        }
        .new-header-logo-box {
            width: 70px;
            height: 70px;
        }
        .new-header-logo-main {
            font-size: 28px;
        }
        .new-header-actions {
            display: none;
        }
        .new-header-mobile-btn {
            display: block;
        }
        .new-header-nav {
            gap: 24px;
        }
        .new-header-nav-link {
            font-size: 10px;
        }
    }
    @media (max-width: 768px) {
        .new-header-search {
            display: none;
        }
        .new-header-nav-wrapper {
            display: none;
        }
    }
</style>

<header class="header">
<div class="new-header-wrapper">
    {{-- Blue Top Bar --}}
    <div class="new-header-topbar"></div>

    {{-- Main Header --}}
    <div class="new-header-main">
        <div class="new-header-container">
            {{-- Logo --}}
            <a href="{{route('home')}}" class="new-header-logo">
                <div class="new-header-logo-box">
                    <img src="{{asset('storage/'.$logo)}}" alt="{{config('app.name')}}" class="new-header-logo-img" />
                </div>
                <div class="new-header-logo-text">
                    <span class="new-header-logo-main">OREL</span>
                    <span class="new-header-logo-sub">iNSAAT</span>
                </div>
            </a>

            {{-- Search Bar --}}
            <div class="new-header-search">
                <form action="{{route('search')}}" method="get">
                    <div class="new-header-search-box">
                        <input type="text" name="q" placeholder="Mehsul, xidmet ve ya material axtarin..." class="new-header-search-input" />
                        <button type="submit" class="new-header-search-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#d1d5db" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
                        </button>
                    </div>
                </form>
            </div>

            {{-- Actions --}}
            <div class="new-header-actions">
                {{-- Social Icons --}}
                <div class="new-header-socials">
                    @if($settings->facebook)
                        <a href="{{$settings->facebook}}" class="new-header-social" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 320 512"><path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/></svg>
                        </a>
                    @endif
                    @if($settings->instagram)
                        <a href="{{$settings->instagram}}" class="new-header-social" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                        </a>
                    @endif
                    <a href="https://www.tiktok.com/@orelinsaat" class="new-header-social" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 448 512"><path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/></svg>
                    </a>
                    <a href="https://wa.me/994102900101" class="new-header-social" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 448 512"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
                    </a>
                </div>

                {{-- Contact Pill --}}
                <a href="tel:+994102900101" class="new-header-contact">
                    <div class="new-header-contact-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 512 512"><path d="M280 0C408.1 0 512 103.9 512 232c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-101.6-82.4-184-184-184c-13.3 0-24-10.7-24-24s10.7-24 24-24zm8 192a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm-32-72c0-13.3 10.7-24 24-24c75.1 0 136 60.9 136 136c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-48.6-39.4-88-88-88c-13.3 0-24-10.7-24-24zM117.5 1.4c19.4-5.3 39.7 4.6 47.4 23.2l40 96c6.8 16.3 2.1 35.2-11.6 46.3L144 207.3c33.3 70.4 90.3 127.4 160.7 160.7L345 318.7c11.2-13.7 30-18.4 46.3-11.6l96 40c18.6 7.7 28.5 28 23.2 47.4l-24 88C481.8 499.9 466 512 448 512C200.6 512 0 311.4 0 64C0 46 12.1 30.2 29.5 25.4l88-24z"/></svg>
                    </div>
                    <div class="new-header-contact-text">
                        <span class="new-header-contact-label">ELAQE</span>
                        <span class="new-header-contact-number">+994 10 290 01 01</span>
                    </div>
                </a>
            </div>

            {{-- Mobile Menu Toggle --}}
            <button class="mobile-menu-toggler new-header-mobile-btn" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#1a1a1a" viewBox="0 0 448 512"><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
            </button>
        </div>

        {{-- Navigation --}}
        <div class="new-header-nav-wrapper">
            <nav class="new-header-nav">
                <a href="{{route('home')}}" class="new-header-nav-link {{\Illuminate\Support\Facades\Route::currentRouteName()=='home' ? 'active' : ''}}">{{__('site.home')}}</a>
                <a href="{{route('about')}}" class="new-header-nav-link {{\Illuminate\Support\Facades\Route::currentRouteName()=='about' ? 'active' : ''}}">{{__('site.about')}}</a>
                <a href="{{route('categories')}}" class="new-header-nav-link {{\Illuminate\Support\Facades\Route::currentRouteName()=='categories' ? 'active' : ''}}">{{__('site.products')}}</a>
                <a href="{{route('portfolio')}}" class="new-header-nav-link {{\Illuminate\Support\Facades\Route::currentRouteName()=='portfolio' ? 'active' : ''}}">{{__('site.portfolio')}}</a>
                <a href="{{route('blog')}}" class="new-header-nav-link {{\Illuminate\Support\Facades\Route::currentRouteName()=='blog' ? 'active' : ''}}">{{__('site.blog')}}</a>
                <a href="{{route('contact')}}" class="new-header-nav-link {{\Illuminate\Support\Facades\Route::currentRouteName()=='contact' ? 'active' : ''}}">{{__('site.contact')}}</a>
            </nav>
        </div>
    </div>
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
        <div style="display: flex; gap: 8px; padding: 16px; justify-content: center;">
            @if($settings->facebook)
                <a href="{{$settings->facebook}}" target="_blank" style="width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: #2C468F; text-decoration: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="white" viewBox="0 0 320 512"><path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/></svg>
                </a>
            @endif
            @if($settings->instagram)
                <a href="{{$settings->instagram}}" target="_blank" style="width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: #2C468F; text-decoration: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="white" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                </a>
            @endif
            <a href="https://www.tiktok.com/@orelinsaat" target="_blank" style="width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: #000000; text-decoration: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="white" viewBox="0 0 448 512"><path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/></svg>
            </a>
            <a href="https://wa.me/994102900101" target="_blank" style="width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: #25D366; text-decoration: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="white" viewBox="0 0 448 512"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
            </a>
        </div>

        {{-- Mobile Contact --}}
        <div style="padding: 16px; text-align: center;">
            <a href="tel:+994102900101" style="color: #2C468F; font-weight: 700; font-size: 20px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2C468F" viewBox="0 0 512 512"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                +994 10 290 01 01
            </a>
        </div>
    </div>
</div>

{{-- Sticky Bottom Navbar --}}
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
