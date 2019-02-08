<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Service;
use App\Business;

class ServiceUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
		$business = Business::find($this->route('businessId'));
		$service = null;
		if($business) {
			$service = $business->services()->find($this->route('serviceId'));
		}
        return ($business && $this->user()->can('update', $business) && $service);
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
