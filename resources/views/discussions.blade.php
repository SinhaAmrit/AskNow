@php
$message = "";
$time = date("H"); /* This sets the $time variable to the current hour in the 24 hour clock format */
$timezone = date("e"); /* Set the $timezone variable to become the current timezone */
if ($time < "12") { $message = "Good morning"; } else /* If the time is less than 1200 hours, show good morning */
if ($time >= "12" && $time < "16") { $message = "Good afternoon"; } else /* If the time is grater than or equal to 1200 hours, but less than 1600 hours, so good afternoon */
if ($time >= "16") { $message = "Good evening"; } /* Should the time  equal to 1600 hours, show good evening */
if (Auth::check()) {
  $email_verified_user = Auth::user()->email_verified_at;
  $user_role = Auth::user()->role;
  $name = Auth::user()->name;
}
@endphp
@extends('layouts.master')
@section('title', 'Discussions | AskNow')
@section('intoHead')
@endsection
@section('content')
<div class="overflow-auto h-screen pb-24 px-4 md:px-6">
  <h1 class="text-2xl mt-6 lg:mt-0 lg:text-4xl font-semibold text-gray-800 dark:text-white">
    {{ $message }}, @auth {{ Str::words($name, 1, '') }} @else Guest @endauth
  </h1>
  <h2 class="text-md text-gray-400">
    {{ \Illuminate\Foundation\Inspiring::quote() }}
  </h2>
  @auth
  @if($email_verified_user != null)
  <div class="flex my-6 items-center w-full space-y-4 md:space-x-4 md:space-y-0 flex-col md:flex-row">
    <div class="w-full md:w-6/12">
      <div class="shadow-lg w-full bg-white dark:bg-gray-700 relative overflow-hidden">
        <a href="#" class="w-full h-full block">
          <div class="flex items-center justify-between px-4 py-6 space-x-4">
            <div class="flex items-center">
              <span class="rounded-full relative p-5 bg-yellow-100">
                <svg width="40" fill="currentColor" height="40" class="text-yellow-500 h-5 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1362 1185q0 153-99.5 263.5t-258.5 136.5v175q0 14-9 23t-23 9h-135q-13 0-22.5-9.5t-9.5-22.5v-175q-66-9-127.5-31t-101.5-44.5-74-48-46.5-37.5-17.5-18q-17-21-2-41l103-135q7-10 23-12 15-2 24 9l2 2q113 99 243 125 37 8 74 8 81 0 142.5-43t61.5-122q0-28-15-53t-33.5-42-58.5-37.5-66-32-80-32.5q-39-16-61.5-25t-61.5-26.5-62.5-31-56.5-35.5-53.5-42.5-43.5-49-35.5-58-21-66.5-8.5-78q0-138 98-242t255-134v-180q0-13 9.5-22.5t22.5-9.5h135q14 0 23 9t9 23v176q57 6 110.5 23t87 33.5 63.5 37.5 39 29 15 14q17 18 5 38l-81 146q-8 15-23 16-14 3-27-7-3-3-14.5-12t-39-26.5-58.5-32-74.5-26-85.5-11.5q-95 0-155 43t-60 111q0 26 8.5 48t29.5 41.5 39.5 33 56 31 60.5 27 70 27.5q53 20 81 31.5t76 35 75.5 42.5 62 50 53 63.5 31.5 76.5 13 94z">
                  </path>
                </svg>
              </span>
              <p class="text-sm text-gray-700 dark:text-white ml-2 font-semibold border-b border-gray-200">
                Level 2 Ambassador
              </p>
            </div>
            <div class="border-b border-gray-200 mt-6 md:mt-0 text-black dark:text-white font-bold text-xl">
              $44,453.39
              <span class="text-xs text-gray-400">
                /$100K
              </span>
            </div>
          </div>
          <div class="w-full h-3 bg-gray-100">
            <div class="w-2/5 h-full text-center text-xs text-white bg-green-400">
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="flex items-center w-full md:w-1/2 space-x-4">
      <div class="w-1/2">
        <div class="shadow-lg px-4 py-6 w-full bg-white dark:bg-gray-700 relative">
          <p class="text-2xl text-black dark:text-white font-bold">
            12
          </p>
          <p class="text-gray-400 text-sm">
            Active projects
          </p>
        </div>
      </div>
      <div class="w-1/2">
        <div class="shadow-lg px-4 py-6 w-full bg-white dark:bg-gray-700 relative">
          <p class="text-2xl text-black dark:text-white font-bold">
            $93.76
          </p>
          <p class="text-gray-400 text-sm">
            Commission in approval
          </p>
          <span class="rounded-full absolute p-4 bg-purple-500 top-2 right-4">
            <svg width="40" fill="currentColor" height="40" class="text-white h-4 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
              <path d="M1362 1185q0 153-99.5 263.5t-258.5 136.5v175q0 14-9 23t-23 9h-135q-13 0-22.5-9.5t-9.5-22.5v-175q-66-9-127.5-31t-101.5-44.5-74-48-46.5-37.5-17.5-18q-17-21-2-41l103-135q7-10 23-12 15-2 24 9l2 2q113 99 243 125 37 8 74 8 81 0 142.5-43t61.5-122q0-28-15-53t-33.5-42-58.5-37.5-66-32-80-32.5q-39-16-61.5-25t-61.5-26.5-62.5-31-56.5-35.5-53.5-42.5-43.5-49-35.5-58-21-66.5-8.5-78q0-138 98-242t255-134v-180q0-13 9.5-22.5t22.5-9.5h135q14 0 23 9t9 23v176q57 6 110.5 23t87 33.5 63.5 37.5 39 29 15 14q17 18 5 38l-81 146q-8 15-23 16-14 3-27-7-3-3-14.5-12t-39-26.5-58.5-32-74.5-26-85.5-11.5q-95 0-155 43t-60 111q0 26 8.5 48t29.5 41.5 39.5 33 56 31 60.5 27 70 27.5q53 20 81 31.5t76 35 75.5 42.5 62 50 53 63.5 31.5 76.5 13 94z">
              </path>
            </svg>
          </span>
        </div>
      </div>
    </div>
  </div>
  @endif
  @endauth
    @livewire('list-discussions')
</div>
@endsection