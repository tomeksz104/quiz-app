<div x-transition:enter="transition duration-300 ease-in-out" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300 ease-in-out"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-show="isMobileMainMenuOpen"
    @click="isMobileMainMenuOpen = false" class="fixed inset-0 z-10 bg-neutral-800" style="opacity: 0.5" aria-hidden="true"
    x-cloak></div>
<section x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
    x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
    x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" x-ref="MobileMainMenu"
    x-show="isMobileMainMenuOpen" tabindex="-1" aria-labelledby="MobileMainMenuLabel"
    class="fixed inset-y-0 z-20 w-full max-w-sm bg-white dark:bg-darker dark:text-light focus:outline-none" x-cloak>
    <div class="flex flex-col h-screen" x-data="{ activeTabe: 'action' }">
        <div class="flex items-center justify-between h-14 px-5 border-b">
            <h3 class="text-xl font-semibold py-3">
                Menu
            </h3>
            <button @click="isMobileMainMenuOpen = false" class="p-2 text-slate-500 hover:bg-slate-100 rounded-full">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
        <div class="overflow-y-auto overflow-x-hidden flex flex-col h-full">
            <ul class="flex-1 flex-col p-4 space-y-5">
                <li>
                    <a href="{{ route('index') }}" class="flex items-center space-x-2 transition-colors rounded-lg group hover:bg-blue-600 hover:text-white {{ Route::is('index') ? 'bg-blue-600 text-white' : 'text-blue-600'}}">
                        <span aria-hidden="true" class="p-2 transition-colors rounded-lg {{ Route::is('index') ? 'bg-blue-700 text-white' : 'group-hover:bg-blue-700 group-hover:text-white'}}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                        </span>
                        <span>Strona Główna</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories_list') }}" class="flex items-center space-x-2 transition-colors rounded-lg group hover:bg-blue-600 hover:text-white {{ Route::is('categories_list') ? 'bg-blue-600 text-white' : 'text-blue-600'}}">
                        <span aria-hidden="true" class="p-2 transition-colors rounded-lg {{ Route::is('categories_list') ? 'bg-blue-700 text-white' : 'group-hover:bg-blue-700 group-hover:text-white'}}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />
                            </svg>
                        </span>
                        <span>Lista kategorii</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pending_list') }}" class="flex items-center space-x-2 transition-colors rounded-lg group hover:bg-blue-600 hover:text-white {{ Route::is('pending_list') ? 'bg-blue-600 text-white' : 'text-blue-600'}}">
                        <span aria-hidden="true" class="p-2 transition-colors rounded-lg {{ Route::is('pending_list') ? 'bg-blue-700 text-white' : 'group-hover:bg-blue-700 group-hover:text-white'}}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        <span>Poczekalnia</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('select_quiz_type') }}" class="flex items-center space-x-2 transition-colors rounded-lg group hover:bg-blue-600 hover:text-white {{ Route::is('select_quiz_type') ? 'bg-blue-600 text-white' : 'text-blue-600'}}">
                        <span aria-hidden="true" class="p-2 transition-colors rounded-lg {{ Route::is('select_quiz_type') ? 'bg-blue-700 text-white' : 'group-hover:bg-blue-700 group-hover:text-white'}}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        <span>Utwórz quiz</span>
                    </a>
                </li>
            </ul>
            @guest
            <div class="mb-10 p-4 flex flex-col space-y-5">
                <a @click="isMobileMainMenuOpen = false" onclick="Livewire.emit('openModal', 'auth.login')" class="flex items-center space-x-2 transition-colors rounded-lg group bg-neutral-100 text-neutral-900 cursor-pointer">
                    <span aria-hidden="true" class="p-2 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"></path>
                        </svg>
                    </span>
                    <span>Logowanie</span>
                </a>
                <a href="{{ route('register') }}" class="flex items-center space-x-2 transition-colors rounded-lg bg-gradient-to-b from-blue-500 to-blue-600 text-white">
                    <span aria-hidden="true" class="p-2 transition-colors text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </span>
                    <span>Rejestracja</span>
                </a>
            </div>
            @endguest
        </div>
    </div>
</section>
