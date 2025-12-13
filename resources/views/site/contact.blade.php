@extends('site.layouts.app')
@push('head')

<link rel="stylesheet" href="{{asset('webcoder/assets/css/contact.css')}}"/>
@endpush
@section('content')


<main>
    
    <section>
        <div class="container">
            <!--<h2>{{__('site.contact')}}</h2>-->
            
            <div class="contact-information-container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('contactForm')}}" method="post" class="modern-contact-form">
                    @csrf
                    <div class="form-row">
                        <div class="form-group-modern">
                            <input class="form-control-modern" type="text" name="fullname" placeholder="{{__('site.please_enter_fullname')}}" required />
                        </div>
                        <div class="form-group-modern">
                            <input class="form-control-modern" type="email" name="email" placeholder="{{__('site.please_enter_email')}}" required />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group-modern">
                            <input class="form-control-modern" type="text" name="phone" placeholder="{{__('site.please_enter_phone')}}" required />
                        </div>
                        <div class="form-group-modern">
                            <input class="form-control-modern" type="text" name="subject" placeholder="{{__('site.please_enter_subject')}}" />
                        </div>
                    </div>
                    <div class="form-group-modern full-width">
                        <textarea class="form-control-modern" name="message" placeholder="{{__('site.please_enter_message')}}" cols="30" rows="8" required></textarea>
                    </div>
                    <button class="btn-modern-submit" type="submit">
                        <span>{{__('site.submit')}}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </button>
                </form>
                <style>
                    .modern-contact-form {
                        background: white;
                        padding: 40px;
                        border-radius: 16px;
                        box-shadow: 0 8px 30px rgba(0,0,0,0.08);
                    }
                    .form-row {
                        display: grid;
                        grid-template-columns: 1fr 1fr;
                        gap: 20px;
                        margin-bottom: 20px;
                    }
                    .form-group-modern {
                        position: relative;
                    }
                    .form-group-modern.full-width {
                        grid-column: 1 / -1;
                        margin-bottom: 20px;
                    }
                    .form-control-modern {
                        width: 100%;
                        padding: 16px 20px;
                        border: 2px solid #e8e8e8;
                        border-radius: 12px;
                        font-size: 15px;
                        transition: all 0.3s ease;
                        background: #fafafa;
                        font-family: inherit;
                    }
                    .form-control-modern:focus {
                        outline: none;
                        border-color: #4A90E2;
                        background: white;
                        box-shadow: 0 0 0 4px rgba(74, 144, 226, 0.1);
                    }
                    .form-control-modern::placeholder {
                        color: #999;
                    }
                    textarea.form-control-modern {
                        resize: vertical;
                        min-height: 150px;
                    }
                    .btn-modern-submit {
                        background: linear-gradient(135deg, #4A90E2 0%, #357ABD 100%);
                        color: white;
                        border: none;
                        padding: 16px 40px;
                        border-radius: 12px;
                        font-size: 16px;
                        font-weight: 600;
                        cursor: pointer;
                        transition: all 0.3s ease;
                        display: inline-flex;
                        align-items: center;
                        gap: 10px;
                        box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
                    }
                    .btn-modern-submit svg {
                        width: 20px;
                        height: 20px;
                        transition: transform 0.3s ease;
                    }
                    .btn-modern-submit:hover {
                        transform: translateY(-2px);
                        box-shadow: 0 6px 25px rgba(74, 144, 226, 0.4);
                    }
                    .btn-modern-submit:hover svg {
                        transform: translateX(5px);
                    }
                    .btn-modern-submit:active {
                        transform: translateY(0);
                    }
                    @media (max-width: 768px) {
                        .modern-contact-form {
                            padding: 25px;
                        }
                        .form-row {
                            grid-template-columns: 1fr;
                            gap: 15px;
                        }
                        .form-control-modern {
                            padding: 14px 16px;
                            font-size: 14px;
                        }
                        .btn-modern-submit {
                            width: 100%;
                            justify-content: center;
                            padding: 14px 30px;
                        }
                    }
                </style>
                <div class="contact-information">
                    <ul>
                        <li><span class="contact-information__individual">{{__('site.address')}}</span> {{$settings->address}}</li>
                        <li>
                            <span class="contact-information__individual">{{__('site.phone_number')}}</span>
                            @php
                                $phoneData = $settings->phone;
                                $emailData = $settings->email;
                            @endphp
                            @if (!empty($phoneData))
                               @foreach ($phoneData as $phone)
                                   <a href="tel:{{ $phone['attributes']['phone'] }}">{{ $phone['attributes']['phone'] }}</a>
                               @endforeach
                            @endif
                        </li>
                        <li>
                            <span class="contact-information__individual">{{__('site.email')}} </span> 
                            @if (!empty($emailData))
                               @foreach ($emailData as $email)
                                   <a href="mailto:{{ $email['attributes']['email'] }}">{{ $email['attributes']['email'] }}</a>
                               @endforeach
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            <div>
                <div class="map">
                    <iframe src="{{$settings->map}}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection

@push('footer')
@endpush



