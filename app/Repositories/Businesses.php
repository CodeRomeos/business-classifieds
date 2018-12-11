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

	public function update($model, $data)
	{
		$data['contacts'] = exclude_null($data['contacts']);
		$data['emails'] = exclude_null($data['emails']);
		$result['updated'] = $model->update($data);
		$result['business'] = $model;
		return $result;
	}
}