@extends('layout/main')

@section('title', 'Quiz: '. $quiz->title)

@section('content')
    <!-- Header -->
    <section class="container relative px-3 sm:px-0 py-14 lg:py-20 flex flex-col lg:flex-row lg:items-center">
        <div class="absolute inset-y-0 transform translate-x-1/2 right-1/2 w-screen lg:translate-x-0 lg:w-[calc(100vw/2)] bg-slate-900 lg:rounded-r-[40px]"></div>
        <div class="relative grow pb-10 lg:pb-0 lg:pr-10">
            <div class="text-neutral-100 space-y-5">
                <div class="flex flex-wrap space-x-2">
                    <span class="transition-colors hover:text-white duration-300 inline-flex px-2.5 py-1 rounded-full font-medium text-xs relative my-1 text-[10px] sm:text-xs  text-[{{ $quiz->type->color}}] bg-[{{ $quiz->type->color}}]/10 hover:bg-[{{ $quiz->type->color}}]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />
                          </svg>
                        {{ $quiz->type->title }}
                    </span>
                    <a href="{{route('index', ['category' => $quiz->category->slug ])}}" class="transition-colors hover:text-white duration-300 inline-flex px-2.5 py-1 rounded-full font-medium text-xs relative my-1 text-[10px] sm:text-xs  text-[{{ $quiz->category->color}}] bg-[{{ $quiz->category->color}}]/10 hover:bg-[{{ $quiz->category->color}}]">{{ $quiz->category->title }}</a>
                </div>
                <h1 class="font-semibold text-slate-100 text-3xl md:!leading-[120%] max-w-4xl ">{{ $quiz->title }}</h1>
                <div class="w-full text-slate-400 border-b border-slate-800 pb-5">{{ $quiz->description }}</div>
                <div class="flex flex-col space-y-5">
                    <div class="flex items-center text-slate-300 text-left text-sm leading-none flex-shrink-0">
                        <a href="{{ route('user_profile', $quiz->user->username) }}" class="flex items-center space-x-2">
                            <div class="relative flex-shrink-0 inline-flex items-center justify-center overflow-hidden text-neutral-100 uppercase font-semibold  rounded-full shadow-inner h-10 w-10 sm:h-11 sm:w-11 text-xl ring-1 ring-white dark:ring-neutral-900">
                                <img class="absolute inset-0 w-full h-full object-cover" src="{{ isset($quiz->user->avatar) ? asset($quiz->user->avatar) : asset("img/user-default.png") }}">
                            </div>
                        </a>
                        <div class="ml-3">
                            <div class="flex items-center">
                                <a class="block font-semibold" href="#">{{ isset($quiz->user->display_username) ? $quiz->user->display_username : $quiz->user->username }}</a>
                            </div>
                            <div class="text-xs mt-[6px]">
                                <span class="text-slate-300">{{ humanize_date($quiz->created_at) }}</span>
                                <span class="mx-2 font-semibold">·</span>
                                <span class="text-slate-300">
									<span></span>
									<span>{{  $quiz->questions_count }}</span>
									<span>pytań</span>
							    </span>
                            </div>
                        </div>
                    </div>
                    <div class="flex-shrink-0 flex flex-wrap flex-row space-x-2 sm:space-x-2.5 space-y-0.5 sm:space-y-0 items-center ">
                        <div class="relative sm:min-w-[68px] rounded-full text-slate-300 bg-slate-800 flex items-center justify-center mt-0.5 sm:mt-0 px-2 h-7 sm:h-8 text-xs sm:text-sm focus:outline-none" title="Views">
                            <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M19.25 12C19.25 13 17.5 18.25 12 18.25C6.5 18.25 4.75 13 4.75 12C4.75 11 6.5 5.75 12 5.75C17.5 5.75 19.25 11 19.25 12Z"></path>
                                <circle cx="12" cy="12" r="2.25" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"></circle>
                            </svg>
                            <span class="ml-1">{{ $quiz->views }}</span>
                        </div>
                        <a href="#" class="group relative sm:min-w-[68px] rounded-full text-slate-300 bg-slate-800 transition-colors hover:bg-teal-100 hover:text-teal-600 items-center justify-center px-2 h-7 sm:h-8 text-xs sm:text-sm focus:outline-none flex" title="Komentarze" >
                            <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.75 6.75C4.75 5.64543 5.64543 4.75 6.75 4.75H17.25C18.3546 4.75 19.25 5.64543 19.25 6.75V14.25C19.25 15.3546 18.3546 16.25 17.25 16.25H14.625L12 19.25L9.375 16.25H6.75C5.64543 16.25 4.75 15.3546 4.75 14.25V6.75Z"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M9.5 11C9.5 11.2761 9.27614 11.5 9 11.5C8.72386 11.5 8.5 11.2761 8.5 11C8.5 10.7239 8.72386 10.5 9 10.5C9.27614 10.5 9.5 10.7239 9.5 11Z"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M12.5 11C12.5 11.2761 12.2761 11.5 12 11.5C11.7239 11.5 11.5 11.2761 11.5 11C11.5 10.7239 11.7239 10.5 12 10.5C12.2761 10.5 12.5 10.7239 12.5 11Z"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M15.5 11C15.5 11.2761 15.2761 11.5 15 11.5C14.7239 11.5 14.5 11.2761 14.5 11C14.5 10.7239 14.7239 10.5 15 10.5C15.2761 10.5 15.5 10.7239 15.5 11Z"></path>
                            </svg>
                            <span class="ml-1 group-hover:text-teal-600"> {{ $total_comments }} </span>
                        </a>
                        <div class="sm:px-1">
                            <div class="border-l border-slate-800 h-6"></div>
                        </div>
                        <livewire:components.quiz-votes :quiz_id="$quiz->id" :dark_mode="1"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative lg:w-7/12 h-[450px] flex-shrink-0">
            <div class="absolute inset-0 border-4 border-white rounded-2xl overflow-hidden h-full w-full">
                <div class="w-full h-full flex items-center justify-center bg-center bg-cover cursor-pointer" style="background-image: url('{{ isset($quiz->image->path) ? asset($quiz->image->path) : asset("uploads/images/no-image.jpg") }}');">
                <a href="{{ route('take-quiz', $quiz->id) }}" class="rounded-full w-20 h-20 p-3 lg:w-52 lg:h-52 lg:p-12 ">
                    <div class="pulsePlayQuizShadow w-full h-full bg-white rounded-full text-primary-500 relative">
                        <span class="hover:scale-105 transform transition-transform absolute inset-0 flex items-center justify-center">
                            <svg class="w-8 h-8 md:w-12 md:h-12 fill-blue-500 text-blue-500" width="24" height="24" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.25 12L5.75 5.75V18.25L18.25 12Z"></path>
                            </svg>
                        </span>
                    </div>
                </a>
            </div>
        </div>
        </div>
    </section>
    <livewire:comments.comments :model="$quiz" :quiz_title="$quiz->title" :total_comments="$total_comments"/>
    <div class="bg-neutral-50">
        <div class="container mx-auto py-10">
            <div class="relative flex flex-col sm:flex-row sm:items-end justify-between mb-8 text-neutral-900">
                <div class="flex justify-between items-center">
                    <div class="ml-3">
                        <h3 class="text-2xl sm:text-3xl md:text-4xl font-semibold">Może Ci się spodobać 🧬</h3>
                        <span class="mt-2 md:mt-3 font-normal block text-base md:text-xl text-neutral-500 dark:text-neutral-400">Odkryj najlepsze quizy</span>
                    </div>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-8 px-3 sm:px-0">
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-5 md:gap-7">
                    @foreach($otherQuizzes as $quiz)
                    <div class="relative flex flex-col group rounded-2xl sm:rounded-3xl overflow-hidden z-0 h-full">
                        <a href="{{ route('quiz_show', $quiz->slug) }}" class="flex items-start relative w-full aspect-w-4 aspect-h-3 sm:aspect-w-1 sm:aspect-h-1">
                            <div class="absolute inset-0 overflow-hidden z-0 overflow-hidden z-0">
                                <img src="{{ isset($quiz->image->path) ? asset($quiz->image->path) : asset("uploads/images/no-image.jpg") }}" alt="{{ $quiz->title }}" class="object-cover w-full h-full rounded-2xl sm:rounded-3xl">
                            </div>
                            <span class="absolute inset-0 bg-black/30">
			                    <div class="absolute top-4 right-4"></div>
		                    </span>
                        </a>
                        <div class="hidden absolute top-3 inset-x-3 sm:flex justify-between items-start space-x-4 z-10">
                            <div class="flow-root">
                                <div class="flex flex-wrap space-x-2 -my-1 ">
                                    <a href="{{route('index', ['category' => $quiz->category->slug ])}}" class="transition-colors hover:text-white duration-300 inline-flex px-2.5 py-1 rounded-full font-medium text-xs relative my-1 text-slate-200 bg-[{{ $quiz->category->color }}] hover:bg-[{{ $quiz->category->color }}] saturate-50 hover:saturate-100">{{ $quiz->category->title }}</a>
                                </div>
                            </div>
                            <div class="relative">
                                <div class="relative sm:min-w-[68px] rounded-full transition-colors duration-500 ease-in-out hover:bg-red-100 hover:text-red-600 items-center justify-center px-2 h-7 sm:h-8 text-xs sm:text-sm focus:outline-none flex text-neutral-600 bg-neutral-50">
                                    <div class="flex items-center justify-center transition" title="Super quiz!">
                                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11.995 7.23319C10.5455 5.60999 8.12832 5.17335 6.31215 6.65972C4.49599 8.14609 4.2403 10.6312 5.66654 12.3892L11.995 18.25L18.3235 12.3892C19.7498 10.6312 19.5253 8.13046 17.6779 6.65972C15.8305 5.18899 13.4446 5.60999 11.995 7.23319Z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span>{{ $quiz->votes}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dark absolute bottom-4 inset-x-4 sm:bottom-5 sm:inset-x-5 flex flex-col flex-grow">
                            <h3 class="block text-base font-semibold text-white ">
                                <a href="{{ route('quiz_show', $quiz->slug) }}" class="line-clamp-2" title="{{ $quiz->title }}">{{ $quiz->title }}</a>
                            </h3>
                            <div class="p-2 sm:p-2.5 mt-2.5 sm:mt-4 bg-white bg-opacity-20 backdrop-filter backdrop-blur-lg rounded-full flex items-center text-neutral-50 text-xs sm:text-sm font-medium">
                                <a href="{{ route('user_profile', $quiz->user->username) }}" class="relative flex items-center space-x-2">
                                    <div class="relative flex-shrink-0 inline-flex items-center justify-center overflow-hidden z-0 text-neutral-100 uppercase font-semibold shadow-inner rounded-full h-7 w-7 text-sm ring-2 ring-white">
                                        <img class="absolute inset-0 w-full h-full object-cover" src="{{ isset($quiz->user->avatar) ? asset($quiz->user->avatar) : asset("img/user-default.png") }}">
                                    </div>
                                    <span class="block text-white truncate">
                                        {{ empty($quiz->user->display_username)
                                                ? $quiz->user->username
                                                : $quiz->user->display_username }}
                                    </span>
                                </a>
                                <span class="mx-[6px]">·</span>
                                <span class="font-normal truncate">{{ humanize_date($quiz->created_at) }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
