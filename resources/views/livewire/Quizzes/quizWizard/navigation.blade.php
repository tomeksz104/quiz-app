 <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
    <div class="grid gap-8 row-gap-5 md:row-gap-8 lg:grid-cols-3">
        @foreach($steps as $key => $step)
        @if($step->preview == false)
        <div class="relative p-5 duration-300 transform border-2 bg-white rounded shadow-sm hover:-translate-y-2
        {{ $step->isCurrent() ? 'border-blue-500' : 'border-dashed border-blue-300' }} ">
            <div class="flex items-center mb-2">
                <p class="flex items-center justify-center w-10 h-10 mr-2 text-lg font-bold text-white rounded-full bg-blue-500"> {{ $loop->iteration }} </p>
                <p class="text-lg font-bold leading-5">{{ $step->label }}</p>
            </div>
            <p class="text-sm text-gray-900">{{ $step->description }}</p>
            @if($step->isCurrent())
            <p class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 -mt-4 -mr-4 font-bold rounded-full bg-blue-500 sm:-mt-5 sm:-mr-5 sm:w-10 sm:h-10">
                <svg class="text-white w-7" stroke="currentColor" viewBox="0 0 24 24">
                    <polyline fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="6,12 10,16 18,8"></polyline>
                </svg>
            </p>
            @endif
        </div>
        @endif
        @endforeach
    </div>
</div>
