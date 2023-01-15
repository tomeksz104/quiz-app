<div>
    <div class="flex">
        <div class="flex-shrink-0 mr-4">
            {{--<img class="h-10 w-10 rounded-full" src="avatar" alt="{{ $comment->user->name }}">--}}
            <div class="inline-flex overflow-hidden relative justify-center items-center w-10 h-10 bg-yellow-100 rounded-full">
                <span class="font-medium text-yellow-600 uppercase">{{ empty($comment->user->display_username) ? substr($comment->user->username, 0, 2) : substr($comment->user->display_username, 0, 2) }}</span>
            </div>
        </div>
        <div class="flex-grow border rounded-2xl p-3">
            <div>
                <a href="#" class="font-semibold text-gray-900 after:mx-2 after:content-['•'] after:text-gray-400 after:text-xs">
                    @if(empty($comment->user->display_username))
                        {{ $comment->user->username }}
                    @else
                        {{ $comment->user->display_username }}
                    @endif
                </a>
                <span class="text-gray-500 text-sm font-medium">
                    {{ $comment->presenter()->relativeCreatedAt() }}
                </span>
            </div>
            <div class="mt-1 flex-grow w-full">
                @if ($isEditing)
                    <form wire:submit.prevent="editComment">
                        <div>
                            <label for="comment" class="sr-only">Comment body</label>
                            <textarea id="comment" name="comment" rows="3"
                                      class="shadow-sm p-2 block w-full focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md
                                        @error('editState.body') border-red-500 @enderror"
                                      placeholder="Write something" wire:model.defer="editState.body"></textarea>
                            @error('editState.body')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-3 flex items-center justify-between">
                            <button type="submit"
                                    class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-semibold rounded-full shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Zapisz
                            </button>
                        </div>
                    </form>
                @else
                    <p class="text-gray-700">{{ $comment->presenter()->markdownBody() }}</p>
                @endif
            </div>
            <div class="mt-3 flex-shrink-0 flex flex-wrap flex-row space-x-2 sm:space-x-2.5 space-y-0.5 sm:space-y-0 items-center ">
                @auth
                    @if ($comment->hasParent())
                        <button wire:click="$toggle('isReplying')" type="button"  class="group relative sm:min-w-[68px] rounded-full text-neutral-600 bg-neutral-100 transition-colors hover:bg-teal-50 hover:text-teal-600 items-center justify-center px-2 h-7 sm:h-8 text-xs sm:text-sm focus:outline-none flex" title="Odpowiedz">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px] mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path></svg>
                            <span class="ml-1 group-hover:text-teal-600">Odpowiedz</span>
                        </button>
                    @endif

                    @can ('update', $comment)
                        <button wire:click="$toggle('isEditing')" type="button"  class="group relative sm:min-w-[68px] rounded-full text-neutral-600 bg-neutral-100 transition-colors hover:bg-blue-50 hover:text-blue-600 items-center justify-center px-2 h-7 sm:h-8 text-xs sm:text-sm focus:outline-none flex" title="Odpowiedz">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-[18px] w-[18px] mr-2" fill="currentColor" stroke="currentColor"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M386.7 22.63C411.7-2.365 452.3-2.365 477.3 22.63L489.4 34.74C514.4 59.74 514.4 100.3 489.4 125.3L269 345.6C260.6 354.1 249.9 359.1 238.2 362.7L147.6 383.6C142.2 384.8 136.6 383.2 132.7 379.3C128.8 375.4 127.2 369.8 128.4 364.4L149.3 273.8C152 262.1 157.9 251.4 166.4 242.1L386.7 22.63zM454.6 45.26C442.1 32.76 421.9 32.76 409.4 45.26L382.6 72L440 129.4L466.7 102.6C479.2 90.13 479.2 69.87 466.7 57.37L454.6 45.26zM180.5 281L165.3 346.7L230.1 331.5C236.8 330.2 242.2 327.2 246.4 322.1L417.4 152L360 94.63L189 265.6C184.8 269.8 181.8 275.2 180.5 281V281zM208 64C216.8 64 224 71.16 224 80C224 88.84 216.8 96 208 96H80C53.49 96 32 117.5 32 144V432C32 458.5 53.49 480 80 480H368C394.5 480 416 458.5 416 432V304C416 295.2 423.2 288 432 288C440.8 288 448 295.2 448 304V432C448 476.2 412.2 512 368 512H80C35.82 512 0 476.2 0 432V144C0 99.82 35.82 64 80 64H208z"></path></svg>
                            <span class="ml-1 group-hover:text-blue-600">Edytuj</span
                        </button>
                    @endcan

                    @can ('destroy', $comment)
                    <button x-data="{
                                            confirmCommentDeletion () {
                                                if (window.confirm('Czy jesteś pewien że chcesz usunąć ten komentarz?')) {
                                                    @this.call('deleteComment');
                                                }
                                            }
                                        }" @click="confirmCommentDeletion" type="button" class="group relative sm:min-w-[68px] rounded-full text-neutral-600 bg-neutral-100 transition-colors hover:bg-red-50 hover:text-red-600 items-center justify-center px-2 h-7 sm:h-8 text-xs sm:text-sm focus:outline-none flex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-[18px] w-[18px] mr-2" fill="currentColor" stroke="currentColor">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M144 400C144 408.8 136.8 416 128 416C119.2 416 112 408.8 112 400V176C112 167.2 119.2 160 128 160C136.8 160 144 167.2 144 176V400zM240 400C240 408.8 232.8 416 224 416C215.2 416 208 408.8 208 400V176C208 167.2 215.2 160 224 160C232.8 160 240 167.2 240 176V400zM336 400C336 408.8 328.8 416 320 416C311.2 416 304 408.8 304 400V176C304 167.2 311.2 160 320 160C328.8 160 336 167.2 336 176V400zM310.1 22.56L336.9 64H432C440.8 64 448 71.16 448 80C448 88.84 440.8 96 432 96H416V432C416 476.2 380.2 512 336 512H112C67.82 512 32 476.2 32 432V96H16C7.164 96 0 88.84 0 80C0 71.16 7.164 64 16 64H111.1L137 22.56C145.8 8.526 161.2 0 177.7 0H270.3C286.8 0 302.2 8.526 310.1 22.56V22.56zM148.9 64H299.1L283.8 39.52C280.9 34.84 275.8 32 270.3 32H177.7C172.2 32 167.1 34.84 164.2 39.52L148.9 64zM64 432C64 458.5 85.49 480 112 480H336C362.5 480 384 458.5 384 432V96H64V432z">
                            </path>
                        </svg>
                        <span class="ml-1 group-hover:text-red-600">Usuń</span>
                    </button>
                    @endcan
                @endauth
            </div>
        </div>
    </div>

    <div class="ml-14 mt-6">
        @if ($isReplying)
            <form wire:submit.prevent="postReply" class="my-4">
                <div>
                    <label for="comment" class="sr-only">Reply body</label>
                    <textarea id="comment" name="comment" rows="3"
                              class="shadow-sm block p-2 w-full focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-2xl
                                        @error('replyState.body') border-red-500 @enderror"
                              wire:model.defer="replyState.body"></textarea>
                    @error('replyState.body')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-3 flex items-center justify-between">
                    <button type="submit"
                            class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-semibold rounded-full shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Skomentuj
                    </button>
                </div>
            </form>
        @endif

        @foreach ($comment->children as $child)
            <livewire:comments.comment :comment="$child" :key="$child->id"/>
        @endforeach
    </div>
</div>
