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
            right: 30px;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            color: white;
            padding: 15px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            z-index: 9999;
            transition: all 0.3s ease;
            animation: pulse 2s infinite;
        }

        .whatsapp-float-btn:hover {
            transform: translateY(-50%) scale(1.05);
            box-shadow: 0 6px 25px rgba(37, 211, 102, 0.6);
            color: white;
            text-decoration: none;
        }

        .whatsapp-float-btn i {
            font-size: 20px;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            }
            50% {
                box-shadow: 0 4px 30px rgba(37, 211, 102, 0.7);
            }
            100% {
                box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            }
        }

        @media (max-width: 768px) {
            .whatsapp-float-btn {
                right: 15px;
                padding: 12px 20px;
                font-size: 14px;
            }

            .whatsapp-float-btn i {
                font-size: 18px;
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
<a href="https://wa.me/0102900101" target="_blank" class="whatsapp-float-btn">
    <i class="fab fa-whatsapp"></i>
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



