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
                    <h1 class="text-center pg-title pt-5 mt-5 mb-0">Sample Report</h1>
                </div>
            </div>

        </div>
    </section>




    <!--------------
          Section Area
              --------------->
    <div class="py-5">


        <section class="container-fluid py-2">
            <div class="container mt-5 tabs">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="photos-tab" data-bs-toggle="tab" href="#photos" role="tab" aria-controls="photos" aria-selected="false">Photos</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="purpose-tab" data-bs-toggle="tab" href="#purpose" role="tab" aria-controls="purpose" aria-selected="false">Purpose</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="theft-tab" data-bs-toggle="tab" href="#theft" role="tab" aria-controls="theft" aria-selected="false">Theft</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="odometer-tab" data-bs-toggle="tab" href="#odometer" role="tab" aria-controls="odometer" aria-selected="false">Odometer</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="legal-tab" data-bs-toggle="tab" href="#legal" role="tab" aria-controls="legal" aria-selected="false">Legal Status</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="title-tab" data-bs-toggle="tab" href="#title" role="tab" aria-controls="title" aria-selected="false">Title Check</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="damage-tab" data-bs-toggle="tab" href="#damage" role="tab" aria-controls="damage" aria-selected="false">Damage</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="specs-tab" data-bs-toggle="tab" href="#specs" role="tab" aria-controls="specs" aria-selected="false">Specs & Equipment</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="timeline-tab" data-bs-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="false">Timeline</a>
                    </li>
                </ul>

                <!-- Tab content -->
                <div class="tab-content mt-4 p-3 p-md-4" id="myTabContent">
                    <!-- Overview Tab -->
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <h2 class="pg_sr_title mb-3" style="color:#0071BC;">Volkswagen Passat</h2>
                                                <span class="p-2 me-2" style="border-radius:5px;background:#D9D9D9;">VIN: 1VWBN7A35CCXX</span><span class="p-2 me-2" style="border-radius:5px;background:#D9D9D9;">2014</span>
                                            </div>
                                            <div class="col-lg-2">
                                                <a href="#" class="p-1"><img src="{{ asset('assets/images/share2.png') }}"/></a>
                                                <a href="#" class="p-1"><img src="{{ asset('assets/images/download2.png') }}"/></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5 tabs_content">
                                    <div class="">
                                        <div class="card text-center border-none" style="background:#E6F1F9;">
                                            <div class="card-body">
                                                <img src="{{ asset('assets/images/purpose.png') }}" class=""/>
                                                <h6 class="my-3">Purpose</h6>
                                                <p class="tag-danger px-2 py-1 text-white mb-0"><img src="{{ asset('assets/images/warn-2.png') }}" style="" class="me-1"> Needs Attention</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="card text-center border-none" style="background:#E6F1F9;">
                                            <div class="card-body">
                                                <img src="{{ asset('assets/images/Odometer.png') }}" class=""/>
                                                <h6 class="my-3">Odometer</h6>
                                                <p class="tag-danger px-2 py-1 text-white mb-0"><img src="{{ asset('assets/images/warn-2.png') }}" style="" class="me-1"> Needs Attention</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="card text-center border-none" style="background:#E6F1F9;">
                                            <div class="card-body">
                                                <img src="{{ asset('assets/images/Legal status.png') }}" class=""/>
                                                <h6 class="my-3">Legal Status</h6>
                                                <p class="tag-success px-2 py-1 text-white mb-0"><img src="{{ asset('assets/images/check-2.png') }}" style="" class="me-1"> Looks Good</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="card text-center border-none" style="background:#E6F1F9;">
                                            <div class="card-body">
                                                <img src="{{ asset('assets/images/Title check.png') }}" class=""/>
                                                <h6 class="my-3">Title Check</h6>
                                                <p class="tag-success px-2 py-1 text-white mb-0"><img src="{{ asset('assets/images/check-2.png') }}" style="" class="me-1"> Looks Good</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="card text-center border-none" style="background:#E6F1F9;">
                                            <div class="card-body">
                                                <img src="{{ asset('assets/images/Damage.png') }}" class=""/>
                                                <h6 class="my-3">Damage</h6>
                                                <p class="tag-danger px-2 py-1 text-white mb-0"><img src="{{ asset('assets/images/warn-2.png') }}" style="" class="me-1"> Needs Attention</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-3">
                                <img src="{{ asset('assets/images/tab_img.png') }}" alt="Car Image" class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <!-- Photos Tab -->
                    <div class="tab-pane fade" id="photos" role="tabpanel" aria-labelledby="photos-tab">
                        <p>Photos content goes here.</p>
                    </div>

                    <!-- Purpose Tab -->
                    <div class="tab-pane fade" id="purpose" role="tabpanel" aria-labelledby="purpose-tab">
                        <p>Purpose content goes here.</p>
                    </div>

                    <!-- Theft Tab -->
                    <div class="tab-pane fade" id="theft" role="tabpanel" aria-labelledby="theft-tab">
                        <p>Theft details go here.</p>
                    </div>

                    <!-- Odometer Tab -->
                    <div class="tab-pane fade" id="odometer" role="tabpanel" aria-labelledby="odometer-tab">
                        <p>Odometer details go here.</p>
                    </div>

                    <!-- Legal Status Tab -->
                    <div class="tab-pane fade" id="legal" role="tabpanel" aria-labelledby="legal-tab">
                        <p>Legal Status details go here.</p>
                    </div>

                    <!-- Title Check Tab -->
                    <div class="tab-pane fade" id="title" role="tabpanel" aria-labelledby="title-tab">
                        <p>Title Check details go here.</p>
                    </div>

                    <!-- Damage Tab -->
                    <div class="tab-pane fade" id="damage" role="tabpanel" aria-labelledby="damage-tab">
                        <p>Damage details go here.</p>
                    </div>

                    <!-- Specs & Equipment Tab -->
                    <div class="tab-pane fade" id="specs" role="tabpanel" aria-labelledby="specs-tab">
                        <p>Specs & Equipment details go here.</p>
                    </div>

                    <!-- Timeline Tab -->
                    <div class="tab-pane fade" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
                        <p>Timeline details go here.</p>
                    </div>
                </div>
            </div>

        </section>

        <section class="container-fluid py-2">
            <div class="container">

                <div class="row d-flex align-items-center">
                    <div class="col-lg-6">
                        <div class="img_box p-4 d-flex alighn-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/images/share2.png') }}" class="img_box_img"/>
                            </div>
                            <div class="img_box_text">
                                <h4 class="mt-0">Data sources</h4>
                                <span class="">We checked 900+ data sources in 35 countries</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="img_box p-4 d-flex alighn-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/images/nvmtis.png') }}" class="img_box_img"/>
                            </div>
                            <div class="img_box_text">
                                <h4 class="mt-0">Partners</h4>
                                <span class="">Fuelling this report</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <section class="container-fluid py-2">
            <div class="container">

                <div class="p-5" style="box-shadow: 0px 0px 4px 0px #00000040;">
                    <div class="row mb-5">
                        <div class="col-lg-12">
                            <h2 class="mb-2 pg_sr_title" style="color:#0071BC;">Photos</h2>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-lg-12">

                            <div class="row mb-4">
                                <div class="col-lg-4">
                                    <img src="{{ asset('assets/images/photo 1.png') }}" class="w-100"/>
                                </div>

                                <div class="col-lg-4">
                                    <img src="{{ asset('assets/images/photo 2.png') }}" class="w-100"/>
                                </div>

                                <div class="col-lg-4">
                                    <img src="{{ asset('assets/images/photo 3.png') }}" class="w-100"/>
                                    <span class="mb-3 d-block"></span>
                                    <img src="{{ asset('assets/images/photo 4.png') }}"  class="w-100"/>
                                </div>



                            </div>



                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="#" class="float-end pg_sr_text fw-bold mt-4 text-decoration-none" style="color:#0071BC;border-bottom: 1px solid #0071BC;">Show More</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>


        <section class="container-fluid py-2">
            <div class="container">

                <div class="p-5" style="box-shadow: 0px 0px 4px 0px #00000040;">
                    <div class="row mb-5">
                        <div class="col-lg-7">
                            <h2 class="mb-2 pg_sr_title" style="color:#0071BC;">Purpose</h2>
                            <div><span class="pg_sr_text">Mileage fraud is more common than you think. You're not only overpaying for the car but also might end up with a hefty repair bill.</span> </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="notice notice-danger px-4 py-3 mt-4 d-flex align-items-center">
                                <div class="d-flex align-items-center me-4"><img src="{{ asset('assets/images/danger.png') }}" class="img_box_img"></div>
                                <div class="img_box_text"><h4 class="mt-0 pg_sr_title text-dark">Beware</h4><span class="pg_sr_text">This vehicle may have a fake mileage!</span></div>
                            </div>
                        </div>

                    </div>


                    <div class="row purpose">
                        <div class="col-lg-12">

                            <div class="row mb-4">
                                <div class="col-lg-4">
                                    <div class="px-4 py-4 my-3" style="background:#EDC1B8;border-radius:5px;">
                                        <img src="{{ asset('assets/images/rental.svg') }}"/>
                                        <h4 class="pg_sr_text my-2">Rental</h4>
                                        <span class="tag-danger px-2 py-1 text-white d-inline-flex align-items-center"><img src="{{ asset('assets/images/warn-2.png') }}" style="" class="me-2">Needs Attention</span> <br>
                                        <span class="mt-4 d-block" style="font-family: Inter;font-size: 18px;font-weight: 400;line-height: 28px;text-align: left;color:#424242">Rental vehicle</span>
                                    </div>

                                </div>


                                <div class="col-lg-4">
                                    <div class="px-4 py-4 my-3" style="background:#E6F1F9;border-radius:5px;">
                                        <img src="{{ asset('assets/images/taxi.svg') }}">
                                        <h4 class="pg_sr_text my-2">Rental</h4>
                                        <span class="tag-success px-2 py-1 text-white d-inline-flex align-items-center"><img src="{{ asset('assets/images/check-2.png') }}" style="" class="me-2">Looks Good</span> <br>
                                        <span class="mt-4 d-block" style="font-family: Inter;font-size: 18px;font-weight: 400;line-height: 28px;text-align: left;color:#424242">Rental vehicle</span>
                                    </div>

                                </div>


                                <div class="col-lg-4">
                                    <div class="px-4 py-4 my-3" style="background:#E6F1F9;border-radius:5px;">
                                        <img src="{{ asset('assets/images/transport.svg') }}"/>
                                        <h4 class="pg_sr_text my-2">Rental</h4>
                                        <span class="tag-success px-2 py-1 text-white d-inline-flex align-items-center"><img src="{{ asset('assets/images/check-2.png') }}" style="" class="me-2">Looks Good</span> <br>
                                        <span class="mt-4 d-block" style="font-family: Inter;font-size: 18px;font-weight: 400;line-height: 28px;text-align: left;color:#424242">Rental vehicle</span>
                                    </div>

                                </div>


                                <div class="col-lg-4">
                                    <div class="px-4 py-4 my-3" style="background:#E6F1F9;border-radius:5px;">
                                        <img src="{{ asset('assets/images/police.svg') }}"/>
                                        <h4 class="pg_sr_text my-2">Police</h4>
                                        <span class="tag-success px-2 py-1 text-white d-inline-flex align-items-center"><img src="{{ asset('assets/images/check-2.png') }}" style="" class="me-2">Looks Good</span> <br>
                                        <span class="mt-4 d-block" style="font-family: Inter;font-size: 18px;font-weight: 400;line-height: 28px;text-align: left;color:#424242">Rental vehicle</span>
                                    </div>

                                </div>


                                <div class="col-lg-4">
                                    <div class="px-4 py-4 my-3" style="background:#E6F1F9;border-radius:5px;">
                                        <img src="{{ asset('assets/images/handicap.svg') }}"/>
                                        <h4 class="pg_sr_text my-2">Handicap</h4>
                                        <span class="tag-success px-2 py-1 text-white d-inline-flex align-items-center"><img src="{{ asset('assets/images/check-2.png') }}" style="" class="me-2">Looks Good</span> <br>
                                        <span class="mt-4 d-block" style="font-family: Inter;font-size: 18px;font-weight: 400;line-height: 28px;text-align: left;color:#424242">Rental vehicle</span>
                                    </div>

                                </div>


                                <div class="col-lg-4">
                                    <div class="px-4 py-4 my-3" style="background:#E6F1F9;border-radius:5px;">
                                        <img src="{{ asset('assets/images/school.svg') }}"/>
                                        <h4 class="pg_sr_text my-2">Driving school vehicle</h4>
                                        <span class="tag-success px-2 py-1 text-white d-inline-flex align-items-center"><img src="{{ asset('assets/images/check-2.png') }}" style="" class="me-2">Looks Good</span> <br>
                                        <span class="mt-4 d-block" style="font-family: Inter;font-size: 18px;font-weight: 400;line-height: 28px;text-align: left;color:#424242">Rental vehicle</span>
                                    </div>

                                </div>



                            </div>



                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="#" class="float-end pg_sr_text fw-bold mt-4 text-decoration-none" style="color:#0071BC;border-bottom: 1px solid #0071BC;">Close</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>


        <section class="container-fluid py-2">
            <div class="container">
                <div class="col-lg-12">
                    <div class="p-5" style="box-shadow: 0px 0px 4px 0px #00000040;">
                        <div class="row d-flex align-items-center" >
                            <div class="col-lg-12">
                                <h2 class="mb-2 pg_sr_title" style="color:#0071BC;">Theft</h2>
                                <div><span class="pg_sr_text">Is the vehicle currently marked as stolen? Was it stolen in the past? Has it been recovered?</span> </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="notice notice-success px-4 py-3 mt-4 d-flex align-items-center">
                                    <div class="d-flex align-items-center me-4"><img src="{{ asset('assets/images/check-notice.png') }}" class="img_box_img"></div>
                                    <div class="img_box_text"><h4 class="mt-0 mb-0 pg_sr_title text-dark">No issues found</h4><span class="pg_sr_text">Vehicle was used as a rental!</span></div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="notice notice-general px-4 py-3 mt-4 d-flex align-items-center">
                                    <div class="d-flex align-items-center me-4"><img src="{{ asset('assets/images/warn.png') }}" class="img_box_img"></div>
                                    <div class="img_box_text"><h4 class="mt-0 pg_sr_title text-dark">Note</h4>
                                        <span class="pg_sr_text"> Police database stolen vehicle check completed in9 countries: </span>

                                    </div>
                                    <img src="{{ asset('assets/images/flags 2.png') }}" class="img_box_img px-3">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <a href="#" class="float-end pg_sr_text fw-bold mt-4 text-decoration-none" style="color:#0071BC;border-bottom: 1px solid #0071BC;">Show More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="container-fluid py-2">
            <div class="container">
                <div class="col-lg-12">
                    <div class="p-5" style="box-shadow: 0px 0px 4px 0px #00000040;">
                        <div class="row d-flex align-items-center" >
                            <div class="col-lg-7">
                                <h2 class="mb-2 pg_sr_title" style="color:#0071BC;">Odometer</h2>
                                <div><span class="pg_sr_text">Are there signs of mileage rollbacks or discrepancies?</span> </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="notice notice-danger px-4 py-3 mt-4 d-flex align-items-center">
                                    <div class="d-flex align-items-center me-4"><img src="{{ asset('assets/images/danger.png') }}" class="img_box_img"></div>
                                    <div class="img_box_text"><h4 class="mt-0 pg_sr_title text-dark">Beware</h4><span class="pg_sr_text">This vehicle may have a fake mileage!</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="notice notice-general px-4 py-3 mt-4 d-flex align-items-center">
                                    <div class="d-flex align-items-center me-4"><img src="{{ asset('assets/images/warn.png') }}" class="img_box_img"></div>
                                    <div class="img_box_text"><h4 class="mt-0 pg_sr_title text-dark">Note</h4>
                                        <span class="pg_sr_text">
                                        <ul class="list-group list-group-horizontal ">
                                            <li class="ms-3">Last known mileage: 145,000 mi</li>
                                            <li class="ms-5">Average mileage for similar models: 104,200 mi</li>
                                            <li class="ms-5">5 mileage records found</li>
                                        </ul>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <a href="#" class="float-end pg_sr_text fw-bold mt-4 text-decoration-none" style="color:#0071BC;border-bottom: 1px solid #0071BC;">Show More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid py-2">
            <div class="container">
                <div class="col-lg-12">
                    <div class="p-5" style="box-shadow: 0px 0px 4px 0px #00000040;">
                        <div class="row d-flex align-items-center" >
                            <div class="col-lg-5">
                                <h2 class="mb-2 pg_sr_title" style="color:#0071BC;">Legal status</h2>
                                <div><span class="pg_sr_text">Has the vehicle passed technical inspection? Was it marked as scrapped?</span> </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="notice notice-general px-4 py-3 mt-4 d-flex align-items-center">
                                    <div class="d-flex align-items-center me-4"><img src="{{ asset('assets/images/warn.png') }}" class="img_box_img"></div>
                                    <div class="img_box_text"><h4 class="mt-0 pg_sr_title text-dark">Note</h4>
                                        <div>
                                            <span class="pg_sr_text">Tech inspection passed 2017-02 in</span>
                                            <img src="{{ asset('assets/images/usa.png') }}" class="ms-2 me-2" style="width:32px;"> <span class="pg_sr_text">United States</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12">
                                <a href="#" class="float-end pg_sr_text fw-bold mt-4 text-decoration-none" style="color:#0071BC;border-bottom: 1px solid #0071BC;">Show More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="container-fluid py-2">
            <div class="container">
                <div class="col-lg-12">
                    <div class="p-5" style="box-shadow: 0px 0px 4px 0px #00000040;">
                        <div class="row d-flex align-items-center" >
                            <div class="col-lg-7">
                                <h2 class="mb-2 pg_sr_title" style="color:#0071BC;">Title check</h2>
                                <div><span class="pg_sr_text">Is the vehicle marked with the branded title “Junk,” “Salvage,” “Flood,” or others? Note: these are official title brand terms recognized by US state agencies</span> </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="notice notice-success px-4 py-3 mt-4 d-flex align-items-center">
                                    <div class="d-flex align-items-center me-4"><img src="{{ asset('assets/images/check-notice.png') }}" class="img_box_img"></div>
                                    <div class="img_box_text"><h4 class="mt-0 mb-0 pg_sr_title text-dark">No issues found</h4></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <a href="#" class="float-end pg_sr_text fw-bold mt-4 text-decoration-none" style="color:#0071BC;border-bottom: 1px solid #0071BC;">Show More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section class="container-fluid py-2">
            <div class="container">
                <div class="col-lg-12">
                    <div class="p-5" style="box-shadow: 0px 0px 4px 0px #00000040;">
                        <div class="row d-flex align-items-center" >
                            <div class="col-lg-7">
                                <h2 class="mb-2 pg_sr_title" style="color:#0071BC;">Damage</h2>
                                <div><span class="pg_sr_text">Has this vehicle been damaged in the past? What was the value of the damages?</span> </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="notice notice-danger px-4 py-3 mt-4 d-flex align-items-center">
                                    <div class="d-flex align-items-center me-4"><img src="{{ asset('assets/images/danger.png') }}" class="img_box_img"></div>
                                    <div class="img_box_text"><h4 class="mt-0 pg_sr_title text-dark">Beware</h4><span class="pg_sr_text">This vehicle may have a fake mileage!</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="notice notice-general px-4 py-3 mt-4 d-flex align-items-center">
                                    <div class="d-flex align-items-center me-4"><img src="{{ asset('assets/images/warn.png') }}" class="img_box_img"></div>
                                    <div class="img_box_text"><h4 class="mt-0 pg_sr_title text-dark">Note</h4><span class="pg_sr_text">Mild damages normally won’t impact a vehicle’s safety or leave structural issues</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <a href="#" class="float-end pg_sr_text fw-bold mt-4 text-decoration-none" style="color:#0071BC;border-bottom: 1px solid #0071BC;">Show More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section class="container-fluid py-2">
            <div class="container">
                <div class="col-lg-12">
                    <div class="p-5" style="box-shadow: 0px 0px 4px 0px #00000040;">
                        <div class="row d-flex align-items-center" >

                            <div class="col-lg-12 mb-4">
                                <h2 class="mb-2 pg_sr_title" style="color:#0071BC;">Specs & equipment</h2>
                                <div><span class="pg_sr_text">What specs and equipment are on record for this vehicle?</span> </div>

                                <div class="notice notice-general px-4 py-3 mt-4 d-flex align-items-center">
                                    <div class="d-flex align-items-center me-4"><img src="{{ asset('assets/images/warn.png') }}" class="img_box_img"></div>
                                    <div class="img_box_text"><h4 class="mt-0 pg_sr_title text-dark">Note</h4><span class="pg_sr_text">Check whether the specs and equipment of this vehicle match the facts given by the seller.</span></div>
                                </div>
                            </div>

                            <div class="col-lg-12 mb-4">
                                <div class="space_eqp p-5" style="box-shadow: 0px 0px 4px 0px #00000040;">
                                    <div class="row">
                                        <h2 class="mb-2 pg_sr_title" style="color:#0071BC;">Identification and technical specifications</h2>
                                    </div>

                                    <div class="row py-5">
                                        <div class="col-lg-12">
                                            <div class="divider" style="height: 1px; background: #D9D9D9; display: block; width: 100%;"></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">

                                            <div class="row mb-4">
                                                <div class="col-lg-4">
                                                    <div class="px-4 py-5" style="border-right:1px solid #D9D9D9;border-bottom:1px solid #D9D9D9;">
                                                        <div class="d-flex alighn-items-center">
                                                            <div class="d-flex align-items-center me-4">
                                                                <img src="{{ asset('assets/images/MAKE.svg') }}" class="img_box_img">
                                                            </div>

                                                            <div class="img_box_text">
                                                                <span class="pg_sr_text">Make</span>
                                                                <h4 class="mt-0 pg_sr_title text-dark">Volkswagen</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-4">
                                                    <div class="px-4 py-5" style="border-right:1px solid #D9D9D9;border-bottom:1px solid #D9D9D9;">
                                                        <div class="d-flex alighn-items-center">
                                                            <div class="d-flex align-items-center me-4">
                                                                <img src="{{ asset('assets/images/MODEL.svg') }}" class="img_box_img">
                                                            </div>

                                                            <div class="img_box_text">
                                                                <span class="pg_sr_text">Model</span>
                                                                <h4 class="mt-0 pg_sr_title text-dark">Passat</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="px-4 py-5" style="border-bottom:1px solid #D9D9D9;">
                                                        <div class="d-flex alighn-items-center">
                                                            <div class="d-flex align-items-center me-4">
                                                                <img src="{{ asset('assets/images/BODY TYPE.svg') }}" class="img_box_img">
                                                            </div>

                                                            <div class="img_box_text">
                                                                <span class="pg_sr_text">Body type</span>
                                                                <h4 class="mt-0 pg_sr_title text-dark">Sedan</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="px-4 py-5" style="border-right:1px solid #D9D9D9;border-bottom:1px solid #D9D9D9;">
                                                        <div class="d-flex alighn-items-center">
                                                            <div class="d-flex align-items-center me-4">
                                                                <img src="{{ asset('assets/images/CALCULATOR.svg') }}" class="img_box_img">
                                                            </div>

                                                            <div class="img_box_text">
                                                                <span class="pg_sr_text">Manufacture year</span>
                                                                <h4 class="mt-0 pg_sr_title text-dark">2014</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="px-4 py-5" style="border-right:1px solid #D9D9D9;border-bottom:1px solid #D9D9D9;">
                                                        <div class="d-flex alighn-items-center">
                                                            <div class="d-flex align-items-center me-4">
                                                                <img src="{{ asset('assets/images/DISPLACEMENT.svg') }}" class="img_box_img">
                                                            </div>

                                                            <div class="img_box_text">
                                                                <span class="pg_sr_text">Powertrain displacement</span>
                                                                <h4 class="mt-0 pg_sr_title text-dark">2L</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="px-4 py-5" style="border-bottom:1px solid #D9D9D9;">
                                                        <div class="d-flex alighn-items-center">
                                                            <div class="d-flex align-items-center me-4">
                                                                <img src="{{ asset('assets/images/power.svg') }}" class="img_box_img">
                                                            </div>

                                                            <div class="img_box_text">
                                                                <span class="pg_sr_text">Powertrain power</span>
                                                                <h4 class="mt-0 pg_sr_title text-dark">103 kW (138 hp)</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-4">
                                                    <div class="px-4 py-5" style="border-right:1px solid #D9D9D9;">
                                                        <div class="d-flex alighn-items-center">
                                                            <div class="d-flex align-items-center me-4">
                                                                <img src="{{ asset('assets/images/AUTOMATIC.svg') }}" class="img_box_img">
                                                            </div>

                                                            <div class="img_box_text">
                                                                <span class="pg_sr_text">Transmission type</span>
                                                                <h4 class="mt-0 pg_sr_title text-dark">Automatic</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="px-4 py-5" style="border-right:1px solid #D9D9D9;">
                                                        <div class="d-flex alighn-items-center">
                                                            <div class="d-flex align-items-center me-4">
                                                                <img src="{{ asset('assets/images/usa.png') }}" class="img_box_img">
                                                            </div>

                                                            <div class="img_box_text">
                                                                <span class="pg_sr_text">Plant location</span>
                                                                <h4 class="mt-0 pg_sr_title text-dark">United States</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-12">
                                <div class="space_eqp p-5" style="box-shadow: 0px 0px 4px 0px #00000040;">
                                    <div class="row">
                                        <h2 class="mb-2 pg_sr_title" style="color:#0071BC;">Equipment</h2>
                                        <div><span class="pg_sr_text">As received from the manufacturer</span> </div>
                                    </div>

                                    <div class="row py-5">
                                        <div class="col-lg-12">
                                            <div class="divider" style="height: 1px; background: #D9D9D9; display: block; width: 100%;"></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">

                                            <div class="row mb-4">
                                                <div class="col-lg-3">
                                                    <div class="px-4 py-5" style="border-right:1px solid #D9D9D9;border-bottom:1px solid #D9D9D9;">
                                                        <h4 class="pg_sr_text tag px-3 py-2" style="width: fit-content;">E0A</h4>
                                                        <span class="pg_sr_text">Special editions</span> <br>
                                                        <span class="pg_sr_text">No special edition</span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="px-4 py-5" style="border-right:1px solid #D9D9D9;border-bottom:1px solid #D9D9D9;">
                                                        <h4 class="pg_sr_text tag px-3 py-2" style="width: fit-content;">E0A</h4>
                                                        <span class="pg_sr_text">Special editions</span> <br>
                                                        <span class="pg_sr_text">No special edition</span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3" >
                                                    <div class="px-4 py-5" style="border-right:1px solid #D9D9D9;border-bottom:1px solid #D9D9D9;">
                                                        <h4 class="pg_sr_text tag px-3 py-2" style="width: fit-content;">E0A</h4>
                                                        <span class="pg_sr_text">Special editions</span> <br>
                                                        <span class="pg_sr_text">No special edition</span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3" >
                                                    <div class="px-4 py-5" style="border-bottom:1px solid #D9D9D9;">
                                                        <h4 class="pg_sr_text tag px-3 py-2" style="width: fit-content;">E0A</h4>
                                                        <span class="pg_sr_text">Special editions</span> <br>
                                                        <span class="pg_sr_text">No special edition</span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="px-4 py-5" style="border-right:1px solid #D9D9D9;">
                                                        <h4 class="pg_sr_text tag px-3 py-2" style="width: fit-content;">E0A</h4>
                                                        <span class="pg_sr_text">Special editions</span> <br>
                                                        <span class="pg_sr_text">No special edition</span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="px-4 py-5" style="border-right:1px solid #D9D9D9;">
                                                        <h4 class="pg_sr_text tag px-3 py-2" style="width: fit-content;">E0A</h4>
                                                        <span class="pg_sr_text">Special editions</span> <br>
                                                        <span class="pg_sr_text">No special edition</span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="px-4 py-5" style="border-right:1px solid #D9D9D9;">
                                                        <h4 class="pg_sr_text tag px-3 py-2" style="width: fit-content;">E0A</h4>
                                                        <span class="pg_sr_text">Special editions</span> <br>
                                                        <span class="pg_sr_text">No special edition</span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="px-4 py-5" style="">
                                                        <h4 class="pg_sr_text tag px-3 py-2" style="width: fit-content;">E0A</h4>
                                                        <span class="pg_sr_text">Special editions</span> <br>
                                                        <span class="pg_sr_text">No special edition</span>
                                                    </div>
                                                </div>

                                            </div>



                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <a href="#" class="float-end pg_sr_text fw-bold mt-4 text-decoration-none" style="color:#0071BC;border-bottom: 1px solid #0071BC;">Show More</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <section class="container-fluid py-2">
            <div class="container">

                <div class="row timeline d-flex align-items-center" >
                    <div class="col-lg-12">
                        <div class="p-5" style="box-shadow: 0px 0px 4px 0px #00000040;">
                            <div class="row">
                                <h2 class="mb-3 pg_sr_title" style="color:#0071BC;">Timeline</h2>
                                <div> <span class="tag px-3 py-2 me-3">5 Records Found</span><span class="pg_sr_text">The timeline of records for this vehicle</span> </div>
                            </div>

                            <div class="row py-5">
                                <div class="col-lg-12">
                                    <div class="divider" style="height: 1px; background: #D9D9D9; display: block; width: 100%;"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="mb-3 pg_sr_title" style="color:#0071BC;">Records</h2>

                                    <div class="row p-4 mb-4" style="box-shadow: 0px 0px 4px 0px #00000040;">
                                        <div class="col-lg-2">
                                            <p class="pg_sr_text mb-3">2014-01</p>
                                            <div>
                                                <img src="{{ asset('assets/images/usa.png') }}" class="me-2" style="width:32px;"/> <span class="pg_sr_text">United States</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 text-center">
                                            <img src="{{ asset('assets/images/divider.png') }}" class=""/>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="d-flex alighn-items-center">
                                                <div class="d-flex align-items-center me-4">
                                                    <img src="{{ asset('assets/images/on sale.png') }}" class="img_box_img"/>
                                                </div>

                                                <div class="img_box_text">
                                                    <h4 class="mt-0 pg_sr_title text-dark">Was On Sale</h4>
                                                    <span class="pg_sr_text">This record was created because the vehicle was listed for sale on a certain marketplace. Sometimes the vendor's country (or state) overwrites the vehicle's actual location.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row p-4" style="box-shadow: 0px 0px 4px 0px #00000040;">
                                        <div class="col-lg-2">
                                            <p class="pg_sr_text mb-3">2014-01</p>
                                            <div>
                                                <img src="{{ asset('assets/images/usa.png') }}" class="me-2" style="width:32px;"/> <span class="pg_sr_text">United States</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 text-center">
                                            <img src="{{ asset('assets/images/divider.png') }}" class=""/>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="d-flex alighn-items-center">
                                                <div class="d-flex align-items-center me-4">
                                                    <img src="{{ asset('assets/images/on sale.png') }}" class="img_box_img"/>
                                                </div>

                                                <div class="img_box_text">
                                                    <h4 class="mt-0 pg_sr_title text-dark">Was Inspected</h4>
                                                    <span class="pg_sr_text">This record was created because the vehicle was listed for sale on a certain marketplace. Sometimes the vendor's country (or state) overwrites the vehicle's actual location.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="#" class="float-end pg_sr_text fw-bold mt-4 text-decoration-none" style="color:#0071BC;border-bottom: 1px solid #0071BC;">Show More</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>



            </div>
        </section>



        <section class="container-fluid py-2">
            <div class="container">

                <div class="row d-flex align-items-center">
                    <div class="col-lg-6">
                        <div class="img_box p-4 d-flex alighn-items-center">
                            <img src="{{ asset('assets/images/flags.png') }}" class="img_box_img"/>
                            <div class="img_box_text">
                                <h4 class="mt-0">Data sources</h4>
                                <span class="">We checked 900+ data sources in 35 countries</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="img_box p-4 d-flex alighn-items-center">
                            <img src="{{ asset('assets/images/nvmtis.png') }}" class="img_box_img"/>
                            <div class="img_box_text">
                                <h4 class="mt-0">Partners</h4>
                                <span class="">Fuelling this report</span>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row d-flex align-items-center pt-5 dual_btn">
                    <div class="col-lg-6">
                        <a href="#" class="w-100 text-white text-capitalize d-flex align-items-center justify-content-center text-decoration-none">share <img src="{{ asset('assets/images/share.png') }}" class="ms-2" style="width: 25px;"/> </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="#" class="w-100 text-white text-capitalize d-flex align-items-center justify-content-center text-decoration-none">download <img src="{{ asset('assets/images/download.png') }}" class="ms-2" style="width: 25px;" /></a>
                    </div>
                </div>


            </div>
        </section>

    </div>

@endsection

@push('scripts')

@endpush
