<!doctype html>
<html x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'MonGraphisme.com') }}</title>
  <!--<title>{{ config('app.name', 'MonGraphisme.com') }}</title>-->

  <!-- Scripts -->
  <script src="{{url('/js/app.js')}}" defer></script>
  <script src="{{url('js/init-alpine.js')}}"></script>
  <script src="{{url('js/function.js')}}"></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <script
  src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
  defer
  ></script>

  <!--<link href="css/tailwind.output.css" rel="stylesheet"> -->
  <link href="{{url('css/main.css')}}" rel="stylesheet">

  <style type="text/css">
      /*Toast open/load animation*/
  .alert-toast {
    -webkit-animation: slide-in-right 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: slide-in-right 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
  }

  /*Toast close animation*/
  .alert-toast input:checked ~ * {
    -webkit-animation: fade-out-right 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: fade-out-right 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
  }

  /* -------------------------------------------------------------
   * Animations generated using Animista * w: http://animista.net, 
   * ---------------------------------------------------------- */

  @-webkit-keyframes slide-in-top{0%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@keyframes slide-in-top{0%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@-webkit-keyframes slide-out-top{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}}@keyframes slide-out-top{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}}@-webkit-keyframes slide-in-bottom{0%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@keyframes slide-in-bottom{0%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@-webkit-keyframes slide-out-bottom{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}}@keyframes slide-out-bottom{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}}@-webkit-keyframes slide-in-right{0%{-webkit-transform:translateX(1000px);transform:translateX(1000px);opacity:0}100%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}}@keyframes slide-in-right{0%{-webkit-transform:translateX(1000px);transform:translateX(1000px);opacity:0}100%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}}@-webkit-keyframes fade-out-right{0%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}100%{-webkit-transform:translateX(50px);transform:translateX(50px);opacity:0}}@keyframes fade-out-right{0%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}100%{-webkit-transform:translateX(50px);transform:translateX(50px);opacity:0}}

  </style>
</head>
<body>

@if (session('message'))
  <!--Toast-->
  <div class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
    <input type="checkbox" class="hidden" id="footertoast">

    <label class="close cursor-pointer flex items-start justify-between w-full p-2 bg-green-500 h-10 rounded-lg shadow-lg text-gray-300 font-bold" title="close" for="footertoast">

      {{ session('message') }}
    
      <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
      </svg>
    </label>
  </div>
@endif



  <div style="background-color: rgba(0, 0, 0, 0.1)" 
  class="flex h-screen"
  :class="{ 'overflow-hidden': isSideMenuOpen }"
  >
  <!-- Desktop sidebar -->
  <aside
  class="z-20 hidden w-64 overflow-y-auto md:block flex-shrink-0"
  style="
  @if (Auth::user()->graphiste !== Null )

  background-image: url({{ asset('img/fond_graphiste.png') }});
  background-repeat: no-repeat;
  background-position: bottom;
  background-size: 130% ;
  background-color: #000000
  @else
  background-color: #c01a89
  @endif"


  >
  <div class="py-4" >

    <a
    href="
    @can('voir_dashboard')
    /dashboard
    @else
    /
    @endcan('voir_dashboard')
    "
    >
    <img src="{{ asset('img/logo.png') }}" class="w-40 ml-6">
  </a>
  <ul class="mt-6">
    @can('voir_dashboard')
    <li class="relative px-6 py-3 border-t border-b">
      <span
      class="absolute inset-y-0 left-0 w-1 bg-white rounded-tr-lg rounded-br-lg"
      aria-hidden="true"
      ></span>
      <a
      class="inline-flex items-center w-full text-2xl font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800"
      href="/dashboard"
      >
      <svg
      class="w-5 h-5"
      aria-hidden="true"
      fill="none"
      stroke-linecap="round"
      stroke-linejoin="round"
      stroke-width="2"
      viewBox="0 0 24 24"
      stroke="white"
      >
      <path
      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
      ></path>
    </svg>
    <span class="ml-4 text-white">Dashboard</span>
  </a>
  @endcan
</li>
</ul>
<ul>
  @can('voir_conceptions_en_attente_config')
  <li class="relative px-6 py-3">
    <a
    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
    href="/data-required"
    >
    <svg
    class="w-5 h-5"
    aria-hidden="true"
    fill="none"
    stroke-linecap="round"
    stroke-linejoin="round"
    stroke-width="2"
    viewBox="0 0 24 24"
    stroke="white"
    >
    <path
    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
    ></path>
  </svg>
  <span class="ml-2 text-white">En attente de données ({{ count(App\Conception::where('status_id', 1)->get()) }})</span>
</a>
<hr class="mt-4 ">
</li>
@endcan
@can('affecter_graphistes')
<li class="relative px-6 py-3">
  <a
  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
  href="/graphic-required"
  >
  <svg
  class="w-5 h-5"
  aria-hidden="true"
  fill="none"
  stroke-linecap="round"
  stroke-linejoin="round"
  stroke-width="2"
  viewBox="0 0 24 24"
  stroke="white"
  >
  <path
  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
  ></path>
</svg>
<span class="ml-2 text-white">Affectation Graphiste ({{ count(App\Conception::where('status_id', 2)->get()) }})</span>
</a>
<hr class="mt-2">
</li>
@endcan
@can('soumettre_proposition')

<li class="relative px-6 py-3">
  <a
  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
  href="/creation-required"
  >
  <svg
  class="w-5 h-5"
  aria-hidden="true"
  fill="none"
  stroke-linecap="round"
  stroke-linejoin="round"
  stroke-width="2"
  viewBox="0 0 24 24"
  stroke="white"
  >
  <path
  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
  ></path>
</svg>
<span class="ml-2 text-white">En création (@can('administrer')
{{ count(App\Conception::whereIn('status_id', [3])->get()) }}@elsecan ('soumettre_proposition')
{{ count(App\Conception::where('graphiste_id', Auth::user()->graphiste->id)->whereIn('status_id', [3])->get()) }}@endcan)</span>
</a>
<hr class="mt-4 ">

</li>
@endcan
@can('valider_création')

<li class="relative px-6 py-3">
  <a
  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
  href="/validation-required"
  >
  <svg
  class="w-5 h-5"
  aria-hidden="true"
  fill="none"
  stroke-linecap="round"
  stroke-linejoin="round"
  stroke-width="2"
  viewBox="0 0 24 24"
  stroke="white"
  >
  <path
  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
  ></path>
</svg>
<span class="ml-2 text-white">En validation ({{ count(App\Conception::whereIn('status_id', [4,7,10,13])->get()) }})</span>
</a>
<hr class="mt-4">

</li>
@endcan
@can('administrer')

<li class="relative px-6 py-3">
  <a
  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
  href="/response-required"
  >
  <svg
  class="w-5 h-5"
  aria-hidden="true"
  fill="none"
  stroke-linecap="round"
  stroke-linejoin="round"
  stroke-width="2"
  viewBox="0 0 24 24"
  stroke="white"
  >
  <path
  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
  ></path>
</svg>
<span class="ml-2 text-white">En attente de retour ({{ count(App\Conception::whereIn('status_id', [5,8,11])->get()) }})</span>
</a>
<hr class="mt-4 ">

</li>
@endcan
@can('soumettre_proposition')

<li class="relative px-6 py-3">
  <a
  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
  href="/modify-required"
  >
  <svg
  class="w-5 h-5"
  aria-hidden="true"
  fill="none"
  stroke-linecap="round"
  stroke-linejoin="round"
  stroke-width="2"
  viewBox="0 0 24 24"
  stroke="white"
  >
  <path
  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
  ></path>
</svg>
<span class="ml-2 text-white">En modification (@can('administrer')
{{ count(App\Conception::whereIn('status_id', [6,9,12])->get()) }}@elsecan ('soumettre_proposition')
{{ count(App\Conception::where('graphiste_id', Auth::user()->graphiste->id)->whereIn('status_id', [6,9,12])->get()) }}@endcan)</span>
</a>
<hr class="mt-4 ">
</li>
@endcan
@can('soumettre_proposition')

<li class="relative px-6 py-3">
  <a
  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
  href="/pdf-required"
  >
  <svg
  class="w-5 h-5"
  aria-hidden="true"
  fill="none"
  stroke-linecap="round"
  stroke-linejoin="round"
  stroke-width="2"
  viewBox="0 0 24 24"
  stroke="white"
  >
  <path
  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
  ></path>
</svg>
<span class="ml-2 text-white">En attente du PDF (@can('administrer')
{{ count(App\Conception::whereIn('status_id', [14])->get()) }}@elsecan ('soumettre_proposition')
{{ count(App\Conception::where('graphiste_id', Auth::user()->graphiste->id)->whereIn('status_id', [14])->get()) }}@endcan)</span>
</a>
<hr class="mt-4 ">
</li>
@endcan
@can('voir_conceptions_validées')

<li class="relative px-6 py-3">
  <a
  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
  href="/validated"
  >
  <svg
  class="w-5 h-5"
  aria-hidden="true"
  fill="none"
  stroke-linecap="round"
  stroke-linejoin="round"
  stroke-width="2"
  viewBox="0 0 24 24"
  stroke="white"
  >
  <path
  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
  ></path>
</svg>
<span class="ml-2 text-white">Validées et finalisées (@can('administrer')
{{ count(App\Conception::whereIn('status_id', [15])->get()) }}@elsecan ('soumettre_proposition')
{{ count(App\Conception::where('graphiste_id', Auth::user()->graphiste->id)->whereIn('status_id', [15])->get()) }}@endcan)</span>
</a>
<hr class="mt-4 ">

</li>           
@endcan

@can('affecter_graphistes')

<li class="relative px-6 py-3">
  <a
  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
  href="/graphistes"
  >
  <svg
  class="w-5 h-5"
  aria-hidden="true"
  fill="none"
  stroke-linecap="round"
  stroke-linejoin="round"
  stroke-width="2"
  viewBox="0 0 24 24"
  stroke="white"
  >
  <path
  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
  ></path>
</svg>
<span class="ml-2 text-white">Graphistes ({{ count(App\Graphiste::all()) }})</span>
</a>
<hr class="mt-4 ">

</li>           
@endcan

@cannot('administrer')
@cannot('soumettre_proposition')          

<hr>

<li class="relative ml-2">
  <a
  class="inline-flex items-center w-full text-sm transition-colors duration-150
  hover:text-gray-500 text-white"
  href="/"
  >
  <svg
  class="w-5 h-5"
  aria-hidden="true"
  fill="none"
  stroke-linecap="round"
  stroke-linejoin="round"
  stroke-width="2"
  viewBox="0 0 24 24"
  stroke="currentColor"
  >
  <path
  d="M4 6h16M4 10h16M4 14h16M4 18h16"
  ></path>
</svg>
<span class="ml-2 py-2 font-bold text-md">Vos création en cours ({{Auth::user()->CountConceptionEncours()}})</span>
</a>
</li>

<hr class="mb-2">

@foreach ($value as $type)

<li class="relative ml-2">
  <a
  class="inline-flex items-center w-full text-sm transition-colors duration-150
  hover:text-gray-500 text-white"
  href="/{{ $type->id }}/conceptions"
  >
  <svg
  class="w-5 h-5"
  aria-hidden="true"
  fill="none"
  stroke-linecap="round"
  stroke-linejoin="round"
  stroke-width="2"
  viewBox="0 0 24 24"
  stroke="currentColor"
  >
  <path
  d="M4 6h16M4 10h16M4 14h16M4 18h16"
  ></path>
</svg>
<span class="ml-2">{{ $type->label }} ({{ $type->countConceptions()}})</span>
</a>
</li>

@endforeach

@endcannot
@endcannot                                                     
</ul>

</div>
</aside>
<!-- Mobile sidebar -->
<!-- Backdrop -->

      <div
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
      ></div>
      <aside
        class="fixed inset-y-0 z-30 flex-shrink-0 w-64 mt-40 overflow-y-auto bg-white"
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20"
        @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu"
        style="
        margin-top:153px ;
            @if (Auth::user()->graphiste !== Null )
              background-color: #000000
            @else
              background-color: #c01a89
            @endif
            "
      >
<!-- début copie de menu en haut -->

<div class="py-4">

    <a
    href="
    @can('voir_dashboard')
    /dashboard
    @else
    /
    @endcan('voir_dashboard')
    "
    >
    <img src="{{ asset('img/logo-mobile.png') }}" class="w-48 ml-6">
  </a>
  <ul class="mt-6">
    @can('voir_dashboard')
    <li class="relative px-6 py-3 border-t border-b">
      <span
      class="absolute inset-y-0 left-0 w-1 bg-white rounded-tr-lg rounded-br-lg"
      aria-hidden="true"
      ></span>
      <a
      class="inline-flex items-center w-full text-2xl font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800"
      href="/dashboard"
      >
      <svg
      class="w-5 h-5"
      aria-hidden="true"
      fill="none"
      stroke-linecap="round"
      stroke-linejoin="round"
      stroke-width="2"
      viewBox="0 0 24 24"
      stroke="white"
      >
      <path
      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
      ></path>
    </svg>
    <span class="ml-4 text-white">Dashboard</span>
  </a>
  @endcan
</li>
</ul>
<ul>
  @can('voir_conceptions_en_attente_config')
  <li class="relative px-6 py-3">
    <a
    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
    href="/data-required"
    >
    <svg
    class="w-5 h-5"
    aria-hidden="true"
    fill="none"
    stroke-linecap="round"
    stroke-linejoin="round"
    stroke-width="2"
    viewBox="0 0 24 24"
    stroke="white"
    >
    <path
    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
    ></path>
  </svg>
  <span class="ml-2 text-white">En attente de données ({{ count(App\Conception::where('status_id', 1)->get()) }})</span>
</a>
<hr class="mt-4 ">
</li>
@endcan
@can('affecter_graphistes')
<li class="relative px-6 py-3">
  <a
  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
  href="/graphic-required"
  >
  <svg
  class="w-5 h-5"
  aria-hidden="true"
  fill="none"
  stroke-linecap="round"
  stroke-linejoin="round"
  stroke-width="2"
  viewBox="0 0 24 24"
  stroke="white"
  >
  <path
  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
  ></path>
</svg>
<span class="ml-2 text-white">Affectation Graphiste ({{ count(App\Conception::where('status_id', 2)->get()) }})</span>
</a>
<hr class="mt-2">
</li>
@endcan
@can('soumettre_proposition')

<li class="relative px-6 py-3">
  <a
  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
  href="/creation-required"
  >
  <svg
  class="w-5 h-5"
  aria-hidden="true"
  fill="none"
  stroke-linecap="round"
  stroke-linejoin="round"
  stroke-width="2"
  viewBox="0 0 24 24"
  stroke="white"
  >
  <path
  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
  ></path>
</svg>
<span class="ml-2 text-white">En création (@can('administrer')
{{ count(App\Conception::whereIn('status_id', [3])->get()) }}@elsecan ('soumettre_proposition')
{{ count(App\Conception::where('graphiste_id', Auth::user()->graphiste->id)->whereIn('status_id', [3])->get()) }}@endcan)</span>
</a>
<hr class="mt-4 ">

</li>
@endcan
@can('valider_création')

<li class="relative px-6 py-3">
  <a
  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
  href="/validation-required"
  >
  <svg
  class="w-5 h-5"
  aria-hidden="true"
  fill="none"
  stroke-linecap="round"
  stroke-linejoin="round"
  stroke-width="2"
  viewBox="0 0 24 24"
  stroke="white"
  >
  <path
  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
  ></path>
</svg>
<span class="ml-2 text-white">En validation ({{ count(App\Conception::whereIn('status_id', [4,7,10,13])->get()) }})</span>
</a>
<hr class="mt-4">

</li>
@endcan
@can('administrer')

<li class="relative px-6 py-3">
  <a
  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
  href="/response-required"
  >
  <svg
  class="w-5 h-5"
  aria-hidden="true"
  fill="none"
  stroke-linecap="round"
  stroke-linejoin="round"
  stroke-width="2"
  viewBox="0 0 24 24"
  stroke="white"
  >
  <path
  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
  ></path>
</svg>
<span class="ml-2 text-white">En attente de retour ({{ count(App\Conception::whereIn('status_id', [5,8,11])->get()) }})</span>
</a>
<hr class="mt-4 ">

</li>
@endcan
@can('soumettre_proposition')

<li class="relative px-6 py-3">
  <a
  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
  href="/modify-required"
  >
  <svg
  class="w-5 h-5"
  aria-hidden="true"
  fill="none"
  stroke-linecap="round"
  stroke-linejoin="round"
  stroke-width="2"
  viewBox="0 0 24 24"
  stroke="white"
  >
  <path
  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
  ></path>
</svg>
<span class="ml-2 text-white">En modification (@can('administrer')
{{ count(App\Conception::whereIn('status_id', [6,9,12])->get()) }}@elsecan ('soumettre_proposition')
{{ count(App\Conception::where('graphiste_id', Auth::user()->graphiste->id)->whereIn('status_id', [6,9,12])->get()) }}@endcan)</span>
</a>
<hr class="mt-4 ">
</li>
@endcan
@can('soumettre_proposition')

<li class="relative px-6 py-3">
  <a
  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
  href="/pdf-required"
  >
  <svg
  class="w-5 h-5"
  aria-hidden="true"
  fill="none"
  stroke-linecap="round"
  stroke-linejoin="round"
  stroke-width="2"
  viewBox="0 0 24 24"
  stroke="white"
  >
  <path
  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
  ></path>
</svg>
<span class="ml-2 text-white">En attente du PDF (@can('administrer')
{{ count(App\Conception::whereIn('status_id', [14])->get()) }}@elsecan ('soumettre_proposition')
{{ count(App\Conception::where('graphiste_id', Auth::user()->graphiste->id)->whereIn('status_id', [14])->get()) }}@endcan)</span>
</a>
<hr class="mt-4 ">
</li>
@endcan
@can('voir_conceptions_validées')

<li class="relative px-6 py-3">
  <a
  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
  href="/validated"
  >
  <svg
  class="w-5 h-5"
  aria-hidden="true"
  fill="none"
  stroke-linecap="round"
  stroke-linejoin="round"
  stroke-width="2"
  viewBox="0 0 24 24"
  stroke="white"
  >
  <path
  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
  ></path>
</svg>
<span class="ml-2 text-white">Validées et finalisées (@can('administrer')
{{ count(App\Conception::whereIn('status_id', [15])->get()) }}@elsecan ('soumettre_proposition')
{{ count(App\Conception::where('graphiste_id', Auth::user()->graphiste->id)->whereIn('status_id', [15])->get()) }}@endcan)</span>
</a>
<hr class="mt-4 ">

</li>           
@endcan

@can('affecter_graphistes')

<li class="relative px-6 py-3">
  <a
  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
  href="/graphistes"
  >
  <svg
  class="w-5 h-5"
  aria-hidden="true"
  fill="none"
  stroke-linecap="round"
  stroke-linejoin="round"
  stroke-width="2"
  viewBox="0 0 24 24"
  stroke="white"
  >
  <path
  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
  ></path>
</svg>
<span class="ml-2 text-white">Graphistes ({{ count(App\Graphiste::all()) }})</span>
</a>
<hr class="mt-4 ">

</li>           
@endcan

@cannot('administrer')
@cannot('soumettre_proposition')          

<hr>

<li class="relative ml-2">
  <a
  class="inline-flex items-center w-full text-sm transition-colors duration-150
  hover:text-gray-500 text-white"
  href="/"
  >
  <svg
  class="w-5 h-5"
  aria-hidden="true"
  fill="none"
  stroke-linecap="round"
  stroke-linejoin="round"
  stroke-width="2"
  viewBox="0 0 24 24"
  stroke="currentColor"
  >
  <path
  d="M4 6h16M4 10h16M4 14h16M4 18h16"
  ></path>
</svg>
<span class="ml-2 py-2 font-bold text-md">Vos création en cours ({{Auth::user()->CountConceptionEncours()}})</span>
</a>
</li>

<hr class="mb-2">

@foreach ($value as $type)

<li class="relative ml-2">
  <a
  class="inline-flex items-center w-full text-sm transition-colors duration-150
  hover:text-gray-500 text-white"
  href="/{{ $type->id }}/conceptions"
  >
  <svg
  class="w-5 h-5"
  aria-hidden="true"
  fill="none"
  stroke-linecap="round"
  stroke-linejoin="round"
  stroke-width="2"
  viewBox="0 0 24 24"
  stroke="currentColor"
  >
  <path
  d="M4 6h16M4 10h16M4 14h16M4 18h16"
  ></path>
</svg>
<span class="ml-2">{{ $type->label }} ({{ $type->countConceptions()}})</span>
</a>
</li>

@endforeach

@endcannot
@endcannot                                                     
</ul>

</div>


<!-- fin copie de menu en haut -->

      </aside>

<!-- End Mobile Sidebar-->




<div class="flex flex-col flex-1 w-full">
  <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
    <div
    class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300"
    >
    <!-- Mobile hamburger -->

    <button
    class="p-1 mr-5 -ml-1 border-4 border-gray-300 rounded-lg md:hidden focus:outline-none focus:shadow-outline-black"
    @click="toggleSideMenu"
    aria-label="Menu"
    >
    <svg
    class="w-6 h-6"
    aria-hidden="true"
    fill="currentColor"
    viewBox="0 0 20 20"
    >
    <path
    fill-rule="evenodd"
    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
    clip-rule="evenodd"
    ></path>
  </svg>
</button>
<!-- Search input -->
<div class="flex flex-1 lg:mr-2">
  <div
  class="relative w-full max-w-xl text-gray-600"
  >
  <p class="text-xl font-light">
    @can('administrer')
    Bonjour Administrator ! Bonne journée de création :)
    @endcan
    @can('soumettre_proposition')
    @cannot('administrer')
    Bonjour Graphiste ! Bonne journée de création :)
    @endcannot
    @endcan
    @cannot('soumettre_proposition')
    Bonjour Cher Client ! Bonne journée :)
    @endcannot

  </p>
  <!--<div class="absolute inset-y-0 flex items-center pl-2">
    <svg
    class="w-4 h-4"
    aria-hidden="true"
    fill="currentColor"
    viewBox="0 0 20 20"
    >
    <path
    fill-rule="evenodd"
    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
    clip-rule="evenodd"
    ></path>
  </svg>
</div>
<input
class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
type="text"
placeholder="Search for projects"
aria-label="Search"
/>-->
</div>
</div>

<ul class="flex items-center flex-shrink-0 space-x-6">
  <!-- Theme toggler -->

  <!-- Notifications menu -->
  <li class="relative">
    <button
    class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple"
    @click="toggleNotificationsMenu"
    @keydown.escape="closeNotificationsMenu"
    aria-label="Notifications"
    aria-haspopup="true"
    >
    <svg
    class="w-5 h-5"
    aria-hidden="true"
    fill="currentColor"
    viewBox="0 0 20 20"
    >
    <path
    d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"
    ></path>
  </svg>
  <!-- Notification badge -->
  @if( count( Auth::user()->unreadNotifications()->get()) > 0 )
  <span
  aria-hidden="true"
  class="inline-block absolute text-xs text-white top-0 right-0
  transform translate-x-2 -translate-y-2 rounded-full px-1"
  style="margin-top: -5px; background-color: #c01a89"
  >{{ count( Auth::user()->unreadNotifications()->get()) }}</span>
  @endif
</button>
<template x-if="isNotificationsMenuOpen">
  <ul
  x-transition:leave="transition ease-in duration-150"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
  @click.away="closeNotificationsMenu"
  @keydown.escape="closeNotificationsMenu"
  class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-white bg-gray-800 rounded-md shadow-xl"
  >
  <li class="flex">
    <a
    class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800"
    href="/notifications-non-lus"
    >
    <span>Notifications non-lus</span>
    <span
    class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full"
    >
    {{ count(Auth::user()->UnreadNotifications()->get()) }}
  </span>
</a>
</li>
  <li class="flex">
    <a
    class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800"
    href="/notifications-lus"
    >
    <span>Notifications lus</span>
    <span
    class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full"
    >
    {{ count(Auth::user()->readNotifications()->get()) }}
  </span>
</a>
</li>
</ul>
</template>
</li>
<!-- Profile menu -->
<li class="relative">

  <button
  class="inline-flex align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
  @click="toggleProfileMenu"
  @keydown.escape="closeProfileMenu"
  aria-label="Account"
  aria-haspopup="true"
  >
  <img
  class="object-cover w-6 h-6 rounded-full mr-2"
  src="{{ asset('img/picto-logo-mg.png') }}"
  alt=""
  aria-hidden="true"
  />

  <span class="text-gray-500">  {{ Auth::user()->user_login }}</span>
</button>
<template x-if="isProfileMenuOpen">
  <ul
  x-transition:leave="transition ease-in duration-150"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
  @click.away="closeProfileMenu"
  @keydown.escape="closeProfileMenu"
  class="absolute right-0 p-2 mt-2 space-y-2 text-white bg-gray-800 rounded-md shadow-xl"
  aria-label="submenu"
  >
  <!--
  <li class="flex">
    <a
    class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800"
    href="#"
    >
    <svg
    class="w-4 h-4 mr-3"
    aria-hidden="true"
    fill="none"
    stroke-linecap="round"
    stroke-linejoin="round"
    stroke-width="2"
    viewBox="0 0 24 24"
    stroke="currentColor"
    >
    <path
    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
    ></path>
  </svg>
  <span>Profil</span>
</a>
</li>-->


<li class="flex w-full">
  <form method="POST" action="/logout">
    @csrf
    <button
    class="w-full inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800"

    >
    <svg
    class="w-4 h-4 mr-3"
    aria-hidden="true"
    fill="none"
    stroke-linecap="round"
    stroke-linejoin="round"
    stroke-width="2"
    viewBox="0 0 24 24"
    stroke="currentColor"
    >
    <path
    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
    ></path>
  </svg>
  <span>Déconnexion</span>
</button>
</form>
</li>
</ul>
</template>
</li>
</ul>
</div>
</header>






{{ $slot }}
</div>






</div>


<script src="http://unpkg.com/turbolinks"></script>

</body>
</html>
