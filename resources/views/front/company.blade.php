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
                    <h1 class="text-center pg-title pt-5 mt-5 mb-0">Company</h1>
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
                <div class="col-lg-12 text-center">
                    <h2 class="pg_title">Welcome to My car history</h2>
                    <p>Our team is constantly My CAR HISTORY, building tools, and introducing features to bring the world of automotive data to your doorstep.</p>
                </div>
            </div>


            <div class="row d-flex align-items-center pt-5">
                <div class="col-lg-6">
                    <h2 class="pg_title text-center text-lg-start">Leading the way in automotive data</h2>
                    <p  class="text-center text-lg-start">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>
                <div class="col-lg-6 text-center text-lg-end">
                    <img src="{{ asset('assets/images/car.png') }}" alt="" class="img-fluid"/>
                </div>
            </div>


            <div class="row d-flex align-items-center pt-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <img src="{{ asset('assets/images/car2.png') }}" alt="" class="img-fluid mb-3 mb-lg-0"/>
                </div>
                <div class="col-lg-6">
                    <h2 class="pg_title  text-center text-lg-start">User-empowering research and expert guides</h2>
                    <p class="text-center text-lg-start">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>
            </div>

        </div>
    </section>




    <section class="container-fluid py-5" style="background-color:#E6F1F9;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="pg_title">Drivers, not cars, make our journey remarkable</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>
            </div>

            <div class="row mt-3 mt-md-4">

                <div class="col-lg-4 mb-4 mb-lg-0 comp_sale_box">
                    <div class="bg-white py-5 px-4">
                        <h3>SDR - Sales Representative</h3>
                        <p>Remote • Vilnius, Lithuania</p>
                        <a href="#">Apply now</a>
                    </div>
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0 comp_sale_box">
                    <div class="bg-white  py-5 px-4">
                        <h3>SDR - Sales Representative</h3>
                        <p>Remote • Vilnius, Lithuania</p>
                        <a href="#">Apply now</a>
                    </div>
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0 comp_sale_box">
                    <div class="bg-white  py-5 px-4">
                        <h3>SDR - Sales Representative</h3>
                        <p>Remote • Vilnius, Lithuania</p>
                        <a href="#">Apply now</a>
                    </div>
                </div>

            </div>


        </div>
    </section>




    <section class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="pg_title">Drivers, not cars, make our journey remarkable</h2>
                </div>
            </div>


            <div class="row mt-5 text-center">
                <div class="col-lg-3 col-md-6">
                    <img src="{{ asset('assets/images/1.png') }}" alt="" class="img-fluid mb-4 mb-lg-0"/>
                </div>

                <div class="col-lg-3 col-md-6">
                    <img src="{{ asset('assets/images/2.png') }}" alt="" class="img-fluid mb-4 mb-lg-0"/>
                </div>

                <div class="col-lg-3 col-md-6">
                    <img src="{{ asset('assets/images/3.png') }}" alt="" class="img-fluid mb-4 mb-lg-0"/>
                </div>
                <div class="col-lg-3 col-md-6">
                    <img src="{{ asset('assets/images/4.png') }}" alt="" class="img-fluid mb-lg-0"/>
                </div>
            </div>

        </div>
    </section>



    <section class="container-fluid py-5" style="background-color:#E6F1F9;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="pg_title">Fill this form and your request will be answered as soon as possible</h2>

                    <form class="request_form mt-4 d-flex flex-wrap">

                        <div class="mb-3 w-custom">
                            <input class="form-control" type="email" placeholder="Your E-Mail" aria-label="" required>
                        </div>
                        <span class="" style="margin: 0px 6px;"></span>
                        <div class="mb-3  w-custom">
                            <input class="form-control" type="text" placeholder="Subject" aria-label="" required>
                        </div>

                        <div class="w-100 mb-3">
                            <input class="form-control" type="text" placeholder="VIN number of the car you checked" aria-label="" required>
                        </div>

                        <div class="w-100">
                            <textarea class="form-control" id="" rows="5">Your message</textarea>
                        </div>

                        <div>
                            <button type="submit">Get in touch</button>
                        </div>


                    </form>
                </div>
            </div>

        </div>
    </section>


@endsection

@push('scripts')

@endpush
