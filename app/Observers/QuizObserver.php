<?php

namespace App\Observers;

use App\Models\Quiz;

class QuizObserver
{
    /**
     * Handle the Quiz "created" event.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return void
     */
    public function created(Quiz $quiz)
    {

    }

    /**
     * Handle the Quiz "updated" event.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return void
     */
    public function updated(Quiz $quiz)
    {
        //
    }

    /**
     * Handle the Quiz "deleted" event.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return void
     */
    public function deleted(Quiz $quiz)
    {
        $quiz->quizView()->delete();
        $quiz->votes()->delete();
        $quiz->comments()->delete();
        $quiz->results()->delete();

        if(isset($quiz->image->path) && file_exists(public_path($quiz->image->path)))
        {
            unlink(public_path($quiz->image->path));  // delete image if exists
        }
        $quiz->image()->delete();
    }

    /**
     * Handle the Quiz "restored" event.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return void
     */
    public function restored(Quiz $quiz)
    {
        //
    }

    /**
     * Handle the Quiz "force deleted" event.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return void
     */
    public function forceDeleted(Quiz $quiz)
    {
        //
    }
}
