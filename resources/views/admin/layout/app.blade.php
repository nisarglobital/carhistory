<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name', 'My Car History') }}</title>
    @include("admin.layout.styles")

    @stack('meta')
    @stack('styles')

</head>

<body>

@guest

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper vh-100">

            <!-- Inner content -->
            <div class="content-inner" >

                @yield('content')

            </div>
            <!-- /inner content -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->


@else

    <!-- Main navbar -->
    @include("admin.layout.main_nav")
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        @include("admin.layout.sidebar")
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Inner content -->
            <div class="content-inner">

                @yield('content')

                <!-- Footer -->
                @include("admin.layout.footer")
                <!-- /footer -->

            </div>
            <!-- /inner content -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->


    <!-- config -->
    @include("admin.layout.config")
    <!-- /config -->
@endguest




@include("admin.layout.scripts")
@stack('scripts')
</body>
</html>


