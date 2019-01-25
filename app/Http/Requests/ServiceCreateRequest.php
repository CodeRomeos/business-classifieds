<?php

namespace App\Http\Requests;

use App\Service;
use App\Business;
use Illuminate\Foundation\Http\FormRequest;

class ServiceCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
		$business = Business::find($this->route('businessId'));
        return ($business && $this->user()->can('update', $business) && $this->user()->can('create', Service::class));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }
}
