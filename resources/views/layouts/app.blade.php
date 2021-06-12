<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="main" class="@php if( isset($_COOKIE['mode'])) echo $_COOKIE['mode']; @endphp">
<head>
  <!-- Meta -->
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Php -->
  @php
  if (Auth::check()) {
    $email_verified_user = Auth::user()->email_verified_at;
    $user_role = Auth::user()->role;
    $name = Auth::user()->name;
    $Admin = "ADMIN";
    $Dev = "DEV";
  }
  @endphp

  <!-- Title -->
  <title> @yield('title') </title>
  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}"></script>

  <!-- Styles -->
  @livewireStyles
  <link rel="stylesheet" href="{{mix('css/app.css')}}">
  @section('intoHead')
  @show

</head>
<body>
  <main class="bg-gray-100 dark:bg-gray-800 h-screen overflow-hidden relative">
    <div class="flex items-start justify-between">
      <x-Sidebar />
      <div class="flex flex-col bg-gray-200 dark:bg-gray-700 w-full md:space-y-4">
        <x-Navbar />
        @section('content')
        @show
      </div>
    </div>
  </main>
  @livewireScripts
  <script src="{{ URL::asset('js/darkMode.js') }}" data-turbolinks-track="true" defer></script>
  @section('beforeBody')
  @show
</body>
</html>