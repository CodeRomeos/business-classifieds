<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome(Request $request, $any = null)
    {
		/*
		$route = explode('/', $any);
		$not_allowed_by_vue = ['login', 'logout', 'admin'];
		if(! in_array($route[0], $not_allowed_by_vue)) {
        	return view('web.welcome');
		}
		*/

		return view('web.welcome');

    }
}
