<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Service extends JsonResource
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
			'business_id' => $this->business_id,
			'name' => $this->name,
			'description' => $this->description,
			'image' => $this->image,
			'created_at' => $this->created_at ? $this->created_at->toDateTimeString() : '',
			'updated_at' => $this->updated_at ? $this->updated_at->toDateTimeString() : ''
		];
    }
}
