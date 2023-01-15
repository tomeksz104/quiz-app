<div class="relative sm:min-w-[68px] rounded-full transition-colors duration-500 ease-in-out hover:bg-red-100 hover:text-red-600 items-center justify-center px-2 h-7 sm:h-8 text-xs sm:text-sm focus:outline-none flex
    {{ !$voted ?: 'bg-red-100 text-red-600' }}
    {{ ($this->dark_mode === 1) ? "text-slate-300 bg-slate-800" : "text-neutral-600 bg-neutral-50" }}">
    <button wire:click.prevent="vote()" class="flex items-center justify-center transition" title="Super quiz!">
        <svg width="24" height="24" fill="{{ ($voted ? 'currentColor' : 'none') }}" viewBox="0 0 24 24">
            <path fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11.995 7.23319C10.5455 5.60999 8.12832 5.17335 6.31215 6.65972C4.49599 8.14609 4.2403 10.6312 5.66654 12.3892L11.995 18.25L18.3235 12.3892C19.7498 10.6312 19.5253 8.13046 17.6779 6.65972C15.8305 5.18899 13.4446 5.60999 11.995 7.23319Z" clip-rule="evenodd"></path>
        </svg>
        <span>{{ $this->quiz->votes }}</span>
    </button>
</div>
