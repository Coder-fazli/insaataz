<footer class="footer bg-dark">
    <div class="container" style="padding-top: 50px; padding-bottom: 40px;">
        <div class="row">
            <!-- Колонка 1: Логотип -->
            <div class="col-lg-3 col-md-6 col-6 mb-4 mb-lg-0">
                <div class="footer-logo mb-3">
                    <a href="{{route('home')}}">
                        <img src="{{asset('images/footer-logo.png')}}" alt="{{config('app.name')}}" style="max-width: 180px; height: auto;">
                    </a>
                </div>
            </div>

            <!-- Колонка 2: Ссылки на страницы -->
            <div class="col-lg-3 col-md-6 col-6 mb-4 mb-lg-0">
                <h5 class="text-white mb-3 footer-heading">Səhifələr</h5>
                <ul class="footer-links list-unstyled">
                    <li class="mb-2">
                        <a href="{{route('about')}}" class="footer-link">
                            <i class="fas fa-chevron-right"></i>
                            <span>{{__('site.about')}}</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{route('contact')}}" class="footer-link">
                            <i class="fas fa-chevron-right"></i>
                            <span>{{__('site.contact')}}</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{route('portfolio')}}" class="footer-link">
                            <i class="fas fa-chevron-right"></i>
                            <span>{{__('site.portfolio')}}</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{route('categories')}}" class="footer-link">
                            <i class="fas fa-chevron-right"></i>
                            <span>{{__('site.products')}}</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Колонка 3: Контакты -->
            <div class="col-lg-3 col-md-6 col-6 mb-4 mb-lg-0">
                <h5 class="text-white mb-3 footer-heading">Əlaqə</h5>
                <div class="footer-contact mb-2">
                    <p class="text-white-50 mb-1" style="font-size: 13px;">Bizə indi zəng edin</p>
                    <a href="tel:{{$settings->phone[0]['attributes']['phone']}}" class="text-white footer-phone" style="font-size: 16px; font-weight: 600; text-decoration: none; white-space: nowrap; display: flex; align-items: center; gap: 8px;">
                        <i class="fas fa-phone" style="font-size: 14px;"></i>
                        <span>{{$settings->phone[0]['attributes']['phone']}}</span>
                    </a>
                </div>
                <div class="footer-address mt-2">
                    <p class="text-white-50 mb-1" style="font-size: 13px;"><strong>Ünvan:</strong></p>
                    <p class="text-white-50 mb-0" style="font-size: 13px; line-height: 1.5;">32 Aşıq Molla Cümə, Bakı 1052</p>
                </div>
            </div>

            <!-- Колонка 4: Социальные сети -->
            <div class="col-lg-3 col-md-6 col-6">
                <h5 class="text-white mb-3 footer-heading">Sosial media</h5>
                <div class="footer-social-icons">
                    @if($settings->facebook)
                        <a href="{{$settings->facebook}}" class="social-icon social-facebook" target="_blank" title="Facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" style="width: 18px; height: 18px; fill: white;">
                                <path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/>
                            </svg>
                        </a>
                    @endif
                    @if($settings->twitter)
                        <a href="{{$settings->twitter}}" class="social-icon social-twitter" target="_blank" title="Twitter">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 18px; height: 18px; fill: white;">
                                <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/>
                            </svg>
                        </a>
                    @endif
                    @if($settings->instagram)
                        <a href="{{$settings->instagram}}" class="social-icon social-instagram" target="_blank" title="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width: 18px; height: 18px; fill: white;">
                                <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                            </svg>
                        </a>
                    @endif
                    <a href="https://www.tiktok.com/@orelinsaat?_r=1&_t=ZS-926NHQsFEgr" class="social-icon social-tiktok" target="_blank" title="TikTok">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width: 18px; height: 18px; fill: white;">
                            <path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Нижняя часть с копирайтом -->
        <div class="footer-bottom mt-4 pt-4" style="border-top: 1px solid rgba(255,255,255,0.1);">
            <div class="text-center">
                <span class="footer-copyright text-white-50">{!! __('site.reserved',['name'=>'<a href="https://webcoder.az/" class="text-white">WebCoder Agency</a>']) !!}</span>
            </div>
        </div>
    </div>
</footer>

<style>
.footer-heading {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 20px !important;
}

.footer-link {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    font-size: 15px;
    color: rgba(255, 255, 255, 0.6) !important;
    transition: all 0.3s ease;
    position: relative;
}

.footer-link i {
    font-size: 12px;
    color: rgba(255, 255, 255, 0.6);
    transition: all 0.3s ease;
    transform: translateX(0);
}

.footer-link span {
    transition: all 0.3s ease;
}

.footer-link:hover {
    color: #0d6efd !important;
}

.footer-link:hover i {
    color: #0d6efd;
    transform: translateX(5px);
}

.footer-link:hover span {
    color: #0d6efd;
}

.footer-links li {
    margin-bottom: 10px !important;
}

.footer-contact a {
    transition: all 0.3s ease;
}

.footer-contact a:hover {
    color: #0d6efd !important;
    transform: translateX(5px);
}

.footer-contact a:hover i {
    color: #0d6efd;
}

.footer-phone i {
    transition: all 0.3s ease;
}

.footer-social-icons {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.footer-social-icons .social-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    font-size: 18px;
    transition: all 0.3s ease;
    opacity: 0.7;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 50%;
}

.footer-social-icons .social-icon:hover {
    transform: translateY(-5px) scale(1.1);
    opacity: 1;
    background: var(--primary-color, #0d6efd);
    color: #fff !important;
    box-shadow: 0 5px 15px rgba(13, 110, 253, 0.4);
}

@media (max-width: 991px) {
    .footer .container {
        padding-top: 40px !important;
        padding-bottom: 30px !important;
    }
}

@media (max-width: 767px) {
    .footer .container {
        padding-top: 30px !important;
        padding-bottom: 25px !important;
    }

    .footer-logo img {
        max-width: 150px !important;
    }

    .footer-heading {
        font-size: 16px;
    }

    .footer-phone {
        font-size: 14px !important;
    }

    .footer .row > [class*="col-"] {
        padding-left: 15px;
        padding-right: 15px;
    }

    .footer-contact p,
    .footer-address p {
        font-size: 12px !important;
    }

    .footer-contact {
        margin-bottom: 10px !important;
    }

    .footer-address {
        margin-top: 10px !important;
    }
}

@media (max-width: 400px) {
    .footer-phone {
        font-size: 15px !important;
    }
}
</style>
