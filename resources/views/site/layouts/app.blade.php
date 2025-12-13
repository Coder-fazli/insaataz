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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .whatsapp-float-btn {
            position: fixed;
            right: 25px;
            top: 50%;
            transform: translateY(-50%);
            background: #4A90E2;
            color: white;
            padding: 14px 24px;
            border-radius: 30px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 400;
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
            background: rgba(74, 144, 226, 0.25);
            border-radius: 30px;
            transform: translate(-50%, -50%);
            animation: spreadPulse 3s ease-out infinite;
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
            background: rgba(74, 144, 226, 0.15);
            border-radius: 30px;
            transform: translate(-50%, -50%);
            animation: spreadPulse 3s ease-out infinite 1.5s;
            pointer-events: none;
            z-index: -1;
        }

        .whatsapp-float-btn:hover {
            transform: translateY(-50%);
            box-shadow: 0 6px 20px rgba(74, 144, 226, 0.45);
            background: #5BA3F5;
            color: white;
            text-decoration: none;
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
                opacity: 0.3;
            }
            100% {
                transform: translate(-50%, -50%) scale(1.15);
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



