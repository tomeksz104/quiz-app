<div class="container max-w-3xl py-12 px-4 text-base">
    <div class="flex flex-col justify-center space-y-3">
        <div class="flex {{ $quiz->quiz_type == 2 ? 'justify-between' : 'justify-center' }} ">
            <p class="text-md font-semibold tracking-wider">PYTANIE {{  $this->numberQuestion+1 }}/{{ $totalQuestions }}</p>
            @if($quiz->quiz_type == 2)
            <div>
                <span id="seconds"></span> sekund
            </div>
            @endif
        </div>
        <div class="w-full bg-green-100 rounded-full h-2.5">
            <div class="transition-all duration-700 ease-in-out bg-green-500 h-2.5 rounded-full" style="width: {{(($this->numberQuestion+1)/$totalQuestions)*100}}%"></div>
        </div>
        <h3 class="text-center text-neutral-900 font-semibold text-3xl md:text-4xl md:!leading-[120%]">{{ $question->title  }}</h3>
        @if( isset($question->image) )
        <div class="flex justify-center">
            <img src="{{ asset($question->image->path) }}">
        </div>
        @endif
    </div>
    <ul class="flex flex-col w-full space-y-5 my-10">
        @foreach($answers as $answer)
        <li class="transition-all duration-300 hover:scale-[1.02]">
            <input wire:model.defer="question_answers.{{ $question->id }}" type="radio" id="{{$answer->id}}" name="question" value="{{$answer->id}}" class="hidden peer" required="">
            <label for="{{$answer->id}}" class="group inline-flex items-center w-full text-gray-500 bg-white rounded-2xl border border-gray-200 cursor-pointer peer-checked:border-green-300 peer-checked:text-green-500 peer-checked:bg-hover:text-gray-600 hover:bg-gray-50 {{ isset($answer->image)?: 'py-3' }}">
                @if( isset($answer->image) )
                <div class="grid grid-cols-3 space-x-2">
                    <div>
                        <img class="rounded-2xl" src="{{ asset($answer->image->path) }}">
                    </div>
                    <div class="flex items-center col-span-2 text-lg font-medium">
                        <p>{{$answer->title}}</p>
                    </div>
                </div>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 ml-3 w-8 h-8" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <div class="block ml-5">
                    <div class="w-full text-lg font-medium">{{$answer->title}}</div>
                </div>
                @endif

            </label>
        </li>
        @endforeach
    </ul>
    <div class="my-5 flex {{ $this->numberQuestion != 0 && $quiz->quiz_type !== 2 ? 'justify-between' : 'justify-end' }} space-x-2">
        @if($this->numberQuestion != 0 && $quiz->quiz_type !== 2)
        <button wire:click="previousQuestion()" class="transition-colors text-blue-500 fill-white bg-blue-100 hover:bg-blue-200 font-semibold py-3 px-5 rounded-md inline-flex items-center">
            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                    <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="currentColor" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)"></path>
                    <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="currentColor" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)"></path>
                </g>
            </svg>
            <span>Poprzednie pytanie</span>
        </button>
        @endif
        <button wire:click="nextQuestion()" class="transition-colors text-white fill-white bg-blue-500 hover:bg-blue-600 font-semibold py-3 px-5 rounded-md inline-flex items-center">
            <span>{{ $this->numberQuestion+1 != $totalQuestions ? 'Następne pytanie' : 'Kończę quiz' }}</span>
            <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                    <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="currentColor"></path>
                    <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="currentColor" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-90.000000) translate(-15.999997, -11.999999)"></path>
                </g>
            </svg>
        </button>
    </div>
</div>


<script>
// Countdown timer to skip the question after several seconds

var time_for_answer =  {{ $quiz->time_for_answer }};
var seconds = time_for_answer ; // seconds for HTML
var foo; // variable for clearInterval() function

function updateSecs() {
    if (this.time_for_answer !== 0)
    {
        document.getElementById("seconds").innerHTML = seconds;
        seconds--;
        if (seconds == -1) {
            @this.call('nextQuestion');
            this.seconds = time_for_answer;
        }
    }
}

function countdownTimer() {
    foo = setInterval(function () {
        updateSecs()
    }, 1000);
}

countdownTimer();

</script>


{{--
<div x-data="{ countdown: {{ $quiz->time_for_answer }} }"
    x-init="setInterval(function(){
               countdown--;
            }, 1000);
            setTimeout(() => { $wire.nextQuestion() }, 10000);
            ">
   <h1 x-text="countdown"></h1> --}}
