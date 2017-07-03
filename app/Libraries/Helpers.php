<?php

namespace App\Libraries;

use App\User;

class Helpers
{
	public static function findOrCreateAndLoginUser($request)
	{
		if($request->user())
			return $request->user();

		$user = User::findByEmail($request->email);
		if(!$user) {
    		$user = self::create_user($request->only('email', 'name', 'password'));
			\Auth::loginUsingId($user->id);
		}
		elseif(!\Auth::attempt($request->only('email','password')))
		{
			$request->session()->flash('incorrect_password','Incorrect password!');
			return false;
		}

		return $user;
	}

	public static function create_user($userDetails)
	{
		$userDetails['password'] = bcrypt($userDetails['password']);
		$user = User::create($userDetails);

		return $user;
	}
}