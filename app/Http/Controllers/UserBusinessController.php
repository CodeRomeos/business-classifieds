<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Business;
use App\Libraries\Helpers;
use App\Http\Requests\BusinessCreateByUserRequest;

class UserBusinessController extends Controller
{
    public function show()
    {
    	return view("users.my-business");
    }

    public function create()
    {
    	return view('users.create-business');
    }

    public function store(BusinessCreateByUserRequest $request)
    {
    	$user = Helpers::findOrCreateAndLoginUser($request);

    	if(!$user) {
    		return redirect()->back()->withInput()->withErrors(['message'=>'Something went wrong. Please try again.']);
    	}

    	$business = $user->business()->create($request->only('title','emails','contact','city','body','address'));
    	$business->save();

    	dd($business);
    }
}
