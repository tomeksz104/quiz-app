<footer class="mt-28 grid md:grid-cols-2 flex items-end">
	<div class="relative py-10 md:py-36 md:pr-32 z-0 bg-gradient-to-bl rounded-tr-2xl from-cyan-600 to-blue-600 before:absolute before:w-full before:h-full before:top-0 before:left-0 before:bg-[url('https://icode.lucian.host/img/pattern-1.png')] before:opacity-40 before:content-[''] before:rounded-tr-2xl before:z-10">
		<div class="relative mx-auto max-w-xl px-3 z-10">
			<a href="/" aria-label="Go home" title="quizuj.my" class="justify-center mx-auto">
				<img src="{{ asset($website_logo) }}" alt="quiz app" class="h-10 drop-shadow-[4px_1px_12px_rgba(255,255,255,0.25)]">
			</a>
			<div class="mt-4">
				<p class="text-sm text-neutral-100"> {{ $website_about_footer }} </p>
			</div>
		</div>
	</div>
	<div class="flex flex-col relative w-full bg-[url('https://icode.lucian.host/img/pattern-2.jpg')] bg-center bg-no-repeat	bg-cover z-[1] before:content-[''] before:absolute before:left-0 before:top-0 before:h-full before:w-full before:-z-[1] before:bg-slate-900 before:opacity-80 text-white px-4 md:px-24 pt-16">
		<div class="grid md:grid-cols-2 gap-5 row-gap-8 lg:col-span-2 md:grid-cols-2">
			<div>
				<p class="font-semibold text-xl tracking-wide ">Kategorie</p>
				<div class="mt-3 mb-5 h-[3px]  w-[115px] bg-white/10"></div>
				<ul class="mt-2 space-y-2">
                    @foreach($categories_footer as $category)
					<li>
						<a href="{{route('index', ['category' => $category->slug ])}}" class="text-neutral-400 hover:text-neutral-300">{{ $category->title }}</a>
					</li>
                    @endforeach
				</ul>
			</div>
			<div>
				<p class="font-semibold text-xl tracking-wide">Social media</p>
				<div class="mt-3 mb-5 h-[3px]  w-[115px] bg-white/10"></div>
				<div class="flex gap-3 ">
                    @if(!empty($website_facebook))
					<a href="{{ $website_facebook }}" class="inline-block p-3 mb-2  uppercase rounded-full hover:scale-110 transition-transform " style="background-color: rgb(24, 119, 242);">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-4 h-4">
							<path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path>
						</svg>
					</a>
                    @endif
                    @if(!empty($website_instagram))
					<a href="{{ $website_instagram }}" class="inline-block p-3 mb-2  uppercase rounded-full hover:scale-110 transition-transform " style="background-color: rgb(193, 53, 132);">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4 h-4">
							<path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
						</svg>
					</a>
                    @endif
                    @if(!empty($website_twitch))
					<a href="{{ $website_twitch }}" class="inline-block p-3 mb-2  uppercase rounded-full hover:scale-110 transition-transform " style="background-color: rgb(145, 70, 255);">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4">
							<path fill="currentColor" d="M391.17,103.47H352.54v109.7h38.63ZM285,103H246.37V212.75H285ZM120.83,0,24.31,91.42V420.58H140.14V512l96.53-91.42h77.25L487.69,256V0ZM449.07,237.75l-77.22,73.12H294.61l-67.6,64v-64H140.14V36.58H449.07Z"></path>
						</svg>
					</a>
                    @endif
                    @if(!empty($website_twitter))
					<a href="{{ $website_twitter }}" class="inline-block p-3 mb-2  uppercase rounded-full hover:scale-110 transition-transform " style="background-color: rgb(29, 161, 242);">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4">
							<path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
						</svg>
					</a>
                    @endif
				</div>
			</div>
		</div>
		<p class="text-sm text-center pt-10 mb-3 "> {{ $website_copyright}} </p>
	</div>
</footer>
