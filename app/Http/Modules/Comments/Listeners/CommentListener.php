<?php

namespace App\Http\Modules\Comments\Listeners;

use App\Http\Modules\Comments\Events\CommentEvents;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CommentListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Http\Modules\Comments\Events\CommentEvents  $event
     * @return void
     */
    public function handle(CommentEvents $event)
    {
        //
    }
}
