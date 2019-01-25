<?php

namespace App\Repositories;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Services extends Repository
{
	public function __construct(Service $model)
	{
		parent::__construct($model);
	}

	public function create($request)
	{
		$data = $request->only('name', 'image', 'description');
		dd($this->uploadIfImageInputExist($data));
		//$request->user()->business->services()->create($data);
	}
}