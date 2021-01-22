<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/brands.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/solid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/styles.css') }}">

    <meta name="description" content="التبرع هو منصة للتبرعات">
    <meta name="description" content="donation is a platform for donations ">
    <meta name="description" content="le don est une plateforme de dons">
    <meta name="robots" content="noindex, nofollow" />
    <link rel="canonical" href="http://it-smv.com/donation" />
    <meta name="keywords" content="donation, algeria, love">
  <meta name="author" content="Elhousseyn arab">
  <meta content="donate for better life to others" />
   
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
</head>
<body @if (Session::get('language') == 'ar')
    dir="rtl"
@endif >
    <div id="app">
        @yield('content')
    </div>
</body>
<script src="{{ asset('public/js/app.js') }}"></script>
<script src="{{ asset('public/js/fontawesome.min.js') }}"></script>
<script src="{{ asset('public/js/all.min.js') }}"></script>
<script src="{{ asset('public/js/brands.min.js') }}"></script>
<script src="{{ asset('public/js/solid.min.js') }}"></script>
<script src="{{ asset('public/js/year.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js"></script>

</html>