<div>
    <div class="flex justify-between items-start p-5 rounded-t border-b dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 lg:text-2xl dark:text-white">
            {{ $result_message->id ? "Edytuj odpowiedź końcową" : "Dodaj odpowiedź końcową" }}
        </h3>
        <button wire:click="$emit('closeModal')" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
    <form wire:submit.prevent="submit" class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8">
        @csrf
        <div class="lg:grid lg:grid-cols-2 lg:gap-x-8">
            <div class="space-y-3" x-data="{ showPassword : false }">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">
                        Tytuł
                    </label>
                    <input wire:model="title" type="text" id="title" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none  @error('title') border-red-500 @enderror" placeholder="Super!">
                    @error('title') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Opis</label>
                    <input wire:model="description" type="text" id="description" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none  @error('description') border-red-500 @enderror" placeholder="	Należy Ci się pochwała od samego prezydenta! W tej dziedzinie jesteś najlepszy!">
                    @error('description') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="rating_from" class="block text-sm font-medium text-gray-700">Wymagany wynik (od 0 do 100%)</label>
                    <input wire:model="rating_from" type="text" id="rating_from" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none  @error('description') border-red-500 @enderror" placeholder="	Należy Ci się pochwała od samego prezydenta! W tej dziedzinie jesteś najlepszy!">
                    @error('rating_from') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex-1">
                <h2 class="block text-sm font-medium text-gray-700">Miniaturka wyniku</h2>
                <div wire:loading.class="animate-pulse" wire:target="uploaded_image" class="relative block group cursor-pointer mt-1 flex justify-center border-2 border-neutral-300 border-dashed rounded-xl px-6 pt-5 pb-6 ">
                    <div class="flex-1 space-y-1 text-center">
                        @if($this->uploaded_image || isset($this->image))
                            <div class="w-full max-w-md mx-auto">
                                <div class="w-full aspect-w-16 aspect-h-8">
                                    <img src="{{ isset($this->image) ? asset($this->image) : $this->uploaded_image->temporaryUrl() }}" class="rounded-lg object-cover shadow-lg" alt="">
                                </div>
                            </div>
                            <div wire:click="deleteImage" class="opacity-0 group-hover:opacity-100 absolute right-2.5 top-2.5 z-10 p-1.5 bg-neutral-900 dark:bg-neutral-700 text-white rounded-md cursor-pointer transition-opacity duration-300 " title="Usuń zdjęcie">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"><path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M18.85 9.14001L18.2 19.21C18.09 20.78 18 22 15.21 22H8.79002C6.00002 22 5.91002 20.78 5.80002 19.21L5.15002 9.14001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M10.33 16.5H13.66" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M9.5 12.5H14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </div>
                        @else
                            <svg class="mx-auto h-12 w-12 text-neutral-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        @endif
                        <div class="flex justify-center text-sm text-neutral-500">
                            <label class="relative flex-shrink-0 cursor-pointer  rounded-md font-medium text-indigo-600 hover:text-indigo-500">
                                <span wire:loading.class="hidden" wire:target="uploaded_image">{{ $this->uploaded_image || isset($this->image) ? 'Kliknij, aby zmienić' : 'Prześlij plik' }}</span>
                                <input type="file" wire:model="uploaded_image" name="uploaded_image" class="sr-only">
                                <div wire:loading wire:target="uploaded_image">
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
                @error('uploaded_image') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                <div wire:loading wire:target="submit">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
                {{ $result_message->id ? "Zapisz" : "Dodaj" }}
            </button>
            <button wire:click="$emit('closeModal')" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Anuluj</button>
        </div>
    </form>
</div>
