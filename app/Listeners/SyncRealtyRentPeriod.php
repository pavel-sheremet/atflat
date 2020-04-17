<?php

namespace App\Listeners;

use App\Events\RealtyCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SyncRealtyRentPeriod
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
     * @param  RealtyCreated  $event
     * @return void
     */
    public function handle(RealtyCreated $event)
    {
        $event->realty->rent_period()->sync($event->request->input('rent_period'));
    }
}
