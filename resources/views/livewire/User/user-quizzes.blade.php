<div class="relative pt-8">
    <div class="bg-blue-50 absolute top-0 inset-x-0 h-60 w-full"></div>
    <div class="container flex-col relative overflow-y-auto">
        <div class="px-4 md:px-10 mt-5">
            <div class="flex justify-between px-3 items-center">
                <h6 class="text-3xl sm:text-4xl font-semibold">
                    Twoje quizy
                </h6>
                <a href="{{route('select_quiz_type')}}"
                        class="shadow inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-5 rounded-full transition ease-in-out hover:scale-105 duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><rect x="0" y="0" width="24" height="24" stroke="none"></rect><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    Utwórz nowy
                </a>
            </div>
            <div x-data="{ activeBulkDelete: @entangle('activeBulkDelete') }"  class="bg-white my-10 shadow-2xl rounded-2xl ">
                <div class="flex justify-between px-4 py-3">
                    <div class="flex items-center">
                        <span class="ml-2 mr-3 normal-case font-normal text-xs text-slate-400">
                        Ilość quizów <br> na stronie:
                        </span>
                        <select wire:model="perPage" class="xl:w-16 form-select-sm appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-gray-300 rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                            <option>100</option>
                        </select>
                    </div>
                    <div class="flex justify-center items-center relative xl:w-96">
                        <svg width="20" height="20" fill="currentColor" class="absolute left-3 top-1/2 -mt-2.5 text-slate-400 pointer-events-none group-focus-within:text-blue-500"><path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"></path></svg>
                        <input wire:model="search" type="search" aria-label="Filter projects" placeholder="Szukaj ..." class="appearance-none w-full text-sm leading-6 bg-transparent text-slate-900 placeholder:text-slate-400 rounded-md py-2 pl-10 border-gray-300 shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>
                </div>
                <table class="items-center w-full bg-white border-collapse rounded-lg">
                    <thead>
                    <tr class="border border-x-0 border-blue-100 bg-blue-50 text-slate-500 text-base uppercase whitespace-nowrap text-left font-semibold">
                        <th class="px-6 py-3">Nazwa</th>
                        <th class="px-6 py-3">TYP</th>
                        <th class="px-6 py-3">INFO</th>
                        <th class="px-6 py-3">Data</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($quizzes as $quiz)
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-36 flex-shrink-0">
                                        <img src="{{ isset($quiz->image->path) ? asset($quiz->image->path) : asset("uploads/images/no-image.jpg") }}" class=" rounded-xl"/>
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-bold text-neutral-600 line-clamp-2">
                                            {{ $quiz->title }}
                                        </p>
                                        <span class="text-neutral-400 line-clamp-1">
                                            {{  \Illuminate\Support\Str::limit( $quiz->description, 30 ) }}
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="transition-colors hover:text-white duration-300 inline-flex px-2.5 py-1 rounded-full whitespace-nowrap font-medium text-xs relative my-1 text-[10px] sm:text-xs  text-[{{ $quiz->type->color }}] bg-[{{ $quiz->type->color }}]/10 hover:bg-[{{ $quiz->type->color }}]">{{ $quiz->type->title }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-5">
                                    <div class="flex flex-col text-left text-slate-500">
                                        <span class="font-bold">{{ $quiz->questions->count() }}</span>
                                        <span> pytań </span>
                                    </div>
                                    <div class="flex flex-col text-left text-slate-500">
                                        <span class="font-bold">{{ $quiz->results->count() }}</span>
                                        <span> rozwiązań </span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-blue-500">
                                    {{ humanize_date($quiz->created_at) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex justify-end">
                                    <a href="{{ route('edit_quiz', ['quiz_slug' => $quiz->slug])}}" class="flex items-center text-blue-500 hover:text-blue-400 mr-3" @popper(Edycja)>
                                        <svg stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" fill="none" class="lucide lucide-trash-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>

                                    <button type="button" wire:click="deleteConfrim({{ $quiz->id }})" class="flex items-center text-red-500 hover:text-red-400" @popper(Usuń)>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-5 h-5 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <!-- component -->
                                <div class="lg:px-24 md:px-44 px-4 py-5 items-center flex justify-center flex-col-reverse lg:flex-row md:gap-28 gap-16">
                                    <div class="xl:pt-24 w-full xl:w-1/2 relative pb-12 lg:pb-0">
                                        <div class="relative">
                                            <div class="absolute">
                                                <div class="">
                                                    <h1 class="my-2 text-gray-800 font-bold text-2xl">
                                                        Nie znaleziono wyników :(
                                                    </h1>
                                                    <p class="my-2 text-gray-800">Spróbuj użyć innych filtrów lub dodaj rekordy do bazy danych</p>
                                                </div>
                                            </div>
                                            <div>
                                                <img src="https://i.ibb.co/G9DC8S0/404-2.png" />
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="{{ asset('img/no-results-found.jpg') }}" class="h-96"/>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="p-3 border-t border-gray-100">
                    {{ $quizzes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
