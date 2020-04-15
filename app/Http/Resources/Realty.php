<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Agency as AgencyResource;
use App\Http\Resources\Metro as MetroResource;
use App\Http\Resources\Realty as RealtyResource;
use App\Http\Resources\File as FileResource;
use App\Http\Resources\City as CityResource;

class Realty extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'active' => $this->active,
            'created_at' => $this->created_at,
            'price' => $this->price,
            'sub_price' => $this->sub_price,
            'description' => $this->description,
            'geo' => [
                'coords' => [$this->lat, $this->long],
            ],
            'area' => $this->area,
            'rooms' => $this->rooms,
            'type' => new RealtyResource($this->whenLoaded('type')),
            'user' => new UserResource($this->whenLoaded('user')),
            'agency' => new AgencyResource($this->whenLoaded('agency')),
            'metro' => MetroResource::collection($this->whenLoaded('metro')),
            'images' => FileResource::collection($this->whenLoaded('images')),
            'city' => new CityResource($this->whenLoaded('city')),
            'url' => route('realty.show', ['realty' => $this->id]),
            'main_image' => new FileResource($this->whenLoaded('main_image'))
        ];
    }
}
