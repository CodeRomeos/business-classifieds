<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'name' => $this->name,
            'role' => $this->role_name,
            'email' => $this->email,
			'image' => !empty($this->image) ? $this->image : null,
			'is_admin' => $this->is_admin,
            'mobile' => $this->mobile
        ];
    }
}
