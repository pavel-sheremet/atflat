<?php

namespace App\Listeners;

use App\Events\RealtyCreated;
use App\Http\Requests\StoreRealty;
use App\Http\Resources\Realty;
use App\Metro;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateRealtyNearestMetro
{
    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  RealtyCreated  $event
     * @return void
     */
    public function handle(RealtyCreated $event)
    {
        $event->realty->metro()->detach();

        foreach ($event->request->input('metro') as $requestMetro)
        {
            $metro = Metro::firstOrCreate([
                'name' => $requestMetro['name'],
                'city_id' => $event->request->input('city_id')
            ]);

            $event->realty->metro()->attach($metro->id, ['distance' => $requestMetro['distance']]);
        }
    }
}
