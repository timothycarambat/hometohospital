<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Primary Meta Tags -->
        <meta name="title" content="HomeToHospitals.org - Connecting PPE Donors to Healthcare Workers">
        <meta name="description" content="This application brings people who can and do want to provide additional PPE supplies to the most at-risk workers during this healthcare crisis.
        No account is required to be listed. All you need is an email and you can begin helping flatten the curve.">
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{$_ENV['APP_URL']}}">
        <meta property="og:title" content="HomeToHospitals.org - Connecting PPE Donors to Healthcare Workers">
        <meta property="og:description" content="This application brings people who can and do want to provide additional PPE supplies to the most at-risk workers during this healthcare crisis.
        No account is required to be listed. All you need is an email and you can begin helping flatten the curve.">
        <meta property="og:image" content="{{asset('img/promo.jpg')}}">
        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{$_ENV['APP_URL']}}">
        <meta property="twitter:title" content="HomeToHospitals.org - Connecting PPE Donors to Healthcare Workers">
        <meta property="twitter:description" content="This application brings people who can and do want to provide additional PPE supplies to the most at-risk workers during this healthcare crisis.
        No account is required to be listed. All you need is an email and you can begin helping flatten the curve.">
        <meta property="twitter:image" content="{{asset('img/promo.jpg')}}">
      	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-touch-icon.png')}}">
      	<link rel="icon" href="{{asset('img/favicon.ico')}}">
        <title>HomeToHospitals.org - Connecting PPE Donors to Healthcare Workers</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-deep_purple.min.css" />
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"></link>

        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <script src="{{asset('js/app.js')}}"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-66498419-13"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-66498419-13');
        </script>
    </head>
    <body>
      @include('header')
      <div class="mdl-container">
        @yield('main_content')
      </div>
    </body>
</html>
