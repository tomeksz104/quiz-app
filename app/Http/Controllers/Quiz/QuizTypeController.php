<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Models\QuizType;
use Illuminate\View\View;
use function view;

class QuizTypeController extends Controller
{
    public function index(): View {
        return view('quiz.select-quiz-type', [
            'quiz_types' =>  QuizType::get()
        ]);
    }
}
