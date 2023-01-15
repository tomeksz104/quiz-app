<div class="rounded-3xl mt-6 overflow-hidden bg-neutral-100">
	<div class="flex items-center justify-between p-4 xl:p-5 border-b border-neutral-200">
		<h4 class="text-lg text-neutral-900 dark:text-neutral-100 font-semibold flex-grow">Popularne kategorie</h4>
	</div>
	<div class="flow-root">
		<div class="flex flex-wrap p-4 xl:p-5 gap-2">
			@foreach($popularCategories as $category)
                <a href="{{ route('index', ['category' => $category->slug ]) }}" class="transition-colors hover:text-white duration-300 inline-flex px-2.5 py-1 rounded-full font-medium text-xs relative my-1 text-[10px] sm:text-xs text-[{{ $category->color}}] bg-[{{ $category->color}}]/10 hover:bg-[{{ $category->color}}]">{{ $category->title }}</a>
            @endforeach
		</div>
	</div>
</div>
