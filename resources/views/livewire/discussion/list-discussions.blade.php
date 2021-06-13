<div>
    <div class="flex flex-col md:flex-row w-full justify-between gap-1 mt-3">
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
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 h-56 w-full">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <a href="#" class="block relative">
                            <img alt="profil" src="{{ $discussion->user->profile_photo_url }}" class="mx-auto object-cover rounded-full h-10 w-10 ring-2 ring-purple-500 "/>
                        </a>
                        <div class="flex flex-col">
                            <span class="font-bold text-md text-black dark:text-gray-200 ml-2">
                                {{ $discussion->user->name }} 
                            </span>
                            <span class="text-sm text-gray-500 dark:text-gray-200 ml-2">
                                {{ $discussion->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <span class="border p-1 border-none outline-none">
                            @if($discussion->reply_id)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                              <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                          </svg>
                          @else
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                        </svg>
                        @endif
                    </span>
                    {{ $discussion->replies->count() }}
                </div>
            </div>
            <div class="flex items-center justify-between mb-4 space-x-12">
                <span class="px-2 py-1 flex items-center font-semibold text-xs rounded-md text-gray-500 bg-gray-200 dark:bg-blue-500 dark:text-gray-100 uppercase">
                    {{ $discussion->category }}
                </span>
                <a href="#">
                    <a href="{{ route('discussions.show', $discussion->slug) }}" class="px-2 no-underline py-1 flex items-center font-semibold text-xs rounded-md text-red-400 dark:text-yellow-500 border border-red-400 dark:border-yellow-500 bg-white dark:bg-gray-700">
                        VIEW
                    </a>
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