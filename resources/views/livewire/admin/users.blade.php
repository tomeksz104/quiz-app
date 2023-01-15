<div class="relative pt-8">
    <div class="bg-blue-50 absolute top-0 inset-x-0 h-60 w-full"></div>
    <div class="container flex-col relative overflow-y-auto">
        <div class="px-4 md:px-10 mt-5">
            <div class="flex justify-between px-3 items-center">
                <h6 class="text-3xl sm:text-4xl font-semibold">
                    Lista użytkowników
                </h6>
                <button wire:click='$emit("openModal", "admin.modals.user-create-update", {{ json_encode(["updateMode" => true]) }})'
                        class="shadow inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-5 rounded-full transition ease-in-out hover:scale-105 duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><rect x="0" y="0" width="24" height="24" stroke="none"></rect><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    Dodaj użytkownika
                </button>
            </div>
            <div x-data="{ activeBulkDelete: @entangle('activeBulkDelete') }"  class="bg-white my-10 shadow-2xl rounded-2xl ">
                <div class="flex justify-between px-4 py-3">
                    <div class="flex items-center">
                        <button wire:click="deleteConfrim()" type="button" class="flex h-10 text-gray-500 hover:text-red-500 bg-white focus:ring-2 focus:ring-red-300 mr-5 rounded-lg border border-gray-200 px-2 py-2 hover:border-red-300 hover:fill-current hover:text-red-600 focus:outline-none"  :class="!activeBulkDelete ? 'opacity-50 cursor-not-allowed' : ''">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            <div class="overflow-hidden max-w-0 transition-[max-width,padding] ease-in-out duration-700" :class="activeBulkDelete ? 'max-w-[70px] pl-2' : ''">
                                <span class="flex items-center w-[70px] rounded text-xs uppercase font-semibold leading-5">
                                    Usuń ({{ count($selectedUsers) }})
                                </span>
                            </div>
                        </button>
                        <span class="ml-2 mr-3 normal-case font-normal text-xs text-slate-400">
                        Ilość użytkowników <br> na stronie:
                        </span>
                        <select wire:model="perPage" class="xl:w-16 form-select-sm appearance-noneblock w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-gray-300 rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
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
                <table class="items-center w-full bg-white border-collapse">
                    <thead>
                    <tr class="border border-x-0 border-blue-100 bg-blue-50 text-slate-500 text-base uppercase whitespace-nowrap text-left font-semibold">
                        <th class="px-6 py-0">
                            <input wire:model="selectAll" type="checkbox" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                            ID
                        </th>
                        <th class="px-6 py-3">Username</th>
                        <th class="px-6 py-3">Imię</th>
                        <th class="px-6 py-3">email</th>
                        <th class="px-6 py-3">Rola</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($users as $user)
                        <tr class="text-slate-500 hover:bg-slate-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <input wire:click="addSelectedUser({{ $user->id }})" id="selectedCategories" type="checkbox" class=" appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" @if(in_array($user->id, $selectedUsers)) checked @endif >
                                    <span class="text-xs text-slate-400">
                                        {{ $user->id }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span>
                                  {{ $user->username }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span>
                                  {{ $user->name }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span>
                                  {{ $user->email }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span>
                                  {{ $user->role }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex justify-end">
                                    <button wire:click='$emit("openModal", "admin.modals.user-create-update", {{ json_encode(["updateMode" => false, "user" => $user->id]) }})' class="flex items-center text-slate-500 hover:text-slate-400 mr-3"  @popper(Podgląd)>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                    <button wire:click='$emit("openModal", "admin.modals.user-create-update", {{ json_encode(["updateMode" => true, "user" => $user->id]) }})' class="flex items-center text-blue-500 hover:text-blue-400 mr-3" @popper(Edycja)>
                                        <svg stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" fill="none" class="lucide lucide-trash-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </button>
                                    <button type="button"
                                            wire:click="deleteConfrim({{ $user->id }})"
                                            class="flex items-center text-red-500 hover:text-red-400" @popper(Usuń)>
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
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
