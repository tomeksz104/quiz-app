@extends('layout/main')

@section('title',  isset($quiz_id) ? 'Edycja quizu ' : 'Utwórz quiz')

@section('content')
    <header class="bg-blue-50 w-full">
        <div class="px-4 py-10 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
            <div class="max-w-xl md:mx-auto sm:text-center lg:max-w-2xl">
                <div>
                    <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-400">KREATYWNOŚĆ</p>
                </div>
                <h2 class="max-w-lg mb-6 text-4xl leading-none tracking-tight text-gray-900 sm:text-5xl md:mx-auto">
                    <span class="relative inline-block">
                        <svg viewBox="0 0 52 24" fill="currentColor" class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-neutral-300 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
                            <defs>
                                <pattern id="84d09fa9-a544-44bd-88b2-08fdf4cddd38" x="0" y="0" width=".135" height=".30">
                                    <circle cx="1" cy="1" r=".7"></circle>
                                </pattern>
                            </defs>
                            <rect fill="url(#84d09fa9-a544-44bd-88b2-08fdf4cddd38)" width="52" height="24"></rect>
                        </svg>
                        <span class="relative">Kreator</span>
                    </span>
                    quizu
                </h2>
                <p class="max-w-xl mx-auto text-neutral-500 ">Skomponuj teraz swój <span class="text-blue-400">quiz</span> - dodaj <span class="font-semibold">pytania</span> oraz <span class="font-semibold">odpowiedzi</span> do każdego z nich. Każde pytanie musi mieć jedną poprawną odpowiedź. </p>
            </div>
        </div>
    </header>

    <livewire:quiz-wizard quiz_type="{{ $quiz_type->id }}" quiz_id="{{ $quiz_id ?? null }}"  />
@endsection



