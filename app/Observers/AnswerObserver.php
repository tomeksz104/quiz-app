<?php

namespace App\Observers;

use App\Models\Answer;

class AnswerObserver
{
    /**
     * Handle the Answer "created" event.
     *
     * @param  \App\Models\Answer  $answer
     * @return void
     */
    public function created(Answer $answer)
    {
        //
    }

    /**
     * Handle the Answer "updated" event.
     *
     * @param  \App\Models\Answer  $answer
     * @return void
     */
    public function updated(Answer $answer)
    {
        //
    }

    /**
     * Handle the Answer "deleted" event.
     *
     * @param  \App\Models\Answer  $answer
     * @return void
     */
    public function deleted(Answer $answer)
    {
        if(file_exists(public_path($answer->image->path)))
        {
            unlink(public_path($answer->image->path));  // delete file if exists
        }
        $answer->image()->delete();
    }

    /**
     * Handle the Answer "restored" event.
     *
     * @param  \App\Models\Answer  $answer
     * @return void
     */
    public function restored(Answer $answer)
    {
        //
    }

    /**
     * Handle the Answer "force deleted" event.
     *
     * @param  \App\Models\Answer  $answer
     * @return void
     */
    public function forceDeleted(Answer $answer)
    {
        //
    }
}
