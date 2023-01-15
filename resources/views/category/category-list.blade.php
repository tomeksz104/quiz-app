@extends('layout/main')

@section('title', 'Kategorie')

@section('content')
    <header class="bg-blue-50 w-full">
        <div class="px-4 py-10 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
            <div class="max-w-xl md:mx-auto sm:text-center lg:max-w-2xl">
                <div>
                    <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-400">WYBIERAJ</p>
                </div>
                <h2 class="mb-6 text-4xl leading-none tracking-tight text-gray-900 sm:text-5xl md:mx-auto">
                    <span class="relative inline-block">
                        <svg viewBox="0 0 52 24" fill="currentColor" class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-neutral-300 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
                            <defs>
                                <pattern id="84d09fa9-a544-44bd-88b2-08fdf4cddd38" x="0" y="0" width=".135" height=".30">
                                    <circle cx="1" cy="1" r=".7"></circle>
                                </pattern>
                            </defs>
                            <rect fill="url(#84d09fa9-a544-44bd-88b2-08fdf4cddd38)" width="52" height="24"></rect>
                        </svg>
                        <h2 class="relative">Przeglądaj według <span class="text-transparent bg-clip-text bg-gradient-to-br from-pink-400 to-red-600 py-3">kategorii</span>
                        </h2>
                    </span>
                </h2>
                <p class="max-w-xl mx-auto text-neutral-500 "> Wszystkie quizy są podzielone na różne <span class="text-blue-400">kategorie</span>. To powinno zapewnić Ci alternatywny sposób na podjęcie decyzji, jakie quizy chciałbyś dalej rozwiązywać. Powodzenia 😊 </p>
            </div>
        </div>
    </header>
    <div class="container px-3 sm:px-0 p-0 md:p-10 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 2xl:gap-8">
        @foreach($categories as $category)
        <div class="transition ease-in-out hover:-translate-y-1 hover:scale-105 duration-300 max-w-sm rounded-lg">
            <a href="{{route('index', ['category' => $category->slug ])}}" >
                <img class="rounded-3xl h-40 w-full object-cover" src="{{ isset($category->image->path) ? asset($category->image->path) : asset("uploads/images/no-image.jpg")  }}" alt="">
            </a>
            <div class="flex items-center mt-5">
                <div class="flex-shrink-0 w-10 h-10 rounded-full"
                     style="background-color: {{ $category->color }}"></div>
                <div class="ml-3 truncate">
                    <h3 class="text-base sm:text-lg text-neutral-900 dark:text-neutral-100 font-medium truncate">{{$category->title}}</h3>
                    <span class="block mt-1 text-sm text-neutral-6000 dark:text-neutral-400">{{ $category->quizzes_count }}
                        @if($category->quizzes_count == 1)
                            Quiz
                        @elseif($category->quizzes_count >= 4)
                            Quizów
                        @else
                            Quizy
                        @endif
                    </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
