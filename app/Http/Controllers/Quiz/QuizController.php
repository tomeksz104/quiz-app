<?php

declare(strict_types=1);

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Enums\QuizStatus;
use App\Models\Quiz;
use App\Models\QuizType;
use App\Models\QuizView;
use Illuminate\View\View;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function show(string $slug, Request $request, Quiz $quiz): View
    {
        $quiz = Quiz::where('slug', $slug)->withCount('questions')->first();

        if(!($quiz->showQuiz())) {// this will test if the user viewed the quiz or not
            $quiz->increment('views');  //I have a separate column for views in the quiz table. This will increment the views column in the quizzes table.
            QuizView::createViewLog($quiz);
        }

        return view('quiz.quiz-show', compact('quiz'), [
            'quiz' => $quiz,
            'total_comments' => $quiz->comments->count(),
            'otherQuizzes' => Quiz::inRandomOrder()->where('status', QuizStatus::APPROVED)->with('user', 'category', 'image', 'comments')->limit(4)->get(),
        ]);
    }

    public function create($quiz_type_slug): View {

        $quiz_type = QuizType::where('slug', $quiz_type_slug)->first();

        return view('quiz.quiz-create-update', [
            'quiz_type' => $quiz_type,
        ]);
    }

    public function edit($quiz_slug): View {
        $quiz = Quiz::where('slug', $quiz_slug)->first();

        return view('quiz.quiz-create-update', [
            'quiz_id' => $quiz->id,
            'quiz_type' => $quiz->type,
        ]);
    }
}
