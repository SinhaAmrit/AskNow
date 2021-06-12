{{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
<div class="h-screen justify-center overflow-y-auto">
    @if(session()->has('feedback'))
    <div class="bg-green-200 border-green-600 text-green-600 border-l-4 p-4" role="alert">
        <p class="font-bold">
            Success
        </p>
        <p>
            {{ $message }}
        </p>
    </div>
    @endif
    <form class="container bg-white mb-80 max-w-2xl mx-auto shadow-md md:w-3/4" wire:submit.prevent="store" autocomplete="off">
        @csrf
        <div class="p-4 bg-gray-100 border-t-2 border-purple-500 rounded-lg bg-opacity-5">
            <div class="max-w-sm mx-auto md:w-full md:mx-0">
            </div>
        </div>
        <div class="space-y-6">
            <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                <h2 class="max-w-sm mx-auto md:w-1/3">
                    Title
                </h2>
                <div class="max-w-sm mx-auto md:w-2/3">
                    <div class="relative ">
                        <input type="text" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Any Cool Title Here" wire:model.defer="state.title"/>
                        @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <hr/>
            <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                <h2 class="max-w-sm mx-auto md:w-1/3">Category</h2>
                <div class="max-w-sm mx-auto space-y-5 md:w-2/3">
                    <div>
                        <div class="relative ">
                            <input type="text" id="user-info-name" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Category" wire:model.defer="state.category"/>
                            @error('category') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <h2 class="max-w-sm p-4 py-0 md:w-1/3 text-gray-500">Description</h2>
            @error('description') <span class="text-red-500 px-4 text-xs">{{ $message }}</span> @enderror
            <div wire:ignore class="items-center w-full p-4 py-0 text-gray-500">
                <input name="description" id="description" cols="3" rows="1"></input>
            </div>
            <hr/>
            <div class="w-full px-4 pb-4 ml-auto my-2 text-gray-500 md:w-1/3">
                <button type="submit" id="submit" class="py-2 px-4 bg-purple-500 hover:bg-purple-500 focus:ring-purple-700 focus:ring-offset-purple-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                    Post
                </button>
            </div>
        </div>
    </form>
</div>