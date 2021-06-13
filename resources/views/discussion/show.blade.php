@extends('layouts.master')
@section('title', 'Discussions | AskNow')
@section('intoHead')
@endsection
@section('content')
<div class="overflow-auto h-screen pb-24 px-4 md:px-6">
	<div class="shadow-lg rounded-2xl p-4 px-10 bg-white dark:bg-gray-900 w-full h-full m-auto relative overflow-y-auto">
		<p class="text-3xl md:text-4xl lg:text-5xl text-gray-600 font-serif mt-8 mb-4 mx-4">
			#{{ $discussion->title }}
		</p>
		<span class="text-xl bg-purple-600 text-white p-2 rounded-lg w-auto font-serif mx-2 mb-10">
			&#187; {{ $discussion->replies->count() }} Answer(s)
		</span>
		<span class="font-semibold">
			Asked by : <a href="" class="decoration-clone underline italic">{{ $discussion->user->name }}</a> 
			&nbsp;  &#128337; {{ $discussion->created_at->diffForHumans() }} 
		</span>
		<hr>
		<div class="mt-14 font-mono">
			{!! Markdown::parse($discussion->description) !!}
		</div>

		<div>
			@foreach($discussion->replies as $reply)
			<hr>
			<div class="flex-grow my-3 p-4 shadow-2xl @if($discussion->reply_id === $reply->id) bg-green-200 @else bg-gray-200 @endif">
				<h2 class="text-gray-900 text-lg title-font font-medium">
					<a href="#" class="">
						<img alt="profil" src="{{ $reply->owner->profile_photo_url }}" class=" object-cover rounded-full h-10 w-10 ring-2 ring-purple-500"/>
					</a> {{ $reply->owner->name }}
				</h2>
				@if($discussion->reply_id === $reply->id)
				<span class="inline-flex bg-gray-700 text-white rounded-full h-6 px-3 justify-center items-center">
					Best reply
				</span>
				{{ $reply->created_at->diffForHumans() }}
				@endif
				<p class="leading-relaxed text-base mt-4">{{ $reply->content }}</p>
				@if(auth()->user()->id === $discussion->user_id && $discussion->reply_id == null)
				<form action="{{ route('discussions.mark-as-best', ['discussion' => $discussion->id, 'reply' => $reply->id]) }}" method="POST">
					@csrf
					<button type="submit" class="mt-3 text-white p-2 rounded-lg inline-flex items-center bg-purple-500">Mark As Best Reply
						<svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
							<path d="M5 12h14M12 5l7 7-7 7"></path>
						</svg>
					</button>
				</form>
				@endif
			</div>
		</div>
		@endforeach

		<form action="{{ route('discussions.replies.store', $discussion->id) }}" method="POST">
			@csrf
			<h2 class="max-w-sm p-4 py-0 mt-6 mb-2 md:w-1/3 text-gray-500">Add Reply</h2>
			<div class="items-center w-full p-4 py-0 text-gray-500">
				<input type="text" name="content" id="content" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" @guest disabled="true" @endguest />@guest <a class="text-red-500" href="{{ route('login') }}">Login To Add Reply!</a> @endguest
			</div>
			<hr/>
			<div class="w-full px-4 pb-4 ml-auto mt-2 text-gray-500 md:w-1/3">
				<button type="submit" id="submit" class="py-2 px-4 bg-purple-500 hover:bg-purple-500 focus:ring-purple-700 focus:ring-offset-purple-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
					Post
				</button>
			</div>
		</form>
	</div>
</div>
@endsection