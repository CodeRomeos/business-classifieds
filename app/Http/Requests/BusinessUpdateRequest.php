<?php

namespace App\Http\Requests;

use App\Business;
use Illuminate\Foundation\Http\FormRequest;

class BusinessUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
		$business = Business::find($this->route('id'));
        return $business && $this->user()->can('update', $business);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required',
            'address' => 'required'
        ];
    }
}
