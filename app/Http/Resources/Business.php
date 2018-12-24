<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\City as CityResource;

class Business extends JsonResource
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
            'businessid' => $this->businessid,
            'title' => $this->title,
            'body' => $this->body,
            // 'image' => asset($this->image),
            'image' => $this->image,
            'contacts' => $this->contactsParsed,
            'city' => CityResource::collection($this->cities),
            'address' => $this->address,
            'emails' => $this->emailsParsed
        ];
    }
}
