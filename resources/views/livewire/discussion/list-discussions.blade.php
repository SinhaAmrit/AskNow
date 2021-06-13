<div>
    <div class="flex flex-col md:flex-row w-full justify-between gap-1 mt-3">
        <div class="w-full relative mt-6 lg:mt-0">
            <input type="text" placeholder="Search Discussions..." class="inline-block w-full py-1.5 pl-10 pr-4 leading-normal rounded-2xl focus:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-500 ring-opacity-90 bg-gray-100 dark:bg-gray-800 text-gray-400 aa-input" wire:model="searchTerm"/> 
        </div>
        <span wire:loading>
            <svg width="20" height="20" fill="currentColor" class="mr-2 animate-spin h-6 w-6 my-2 text-purple-500" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                <path d="M526 1394q0 53-37.5 90.5t-90.5 37.5q-52 0-90-38t-38-90q0-53 37.5-90.5t90.5-37.5 90.5 37.5 37.5 90.5zm498 206q0 53-37.5 90.5t-90.5 37.5-90.5-37.5-37.5-90.5 37.5-90.5 90.5-37.5 90.5 37.5 37.5 90.5zm-704-704q0 53-37.5 90.5t-90.5 37.5-90.5-37.5-37.5-90.5 37.5-90.5 90.5-37.5 90.5 37.5 37.5 90.5zm1202 498q0 52-38 90t-90 38q-53 0-90.5-37.5t-37.5-90.5 37.5-90.5 90.5-37.5 90.5 37.5 37.5 90.5zm-964-996q0 66-47 113t-113 47-113-47-47-113 47-113 113-47 113 47 47 113zm1170 498q0 53-37.5 90.5t-90.5 37.5-90.5-37.5-37.5-90.5 37.5-90.5 90.5-37.5 90.5 37.5 37.5 90.5zm-640-704q0 80-56 136t-136 56-136-56-56-136 56-136 136-56 136 56 56 136zm530 206q0 93-66 158.5t-158 65.5q-93 0-158.5-65.5t-65.5-158.5q0-92 65.5-158t158.5-66q92 0 158 66t66 158z">
                </path>
            </svg>
        </span>
        <div class="flex w-full mt-6 lg:mt-0 justify-center lg:justify-end gap-1">
            <button type="button" class="w-auto border-l border-t border-b text-base font-medium rounded-l-md text-black bg-white hover:bg-gray-100 px-4 py-2 shadow-lg" wire:click="sortOn('created_at')">
                Recent/Older
            </button>
            <button type="button" class="w-auto border text-base font-medium text-black bg-white hover:bg-gray-100 px-4 py-2 shadow-lg">
                Popular
            </button>
            <select class="w-auto border-t border-b border-r text-base font-medium rounded-r-md text-black bg-white hover:bg-gray-100 px-4 py-2 shadow-lg" name="soryBy">
                <option value="">
                    Sort By Category &nbsp; &nbsp;
                </option>
                <option value="Cat 1">
                    Cat 1
                </option>
                <option value="Cat 2">
                    Cat 2
                </option>
                <option value="Cat 3">
                   Cat 3
               </option>
               <option value="Cat 4">
                   Cat 4
               </option>
               <option value="Cat 5">
                   Cat 5
               </option>
               <option value="Cat 6">
                   Cat 6
               </option>
           </select>

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