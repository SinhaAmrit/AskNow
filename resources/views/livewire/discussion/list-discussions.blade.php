<div>
    <div class="flex flex-col md:flex-row w-full justify-between gap-1">
        <div class="w-full relative mt-6 lg:mt-0">
            <input type="text" placeholder="Search Discussions..." class="block w-full py-1.5 pl-10 pr-4 leading-normal rounded-2xl focus:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-500 ring-opacity-90 bg-gray-100 dark:bg-gray-800 text-gray-400 aa-input"/>
        </div>
        <div class="flex w-full mt-6 lg:mt-0 justify-center lg:justify-end gap-1">
            <button type="button" class="w-auto border-l border-t border-b text-base font-medium rounded-l-md text-black bg-white hover:bg-gray-100 px-4 py-2 shadow-lg" wire:click="sortOn('created_at')">
                Recent/Older
            </button>
            <button type="button" class="w-auto border text-base font-medium text-black bg-white hover:bg-gray-100 px-4 py-2 shadow-lg">
                Popular
            </button>
            <button type="button" class="w-auto border-t border-b border-r text-base font-medium rounded-r-md text-black bg-white hover:bg-gray-100 px-4 py-2 shadow-lg">
                Old First
            </button>
        </div>
    </div>


    <div class="container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 my-4 w-full" wire.loading.delay.class="opacity-50">   
        @foreach($discussions as $discussion)
        <div class="m-3 mx-auto w-full" @if($loop->last)id="last_record"@endif>
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 h-72 w-full">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <span class="rounded-xl relative p-2 bg-blue-100">
                            <svg width="25" height="25" viewBox="0 0 256 262" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid">
                                <path d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027" fill="#4285F4">
                                </path>
                                <path d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1" fill="#34A853">
                                </path>
                                <path d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782" fill="#FBBC05">
                                </path>
                                <path d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251" fill="#EB4335">
                                </path>
                            </svg>
                        </span>
                        <div class="flex flex-col">
                            <span class="font-bold text-md text-black dark:text-gray-200 ml-2">
                                Google
                            </span>
                            <span class="text-sm text-gray-500 dark:text-gray-200 ml-2">
                                {{ $discussion->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <button class="border p-1 border-none outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-46 text-gray-700 dark:text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </button>
                        <button class="text-gray-200">
                            <svg width="25" height="25" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1088 1248v192q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h192q40 0 68 28t28 68zm0-512v192q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h192q40 0 68 28t28 68zm0-512v192q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h192q40 0 68 28t28 68z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="flex items-center justify-between mb-4 space-x-12">
                    <span class="px-2 py-1 flex items-center font-semibold text-xs rounded-md text-gray-500 bg-gray-200 dark:bg-blue-500 dark:text-gray-100 uppercase">
                        {{ $discussion->category }}
                    </span>
                    <a href="#">
                        <span class="px-2 no-underline py-1 flex items-center font-semibold text-xs rounded-md text-red-400 dark:text-yellow-500 border border-red-400 dark:border-yellow-500 bg-white dark:bg-gray-700">
                            VIEW
                        </span>
                    </a>
                </div>
                <div class="block font-mono font-semibold text-lg subpixel-antialiased">
                    {{ $discussion->title }}
                </div>
                {{ $discussion->summery }}
            </div>
        </div>
        @endforeach
        @if($loadAmount <= $totalRecords)
        <div class="relative flex justify-center items-center h-screen text-3xl p-6" wire:loading>
            <div class="inline-block animate-ping ease duration-300 w-5 h-5 bg-purple-900 mx-2"></div>Loading...
        </div>
        @endif
    </div>
    @if($loadAmount >= $totalRecords)
    <div class="text-3xl text-center">
        <img src="{{ asset('images/no-records-found.png') }}" class="w-1/3 mx-auto" alt="">
        No More Discussions :-(
    </div>
    @endif
    <script>
        const lastRecord = document.getElementById('last_record')
        const otions = {
            root: null,
            threshold: 1,
            rootMargin: '20px'
        }
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if(entry.isIntersecting){
                    @this.loadMore()
                }
            })
        })
        observer.observe(lastRecord)
    </script>
</div>