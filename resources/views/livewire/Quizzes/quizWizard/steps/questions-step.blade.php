<div>
    @include('livewire.Quizzes.quizWizard.navigation')
    <div class="container px-0 md:px-10 rounded-md">
        @if($this->questions)
            @foreach($this->questions as $question_key => $question)
            <div class="border-l-8 border-l-blue-500 ring-1 ring-neutral-200 rounded-2xl mt-5">
                <div class="max-w-5xl px-4 sm:px-0 py-10 mx-auto">
                    <div class="flex justify-between items-center">
                        <h1 class="flex items-center text-2xl sm:text-3xl font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-8 fill-blue-500 mr-2"><path d="M27.15 31q.85 0 1.45-.6t.6-1.45q0-.85-.6-1.45t-1.45-.6q-.85 0-1.45.6t-.6 1.45q0 .85.6 1.45t1.45.6Zm-1.25-6.3h2.35q.1-1.45.425-2.15.325-.7 1.625-1.95 1.35-1.3 1.875-2.275.525-.975.525-2.275 0-2.3-1.575-3.75Q29.55 10.85 27 10.85q-1.9 0-3.4 1.025t-2.2 2.875l2.25.95q.55-1.25 1.375-1.9.825-.65 1.975-.65 1.5 0 2.425.85.925.85.925 2.15 0 1-.45 1.75t-1.6 1.6q-1.6 1.45-2 2.325-.4.875-.4 2.875ZM13 38q-1.2 0-2.1-.9-.9-.9-.9-2.1V7q0-1.2.9-2.1.9-.9 2.1-.9h28q1.2 0 2.1.9.9.9.9 2.1v28q0 1.2-.9 2.1-.9.9-2.1.9Zm0-3h28V7H13v28Zm-6 9q-1.2 0-2.1-.9Q4 42.2 4 41V10h3v31h31v3Zm6-37v28V7Z"></path></svg>
                            Pytanie {{$loop->iteration}}
                        </h1>
                        <button wire:click="removeQuestion({{$question_key}})" class="hover:bg-neutral-100 rounded-full p-1" type="button" >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-8 fill-slate-400 hover:fill-red-400"><path d="m12.45 37.65-2.1-2.1L21.9 24 10.35 12.45l2.1-2.1L24 21.9l11.55-11.55 2.1 2.1L26.1 24l11.55 11.55-2.1 2.1L24 26.1Z"></path></svg>
                        </button>
                    </div>
                    <div class="w-24 my-5 border-b border-neutral-200 dark:border-neutral-700"></div>
                    <div class="space-y-3">
                        <div class="lg:grid lg:grid-cols-2 lg:gap-x-8">
                            <div class="space-y-3">
                                <div>
                                    <label for="question_title" class="block text-sm font-medium text-gray-700">Treść pytania</label>
                                    <input id="question_{{$question_key}}_title" wire:model.defer="questions.{{$question_key}}.title" type="text" id="question" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none @if(empty($questions[$question_key]['title'])) @error('questions.*.title') border-red-500 @enderror @endif" placeholder="np. Najdłuższa rzeka w Polsce to:">
                                    @if(empty($questions[$question_key]['title']))
                                        @error('questions.*.title') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
                                    @endif
                                </div>
                            </div>
                            <div class="flex-1">
                                <h2 class="block text-sm font-medium text-gray-700">Dodaj obrazek do pytania</h2>
                                <div wire:loading.class="animate-pulse" wire:target="questons.{{$question_key}}.question_thumbnail" class="relative block group cursor-pointer mt-1 flex justify-center border-2 border-neutral-300 border-dashed rounded-xl px-6 pt-5 pb-6 ">
                                    <div class="flex-1 space-y-1 text-center">
                                        @if( isset($question['question_thumbnail_state']['temporary_url']) )
                                        <div class="w-full max-w-md mx-auto">
                                            <div class="w-full aspect-w-16 aspect-h-8">
                                                <img src="{{ $question['question_thumbnail_state']['temporary_url'] }}" class="rounded-lg object-cover shadow-lg" alt="">
                                            </div>
                                        </div>
                                        <div wire:click="deleteThumbnail({{$question_key}}, '')" class="opacity-0 group-hover:opacity-100 absolute right-2.5 top-2.5 z-10 p-1.5 bg-neutral-900 dark:bg-neutral-700 text-white rounded-md cursor-pointer transition-opacity duration-300 " title="Usuń zdjęcie">
                                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"><path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M18.85 9.14001L18.2 19.21C18.09 20.78 18 22 15.21 22H8.79002C6.00002 22 5.91002 20.78 5.80002 19.21L5.15002 9.14001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M10.33 16.5H13.66" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M9.5 12.5H14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                        </div>
                                        @else
                                        <svg class="mx-auto h-12 w-12 text-neutral-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        @endif
                                        <div class="flex justify-center text-sm text-neutral-500">
                                            <label class="relative flex-shrink-0 cursor-pointer  rounded-md font-medium text-indigo-600 hover:text-indigo-500">
                                                <span wire:loading.class="hidden" wire:target="questions.{{$question_key}}.question_thumbnail">{{ (isset($question['question_thumbnail_state']['temporary_url'])) ? 'Kliknij, aby zmienić' : 'Prześlij plik' }}</span>
                                                <input type="file" wire:model="questions.{{$question_key}}.question_thumbnail" name="{{$question_key}}" class="sr-only">
                                                <div wire:loading wire:target="questions.{{$question_key}}.question_thumbnail">
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
                            </div>
                        </div>
                        <ul class="flex text-sm font-medium text-center text-neutral-500 dark:text-neutral-400 overflow-x-auto hiddenScrollbar">
                            <li class="mr-2">
                                <a wire:click="setTab('text', {{ $question_key }})" class="inline-block px-5 py-2.5 rounded-full cursor-pointer {{ ($questions[$question_key]['answers_type'] == 'text') ? 'text-white bg-cyan-900' : 'hover:text-neutral-900 hover:bg-neutral-100' }}">Odpowiedzi tekstowe</a>
                            </li>
                            <li class="mr-2">
                                <a wire:click="setTab('image', {{ $question_key }})" class="inline-block px-5 py-2.5 rounded-full cursor-pointer {{ ($questions[$question_key]['answers_type'] == 'image') ? 'text-white bg-cyan-900' : 'hover:text-neutral-900 hover:bg-neutral-100' }}">Odpowiedzi obrazkowe</a>
                            </li>
                        </ul>
                        @if(isset($question['answers']))
                        <div wire:sortable="updateOrder"
                             wire:sortable.animation="150">
                            @foreach($question['answers'] as $answer_key => $answer)
                                <div wire:sortable.item="{{$question_key}}.{{ $answer_key }}" class="flex items-start cursor-move mt-3">
                                    <p wire:sortable.handle class="flex items-center mr-3 mt-2.5 font-semibold">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-5 fill-slate-400 mr-2"><path d="M24 40q-1 0-1.7-.7t-.7-1.7q0-1 .7-1.7t1.7-.7q1 0 1.7.7t.7 1.7q0 1-.7 1.7T24 40Zm0-13.6q-1 0-1.7-.7t-.7-1.7q0-1 .7-1.7t1.7-.7q1 0 1.7.7t.7 1.7q0 1-.7 1.7t-1.7.7Zm0-13.6q-1 0-1.7-.7t-.7-1.7q0-1 .7-1.7T24 8q1 0 1.7.7t.7 1.7q0 1-.7 1.7t-1.7.7Z"></path></svg>
                                        {{ chr(64+ $loop->iteration) }}
                                    </p>
                                    <div class="flex flex-col w-full">
                                        <div class="relative">
                                            <input type="text" wire:model.defer="questions.{{$question_key}}.answers.{{$answer_key}}.title" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none @if(empty($questions[$question_key]['answers'][$answer_key]['title'])) @error('questions.*.answers.*.title') border-red-500 @enderror @endif" placeholder="np. Wisła" required="">
                                            @if($this->quiz_type !== 4 && $this->quiz_type !== 5)
                                                <div class="text-white absolute right-14 bottom-2 font-medium rounded-md text-md px-3 ">
                                                    <label class="inline-flex items-center text-gray-500">
                                                        <input wire:model.defer="questions.{{$question_key}}.answers.{{$answer_key}}.correct" name="correct" type="checkbox" class="form-checkbox h-5 w-5 border-gray-300 rounded-sm text-green-600 transition duration-200 checked:focus:ring-green-600 read-only:focus:ring-green-600">
                                                        <span class="ml-2 hidden sm:block {{ !$answer['correct'] ?: 'text-green-500' }}">Prawda</span>
                                                    </label>
                                                </div>
                                            @endif
                                            <div wire:click="removeAnswer({{$question_key}}, {{$answer_key}})" class="flex absolute inset-y-0 right-0 border-l items-center px-3 rounded-r-lg fill-red-500 bg-red-200 hover:bg-red-500 hover:fill-white cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-6"><path d="m12.45 37.65-2.1-2.1L21.9 24 10.35 12.45l2.1-2.1L24 21.9l11.55-11.55 2.1 2.1L26.1 24l11.55 11.55-2.1 2.1L24 26.1Z"></path></svg>
                                            </div>
                                        </div>
                                        @if($question['answers_type'] === 'image')
                                        <div class="flex-1">
                                            <div wire:loading.class="animate-pulse" wire:target="questions.{{$question_key}}.answers.{{$answer_key}}.answer_thumbnail" class="relative block group cursor-pointer mt-1 flex justify-center border-2 border-neutral-300 border-dashed rounded-xl px-6 pt-5 pb-6 ">
                                                <div class="flex-1 space-y-1 text-center">
                                                    @if( isset($answer['answer_thumbnail_state']['temporary_url']) )
                                                    <div class="w-full max-w-md mx-auto">
                                                        <div class="w-full aspect-w-16 aspect-h-8">
                                                            <img src="{{ $answer['answer_thumbnail_state']['temporary_url'] }}" class="rounded-lg object-cover shadow-lg" alt="">
                                                        </div>
                                                    </div>
                                                    <div wire:click="deleteThumbnail({{$question_key}} , {{$answer_key}})" class="opacity-0 group-hover:opacity-100 absolute right-2.5 top-2.5 z-10 p-1.5 bg-neutral-900 dark:bg-neutral-700 text-white rounded-md cursor-pointer transition-opacity duration-300 " title="Usuń zdjęcie">
                                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"><path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M18.85 9.14001L18.2 19.21C18.09 20.78 18 22 15.21 22H8.79002C6.00002 22 5.91002 20.78 5.80002 19.21L5.15002 9.14001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M10.33 16.5H13.66" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M9.5 12.5H14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                                    </div>
                                                    @else
                                                    <svg class="mx-auto h-12 w-12 text-neutral-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    @endif
                                                    <div class="flex justify-center text-sm text-neutral-500">
                                                        <label class="relative flex-shrink-0 cursor-pointer  rounded-md font-medium text-indigo-600 hover:text-indigo-500">
                                                            <span wire:loading.class="hidden" wire:target="questions.{{$question_key}}.answers.{{$answer_key}}.answer_thumbnail">{{ (isset($answer['answer_thumbnail_state']['temporary_url'])) ? 'Kliknij, aby zmienić' : 'Prześlij plik' }}</span>
                                                            <input type="file" wire:model="questions.{{$question_key}}.answers.{{$answer_key}}.answer_thumbnail" name="{{$answer_key}}" class="sr-only">
                                                            <div wire:loading wire:target="questions.{{$question_key}}.answers.{{$answer_key}}.answer_thumbnail">
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
                                        </div>
                                        @endif
                                    </div>
                                    @if(isset($answer['result_message_id']))
                                        <ul wire:sortable.handle class="w-32 min-h-[2.5rem] ml-3 border-dashed border-2 border-blue-400 font-medium rounded text-md p-1 space-y-1">
                                            <li class="min-w-[96px] flex cursor-move bg-white justify-center rounded border border-gray-500 break-normal px-3 py-[2px]">
                                                {{ $this->results['results'][$answer['result_message_id']]['title'] }}
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                            @endforeach
                            @error('questions.*.answers.*.title') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
                        </div>
                        @endif
                        @if($this->quiz_type !== 4)
                        <div class="flex justify-end w-full">
                            <button  wire:click="addAnswer({{$question_key}})" class="font-semibold text-blue-500 hover:text-blue-600">Dodaj odpowiedź +</button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        @endif
        @if($this->quiz_type !== 3)
        <div class="w-full mt-5 p-3 bg-blue-100 flex justify-center text-blue-500 cursor-pointer hover:text-blue-600 hover:bg-blue-200">
            <button wire:click="addQuestion" class="font-semibold"> Dodaj pytanie +</button>
        </div>
        @endif
        @include('livewire.Quizzes.quizWizard.pagination')
    </div>
</div>





