<?php

namespace App\Repositories;

use App\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Keywords extends Repository
{
	public function __construct(Keyword $model)
	{
		parent::__construct($model);
	}

	public function all()
	{
		return $this->model->orderBy('title', 'ASC');
    }

    public function findOrCreate($keywords)
    {
        $existed = $this->model()->whereIn('slug', $keywords)->pluck('slug', 'id')->toArray();
        $doesNotExist = array_diff($keywords, $existed);
        if(!empty($doesNotExist)) {
            $toCreate = [];
            $now = \Carbon\Carbon::now()->toDateTimeString();
            foreach($doesNotExist as $slug) {
                $toCreate[] = ['title' => $slug, 'slug' => $slug, 'created_at'=>$now, 'updated_at'=>$now];
            }

            $this->model()->insert($toCreate);
        }

        return $this->model()->whereIn('slug', $keywords);
    }
}