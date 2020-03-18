<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Agency as AgencyResource;
use App\Http\Resources\Agent as AgentResource;

class Realty extends JsonResource
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
            'active' => $this->active,
            'created_at' => $this->created_at,
            'price' => $this->price,
            'sub_price' => $this->sub_price,
            'description' => $this->description,
            'user' => new UserResource($this->whenLoaded('user')),
            'agency' => new AgencyResource($this->whenLoaded('agency')),
            'public_url' => route('realty.show', ['realty' => $this->id])
        ];
    }
}
