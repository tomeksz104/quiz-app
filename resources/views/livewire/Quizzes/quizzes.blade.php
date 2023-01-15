<div class="col-span-12 lg:col-span-8 ">
    @if($selectedCategory)
        <h3 class="text-3xl">
            Kategoria:
            <span class="text-[{{$selectedCategory->color}}]">{{$selectedCategory->title}}</span>
        </h3>
        <p class="mb-5 text-lg font-medium">{{$selectedCategory->description}}</p>
    @else
    <div class="relative flex flex-col sm:flex-row sm:items-end justify-between mb-10 md:mb-14 text-neutral-900">
        <div class="max-w-2xl">
            <h3 class="text-2xl sm:text-3xl md:text-4xl font-semibold">Najnowsze quizy 🎈</h3>
            <span class="mt-2 md:mt-3 font-normal block text-base md:text-xl text-neutral-500">Znajdź najlepszy dla Ciebie quiz i sprawdź co potrafisz!</span>
        </div>
    </div>
    @endif
    <div class="flex flex-col pb-5" x-data="{selected:null}">
        <div class="flex-1 sm:pr-5 overflow-hidden">
            <ul class="flex text-sm font-medium text-center text-neutral-500 pb-3 overflow-x-auto hiddenScrollbar">
                <li class="mr-2">
                    <a wire:click="setTab('all')"  class="inline-block px-5 py-2.5 rounded-full cursor-pointer {{ ($this->quiz_type == 'all') ? 'text-white bg-cyan-900' : 'hover:text-neutral-900 hover:bg-neutral-100' }}">Wszystko</a>
                </li>
                @foreach($quiz_types as $quiz_type)
                <li class="mr-2">
                    <a wire:click="setTab('{{ $quiz_type->id }}')"  class="transition duration-300 inline-block px-5 py-2.5 rounded-full whitespace-nowrap cursor-pointer {{ ($this->quiz_type == $quiz_type->id) ? 'text-white bg-cyan-900' : 'hover:text-neutral-900 hover:bg-neutral-100' }}">{{ $quiz_type->title }}</a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="flex justify-between">
            <button
                type="button"
                class="w-40 flex items-center justify-center rounded-full transition-colors text-sm px-4 py-2 sm:py-2.5 hover:border-neutral-300 text-neutral-700 border border-neutral-200"
                @click="selected !== 1 ? selected = 1 : selected = null">
                Kategorie
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-4 h-4 ml-2 -mr-1 opacity-70"><path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z" clip-rule="evenodd"></path></svg>
            </button>

            <div class="flex justify-center">
                <div
                    x-data="{
                        open: false,
                        toggle() {
                            if (this.open) {
                                return this.close()
                            }

                            this.$refs.button.focus()

                            this.open = true
                        },
                        close(focusAfter) {
                            if (! this.open) return

                            this.open = false

                            focusAfter && focusAfter.focus()
                        }
                    }"
                    x-on:keydown.escape.prevent.stop="close($refs.button)"
                    x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                    x-id="['dropdown-button']"
                    class="relative"
                >
                    <!-- Button -->
                    <button
                        x-ref="button"
                        x-on:click="toggle()"
                        :aria-expanded="open"
                        :aria-controls="$id('dropdown-button')"
                        type="button"
                        class="w-40 flex items-center justify-center rounded-full transition-colors text-sm px-4 py-2 sm:py-2.5 hover:border-neutral-300 text-neutral-700 border border-neutral-200"
                    >
                        {{ $this->fields[$this->sortField] }}

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-4 h-4 ml-2 -mr-1 opacity-70"><path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z" clip-rule="evenodd"></path></svg>
                    </button>

                    <!-- Panel -->
                    <div
                        x-ref="panel"
                        x-show="open"
                        x-transition.origin.top.left
                        x-on:click.outside="close($refs.button)"
                        :id="$id('dropdown-button')"
                        style="display: none;"
                        class="absolute left-0 z-20 mt-2">
                        <ul class="z-20 w-52 py-1 mt-2.5 overflow-auto text-sm text-neutral-900 bg-white rounded-2xl shadow-lg max-h-60 ring-1 ring-black ring-opacity-5 focus:outline-none dark:bg-neutral-900 dark:ring-neutral-700">
                            @foreach($this->fields as $key => $field)
                                <li wire:click="sortBy('{{ $key }}')" class="cursor-pointer select-none relative hover:text-primary-700 hover:bg-primary-50 py-2 pl-10 pr-4 {{ $this->sortField !== $key ?: 'text-primary-700 bg-primary-50'}}">
                                    <span class="font-normal block truncate">{{ $field }}</span>
                                    @if($this->sortField == $key)
                                    <span class="text-primary-700 absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-5 h-5">
                                            <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z" clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
            <div class="flex flex-wrap py-3">
                @foreach($categories as $category)
                <div class="flex items-center pl-3">
                    <input wire:click="selectCategory({{ $category->id }})" id="{{ $category->id }}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2" @if(in_array($category->id,$this->selectedCategories)) checked @endif>
                    <label for="{{ $category->id }}" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">{{ $category->title}}</label>
                </div>
                @endforeach
            </div>
            <span wire:click="resetCategories()" class="flex justify-end text-md text-neutral-600 cursor-pointer hover:text-neutral-700 hover:underline">Zresetuj</span>
        </div>
    </div>



    <div class="grid grid-cols-1 gap-x-2.5 gap-y-4 sm:gap-6 2xl:gap-8 grid-cols-1">
        @forelse($quizzes as $quiz)
        <div class="w-full">
            <div class="relative flex sm:items-center group p-2 sm:p-5 2xl:p-5 border border-neutral-200 rounded-lg rounded-3xl h-full">
                <a href="{{ route('quiz_show', $quiz->slug) }}" class="absolute inset-0"></a>
                <div class="flex flex-col flex-1">
                    <div class="space-y-2 sm:space-y-3.5 sm:mb-4">
                        <div class="flow-root">
                            <div class="flex flex-wrap space-x-2 -my-1">
                                <span class="transition-colors hover:text-white duration-300 inline-flex px-2.5 py-1 rounded-full font-medium text-xs relative my-1 text-[10px] sm:text-xs  text-[{{ $quiz->type->color}}] bg-[{{ $quiz->type->color}}]/10 hover:bg-[{{ $quiz->type->color}}]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />
                                      </svg>
                                    {{ $quiz->type->title }}
                                </span>
                                <a href="{{route('index', ['category' => $quiz->category->slug ])}}" class="transition-colors hover:text-white duration-300 inline-flex px-2.5 py-1 rounded-full font-medium text-xs relative my-1 text-[10px] sm:text-xs  text-[{{ $quiz->category->color}}] bg-[{{ $quiz->category->color}}]/10 hover:bg-[{{ $quiz->category->color}}]">{{ $quiz->category->title }}</a>
                            </div>
                        </div>
                        <div>
                            <h3 class="block font-semibold text-neutral-900 dark:text-neutral-100 text-sm sm:text-base lg:text-xl">
                                <a href="{{ route('quiz_show', $quiz->slug) }}" class="line-clamp-2" title="Ipsa sit dolores dolorum doloremque provident magnam">{{ $quiz->title}}</a>
                            </h3>
                            <div class="sm:mt-2">
                                <span class="text-neutral-500 dark:text-neutral-400 text-base line-clamp-1">
                                    <p>{{ $quiz->description }}</p>
                                </span>
                            </div>
                        </div>
                        <div class="inline-flex items-center text-neutral-800 dark:text-neutral-200 overflow-hidden text-xs w-full">
                            <a href="{{ route('user_profile', $quiz->user->username) }}" class="flex-shrink-0 relative flex items-center space-x-2 ">
                                <div class="relative flex-shrink-0 inline-flex items-center justify-center overflow-hidden z-0 text-neutral-100 uppercase font-semibold shadow-inner rounded-full h-5 w-5 sm:h-7 sm:w-7 text-xs sm:text-sm ring-1 ring-white/80 dark:ring-neutral-900">
                                    <img class="absolute inset-0 w-full h-full object-cover" src="{{ isset($quiz->user->avatar) ? asset($quiz->user->avatar) : asset("img/user-default.png") }}" alt="{{ isset($quiz->user->display_username) ? $quiz->user->display_username : $quiz->user->username }}">
                                    <span>n</span>
                                </div>
                                <span class="block text-neutral-700 hover:text-black dark:text-neutral-300 dark:hover:text-white font-medium">
                                    <span class="line-clamp-1"> {{ isset($quiz->user->display_username) ? $quiz->user->display_username : $quiz->user->username }}</span>
                                </span>
                            </a>
                            <span class="text-neutral-500 dark:text-neutral-400 mx-[6px] font-medium">·</span>
                            <span class="text-neutral-500 dark:text-neutral-400 font-normal ">
                                <span class="line-clamp-1">{{  $quiz->created_at->translatedFormat('d M Y')}}</span>
                            </span>
                        </div>
                    </div>
                    <div class="hidden sm:flex items-center flex-wrap justify-between mt-auto">
                        <div class="flex items-center space-x-2">
                            <div class="relative sm:min-w-[68px] rounded-full transition-colors duration-500 ease-in-out bg-neutral-50 hover:bg-red-100 text-neutral-600 hover:text-red-600 items-center justify-center px-2 h-7 sm:h-8 text-xs sm:text-sm focus:outline-none flex">
                                <div class="flex items-center justify-center transition" title="Super quiz!">
                                    <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11.995 7.23319C10.5455 5.60999 8.12832 5.17335 6.31215 6.65972C4.49599 8.14609 4.2403 10.6312 5.66654 12.3892L11.995 18.25L18.3235 12.3892C19.7498 10.6312 19.5253 8.13046 17.6779 6.65972C15.8305 5.18899 13.4446 5.60999 11.995 7.23319Z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>{{ $quiz->votes }}</span>
                                </div>
                            </div>
                            <div class="relative items-center min-w-[68px] rounded-full text-neutral-600 bg-neutral-50 transition-colors hover:bg-teal-50 hover:text-teal-600 hidden sm:flex  px-3 h-8 text-xs focus:outline-none" title="Komentarze">
                                <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.75 6.75C4.75 5.64543 5.64543 4.75 6.75 4.75H17.25C18.3546 4.75 19.25 5.64543 19.25 6.75V14.25C19.25 15.3546 18.3546 16.25 17.25 16.25H14.625L12 19.25L9.375 16.25H6.75C5.64543 16.25 4.75 15.3546 4.75 14.25V6.75Z"></path>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M9.5 11C9.5 11.2761 9.27614 11.5 9 11.5C8.72386 11.5 8.5 11.2761 8.5 11C8.5 10.7239 8.72386 10.5 9 10.5C9.27614 10.5 9.5 10.7239 9.5 11Z"></path>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M12.5 11C12.5 11.2761 12.2761 11.5 12 11.5C11.7239 11.5 11.5 11.2761 11.5 11C11.5 10.7239 11.7239 10.5 12 10.5C12.2761 10.5 12.5 10.7239 12.5 11Z"></path>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M15.5 11C15.5 11.2761 15.2761 11.5 15 11.5C14.7239 11.5 14.5 11.2761 14.5 11C14.5 10.7239 14.7239 10.5 15 10.5C15.2761 10.5 15.5 10.7239 15.5 11Z"></path>
                                </svg>
                                <span class="ml-1"> {{ $quiz->comments->count() }}</span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2 text-xs text-neutral-700 dark:text-neutral-300 ">
                            <span> {{ $quiz_questions = count($quiz->questions) }}
                                @if (($quiz_questions!= 12 AND $quiz_questions != 13 AND $quiz_questions != 14) AND (substr($quiz_questions , -1) == 2 OR substr($quiz_questions , -1) == 3 or substr($quiz_questions , -1) == 4))
                                pytania
                                @else
                                pytań
                                @endif
                            </span>
                            <div class="relative inline-block">
                                <div class="relative inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                      </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block flex-shrink-0 ml-2.5 sm:ml-5 w-4/12 max-w-[120px] sm:max-w-none sm:w-44 2xl:w-56">
                    <a href="{{ route('quiz_show', $quiz->slug) }}" class="w-full block aspect-h-16 aspect-w-16 rounded-lg sm:rounded-2xl overflow-hidden z-0">
                        <div class=" absolute inset-0 overflow-hidden z-0">
                            <img src="{{ isset($quiz->image->path) ? asset($quiz->image->path) : asset("uploads/images/no-image.jpg") }}" alt="{{ $quiz->title }}" class="object-cover w-full h-full group-hover:scale-105 duration-500 transition-transform">
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @empty
            @include('shared.nothing-we-found')
        @endforelse

        {{ $quizzes->links('shared.pagination') }}
    </div>
</div>
