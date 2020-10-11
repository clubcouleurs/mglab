<!doctype html>
<html x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'MonGraphisme.com') }}</title>

  <!-- Scripts -->
  <script src="{{asset('js/app.js')}}" defer></script>
  <script src="{{asset('js/init-alpine.js')}}"></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <script
  src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
  defer
  ></script>

  <!--<link href="css/tailwind.output.css" rel="stylesheet"> -->
  <link href="{{asset('css/main.css')}}" rel="stylesheet">
</head>
<body>



{{ $slot }}


<script src="http://unpkg.com/turbolinks"></script>

</body>
</html>
