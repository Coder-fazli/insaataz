@extends('site.layouts.app')
@push('head')
    <link rel="stylesheet" href="{{asset('webcoder/assets/css/login.css')}}"/>
@endpush
@section('content')
    <main>
        <section class="login">
            <div class="container">
                <h2>{{__('site.login')}}</h2>
                <div class="section__main">
                    <form action="{{route('profile.submitLoginForm')}}" method="post" class="mb-3">
                        @csrf
                        <div class="input__box">
                            <label for="email">{{__('auth.email')}}</label>
                            <input type="text" name="email" id="email" @error('email') class="error" @enderror>
                            @error('email')
                                <span class="error-text">{{ $message }} </span>
                            @enderror
                        </div>
    
                        <div class="input__box">
                            <label for="password">{{__('auth.password')}}</label>
                            <input type="password" name="password" id="password" @error('password') class="error" @enderror>
                            @error('password')
                                <span class="error-text">{{ $message }} </span>
                            @enderror
                        </div>

                        <div class="input__box">
                            <input type="submit" value="{{__('auth.submit_login')}}"/>
                        </div>
                    </form>

                    <div class="input__box m-auto mb-4">
                        <a href="{{route('profile.forget_password')}}" style="color: #222529; text-decoration: underline;">{{__('site.did_you_forget_password')}}</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection