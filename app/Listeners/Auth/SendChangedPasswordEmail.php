<?php

namespace Cook\Listeners\Auth;

use Mail;
use Cook\Mail\Auth\ChangedPasswordEmail;
use Cook\Events\Auth\UserChangedPassword;

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
