<?php

namespace App\Observers;

use App\Models\ResultMessage;

class ResultMessageObserver
{
    /**
     * Handle the ResultMessage "created" event.
     *
     * @param  \App\Models\ResultMessage  $resultMessage
     * @return void
     */
    public function created(ResultMessage $resultMessage)
    {
        //
    }

    /**
     * Handle the ResultMessage "updated" event.
     *
     * @param  \App\Models\ResultMessage  $resultMessage
     * @return void
     */
    public function updated(ResultMessage $resultMessage)
    {
        //
    }

    /**
     * Handle the ResultMessage "deleted" event.
     *
     * @param  \App\Models\ResultMessage  $resultMessage
     * @return void
     */
    public function deleted(ResultMessage $resultMessage)
    {
        if(file_exists(public_path($resultMessage->image->path)))
        {
            unlink(public_path($resultMessage->image->path));  // delete file if exists
        }
        $resultMessage->image()->delete();
    }

    /**
     * Handle the ResultMessage "restored" event.
     *
     * @param  \App\Models\ResultMessage  $resultMessage
     * @return void
     */
    public function restored(ResultMessage $resultMessage)
    {
        //
    }

    /**
     * Handle the ResultMessage "force deleted" event.
     *
     * @param  \App\Models\ResultMessage  $resultMessage
     * @return void
     */
    public function forceDeleted(ResultMessage $resultMessage)
    {
        //
    }
}
