<?php

namespace App\Repositories;

use App\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Repositories\Cities;
use App\Repositories\Keywords;

class Businesses extends Repository
{
    public $cityRepo;
    public $keywordRepo;

	public function __construct(Business $model, Cities $cityRepo, Keywords $keywordRepo)
	{
        parent::__construct($model);
        $this->cityRepo = $cityRepo;
        $this->keywordRepo = $keywordRepo;
	}

	public function approvedAndActive()
	{
		return $this->model->where('is_active', true)->whereNotNull('approved_at');
    }

    public function create($data)
	{
        $data = $this->prepareData($data);

        $model = parent::create($data);

		$result['created'] = !! ($model);
        $result['business'] = $model;

        $this->syncRelationships($model, $data);

		return $result;
	}

	public function update($model, $data)
	{
        $data = $this->prepareData($data);
        $model = parent::update($model, $data);

		$result['updated'] = !! ($model);
        $result['business'] = $model;

        $this->syncRelationships($model, $data);

		return $result;
    }

    protected function prepareData($data)
    {
        $data['contacts'] = !empty($data['contacts']) ? exclude_null($data['contacts']) : [];
        $data['emails'] = !empty($data['emails']) ? exclude_null($data['emails']) : [];
        return $data;
    }

    protected function syncRelationships($model, $data)
    {
        if(isset($data['cities']) && is_array($data['cities']))
        {
            $cityIds = $this->cityRepo->model()->whereIn('slug', $data['cities'])->pluck('id');
            $model->cities()->sync($cityIds);
        }

        if(isset($data['keywords']) && is_array($data['keywords']))
        {
            $keywordIds = $this->keywordRepo->findOrCreate($data['keywords'])->pluck('id');
            $model->keywords()->sync($keywordIds);
        }

        return $model;
    }
}