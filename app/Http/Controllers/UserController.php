<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
    	return view('users.dashboard');
    }

    public function password()
    {
    	return view('users.password');
    }
}
