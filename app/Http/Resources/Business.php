<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\City as CityResource;
use App\Http\Resources\Keyword as KeywordResource;
use App\Http\Resources\Service as ServiceResource;

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
            'slug' => $this->slug,
            'body' => $this->body,
            // 'image' => asset($this->image),
            'image' => $this->image,
            'contacts' => $this->contactsParsed,
            'highlights' => $this->highlightsParsed,
            'cities' => $this->cities ? CityResource::collection($this->cities) : [],
            'keywords' => $this->keywords ? KeywordResource::collection($this->keywords) : [],
            'address' => $this->address,
			'emails' => $this->emailsParsed,
			'products' => $this->products,
			'services' => $this->services ? ServiceResource::collection($this->services) : []
        ];
    }
}
