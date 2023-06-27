<x-guest-layout>
{{--    <x-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <x-validation-errors class="mb-4" />--}}

{{--        <form method="POST" action="{{ route('register') }}">--}}
{{--            @csrf--}}

{{--            <div>--}}
{{--                <x-label for="name" value="{{ __('Name') }}" />--}}
{{--                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-label for="email" value="{{ __('Email') }}" />--}}
{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-label for="password" value="{{ __('Password') }}" />--}}
{{--                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />--}}
{{--                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())--}}
{{--                <div class="mt-4">--}}
{{--                    <x-label for="terms">--}}
{{--                        <div class="flex items-center">--}}
{{--                            <x-checkbox name="terms" id="terms" required />--}}

{{--                            <div class="ml-2">--}}
{{--                                {!! __('I agree to the :terms_of_service and :privacy_policy', [--}}
{{--                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',--}}
{{--                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',--}}
{{--                                ]) !!}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </x-label>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">--}}
{{--                    {{ __('Already registered?') }}--}}
{{--                </a>--}}

{{--                <x-button class="ml-4">--}}
{{--                    {{ __('Register') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
    <div class="login-box">
        <!-- /.login-logo -->

        <div class="card">

            <div class="card-body login-card-body" style="height: 520px;
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
                @if(count($errors) > 0)
                    <div class="card bg-danger">
                        <div class="card-header">
                            <h3 class="card-title">اخطار</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <x-validation-errors class="mb-4" />

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                @endif
                <div class="login-logo">
                    <a href="{{route('dashboard')}}" class="text-white" ><b>My<span style="color: #6BCA16">ESCO</span> </b></a>
                    <img src="{{asset('admin/assets/dist/img/output.png')}}" style="width: 60px;height: 60px;">
                </div>
                <div class="login-logo">
                    <a href="{{route('dashboard')}}" class="text-white" ><h5>فرم ثبت نام </h5></a>
                </div>
                <form action="{{route('register')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        {{--                        <input type="email" class="form-control inputBrClass" placeholder="ایمیل">--}}
                        <input name="name" type="text" class="form-control inputBrClass text-white" style="background-color:rgba(0,0,0,0) !important;" id="one" placeholder="ورود نام و نام خانوادگی" :value="old('name')" required autofocus>

                        <div class="input-group-append">
                            <div class="input-group-text brClass">
                                <span  class="fas fa-user" style="color: #6BCA16;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        {{--                        <input type="email" class="form-control inputBrClass" placeholder="ایمیل">--}}
                        <input name="email" type="email" class="form-control inputBrClass text-white" style="background-color:rgba(0,0,0,0) !important;" id="one" placeholder="ایمیل" :value="old('email')" required autofocus>

                        <div class="input-group-append">
                            <div class="input-group-text brClass">
                                <span  class="fas fa-envelope" style="color: #6BCA16;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        {{--                        <input type="email" class="form-control inputBrClass" placeholder="ایمیل">--}}
                        <input name="mobile" type="text" class="form-control inputBrClass text-white" style="background-color:rgba(0,0,0,0) !important;" id="one" placeholder="موبایل" :value="old('mobile')" required autofocus>

                        <div class="input-group-append">
                            <div class="input-group-text brClass">
                                <span  class="fas fa-mobile" style="color: #6BCA16;"></span>
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
                    <div class="input-group mb-3">
                        {{--                        <input type="email" class="form-control inputBrClass" placeholder="ایمیل">--}}
                        <input name="password_confirmation" type="password" class="form-control inputBrClass text-white" style="background-color:rgba(0,0,0,0) !important;" id="one" placeholder="تکرار رمز عبور" :value="old('password_confirmation')" required autofocus>

                        <div class="input-group-append">
                            <div class="input-group-text brClass">
                                <span  class="fas fa-lock" style="color: #6BCA16;"></span>
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
                            <input name="submit" value="ثبت نام" type="submit" class="btn  btn-block " style="background-color: #6BCA16;color: white">
                        </div>
                        <div class="col-4">
                            {{--                            <button type="submit" class="btn btn-primary btn-block">ورود</button>--}}
                            <a href="{{route('login')}}"  class="btn  btn-block " style="background-color: #fd8b19;color: white">بازگشت</a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!-- /.social-auth-links -->

                <p class="mb-1">
                    {{--                    <a href="forgot-password.html">رمز ورود را فراموش کردم</a>--}}
                </p>
                <p class="mb-0">
                    {{--                    <a href="register.html" class="text-center">عضویت جدید</a>--}}
                </p>
            </div>

            <!-- /.login-card-body -->
        </div>

    </div>
{{--        </x-authentication-card>--}}

</x-guest-layout>
