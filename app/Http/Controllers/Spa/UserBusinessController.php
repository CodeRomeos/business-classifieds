<?php

namespace App\Http\Controllers\Spa;

use Illuminate\Http\Request;
use App\Http\Controllers\Spa\Controller;

class UserBusinessController extends Controller
{
    public function show(Request $request)
	{
		if(!$request->user()->business)
		{
			return $this->respond(['notCreated' => 'Business not created!']);
		}
	}
}
