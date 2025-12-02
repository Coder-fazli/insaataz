@extends('site.layouts.app')
@push('head')
<link rel="stylesheet" href="{{asset('webcoder/assets/css/login.css')}}"/>
@endpush
@section('content')
    <main>
        <section class="profile">
            <div class="container">
                <h2>{{__('site.profile')}}</h2>
                <div class="section__main">
                    <ul>
                       <li><a href="{{route('profile.showOrders')}}">{{__('menu.myOrders')}} <i class="fa-solid fa-cart-shopping"></i></a></li>
                       <li><a href="{{route('profile.wishList')}}">{{__('menu.wishlist')}} <i class="fa-regular fa-heart"></i></a></li>
                        <li><a href="{{route('profile.logout')}}">{{__('menu.logout')}} <i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
                    </ul>
                    <form action="{{route('profile.update')}}" method="post">
                        @csrf
                        <div class="input__box">
                            <label for="fullname">{{__('auth.fullname')}}</label>
                            <input type="text" name="fullname" id="fullname" @error('fullname') class="error" @enderror value="{{$client->fullname}}" disabled>
                            @error('fullname')
                                <span class="error-text">{{ $message }} </span>
                            @enderror
                        </div>
                       
                        <div class="input__box">
                            <label for="email">{{__('auth.email')}}</label>
                            <input type="text" name="email" id="email" @error('email') class="error" value="" @enderror value="{{$client->email}}">
                            @error('email')
                                <span class="error-text">{{ $message }} </span>
                            @enderror
                        </div>
                       
                        <div class="input__box">
                            <label for="phone">{{__('auth.phone')}}</label>
                            <input type="text" name="phone" id="phone" @error('phone') class="error" @enderror value="{{$client->phone}}">
                            @error('phone')
                                <span class="error-text">{{ $message }} </span>
                            @enderror
                        </div>
                       
                        <div class="input__box">
                            <label for="password">{{__('auth.enter_password')}}</label>
                            <input type="password" name="password" id="password" @error('password') class="error" @enderror placeholder="{{__('auth.you_can_leave_this_blank')}}">
                            @error('password')
                                <span class="error-text">{{ $message }} </span>
                            @enderror
                        </div>
                       
                        <div class="input__btn">
                            <input type="submit" value="{{__('auth.updateProfile')}}"/>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection