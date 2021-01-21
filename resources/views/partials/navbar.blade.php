<div class="px-4 py-5 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
  <div class="relative flex items-center justify-between">
    <a href="/" aria-label="AskNow" title="AskNow" class="inline-flex items-center">
      <svg class="w-8 text-deep-purple-accent-400" viewBox="0 0 24 24" stroke-linejoin="round" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" stroke="currentColor" fill="none">
        <rect x="3" y="1" width="7" height="12"></rect>
        <rect x="3" y="17" width="7" height="6"></rect>
        <rect x="14" y="1" width="7" height="6"></rect>
        <rect x="14" y="11" width="7" height="12"></rect>
      </svg>
      <span class="ml-2 text-xl font-bold tracking-wide text-gray-800 uppercase">Ask Now</span>
    </a>
    <ul class="flex items-center hidden space-x-8 lg:flex">
      <li><a href="/" aria-label="Our product" title="Our product" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Product</a></li>
      <li><a href="/" aria-label="Our product" title="Our product" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Features</a></li>
      <li><a href="/" aria-label="Product pricing" title="Product pricing" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Pricing</a></li>
      <li><a href="/" aria-label="About us" title="About us" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">About us</a></li>
      <li>
            @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"><button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg ">{{ Auth::user()->name }}</button></a>
                    @else
                        <a href="{{ route('login') }}"><button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg ">Sign In</button></a>

                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}"><button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg ">Register</button></a>
                        @endif --}}
                    @endauth
            @endif
      </li>
    </ul>
    <!-- Mobile menu -->
    <div class="lg:hidden">
      <button onclick="openMenu()" aria-label="Open Menu" title="Open Menu" class="p-2 -mr-1 transition duration-200 rounded focus:outline-none focus:shadow-outline hover:bg-deep-purple-50 focus:bg-deep-purple-50">
        <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
          <path fill="currentColor" d="M23,13H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,13,23,13z"></path>
          <path fill="currentColor" d="M23,6H1C0.4,6,0,5.6,0,5s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,6,23,6z"></path>
          <path fill="currentColor" d="M23,20H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,20,23,20z"></path>
        </svg>
      </button>
      <!-- Mobile menu dropdown -->
      <div class="absolute top-0 left-0 w-full hidden" id="toggle">
        <div class="p-5 bg-white border rounded shadow-sm">
          <div class="flex items-center justify-between mb-4">
            <div>
              <a href="/" aria-label="AskNow" title="AskNow" class="inline-flex items-center">
                <svg class="w-8 text-deep-purple-accent-400" viewBox="0 0 24 24" stroke-linejoin="round" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" stroke="currentColor" fill="none">
                  <rect x="3" y="1" width="7" height="12"></rect>
                  <rect x="3" y="17" width="7" height="6"></rect>
                  <rect x="14" y="1" width="7" height="6"></rect>
                  <rect x="14" y="11" width="7" height="12"></rect>
                </svg>
                <span class="ml-2 text-xl font-bold tracking-wide text-gray-800 uppercase">AskNow</span>
              </a>
            </div>
            <div>
              <button onclick="closeMenu()" aria-label="Close Menu" title="Close Menu" class="p-2 -mt-2 -mr-2 transition duration-200 rounded hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                  <path
                    fill="currentColor"
                    d="M19.7,4.3c-0.4-0.4-1-0.4-1.4,0L12,10.6L5.7,4.3c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4l6.3,6.3l-6.3,6.3 c-0.4,0.4-0.4,1,0,1.4C4.5,19.9,4.7,20,5,20s0.5-0.1,0.7-0.3l6.3-6.3l6.3,6.3c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3 c0.4-0.4,0.4-1,0-1.4L13.4,12l6.3-6.3C20.1,5.3,20.1,4.7,19.7,4.3z"
                  ></path>
                </svg>
              </button>
            </div>
          </div>
          <nav>
            <ul class="space-y-4">
              <li><a href="/" aria-label="Our product" title="Our product" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Product</a></li>
              <li><a href="/" aria-label="Our product" title="Our product" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Features</a></li>
              <li><a href="/" aria-label="Product pricing" title="Product pricing" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Pricing</a></li>
              <li><a href="/" aria-label="About us" title="About us" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">About us</a></li>
              <li>
                @if (Route::has('login'))
                 @auth
                    <a href="{{ url('/dashboard') }}"><button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg ">{{ Auth::user()->name }}</button></a>
                    @else
                        <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg "><a href="{{ route('login') }}">Sign In</button></a>

                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}"><button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg ">Register</button></a>
                        @endif --}}
                    @endauth
            @endif
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!--Mobile End-->
    </div>
  </div>
</div>
<script>
    function closeMenu(){
    var v = document.getElementById("toggle");
    v.classList.add("hidden");
    }
    function openMenu(){
    var element = document.getElementById("toggle");
    element.classList.remove("hidden");
    }
</script>