{{--<x-guest-layout>--}}
{{--    <x-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <x-validation-errors class="mb-4" />--}}

{{--        @if (session('status'))--}}
{{--            <div class="mb-4 font-medium text-sm text-green-600">--}}
{{--                {{ session('status') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <form method="POST" action="{{ route('login') }}">--}}
{{--            @csrf--}}

{{--            <div>--}}
{{--                <x-label for="login" value="{{ __('Email') }}" />--}}
{{--                <x-input id="login " class="block mt-1 w-full" type="text" name="login" :value="old('email')" required autofocus autocomplete="username" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-label for="password" value="{{ __('Password') }}" />--}}
{{--                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />--}}
{{--            </div>--}}

{{--            <div class="block mt-4">--}}
{{--                <label for="remember_me" class="flex items-center">--}}
{{--                    <x-checkbox id="remember_me" name="remember" />--}}
{{--                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                @if (Route::has('password.request'))--}}
{{--                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">--}}
{{--                        {{ __('Forgot your password?') }}--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                <x-button class="ml-4">--}}
{{--                    {{ __('Log in') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-authentication-card>--}}
{{--</x-guest-layout>--}}


<x-guest-layout>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body" style="height: 350px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;">

                <div class="login-logo">
                    <a href="{{route('dashboard')}}" class="text-white" ><b>My<span style="color: #6BCA16">ESCO</span> </b></a>
                    <img src="{{asset('admin/assets/dist/img/output.png')}}" style="width: 60px;height: 60px;">
                </div>
                <form action="{{route('login')}}" method="post">
                        @csrf
                    <div class="input-group mb-3">
{{--                        <input type="email" class="form-control inputBrClass" placeholder="ایمیل">--}}
                        <input name="auth" type="auth" class="form-control inputBrClass text-white" style="background-color:rgba(0,0,0,0) !important;col" id="one" placeholder="شماره موبایل" :value="old('auth')" required autofocus>

                        <div class="input-group-append">
                            <div class="input-group-text brClass">
                                <span  class="fas fa-envelope" style="color: #6BCA16;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
{{--                        <input type="password" class="form-control inputBrClass" placeholder="رمز">--}}
                        <input name="password" type="password" class="form-control inputBrClass" id="two" placeholder="رمز عبور" required autocomplete="current-password" style="background-color:rgba(0,0,0,0) !important;">

                        <div class="input-group-append">
                            <div class="input-group-text brClass">
                                <span class="fas fa-lock" style="color: #6BCA16;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
{{--                        <div class="col-8">--}}
{{--                            <div class="icheck-primary">--}}
{{--                                <input type="checkbox" id="remember">--}}
{{--                                <label for="remember">--}}
{{--                                    مرا به یاد بسپار--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!-- /.col -->
                        <div class="col-4">
{{--                            <button type="submit" class="btn btn-primary btn-block">ورود</button>--}}
                            <input name="submit" value="وارد شوید" type="submit" class="btn  btn-block " style="background-color: #6BCA16;color: white">
                        </div>
                        <div class="col-4">
                            {{--                            <button type="submit" class="btn btn-primary btn-block">ورود</button>--}}
                            <a href="{{route('register')}}"  class="btn  btn-block " style="background-color: #fd8b19;color: white">ثبت نام</a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!-- /.social-auth-links -->
                    <br>
                <p class="mb-1 text-white">
                </p>
                <p class="mb-0">
{{--                    <a href="register.html" class="text-center">عضویت جدید</a>--}}
                </p>
            </div>

            <!-- /.login-card-body -->
        </div>

    </div>

    <!-- login section start -->
{{--    <section class="form-section px-15 top-space section-b-space">--}}

{{--        <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">--}}
{{--            <i class="iconly-Danger icli"></i>--}}
{{--            <div>--}}
{{--                <x-validation-errors class="mb-4" />--}}
{{--            </div>--}}
{{--            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--        </div>--}}
{{--        <h1>مشتری عزیز سلام, <br>اکنون وارد شوید</h1>--}}
{{--        <form name="frm-login" method="POST" action="{{route('login')}}" >--}}
{{--            @csrf--}}
{{--            <div class="form-floating mb-4">--}}
{{--                <input name="login" type="login" class="form-control" id="one" placeholder="نام کاربری یا ایمیل" :value="old('login')" required autofocus>--}}
{{--                <label for="one">نام کاربری یا ایمیل</label>--}}
{{--            </div>--}}
{{--            <div class="form-floating mb-2">--}}
{{--                <input name="password" type="password" class="form-control" id="two" placeholder="رمز عبور" required autocomplete="current-password">--}}
{{--                <label for="two">رمز عبور</label>--}}
{{--            </div>--}}
{{--            <div class="text-end mb-4">--}}
{{--                <a href="{{route('password.request')}}" class="theme-color">رمز عبور را فراموش کرده اید؟</a>--}}
{{--            </div>--}}
{{--            <input name="submit" value="وارد شوید" type="submit" class="btn btn-solid w-100">--}}
{{--        </form>--}}
{{--        <div class="or-divider">--}}
{{--            <span>یا وارد شوید</span>--}}
{{--        </div>--}}
{{--        <div class="social-auth">--}}
{{--            <ul>--}}
{{--           l;l;ll;     <li>--}}
{{--                    <a href="#"><img src="{{asset('assets/images/social/google.png')}}" class="img-fluid" alt=""></a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#"><img src="{{asset('assets/images/social/fb.png')}}" class="img-fluid" alt=""></a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#"><img src="{{asset('assets/images/social/apple.png')}}" class="img-fluid" alt=""></a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--        <div class="bottom-detail text-center mt-3">--}}
{{--            <h4 class="content-color"><a class="title-color text-decoration-underline" href="{{route('register')}}">ثبت نام </a></h4>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- login section end -->
</x-guest-layout>
