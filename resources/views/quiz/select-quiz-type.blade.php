@extends('layout/main')

@section('title', 'Wybierz typ quizu')

@section('content')
    <header class="bg-blue-50 w-full">
        <div class="px-4 py-10 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
            <div class="max-w-xl md:mx-auto sm:text-center lg:max-w-2xl">
                <div>
                    <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-400">KREATYWNOŚĆ</p>
                </div>
                <h2 class="max-w-lg mb-6 text-4xl leading-none tracking-tight text-gray-900 sm:text-5xl md:mx-auto">
                    <span class="relative inline-block">
                        <svg viewBox="0 0 52 24" fill="currentColor" class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-neutral-300 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block"><defs><pattern id="84d09fa9-a544-44bd-88b2-08fdf4cddd38" x="0" y="0" width=".135" height=".30"><circle cx="1" cy="1" r=".7"></circle></pattern></defs><rect fill="url(#84d09fa9-a544-44bd-88b2-08fdf4cddd38)" width="52" height="24"></rect></svg>
                        <span class="relative">Kreator</span>
                    </span> quizu
                </h2>
                <p class="max-w-xl mx-auto text-neutral-500 ">Świetnie! Wybierz <span class="text-blue-400">typ quizu</span> jaki chcesz utworzyć. Pamiętaj że wszystkie typy różnią się sposobem rozwiązywania, dlatego musi być zgodny z Twoim pomysłem. </p>
            </div>
        </div>
    </header>

    <div>
        <div class="container px-3 sm:px-0 p-0 md:p-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($quiz_types as $type)
                <div class="bg-gradient-to-tr from-[{{ $type->color }}]/20 to-[{{ $type->color }}]/40 text-cyan-800 rounded-xl shadow-[0px_11px_30px_rgba(16,24,40,0.1)] py-3 w-full">
                    <div class="flex flex-col -mx-3 items-center">
                        <div class="px-5 text-left">
                            <div class="p-5 xl:px-8 md:py-5">
                                <h3 class="flex justify-center text-2xl font-medium ">{{ $type->title }}</h3>
                                <p class="text-md">{{ $type->description }}</p>
                            </div>
                        </div>
                        <div class="px-5 text-center">
                            <div class="p-5 xl:px-8 md:py-5">
                                <a @auth href="{{ route('create_quiz', ['quiz_type_slug' => $type->slug])}}" @else onclick="Livewire.emit('openModal', 'auth.login')" @endauth
                                class="block w-full py-2 px-5 cursor-pointer rounded uppercase font-semibold text-white bg-[{{ $type->color }}] hover:bg-white hover:text-[{{ $type->color }}] focus:outline-none transition duration-150 ease-in-out">UTWÓRZ</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


