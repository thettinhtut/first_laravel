<?php

namespace App\Listeners;
use App\Mail\ReceipeStored;
use App\Events\ReceipeCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ReceipeCreatedListener
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
     * @param  ReceipeCreatedEvent  $event
     * @return void
     */
    public function handle(ReceipeCreatedEvent $event)
    {
       // \Mail::to('user@gmail.com')->send(new ReceipeStored($event->receipe));
 
    }
}
