<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

      	<link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon.png">
      	<link rel="icon" href="/logo.png">

        <title>🏠{{$_ENV['APP_NAME']}} 🏥</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-deep_purple.min.css" />
        <link href="/css/app.css" rel="stylesheet" type="text/css"></link>

        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <script src="/js/app.js"></script>
    </head>
    <body>
      @include('header')
      <div class="mdl-container">
        @yield('main_content')
      </div>
    </body>
</html>
