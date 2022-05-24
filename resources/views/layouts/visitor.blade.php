<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="keywords" content="femmes, femme, protection, lutte, goma, RD-Congo, Congo, Women Space, Woman Space, changement, @yield('keywords'), @yield('title', config('app.name'))" />
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

        @yield('ws_meta')

        <title>@yield('title', config('app.name'))</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Favicon and Touch Icons -->
        <link href="{{ asset('log/baseLogo.png') }}" rel="shortcut icon" type="image/png">
        <link href="{{ asset('log/baseLogo.png') }}" rel="apple-touch-icon">
        <link href="{{ asset('log/baseLogo.png') }}" rel="apple-touch-icon" sizes="72x72">
        <link href="{{ asset('log/baseLogo.png') }}" rel="apple-touch-icon" sizes="114x114">
        <link href="{{ asset('log/baseLogo.png') }}" rel="apple-touch-icon" sizes="144x144">

        <!-- Styles -->
        <link href="{{ asset('/plugins/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('/plugins/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet">
		<link href="{{ asset('/plugins/owl-carousel/owl.theme.default.min.css') }}" rel="stylesheet">
		<link href="{{ asset('/plugins/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet">
		<link href="{{ asset('/plugins/sal/sal.min.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/theme.min.css') }}" rel="stylesheet">
		<!-- Fonts/Icons -->
		<link href="{{ asset('/plugins/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
		<link href="{{ asset('/plugins/font-awesome/css/all.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('/js/app.js') }}" defer></script>
    </head>
    <body data-preloader="3">

        @include('partials.navbar')

        <!-- Scroll to top button -->
        <div class="scrolltotop">
            <a class="button-circle button-circle-sm button-circle-dark" href="#"><i class="bi bi-arrow-up"></i></a>
        </div>
        <!-- end Scroll to top button -->

        @yield('content')

        @include('partials.footer')

        <script src="{{ asset('/plugins/jquery.min.js') }}"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUma4oJ7_6VbfGNdUYdv6VQ0Ph07Fz0k8"></script>
		<script src="{{ asset('/polyfill.io/v3/polyfill.minc677.js?features=IntersectionObserver') }}"></script>
		<script src="{{ asset('/plugins/plugins.js') }}"></script>
		<script src="{{ asset('/js/functions.min.js') }}"></script>

    </body>
</html>
