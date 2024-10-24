@extends('front.layout.app')

@section('title', 'Home')

@push('styles')
    <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
@endpush

@section('content')

    <section class="container-fluid title_sec d-flex"
             style="background-color:#ADDEFF; min-height: 200px; align-items:end !important; padding-bottom: 20px; ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-center">@yield('dashboard_page_title', 'Dashboard')</h3>
                </div>
            </div>
        </div>
    </section>




    <!--------------
          Section Area
              --------------->

    <section class="container-fluid py-5">
        <div class="container bg-light border-1 p-2" style="min-height: 50vh;">
            <div class="row">

                <div class="col-2">
                    @include("front.dashboard.sidebar")
                </div>

                <div class="col-10">
                    <div class="container pt-4" style="min-height: 80vh;">
                        @yield('dashboard_content')
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

@push('scripts')
    <script type="text/javascript">

    </script>
@endpush
