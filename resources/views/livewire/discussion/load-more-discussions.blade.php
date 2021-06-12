<div
	x-data="{
		checkScroll() {
			window.onscroll = function(ev) {
				if((window.innerHeight + window.scrollY) >= document.body.scrollHeight){
					@this.loadMore();
				}
			};
		}
	}"
	x-init="checkScroll"
>

<button type="button" class="block py-3 px-4 bg-purple-500 hover:bg-purple-600 focus:ring-purple-400 focus:ring-offset-purple-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg" wire:click="loadMore">
    Load More Discussions?
</button>
</div>
