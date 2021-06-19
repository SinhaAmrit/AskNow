@extends('layouts.master')
@section('title', 'Users | AskNow')
@section('intoHead')
@endsection
@section('content')
<div class="overflow-auto h-screen pb-24 px-4 md:px-6">
	<div class="shadow-lg rounded-2xl p-4 px-10 bg-white dark:bg-gray-900 w-full h-full m-auto relative overflow-y-auto">
		@livewire('users-table')
	</div>
</div>
@endsection