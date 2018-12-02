<?php

namespace App\Http\Controllers\Spa;

use Illuminate\Http\Request;
use App\Http\Controllers\Spa\Controller;
use App\Http\Requests\BusinessCreateRequest;

class UserBusinessController extends Controller
{
    public function show(Request $request)
	{
		if(!$request->user()->business)
		{
			return $this->respond(['notCreated' => 'Business not created!']);
        }

        return $this->respond(['business' => $request->user()->business]);
    }

    public function create(BusinessCreateRequest $request)
    {
        $business = $request->user()->businesses()->create($request->all());
        dd($business);
    }

    public function update(Request $request)
    {
        dd($request->all());
        $business = $request->user()->businesses()->update($request->all());
        dd($business);
    }
}
