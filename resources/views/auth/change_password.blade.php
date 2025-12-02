@extends('site.layouts.app')
@push('head')
    <link rel="stylesheet" href="{{asset('webcoder/assets/css/login.css')}}"/>
@endpush
@section('content')
    <main>
        <section class="register">
            <div class="container">
                <h2>{{__('site.update_password_inChangePassword')}}</h2>
                <div class="section__main">
                    <form action="{{route('profile.change_password.submit')}}" method="post" class="mb-3">
                        @csrf
                        <div class="input__box">
                            <label for="password">{{__('auth.password')}}</label>
                            <input type="password" name="password" id="password" @error('password') class="error" @enderror>
                            @error('password')
                                <span class="error-text">{{ $message }} </span>
                            @enderror
                        </div>

                         <div class="input__box">
                            <label for="repassword">{{__('auth.repassword')}}</label>
                            <input type="password" name="repassword" id="repassword" @error('repassword') class="error" @enderror>
                            @error('repassword')
                                <span class="error-text">{{ $message }} </span>
                            @enderror
                        </div>

                        <div class="input__btn">
                           <input type="submit" value="{{__('auth.update_inChangePassword')}}"/>
                        </div>
                    </form>

                    <div class="input__box m-auto mb-4">
                        <a href="{{ route('profile.confirm_password') }}" style="color: #222529; text-decoration: underline;">{{__('auth.back')}}</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection