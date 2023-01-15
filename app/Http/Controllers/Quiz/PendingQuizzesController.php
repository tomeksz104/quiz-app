<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Quiz;
use function view;

class PendingQuizzesController extends Controller
{
    public function index()
    {
        return view('quiz.quiz-pending',[
            'popularQuizzes' => Quiz::mostViewed(),
            'popularCategories' => Category::mostViewed(),
        ]);
    }
}
