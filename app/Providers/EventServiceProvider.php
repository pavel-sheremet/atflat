<?php

namespace App\Providers;

use App\Events\RealtyCreated;
use App\Listeners\AttachRealtyImages;
use App\Listeners\CreateRealtyNearestMetro;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        RealtyCreated::class => [
            CreateRealtyNearestMetro::class,
            AttachRealtyImages::class
        ]
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
