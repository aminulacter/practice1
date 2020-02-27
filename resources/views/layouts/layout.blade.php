<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="MartPlace - Complete Online Multipurpose Marketplace HTML Template">
    <meta name="keywords" content="app, app landing, product landing, digital, material, html5">


     <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- inject:css -->
  
    <link rel="stylesheet" href="{{ asset('css/fontello.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lnr-icon.css') }}">


   
       <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- endinject -->

    <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">

    @yield('extracss')
</head>

<body class="preload home3">
<div id="app">
    @include('layouts.partials._menu')
    @yield('breadcrumb')
    @yield('content')
    @include('layouts.partials._footer')
</div>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBe3OC_ofXkh25NyZalZGOVf_XBWLhunts"></script> --}}
    <!-- inject:js -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('js/vendor/jquery/jquery-1.12.3.js') }}"></script>
    <script src="{{asset('js/vendor/jquery/popper.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery/uikit.min.js') }}"></script>
     <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/vendor/chart.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/grid.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-ui.min.js') }}"></script>
     <script src="{{ asset('js/vendor/jquery.barrating.min.js') }}"></script>
      <script src="{{ asset('js/vendor/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.easing1.3.js') }}"></script>
      <script src="{{ asset('js/vendor/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/vendor/tether.min.js') }}"></script>
    <script src="{{ asset('js/vendor/trumbowyg.min.js') }}"></script>
    <script src="{{ asset('js/vendor/waypoints.min.js') }}"></script>
     <script src="{{ asset('js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('extrajs')
    {{-- <script src="{{ asset('js/map.js') }}"></script> --}}
    <!-- endinject -->
</body>

</html>