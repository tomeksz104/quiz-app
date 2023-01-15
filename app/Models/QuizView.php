<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizView extends Model
{
    use HasFactory;

    public function quizView(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    public static function createViewLog($quiz): void
    {
        $quizViews= new QuizView();
        $quizViews->quiz_id = $quiz->id;
        $quizViews->session_id = request()->getSession()->getId();
        $quizViews->user_id = (auth()->check()) ? auth()->id() : null;
        $quizViews->ip = request()->ip();
        $quizViews->save();
    }
}
