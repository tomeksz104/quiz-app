@auth
<div
    x-transition:enter="transition duration-300 ease-in-out"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition duration-300 ease-in-out"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    x-show="isNotificationsPanelOpen"
    @click="isNotificationsPanelOpen = false"
    class="fixed inset-0 z-10 bg-neutral-800"
    style="opacity: 0.5"
    aria-hidden="true"
    x-cloak
></div>
<section
    x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
    x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
    x-ref="notificationsPanel"
    x-show="isNotificationsPanelOpen"
    tabindex="-1"
    aria-labelledby="notificationPanelLabel"
    class="fixed inset-y-0 z-20 w-full max-w-sm bg-white dark:bg-darker dark:text-light focus:outline-none" x-cloak>
    <div class="flex flex-col h-screen" x-data="{ activeTabe: 'action' }">
        <div class="flex items-center justify-between h-14 px-5 border-b">
            <h3 class="text-xl font-semibold py-3">
                Panel użytkownika
            </h3>
            <button @click="isNotificationsPanelOpen = false" class="p-2 text-slate-500 hover:bg-slate-100 rounded-full">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <header class="flex px-5 my-6">
            <div class="flex items-center">
                <a class="inline-flex" href="{{route('user_profile', ['username' => Auth()->user()->username ])}}">
                    @if(auth()->user()->avatar)
                    <img src="{{ asset(auth()->user()->avatar) }}" class="rounded-full ring-2 ring-white shadow-xl ring-neutral-100 w-16 h-16" alt="Zdjęcie profilowe {{ auth()->user()->username }}" width="60" height="60">
                    @else
                        <div class="w-16 h-16 bg-neutral-100 ring-2 ring-white shadow-xl rounded-full inline-flex items-center justify-center" style="background-color: rgb(224, 31, 61);">
                            <span class="uppercase text-xl text-white">{{ substr(auth()->user()->username, 0, 1) }}</span>
                        </div>
                    @endif
                </a>
                <div class="flex flex-col ml-5">
                    <a href="{{route('user_profile', ['username' => Auth()->user()->username ])}}" class="text-[14px] font-medium hover:underline">{{ isset(auth()->user()->display_username) ? auth()->user()->display_username : auth()->user()->username }}</a>
                    <p class="inline-flex text-2xs font-medium">
                        <span>{{ auth()->user()->role }}</span>
                    </p>
                </div>
            </div>
        </header>
        <div class="overflow-y-auto overflow-x-hidden flex-grow">
            <ul class="flex flex-col py-4 space-y-1">
                <li class="px-5">
                    <div class="flex flex-row items-center h-8">
                        <div class="text-sm font-light tracking-wide text-gray-500">Menu</div>
                    </div>
                </li>
                <li>
                    <a href="{{ route('my_activity') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-blue-500 border-l-4 border-transparent hover:border-blue-500 pr-6">
					<span class="inline-flex justify-center items-center ml-4">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
						</svg>
					</span>
                        <span class="ml-2 text-sm tracking-wide truncate">Moja aktywność</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user_quizzes') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-blue-500 border-l-4 border-transparent hover:border-blue-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Twoje quizy</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('select_quiz_type')}}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-blue-500 border-l-4 border-transparent hover:border-blue-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                            </svg>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Utwórz quiz</span>
                    </a>
                </li>
                @can('isAdmin')
                <li class="px-5">
                    <div class="flex flex-row items-center h-8">
                        <div class="text-sm font-light tracking-wide text-gray-500">Admin</div>
                    </div>
                </li>
                <li>
                    <a href="{{ route('admin.quizzes') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-blue-500 border-l-4 border-transparent hover:border-blue-500 pr-6">
					<span class="inline-flex justify-center items-center ml-4">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
						</svg>
					</span>
                        <span class="ml-2 text-sm tracking-wide truncate">Quizy</span>
                        <span class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-neutral-500 bg-neutral-50 rounded-full">{{ $quizzes_count }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-blue-500 border-l-4 border-transparent hover:border-blue-500 pr-6">
					<span class="inline-flex justify-center items-center ml-4">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
						</svg>
					</span>
                        <span class="ml-2 text-sm tracking-wide truncate">Kategorie</span>
                        <span class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-neutral-500 bg-neutral-50 rounded-full">{{ $categories_count }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-blue-500 border-l-4 border-transparent hover:border-blue-500 pr-6">
					<span class="inline-flex justify-center items-center ml-4">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
						</svg>
					</span>
                        <span class="ml-2 text-sm tracking-wide truncate">Użytkownicy</span>
                        <span class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-neutral-500 bg-neutral-50 rounded-full">{{ $users_count }}</span>
                    </a>
                </li>
                @endcan
                <li class="px-5">
                    <div class="flex flex-row items-center h-8">
                        <div class="text-sm font-light tracking-wide text-gray-500">Zarządzaj kontem</div>
                    </div>
                </li>
                <li>
                    <a href="{{ route('account_settings') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-blue-500 border-l-4 border-transparent hover:border-blue-500 pr-6">
					<span class="inline-flex justify-center items-center ml-4">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
						</svg>
					</span>
                        <span class="ml-2 text-sm tracking-wide truncate">Ustawienia konta</span>
                    </a>
                </li>
                @can('isAdmin')
                <li>
                    <a href="{{ route('admin.website_settings') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-blue-500 border-l-4 border-transparent hover:border-blue-500 pr-6">
					<span class="inline-flex justify-center items-center ml-4">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
						</svg>
					</span>
                        <span class="ml-2 text-sm tracking-wide truncate">Ustawienia strony</span>
                    </a>
                </li>
                @endcan
                <li>
                    <a onclick="event.preventDefault(); document.getElementById('nav-logout-form').submit()" href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-red-50 text-gray-600 hover:text-red-500 border-l-4 border-transparent hover:border-red-500 pr-6">
					<span class="inline-flex justify-center items-center ml-4">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
						</svg>
					</span>
                        <span class="ml-2 text-sm tracking-wide truncate">Wyloguj</span>
                    </a>
                    <form id="nav-logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</section>
@endauth
