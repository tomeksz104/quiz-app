<section class="container max-w-screen-md mt-24 mb-10 text-base">
    <div class="px-4 py-6 sm:px-0">
        @auth
            <h3 class="text-2xl font-medium">Zostaw komentarz </h3>
            <p class="text-sm">
                Zalogowany jako {{ Auth::user()->username }}
                <a onclick="event.preventDefault(); document.getElementById('nav-logout-form').submit()" href="#" class="text-blue-400"/> Wyloguj </a><br />
                <form id="nav-logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
                Wymagane pola są oznaczone *.
            </p>

            <div class="flex mt-5">
                <div class="min-w-0 flex-1">
                    <form wire:submit.prevent="postComment">
                        <div>
                            <label for="comment" class="label">Komentarz *</label>
                            <textarea id="comment" name="comment" rows="5"
                                        class="shadow-sm p-3 block w-full focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-2xl
                                        @error('newCommentState.body') border-red-500 @enderror"
                                        wire:model.defer="newCommentState.body"></textarea>
                            @error('newCommentState.body')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-5 flex items-center justify-between">
                            <button type="submit" class="inline-flex items-center justify-center px-6 py-3 border border-transparent font-semibold rounded-full shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Wyślij komentarz
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endauth

        @guest
            <p>
                <button onclick="Livewire.emit('openModal', 'auth.login')" class="text-blue-500">Zaloguj się</button>
                aby skomentować.
            </p>
        @endguest
    </div>
    <div class="divide-y divide-gray-200">
        <div class="px-4 py-6 sm:px-0">
            <h2 class="text-2xl font-medium text-gray-900">{{ $this->total_comments }} komentarzy na temat "{{ $this->quiz_title }}"</h2>
        </div>
        <div class="px-4 py-6 sm:px-0">
            <div class="space-y-8">
                @if ($comments->isNotEmpty())
                    @foreach($comments as $comment)
                        <livewire:frontend.comments.comment :comment="$comment" :key="$comment->id"/>
                    @endforeach
                    {{ $comments->links() }}
                @else
                    <p>Brak komentarzy. Bądź pierwszy!</p>
                @endif
            </div>
        </div>
    </div>
</section>
