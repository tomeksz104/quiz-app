<div>
    <div class="relative">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 absolute text-neutral-500 mt-[1px] left-3 top-1/2 transform -translate-y-1/2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
          </svg>
    	<input wire:model="search" type="search" class="block w-full border-neutral-200 focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 bg-white dark:border-neutral-700 dark:focus:ring-primary-6000 dark:focus:ring-opacity-25 dark:bg-neutral-900 rounded-2xl  text-sm font-normal px-4 py-5 pl-12 shadow-none !ring-0 !border-0 dark:bg-neutral-700" placeholder="Wpisz wyszukiwaną frazę">
    </div>

    <div class="bg-white dark:bg-neutral-800">
        <div class="max-h-[70vh] overflow-y-auto border-t border-neutral-200 dark:border-neutral-700">
            <div class="grid grid-cols-1 divide-y divide-neutral-200 dark:divide-neutral-700">

                @if(!empty($this->search))
                    @foreach($searchResults as $searchResult)
                        <div class="relative flex justify-between sm:items-center p-4 hover:bg-neutral-100 dark:hover:bg-neutral-700">
                            <a href="{{ $searchResult->url }}" class=" absolute inset-0" title="{{ $searchResult->title }}"></a>
                            <div class="grid grid-cols-1 relative space-y-2 overflow-hidden flex-grow">
                                <div class="inline-flex items-center text-neutral-800 dark:text-neutral-200 overflow-hidden text-xs leading-none">
                                    <a href="{{ route('user_profile', ['username' => $searchResult->searchable->user->username ])}}" class="flex-shrink-0 relative flex items-center space-x-2 ">
                                        <div class="relative flex-shrink-0 inline-flex items-center justify-center overflow-hidden z-0 text-neutral-100 uppercase font-semibold shadow-inner rounded-full h-5 w-5 sm:h-7 sm:w-7 text-xs sm:text-sm ring-1 ring-white/80 dark:ring-neutral-900">
                                            <img class="absolute inset-0 w-full h-full object-cover" src="{{ isset($quiz->user->avatar) ? asset($quiz->user->avatar) : asset("img/user-default.png") }}" alt="{{ empty($searchResult->searchable->user->display_username) ? $searchResult->searchable->user->username : $searchResult->searchable->user->display_username }}">
                                        </div>
                                        <span class="block text-neutral-700 hover:text-black dark:text-neutral-300 dark:hover:text-white font-medium">
                                            <span class="line-clamp-1">
                                                @if(empty($searchResult->searchable->user->display_username))
                                                    {{ $searchResult->searchable->user->username }}
                                                @else
                                                    {{ $searchResult->searchable->user->display_username }}
                                                @endif
                                            </span>
                                        </span>
                                    </a>
                                    <span class="text-neutral-500 dark:text-neutral-400 mx-[6px] font-medium">·</span>
                                    <span class="text-neutral-500 dark:text-neutral-400 font-normal ">
                                        <span class="line-clamp-1">
                                            {{ $searchResult->searchable->created_at->translatedFormat('d M Y') }}
                                        </span>
                                    </span>
                                </div>
                                <h3 class="block text-sm sm:text-base font-semibold text-neutral-900 dark:text-neutral-100">
                                    <a href="{{ $searchResult->url }}" class="line-clamp-2" title="{{ $searchResult->title }}">{{ $searchResult->title }}</a>
                                </h3>
                            </div>
                            <a href="{{ $searchResult->url }}" title="{{ $searchResult->title }}" class="block w-16 sm:w-20 flex-shrink-0 relative ml-4 ">
                                <div class="overflow-hidden z-0">
                                    <img src="{{ isset($searchResult->searchable->image->path) ? asset($searchResult->searchable->image->path) : asset("uploads/images/default-quiz-thumbnail.jpg") }}" alt="{{ $searchResult->title }}" class="object-cover aspect-1 rounded-lg hover:opacity-90 transition-opacity">
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
