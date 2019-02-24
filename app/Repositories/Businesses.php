<?php

namespace App\Repositories;

use App\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Repositories\Cities;

class Businesses extends Repository
{
    public $cityRepo;

	public function __construct(Business $model, Cities $cityRepo)
	{
        parent::__construct($model);
        $this->cityRepo = $cityRepo;
	}

	public function approvedAndActive()
	{
		return $this->model->where('is_active', true)->whereNotNull('approved_at');
	}

	public function update($model, $data)
	{
		$data['contacts'] = exclude_null($data['contacts']);
        $data['emails'] = exclude_null($data['emails']);

        $model = parent::update($model, $data);

		$result['updated'] = !! ($model);
        $result['business'] = $model;

        if(isset($data['cities']) && is_array($data['cities']))
        {
            $cityIds = $this->cityRepo->model()->whereIn('slug', $data['cities'])->pluck('id');
            $model->cities()->sync($cityIds);
        }
		return $result;
	}
}