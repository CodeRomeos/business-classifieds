<?php

namespace App\Repositories;

use App\city;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Cities extends Repository
{
	public function __construct(city $model)
	{
		parent::__construct($model);
	}

	public function all()
	{
		return $this->model->orderBy('name', 'ASC');
	}
}