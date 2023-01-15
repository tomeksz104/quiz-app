<div class="my-10">
    <div class="container rounded-md px-4 sm:px-8">
        <div class="bg-blue-50 mt-5">
            <div class="w-full py-20 flex flex-col justify-center items-center ">
                <div class="check-container">
                    <div class="check-background">
                        <svg viewBox="0 0 65 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 25L27.3077 44L58.5 7" stroke="white" stroke-width="13" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="check-shadow"></div>
                </div>
                <h1 class="ml-5 flex text-5xl text-slate-700 mb-5 whitespace-pre">Świetnie! Twój quiz został utworzony.</h1>
                <p class="flex whitespace-pre">
                    <span>Możesz teraz </span>
                    <a href="{{ route('quiz_show', $quiz->slug) }}" class="text-blue-500">zobaczyć quiz</a>
                    <span> lub przejdź do </span>
                    <a href="{{ route('user_quizzes') }}" class="text-blue-500">swoich quizów.</a>
                </p>
            </div>
        </div>
    </div>
</div>
