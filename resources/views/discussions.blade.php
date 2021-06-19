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
        <a href="{{ route('discussions.index') }}" class="w-full h-full block">
          <div class="flex items-center justify-between px-4 py-6 space-x-4">
            <div class="flex items-center">
              <span class="rounded-full relative p-3 bg-yellow-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                </svg>
              </span>
              <p class="text-sm text-gray-700 dark:text-white ml-2 font-semibold border-b border-gray-200">
                Number Of Queries
              </p>
            </div>
            <div class="border-b border-gray-200 mt-6 md:mt-0 text-black dark:text-white font-bold text-xl">
              {{ App\Models\Discussion::count() }}
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
            {{ App\Models\User::count() }}
          </p>
          <p class="text-gray-400 text-sm">
            Active Users
          </p>
        </div>
      </div>
      <div class="w-1/2">
        <div class="shadow-lg px-4 py-6 w-full bg-white dark:bg-gray-700 relative">
          <p class="text-2xl text-black dark:text-white font-bold">
            {{ App\Models\Discussion::count('reply_id') }}
          </p>
          <p class="text-gray-400 text-sm">
            Queries Resolved
          </p>
        </div>
      </div>
    </div>
  </div>
  @endif
  @endauth
  @livewire('list-discussions')
</div>
@endsection