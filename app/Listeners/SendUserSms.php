<?php

namespace App\Listeners;

use Kavenegar\KavenegarApi;
use App\Events\ProductCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendUserSms implements ShouldQueue
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
        $sms = new KavenegarApi(env('KAVENEGAR_API_KEY'));
        $sms->send(env('KAVENEGAR_SENDER'),"09361825145","{$event->product->name} Was Created");
    }
}
