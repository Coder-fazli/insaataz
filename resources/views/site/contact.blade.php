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
                <form action="{{route('contactForm')}}" method="post">
                    @csrf
                    <input class="form-control" type="text" name="fullname" placeholder="{{__('site.please_enter_fullname')}}" required />
                    <input class="form-control" type="email" name="email" placeholder="{{__('site.please_enter_email')}}" required />
                    <input class="form-control" type="text" name="phone" placeholder="{{__('site.please_enter_phone')}}" required />
                    <input class="form-control" type="text" name="subject" placeholder="{{__('site.please_enter_subject')}}" />
                    <textarea class="form-control" name="message" placeholder="{{__('site.please_enter_message')}}" id="" cols="30" rows="10" required></textarea>
                    <button class="btn btn-primary">{{__('site.submit')}}</button>
                </form>
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



