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

	public function createByCurrentUser(Request $request)
	{
		$data = $request->only('name', 'image', 'description');
		$data = $this->uploadIfImageInputExist($data);
		$service = $request->user()->business->services()->create($data);
		return $service;
	}

	public function updateByCurrentUser(Request $request, Service $service)
	{
		$data = $request->except('token');
		$service = $this->update($service, $data);

		return $service;
	}
}