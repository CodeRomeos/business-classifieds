<?php

namespace App\Http\Controllers\Spa\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Spa\Controller;
use App\Events\UserWasRegistered;
use Validator;
use App\Http\Resources\User as UserResource;

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
			$success['user'] = new UserResource($user);

			if($user->isAdmin)
			{
                $success['isAdmin'] = true;
				$success['redirect'] = route('admin.dashboard');
				return $this->respond(['data' => $success]);
			}

			//$success['access_token'] = $user->createToken(config('auth.token_name'))->accessToken;

            return $this->respond(['data' => $success]);
        }
        else {
            return $this->respondUnauthorised();
        }
    }

    public function logout(Request $request) {
        // Laravel default implementation
        auth()->logout();
        $request->session()->invalidate();

        // Added this
        $request->session()->regenerateToken();
        return $this->respond(['csrfToken' => $request->session()->token()]);
    }
}
