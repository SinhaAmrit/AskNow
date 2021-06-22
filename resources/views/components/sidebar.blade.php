{{-- Desktop Design --}}
<div class="h-screen hidden lg:block shadow-lg relative w-72">
    <div class="bg-white h-full dark:bg-gray-700">
      <div class="flex items-center justify-start pt-6 ml-8">
        <img src="{{ asset('images/logo.png') }}" class="w-8 m-2 bg-blue-50 ring-2 ring-purple-500 p-1 ring-offset-2 rounded-full" alt="">
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
            <a class="w-full flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start border-l-4 border-transparent text-gray-400 hover:text-purple-500" href="{{ route('favorites') }}">
                <span class="text-left">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z" />
                        <path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z" />
                    </svg>
                </span>
                <span class="mx-2 text-sm font-normal">
                    Inbox
                </span>
            </a>
            @can('isAdmin')
            <a class="w-full flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start border-l-4 {{ Request::is('admin/users') ? 'border-purple-500 text-purple-500 dark:text-white' : 'border-transparent text-gray-400 hover:text-purple-500' }}  " href="{{ route('admin.users') }}">
                <span class="text-left">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                  </svg>
              </span>
              <span class="mx-2 text-sm font-normal">
                Users
            </span>
        </a>
        <a class="w-full flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start border-l-4 {{ Request::is('discussions/category') ? 'border-purple-500 text-purple-500 dark:text-white' : 'border-transparent text-gray-400 hover:text-purple-500' }}" href="{{ route('category.create') }}">
            <span class="text-left">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
                  <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
              </svg>
          </span>
          <span class="mx-2 text-sm font-normal">
            Add Category
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
    <a class="w-full flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start border-l-4 {{ Request::is('dev/assignAdmin') ? 'border-purple-500 text-purple-500 dark:text-white' : 'border-transparent text-gray-400 hover:text-purple-500' }}  " href="{{ route('dev.assignAdmin') }}">
        <span class="text-left">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
          </svg>
      </span>
      <span class="mx-2 text-sm font-normal">
        Manage Role
    </span>
</a>
@endcan
@canany(['isAdmin', 'isDev'])
<a class="w-full flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start border-l-4 border-transparent text-gray-400 hover:text-purple-500" href="{{ route('telescope') }}">
    <span class="text-left">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd" />
        </svg>
    </span>
    <span class="mx-2 text-sm font-normal">
        Telescope
    </span>
</a>
@endcan
<a class="w-full flex items-center pl-6 p-2 my-2 transition-colors duration-200 justify-start border-l-4 border-transparent text-gray-400 hover:text-purple-500" href="{{ route('downloads') }}">
    <span class="text-left">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
      </svg>
  </span>
  <span class="mx-2 text-sm font-normal">
    Downloads
</span>
</a>
</div>
</nav>
</div>
</div>