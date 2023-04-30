<!--Nav-->
<nav class="bg-[#111827] fixed w-full z-10 top-0 shadow">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">

        {{-- Logo --}}
        <div class="pl-4 flex items-center">
            <div class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
                <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                Busify
            </div>
        </div>


        {{-- Options --}}
        <div class="flex-1 text-left ml-16 space-x-8">
            <a href="#" class="text-lg text-gray-200 no-underline">Home</a>
            <a href="#" class="ml-4 text-lg text-gray-200 no-underline">About</a>
            <a href="#" class="ml-4 text-lg text-gray-200 no-underline">Contact</a>
        </div>


        
        <!-- Auth links -->
        <div class="relative">
            <div>
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-10 py-4 justify-between sm:block">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-lg text-gray-200 no-underline">
                                {{ __('Dashboard') }}
                            </a>
                            @if (Route::has('logout'))
                                <a href="{{ route('logout') }}" class="ml-4 text-lg text-gray-200 no-underline hover:text-gray-50 hover:underline hover:text-xl">
                                    {{ __('Logout') }}
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="text-lg text-gray-300 no-underline hover:text-gray-50 hover:underline hover:text-xl">
                                {{ __('Login') }}
                            </a>
            
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-lg text-gray-200 no-underline hover:text-gray-50 hover:underline hover:text-xl">
                                    {{ __('Register') }}
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
      </div>
    </div>
</nav>
