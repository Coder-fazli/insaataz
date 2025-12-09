@extends('site.layouts.app')
@section('content')
    <main>
        <section class="register" style="padding: 60px 0; background: #f8f9fa; min-height: 80vh;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="register-card" style="background: #fff; padding: 40px; border-radius: 16px; box-shadow: 0 5px 25px rgba(0,0,0,0.1);">
                            <h2 style="text-align: center; margin-bottom: 30px; color: #2b5797; font-weight: 600;">{{__('site.register')}}</h2>

                            <form action="{{route('profile.submitRegisterForm')}}" method="post">
                                @csrf

                                <div class="form-group" style="margin-bottom: 20px;">
                                    <label for="fullname" style="font-size: 14px; font-weight: 500; color: #333; margin-bottom: 8px; display: block;">{{__('auth.fullname')}}</label>
                                    <input type="text"
                                           name="fullname"
                                           id="fullname"
                                           class="form-control @error('fullname') is-invalid @enderror"
                                           style="width: 100%; padding: 12px 16px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 15px; transition: all 0.3s ease;"
                                           onfocus="this.style.borderColor='#2b5797'; this.style.boxShadow='0 0 0 3px rgba(43,87,151,0.1)';"
                                           onblur="this.style.borderColor='#e0e0e0'; this.style.boxShadow='none';">
                                    @error('fullname')
                                        <span style="color: #dc3545; font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group" style="margin-bottom: 20px;">
                                    <label for="email" style="font-size: 14px; font-weight: 500; color: #333; margin-bottom: 8px; display: block;">{{__('auth.email')}}</label>
                                    <input type="email"
                                           name="email"
                                           id="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           style="width: 100%; padding: 12px 16px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 15px; transition: all 0.3s ease;"
                                           onfocus="this.style.borderColor='#2b5797'; this.style.boxShadow='0 0 0 3px rgba(43,87,151,0.1)';"
                                           onblur="this.style.borderColor='#e0e0e0'; this.style.boxShadow='none';">
                                    @error('email')
                                        <span style="color: #dc3545; font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group" style="margin-bottom: 20px;">
                                    <label for="phone" style="font-size: 14px; font-weight: 500; color: #333; margin-bottom: 8px; display: block;">{{__('auth.phone')}}</label>
                                    <input type="text"
                                           name="phone"
                                           id="phone"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           style="width: 100%; padding: 12px 16px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 15px; transition: all 0.3s ease;"
                                           onfocus="this.style.borderColor='#2b5797'; this.style.boxShadow='0 0 0 3px rgba(43,87,151,0.1)';"
                                           onblur="this.style.borderColor='#e0e0e0'; this.style.boxShadow='none';">
                                    @error('phone')
                                        <span style="color: #dc3545; font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group" style="margin-bottom: 30px;">
                                    <label for="password" style="font-size: 14px; font-weight: 500; color: #333; margin-bottom: 8px; display: block;">{{__('auth.enter_password')}}</label>
                                    <input type="password"
                                           name="password"
                                           id="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           style="width: 100%; padding: 12px 16px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 15px; transition: all 0.3s ease;"
                                           onfocus="this.style.borderColor='#2b5797'; this.style.boxShadow='0 0 0 3px rgba(43,87,151,0.1)';"
                                           onblur="this.style.borderColor='#e0e0e0'; this.style.boxShadow='none';">
                                    @error('password')
                                        <span style="color: #dc3545; font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div style="text-align: center;">
                                    <button type="submit"
                                            style="width: 100%; padding: 14px; background: #2b5797; color: white; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;"
                                            onmouseover="this.style.background='#1e3f6d'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 5px 15px rgba(43,87,151,0.3)';"
                                            onmouseout="this.style.background='#2b5797'; this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                                        {{__('auth.submit_register')}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection