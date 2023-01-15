<div class="text-base font-semibold leading-5 pb-16">
    <div class="container mx-auto md:px-4 mt-6">
        <div class="flex-1 sm:pr-5 overflow-hidden">
            <ul class="flex text-sm font-medium text-center text-neutral-500 dark:text-neutral-400 overflow-x-auto hiddenScrollbar">
                <li class="mr-2">
                    <a wire:click="setTab('quizzes')"  class="inline-block px-5 py-2.5 rounded-full cursor-pointer {{ ($this->tab == 'quizzes') ? 'text-white bg-cyan-900' : 'hover:text-neutral-900 hover:bg-neutral-100' }}">Quizy</a>
                </li>
                <li class="mr-2">
                    <a wire:click="setTab('comments')" class="inline-block px-5 py-2.5 rounded-full cursor-pointer {{ ($this->tab == 'comments') ? 'text-white bg-cyan-900' : 'hover:text-neutral-900 hover:bg-neutral-100' }}">Komentarze</a>
                </li>
                <li class="mr-2">
                    <a wire:click="setTab('liked_quizzes')" class="inline-block px-5 py-2.5 rounded-full cursor-pointer {{ ($this->tab == 'liked_quizzes') ? 'text-white bg-cyan-900' : 'hover:text-neutral-900 hover:bg-neutral-100' }}">Polubione</a>
                </li>
                <li class="mr-2">
                    <a wire:click="setTab('pending_quizzes')" class="inline-block px-5 py-2.5 rounded-full cursor-pointer {{ ($this->tab == 'pending_quizzes') ? 'text-white bg-cyan-900' : 'hover:text-neutral-900 hover:bg-neutral-100' }}">Oczekujące</a>
                </li>
            </ul>

            @if($tab == 'quizzes')
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-2.5 gap-y-4 sm:gap-6 2xl:gap-8 mt-8 lg:mt-10">
                    @forelse($this->quizzes as $quiz)
                    <div class="relative flex flex-col group border border-neutral-200 rounded-2xl h-full">
                        <a href="{{ route('quiz_show', $quiz->slug) }}" class="block absolute inset-0"></a>
                        <div class="block flex-shrink-0 relative w-full rounded-t-xl overflow-hidden z-0 aspect-w-8 aspect-h-5 sm:aspect-w-4 sm:aspect-h-3">
                            <div>
                                <div class="relative w-full h-full">
                                    <a href="{{ route('quiz_show', $quiz->slug) }}" class="absolute inset-0 group-hover:opacity-90 transition-opacity">
                                        <div class="absolute inset-0 overflow-hidden">
                                            <img src="{{ isset($quiz->image->path) ? asset($quiz->image->path) : asset("uploads/images/no-image.jpg") }}" alt="{{ $quiz->title }}" class="object-cover w-full h-full">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="absolute top-3 inset-x-3">
                            <div class="flow-root">
                                <div class="flex flex-wrap space-x-2 -my-1">
                                    <a href="{{route('index', ['category' => $quiz->category->slug ])}}" class="transition-colors hover:text-white duration-300 inline-flex px-2.5 py-1 rounded-full font-medium text-xs relative my-1 text-slate-200 bg-[{{$quiz->category->color}}] hover:bg-[{{ $quiz->category->color  }}] saturate-50 hover:saturate-100">{{ $quiz->category->title }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 h-full flex flex-col flex-grow">
                            <div class="inline-flex items-center text-neutral-800 dark:text-neutral-200 overflow-hidden text-xs leading-none">
                                <a href="{{ route('user_profile', $quiz->user->username) }}" class="flex-shrink-0 relative flex items-center space-x-2 ">
                                    <div class="relative flex-shrink-0 inline-flex items-center justify-center overflow-hidden rounded-full h-5 w-5 sm:h-7 sm:w-7">
                                        <img class="absolute inset-0 w-full h-full object-cover" src="{{ isset($quiz->user->avatar) ? asset($quiz->user->avatar) : asset("img/user-default.png") }}" alt="{{ $quiz->user->username }}" >
                                    </div>
                                    <span class="block text-neutral-700 hover:text-black dark:text-neutral-300 dark:hover:text-white font-medium ">
                                        <span class="line-clamp-1"> {{ empty($quiz->user->display_username) ?  $quiz->user->username : $quiz->user->display_username }}</span>
                                    </span>
                                </a>
                                <span class="text-neutral-500 dark:text-neutral-400 mx-[6px] font-medium">·</span>
                                <span class="text-neutral-500 dark:text-neutral-400 font-normal">
                                    <span class="line-clamp-1">{{ $quiz->created_at->translatedFormat('d M Y') }}</span>
                                </span>
                            </div>
                            <h3 class="block text-base font-semibold text-neutral-900 dark:text-neutral-100 my-3">
                                <a href="{{ route('quiz_show', $quiz->slug) }}" class="line-clamp-2" title="{{ $quiz->title }}">{{ $quiz->title }}</a>
                            </h3>
                            <div class="flex justify-between mt-auto items-center space-x-2 sm:space-x-2.5 space-y-0.5 sm:space-y-0">
                                <div class="flex items-center">
                                    <div class="relative flex items-center min-w-[68px] rounded-full text-neutral-600 bg-neutral-100 transition-colors dark:text-neutral-200 dark:bg-neutral-800 px-2 h-7 sm:h-8 text-xs sm:text-sm focus:outline-none" title="Views">
                                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M19.25 12C19.25 13 17.5 18.25 12 18.25C6.5 18.25 4.75 13 4.75 12C4.75 11 6.5 5.75 12 5.75C17.5 5.75 19.25 11 19.25 12Z"></path>
                                            <circle cx="12" cy="12" r="2.25" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"></circle>
                                        </svg>
                                        <span class="ml-1">{{ $quiz->views }}</span>
                                    </div>
                                    <a href="#" class="relative items-center min-w-[68px] rounded-full text-neutral-600 bg-neutral-100 transition-colors dark:text-neutral-200 dark:bg-neutral-800 hover:bg-teal-50 dark:hover:bg-teal-100 hover:text-teal-600 dark:hover:text-teal-500 flex px-2 h-7 sm:h-8 text-xs sm:text-sm focus:outline-none" title="Komentarze">
                                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.75 6.75C4.75 5.64543 5.64543 4.75 6.75 4.75H17.25C18.3546 4.75 19.25 5.64543 19.25 6.75V14.25C19.25 15.3546 18.3546 16.25 17.25 16.25H14.625L12 19.25L9.375 16.25H6.75C5.64543 16.25 4.75 15.3546 4.75 14.25V6.75Z"></path>
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M9.5 11C9.5 11.2761 9.27614 11.5 9 11.5C8.72386 11.5 8.5 11.2761 8.5 11C8.5 10.7239 8.72386 10.5 9 10.5C9.27614 10.5 9.5 10.7239 9.5 11Z"></path>
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M12.5 11C12.5 11.2761 12.2761 11.5 12 11.5C11.7239 11.5 11.5 11.2761 11.5 11C11.5 10.7239 11.7239 10.5 12 10.5C12.2761 10.5 12.5 10.7239 12.5 11Z"></path>
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M15.5 11C15.5 11.2761 15.2761 11.5 15 11.5C14.7239 11.5 14.5 11.2761 14.5 11C14.5 10.7239 14.7239 10.5 15 10.5C15.2761 10.5 15.5 10.7239 15.5 11Z"></path>
                                        </svg>
                                        <span class="ml-1 hover:text-teal-600"> {{ $quiz->comments->count() }} </span>
                                    </a>
                                </div>
                                <div class="flex items-center justify-center relative sm:min-w-[68px] rounded-full text-neutral-600 bg-neutral-100 transition-colors hover:bg-red-100 hover:text-red-600 px-2 h-7 sm:h-8 text-xs sm:text-sm focus:outline-none">
                                    <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11.995 7.23319C10.5455 5.60999 8.12832 5.17335 6.31215 6.65972C4.49599 8.14609 4.2403 10.6312 5.66654 12.3892L11.995 18.25L18.3235 12.3892C19.7498 10.6312 19.5253 8.13046 17.6779 6.65972C15.8305 5.18899 13.4446 5.60999 11.995 7.23319Z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="ml-1"> {{ $quiz->votes}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        @include('shared.nothing-we-found')
                    @endforelse
                </div>
                <div class="p-3 border-t border-gray-100">
                    {{ $this->quizzes->links('shared.pagination') }}
                </div>
            @endif

            @if($tab == 'comments')
            <div class="max-w-screen-md my-10 font-normal text-base">
                <div class="px-4 py-6 sm:px-0 space-y-4">
                        @forelse($this->comments as $comment)
                                <div class="flex">
                                    <a href="{{ route('user_profile', ['username' => $comment->user->username ]) }}"  class="flex-shrink-0 mr-4">
                                        <div class="relative overflow-hidden rounded-full h-5 w-5 sm:h-7 sm:w-7 mt-1">
                                            <img class="absolute inset-0 w-full h-full object-cover" src="{{ isset($comment->user->avatar) ? asset($comment->user->avatar) : asset("img/user-default.png") }}" alt="{{ $comment->user->username }}" >
                                        </div>
                                    </a>
                                    <div class="flex-grow">
                                        <div class="border rounded-2xl p-3">
                                            <div class="flex items-center">
                                                <a href="{{ route('user_profile', ['username' => $comment->user->username ]) }}" class="font-semibold text-gray-900 after:mx-2 after:content-['•'] after:text-gray-400 after:text-xs">
                                                    @if(empty($comment->user->display_username))
                                                        {{ $comment->user->username }}
                                                    @else
                                                        {{ $comment->user->display_username }}
                                                    @endif
                                                </a>
                                                <span class="text-neutral-500 line-clamp-1 text-xs sm:text-sm">
                                                    {{ $comment->presenter()->relativeCreatedAt() }}
                                                </span>
                                            </div>
                                            <div class="mt-1 flex-grow w-full">
                                                <p class="text-gray-700">{{ $comment->body }} </p>
                                            </div>
                                        </div>
                                        <div class="flex items-center text-neutral-700 text-sm p-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-4 w-4 mr-3 mb-1">
                                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path d="M340.7 443.3C334.4 437.1 334.4 426.9 340.7 420.7L457.4 304H80C35.87 304 0 268.1 0 223.1V48C0 39.16 7.156 32 16 32C24.84 32 32 39.16 32 48V224C32 250.5 53.53 272 80 272H457.4L340.7 155.3C334.4 149.1 334.4 138.9 340.7 132.7C346.9 126.4 357.1 126.4 363.3 132.7L507.3 276.7C510.4 279.8 512 283.9 512 288C512 292.1 510.4 296.2 507.3 299.3L363.3 443.3C357.1 449.6 346.9 449.6 340.7 443.3V443.3z"></path>
                                            </svg>
                                            <a href="{{ route('quiz_show', $comment->commentable->slug) }}" class="flex items-center space-x-2">
                                                <div class="relative overflow-hidden rounded-full h-6 w-6">
                                                    <img class="absolute inset-0 w-full h-full object-cover" src="{{ isset($comment->commentable->image) ? asset($comment->commentable->image->path) : asset("uploads/images/no-image.jpg") }}" alt="{{ $comment->commentable->title }}">
                                                </div>
                                            </a>
                                            <div class="ml-3">
                                                <div class="flex items-center">
                                                    <a class="block font-semibold" href="{{ route('quiz_show', $comment->commentable->slug) }}"> {{ $comment->commentable->title }} </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @empty
                            @include('shared.nothing-we-found')
                        @endforelse
                </div>
            </div>
            @endif

            @if($tab == 'liked_quizzes')
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-2.5 gap-y-4 sm:gap-6 2xl:gap-8 mt-8 lg:mt-10">
                    @forelse($this->liked_quizzes as $quiz)
                    <div class="relative flex flex-col group border border-neutral-200 rounded-2xl h-full">
                        <a href="{{ route('quiz_show', $quiz->slug) }}" class="block absolute inset-0"></a>
                        <div class="block flex-shrink-0 relative w-full rounded-t-xl overflow-hidden z-0 aspect-w-8 aspect-h-5 sm:aspect-w-4 sm:aspect-h-3">
                            <div>
                                <div class="relative w-full h-full">
                                    <a href="{{ route('quiz_show', $quiz->slug) }}" class="absolute inset-0 group-hover:opacity-90 transition-opacity">
                                        <div class="absolute inset-0 overflow-hidden">
                                            <img src="{{ isset($quiz->image->path) ? asset($quiz->image->path) : asset("uploads/images/no-image.jpg") }}" alt="{{ $quiz->title }}" class="object-cover w-full h-full">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="absolute top-3 inset-x-3">
                            <div class="flow-root">
                                <div class="flex flex-wrap space-x-2 -my-1">
                                    <a href="{{route('index', ['category' => $quiz->category->slug ])}}" class="transition-colors hover:text-white duration-300 inline-flex px-2.5 py-1 rounded-full font-medium text-xs relative my-1 text-slate-200 bg-[{{$quiz->category->color}}] hover:bg-[{{ $quiz->category->color  }}] saturate-50 hover:saturate-100">{{ $quiz->category->title }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 h-full flex flex-col flex-grow">
                            <div class="inline-flex items-center text-neutral-800 dark:text-neutral-200 overflow-hidden text-xs leading-none">
                                <a href="{{ route('user_profile', $quiz->user->username) }}" class="flex-shrink-0 relative flex items-center space-x-2 ">
                                    <div class="relative flex-shrink-0 inline-flex items-center justify-center overflow-hidden z-0 text-neutral-100 uppercase font-semibold shadow-inner rounded-full h-5 w-5 sm:h-7 sm:w-7 text-xs sm:text-sm ring-1 ring-white/80 dark:ring-neutral-900">
                                        <img class="absolute inset-0 w-full h-full object-cover" src="{{ isset($quiz->user->avatar) ? asset($quiz->user->avatar) : asset("img/user-default.png") }}" alt="{{ $quiz->user->username }}" >
                                    </div>
                                    <span class="block text-neutral-700 hover:text-black dark:text-neutral-300 dark:hover:text-white font-medium ">
                                        <span class="line-clamp-1"> {{ empty($quiz->user->display_username) ?  $quiz->user->username : $quiz->user->display_username }}</span>
                                    </span>
                                </a>
                                <span class="text-neutral-500 dark:text-neutral-400 mx-[6px] font-medium">·</span>
                                <span class="text-neutral-500 dark:text-neutral-400 font-normal">
                                    <span class="line-clamp-1">{{ $quiz->created_at->translatedFormat('d M Y') }}</span>
                                </span>
                            </div>
                            <h3 class="block text-base font-semibold text-neutral-900 dark:text-neutral-100 my-3">
                                <a href="{{ route('quiz_show', $quiz->slug) }}" class="line-clamp-2" title="{{ $quiz->title }}">{{ $quiz->title }}</a>
                            </h3>
                            <div class="flex justify-between mt-auto items-center space-x-2 sm:space-x-2.5 space-y-0.5 sm:space-y-0">
                                <div class="flex items-center">
                                    <div class="relative flex items-center min-w-[68px] rounded-full text-neutral-600 bg-neutral-100 transition-colors dark:text-neutral-200 dark:bg-neutral-800 px-2 h-7 sm:h-8 text-xs sm:text-sm focus:outline-none" title="Views">
                                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M19.25 12C19.25 13 17.5 18.25 12 18.25C6.5 18.25 4.75 13 4.75 12C4.75 11 6.5 5.75 12 5.75C17.5 5.75 19.25 11 19.25 12Z"></path>
                                            <circle cx="12" cy="12" r="2.25" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"></circle>
                                        </svg>
                                        <span class="ml-1">{{ $quiz->views }}</span>
                                    </div>
                                    <a href="#" class="relative items-center min-w-[68px] rounded-full text-neutral-600 bg-neutral-100 transition-colors dark:text-neutral-200 dark:bg-neutral-800 hover:bg-teal-50 dark:hover:bg-teal-100 hover:text-teal-600 dark:hover:text-teal-500 flex px-2 h-7 sm:h-8 text-xs sm:text-sm focus:outline-none" title="Komentarze">
                                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.75 6.75C4.75 5.64543 5.64543 4.75 6.75 4.75H17.25C18.3546 4.75 19.25 5.64543 19.25 6.75V14.25C19.25 15.3546 18.3546 16.25 17.25 16.25H14.625L12 19.25L9.375 16.25H6.75C5.64543 16.25 4.75 15.3546 4.75 14.25V6.75Z"></path>
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M9.5 11C9.5 11.2761 9.27614 11.5 9 11.5C8.72386 11.5 8.5 11.2761 8.5 11C8.5 10.7239 8.72386 10.5 9 10.5C9.27614 10.5 9.5 10.7239 9.5 11Z"></path>
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M12.5 11C12.5 11.2761 12.2761 11.5 12 11.5C11.7239 11.5 11.5 11.2761 11.5 11C11.5 10.7239 11.7239 10.5 12 10.5C12.2761 10.5 12.5 10.7239 12.5 11Z"></path>
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M15.5 11C15.5 11.2761 15.2761 11.5 15 11.5C14.7239 11.5 14.5 11.2761 14.5 11C14.5 10.7239 14.7239 10.5 15 10.5C15.2761 10.5 15.5 10.7239 15.5 11Z"></path>
                                        </svg>
                                        <span class="ml-1 hover:text-teal-600"> {{ $quiz->comments->count() }} </span>
                                    </a>
                                </div>
                                <div class="flex items-center justify-center relative sm:min-w-[68px] rounded-full text-neutral-600 bg-neutral-100 transition-colors hover:bg-red-100 hover:text-red-600 px-2 h-7 sm:h-8 text-xs sm:text-sm focus:outline-none">
                                    <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11.995 7.23319C10.5455 5.60999 8.12832 5.17335 6.31215 6.65972C4.49599 8.14609 4.2403 10.6312 5.66654 12.3892L11.995 18.25L18.3235 12.3892C19.7498 10.6312 19.5253 8.13046 17.6779 6.65972C15.8305 5.18899 13.4446 5.60999 11.995 7.23319Z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="ml-1"> {{ $quiz->votes}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        @include('shared.nothing-we-found')
                    @endforelse
                </div>
                {{ $this->liked_quizzes->links('shared.pagination') }}
            @endif

            @if($tab == 'pending_quizzes')
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-2.5 gap-y-4 sm:gap-6 2xl:gap-8 mt-8 lg:mt-10">
                    @forelse($this->pending_quizzes as $quiz)
                    <div class="relative flex flex-col group border border-neutral-200 rounded-2xl h-full">
                        <a href="{{ route('quiz_show', $quiz->slug) }}" class="block absolute inset-0"></a>
                        <div class="block flex-shrink-0 relative w-full rounded-t-xl overflow-hidden z-0 aspect-w-8 aspect-h-5 sm:aspect-w-4 sm:aspect-h-3">
                            <div>
                                <div class="relative w-full h-full">
                                    <a href="{{ route('quiz_show', $quiz->slug) }}" class="absolute inset-0 group-hover:opacity-90 transition-opacity">
                                        <div class="absolute inset-0 overflow-hidden">
                                            <img src="{{ isset($quiz->image->path) ? asset($quiz->image->path) : asset("uploads/images/no-image.jpg") }}" alt="{{ $quiz->title }}" class="object-cover w-full h-full">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="absolute top-3 inset-x-3">
                            <div class="flow-root">
                                <div class="flex flex-wrap space-x-2 -my-1">
                                    <a href="{{route('index', ['category' => $quiz->category->slug ])}}" class="transition-colors hover:text-white duration-300 inline-flex px-2.5 py-1 rounded-full font-medium text-xs relative my-1 text-slate-200 bg-[{{$quiz->category->color}}] hover:bg-[{{ $quiz->category->color  }}] saturate-50 hover:saturate-100">{{ $quiz->category->title }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 h-full flex flex-col flex-grow">
                            <div class="inline-flex items-center text-neutral-800 dark:text-neutral-200 overflow-hidden text-xs leading-none">
                                <a href="{{ route('user_profile', $quiz->user->username) }}" class="flex-shrink-0 relative flex items-center space-x-2 ">
                                    <div class="relative flex-shrink-0 inline-flex items-center justify-center overflow-hidden z-0 text-neutral-100 uppercase font-semibold shadow-inner rounded-full h-5 w-5 sm:h-7 sm:w-7 text-xs sm:text-sm ring-1 ring-white/80 dark:ring-neutral-900">
                                        <img class="absolute inset-0 w-full h-full object-cover" src="{{ isset($quiz->user->avatar) ? asset($quiz->user->avatar) : asset("img/user-default.png") }}" alt="{{ $quiz->user->username }}" >
                                    </div>
                                    <span class="block text-neutral-700 hover:text-black dark:text-neutral-300 dark:hover:text-white font-medium ">
                                        <span class="line-clamp-1"> {{ empty($quiz->user->display_username) ?  $quiz->user->username : $quiz->user->display_username }}</span>
                                    </span>
                                </a>
                                <span class="text-neutral-500 dark:text-neutral-400 mx-[6px] font-medium">·</span>
                                <span class="text-neutral-500 dark:text-neutral-400 font-normal">
                                    <span class="line-clamp-1">{{ $quiz->created_at->translatedFormat('d M Y') }}</span>
                                </span>
                            </div>
                            <h3 class="block text-base font-semibold text-neutral-900 dark:text-neutral-100 my-3">
                                <a href="{{ route('quiz_show', $quiz->slug) }}" class="line-clamp-2" title="{{ $quiz->title }}">{{ $quiz->title }}</a>
                            </h3>
                            <div class="flex justify-between mt-auto items-center space-x-2 sm:space-x-2.5 space-y-0.5 sm:space-y-0">
                                <div class="flex items-center">
                                    <div class="relative flex items-center min-w-[68px] rounded-full text-neutral-600 bg-neutral-100 transition-colors dark:text-neutral-200 dark:bg-neutral-800 px-2 h-7 sm:h-8 text-xs sm:text-sm focus:outline-none" title="Views">
                                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M19.25 12C19.25 13 17.5 18.25 12 18.25C6.5 18.25 4.75 13 4.75 12C4.75 11 6.5 5.75 12 5.75C17.5 5.75 19.25 11 19.25 12Z"></path>
                                            <circle cx="12" cy="12" r="2.25" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"></circle>
                                        </svg>
                                        <span class="ml-1">{{ $quiz->views }}</span>
                                    </div>
                                    <a href="#" class="relative items-center min-w-[68px] rounded-full text-neutral-600 bg-neutral-100 transition-colors dark:text-neutral-200 dark:bg-neutral-800 hover:bg-teal-50 dark:hover:bg-teal-100 hover:text-teal-600 dark:hover:text-teal-500 flex px-2 h-7 sm:h-8 text-xs sm:text-sm focus:outline-none" title="Komentarze">
                                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.75 6.75C4.75 5.64543 5.64543 4.75 6.75 4.75H17.25C18.3546 4.75 19.25 5.64543 19.25 6.75V14.25C19.25 15.3546 18.3546 16.25 17.25 16.25H14.625L12 19.25L9.375 16.25H6.75C5.64543 16.25 4.75 15.3546 4.75 14.25V6.75Z"></path>
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M9.5 11C9.5 11.2761 9.27614 11.5 9 11.5C8.72386 11.5 8.5 11.2761 8.5 11C8.5 10.7239 8.72386 10.5 9 10.5C9.27614 10.5 9.5 10.7239 9.5 11Z"></path>
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M12.5 11C12.5 11.2761 12.2761 11.5 12 11.5C11.7239 11.5 11.5 11.2761 11.5 11C11.5 10.7239 11.7239 10.5 12 10.5C12.2761 10.5 12.5 10.7239 12.5 11Z"></path>
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M15.5 11C15.5 11.2761 15.2761 11.5 15 11.5C14.7239 11.5 14.5 11.2761 14.5 11C14.5 10.7239 14.7239 10.5 15 10.5C15.2761 10.5 15.5 10.7239 15.5 11Z"></path>
                                        </svg>
                                        <span class="ml-1 hover:text-teal-600"> {{ $quiz->comments->count() }} </span>
                                    </a>
                                </div>
                                <div class="flex items-center justify-center relative sm:min-w-[68px] rounded-full text-neutral-600 bg-neutral-100 transition-colors hover:bg-red-100 hover:text-red-600 px-2 h-7 sm:h-8 text-xs sm:text-sm focus:outline-none">
                                    <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11.995 7.23319C10.5455 5.60999 8.12832 5.17335 6.31215 6.65972C4.49599 8.14609 4.2403 10.6312 5.66654 12.3892L11.995 18.25L18.3235 12.3892C19.7498 10.6312 19.5253 8.13046 17.6779 6.65972C15.8305 5.18899 13.4446 5.60999 11.995 7.23319Z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="ml-1"> {{ $quiz->votes}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        @include('shared.nothing-we-found')
                    @endforelse
                </div>
                {{ $this->pending_quizzes->links('shared.pagination') }}
            @endif
        </div>
    </div>
</div>
