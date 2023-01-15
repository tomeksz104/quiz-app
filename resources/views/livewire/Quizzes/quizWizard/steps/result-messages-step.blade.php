<div>
    @include('livewire.quizzes.quizWizard.navigation')

    <div class="container px-10">
        @if($this->quiz_type !== 4)
        <ul class="flex text-sm font-medium text-center text-neutral-500 dark:text-neutral-400 overflow-x-auto hiddenScrollbar">
            <li class="mr-2">
                <a wire:click="setTab('default')"  class="inline-block px-5 py-2.5 rounded-full cursor-pointer {{ ($this->tab == 'default') ? 'text-white bg-cyan-900' : 'hover:text-neutral-900 hover:bg-neutral-100' }}">Domyślne</a>
            </li>
            <li class="mr-2">
                <a wire:click="setTab('custom')"  class="inline-block px-5 py-2.5 rounded-full cursor-pointer {{ ($this->tab == 'custom') ? 'text-white bg-cyan-900' : 'hover:text-neutral-900 hover:bg-neutral-100' }}">Niestandardowe</a>
            </li>
        </ul>

        <div class="p-4 relative flex bg-yellow-100 text-yellow-700 rounded-lg my-4" type="info" style="opacity: 1;">
            <div class="flex items-center">
                <span class="text-2xl text-yellow-400 dark:text-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"></path>
                    </svg>
                </span>
                <div class="ml-2 text-sm">Uzupełnianie wyników jest opcją dodatkową. Możesz pominąć ten krok i pozostawić domyślne wyniki.</div>
            </div>
        </div>
        @endif

        @error('results')
        <div class="p-4 relative flex bg-red-100 text-red-700 rounded-lg my-4" type="info" style="opacity: 1;">
            <div class="flex items-center">
                <span class="text-2xl text-red-400 dark:text-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                </span>
                <div class="ml-2 text-sm">{{ $message }}</div>
            </div>
        </div>
        @enderror
    </div>

    <div class="container rounded-md px-4 sm:px-8">
        @if($tab == 'default' && $this->quiz_type !== 4)
        <div class="bg-white mx-auto border border-neutral-200">
            <ul class="shadow-box">
                @foreach($default_results as $key => $result)
                <li class="relative border-b border-gray-200" x-data="{selected:null}">
                    <button type="button" class="w-full py-3 text-left" @click="selected !== {{ $result['id'] }} ? selected = {{ $result['id'] }} : selected = null">
                        <div class="flex items-center flex-wrap  px-5">
                            <div class="overflow-hidden rounded-3xl mr-3">
                                <img src="{{ isset($result['image']['path']) ? asset($result['image']['path']) : asset("uploads/images/no-image.jpg") }}" height="110px" width="150px">
                            </div>
                            <div class="ml-3">
                                <p class="font-medium text-gray-600 text-xl sm:text-2xl">{{ $result['title'] }}</p>
                                <span class="max-w-2xl hidden sm:block">{{ $result['description'] }}</span>
                            </div>
                            <span class="ml-auto text-xl font-medium">{{ $result['rating_from'] }}%</span>
                        </div>
                    </button>
                    <div class="relative overflow-hidden transition-all max-h-0 duration-700"  x-ref="container{{ $result['id'] }}" x-bind:style="selected == {{ $result['id'] }} ? 'max-height: ' + $refs.container{{ $result['id'] }}.scrollHeight + 'px' : ''">
                        <div class="p-6 block sm:hidden">
                            <p>{{ $result['description'] }}</p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        @if($tab == 'custom')
        @foreach($results as $result_key => $result)
            <div class="border-l-8 border-l-blue-500 ring-1 ring-neutral-200 rounded-2xl mt-5">
                <div class="max-w-5xl py-10 mx-auto">
                    <div class="flex justify-between items-center">
                        <h1 class="flex items-center text-3xl font-bold">
                            {{--<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-8 fill-slate-400 mr-2"><path d="M11.3 40q-1.4 0-2.35-.95Q8 38.1 8 36.7q0-1.4.95-2.35.95-.95 2.35-.95 1.4 0 2.35.95.95.95.95 2.35 0 1.4-.95 2.35-.95.95-2.35.95ZM24 40q-1.4 0-2.35-.95-.95-.95-.95-2.35 0-1.4.95-2.35.95-.95 2.35-.95 1.4 0 2.35.95.95.95.95 2.35 0 1.4-.95 2.35Q25.4 40 24 40Zm12.7 0q-1.4 0-2.35-.95-.95-.95-.95-2.35 0-1.4.95-2.35.95-.95 2.35-.95 1.4 0 2.35.95.95.95.95 2.35 0 1.4-.95 2.35-.95.95-2.35.95ZM11.3 27.3q-1.4 0-2.35-.95Q8 25.4 8 24q0-1.4.95-2.35.95-.95 2.35-.95 1.4 0 2.35.95.95.95.95 2.35 0 1.4-.95 2.35-.95.95-2.35.95Zm12.7 0q-1.4 0-2.35-.95-.95-.95-.95-2.35 0-1.4.95-2.35.95-.95 2.35-.95 1.4 0 2.35.95.95.95.95 2.35 0 1.4-.95 2.35-.95.95-2.35.95Zm12.7 0q-1.4 0-2.35-.95-.95-.95-.95-2.35 0-1.4.95-2.35.95-.95 2.35-.95 1.4 0 2.35.95.95.95.95 2.35 0 1.4-.95 2.35-.95.95-2.35.95ZM11.3 14.6q-1.4 0-2.35-.95Q8 12.7 8 11.3q0-1.4.95-2.35Q9.9 8 11.3 8q1.4 0 2.35.95.95.95.95 2.35 0 1.4-.95 2.35-.95.95-2.35.95Zm12.7 0q-1.4 0-2.35-.95-.95-.95-.95-2.35 0-1.4.95-2.35Q22.6 8 24 8q1.4 0 2.35.95.95.95.95 2.35 0 1.4-.95 2.35-.95.95-2.35.95Zm12.7 0q-1.4 0-2.35-.95-.95-.95-.95-2.35 0-1.4.95-2.35Q35.3 8 36.7 8q1.4 0 2.35.95.95.95.95 2.35 0 1.4-.95 2.35-.95.95-2.35.95Z"></path></svg>--}}
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"  class="w-8 fill-blue-500 mr-2"><path d="M6 41.95v-3h17.9v3Zm0-8.3v-3h17.9v3Zm0-8.3V22.6h36v2.75Zm0-8.05v-3h36v3ZM6 9V6h36v3Zm27 33-5.25-5.3 2.15-2.1 3.15 3.15 6.9-6.95 2.15 2.1Z"/></svg>
                            Wynik {{$loop->iteration}}
                        </h1>
                        <button wire:click="removeResult({{$result_key}})" type="button" >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-8 fill-slate-400 hover:fill-red-400"><path d="m12.45 37.65-2.1-2.1L21.9 24 10.35 12.45l2.1-2.1L24 21.9l11.55-11.55 2.1 2.1L26.1 24l11.55 11.55-2.1 2.1L24 26.1Z"></path></svg>
                        </button>
                    </div>
                    @if($this->quiz_type == 1 || $this->quiz_type == 2)
                    <div class="flex items-center my-3">
                        <span class="mr-3">Minimum: </span>
                        <div class="flex">
                            <input id="result_{{$result_key}}_rating_from" wire:model.defer="results.{{$result_key}}.rating_from" type="text" class="block w-12 text-sm text-gray-900 bg-white rounded-l-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none" placeholder="0" {{ ($result_key) !== 0 ?: 'disabled' }}>
                            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-r-lg border border-l-0 border-gray-300"> % </span>
                        </div>
                        <span class="ml-3"> poprawnych odpowiedzi, aby wyświetlić wynik: </span>
                    </div>
                    @endif
                    <div class="lg:grid lg:grid-cols-2 lg:gap-x-8">
                        <div class="space-y-3">
                            <div>
                                <label for="result_title" class="block text-sm font-medium text-gray-700">Tytuł wyniku</label>
                                <input id="result_{{$result_key}}_title" wire:model.defer="results.{{$result_key}}.title" type="text" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ $this->results[$result_key]['placeholders']['title'] ?? 'np. Świetnie'}}">
                                @if(empty($results[$result_key]['title']))
                                    @error('results.*.title') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
                                @endif
                            </div>
                            <div>
                                <label for="result_description" class="block text-sm font-medium text-gray-700">Opis wyniku</label>
                                <textarea id="result_{{$result_key}}_description" wire:model.defer="results.{{$result_key}}.description" rows="3" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ $this->results[$result_key]['placeholders']['description'] ?? 'np. Dobrze Ci poszło'}}"></textarea>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h2 class="block text-sm font-medium text-gray-700">Dodaj obrazek na okładkę</h2>
                            <div wire:loading.class="animate-pulse" wire:target="results.{{$result_key}}.result_thumbnail" class="relative block group cursor-pointer mt-1 flex justify-center border-2 border-neutral-300 border-dashed rounded-xl px-6 pt-5 pb-6 ">
                                <div class="flex-1 space-y-1 text-center">
                                    @if( isset($result['result_thumbnail_state']['temporary_url']) )
                                    <div class="w-full max-w-md mx-auto">
                                        <div class="w-full aspect-w-16 aspect-h-8">
                                            <img src="{{ $result['result_thumbnail_state']['temporary_url'] }}" class="rounded-lg object-cover shadow-lg" alt="">
                                        </div>
                                    </div>
                                    <div wire:click="deleteThumbnail({{$result_key}})" class="opacity-0 group-hover:opacity-100 absolute right-2.5 top-2.5 z-10 p-1.5 bg-neutral-900 dark:bg-neutral-700 text-white rounded-md cursor-pointer transition-opacity duration-300 " title="Usuń zdjęcie">
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"><path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M18.85 9.14001L18.2 19.21C18.09 20.78 18 22 15.21 22H8.79002C6.00002 22 5.91002 20.78 5.80002 19.21L5.15002 9.14001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M10.33 16.5H13.66" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M9.5 12.5H14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                    </div>
                                    @else
                                    <svg class="mx-auto h-12 w-12 text-neutral-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    @endif
                                    <div class="flex justify-center text-sm text-neutral-500">
                                        <label class="relative flex-shrink-0 cursor-pointer  rounded-md font-medium text-indigo-600 hover:text-indigo-500">
                                            <span wire:loading.class="hidden" wire:target="results.{{$result_key}}.result_thumbnail">{{ (isset($this->result_thumbnail)) ? 'Kliknij, aby zmienić' : 'Prześlij plik' }}</span>
                                            <input type="file" wire:model="results.{{$result_key}}.result_thumbnail" name="{{$result_key}}" class="sr-only">
                                            <div wire:loading wire:target="results.{{$result_key}}.result_thumbnail">
                                                <div class="inline-flex items-center justify-center ml-3 text-blue-600 ">
                                                    <svg class="animate-spin w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3"></circle>
                                                        <path class="opacity-90" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <p class="text-xs text-neutral-500">
                                        SVG, PNG, JPG lub GIF (max. 2MB)
                                    </p>
                                </div>
                            </div>
                            @if ($errors->any() && array_key_first($errors->default->toArray()) == 'results.'.$result_key.'.result_thumbnail')
                                @error('results.*.result_thumbnail') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }} </span> @enderror
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="w-full mt-5 p-3 bg-blue-100 flex justify-center text-blue-500 hover:text-blue-600 hover:bg-blue-200">
            <button wire:click="addResult" class="font-semibold">Dodaj wynik +</button>
        </div>
        @endif


        @include('livewire.quizzes.quizWizard.pagination')
    </div>
</div>

