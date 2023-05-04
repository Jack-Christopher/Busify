{{-- navbar for welcome view --}}
<nav class="bg-[#111827] fixed w-full z-10 top-0 shadow hover:bg-slate-850">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">

            <!-- Logo -->
            <div class="pl-4 flex items-center">
                <div class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
                    <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    Busify
                </div>
            </div>

            <!-- Options -->
            <div class="hidden flex-1 text-left ml-16 space-x-8 md:flex lg:flex">
                <a href="/" class="text-lg text-gray-200 no-underline">Home</a>
                <a href="/about" class="ml-4 text-lg text-gray-200 no-underline">About</a>
                <a href="/contact" class="ml-4 text-lg text-gray-200 no-underline">Contact</a>
            </div>

            <!-- Auth links -->
            <div class="hidden relative md:flex lg:flex">
                <div>
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-10 py-4 justify-between sm:flex">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-lg text-gray-200 no-underline">
                                    {{ __('Dashboard') }}
                                </a>
                                @if (Route::has('logout'))
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <a href="{{ route('logout') }}"  class="ml-4 text-lg text-gray-200 no-underline hover:text-gray-50 hover:underline hover:text-xl"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </a>
                                    </form>
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

            <!-- Mobile menu button popdown -->
            <div class=" md:hidden lg:hidden">
                
                <div class="relative">
                    <!-- Aquí irá el botón para desplegar el menú -->
                    <button class="block w-full text-left" onclick="document.getElementById('menu').classList.toggle('hidden')">
                        <svg width="32px" height="32px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#000000" fill-rule="evenodd" d="M19 4a1 1 0 01-1 1H2a1 1 0 010-2h16a1 1 0 011 1zm0 6a1 1 0 01-1 1H2a1 1 0 110-2h16a1 1 0 011 1zm-1 7a1 1 0 100-2H2a1 1 0 100 2h16z"></path> </g></svg>
                    </button>
                    
                    <!-- Aquí irá el contenido del menú desplegable -->
                    <div id="menu" class="absolute top-12 right-0 mt-2 py-2 w-48 bg-white rounded-lg shadow-xl hidden">
                        <!-- Options -->
                        <a href="/" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Home</a>
                        <a href="/about" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">About</a>
                        <a href="/contact" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Contact</a>

                        <hr class="my-2">
                        <!-- Authentication Links -->
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                                    {{ __('Dashboard') }}
                                </a>
                                @if (Route::has('logout'))
                                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                                        {{ __('Logout') }}
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                                    {{ __('Login') }}
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                                        {{ __('Register') }}
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>

            </div>
        </div>
      
    </div>
</nav>
