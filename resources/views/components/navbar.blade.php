<div>
    <!-- Be present above all else. - Naval Ravikant -->
    <header class="w-full h-16 z-40 flex items-center justify-between">
        {{-- Mobile Menu Starts--}}
        <div class="block lg:hidden ml-6" wire:ignore>
            <x-jet-dropdown align="left" width="48">
                <x-slot name="trigger">
                    <button class="flex p-2 items-center rounded-full focus:outline-none bg-white shadow text-gray-500 text-md">
                        <svg width="20" height="20" class="text-gray-400" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1664 1344v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45z">
                            </path>
                        </svg>
                    </button>
                </x-slot>
                <x-slot name="content">
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Menu') }}
                    </div>
                    <x-jet-dropdown-link href="{{ route('discussions.index') }}">
                        Discussions
                    </x-jet-dropdown-link>
                    <x-jet-dropdown-link href="{{ route('discussions.create') }}">
                        Raise A Query
                    </x-jet-dropdown-link>
                    <x-jet-dropdown-link href="{{ route('favorites') }}">
                        Inbox
                    </x-jet-dropdown-link>
                    @can('isAdmin')
                    <div class="border-t border-gray-100"></div>
                    <x-jet-dropdown-link href="{{ route('admin.users') }}">
                        Users
                    </x-jet-dropdown-link>

                    @endcan
                    @can('isDev')
                    <div class="border-t border-gray-100"></div>
                    <x-jet-dropdown-link href="{{ route('gui.index') }}">
                        Artisan
                    </x-jet-dropdown-link>
                    <x-jet-dropdown-link href="{{ route('dev.assignAdmin') }}">
                        Manage Role
                    </x-jet-dropdown-link>
                    @endcan
                    @canany(['isAdmin', 'isDev'])
                    <div class="border-t border-gray-100"></div>
                    <x-jet-dropdown-link href="{{ route('telescope') }}">
                        Telescope
                    </x-jet-dropdown-link>
                    @endcan
                    <x-jet-dropdown-link href="{{ route('downloads') }}">
                        Downloads
                    </x-jet-dropdown-link>
                </x-slot>
            </x-jet-dropdown>
        </div>
        {{-- Mobile Menu Ends--}}
        <span class="m-2 text-3xl text-gray-800 dark:text-gray-100 font-sans font-medium uppercase lg:hidden">
            AskNow 
        </span>
        <div class="relative flex flex-col justify-end h-full px-3 md:w-full drop-shadow-2xl">
            <div class=" p-1 mb-2 flex items-center w-full space-x-4 justify-end">
                <a href="{{ route('favorites') }}" class="flex p-2 items-center rounded-full bg-white shadow text-gray-400 hover:text-gray-700 text-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z" />
                      <path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z" />
                  </svg>
              </a>
              @auth
              @livewire('notification-toggle')
              {{-- {{ Str::words($name, 1, '') }} --}}
              <div class="mx-3 pr-4 relative">
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-9 w-9 rounded-full object-cover shadow" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                        @else
                        <span class="inline-flex rounded-md">
                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                {{ Auth::user()->name }}

                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </span>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-jet-dropdown-link>
                        @endif

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-jet-dropdown-link>
                    </form>
                </x-slot>
            </x-jet-dropdown>
        </div>
    </div>
    @else
    <a href="{{ route('login') }}">
        <x-jet-button>
            {{ __('Login') }}
        </x-jet-button>
    </a>
    @endauth
</div>
</header>
</div>