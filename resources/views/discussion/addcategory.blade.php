@extends('layouts.master')
@section('title', 'Add Category | AskNow')
@section('intoHead')
@endsection
@section('content')
<form class="container bg-white mb-80 max-w-2xl mx-auto shadow-md md:w-3/4" method="POST" action="{{ route('category.store') }}" autocomplete="off">
	@csrf
	<x-honeypot />
	<div class="p-4 bg-gray-100 border-t-2 border-purple-500 rounded-lg bg-opacity-5">
		<div class="max-w-sm mx-auto md:w-full md:mx-0">
			@if(Session::has("success")) 
			{{ Session::get('success') }}
			@endif
		</div>
	</div>
	<div class="space-y-6">
		<div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
			<h2 class="max-w-sm mx-auto md:w-1/3">
				Category
			</h2>
			<div class="max-w-sm mx-auto md:w-2/3">
				<div class="relative ">
					<input type="text" name="category" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Category Title"/>
				</div>
			</div>
		</div>
		<hr/>
		<div class="w-full px-4 pb-4 ml-auto text-gray-500 md:w-1/3">
			<button type="submit" id="submit" class="py-2 px-4 bg-purple-500 hover:bg-purple-500 focus:ring-purple-700 focus:ring-offset-purple-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
				Add
			</button>
		</div>
	</div>
</form>
@endsection