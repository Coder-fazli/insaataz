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
                        <a href="{{$settings->facebook}}" class="social-icon social-facebook fab fa-facebook-f" target="_blank" title="Facebook" style="color: white !important;"></a>
                    @endif
                    @if($settings->twitter)
                        <a href="{{$settings->twitter}}" class="social-icon social-twitter fab fa-twitter" target="_blank" title="Twitter" style="color: white !important;"></a>
                    @endif
                    @if($settings->instagram)
                        <a href="{{$settings->instagram}}" class="social-icon social-instagram fab fa-instagram" target="_blank" title="Instagram" style="color: white !important;"></a>
                    @endif
                    <a href="https://www.tiktok.com/@orelinsaat?_r=1&_t=ZS-926NHQsFEgr" class="social-icon social-tiktok fab fa-tiktok" target="_blank" title="TikTok" style="color: white !important;"></a>
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
