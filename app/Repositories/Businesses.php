<?php

namespace App\Repositories;

use App\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Businesses extends Repository
{
	public function __construct(Business $model)
	{
		parent::__construct($model);
	}

	public function approvedAndActive()
	{
		return $this->model->where('is_active', true)->whereNotNull('approved_at');
	}
}