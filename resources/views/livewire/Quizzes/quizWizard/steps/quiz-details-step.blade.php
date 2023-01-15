<div>
    @include('livewire.quizzes.quizWizard.navigation')
    <div class="container px-0 md:px-10 rounded-md">
        <div class="border-l-8 border-l-blue-500 ring-1 ring-neutral-200 rounded-2xl mt-5">
            <div class="max-w-5xl px-4 sm:px-0 py-10 mx-auto">
                <h1 class="flex items-center text-2xl sm:text-3xl font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-8 fill-blue-500 mr-2"><path d="M15.95 35.5h16.1v-3h-16.1Zm0-8.5h16.1v-3h-16.1ZM11 44q-1.2 0-2.1-.9Q8 42.2 8 41V7q0-1.2.9-2.1Q9.8 4 11 4h18.05L40 14.95V41q0 1.2-.9 2.1-.9.9-2.1.9Zm16.55-27.7V7H11v34h26V16.3ZM11 7v9.3V7v34V7Z"></path></svg>
                    Podstawowe dane
                </h1>
                <div class="w-24 my-5 border-b border-neutral-200 dark:border-neutral-700"></div>
                <div class="lg:grid lg:grid-cols-2 lg:gap-x-8">
                    <div class="space-y-3">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Tytuł</label>
                            <input wire:model="title" type="text" id="title" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none  @error('title') border-red-500 @enderror" placeholder="np. Zobacz ile wiesz na temat polskiej historii">
                            @error('title') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700">Kategoria</label>
                            <select wire:model="category" id="category" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none">
                                <option>Wybierz kategorię: </option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        @can('isAdmin')
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select wire:model="status" id="status" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none">
                                <option value="{{ App\Enums\QuizStatus::APPROVED }}">Zatwierdzony</option>
                                <option value="{{ App\Enums\QuizStatus::PENDING }}">Poczekalnia</option>
                            </select>
                        </div>
                        @endcan
                        <div>
                            <label for="public" class="block text-sm font-medium text-gray-700">Widoczność</label>
                            <select wire:model="public" id="public" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none">
                                <option value="1">Publiczny</option>
                                <option value="0">Prywatny</option>
                            </select>
                        </div>
                        @if($this->quiz_type === 2)
                        <div>
                            <label for="time_for_answer" class="block text-sm font-medium text-gray-700">Czas na odpowiedź</label>
                            <select wire:model="time_for_answer" id="time_for_answer" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none">
                                <option value="5">5 sekund</option>
                                <option value="10">10 sekund</option>
                                <option value="15">15 sekund</option>
                                <option value="20">20 sekund</option>
                                <option value="30">30 sekund</option>
                                <option value="40">40 sekund</option>
                                <option value="60">1 minuta</option>
                                <option value="120">2 minuty</option>
                                <option value="300">5 minut</option>

                            </select>
                        </div>
                        @endif
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Opis quizu</label>
                            <textarea wire:model="description" id="description" rows="3" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none  @error('description') border-red-500 @enderror" placeholder="np. Czy uda Ci się znaleźć w gronie 5% osób kończących ten quiz wiedzy ogólnej bezbłędnie?"></textarea>
                            @error('description') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex-1">
                        <h2 class="block text-sm font-medium text-gray-700">Dodaj obrazek na okładkę</h2>
                        <div wire:loading.class="animate-pulse" wire:target="quiz_thumbnail" class="relative block group cursor-pointer mt-1 flex justify-center border-2 border-neutral-300 border-dashed rounded-xl px-6 pt-5 pb-6 ">
                            <div class="flex-1 space-y-1 text-center">
                                @if(isset($this->quiz_thumbnail_state['temporary_url']))
                                <div class="w-full max-w-md mx-auto">
                                    <div class="w-full aspect-w-16 aspect-h-8">
                                        <img src="{{ $this->quiz_thumbnail_state['temporary_url'] }}" class="rounded-lg object-cover shadow-lg" alt="">
                                    </div>
                                </div>
                                <div wire:click="deleteThumbnail" class="opacity-0 group-hover:opacity-100 absolute right-2.5 top-2.5 z-10 p-1.5 bg-neutral-900 dark:bg-neutral-700 text-white rounded-md cursor-pointer transition-opacity duration-300 " title="Usuń zdjęcie">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"><path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M18.85 9.14001L18.2 19.21C18.09 20.78 18 22 15.21 22H8.79002C6.00002 22 5.91002 20.78 5.80002 19.21L5.15002 9.14001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M10.33 16.5H13.66" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M9.5 12.5H14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                </div>
                                @else
                                <svg class="mx-auto h-12 w-12 text-neutral-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                @endif
                                <div class="flex justify-center text-sm text-neutral-500">
                                    <label class="relative flex-shrink-0 cursor-pointer  rounded-md font-medium text-indigo-600 hover:text-indigo-500">
                                        <span wire:loading.class="hidden" wire:target="quiz_thumbnail">{{ (isset($this->quiz_thumbnail_state['temporary_url'])) ? 'Kliknij, aby zmienić' : 'Prześlij plik' }}</span>
                                        <input type="file" wire:model="quiz_thumbnail" name="quiz_thumbnail" class="sr-only">
                                        <div wire:loading wire:target="quiz_thumbnail">
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
                        @error('quiz_thumbnail') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>
        @include('livewire.quizzes.quizWizard.pagination')
    </div>
</div>
