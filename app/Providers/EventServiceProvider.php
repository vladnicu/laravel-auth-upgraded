<?php

namespace Cook\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Cook\Events\Auth\UserRequestedActivationEmail' => [
            'Cook\Listeners\Auth\SendActivationEmail',
        ],
        'Cook\Events\Auth\UserChangedPassword' => [
            'Cook\Listeners\Auth\SendChangedPasswordEmail',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
