<?php

namespace App\Observers;

use App\Business;

class BusinessObserver
{
	public function creating(Business $business)
	{
		$business->businessid = $business->count('id') + 1000001;
		return $business;
	}
}