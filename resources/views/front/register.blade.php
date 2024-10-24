@extends('front.layout.app')

@section('title', 'Home')

@push('styles')
    <link href="{{ asset('assets/css/register.css') }}" rel="stylesheet" >
@endpush

@section('content')

    <section class="container-fluid title_sec d-flex align-items-center py-5" style="background-color:#ADDEFF;">
        <div class="container p-5">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center pg-title pt-5 mt-5 mb-0">Register</h1>
                </div>
            </div>

        </div>
    </section>




    <!--------------
          Section Area
              --------------->

    <section class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 py-4 d-flex align-items-center justify-content-center justify-content-lg-start">
                    <img src="{{ asset('assets/images/Group 653.png') }}" class="img-fluid"/>
                </div>
                <div class="col-lg-6 col-md-12  py-4">
                    <div class="wrapper_register p-4 p-lg-5">
                        <h2 class="mb-4">Dealer Registration</h2>
                        <form method="POST" action="{{ route('register') }}"  class="register_Form p-2">
                            @csrf
                            <label class="w-100 mb-4">
                                <p class="mb-3">{{ __('Name') }}</p>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </label>
                            <label class="w-100 mb-4">
                                <p class="mb-3">{{ __('Email Address') }}</p>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                            <label  class="w-100 mb-4 position-relative">
                                <p class="mb-3">{{ __('Password') }}</p>
                                <input id="passwordField" placeholder="**********"  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <a href="javascript:void(0)" style="position: absolute;top: 53px;right: 15px;" class="toggle-password" onclick="togglePasswordField()"> <img src="{{ asset('assets/images/icon.png') }}"> </a>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </label>
                            <label  class="w-100 position-relative">
                                <p class="mb-3">{{ __('Confirm Password') }}</p>
                                <input id="passwordFieldConfirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="**********" >
                                <a href="javascript:void(0)" style="position: absolute;top: 53px;right: 15px;" class="toggle-password" onclick="togglePasswordFieldConfirm()"> <img src="{{ asset('assets/images/icon.png') }}"> </a>
                            </label>

                            <div class="row py-4">
                                <div class="col-lg-7 col-md-7 py-1">
                                    <label class="d-flex"> <input type="checkbox" class="me-2"/> <p class="mb-0">Accept Terms & Conditions</p> </label>
                                </div>
                            </div>

                            <button type="submit" class="w-100">{{ __('Register') }}</button>

                            <div class="col-12 text-center mt-4">
                                <a href="{{ route('login') }}" class="forget_link">Already have an account? Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

@push('scripts')
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" defer></script>
    <script type="text/javascript">


        function togglePasswordField() {
            const passwordField = document.getElementById("passwordField");
            const toggleBtn = document.querySelector(".toggle-password");

            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
        function togglePasswordFieldConfirm() {
            const passwordField = document.getElementById("passwordFieldConfirm");
            const toggleBtn = document.querySelector(".toggle-password");

            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }

    </script>
@endpush
