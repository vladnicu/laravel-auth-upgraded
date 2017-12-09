<?php

namespace Cook\Listeners\Auth;

use Mail;
use Cook\Mail\Auth\ActivationEmail;
use Cook\Events\Auth\UserRequestedActivationEmail;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendActivationEmail
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
     * @param  UserRequestedActivationEmail  $event
     * @return void
     */
    public function handle(UserRequestedActivationEmail $event)
    {
        if($event->user->active){
           return;
        }
        
        Mail::to($event->user->email)->send(new ActivationEmail($event->user));
    }
}
