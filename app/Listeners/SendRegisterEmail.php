<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendRegisterEmail implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
       
        Mail::to($event->user->email)->send(new RegisterMail($event->user,$event->password));
    }
}
