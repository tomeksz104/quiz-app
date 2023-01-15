<nav {{-- id="navbar_top"  class="navbar transition-all duration-300 bg-white bg-opacity-70 backdrop-blur-2xl border-b border-neutral-200" --}}
        class="nav sticky z-[1] top-0 left-0 right-0 px-4 sm:px-0 transition-all duration-300 bg-white shadow-lg border-b border-neutral-200"
        {{-- :class="{'h-24': !atTop, 'h-16': atTop }"
        @scroll.window="atTop = (window.pageYOffset < 50) ? false: true" --}}
>
    <div class="container sm:px-4 lg:px-8 flex flex-wrap items-center justify-between lg:flex-nowrap text-base font-normal leading-5">
        <div class="flex items-center">
            <a href="{{route('index')}}" class="inline-block mr-4 py-0.5 text-xl whitespace-nowrap hover:no-underline focus:no-underline">
                <img src="{{ asset($website_logo) }}" alt="quiz app" class="h-8">
            </a>
        </div>
        <div class="lg:flex lg:items-center hidden sm:visible">
            <ul class="flex list-none flex-row space-x-10 font-medium text-slate-500">
                <li>
                    <a href="{{route('index')}}" class="{{ Route::is('index') ? 'page-scroll text-blue-500 rounded-xl py-3' : 'page-scroll hover:text-blue-500 rounded-xl py-3 ' }} transition duration-150 ease-in-out">Strona Główna <span class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a href="{{route('categories_list')}}"  class="{{ Route::is('categories_list') ? 'page-scroll text-blue-500 rounded-xl py-3' : 'page-scroll hover:text-blue-500 rounded-xl py-3 ' }} transition duration-150 ease-in-out">Kategorie</a>
                </li>
                <li>
                    <a href="{{route('pending_list')}}" class="{{ Route::is('pending_list') ? 'page-scroll text-blue-500 rounded-xl py-3' : 'page-scroll hover:text-blue-500 rounded-xl py-3' }} transition duration-150 ease-in-out">Poczekalnia</a>
                </li>
                <li>
                    <a href="{{route('select_quiz_type')}}" class="{{ Route::is('select_quiz_type') ? 'page-scroll text-blue-500 rounded-xl py-3' : 'page-scroll hover:text-blue-500 rounded-xl py-3' }} transition duration-150 ease-in-out">Utwórz quiz</a>
                </li>
            </ul>
        </div>

        @guest
            <div class="flex items-center">
                <!-- SEARCH ICON -->
                <button onclick="Livewire.emit('openModal', 'modals.search')" type="button" class="text-[28px] md:text-[28px] h-10 w-10 sm:w-12 sm:h-12 rounded-full text-neutral-700 dark:text-neutral-300 sm:hover:bg-neutral-100 sm:dark:hover:bg-neutral-800 focus:outline-none flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-6 h-6 sm:w-7 sm:h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                    </svg>
                </button>
                <div class="py-3 hidden sm:flex sm:visible">
                    <button onclick="Livewire.emit('openModal', 'auth.login')" class="link ml-6 flex-shrink-0 text-sm xl:text-base font-medium text-black hover:text-blue-500">Zaloguj się</button>
                    <a href="{{ route('register') }}" class="ml-5 h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm xl:text-base xl:font-medium py-2 px-4 xl:py-3 xl:px-6 bg-blue-500 hover:bg-blue-600 text-neutral-50" alt="Zajejestruj się">Rejestracja</a>
                </div>
                <button @click="openMobileMainMenu" type="button" class="py-5 visible sm:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
        @endguest
        @auth
            <div class="py-1.5 xl:py-3.5 flex-shrink-0 flex text-neutral-700 dark:text-neutral-100">
                <!-- SEARCH ICON -->
                <button onclick="Livewire.emit('openModal', 'modals.search')" type="button" class="text-[28px] md:text-[28px] h-10 w-10 sm:w-12 sm:h-12 rounded-full text-neutral-700 dark:text-neutral-300 sm:hover:bg-neutral-100 sm:dark:hover:bg-neutral-800 focus:outline-none flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-6 h-6 sm:w-7 sm:h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                    </svg>
                </button>
                <!-- USER ICON -->
                <div class="ml-2 xl:ml-0.5">
                    <button @click="openNotificationsPanel" type="button">
                        <div class="flex-shrink-0 w-10 h-10 xl:w-12 xl:h-12 rounded-full text-neutral-700 dark:text-neutral-300 sm:hover:bg-neutral-100 sm:dark:hover:bg-neutral-800 focus:outline-none flex items-center justify-center ">
                            <div class="relative flex-shrink-0 inline-flex items-center justify-center overflow-hidden z-0 text-neutral-100 uppercase font-semibold shadow-inner rounded-full h-7 w-7 text-base  ring-2 ring-neutral-200 dark:ring-neutral-700 ring-offset-2" style="background-color: rgb(224, 31, 61);">
                                @if(auth()->user()->avatar)
                                    <img class="absolute inset-0 w-full h-full object-cover" src="{{ asset(auth()->user()->avatar) }}" alt="{{ auth()->user()->username }}">
                                @else
                                <span>{{ substr(auth()->user()->username, 0, 1) }}</span>
                                @endif
                            </div>
                        </div>
                    </button>
                </div>
                <button @click="openMobileMainMenu" type="button" class="ml-2 visible sm:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
        @endauth

    </div>
</nav>
<script>
    // Enable hidden nav bar
    {
    const nav = document.querySelector(".nav");
    let lastScrollY = window.scrollY;

    window.addEventListener("scroll", () => {
        if (lastScrollY < window.scrollY) {
        nav.classList.add("-translate-y-20");
        } else {
        nav.classList.remove("-translate-y-20");
        }

        lastScrollY = window.scrollY;
    });
    }
</script>
