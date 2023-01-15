<div class="container relative px-4 mt-5 pt-10 pb-16 lg:px-10 lg:pt-14 lg:pb-24">
	<div class="mx-auto">
		<div class="max-w-2xl">
			<h2 class="text-3xl sm:text-4xl font-semibold"> Ustawienia konta </h2>
			<span class="block mt-3 text-neutral-500 dark:text-neutral-400"> Możesz ustawić preferowaną nazwę wyświetlaną, hasło i zarządzać innymi ustawieniami osobistymi. </span>
		</div>
		<div class="w-full my-10 border-b-2 border-neutral-100"></div>
		<div class="flex flex-col justify-center">
			<div class="flex flex-col md:flex-row" x-data="{tab: 1}">
				<div class="flex flex-col justify-start w-1/4 space-y-4 text-neutral-500">
					<a class="px-4 py-2 text-sm" :class="{'border-l-2 transform translate-x-2 border-blue-500 text-neutral-900 font-bold': tab === 1, ' transform -translate-x-2': tab !== 1}" href="#" @click.prevent="tab = 1"> Ogólne </a>
					<a class="px-4 py-2 text-sm" :class="{'border-l-2 transform translate-x-2 border-blue-500 text-neutral-900 font-bold': tab === 2, ' transform -translate-x-2': tab !== 2}" href="#" @click.prevent="tab = 2" @click.prevent="tab = 2"> Profil </a>
					<a class="px-4 py-2 text-sm" :class="{'border-l-2 transform translate-x-2 border-blue-500 text-neutral-900 font-bold': tab === 3, ' transform -translate-x-2': tab !== 3}" href="#" @click.prevent="tab = 3" @click.prevent="tab = 3"> Hasło </a>
					<a class="px-4 py-2 text-sm" :class="{'border-l-2 transform translate-x-2 border-blue-500 text-neutral-900 font-bold': tab === 4, ' transform -translate-x-2': tab !== 4}" href="#" @click.prevent="tab = 4" @click.prevent="tab = 4"> Socialmedia </a>
					<div class="w-full border-b-2 border-neutral-100 dark:border-neutral-700"></div>
					<a onclick="event.preventDefault(); document.getElementById('nav-logout-form').submit()" href="#" class="px-4 py-2 text-sm text-red-500"> Wyloguj się </a>
					<form id="nav-logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
				</div>
				<div class="flex-grow mt-10 md:mt-0 xl:pl-16 max-w-3xl ">
					<div class="space-y-6" x-show="tab === 1">
						<form wire:submit.prevent="submit" class="space-y-5 sm:space-y-6 md:sm:space-y-7">
                            @csrf
                            <div x-show="tab === 1" x-transition:enter="transition duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<h2 class="text-2xl font-semibold">Ustawienia ogólne</h2>
								<span class="block mt-1 text-sm text-neutral-500 dark:text-neutral-400">Zaktualizuj swoją wyświetlaną nazwę i zarządzaj swoim kontem</span>
							</div>
							<div class="w-24 border-b border-neutral-200 dark:border-neutral-700" x-transition:enter="transition  duration-500 transform ease-in" x-transition:enter-start="opacity-0"></div>
							<div x-show="tab === 1" x-transition:enter="transition duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<div class="flex">
									<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Nazwa użytkownika</span>
									<span class="ml-3 text-sm {{ $user->role === \App\Enums\UserRole::ADMIN ? 'text-red-500' : 'text-green-500' }}">{{ $user->role }}</span>
								</div>
								<input type="text" class="block w-full border-neutral-200 focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 bg-neutral-100 dark:border-neutral-700 dark:focus:ring-primary-6000 dark:focus:ring-opacity-25 dark:bg-neutral-900 rounded-full text-sm font-normal h-11 px-4 py-3 mt-1.5" value="{{$user->username}}" disabled>
							</div>
							<div x-show="tab === 1" x-transition:enter="transition delay-100 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Wyświetlana nazwa</span>
								<input wire:model="display_username" type="text" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none">
                                @error('display_username')
                                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span>
                                @enderror
							</div>
							<div x-show="tab === 1" x-transition:enter="transition delay-200 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<div class="flex items-center">
									<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Email</span>
                                    @if($this->user->email_verified_at)
                                    <span class="ml-1 text-green-500 text-xs"> (zweryfikowany)</span>
                                    @elseif(!$this->user->email_verified_at && $this->user->id)
                                    <span class="ml-1 text-red-500 text-xs"> (niezweryfikowany)</span>
                                    @endif
								</div>
								<div class="mt-1.5 flex">
									<span class="inline-flex items-center px-2.5 rounded-l-lg border border-r-0 border-neutral-200 dark:border-neutral-700 bg-neutral-50 dark:bg-neutral-800 text-neutral-500 dark:text-neutral-400 text-sm">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 fill-neutral-500">
											<!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
											<path d="M0 128C0 92.65 28.65 64 64 64H448C483.3 64 512 92.65 512 128V384C512 419.3 483.3 448 448 448H64C28.65 448 0 419.3 0 384V128zM32 128V167.9L227.6 311.3C244.5 323.7 267.5 323.7 284.4 311.3L480 167.9V128C480 110.3 465.7 96 448 96H63.1C46.33 96 31.1 110.3 31.1 128H32zM32 207.6V384C32 401.7 46.33 416 64 416H448C465.7 416 480 401.7 480 384V207.6L303.3 337.1C275.1 357.8 236.9 357.8 208.7 337.1L32 207.6z"></path>
										</svg>
									</span>
									<input wire:model="email" type="email" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none  !rounded-l-none"> @error('email') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
								</div>
							</div>
							<div class="inline-flex pt-2" x-show="tab === 1" x-transition:enter="transition delay-300 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<button type="submit" class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium px-4 py-3 sm:px-6 disabled:bg-opacity-70 bg-blue-600 hover:bg-blue-700 text-neutral-50 w-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 dark:focus:ring-offset-0">Zapisz</button>
							</div>
						</form>
					</div>
					<div class="space-y-6" x-show="tab === 2">
						<form wire:submit.prevent="submit" class="space-y-5 sm:space-y-6 md:sm:space-y-7">
                            @csrf
                            <div x-show="tab === 2" x-transition:enter="transition duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<h2 class="text-2xl font-semibold">Edycja profilu</h2>
								<span class="block mt-1 text-sm text-neutral-500 dark:text-neutral-400">Skonfiguruj swój profil - możesz dodać miniaturę, informacje o sobie i inne...</span>
							</div>
							<div class="w-24 border-b border-neutral-200 dark:border-neutral-700" x-show="tab === 2" x-transition:enter="transition duration-500 transform ease-in" x-transition:enter-start="opacity-0"></div>
							<div class="inline-flex flex-col" x-show="tab === 2" x-transition:enter="transition delay-100 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Zdjęcie profilowe</span>
								<div class="mt-1.5 flex-1">
									<div wire:loading.class="animate-pulse" wire:target="uploaded_avatar" class="relative block group cursor-pointer mt-1 flex justify-center border-2 border-neutral-300 border-dashed rounded-xl px-6 pt-5 pb-6 ">
										<div class="flex-1 space-y-1 text-center">
                                            @if($this->uploaded_avatar || isset($this->avatar)) <div class="w-full max-w-md mx-auto">
												<div class="w-full aspect-w-16 aspect-h-8">
													<img src="{{ isset($this->avatar) ? asset($this->avatar) : $this->uploaded_avatar->temporaryUrl() }}" class="rounded-lg object-cover shadow-lg" alt="">
												</div>
											</div>
											<div wire:click="deleteAvatar" class="opacity-0 group-hover:opacity-100 absolute right-2.5 top-2.5 z-10 p-1.5 bg-neutral-900 dark:bg-neutral-700 text-white rounded-md cursor-pointer transition-opacity duration-300 " title="Usuń zdjęcie">
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
                                            @endif <div class="flex justify-center text-sm text-neutral-500">
												<label class="relative flex-shrink-0 cursor-pointer  rounded-md font-medium text-indigo-600 hover:text-indigo-500">
													<span wire:loading.class="hidden" wire:target="uploaded_avatar">{{ $this->uploaded_avatar || isset($this->avatar) ? 'Kliknij, aby zmienić' : 'Prześlij plik' }}</span>
													<input type="file" wire:model="uploaded_avatar" name="uploaded_avatar" class="sr-only">
													<div wire:loading wire:target="uploaded_avatar">
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
							<div x-show="tab === 2" x-transition:enter="transition delay-300 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Imię</span>
								<input wire:model="first_name" type="text" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none" value="Jan">
                                @error('first_name') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
							</div>
							<div x-show="tab === 2" x-transition:enter="transition delay-400 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Nazwisko</span>
								<input wire:model="last_name" type="text" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none" value="Kowalski">
                                @error('last_name') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
							</div>
							<div x-show="tab === 2" x-transition:enter="transition delay-300 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Informacje o Tobie</span>
								<span class="text-xs text-neutral-500 dark:text-neutral-400">Bio, to pojawi się na stronie autora.</span>
								<textarea wire:model="bio" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none" rows="5" placeholder="Coś o sobie w kilku słowach."></textarea>
                                @error('bio') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
							</div>
							<div class="inline-flex pt-2" x-show="tab === 2" x-transition:enter="transition delay-600 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<button type="submit" class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium px-4 py-3 sm:px-6 disabled:bg-opacity-70 bg-blue-600 hover:bg-blue-700 text-neutral-50 w-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 dark:focus:ring-offset-0">Zapisz</button>
							</div>
						</form>
					</div>
					<div class="space-y-6" x-show="tab === 3">
						<form wire:submit.prevent="submit_password" x-data="{ showPassword : false }" class="space-y-5 sm:space-y-6 md:sm:space-y-7">
                            @csrf
                            <div x-show="tab === 3" x-transition:enter="transition duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<h2 class="text-2xl font-semibold capitalize">Hasło</h2>
								<span class="block mt-1 text-sm text-neutral-500 dark:text-neutral-400">Zarządzaj swoim hasłem</span>
							</div>
							<div class="w-24 border-b border-neutral-200 dark:border-neutral-700" x-show="tab === 3" x-transition:enter="transition duration-500 transform ease-in" x-transition:enter-start="opacity-0"></div>
							<div x-show="tab === 3" x-transition:enter="transition delay-100 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Podaj stare hasło</span>
								<input wire:model="old_password" type="password" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none">
                                @error('old_password') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
							</div>
							<div x-show="tab === 3" x-transition:enter="transition delay-200 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Nowe hasło</span>
								<div class="relative">
									<input wire:model="password" :type="showPassword ? 'text' : 'password'" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none">
									<div x-on:click="showPassword = !showPassword" class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
										<svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-600">
											<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88"></path>
										</svg>
										<svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-600">
											<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
											<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
										</svg>
									</div>
								</div>
								<span class="text-xs text-neutral-500 dark:text-neutral-400">Hasło musi mieć minimum 8 znaków</span>
                                @error('password') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
							</div>
							<div x-show="tab === 3" x-transition:enter="transition delay-300 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Potwierdź nowe hasło</span>
								<input wire:model="password_confirmation" :type="showPassword ? 'text' : 'password'" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none">
                                @error('password_confirmation') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
							</div>
							<div class="inline-flex pt-2" x-show="tab === 3" x-transition:enter="transition delay-400 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<button type="submit" class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium px-4 py-3 sm:px-6 disabled:bg-opacity-70 bg-blue-600 hover:bg-blue-700 text-neutral-50 w-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 dark:focus:ring-offset-0">Zapisz</button>
							</div>
						</form>
					</div>
					<div class="space-y-6" x-show="tab === 4">
						<form wire:submit.prevent="submit" class="space-y-5 sm:space-y-6 md:sm:space-y-7">
                            @csrf
                            <div x-show="tab === 4" x-transition:enter="transition duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<h2 class="text-2xl font-semibold">Media społecznościowe</h2>
								<span class="block mt-1 text-sm text-neutral-500 dark:text-neutral-400">Dodaj linki do swoich mediów społecznościowych</span>
							</div>
							<div class="w-24 border-b border-neutral-200 dark:border-neutral-700" x-show="tab === 4" x-transition:enter="transition duration-500 transform ease-in" x-transition:enter-start="opacity-0"></div>
							<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
								<div x-show="tab === 4" x-transition:enter="transition delay-100 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
									<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Youtube</span>
									<div class="mt-1.5 flex">
										<span class="inline-flex items-center px-2.5 rounded-l-lg border border-r-0 border-neutral-200 dark:border-neutral-700 bg-neutral-50 dark:bg-neutral-800 text-neutral-500 dark:text-neutral-400 text-sm">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-6 h-6" fill="currentColor"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path></svg>
										</span>
										<input wire:model="youtube" type="text" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none !rounded-l-none" placeholder="https://www.youtube.com/channel/yourname">
									</div>
                                    @error('youtube') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
								</div>
								<div x-show="tab === 4" x-transition:enter="transition delay-200 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
									<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Facebook</span>
									<div class="mt-1.5 flex">
										<span class="inline-flex items-center px-2.5 rounded-l-lg border border-r-0 border-neutral-200 dark:border-neutral-700 bg-neutral-50 dark:bg-neutral-800 text-neutral-500 dark:text-neutral-400 text-sm">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-6 h-6" fill="currentColor"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>
										</span>
										<input wire:model="facebook" type="text" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none !rounded-l-none" placeholder="https://www.facebook.com/yourname">
									</div>
                                    @error('facebook') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
								</div>
								<div x-show="tab === 4" x-transition:enter="transition delay-300 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
									<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Twitter</span>
									<div class="mt-1.5 flex">
										<span class="inline-flex items-center px-2.5 rounded-l-lg border border-r-0 border-neutral-200 dark:border-neutral-700 bg-neutral-50 dark:bg-neutral-800 text-neutral-500 dark:text-neutral-400 text-sm">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6" fill="currentColor"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg>
										</span>
										<input wire:model="twitter" type="text" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none !rounded-l-none" placeholder="https://twitter.com/yourname">
									</div>
                                    @error('twitter') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
								</div>
								<div x-show="tab === 4" x-transition:enter="transition delay-400 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
									<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Instagram </span>
									<div class="mt-1.5 flex">
										<span class="inline-flex items-center px-2.5 rounded-l-lg border border-r-0 border-neutral-200 dark:border-neutral-700 bg-neutral-50 dark:bg-neutral-800 text-neutral-500 dark:text-neutral-400 text-sm">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6 h-6" fill="currentColor"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
										</span>
										<input wire:model="instagram" type="text" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none !rounded-l-none" placeholder="https://instagram.com/yourname">
									</div>
                                    @error('instagram') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
								</div>
								<div x-show="tab === 4" x-transition:enter="transition delay-500 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
									<span class="block text-neutral-800 font-medium text-sm dark:text-neutral-300">Twitch </span>
									<div class="mt-1.5 flex">
										<span class="inline-flex items-center px-2.5 rounded-l-lg border border-r-0 border-neutral-200 dark:border-neutral-700 bg-neutral-50 dark:bg-neutral-800 text-neutral-500 dark:text-neutral-400 text-sm">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6" fill="currentColor"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M391.17,103.47H352.54v109.7h38.63ZM285,103H246.37V212.75H285ZM120.83,0,24.31,91.42V420.58H140.14V512l96.53-91.42h77.25L487.69,256V0ZM449.07,237.75l-77.22,73.12H294.61l-67.6,64v-64H140.14V36.58H449.07Z"/></svg>
										</span>
										<input wire:model="twitch" type="text" class="block p-3 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 focus-visible:border-blue-500 focus:outline-none !rounded-l-none" placeholder="https://twitch.com/yourname">
									</div>
                                    @error('twitch') <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
								</div>
							</div>
							<div class="pt-2 inline-flex" x-show="tab === 4" x-transition:enter="transition delay-700 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
								<button type="submit" class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium px-4 py-3 sm:px-6 disabled:bg-opacity-70 bg-blue-600 hover:bg-blue-700 text-neutral-50 w-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 dark:focus:ring-offset-0">Zapisz</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
