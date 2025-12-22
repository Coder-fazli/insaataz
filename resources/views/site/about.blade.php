@extends('site.layouts.app')
@push('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('webcoder/assets/dist/simple-lightbox.css?v2.14.0')}}" />

<style>
/* ========================================
   OREL About Page - Modern Elementor Style
   All classes prefixed with 'orel-' to avoid conflicts
   ======================================== */

/* Hero Section */
.orel-about-hero {
    position: relative;
    background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 50%, #0c4a6e 100%);
    padding: 60px 0 120px;
    overflow: hidden;
    font-family: 'Plus Jakarta Sans', 'Roboto', sans-serif;
}

.orel-about-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    opacity: 0.5;
}

.orel-hero-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
    position: relative;
    z-index: 2;
}

.orel-hero-text .orel-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(59, 130, 246, 0.2);
    border: 1px solid rgba(59, 130, 246, 0.3);
    color: #60a5fa;
    padding: 8px 16px;
    border-radius: 50px;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 24px;
}

.orel-hero-text .orel-badge i {
    font-size: 12px;
}

.orel-hero-text h1 {
    font-size: 44px;
    font-weight: 800;
    color: #ffffff;
    line-height: 1.2;
    margin-bottom: 20px;
    font-family: 'Plus Jakarta Sans', sans-serif;
}

.orel-hero-text h1 span {
    background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.orel-hero-text .orel-description {
    font-size: 17px;
    line-height: 1.8;
    color: #94a3b8;
    margin-bottom: 0;
}

.orel-hero-visual {
    position: relative;
}

.orel-logo-card {
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    border-radius: 24px;
    padding: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 20px 60px rgba(59, 130, 246, 0.3);
    position: relative;
    overflow: hidden;
}

.orel-logo-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.08'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

.orel-logo-card img {
    max-width: 220px;
    height: auto;
    position: relative;
    z-index: 2;
}

/* Features Section */
.orel-features-section {
    margin-top: -80px;
    padding: 0 0 50px;
    position: relative;
    z-index: 10;
    font-family: 'Plus Jakarta Sans', 'Roboto', sans-serif;
}

.orel-features-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
}

.orel-feature-card {
    background: #ffffff;
    border-radius: 20px;
    padding: 32px 24px;
    text-align: center;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid #f1f5f9;
    position: relative;
    overflow: hidden;
}

.orel-feature-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #3b82f6, #60a5fa);
    transform: scaleX(0);
    transition: transform 0.4s ease;
}

.orel-feature-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 60px rgba(59, 130, 246, 0.15);
}

.orel-feature-card:hover::before {
    transform: scaleX(1);
}

.orel-feature-icon {
    width: 72px;
    height: 72px;
    margin: 0 auto 20px;
    background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.4s ease;
}

.orel-feature-card:hover .orel-feature-icon {
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    transform: scale(1.1) rotate(5deg);
}

.orel-feature-icon i {
    font-size: 28px;
    color: #3b82f6;
    transition: all 0.4s ease;
}

.orel-feature-card:hover .orel-feature-icon i {
    color: #ffffff;
}

.orel-feature-card h3 {
    font-size: 16px;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 8px;
    font-family: 'Plus Jakarta Sans', sans-serif;
}

.orel-feature-card p {
    font-size: 13px;
    color: #64748b;
    line-height: 1.6;
    margin: 0;
}

/* Content Section */
.orel-content-section {
    padding: 50px 0;
    background: #ffffff;
    font-family: 'Plus Jakarta Sans', 'Roboto', sans-serif;
}

.orel-content-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 80px;
    align-items: center;
}

.orel-content-text .orel-section-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #eff6ff;
    color: #3b82f6;
    padding: 8px 16px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 20px;
}

.orel-content-text h2 {
    font-size: 36px;
    font-weight: 800;
    color: #0f172a;
    line-height: 1.3;
    margin-bottom: 24px;
    font-family: 'Plus Jakarta Sans', sans-serif;
}

.orel-content-text h2 span {
    color: #3b82f6;
}

.orel-content-text .orel-lead {
    font-size: 17px;
    color: #475569;
    line-height: 1.8;
    margin-bottom: 32px;
}

.orel-check-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.orel-check-list li {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    margin-bottom: 16px;
    padding: 16px 20px;
    background: #f8fafc;
    border-radius: 12px;
    transition: all 0.3s ease;
}

.orel-check-list li:hover {
    background: #eff6ff;
    transform: translateX(8px);
}

.orel-check-list li .orel-icon {
    width: 28px;
    height: 28px;
    background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.orel-check-list li .orel-icon i {
    color: white;
    font-size: 12px;
}

.orel-check-list li span {
    font-size: 15px;
    color: #334155;
    font-weight: 500;
    line-height: 1.5;
}

.orel-content-image {
    position: relative;
}

.orel-image-stack {
    position: relative;
}

.orel-image-main {
    background: linear-gradient(135deg, #1e3a5f 0%, #0c4a6e 100%);
    border-radius: 24px;
    padding: 60px;
    position: relative;
    overflow: hidden;
}

.orel-image-main::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.05' fill-rule='evenodd'%3E%3Cpath d='M0 40L40 0H20L0 20M40 40V20L20 40'/%3E%3C/g%3E%3C/svg%3E");
}

.orel-image-content {
    position: relative;
    z-index: 2;
    text-align: center;
}

.orel-image-content .orel-icon-large {
    width: 120px;
    height: 120px;
    margin: 0 auto 24px;
    background: rgba(255,255,255,0.1);
    border-radius: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid rgba(255,255,255,0.2);
}

.orel-image-content .orel-icon-large i {
    font-size: 48px;
    color: #60a5fa;
}

.orel-image-content h3 {
    font-size: 24px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 8px;
    font-family: 'Plus Jakarta Sans', sans-serif;
}

.orel-image-content p {
    font-size: 16px;
    color: #94a3b8;
    margin: 0;
}

.orel-floating-card {
    position: absolute;
    background: #ffffff;
    border-radius: 16px;
    padding: 20px 24px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    display: flex;
    align-items: center;
    gap: 16px;
}

.orel-floating-card.orel-top-right {
    top: -20px;
    right: -20px;
}

.orel-floating-card.orel-bottom-left {
    bottom: -20px;
    left: -20px;
}

.orel-floating-card .orel-fc-icon {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.orel-floating-card .orel-fc-icon i {
    color: white;
    font-size: 20px;
}

.orel-floating-card .orel-fc-text strong {
    display: block;
    font-size: 20px;
    font-weight: 800;
    color: #0f172a;
    font-family: 'Plus Jakarta Sans', sans-serif;
}

.orel-floating-card .orel-fc-text span {
    font-size: 13px;
    color: #64748b;
}

/* Certificate Section - Modern */
.orel-certificate-section {
    padding: 50px 0;
    background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
    font-family: 'Plus Jakarta Sans', 'Roboto', sans-serif;
}

.orel-section-header {
    text-align: center;
    margin-bottom: 30px;
}

.orel-section-header .orel-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #eff6ff;
    color: #3b82f6;
    padding: 8px 16px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 16px;
}

.orel-section-header h2 {
    font-size: 36px;
    font-weight: 800;
    color: #0f172a;
    margin-bottom: 16px;
    font-family: 'Plus Jakarta Sans', sans-serif;
}

.orel-section-header p {
    font-size: 17px;
    color: #64748b;
    max-width: 600px;
    margin: 0 auto;
}

.orel-cert-slider-wrapper {
    position: relative;
    padding: 0 60px;
}

.orel-cert-swiper {
    overflow: hidden;
    padding: 20px 0;
}

.orel-cert-swiper .swiper-slide {
    background: transparent;
    max-height: none;
    height: auto;
}

.orel-cert-card {
    background: #ffffff;
    border-radius: 20px;
    padding: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid #f1f5f9;
    overflow: hidden;
}

.orel-cert-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 60px rgba(59, 130, 246, 0.15);
}

.orel-cert-card a {
    display: block;
}

.orel-cert-card img {
    width: 100%;
    height: 280px;
    object-fit: contain;
    border-radius: 12px;
    background: #fafbfc;
    transition: transform 0.4s ease;
}

.orel-cert-card:hover img {
    transform: scale(1.03);
}

.orel-slider-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 50px;
    height: 50px;
    background: #ffffff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    cursor: pointer;
    transition: all 0.3s ease;
    z-index: 10;
    color: #3b82f6;
    border: none;
}

.orel-slider-nav:hover {
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    color: #ffffff;
    transform: translateY(-50%) scale(1.1);
    box-shadow: 0 8px 30px rgba(59, 130, 246, 0.3);
}

.orel-slider-nav.orel-prev {
    left: 0;
}

.orel-slider-nav.orel-next {
    right: 0;
}


/* Videos Section */
.orel-videos-section {
    padding: 50px 0;
    background: #ffffff;
    font-family: 'Plus Jakarta Sans', 'Roboto', sans-serif;
}

.orel-videos-section .orel-section-header {
    margin-bottom: 40px;
}

.orel-video-wrapper {
    margin-bottom: 40px;
}

.orel-video-wrapper:last-child {
    margin-bottom: 0;
}

.orel-video-wrapper video {
    width: 100%;
    height: auto;
    border-radius: 16px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
}

/* Responsive */
@media (max-width: 1024px) {
    .orel-hero-content {
        grid-template-columns: 1fr;
        gap: 40px;
    }

    .orel-hero-text {
        text-align: center;
    }

    .orel-hero-stats-inline {
        justify-content: center;
    }

    .orel-features-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .orel-content-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }

    .orel-cert-slider-wrapper {
        padding: 0 50px;
    }
}

@media (max-width: 768px) {
    .orel-about-hero {
        padding: 50px 0 100px;
    }

    .orel-hero-text h1 {
        font-size: 32px;
    }

    .orel-features-grid {
        grid-template-columns: 1fr;
    }

    .orel-features-section {
        margin-top: -60px;
        padding-bottom: 30px;
    }

    .orel-content-section {
        padding: 30px 0;
    }

    .orel-content-text h2 {
        font-size: 28px;
    }

    .orel-floating-card {
        display: none;
    }

    .orel-section-header h2 {
        font-size: 28px;
    }

    .orel-certificate-section {
        padding: 30px 0;
    }

    .orel-cert-slider-wrapper {
        padding: 0 40px;
    }

    .orel-slider-nav {
        width: 40px;
        height: 40px;
    }
}

@media (max-width: 576px) {
    .orel-hero-text h1 {
        font-size: 26px;
    }

    .orel-about-hero {
        padding: 40px 0 80px;
    }

    .orel-feature-card {
        padding: 20px 16px;
    }

    .orel-features-section {
        margin-top: -50px;
        padding-bottom: 20px;
    }

    .orel-content-section,
    .orel-certificate-section,
    .orel-videos-section {
        padding: 25px 0;
    }

    .orel-image-main {
        padding: 30px 20px;
    }

    .orel-cert-slider-wrapper {
        padding: 0;
    }

    .orel-slider-nav {
        position: relative;
        top: auto;
        transform: none;
        margin: 20px auto 0;
    }

    .orel-slider-nav.orel-prev {
        left: auto;
    }

    .orel-slider-nav.orel-next {
        right: auto;
    }

    .orel-cert-nav-mobile {
        display: flex;
        justify-content: center;
        gap: 16px;
        margin-top: 24px;
    }
}
</style>
@endpush

@section('content')

<!-- Hero Section -->
<section class="orel-about-hero">
    <div class="container">
        <div class="orel-hero-content">
            <div class="orel-hero-text">
                <div class="orel-badge">
                    <i class="fas fa-building"></i>
                    Haqqımızda
                </div>
                <h1>OREL İnşaat MMC<br><span>Etibarlı Tərəfdaş</span></h1>
                <p class="orel-description">
                    1998-ci ildən inşaat sektorunda fəaliyyət göstərərək su təchizatı, isitmə və soyutma sistemlərinin satışı, quraşdırılması və servisini peşəkar şəkildə həyata keçiririk.
                </p>
            </div>
            <div class="orel-hero-visual">
                <div class="orel-logo-card">
                    <img src="{{asset('images/footer-logo.png')}}" alt="OREL İnşaat">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="orel-features-section">
    <div class="container">
        <div class="orel-features-grid">
            <div class="orel-feature-card">
                <div class="orel-feature-icon">
                    <i class="fas fa-temperature-high"></i>
                </div>
                <h3>İstilik Sistemləri</h3>
                <p>Keyfiyyətli istilik avadanlıqları və boru sistemləri</p>
            </div>
            <div class="orel-feature-card">
                <div class="orel-feature-icon">
                    <i class="fas fa-tint"></i>
                </div>
                <h3>Su Təchizatı</h3>
                <p>Müasir su təchizatı və kanalizasiya həlləri</p>
            </div>
            <div class="orel-feature-card">
                <div class="orel-feature-icon">
                    <i class="fas fa-snowflake"></i>
                </div>
                <h3>Soyutma Sistemləri</h3>
                <p>Kondisioner və soyutma avadanlıqları</p>
            </div>
            <div class="orel-feature-card">
                <div class="orel-feature-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <h3>Servis Xidməti</h3>
                <p>Peşəkar quraşdırma və texniki dəstək</p>
            </div>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="orel-content-section">
    <div class="container">
        <div class="orel-content-grid">
            <div class="orel-content-text">
                <div class="orel-section-badge">
                    <i class="fas fa-star"></i>
                    Niyə Biz?
                </div>
                <h2>Müasir Texnologiyalar,<br><span>Etibarlı Xidmət</span></h2>
                <p class="orel-lead">
                    Komandamız müasir memarlıq və mühəndislik standartlarına uyğun, innovativ həllərlə yaşayış və sənaye obyektləri üçün etibarlı layihələr təqdim edir.
                </p>
                <ul class="orel-check-list">
                    <li>
                        <div class="orel-icon"><i class="fas fa-check"></i></div>
                        <span>Hərtərəfli mühəndislik və layihələndirmə xidmətləri</span>
                    </li>
                    <li>
                        <div class="orel-icon"><i class="fas fa-check"></i></div>
                        <span>Beynəlxalq standartlara uyğun avadanlıqlar</span>
                    </li>
                    <li>
                        <div class="orel-icon"><i class="fas fa-check"></i></div>
                        <span>Zəmanətli quraşdırma və satış sonrası dəstək</span>
                    </li>
                    <li>
                        <div class="orel-icon"><i class="fas fa-check"></i></div>
                        <span>Fərdi yanaşma və müştəri məmnuniyyəti</span>
                    </li>
                </ul>
            </div>
            <div class="orel-content-image">
                <div class="orel-image-stack">
                    <div class="orel-image-main">
                        <div class="orel-image-content">
                            <div class="orel-icon-large">
                                <i class="fas fa-award"></i>
                            </div>
                            <h3>Keyfiyyət Zəmanəti</h3>
                            <p>ISO sertifikatlı xidmət</p>
                        </div>
                    </div>
                    <div class="orel-floating-card orel-top-right">
                        <div class="orel-fc-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="orel-fc-text">
                            <strong>500+</strong>
                            <span>Razı Müştəri</span>
                        </div>
                    </div>
                    <div class="orel-floating-card orel-bottom-left">
                        <div class="orel-fc-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="orel-fc-text">
                            <strong>50+</strong>
                            <span>Tərəfdaş</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Certificate Section -->
@if($certificates->count() > 0)
<section class="orel-certificate-section">
    <div class="container">
        <div class="orel-section-header">
            <div class="orel-badge">
                <i class="fas fa-certificate"></i>
                Sertifikatlar
            </div>
            <h2>{{__('site.cert_title')}}</h2>
            <p>Beynəlxalq standartlara uyğun sertifikatlarımız</p>
        </div>

        <div class="orel-cert-slider-wrapper">
            <button class="orel-slider-nav orel-prev" id="certPrev">
                <i class="fas fa-chevron-left"></i>
            </button>

            <div class="swiper orel-cert-swiper gallery">
                <div class="swiper-wrapper">
                    @foreach($certificates as $certificate)
                    <div class="swiper-slide">
                        <div class="orel-cert-card">
                            <a href="{{asset('storage/'.$certificate->image)}}">
                                <img src="{{asset('storage/'.$certificate->image)}}" alt="{{$certificate->title ?? 'Sertifikat'}}">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <button class="orel-slider-nav orel-next" id="certNext">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div class="orel-cert-nav-mobile d-block d-md-none">
            <button class="orel-slider-nav orel-prev" id="certPrevMobile">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="orel-slider-nav orel-next" id="certNextMobile">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>
@endif


<!-- Videos Section -->
@if($videos->count() > 0)
<section class="orel-videos-section">
    <div class="container">
        <div class="orel-section-header">
            <div class="orel-badge">
                <i class="fas fa-play-circle"></i>
                Media
            </div>
            <h2>Mediada Biz</h2>
        </div>

        @foreach($videos as $video)
        <div class="orel-video-wrapper">
            <video controls preload="metadata">
                <source src="{{ $video->file->url('original') }}" type="video/mp4">
                Brauzeriniz video əlavəsini dəstəkləmir.
            </video>
        </div>
        @endforeach
    </div>
</section>
@endif

@endsection

@push('foot')
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="{{asset('webcoder/assets/dist/simple-lightbox.js?v2.14.0')}}"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Certificate Slider
    if (document.querySelector('.orel-cert-swiper')) {
        const certSwiper = new Swiper('.orel-cert-swiper', {
            slidesPerView: 1,
            spaceBetween: 24,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '#certNext, #certNextMobile',
                prevEl: '#certPrev, #certPrevMobile',
            },
            breakpoints: {
                576: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 4,
                }
            }
        });
    }

    // Lightbox for certificates
    if (document.querySelector('.gallery a')) {
        let gallery = new SimpleLightbox('.gallery a', {
            captionsData: 'alt',
            captionDelay: 250
        });
    }
});
</script>
@endpush
