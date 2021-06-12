<div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 my-4 w-full">
        @foreach($discussions as $discussion)
        <div class="m-3 w-full">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 w-full">
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
                                Google Inc.
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
    </div>
    @if($discussions->hasMorePages())
    @livewire('load-more-discussions', ['page' => $page, 'perPage' => $perPage])
    @endif
</div>