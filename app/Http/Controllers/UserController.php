<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
    	return view('users.dashboard');
    }

    public function profile()
    {
    	return view('users.user-profile');
    }
    public function password()
    {
    	return view('users.password-update');
    }
}
