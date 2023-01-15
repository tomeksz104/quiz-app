@extends('layout/main')

@section('title', 'Wynik w quizie '.$result_quiz->quiz->title)

@section('content')
    <!-- Header -->
    <div class="relative pt-8">
        <div class="bg-blue-50 absolute top-0 inset-x-0 h-60 w-full"></div>
        <header class="container relative ">
            <div class="bg-white dark:bg-neutral-900 shadow-xl px-5 py-7 md:p-10 rounded-2xl md:rounded-[40px] flex flex-col sm:flex-row items-center justify-center space-y-10 sm:space-y-0 sm:space-x-11">
                <div class="w-1/2 sm:w-1/4 flex-shrink-0">
                    <div class="aspect-w-1 aspect-h-1 rounded-full overflow-hidden z-0 shadow-2xl group cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.4 -0.4 32.8 32.8" class="z-10">
                            <circle cx="16" cy="16" r="15.9155" class="progress-bar__background"></circle>
                            <circle cx="16" cy="16" r="15.9155" class="progress-bar__progress js-progress-bar stroke-lime-600" style="stroke-dashoffset: {{ 100-$percentage_of_correct_answers }}px;"></circle>
                        </svg>
                        <img class="w-full h-full object-cover group-hover:scale-105 transform transition-transform" src="{{
                            isset($result_message->image->path)
                                ? asset($result_message->image->path)
                                : asset("uploads/images/no-image.jpg")

                            }}" >
                        <div class="flex items-center justify-center">
                            <div class="absolute z-[-0] w-[97%] h-[97%] rounded-full  bg-neutral-900 bg-blend-multiply bg-opacity-75" style=""></div>
                            <div class="z-[1] flex text-white bg-black bg-blend-multiply bg-opacity-50 w-20 h-20 border-2 border-neutral-300 rounded-full flex items-center justify-center ">
                                @if($result_quiz->quiz->quiz_type === 5 || $result_quiz->quiz->quiz_type === 4)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-10 h-10">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"></path>
                                </svg>
                                @else
                                <span class=" font-semibold text-2xl pt-[4px]">{{ $percentage_of_correct_answers }}</span>
                                <span>%</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col space-y-5 flex-grow">
                    <div class="space-y-5">
                        <div class="flex flex-wrap">
                            <div class="flex items-center">
                                <span class=" bg-pink-100 rounded-full p-[2px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-pink-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </span>
                                <span class="ml-1 text-sm">{{ $result_quiz->time_spent }} sek.</span>
                            </div>
                            <span class="flex items-center bg-[{{ $result_quiz->quiz->type->color }}]/10 text-[{{ $result_quiz->quiz->type->color }}] text-xs font-medium ml-3 px-2.5 py-0.5 rounded-full">
                                {{ $result_quiz->quiz->type->title }}
                            </span>
                        </div>
                        <h1 class="text-neutral-900 font-semibold text-3xl md:text-4xl md:!leading-[120%] lg:text-5xl dark:text-neutral-100 max-w-4xl">{{ ($result_quiz->quiz->quiz_type == 5) ? "Super!"  : $result_message->title }}</h1>
                        <p>{{ ($result_quiz->quiz->quiz_type === 5) ? "Teraz możesz sprawdzić co wolą inni! Miłej zabawy :)"  : $result_message->description }}</p>
                        <div class="w-full border-b border-neutral-100 dark:border-neutral-800"></div>
                        <div class="flex flex-col lg:flex-row justify-between lg:items-end space-y-5 lg:space-y-0 lg:space-x-5">
                            <div class="flex items-center text-neutral-700 text-left dark:text-neutral-200 text-sm leading-none flex-shrink-0">
                                <a href="{{ route('quiz_show', $result_quiz->quiz->slug) }}" class="flex items-center space-x-2">
                                    <div class="relative flex-shrink-0 inline-flex items-center justify-center overflow-hidden text-neutral-100 uppercase font-semibold  rounded-full shadow-inner h-10 w-10 sm:h-11 sm:w-11 text-xl ring-1 ring-white dark:ring-neutral-900">
                                        <img class="absolute inset-0 w-full h-full object-cover" src="{{ isset($result_quiz->quiz->image->path) ? asset($result_quiz->quiz->image->path) : asset("uploads/images/no-image.jpg") }}" alt="{{ $result_quiz->quiz->title }}">
                                    </div>
                                </a>
                                <div class="ml-3">
                                    <div class="flex items-center">
                                        <a class="block font-semibold" href="{{ route('quiz_show', $result_quiz->quiz->slug) }}">
                                            {{ $result_quiz->quiz->title }}
                                        </a>
                                    </div>
                                    <div class="text-xs mt-[6px]">
                                        <span class="text-neutral-700 dark:text-neutral-300">
                                            ukończony dnia
                                            <b>{{ humanize_date($result_quiz->created_at) }}</b>
                                        </span>
                                        <span class="mx-2 font-semibold">·</span>
                                        <span class="text-neutral-700 dark:text-neutral-300">
                                            <span>
                                                <span> {{ $total_questions }}</span>
                                                <span>pytań</span>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-shrink-0 flex flex-wrap flex-row space-x-2 sm:space-x-2.5 space-y-0.5 sm:space-y-0 items-center">
                                <div class="relative sm:min-w-[68px] rounded-full text-neutral-600 bg-neutral-50 dark:text-neutral-200 dark:bg-neutral-800 flex items-center justify-center mt-0.5 sm:mt-0 px-2 h-7 sm:h-8 text-xs sm:text-sm focus:outline-none" title="Views">
                                    <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M19.25 12C19.25 13 17.5 18.25 12 18.25C6.5 18.25 4.75 13 4.75 12C4.75 11 6.5 5.75 12 5.75C17.5 5.75 19.25 11 19.25 12Z"></path>
                                        <circle cx="12" cy="12" r="2.25" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"></circle>
                                    </svg>
                                    <span class="ml-1">{{ $result_quiz->quiz->views }}</span>
                                </div>
                                <div class="relative items-center min-w-[68px] rounded-full text-neutral-600 bg-neutral-50 transition-colors dark:text-neutral-200 dark:bg-neutral-800 hover:bg-teal-50 dark:hover:bg-teal-100 hover:text-teal-600 dark:hover:text-teal-500 flex  px-3 h-8 text-xs focus:outline-none" title="Komentarze">
                                    <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.75 6.75C4.75 5.64543 5.64543 4.75 6.75 4.75H17.25C18.3546 4.75 19.25 5.64543 19.25 6.75V14.25C19.25 15.3546 18.3546 16.25 17.25 16.25H14.625L12 19.25L9.375 16.25H6.75C5.64543 16.25 4.75 15.3546 4.75 14.25V6.75Z"></path>
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M9.5 11C9.5 11.2761 9.27614 11.5 9 11.5C8.72386 11.5 8.5 11.2761 8.5 11C8.5 10.7239 8.72386 10.5 9 10.5C9.27614 10.5 9.5 10.7239 9.5 11Z"></path>
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M12.5 11C12.5 11.2761 12.2761 11.5 12 11.5C11.7239 11.5 11.5 11.2761 11.5 11C11.5 10.7239 11.7239 10.5 12 10.5C12.2761 10.5 12.5 10.7239 12.5 11Z"></path>
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M15.5 11C15.5 11.2761 15.2761 11.5 15 11.5C14.7239 11.5 14.5 11.2761 14.5 11C14.5 10.7239 14.7239 10.5 15 10.5C15.2761 10.5 15.5 10.7239 15.5 11Z"></path>
                                    </svg>
                                    <span class="ml-1 group-hover:text-teal-600"> {{ $result_quiz->quiz->comments->count() }} </span>
                                </div>
                                <div class="sm:px-1">
                                    <div class="border-l border-neutral-200 h-6"></div>
                                </div>
                                <livewire:components.quiz-votes :quiz_id="$result_quiz->quiz->id" :dark_mode="0"/>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <div class="container" x-data="{ tab: 'questions_and_answers' }">
        <ul class="grid grid-flow-col text-center text-gray-500 bg-gray-100 rounded-full p-1 mt-10">
            <li>
                <a x-on:click.prevent="tab = 'questions_and_answers'" href="" class="flex justify-center py-4"
                   :class="{ 'bg-white rounded-full shadow text-blue-600 fill-blue-600': tab === 'questions_and_answers' }">
                    <div class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                        <span class="ml-3 text-md font-medium">Odpowiedzi</span>
                    </div>
                </a>
            </li>
            <li>
                <a x-on:click.prevent="tab = 'comments'" href="" class="flex justify-center py-4"
                   :class="{ 'bg-white rounded-full shadow text-blue-600': tab === 'comments' }">
                    <div class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                        </svg>
                        <span class="ml-3 text-md font-medium">Komentarze</span>
                    </div>
                </a>
            </li>
        </ul>

        <!-- Questions and answers -->
        <div x-show="tab === 'questions_and_answers'">
            <h3 class="flex justify-center font-semibold text-2xl pt-10">Pytania i odpowiedzi:</h3>
            @foreach($result_questions as $result_question)
            <div class="mx-auto px-4 text-base font-bold !max-w-screen-lg lg:prose-lg border-l-8 border-l-blue-500 rounded-lg my-8 shadow-[0_1px_3px_rgba(15,23,42,0.03),0_1px_2px_rgba(15,23,42,0.06)] ring-1 ring-slate-600/[0.04]">
                <div class="flex flex-col w-[48rem] mx-auto text-base font-bold relative rounded-xl p-4">
                    <svg viewBox="0 0 384 12" fill="none" aria-hidden="true" class="absolute w-fit uppercase inset-x-0 top-0 mx-auto w-[384px] max-w-[120%] transition"><mask id=":r5:-a" maskUnits="userSpaceOnUse" x="48" y="0" width="269" height="4" style="mask-type: alpha;"><path transform="rotate(180 316.656 4)" fill="#C4C4C4" d="M316.656 4h268v4h-268z"></path></mask><g filter="url(#:r5:-b)" mask="url(#:r5:-a)"><path transform="rotate(180 292.656 1)" fill="url(#:r5:-c)" d="M292.656 1h220v2h-220z"></path></g><mask id=":r5:-d" maskUnits="userSpaceOnUse" x="116" y="0" width="268" height="12" style="mask-type: alpha;"><path transform="rotate(180 384 12)" fill="#C4C4C4" d="M384 12h268v12H384z"></path></mask><g filter="url(#:r5:-e)" mask="url(#:r5:-d)"><path transform="rotate(180 360 1)" fill="url(#:r5:-f)" d="M360 1h220v2H360z"></path></g><defs><linearGradient id=":r5:-c" x1="292.656" y1="1" x2="512.656" y2="1" gradientUnits="userSpaceOnUse"><stop stop-color="#A78BFA" stop-opacity="0"></stop><stop offset=".323" stop-color="#A78BFA"></stop><stop offset=".672" stop-color="#EC4899" stop-opacity=".3"></stop><stop offset="1" stop-color="#EC4899" stop-opacity="0"></stop></linearGradient><linearGradient id=":r5:-f" x1="360" y1="1" x2="580" y2="1" gradientUnits="userSpaceOnUse"><stop stop-color="#A78BFA" stop-opacity="0"></stop><stop offset=".323" stop-color="#A78BFA"></stop><stop offset=".672" stop-color="#EC4899" stop-opacity=".3"></stop><stop offset="1" stop-color="#EC4899" stop-opacity="0"></stop></linearGradient><filter id=":r5:-b" x="71.656" y="-2" width="222" height="4" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"></feBlend><feGaussianBlur stdDeviation=".5" result="effect1_foregroundBlur_311_43467"></feGaussianBlur></filter><filter id=":r5:-e" x="131" y="-10" width="238" height="20" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"></feBlend><feGaussianBlur stdDeviation="4.5" result="effect1_foregroundBlur_311_43467"></feGaussianBlur></filter></defs></svg>
                    <span class="absolute w-fit uppercase inset-x-0 -top-4 font-medium text-xl leading-normal mx-auto text-blue-500 px-3 bg-white border border-neutral-200 shadow rounded-full">{{$loop->iteration}}</span>
                    <h3 class="font-semibold text-2xl leading-normal mt-10">{{$result_question->question->title}}</h3>
                </div>
                <ul class="flex flex-col max-w-2xl mx-auto space-y-5 pb-10">
                    @for ($i = 0; $i < count($result_question->question->answers); $i++)
                    <li>
                        <label for="{{ $result_question->question->answers[$i]->id }}"
                               class="relative group inline-flex items-center p-3 w-full text-gray-500 rounded-lg border border-gray-200 cursor-pointer
                                @if($result_question->question_answer_id == $result_question->question->answers[$i]->id && $result_question->question->answers[$i]->correct && $result_quiz->quiz->quiz_type !== 5 && $result_quiz->quiz->quiz_type !== 4)
                                    border-green-300 text-green-500
                                @elseif($result_question->question_answer_id == $result_question->question->answers[$i]->id && $result_quiz->quiz->quiz_type !== 5 && $result_quiz->quiz->quiz_type !== 4)
                                    border-red-300 text-red-500
                                @elseif($result_question->question->answers[$i]->correct && $result_quiz->quiz->quiz_type !== 5 && $result_quiz->quiz->quiz_type !== 4)
                                    text-green-500
                                @elseif($result_question->question->answers[$i]->correct && $result_quiz->quiz->quiz_type === 5)
                                    border-blue-300 text-blue-500
                                @elseif($result_question->question->answers[$i]->id === $result_question->question_answer_id && $result_quiz->quiz->quiz_type === 4)
                                    border-blue-300 text-blue-500
                                @endif
                                ">
                            @if(array_key_exists($result_question->question->answers[$i]->id, $answers_result_percentage))
                                <div class="absolute left-0 -z-10 w-[{{ $answers_result_percentage[$result_question->question->answers[$i]->id] }}%] h-full {{ ($result_question->question->answers[$i]->correct) == 1 ? "bg-lime-100" : "bg-neutral-100" }} rounded-lg"></div>
                            @endif
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-3 w-8 h-8" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <div class="block ml-5">
                                <div class="w-full text-lg font-normal">{{ $result_question->question->answers[$i]->title }}</div>
                            </div>
                        </label>
                    </li>
                    @endfor
                </ul>
            </div>
            @endforeach
        </div>
        <div x-show="tab === 'comments'">
            <livewire:comments.comments :model="$result_quiz->quiz" :quiz_title="$result_quiz->quiz->title" :total_comments="$result_quiz->quiz->comments->count()" />
        </div>
    </div>
@endsection
