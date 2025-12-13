@extends('site.layouts.app')
@push('head')

<link rel="stylesheet" href="{{asset('webcoder/assets/css/contact.css')}}"/>
@endpush
@section('content')


<main>
    
    <section style="padding: 60px 0; background: #fafafa;">
        <div class="container">
            <div class="contact-page-wrapper" style="display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: start;">

                <!-- Form Section -->
                <div class="form-section">
                    <h2 style="font-size: 48px; font-weight: 700; color: #000; margin-bottom: 20px; line-height: 1.2;">Əlaqə</h2>
                    <p style="font-size: 18px; color: #666; margin-bottom: 50px; font-weight: 400;">Birlikdə daha yaxşı işlər görək!</p>

                    @if ($errors->any())
                        <div class="alert alert-danger" style="margin-bottom: 30px;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('contactForm')}}" method="post" class="minimalist-contact-form">
                        @csrf
                        <div class="form-group-minimal">
                            <input type="text" name="fullname" placeholder="Ad, soyad *" required />
                        </div>
                        <div class="form-group-minimal">
                            <input type="text" name="phone" placeholder="Telefon *" required />
                        </div>
                        <div class="form-group-minimal">
                            <input type="email" name="email" placeholder="E-mail *" required />
                        </div>
                        <div class="form-group-minimal">
                            <input type="text" name="subject" placeholder="Mövzu" />
                        </div>
                        <div class="form-group-minimal">
                            <textarea name="message" placeholder="Bizi layihə haqqında bir az məlumatlandırın... *" rows="4" required></textarea>
                        </div>
                        <button class="btn-minimalist-submit" type="submit">
                            {{__('site.submit')}}
                        </button>
                    </form>
                </div>

                <!-- Map Section -->
                <div class="map-section">
                    <div class="map" style="border-radius: 20px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.08); height: 100%;">
                        <iframe src="{{$settings->map}}" width="100%" height="600" style="border:0; display: block;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

            </div>

            <!-- Contact Info Section Below -->
            <div class="contact-info-section" style="margin-top: 60px;">
                <div class="contact-info-modern" style="max-width: 100%;">
                    <ul style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px;">
                        <li class="contact-info-item">
                            <span class="contact-info-label">{{__('site.address')}}</span>
                            <div class="contact-info-value">{{$settings->address}}</div>
                        </li>
                        <li class="contact-info-item">
                            <span class="contact-info-label">{{__('site.phone_number')}}</span>
                            <div class="contact-info-value">
                                @php
                                    $phoneData = $settings->phone;
                                    $emailData = $settings->email;
                                @endphp
                                @if (!empty($phoneData))
                                   @foreach ($phoneData as $phone)
                                       <a href="tel:{{ $phone['attributes']['phone'] }}">{{ $phone['attributes']['phone'] }}</a><br>
                                   @endforeach
                                @endif
                            </div>
                        </li>
                        <li class="contact-info-item">
                            <span class="contact-info-label">{{__('site.email')}}</span>
                            <div class="contact-info-value">
                                @if (!empty($emailData))
                                   @foreach ($emailData as $email)
                                       <a href="mailto:{{ $email['attributes']['email'] }}">{{ $email['attributes']['email'] }}</a><br>
                                   @endforeach
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <style>
                .minimalist-contact-form {
                    max-width: 100%;
                }
                .form-group-minimal {
                    margin-bottom: 35px;
                    position: relative;
                }
                .form-group-minimal input,
                .form-group-minimal textarea {
                    width: 100%;
                    padding: 12px 0;
                    border: none;
                    border-bottom: 1px solid #ddd;
                    background: transparent;
                    font-size: 16px;
                    color: #333;
                    font-family: inherit;
                    transition: border-color 0.3s ease;
                }
                .form-group-minimal input:focus,
                .form-group-minimal textarea:focus {
                    outline: none;
                    border-bottom-color: #4A90E2;
                }
                .form-group-minimal input::placeholder,
                .form-group-minimal textarea::placeholder {
                    color: #999;
                    font-weight: 400;
                }
                .form-group-minimal textarea {
                    resize: vertical;
                    min-height: 100px;
                }
                .btn-minimalist-submit {
                    background: #4A90E2;
                    color: white;
                    border: none;
                    padding: 14px 50px;
                    border-radius: 50px;
                    font-size: 16px;
                    font-weight: 500;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    margin-top: 20px;
                }
                .btn-minimalist-submit:hover {
                    background: #357ABD;
                    transform: translateY(-2px);
                    box-shadow: 0 8px 20px rgba(74, 144, 226, 0.3);
                }
                .contact-info-modern {
                    background: white;
                    padding: 40px;
                    border-radius: 20px;
                    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
                }
                .contact-info-modern ul {
                    list-style: none;
                    padding: 0;
                    margin: 0;
                    display: flex;
                    flex-direction: column;
                    gap: 35px;
                }
                .contact-info-modern li {
                    border: none !important;
                    margin: 0 !important;
                    padding: 0 !important;
                }
                .contact-info-item {
                    display: flex;
                    flex-direction: column;
                    gap: 12px;
                }
                .contact-info-label {
                    color: #666;
                    font-size: 14px;
                    font-weight: 600;
                    text-transform: uppercase;
                    letter-spacing: 0.5px;
                }
                .contact-info-value {
                    color: #333;
                    font-size: 16px;
                    font-weight: 400;
                    line-height: 1.6;
                }
                .contact-info-value a {
                    color: #4A90E2;
                    text-decoration: none;
                    transition: color 0.3s ease;
                    display: inline-block;
                }
                .contact-info-value a:hover {
                    color: #357ABD;
                }
                @media (max-width: 992px) {
                    .contact-page-wrapper {
                        grid-template-columns: 1fr !important;
                        gap: 50px !important;
                    }
                    .contact-info-modern ul {
                        grid-template-columns: 1fr !important;
                    }
                }
            </style>
        </div>
    </section>
</main>

@endsection

@push('footer')
@endpush



