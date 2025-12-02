@extends('site.layouts.app')
@push('head')
    <link rel="stylesheet" href="{{asset('webcoder/assets/css/login.css')}}"/>
@endpush
@section('content')
    <main>
        <section class="register">
            <div class="container">
                <h2>{{__('site.find_your_account_inForgetPassword')}}</h2>
                <div class="section__main">
                    <form action="{{route('profile.forget_password.submit')}}" method="post" class="mb-3">
                        @csrf
                        <div class="input__box">
                            <label for="email">{{__('auth.email')}}</label>
                            <input type="text" name="email" id="email" @error('email') class="error" @enderror>
                            @error('email')
                                <span class="error-text">{{ $message }} </span>
                            @enderror
                        </div>

                        <div class="input__btn">
                           <input type="submit" value="{{__('auth.search_inForgetPassword')}}"/>
                        </div>
                    </form>

                    <div class="input__box m-auto mb-4">
                        <a href="{{ route('profile.login') }}" style="color: #222529; text-decoration: underline;">{{__('auth.back')}}</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection