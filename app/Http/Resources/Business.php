<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'image' => asset($this->image),
            'contacts' => $this->contacts,
            'city' => $this->city,
            'address' => $this->address,
            'emails' => $this->emails
        ];
    }
}
