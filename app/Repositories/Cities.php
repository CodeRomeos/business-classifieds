<?php

namespace App\Repositories;

use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Cities extends Repository
{
	public function __construct(City $model)
	{
		parent::__construct($model);
	}

	public function all()
	{
		return $this->model->orderBy('name', 'ASC');
	}
}