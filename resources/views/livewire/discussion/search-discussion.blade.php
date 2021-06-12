<div class="w-full relative">
	{{-- If your happiness depends on money, you will never be happy with yourself. --}}

	<input type="text" 
	placeholder="Search Discussions..."
	wire:model="query"
	wire;keydown.escape="resetValues"
	wire;keydown.tab="resetValues"
	wire;keydown.ArrowUp="decrementHighlight"
	wire;keydown.ArrowDown="incrementHighlight"
	wire;keydown.enter="selectDiscussion"
	class="block w-full py-1.5 pl-10 pr-4 leading-normal rounded-2xl focus:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-500 ring-opacity-90 bg-gray-100 dark:bg-gray-800 text-gray-400 aa-input" 
	/>

	<div wire:loading class="absolute z-10 list-group bg-white w-full rounded rounded-t-none shadow-lg">
		<div class="list-item">Searching...</div>
	</div>

	@if(empty($query))
	<div class="" wire:click="resetValues"></div>
	@endif

	<div class="absolute z-10 list-group bg-white w-full rounded-t-none shadow-lg">
		@if(!empty($discussions))
		@foreach($discussions as $i => $discussion)
				<span class="list-item {{ $highligtIndex === $i ? 'highlight' : ""}}">
				{{ $discussion['title'] }}
			</span>
			@endforeach
			@else 
			<div class="list-item">No Results :-(</div>
			@endif
		</div>
	</div>
