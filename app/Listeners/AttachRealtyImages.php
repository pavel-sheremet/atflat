<?php

namespace App\Listeners;

use App\Events\RealtyCreated;
use App\File;

class AttachRealtyImages
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
        collect($event->request->input('images'))->each(function ($item) use ($event) {
            $file = File::find($item['id']);
            $file->used = true;
            $file->save();
            $event->realty->images()->save($file);
        });

        $event->realty->images()
            ->whereNotIn('id', array_column($event->request->input('images'), 'id'))
            ->each(function ($item) {
                $item->delete();
            });

    }
}
