<?php

namespace App\Listeners\Auth;

use Mail;
use App\Mail\Auth\ChangedPasswordEmail;
use App\Events\Auth\UserChangedPassword;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendChangedPasswordEmail
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
     * @param  UserChangedPassword  $event
     * @return void
     */
    public function handle(UserChangedPassword $event)
    {
        Mail::to($event->user->email)->send(new ChangedPasswordEmail($event->user));
    }
}
