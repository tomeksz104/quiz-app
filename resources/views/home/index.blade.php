@extends('layout/main')

@section('title', 'Strona główna')

@section('content')
    <header id="header"  class="bg-repeat text-base font-medium leading-5 text-center lg:text-left xl:pb-32">
        <div class="relative overflow-hidden bg-slate-900 items-center px-4 sm:px-8">
            <div class="relative w-full col-span-2 py-5 z-0 mx-auto flex flex-row">
                <div class="absolute inset-y-0 left-0 z-10 flex items-center">
                    <button class="swiper-button-prev bg-white -ml-2 lg:-ml-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-left w-6 h-6">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach($sliderQuizzes as $quiz)
                        <div class="swiper-slide p-4">
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
                                <div class="absolute bottom-4 inset-x-4 sm:bottom-5 sm:inset-x-5 flex flex-col flex-grow">
                                    <h3 class="block text-base font-semibold text-white ">
                                        <a href="{{ route('quiz_show', $quiz->slug) }}" class="line-clamp-2" title="{{ $quiz->title }}">{{ $quiz->title }}</a>
                                    </h3>
                                    <div class="p-2 sm:p-2.5 mt-2.5 bg-white bg-opacity-20 backdrop-filter backdrop-blur-lg rounded-full flex items-center text-neutral-50 text-xs sm:text-sm font-medium">
                                        <a href="{{ route('user_profile', $quiz->user->username) }}" class="relative flex items-center space-x-2">
                                            <div class="relative flex-shrink-0 inline-flex items-center justify-center overflow-hidden z-0 text-neutral-100 uppercase font-semibold shadow-inner rounded-full h-7 w-7 text-sm ring-2 ring-white">
                                                <img class="absolute inset-0 w-full h-full object-cover" src="{{ isset($quiz->user->avatar) ? asset($quiz->user->avatar) : asset("img/user-default.png") }}">
                                            </div>
                                            <span class="block text-white truncate">{{ isset($quiz->user->display_username) ? $quiz->user->display_username : $quiz->user->username }}</span>
                                        </a>
                                        <span class="mx-[6px]">·</span>
                                        <span class="font-normal text-xs truncate">{{ humanize_date($quiz->created_at) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 z-10 flex items-center">
                    <button class="swiper-button-next bg-white -mr-2 lg:-mr-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-right w-6 h-6">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <div id="quizzes" class="text-base leading-5 px-3 sm:px-0 pb-16">
        <div class="grid grid-cols-12 gap-6 container mx-auto md:px-4 mt-6">
            <livewire:quizzes.quizzes />

            <div class="col-span-12 lg:col-span-4 relative">
                @include('side/popular-quizzes')

                @include('side/newsletter')

                @include('side/popular-categories')
            </div>
        </div>
    </div>
@endsection
