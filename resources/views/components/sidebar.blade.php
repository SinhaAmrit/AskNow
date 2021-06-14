{{-- Desktop Design --}}
<div class="h-screen hidden lg:block shadow-lg relative w-72">
    <div class="bg-white h-full dark:bg-gray-700">
      <div class="flex items-center justify-start pt-6 ml-8">
        <p class="font-bold dark:text-white text-xl">
            AskNow
        </p>
    </div>
    <nav class="mt-6">
        <div>
            <a class="w-full flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start border-l-4 {{ Request::is('discussions') ? 'border-purple-500 text-gray-800 dark:text-white' : 'border-transparent text-gray-400 hover:text-purple-500' }}  " href="{{ route('discussions.index') }}">
                <span class="text-left">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:fill-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </span>
                <span class="mx-2 text-sm font-normal">
                    Discussions
                </span>
            </a>
            <a class="w-full flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start border-l-4 {{ Request::is('discussions/create') ? 'border-purple-500 text-purple-500 dark:text-white' : 'border-transparent text-gray-400 hover:text-purple-500' }}  " href="{{ route('discussions.create') }}">
                <span class="text-left">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 3a1 1 0 012 0v5.5a.5.5 0 001 0V4a1 1 0 112 0v4.5a.5.5 0 001 0V6a1 1 0 112 0v5a7 7 0 11-14 0V9a1 1 0 012 0v2.5a.5.5 0 001 0V4a1 1 0 012 0v4.5a.5.5 0 001 0V3z" clip-rule="evenodd" />
                    </svg>
                </span>
                <span class="mx-2 text-sm font-normal">
                    Raise A Query
                </span>
            </a>
            @can('isAdmin')
            <a class="w-full flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start border-l-4 {{ Request::is('discussions/create') ? 'border-purple-500 text-purple-500 dark:text-white' : 'border-transparent text-gray-400 hover:text-purple-500' }}  " href="{{ route('discussions.create') }}">
                <span class="text-left">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 3a1 1 0 012 0v5.5a.5.5 0 001 0V4a1 1 0 112 0v4.5a.5.5 0 001 0V6a1 1 0 112 0v5a7 7 0 11-14 0V9a1 1 0 012 0v2.5a.5.5 0 001 0V4a1 1 0 012 0v4.5a.5.5 0 001 0V3z" clip-rule="evenodd" />
                    </svg>
                </span>
                <span class="mx-2 text-sm font-normal">
                    Raise A Query
                </span>
            </a>
            @endcan
            @can('isDev')
            <a class="w-full flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start border-l-4 border-transparent text-gray-400 hover:text-purple-500" href="{{ route('gui.index') }}">
                <span class="text-left">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm3.293 1.293a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L7.586 10 5.293 7.707a1 1 0 010-1.414zM11 12a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                    </svg>
                </span>
                <span class="mx-2 text-sm font-normal">
                    Artisan
                </span>
            </a>
            @endcan
            @canany(['isAdmin', 'isDev'])
                <a class="w-full flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start border-l-4 border-transparent text-gray-400 hover:text-purple-500" href="{{ route('telescope') }}">
                    <span class="text-left">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                    <span class="mx-2 text-sm font-normal">
                        Artisan
                    </span>
                </a>
            @endcan
        </div>
    </nav>
</div>
</div>