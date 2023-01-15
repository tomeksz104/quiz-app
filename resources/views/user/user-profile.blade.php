@extends('layout/main')

@section('title', isset($user->display_username) ? 'Profil użytkownika '.$user->display_username : 'Profil użytkownika '.$user->username )

@section('content')
    <div class="relative pt-8">
        <div class="bg-blue-50 absolute top-0 inset-x-0 h-60 w-full"></div>
        <header class="container relative">
            <div class="relative bg-white dark:bg-neutral-800 dark:border dark:border-neutral-700 p-4 sm:p-5 lg:p-8 rounded-3xl lg:rounded-[32px] shadow-xl flex flex-col sm:flex-row sm:items-center">
                <div class="flex-shrink-0 mx-auto self-start w-48 h-48 rounded-full inline-flex items-center justify-center overflow-hidden z-0 shadow-2xl ring-4 ring-white group" style="background-color: rgb(224, 31, 61);">
                    @if(!empty($user->avatar))
                        <img class="w-full h-full object-cover group-hover:scale-105 transform transition-transform" src="{{ asset($user->avatar) }}">
                    @else
                        <span class="text-white uppercase font-semibold text-3xl xl:text-5xl">
                            @if(empty($user->display_username))
                                {{ substr($user->username, 0, 2) }}
                            @else
                                {{ substr($user->display_username, 0, 2) }}
                            @endif
                        </span>
                    @endif
                </div>
                <div class="flex-grow mt-5 sm:mt-0 sm:ml-8 space-y-3">
                    <h1 class="flex justify-center sm:justify-start text-2xl sm:text-2xl lg:text-4xl font-bold lg:font-semibold">
                        @if(empty($user->display_username))
                            {{ $user->username }}
                        @else
                            {{ $user->display_username }}
                        @endif
                    </h1>
                    <span class="block text-sm text-neutral-500 dark:text-neutral-400">
                        @if(!empty($user->bio))
                            {{ $user->bio }}
                        @endif
                    </span>

                    <nav class="nc-SocialsList flex flex-wrap text-2xl text-neutral-6000 dark:text-neutral-300 ">
                        @if(!empty($user->youtube))
                        <a class="block w-7 h-7 mr-2.5 my-0.5" href="{{ $user->youtube }}" target="_blank" rel="noopener noreferrer" title="Youtube">
                            <img src="{{ asset('img/socialmedia-icons/youtube.png') }}" alt="Youtube">
                        </a>
                        @endif
                        @if(!empty($user->facebook))
                        <a class="block w-7 h-7 mr-2.5 my-0.5" href="{{ $user->facebook }}" target="_blank" rel="noopener noreferrer" title="Facebook">
                            <img src="{{ asset('img/socialmedia-icons/facebook.png') }}" alt="Facebook">
                        </a>
                        @endif
                        @if(!empty($user->twitter))
                        <a class="block w-7 h-7 mr-2.5 my-0.5" href="{{ $user->twitter }}" target="_blank" rel="noopener noreferrer" title="Twitter">
                            <img src="{{ asset('img/socialmedia-icons/twitter.png') }}" alt="Twitter">
                        </a>
                        @endif
                        @if(!empty($user->instagram))
                        <a class="block w-7 h-7 mr-2.5 my-0.5" href="{{ $user->instagram }}" target="_blank" rel="noopener noreferrer" title="Instagram">
                            <img src="{{ asset('img/socialmedia-icons/instagram.png') }}" alt="Instagram">
                        </a>
                        @endif
                        @if(!empty($user->twitch))
                        <a class="block w-7 h-7 mr-2.5 my-0.5" href="{{ $user->twitch }}" target="_blank" rel="noopener noreferrer" title="Twitch">
                            <img src="{{ asset('img/socialmedia-icons/twitch.png') }}" alt="Twitch">
                        </a>
                        @endif
                    </nav>

                    <div class="grid grid-cols md:grid-cols-4 gap-4">
                        <div class="flex items-center px-5 py-6 rounded-xl border border-neutral-200 ">
                            <div class="p-3 rounded-full bg-orange-600 bg-opacity-50">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z"></path>
                                </svg>
                            </div>
                            <div class="mx-5">
                                <h4 class="text-2xl font-semibold text-gray-700">{{ $user->quizzes_count }}</h4>
                                <div class="text-gray-500">quizy</div>
                            </div>
                        </div>
                        <div class="flex items-center px-5 py-6 rounded-xl border border-neutral-200 ">
                            <div class="p-3 rounded-full bg-lime-600 bg-opacity-50">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="h-8 w-8 fill-white">
                                    <path d="M 16 3 C 8.800781 3 3 8.800781 3 16 C 3 23.199219 8.800781 29 16 29 C 23.199219 29 29 23.199219 29 16 C 29 14.601563 28.8125 13.207031 28.3125 11.90625 L 26.6875 13.5 C 26.886719 14.300781 27 15.101563 27 16 C 27 22.101563 22.101563 27 16 27 C 9.898438 27 5 22.101563 5 16 C 5 9.898438 9.898438 5 16 5 C 19 5 21.695313 6.195313 23.59375 8.09375 L 25 6.6875 C 22.699219 4.386719 19.5 3 16 3 Z M 27.28125 7.28125 L 16 18.5625 L 11.71875 14.28125 L 10.28125 15.71875 L 15.28125 20.71875 L 16 21.40625 L 16.71875 20.71875 L 28.71875 8.71875 Z"></path>
                                </svg>
                            </div>
                            <div class="mx-5">
                                <h4 class="text-2xl font-semibold text-gray-700">{{ $user->results_count }}</h4>
                                <div class="text-gray-500">rozwiązanych</div>
                            </div>
                        </div>
                        <div class="flex items-center px-5 py-6 rounded-xl border border-neutral-200 ">
                            <div class="p-3 rounded-full bg-pink-600 bg-opacity-50">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z"></path>
                                </svg>
                            </div>
                            <div class="mx-5">
                                <h4 class="text-2xl font-semibold text-gray-700">

                                    {{ empty($percentage_of_correct_answers) ? '-' : $percentage_of_correct_answers.'%' }}
                                </h4>
                                <div class="text-gray-500">skuteczność</div>
                            </div>
                        </div>
                        <div class="flex items-center px-5 py-6 rounded-xl border border-neutral-200 ">
                            <div class="p-3 rounded-full bg-indigo-600 bg-opacity-50">
                                <svg class="h-8 w-8 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                    <path d="M 16 4 C 11.832031 4 8.152344 6.113281 6 9.34375 L 6 6 L 4 6 L 4 13 L 11 13 L 11 11 L 7.375 11 C 9.101563 8.019531 12.296875 6 16 6 C 21.535156 6 26 10.464844 26 16 C 26 21.535156 21.535156 26 16 26 C 10.464844 26 6 21.535156 6 16 L 4 16 C 4 22.617188 9.382813 28 16 28 C 22.617188 28 28 22.617188 28 16 C 28 9.382813 22.617188 4 16 4 Z M 15 8 L 15 17 L 22 17 L 22 15 L 17 15 L 17 8 Z"></path>
                                </svg>
                            </div>
                            <div class="mx-5">
                                <h4 class="text-2xl font-semibold text-gray-700">{{ $user->comments_count }}</h4>
                                <div class="text-gray-500">komentarzy</div>
                            </div>
                        </div>
                    </div>
                </div>
                @auth
                    @if(Auth()->user()->id === $user->id)
                    <div class="flex flex-col space-y-2.5 absolute top-0 right-0 p-5 lg:p-8">
                        <a href="{{ route('account_settings') }}" class="nc-Button relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium px-3 py-2 sm:px-6  ttnc-ButtonSecondary font-medium border bg-white border-neutral-200 text-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 dark:border-neutral-700 hover:bg-neutral-100 dark:hover:bg-neutral-800 !rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-6000 dark:focus:ring-offset-0 " rel="noopener noreferrer" title="">
                            <span class="hidden lg:block">Edytuj profil</span>
                            <span class="block lg:hidden">
                                <span class="block lg:hidden">
                                    <svg class="text-2xl" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" height="1em" width="1em"><path fill="currentColor" d="M13 3c-3.855 0-7 3.145-7 7c0 2.41 1.23 4.55 3.094 5.813C5.527 17.343 3 20.883 3 25h2c0-4.43 3.57-8 8-8c2.145 0 4.063.879 5.5 2.25l-4.719 4.719l-.062.312l-.688 3.532l-.312 1.468l1.469-.312l3.53-.688l.313-.062l10.094-10.094c1.16-1.16 1.16-3.09 0-4.25a3.018 3.018 0 0 0-4.219-.031l-3.968 3.969a10.103 10.103 0 0 0-3.032-2A7.024 7.024 0 0 0 20 10c0-3.855-3.145-7-7-7zm0 2c2.773 0 5 2.227 5 5s-2.227 5-5 5s-5-2.227-5-5s2.227-5 5-5zm13 10c.254 0 .52.082.719.281a.977.977 0 0 1 0 1.406l-9.688 9.688l-1.781.375l.375-1.781l9.688-9.688A.934.934 0 0 1 26 15z"></path></svg>
                                </span>
                            </span>
                        </a>
                    </div>
                    @endif
                @endauth
            </div>
        </header>
    </div>

    <livewire:user.user-profile-tabs :user_id="$user->id"/>
@endsection
