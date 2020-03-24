<?php

namespace App\Http\Resources;

use App\Http\Resources\City as CityResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Metro extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'city' => new CityResource($this->whenLoaded('city'))
        ];
    }
}
