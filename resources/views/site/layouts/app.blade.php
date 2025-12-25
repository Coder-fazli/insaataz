<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{__('site.seo_title')}}</title>

    <meta name="keywords" content="{{__('site.seo_keywords')}}"/>
    <meta name="description" content="{{__('site.seo_desc')}}">
    <meta name="author" content="WebCoder">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{get_imageAspect($settings->favicon)}}">


    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800']
            }
        };
        (function (d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="/webcoder/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/webcoder/assets/css/main.css?v=2.8')}}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="/webcoder/assets/css/demo4.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/webcoder/assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        /* ===== NEW HEADER STYLES ===== */
        :root {
            --brand-blue: #2C468F;
            --brand-light: #F0F4FF;
        }

        /* Logo Section */
        .new-header .logo-section {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        .new-header .logo-container {
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
        .new-header .logo-img {
            width: 90%;
            height: 90%;
            object-fit: contain;
            transition: transform 0.4s ease;
        }
        .new-header .logo-section:hover .logo-container {
            transform: translateY(-4px) scale(1.02);
        }

        /* Social Links New Style */
        .new-header .social-link {
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
        .new-header .social-link:hover {
            background: var(--brand-blue);
            color: white;
            transform: translateY(-3px);
        }

        /* Premium Contact Pill */
        .new-header .contact-pill {
            background: #F8FAFC;
            border: 1px solid #F1F5F9;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            text-decoration: none;
        }
        .new-header .contact-pill::before {
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
        .new-header .contact-pill:hover::before {
            transform: scaleX(1);
            transform-origin: left;
        }
        .new-header .contact-pill:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px -5px rgba(44, 70, 143, 0.25);
            border-color: var(--brand-blue);
            text-decoration: none;
        }
        .new-header .contact-pill > * {
            position: relative;
            z-index: 1;
            transition: all 0.4s ease;
        }
        .new-header .contact-pill:hover .contact-label {
            color: rgba(255,255,255,0.7);
        }
        .new-header .contact-pill:hover .contact-number {
            color: #ffffff;
        }
        .new-header .contact-pill:hover .contact-icon-box {
            background: rgba(255,255,255,0.15);
            color: #ffffff;
            transform: rotate(15deg) scale(1.1);
        }
        .new-header .contact-icon-box {
            transition: all 0.4s ease;
        }
        .new-header .pulse-effect {
            animation: phonePulse 2s infinite;
        }
        @keyframes phonePulse {
            0% { box-shadow: 0 0 0 0 rgba(44, 70, 143, 0.4); }
            70% { box-shadow: 0 0 0 15px rgba(44, 70, 143, 0); }
            100% { box-shadow: 0 0 0 0 rgba(44, 70, 143, 0); }
        }
        .new-header .contact-pill:hover .pulse-effect {
            animation: none;
        }

        /* Navigation New Style */
        .new-header .nav-link-new {
            color: #9ca3af;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            padding: 1rem 0;
            position: relative;
            transition: color 0.3s ease;
        }
        .new-header .nav-link-new:hover {
            color: var(--brand-blue);
        }
        .new-header .nav-link-new.active {
            color: var(--brand-blue);
        }
        .new-header .nav-link-new.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 3.5px;
            background: var(--brand-blue);
            border-radius: 10px;
        }

        /* Header Layout */
        .new-header .header-main {
            background: white;
            border-bottom: 1px solid #f3f4f6;
            position: sticky;
            top: 0;
            z-index: 50;
        }
        .new-header .header-top-bar {
            height: 6px;
            width: 100%;
            background: var(--brand-blue);
        }
        .new-header .header-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
            height: 144px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 3rem;
        }
        .new-header .header-nav {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
            border-top: 1px solid #f9fafb;
            background: white;
        }
        .new-header .header-nav nav {
            display: flex;
            justify-content: center;
            gap: 3rem;
            height: 64px;
            align-items: center;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .new-header .header-content {
                height: auto;
                padding: 1rem 1.5rem;
                flex-wrap: wrap;
            }
            .new-header .logo-container {
                width: 70px;
                height: 70px;
            }
            .new-header .logo-section .logo-text-main {
                font-size: 1.75rem !important;
            }
            .new-header .header-right-actions {
                display: none !important;
            }
            .new-header .header-nav nav {
                gap: 1.5rem;
            }
            .new-header .nav-link-new {
                font-size: 10px;
            }
        }
        @media (max-width: 768px) {
            .new-header .header-nav {
                display: none;
            }
            .new-header .header-content {
                justify-content: space-between;
            }
        }
        /* ===== END NEW HEADER STYLES ===== */

        .whatsapp-float-btn {
            position: fixed;
            right: 25px;
            top: 70%;
            transform: translateY(-50%);
            background: #4A90E2;
            color: white;
            padding: 14px 24px;
            border-radius: 30px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
            z-index: 9999;
            transition: all 0.3s ease;
            font-family: 'Roboto', sans-serif;
            border: none;
            outline: none;
            overflow: visible;
            position: fixed;
        }

        .whatsapp-float-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            background: rgba(74, 144, 226, 0.5);
            border-radius: 30px;
            transform: translate(-50%, -50%);
            animation: spreadPulse 2.5s ease-out infinite;
            pointer-events: none;
            z-index: -1;
        }

        .whatsapp-float-btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            background: rgba(74, 144, 226, 0.3);
            border-radius: 30px;
            transform: translate(-50%, -50%);
            animation: spreadPulse 2.5s ease-out infinite 1.25s;
            pointer-events: none;
            z-index: -1;
        }

        .whatsapp-float-btn:hover {
            transform: translateY(-50%);
            box-shadow: 0 6px 20px rgba(74, 144, 226, 0.45);
            background: #5BA3F5;
            color: white !important;
            text-decoration: none;
        }

        .whatsapp-float-btn:visited,
        .whatsapp-float-btn:active,
        .whatsapp-float-btn:focus {
            color: white !important;
            text-decoration: none;
        }

        .whatsapp-float-btn:visited span,
        .whatsapp-float-btn:active span,
        .whatsapp-float-btn:focus span {
            color: white !important;
        }

        .whatsapp-float-btn svg {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
            position: relative;
            z-index: 1;
        }

        .whatsapp-float-btn span {
            letter-spacing: 0.2px;
            white-space: nowrap;
            position: relative;
            z-index: 1;
        }

        @keyframes spreadPulse {
            0% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 0.6;
            }
            100% {
                transform: translate(-50%, -50%) scale(1.4);
                opacity: 0;
            }
        }

        @media (max-width: 768px) {
            .whatsapp-float-btn {
                right: 15px;
                padding: 12px 20px;
                font-size: 13px;
                gap: 8px;
            }

            .whatsapp-float-btn svg {
                width: 18px;
                height: 18px;
            }
        }

        @media (max-width: 480px) {
            .whatsapp-float-btn {
                right: 10px;
                padding: 10px 16px;
                font-size: 13px;
            }
        }
    </style>

    @stack('head')
</head>

<body style="color:black;">
<div class="page-wrapper">


    <x-header/>


    @yield('content')

    <x-footer/>
</div>
<!-- End .page-wrapper -->

<!-- WhatsApp Float Button -->
<a href="https://wa.me/994102900101" target="_blank" class="whatsapp-float-btn">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
    </svg>
    <span>Teklif al</span>
</a>

{{--<div class="loading-overlay">--}}
{{--    <div class="bounce-loader">--}}
{{--        <div class="bounce1"></div>--}}
{{--        <div class="bounce2"></div>--}}
{{--        <div class="bounce3"></div>--}}
{{--    </div>--}}
{{--</div>--}}



{{--<div class="newsletter-popup mfp-hide bg-img" id="newsletter-popup-form" style="background: #f1f1f1 no-repeat center/cover url(/webcoder/assets/images/newsletter_popup_bg.jpg)">--}}
{{--    <div class="newsletter-popup-content">--}}
{{--        <img src="/webcoder/assets/images/logo.png" width="111" height="44" alt="Logo" class="logo-newsletter">--}}
{{--        <h2>Subscribe to newsletter</h2>--}}

{{--        <p>--}}
{{--            Subscribe to the Porto mailing list to receive updates on new arrivals, special offers and our promotions.--}}
{{--        </p>--}}

{{--        <form action="#">--}}
{{--            <div class="input-group">--}}
{{--                <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Your email address" required />--}}
{{--                <input type="submit" class="btn btn-primary" value="Submit" />--}}
{{--            </div>--}}
{{--        </form>--}}
{{--        <div class="newsletter-subscribe">--}}
{{--            <div class="custom-control custom-checkbox">--}}
{{--                <input type="checkbox" class="custom-control-input" value="0" id="show-again" />--}}
{{--                <label for="show-again" class="custom-control-label">--}}
{{--                    Don't show this popup again--}}
{{--                </label>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- End .newsletter-popup-content -->--}}

{{--    <button title="Close (Esc)" type="button" class="mfp-close">--}}
{{--        ×--}}
{{--    </button>--}}
{{--</div>--}}


<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>
@include('site.includes.scripts')
@stack('foot')
</body>

</html>



