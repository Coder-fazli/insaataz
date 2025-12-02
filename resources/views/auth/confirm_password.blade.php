@extends('site.layouts.app')
@push('head')
<link rel="stylesheet" href="{{asset('webcoder/assets/css/login.css')}}"/>
@endpush
@section('content')
    <main>
        <section class="register">
            <div class="container">
                <h2>{{__('site.confirm_password')}}</h2>
                <div class="section__main">
                    <form action="{{route('profile.confirm_password.submit')}}" method="post" class="mb-3">
                        @csrf
                        <div class="input__box">
                            <label for="password">{{__('auth.password')}}</label>
                            <input type="password" name="password" id="password" @error('password') class="error" @enderror>
                            @error('password')
                                <span class="error-text">{{ $message }} </span>
                            @enderror
                        </div>

                        <div class="input__btn">
                           <input type="submit" value="{{__('auth.confirm_inConfirmPassword')}}"/>
                        </div>
                    </form>

                    <div class="input__box m-auto mb-4">
                        <a href="{{ route('profile.forget_password') }}" style="color: #222529; text-decoration: underline;">{{__('auth.back')}}</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection