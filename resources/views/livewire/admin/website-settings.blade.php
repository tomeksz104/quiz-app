<div class="container relative px-4 mt-5 pt-10 pb-16 lg:px-10 lg:pt-14 lg:pb-24">
	<div class="mx-auto">
		<div class="max-w-2xl">
			<h2 class="text-3xl sm:text-4xl font-semibold"> Ustawienia konta </h2>
			<span class="block mt-3 text-neutral-500 dark:text-neutral-400"> Możesz ustawić preferowaną nazwę wyświetlaną, hasło i zarządzać innymi ustawieniami osobistymi. </span>
		</div>
		<div class="w-full my-10 border-b-2 border-neutral-100"></div>
		<div class="flex flex-col justify-center">
			<div class="flex flex-col md:flex-row" x-data="{tab: 1}">
				<div class="flex flex-col justify-start w-full sm:w-1/4 space-y-4 text-neutral-500">
					<a class="px-4 py-2 text-sm" :class="{'border-l-2 transform translate-x-2 border-blue-500 text-neutral-900 font-bold': tab === 1, ' transform -translate-x-2': tab !== 1}" href="#" @click.prevent="tab = 1"> Ustawienia strony </a>
					<a class="px-4 py-2 text-sm" :class="{'border-l-2 transform translate-x-2 border-blue-500 text-neutral-900 font-bold': tab === 2, ' transform -translate-x-2': tab !== 2}" href="#" @click.prevent="tab = 2" @click.prevent="tab = 2"> Domyślne wyniki </a>
                    <a class="px-4 py-2 text-sm" :class="{'border-l-2 transform translate-x-2 border-blue-500 text-neutral-900 font-bold': tab === 3, ' transform -translate-x-2': tab !== 3}" href="#" @click.prevent="tab = 3" @click.prevent="tab = 2"> Social media </a>
					<div class="w-full border-b-2 border-neutral-100 dark:border-neutral-700"></div>
				</div>
				<div class="flex-grow mt-10 md:mt-0 xl:pl-16 max-w-3xl ">
					<div class="space-y-6" x-show="tab === 1">
						<form wire:submit.prevent="submit" class="space-y-5 sm:space-y-6 md:sm:space-y-7">
                            @csrf
                            <div x-show="tab === 1" x-transition:enter="transition duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<h2 class="text-2xl font-semibold">Ustawienia strony</h2>
								<span class="block mt-1 text-sm text-neutral-500 dark:text-neutral-400">Skonfiguruj podstawowe dane witryny takie jak logo, nazwa, o nas, copyright.</span>
							</div>
							<div class="w-24 border-b border-neutral-200 dark:border-neutral-700" x-show="tab === 2" x-transition:enter="transition duration-500 transform ease-in" x-transition:enter-start="opacity-0"></div>
							<div class="inline-flex flex-col" x-show="tab === 1" x-transition:enter="transition delay-100 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Logo</span>
								<div class="mt-1.5 flex-1">
									<div wire:loading.class="animate-pulse" wire:target="uploaded_logo" class="relative block group cursor-pointer mt-1 flex justify-center border-2 border-neutral-300 border-dashed rounded-xl px-6 pt-5 pb-6 ">
										<div class="flex-1 space-y-1 text-center">
                                            @if($this->uploaded_logo || isset($this->logo)) <div class="w-full max-w-md mx-auto">
												<div class="w-full aspect-w-16 aspect-h-8">
													<img src="{{ isset($this->logo) ? asset($this->logo) : $this->uploaded_logo->temporaryUrl() }}" class="rounded-lg object-contain shadow-lg" alt="">
												</div>
											</div>
											<div wire:click="deleteLogo" class="opacity-0 group-hover:opacity-100 absolute right-2.5 top-2.5 z-10 p-1.5 bg-neutral-900 dark:bg-neutral-700 text-white rounded-md cursor-pointer transition-opacity duration-300 " title="Usuń zdjęcie">
												<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
													<path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M18.85 9.14001L18.2 19.21C18.09 20.78 18 22 15.21 22H8.79002C6.00002 22 5.91002 20.78 5.80002 19.21L5.15002 9.14001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M10.33 16.5H13.66" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M9.5 12.5H14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
											</div>
                                            @else
                                            <svg class="mx-auto h-12 w-12 text-neutral-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
												<path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
                                            @endif
                                            <div class="flex justify-center text-sm text-neutral-500">
												<label class="relative flex-shrink-0 cursor-pointer  rounded-md font-medium text-indigo-600 hover:text-indigo-500">
													<span wire:loading.class="hidden" wire:target="uploaded_logo">{{ $this->uploaded_logo || isset($this->logo) ? 'Kliknij, aby zmienić' : 'Prześlij plik' }}</span>
													<input type="file" wire:model="uploaded_logo" name="uploaded_logo" class="sr-only">
													<div wire:loading wire:target="uploaded_logo">
														<div class="inline-flex items-center justify-center ml-3 text-blue-600 ">
															<svg class="animate-spin w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
																<circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3"></circle>
																<path class="opacity-90" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
															</svg>
														</div>
													</div>
												</label>
											</div>
											<p class="text-xs text-neutral-500"> SVG, PNG, JPG lub GIF (max. 2MB) </p>
										</div>
									</div>
								</div>
							</div>
                            @error('uploaded_logo') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
                            <div class="inline-flex flex-col" x-show="tab === 1" x-transition:enter="transition delay-200 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Favicon</span>
								<div class="mt-1.5 flex-1">
									<div wire:loading.class="animate-pulse" wire:target="uploaded_favicon" class="relative block group cursor-pointer mt-1 flex justify-center border-2 border-neutral-300 border-dashed rounded-xl px-6 pt-5 pb-6 ">
										<div class="flex-1 space-y-1 text-center">
                                            @if($this->uploaded_favicon || isset($this->favicon)) <div class="w-full max-w-md mx-auto">
												<div class="w-full aspect-w-16 aspect-h-8">
													<img src="{{ isset($this->favicon) ? asset($this->favicon) : $this->uploaded_favicon->temporaryUrl() }}" class="rounded-lg object-contain shadow-lg" alt="">
												</div>
											</div>
											<div wire:click="deleteFavicon" class="opacity-0 group-hover:opacity-100 absolute right-2.5 top-2.5 z-10 p-1.5 bg-neutral-900 dark:bg-neutral-700 text-white rounded-md cursor-pointer transition-opacity duration-300 " title="Usuń zdjęcie">
												<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
													<path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M18.85 9.14001L18.2 19.21C18.09 20.78 18 22 15.21 22H8.79002C6.00002 22 5.91002 20.78 5.80002 19.21L5.15002 9.14001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M10.33 16.5H13.66" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M9.5 12.5H14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
											</div>
                                            @else <svg class="mx-auto h-12 w-12 text-neutral-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
												<path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
                                            @endif
                                            <div class="flex justify-center text-sm text-neutral-500">
												<label class="relative flex-shrink-0 cursor-pointer  rounded-md font-medium text-indigo-600 hover:text-indigo-500">
													<span wire:loading.class="hidden" wire:target="uploaded_favicon">{{ $this->uploaded_favicon || isset($this->favicon) ? 'Kliknij, aby zmienić' : 'Prześlij plik' }}</span>
													<input type="file" wire:model="uploaded_favicon" name="uploaded_favicon" class="sr-only">
													<div wire:loading wire:target="uploaded_favicon">
														<div class="inline-flex items-center justify-center ml-3 text-blue-600 ">
															<svg class="animate-spin w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
																<circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3"></circle>
																<path class="opacity-90" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
															</svg>
														</div>
													</div>
												</label>
											</div>
											<p class="text-xs text-neutral-500"> SVG, PNG, JPG lub GIF (max. 2MB) </p>
										</div>
									</div>
								</div>
							</div>
                            @error('uploaded_favicon') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
							<div x-show="tab === 1" x-transition:enter="transition delay-300 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Tytuł strony</span>
								<input wire:model="page_title" type="text" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none  " value="Quizy online">
                                @error('page_title') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
							</div>
							<div x-show="tab === 1" x-transition:enter="transition delay-400 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">O nas</span>
								<span class="text-xs text-neutral-500 dark:text-neutral-400">Wyświetlane w stopce.</span>
								<textarea wire:model="about_footer" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none  " rows="5" placeholder="Quzujmy to portal zapewniający świetną rozrywkę. Każdy użytkownik może utworzyć swój quiz, a przy odrobinie szczęścia trafi on na stronę główną! Nauka i zabawa w pigułce!"></textarea>
                                @error('about_footer') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
							</div>
                            <div x-show="tab === 1" x-transition:enter="transition delay-500 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Copyright</span>
								<span class="text-xs text-neutral-500 dark:text-neutral-400">Wyświetlane w stopce.</span>
								<textarea wire:model="copyright" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none  " rows="3" placeholder="© Copyright 2020 Quizujmy. All rights reserved."></textarea>
                                @error('copyright') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
							</div>
							<div class="inline-flex pt-2" x-show="tab === 1" x-transition:enter="transition delay-600 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<button type="submit" class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium px-4 py-3 sm:px-6 disabled:bg-opacity-70 bg-blue-600 hover:bg-blue-700 text-neutral-50 w-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 dark:focus:ring-offset-0">Zapisz</button>
							</div>
						</form>
					</div>
					<div class="space-y-6" x-show="tab === 2">
                        <div x-show="tab === 2" x-transition:enter="transition duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                            <h2 class="text-2xl font-semibold">Domyślne wyniki</h2>
                            <span class="block mt-1 text-sm text-neutral-500 dark:text-neutral-400">Skonfiguruj domyślne odpowiedzi w zależności uzyskanego wyniku.</span>
                        </div>
                        <div x-show="tab === 2" x-transition:enter="transition delay-100 duration-500 transform ease-in" x-transition:enter-start="opacity-0" class="bg-white mx-auto">
                            <ul class="space-y-3">
                                @foreach($this->result_messages as $result_message)
                                <li class="relative border border-neutral-300 hover:border-blue-300 rounded-xl" x-data="{selected:null}">
                                    <div class="flex items-center grid grid-cols-5 p-3">
                                        @if(isset($result_message->image->path))
                                        <div class="aspect-w-4 aspect-h-3">
                                            <img src="{{ asset($result_message->image->path) }}" class="object-cover rounded-2xl">
                                        </div>
                                        @else
                                        <div class="relative block group cursor-pointer mt-1 flex justify-center border-2 border-neutral-300 border-dashed rounded-xl px-6 pt-5 pb-6 ">
                                            <div class="flex-1 space-y-1 text-center">
                                                 <svg class="mx-auto h-12 w-12 text-neutral-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="ml-3 col-span-3">
                                            <p class="font-medium text-gray-600 text-md sm:text-xl">{{ $result_message->title}}</p>
                                            <span class="hidden text-base sm:block">{{ $result_message->description }}</span>
                                        </div>
                                        <span class="ml-auto text-md sm:text-xl font-medium">{{ $result_message->rating_from }}%</span>
                                    </div>
                                    <div class="absolute right-2.5 top-2.5 transition duration-300 " title="Akcje">
                                        <div x-data="{ open: false }" class=" relative">
                                            <button class="inline-flex justify-center rounded-full p-2 bg-white text-gray-700 hover:bg-neutral-100 focus:outline-none" @click="open = true">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"></path>
                                                </svg>
                                            </button>
                                            <div class="absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5" x-show="open" @click.away="open = false">
                                                <div class="bg-white py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                                    <button wire:click='$emit("openModal", "admin.modals.result-message-create-update", {{ json_encode(["result_message" => $result_message->id]) }})' class="w-full flex justify-start px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Edytuj</button>
                                                    <button wire:click="deleteConfrim({{ $result_message->id }})" class="w-full flex justify-start px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Usuń</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <div class="w-full mt-5 p-3 bg-blue-100 flex justify-center text-blue-500 cursor-pointer hover:text-blue-600 hover:bg-blue-200">
                                <button wire:click='$emit("openModal", "admin.modals.result-message-create-update")' class="font-semibold"> Dodaj nowy +</button>
                            </div>
                        </div>
					</div>
					<div class="space-y-6" x-show="tab === 3">
						<form wire:submit.prevent="submit" class="space-y-5 sm:space-y-6 md:sm:space-y-7">
                            @csrf
                            <div x-show="tab === 3" x-transition:enter="transition duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<h2 class="text-2xl font-semibold">Media społecznościowe</h2>
								<span class="block mt-1 text-sm text-neutral-500 dark:text-neutral-400">Dodaj linki do mediów społecznościowych </span>
							</div>
							<div class="w-24 border-b border-neutral-200 dark:border-neutral-700" x-show="tab === 4" x-transition:enter="transition duration-500 transform ease-in" x-transition:enter-start="opacity-0"></div>
							<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
								<div x-show="tab === 3" x-transition:enter="transition delay-100 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
									<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Youtube</span>
									<div class="mt-1.5 flex">
										<span class="inline-flex items-center px-2.5 rounded-l-lg border border-r-0 border-neutral-200 dark:border-neutral-700 bg-neutral-50 dark:bg-neutral-800 text-neutral-500 dark:text-neutral-400 text-sm">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-6 h-6" fill="currentColor"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path></svg>
										</span>
										<input wire:model="youtube" type="text" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none !rounded-l-none" placeholder="https://www.youtube.com/channel/yourname">
									</div>
                                    @error('youtube') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
								</div>
								<div x-show="tab === 3" x-transition:enter="transition delay-200 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
									<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Facebook</span>
									<div class="mt-1.5 flex">
										<span class="inline-flex items-center px-2.5 rounded-l-lg border border-r-0 border-neutral-200 dark:border-neutral-700 bg-neutral-50 dark:bg-neutral-800 text-neutral-500 dark:text-neutral-400 text-sm">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-6 h-6" fill="currentColor"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>
										</span>
										<input wire:model="facebook" type="text" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none   !rounded-l-none" placeholder="https://www.facebook.com/yourname">
									</div>
                                    @error('facebook') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
								</div>
								<div x-show="tab === 3" x-transition:enter="transition delay-300 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
									<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Twitter</span>
									<div class="mt-1.5 flex">
										<span class="inline-flex items-center px-2.5 rounded-l-lg border border-r-0 border-neutral-200 dark:border-neutral-700 bg-neutral-50 dark:bg-neutral-800 text-neutral-500 dark:text-neutral-400 text-sm">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6" fill="currentColor"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg>
										</span>
										<input wire:model="twitter" type="text" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none   !rounded-l-none" placeholder="https://twitter.com/yourname">
									</div>
                                    @error('twitter') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
								</div>
								<div x-show="tab === 3" x-transition:enter="transition delay-400 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
									<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Instagram </span>
									<div class="mt-1.5 flex">
										<span class="inline-flex items-center px-2.5 rounded-l-lg border border-r-0 border-neutral-200 dark:border-neutral-700 bg-neutral-50 dark:bg-neutral-800 text-neutral-500 dark:text-neutral-400 text-sm">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6 h-6" fill="currentColor"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
										</span>
										<input wire:model="instagram" type="text" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none   !rounded-l-none" placeholder="https://instagram.com/yourname">
									</div>
                                    @error('instagram') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
								</div>
								<div x-show="tab === 3" x-transition:enter="transition delay-500 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
									<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Twitch </span>
									<div class="mt-1.5 flex">
										<span class="inline-flex items-center px-2.5 rounded-l-lg border border-r-0 border-neutral-200 dark:border-neutral-700 bg-neutral-50 dark:bg-neutral-800 text-neutral-500 dark:text-neutral-400 text-sm">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6" fill="currentColor"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M391.17,103.47H352.54v109.7h38.63ZM285,103H246.37V212.75H285ZM120.83,0,24.31,91.42V420.58H140.14V512l96.53-91.42h77.25L487.69,256V0ZM449.07,237.75l-77.22,73.12H294.61l-67.6,64v-64H140.14V36.58H449.07Z"/></svg>
										</span>
										<input wire:model="twitch" type="text" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none   !rounded-l-none" placeholder="https://twitch.com/yourname">
									</div>
                                    @error('twitch') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
								</div>
							</div>
							<div class="pt-2 inline-flex" x-show="tab === 3" x-transition:enter="transition delay-700 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<button type="submit" class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium px-4 py-3 sm:px-6 disabled:bg-opacity-70 bg-blue-600 hover:bg-blue-700 text-neutral-50 w-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 dark:focus:ring-offset-0">Zapisz</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
