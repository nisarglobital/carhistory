@extends('front.layout.app')

@section('title', 'Home')

@push('styles')

@endpush

@section('content')

    <section class="py-5 px-4 px-md-0 hero" style="background-color:#ADDEFF;">
        <div class="container pt-5">

            <div class="row py-3 py-lg-5">
                <div class="col-lg-6">
                    <h1 class="hero_title mb-0">Buying or selling a used car? <br> Get the <span>Vehicle History.</span></h1>
                    <p class="hero_desc py-4 mb-0">Avoid costly problems and drive away with confidence by using the report millions trust.</p>
                    <a href="#" class="web_btn d-inline-block ">Read More</a>
                    <p class="hero_tag_title hero_desc fw-bolder mt-4 py-3">With MR CAR HISTORY You May Get Information About:</p>
                    <div class="hero_tags">

                        <ul class="navbar-nav flex-row">
                            <li class="nav-item me-3 bg-white px-3 py-1">Damages</li>
                            <li class="nav-item me-3 bg-white px-3 py-1">Title Check</li>
                            <li class="nav-item me-3 bg-white px-3 py-1">Safety</li>
                            <li class="nav-item bg-white px-3 py-1">Safety</li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid" src="{{ asset('asset/images/buying-selling-user-car.svg') }}" alt="Car">
                </div>
            </div>
        </div>
    </section>



    <section class="blueminussection py-3 px-4">
        <div class="container py-4 px-4 px-md-4 py-md-4 bg-white" style="box-shadow: 0px 2px 4px 0px #00000026;">

            <div class="row d-flex align-items-center">
                <div class="col-lg-6 hero_sub_sec">
                    <form class="mt-4 mt-lg-0 w-100" onsubmit="return false;">
                        <div style="border: 1px solid #0071BC;border-radius: 5px;padding: 8px;" class="bg-white w-100 d-flex">
                            <input class="w-100" type="text" name="b2c_vin_check" placeholder="Enter your 17 character VIN" required/>
                            <button type="button" id="b2c_vin_check" onclick="b2cVinCheck()">Go</button>
                        </div>
                    </form>
                </div>

                <div class="col-lg-1 text-center">
                    <p class="mid_cont text-center mb-0 pb-0">Or</p>
                </div>

                <div class="col-lg-5 d-flex align-items-center justify-content-start justify-content-lg-end">
                    <a href="#" class="web_btn d-inline-block w-100 text-center py-4">Get Report</a>
                </div>


            </div>
        </div>

    </section>

    <!-------------- results 1 --------------->
    <section class="report py-5 px-4 px-md-0 result-section" style="background-color:#0071BC; display: none;"  >
        <div class="container">
            <div class="row">
                <div class="col-8 offset-2">

                    <h2 class="vin-found text-center bg-light-blue color-primary py-3" style="display: none;">Vin Check Found <i class="fa-solid fa-circle-check text-success"></i></h2>
                    <h2 class="vin-not-found text-center bg-light-blue color-primary py-3" style="display: none;">Vin Check Not Found <i class="fa-solid fa-circle-xmark text-danger"></i></h2>

                    <table class="table table-striped bg-light vin-table" style="display: none;">
                    </table>

                    <div class="go-to-pricing">
                        <a href="#b2c_pricing" style="text-decoration: none;">
                            <h5 class="text-center bg-light-blue color-primary py-2">View Full Report <i class="fa-solid fa-hand-point-down ml-2 text-warning"></i></h5>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-------------- Report --------------->
    <section class="report py-5 px-4 px-md-0" >
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <h2 class="text-center heading color-primary">What we check for when preparing a report</h2>
                    <p class="text-center mb-0">Our report can provide you with critical details about a vehicle’s history and help you make a more informed decision. <br> Here are just a few of the many things that every CARFAX Canada Vehicle History Report + Lien Check searches for:</p>
                </div>


            </div>
            <div class="row">

                <div class="col-lg-12px-4 pt-md-5 pt-3">
                    <ul class="nav nav-pills mb-5 d-flex align-items-center justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active position-relative" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Damages</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link position-relative" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Mileage Rollbacks</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link position-relative" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Safety</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">

                                    <div class="carousel-item d-flex flex-row row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="content">
                                                <h2 class="heading color-primary">Damages</h2>
                                                <p class="text-start">Mileage fraud is more common than you think. You're not only <br> overpaying for the car but also might end up with a hefty repair bill.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 d-flex align-items-center justify-content-center justify-content-lg-end">
                                            <img class="img-fluid" src="{{ asset('assets/images/Group 35.png') }}" alt="chart">
                                        </div>
                                    </div>

                                    <div class="carousel-item d-flex flex-row row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="content">
                                                <h2 class="heading color-primary">Damages</h2>
                                                <p class="text-start">Mileage fraud is more common than you think. You're not only <br> overpaying for the car but also might end up with a hefty repair bill.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 d-flex align-items-center justify-content-center justify-content-lg-end">
                                            <img class="img-fluid" src="{{ asset('assets/images/Group 35.png') }}" alt="chart">
                                        </div>
                                    </div>

                                </div>

                                <div class="carousel-caption">
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>

                            </div>



                        </div>


                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">

                                    <div class="carousel-item d-flex flex-row row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="content">
                                                <h2 class="heading color-primary">Mileage Rollbacks</h2>
                                                <p class="text-start">Mileage fraud is more common than you think. You're not only <br> overpaying for the car but also might end up with a hefty repair bill.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 d-flex align-items-center justify-content-center justify-content-lg-end">
                                            <img class="img-fluid" src="{{ asset('assets/images/Group 35.png') }}" alt="chart">
                                        </div>
                                    </div>

                                    <div class="carousel-item d-flex flex-row row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="content">
                                                <h2 class="heading color-primary">Mileage Rollbacks</h2>
                                                <p class="text-start">Mileage fraud is more common than you think. You're not only <br> overpaying for the car but also might end up with a hefty repair bill.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 d-flex align-items-center justify-content-center justify-content-lg-end">
                                            <img class="img-fluid" src="{{ asset('assets/images/Group 35.png') }}" alt="chart">
                                        </div>
                                    </div>

                                </div>

                                <div class="carousel-caption">
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>

                            </div>



                        </div>


                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">

                                    <div class="carousel-item d-flex flex-row row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="content">
                                                <h2 class="heading color-primary">Safety</h2>
                                                <p class="text-start">Mileage fraud is more common than you think. You're not only <br> overpaying for the car but also might end up with a hefty repair bill.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 d-flex align-items-center justify-content-center justify-content-lg-end">
                                            <img class="img-fluid" src="{{ asset('assets/images/Group 35.png') }}" alt="chart">
                                        </div>
                                    </div>

                                    <div class="carousel-item d-flex flex-row row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="content">
                                                <h2 class="heading color-primary">Safety</h2>
                                                <p class="text-start">Mileage fraud is more common than you think. You're not only <br> overpaying for the car but also might end up with a hefty repair bill.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 d-flex align-items-center justify-content-center justify-content-lg-end">
                                            <img class="img-fluid" src="{{ asset('assets/images/Group 35.png') }}" alt="chart">
                                        </div>
                                    </div>

                                </div>

                                <div class="carousel-caption">
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>

                            </div>



                        </div>


                    </div>
                </div>

            </div>




        </div>
    </section>

    <!-------------- Choose Wisely --------------->
    <section class="cho_wis py-5 px-4 px-md-0" >
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <h2 class="text-center heading color-primary">Choose Wisely</h2>
                    <p class="text-center mb-0">Make sure your new car is a trusty companion</p>
                </div>


            </div>
            <div class="row">

                <div class="col-lg-4 text-center px-4 pt-md-5 pt-3">
                    <img class="img-fluid mb-3" src="{{ asset('assets/images/avoid-expensive-mistakes.svg') }}" alt="Avoid Expensive Mistakes">
                    <h3 class="text-center color-primary">Avoid expensive mistakes</h3>
                    <p class="text-center">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.
                    </p>
                </div>



                <div class="col-lg-4 text-center px-4 py-md-5 py-3">
                    <img class="img-fluid mb-3" src="{{ asset('assets/images/save-precious-time.svg') }}" alt="Save Precious Time">
                    <h3 class="text-center color-primary">Avoid expensive mistakes</h3>
                    <p class="text-center">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.
                    </p>
                </div>




                <div class="col-lg-4 text-center px-4 py-md-5 py-3">
                    <img class="img-fluid mb-3" src="{{ asset('assets/images/negotiate-better-deal.svg') }}" alt="Negotiate A Better Deal">
                    <h3 class="text-center color-primary">Avoid expensive mistakes</h3>
                    <p class="text-center">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.
                    </p>
                </div>


            </div>




        </div>
    </section>


    <!-------------- Dealership business --------------->
    <section class="deal_business py-5 px-4 px-md-0" style="background-color:#C4E7FF;">
        <div class="container py-0 py-lg-4">
            <div class="row d-flex align-items-center">
                <div class="col-lg-5">
                    <h3  class="heading color-primary">Boost your dealership business</h3>
                    <p class="text color-secondary my-0 r">Our products will make your automotive business more efficient, transparent and will increase customer satisfaction.</p>
                    <ul class="ps-4 my-4 pb-0 deal_bus_list">
                        <li class="">Reduce the risk of unexpected costs</li>
                        <li class="">Simplify car evaluation process</li>
                        <li class="">Make your sales faster</li>
                    </ul>
                    <a href="#" class="web_btn d-inline-block ">Become business partner</a>
                </div>

                <div class="col-lg-7">
                    <img class="img-fluid float-none float-lg-end  pt-4 pt-lg-0" src="{{ asset('assets/images/boost-business.svg') }}" alt="chart">
                </div>


            </div>

            <div class="row">
                <div class="col-lg-12">
                    <span class="py-5 d-inline-block"></span>
                </div>
            </div>


        </div>
    </section>


    <section class="blueminussection py-5 px-4">
        <div class="container py-4 px-4 px-md-5 py-md-5" style="background-color:#0071BC;">

            <div class="row d-flex align-items-center">
                <div class="col-lg-6">
                    <h3  class="mb-3 color-primary heading text-white">History Report</h3>
                    <p class="text color-secondary my-0 text-white">Avoid costly problems by checking a car's history. Just enter the VIN and get a full repor</p>
                </div>

                <div class="col-lg-6 his_report d-flex align-items-center justify-content-start justify-content-lg-end">
                    <form style="width: fit-content;" class="mt-4 mt-lg-0" onsubmit="return false;">
                        <div style="border: 1px solid #0071BC;border-radius: 5px;padding: 8px;" class="bg-white">
                            <input type="text" name="b2b_vin_check" placeholder="Enter your 17 character VIN" required/>
                            <button type="button" id="b2b_vin_check" onclick="b2bVinCheck()">Get Report</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>

    </section>


    <!-------------- Customer Support--------------->
    <section class="cus_support py-5 px-4 px-md-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h3  class="heading color-primary">Customer support is always here to help</h3>
                    <p class="text color-secondary my-0 r">Our support team is happy to assist you whenever you have a question. Drop us a message and we will get back to you.</p>
                    <div class="row px-1 pt-4 pt-lg-5">
                        <div class="col-lg-4">
                            <div class="px-3"  style="border-left:4px solid #C3E7FF;">
                                <h4>97%</h4>
                                <p class="text">satisfaction rate</p>
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <div  class="px-3" style="border-left:4px solid #C3E7FF;">
                                <h4>12-24h</h4>
                                <p class="text">avg. response time</p>
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <div  class="px-3"  style="border-left:4px solid #C3E7FF;">
                                <h4>24/7</h4>
                                <p class="text">always available</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <img class="img-fluid float-lg-end" src="{{ asset('assets/images/customer-support.svg') }}" alt="chart" >
                </div>


            </div>
        </div>
    </section>


    <!-------------- History Report Table --------------->
    <section class="his_rep_tab py-5 px-4 px-md-0" >
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <h2 class="heading text-center color-primary">Which Vehicle History Report is Right For You?</h2>
                    <p class="text-center mb-0">See how we fare against the leading VIN check alternatives!</p>
                </div>


            </div>
            <div class="row">

                <div class="col-lg-12 pt-5 tab_col">
                    <table class="">
                        <thead>
                        <tr>
                            <th class="text-white">Comparison</th>
                            <th class="text-white" style="border-bottom-color:#0071BC;">My Car History</th>
                            <th class="text-white">CarFax (CA & US)</th>
                            <th class="text-white">AutoTrader (UK)</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>Sales listing with photos</td>
                            <td class="tbody_colr1">✓</td>
                            <td>✗</td>
                            <td>✗</td>
                        </tr>
                        <tr>
                            <td>Market value data</td>
                            <td class="tbody_colr2">✓</td>
                            <td>✓</td>
                            <td>✓</td>
                        </tr>

                        <tr>
                            <td>Detailed vehicle specifications</td>
                            <td class="tbody_colr1">✓</td>
                            <td>✗</td>
                            <td>✓</td>
                        </tr>
                        <tr>
                            <td>Auction records with photos</td>
                            <td class="tbody_colr2">✓</td>
                            <td>✗</td>
                            <td>✓</td>
                        </tr>
                        <tr>
                            <td>Offline VIN Decoding</td>
                            <td class="tbody_colr1">✓</td>
                            <td>✗</td>
                            <td>✓</td>
                        </tr>
                        <tr>
                            <td>History for classic vehicles</td>
                            <td class="tbody_colr2">✓</td>
                            <td>✗</td>
                            <td>✓</td>
                        </tr>
                        <tr>
                            <td>Maintenance recommendation</td>
                            <td class="tbody_colr1">✓</td>
                            <td>✗</td>
                            <td>✓</td>
                        </tr>
                        <tr>
                            <td>Ownership History</td>
                            <td class="tbody_colr2">✓</td>
                            <td>✓</td>
                            <td>✓</td>
                        </tr>
                        <tr>
                            <td>Accident history</td>
                            <td class="tbody_colr1">✓</td>
                            <td>✓</td>
                            <td>✓</td>
                        </tr>
                        <tr>
                            <td>Damage check</td>
                            <td class="tbody_colr2">✓</td>
                            <td>✓</td>
                            <td>✓</td>
                        </tr>
                        <tr>
                            <td>Branded title check</td>
                            <td class="tbody_colr1">✓</td>
                            <td>✓</td>
                            <td>✓</td>
                        </tr>
                        <tr>
                            <td>Salvage title check</td>
                            <td class="tbody_colr2">✓</td>
                            <td>✓</td>
                            <td>✓</td>
                        </tr>
                        <tr>
                            <td>Ownership history map</td>
                            <td class="tbody_colr1">✓</td>
                            <td>✓</td>
                            <td>✓</td>
                        </tr>
                        <tr>
                            <td>Recalls</td>
                            <td class="tbody_colr2">✓</td>
                            <td>✓</td>
                            <td>✓</td>
                        </tr>
                        <tr>
                            <td>Ownership Support for heavy duty trucks, trailers & motorcycles</td>
                            <td class="tbody_colr1">✓</td>
                            <td>✓</td>
                            <td>✓</td>
                        </tr>
                        </tbody>
                    </table>
                </div>


            </div>




        </div>
    </section>


    <!-------------- B2C Pricing --------------->
    <section class="b2c_pricing py-5 px-4 px-md-0" id="b2c_pricing" style="background-color:#C4E7FF;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3  class="heading color-primary text-center">The Right Plan for Pricing for B2C</h3>
                    <p class="text color-secondary my-0 text-center">Our products will make your automotive business more efficient, transparent and will increase customer satisfaction.</p>
                </div>

                <div class="col-lg-12">
                    <div class="container">
                        <div class="toggle-btn text-center py-3">
                            <span class="p-3 color-primary body_text">Bill Monthly</span>
                            <label class="switch">
                                <input type="checkbox" id="checbox" onclick="check()" ; />
                                <span class="slider round"></span>
                            </label>
                            <span class="p-3 color-primary body_text">Bill Annualy</span>
                        </div>


                        <div class="container pt-3 pt-lg-5">
                            <div class="row">

                                <div class="col-lg-3 col-md-6 mb-3 mb-lg-0">
                                    <div class="packages bg-white p-4 " style="border-radius:24px;">

                                        <h3>Check 1 Car</h3>
                                        <ul class="navbar-nav py-3">
                                            <li class="nav-item text color-secondary"><img src="{{ asset('assets/images/check.svg') }}" class="me-2"/> <span> Lorem ipsum dolor sit amet </span></li>
                                            <li class="nav-item text color-secondary"><img src="{{ asset('assets/images/check.svg') }}" class="me-2"/> <span> Lorem ipsum dolor sit amet </span></li>
                                            <li class="nav-item text color-secondary"><img src="{{ asset('assets/images/check.svg') }}" class="me-2"/> <span> Lorem ipsum  </span></li>
                                            <li class="nav-item text color-secondary"><img src="{{ asset('assets/images/check.svg') }}" class="me-2"/> <span> Lorem ipsum dolor  </span></li>
                                            <li class="nav-item text color-secondary"><img src="{{ asset('assets/images/check.svg') }}" class="me-2"/> <span> Lorem ipsum </span></li>
                                        </ul>

                                        <p class="d-flex flex-row price_box">
                                            <sub style="color: #0071BC;margin-top: 3px;">&dollar;</sub>
                                            <span class="me-1"><span class="text2">123</span><span class="text1" style="display:none">223</span></span>
                                            <sub style="color: #424242;margin-top: 5px;">/month</sub>
                                        </p>

                                        <a href="" class="b2c_tbn">Choose</a>

                                    </div>
                                </div>

                                <div class="col-lg-3  col-md-6 mb-3 mb-lg-0">
                                    <div class="packages bg-white p-4 " style="border-radius:24px;">

                                        <h3>Check 2 Cars</h3>
                                        <ul class="navbar-nav py-3">
                                            <li class="nav-item text color-secondary"><img src="{{ asset('assets/images/check.svg') }}" class="me-2"/> <span> Lorem ipsum dolor sit amet </span></li>
                                            <li class="nav-item text color-secondary"><img src="{{ asset('assets/images/check.svg') }}" class="me-2"/> <span> Lorem ipsum dolor sit amet </span></li>
                                            <li class="nav-item text color-secondary"><img src="{{ asset('assets/images/check.svg') }}" class="me-2"/> <span> Lorem ipsum  </span></li>
                                            <li class="nav-item text color-secondary"><img src="{{ asset('assets/images/check.svg') }}" class="me-2"/> <span> Lorem ipsum dolor  </span></li>
                                            <li class="nav-item text color-secondary"><img src="{{ asset('assets/images/check.svg') }}" class="me-2"/> <span> Lorem ipsum </span></li>
                                        </ul>

                                        <p class="d-flex flex-row price_box">
                                            <sub style="color: #0071BC;margin-top: 3px;">&dollar;</sub>
                                            <span class="me-1"><span class="text2">123</span><span class="text1" style="display:none">223</span></span>
                                            <sub style="color: #424242;margin-top: 5px;">/month</sub>
                                        </p>

                                        <a href="" class="b2c_tbn">Choose</a>

                                    </div>
                                </div>



                                <div class="col-lg-3   col-md-6  mb-3 mb-lg-0 pro_box">
                                    <div class="packages p-4 " style="border-radius:24px;background:#0071BC;">

                                        <h3 class="text-white">Pro</h3>
                                        <ul class="navbar-nav py-3 text-white">
                                            <li class="nav-item text color-secondary text-white"><img src="{{ asset('assets/images/check.svg') }}" style="max-width: 16px;max-height: 16px;" class="me-2"/> <span> Lorem ipsum dolor sit amet </span></li>
                                            <li class="nav-item text color-secondary text-white"><img src="{{ asset('assets/images/check.svg') }}" style="max-width: 16px;max-height: 16px;" class="me-2"/> <span> Lorem ipsum dolor sit amet </span></li>
                                            <li class="nav-item text color-secondary text-white"><img src="{{ asset('assets/images/check.svg') }}" style="max-width: 16px;max-height: 16px;" class="me-2"/> <span> Lorem ipsum  </span></li>
                                            <li class="nav-item text color-secondary text-white"><img src="{{ asset('assets/images/check.svg') }}" style="max-width: 16px;max-height: 16px;" class="me-2"/> <span> Lorem ipsum dolor  </span></li>
                                            <li class="nav-item text color-secondary text-white"><img src="{{ asset('assets/images/check.svg') }}" style="max-width: 16px;max-height: 16px;" class="me-2"/> <span> Lorem ipsum </span></li>
                                        </ul>

                                        <p class="d-flex flex-row price_box">
                                            <sub class="text-white" style="margin-top: 3px;">&dollar;</sub>
                                            <span class="me-1 text-white"><span class="text2">123</span><span class="text1" style="display:none">223</span></span>
                                            <sub class="text-white" style="margin-top: 5px;">/month</sub>
                                        </p>

                                        <a href="" class="b2c_tbn bg-white">Try 1 month</a>

                                    </div>
                                </div>


                                <div class="col-lg-3  col-md-6 ">
                                    <div class="packages bg-white p-4 " style="border-radius:24px;">

                                        <h3>Check 3 Cars</h3>
                                        <ul class="navbar-nav py-3">
                                            <li class="nav-item text color-secondary"><img src="{{ asset('assets/images/check.svg') }}" class="me-2"/> <span> Lorem ipsum dolor sit amet </span></li>
                                            <li class="nav-item text color-secondary"><img src="{{ asset('assets/images/check.svg') }}" class="me-2"/> <span> Lorem ipsum dolor sit amet </span></li>
                                            <li class="nav-item text color-secondary"><img src="{{ asset('assets/images/check.svg') }}" class="me-2"/> <span> Lorem ipsum  </span></li>
                                            <li class="nav-item text color-secondary"><img src="{{ asset('assets/images/check.svg') }}" class="me-2"/> <span> Lorem ipsum dolor  </span></li>
                                            <li class="nav-item text color-secondary"><img src="{{ asset('assets/images/check.svg') }}" class="me-2"/> <span> Lorem ipsum </span></li>
                                        </ul>

                                        <p class="d-flex flex-row price_box">
                                            <sub style="color: #0071BC;margin-top: 3px;">&dollar;</sub>
                                            <span class="me-1"><span class="text2">123</span><span class="text1" style="display:none">223</span></span>
                                            <sub style="color: #424242;margin-top: 5px;">/month</sub>
                                        </p>

                                        <a href="" class="b2c_tbn">Choose</a>

                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" defer></script>
    <script type="text/javascript">


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
