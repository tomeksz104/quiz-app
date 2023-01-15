{{-- <div class="text-base">
    <div class="relative">
        <h3 class="py-3 mb-3 border-b-2 border-sky-50 text-xl after:bg-sky-300 after:-bottom-0 after:h-0.5 after:left-0 after:absolute after:w-14">
            Popularne quizy
        </h3>
    </div>
    <ul class="[&>*]:p-2 [&>*]:bg-white " role="list">
        @foreach($popularQuizzes as $quiz)
            <li class="flex items-center">
                <a href="{{ route('quiz_show', $quiz->slug) }}" class="flex-shrink-0 h-20 w-20">
                    <img class="h-full w-full object-cover rounded-full"
                         src="{{ isset($quiz->image->path) ? asset($quiz->image->path) : asset("uploads/images/no-image.jpg") }}" alt="">
                </a>
                <div class="ml-3 overflow-hidden">
                    <a href="{{ route('quiz_show', $quiz->slug) }}"
                       class="text-slate-600 hover:text-slate-400">
                        <p class="font-semibold">{{ $quiz->title }}</p>
                    </a>
                    <p class="text-sm font-normal text-slate-400 truncate">{{ $quiz->created_at }}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div> --}}


<div class="rounded-3xl overflow-hidden bg-neutral-100 dark:bg-neutral-800">
	<div class="flex items-center justify-between p-4 xl:p-5 border-b border-neutral-200">
		<h4 class="text-lg text-neutral-900 font-semibold flex-grow">Popularne quizy</h4>
	</div>
	<div class="flex flex-col divide-y divide-neutral-200">
		@foreach($popularQuizzes as $quiz)
        <div class="relative flex justify-between sm:items-center p-4 xl:px-5 xl:py-6 hover:bg-neutral-200">
			<a href="{{ route('quiz_show', $quiz->slug)}}" class=" absolute inset-0" title="{{ $quiz->title }}"></a>
			<div class="grid grid-cols-1 relative space-y-2 overflow-hidden flex-grow">
				<div class="inline-flex items-center text-neutral-800 dark:text-neutral-200 overflow-hidden text-xs leading-none" data-nc-id="PostCardMeta">
					<a href="{{ route('user_profile', $quiz->user->username)}}" class="flex-shrink-0 relative flex items-center space-x-2 ">
						<div class="relative flex-shrink-0 inline-flex items-center justify-center overflow-hidden z-0 text-neutral-100 uppercase font-semibold shadow-inner rounded-full h-5 w-5 sm:h-7 sm:w-7 text-xs sm:text-sm ring-1 ring-white/80">
							<img class="absolute inset-0 w-full h-full object-cover" src="{{ isset($quiz->user->avatar) ? asset($quiz->user->avatar) : asset("img/user-default.png") }}" alt="{{ isset($quiz->user->display_username) ? $quiz->user->display_username : $quiz->user->username }}">
						</div>
						<span class="block text-neutral-700 hover:text-black font-medium ">
							<span class="line-clamp-1"> {{ isset($quiz->user->display_username) ? $quiz->user->display_username : $quiz->user->username }}</span>
						</span>
					</a>
					<span class="text-neutral-500 mx-[6px] font-medium">·</span>
					<span class="text-neutral-500 font-normal ">
						<span class="line-clamp-1">{{  $quiz->created_at->translatedFormat('d M Y')}}</span>
					</span>
				</div>
				<h3 class="block text-sm sm:text-base font-semibold text-neutral-900">
					<a href="{{ route('quiz_show', $quiz->slug)}}" class="line-clamp-2" title="{{ $quiz->title }}">{{ $quiz->title }}</a>
				</h3>
			</div>
			<a href="{{ route('quiz_show', $quiz->slug)}}" title="{{ $quiz->title }}" class="block w-16 sm:w-20 flex-shrink-0 relative ml-4 ">
				<div class="overflow-hidden z-0">
					<img src="{{ isset($quiz->image->path) ? asset($quiz->image->path) : asset("uploads/images/no-image.jpg") }}" alt="{{ $quiz->title }}" class="object-cover aspect-1 rounded-lg hover:opacity-90 transition-opacity">
				</div>
			</a>
		</div>
        @endforeach
	</div>
</div>
