<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Events\UserWasRegistered;
use Validator;

class LoginController extends Controller
{
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
	public function login(Request $request)
	{
		if(auth()->attempt(['email' => request('email'), 'password' => request('password')]))
		{
			$user = auth()->user();
			$success['user'] = $user->name;
			$success['role'] = $user->role->name;

			if($user->isAdmin)
			{
				$success['redirect'] = route('admin.dashboard');
				return $this->respond(['data' => $success]);
			}

			$success['token'] = $user->createToken(config('auth.token_name'))->accessToken;

            return $this->respond(['data' => $success]);
        }
        else {
            return $this->respondUnauthorised();
        }
	}
}
