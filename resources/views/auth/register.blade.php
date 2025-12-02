@extends('site.layouts.app')
@push('head')
<link rel="stylesheet" href="{{asset('webcoder/assets/css/login.css')}}"/>
@endpush
@section('content')
    <main>
        <section class="register">
            <div class="container">
                <h2>{{__('site.register')}}</h2>
                <div class="section__main">
                    <form action="{{route('profile.submitRegisterForm')}}" method="post">
                        @csrf
                        <div class="input__box">
                            <label for="fullname">{{__('auth.fullname')}}</label>
                            <input type="text" name="fullname" id="fullname" @error('fullname') class="error" @enderror>
                            @error('fullname')
                                <span class="error-text">{{ $message }} </span>
                            @enderror
                        </div>
                       
                        <div class="input__box">
                            <label for="email">{{__('auth.email')}}</label>
                            <input type="text" name="email" id="email" @error('email') class="error" @enderror>
                            @error('email')
                                <span class="error-text">{{ $message }} </span>
                            @enderror
                        </div>
                       
                        <div class="input__box">
                            <label for="phone">{{__('auth.phone')}}</label>
                            <input type="text" name="phone" id="phone" @error('phone') class="error" @enderror>
                            @error('phone')
                                <span class="error-text">{{ $message }} </span>
                            @enderror
                        </div>
                       
                        <div class="input__box">
                            <label for="password">{{__('auth.enter_password')}}</label>
                            <input type="password" name="password" id="password" @error('password') class="error" @enderror>
                            @error('password')
                                <span class="error-text">{{ $message }} </span>
                            @enderror
                        </div>
                       
                        <div class="input__btn">
                            <input type="submit" value="{{__('auth.submit_register')}}"/>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection