<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function userBusiness()
    {
    	return view("users.my-business");
    }
}
