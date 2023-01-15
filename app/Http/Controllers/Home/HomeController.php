<?php

namespace App\Http\Controllers\Home;

use App\Enums\QuizStatus;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Quiz;
use Illuminate\View\View;
use function view;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home.index',[
            'popularQuizzes' => Quiz::mostViewed(),
            'popularCategories' => Category::mostViewed(),
            'sliderQuizzes' => Quiz::inRandomOrder()->where('status', QuizStatus::APPROVED)->with('category', 'image', 'user')->limit(10)->get(),
        ]);
    }
}
