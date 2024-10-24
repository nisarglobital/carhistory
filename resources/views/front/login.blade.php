@extends('front.layout.app')

@section('title', 'Home')

@push('styles')
    <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet" >
@endpush

@section('content')

    <section class="container-fluid title_sec d-flex align-items-center py-5" style="background-color:#ADDEFF;">
        <div class="container p-5">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center pg-title pt-5 mt-5 mb-0">Login</h1>
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
                    <div class="wrapper_login p-4 p-lg-5">
                        <h2 class="mb-4">Dealer Login</h2>
                        <div class="social_login_btn">
                            <a href="#"> <img src="{{ asset('assets/images/google_icon.png') }}" class="img-fluid me-1"/> <span class="d-none d-lg-inline">Sign in with Google</span> </a>
                            <a href="#"> <img src="{{ asset('assets/images/fb_icon.png') }}" class="img-fluid me-1"/> <span class="d-none d-lg-inline">Sign in with Facebook</span> </a>
                        </div>
                        <div class="text-center py-4 px-3 divider d-flex flex-row align-items-center justify-content-center">  <span class="px-3">or</span>  </div>

                        <form method="POST" action="{{ route('login') }}" class="login_Form p-2">
                            @csrf

                            <label class="w-100 mb-4">
                                <p class="mb-3">Email</p>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>

                            <label  class="w-100 position-relative">
                                <p class="mb-3">Password</p>
                                <input type="password" placeholder="**********" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                                <a href="javascript:void(0)" style="position: absolute;top: 53px;right: 15px;" class="toggle-password" onclick="togglePasswordField()"> <img src="{{ asset('assets/images/icon.png') }}"> </a>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>

                            <div class="row py-4">
                                <div class="col-lg-6 col-md-6 py-1">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <div class="col-lg-6 col-md-6 text-start text-md-end py-1">
                                        <a href="{{ route('password.request') }}" class="forget_link">{{ __('Forgot Your Password?') }}</a>
                                    </div>
                                @endif
                            </div>

                            <button type="submit" class="w-100">Submit</button>

                            <div class="col-12 text-center mt-4">
                                <a href="{{ route('register') }}" class="forget_link">Don't have an Account?</a>
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


        function b2cVinCheck(){
            let vin = $('input[name="b2c_vin_check"]').val();
            ajaxAction(vin, 'b2c');
        }

        function b2bVinCheck(){
            let vin = $('input[name="b2b_vin_check"]').val();
            ajaxAction(vin, 'b2b')
        }

        function formatString(input) {
            let formattedString = input.replace(/_/g, ' ').toLowerCase();
            formattedString     = formattedString.charAt(0).toUpperCase() + formattedString.slice(1);
            return formattedString;
        }

        function ajaxAction(vin, type){

            $.ajax({
                url: '{{ route('vin-check') }}',
                type: 'post',
                dataType: 'json',
                data: {
                    _token: $("meta[name='csrf-token']").attr('content'),
                    vin: vin,
                    type: type
                },
                success: function(response) {
                    $(".result-section").show();
                    if(response.data)
                    {
                        let rows = '';
                        $.each(response.data, function (index, value) {
                            rows += "<tr>"
                                rows += "<th style='padding-left: 5%;' >"+formatString(index)+"</th>"
                                rows += "<td style='text-align: left; padding-left: 10%;' >"+value+"</td>"
                            rows += "<tr>"
                        })

                        $(".vin-table").html("").append(rows).show();
                        $(".vin-found").show();
                        $(".vin-not-found").hide();
                        $(".go-to-pricing").show();
                    }
                },
                error: function(xhr, status, error) {
                    $(".vin-table").html("").hide();
                    $(".go-to-pricing").hide();
                    $(".result-section").show();

                    $(".vin-not-found").show();
                    let rows = "<tr>"
                    rows += "<th class='text-center'>Vin data not found.</th>"

                    rows += "<tr>"
                    $(".vin-table").append(rows);
                    $(".vin-found").hide();
                }
            });
        }

    </script>
@endpush
