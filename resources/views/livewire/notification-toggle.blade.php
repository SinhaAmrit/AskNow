<div class="relative" wire:ignore>
	<x-jet-dropdown align="right" width="48">
		<x-slot name="trigger">
			<button class="flex p-2 items-center rounded-full bg-white shadow text-gray-400 hover:text-gray-700 text-md" wire:click="readNotifications">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
				</svg>
				@if(auth()->user()->unreadNotifications->count()) <span class="absolute mb-2 ml-3 w-3 border-2 border-white h-3 bg-green-500 rounded-full" />@elseif(!Auth::user()->email_verified_at) <span class="absolute mb-2 ml-3 w-3 border-2 border-white h-3 bg-red-500 rounded-full" /> @endif
			</button>
		</x-slot>
		<x-slot name="content">
			<div class="block px-4 py-2 text-xs text-gray-400">
				{{ __('Notifications') }}
			</div>
			@if(!Auth::user()->email_verified_at)
			<x-jet-dropdown-link href="{{ route('verification.notice') }}">
				<span class="font-semibold">Confirm Your Account! </span>
			</x-jet-dropdown-link>
			@endif
			@if(auth()->user()->unreadNotifications->count())
			@foreach($notifications as $notification)
			@if($notification->type === 'App\Notifications\NewReplyAdded' && $notification->read_at===null)
			<x-jet-dropdown-link href="{{ route('discussions.show', $notification->data['discussion']['slug']) }}">
				<span class="font-semibold">New Reply Added To </span>{{ $notification->data['discussion']['title'] }}
			</x-jet-dropdown-link>
			@endif
			<div class="border-t border-gray-100"></div>
			@endforeach
			@elseif(Auth::user()->email_verified_at != null)
			<x-jet-dropdown-link href="">
				<span class="font-semibold">All Caught Up!</span>
			</x-jet-dropdown-link>
			@endif
		</x-slot>
	</x-jet-dropdown>
</div>
