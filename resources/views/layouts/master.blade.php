<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="main">
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

  <!-- Fevicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}"></script>

  <!-- Styles -->
  @notifyCss
  @livewireStyles
  <link rel="menifest" href="{{ asset('manifest.json') }}">
  <link rel="stylesheet" href="{{mix('css/app.css')}}">
  @section('intoHead')
  @show
  <meta name="theme-color" content="#5b21b6">
</head>
<body class="antialiased">
  <main class="bg-gray-100 dark:bg-gray-800 h-screen overflow-hidden relative">
    <div class="flex items-start justify-between">
      <x-sidebar />
      <div class="flex flex-col bg-gray-200 dark:bg-gray-700 w-full md:space-y-4">
        <x-navbar />
        @section('content')
        @show
      </div>
    </div>
  </main>
  <x:notify-messages />
  @livewireScripts
  @notifyJs
  @section('beforeBody')
  @show
</body>
</html>