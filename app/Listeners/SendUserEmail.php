<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use App\Mail\ProductCreated as ProductCreatedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendUserEmail implements ShouldQueue
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
     * @param  ProductCreated  $event
     * @return void
     */
    public function handle(ProductCreated $event)
    {
        Mail::to($event->user)->send(new ProductCreatedMail($event->product,$event->user));
    }
}
