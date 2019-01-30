<?php

namespace App\Http\Controllers\Spa;

use Illuminate\Http\Request;
use App\Http\Controllers\Spa\Controller;
use App\Http\Requests\BusinessCreateRequest;
use App\Http\Requests\BusinessUpdateRequest;
use App\Http\Requests\ServiceCreateRequest;
use App\Repositories\Businesses;
use App\Repositories\Services;
use App\Http\Resources\Business as BusinessResource;
use App\Http\Resources\Service as ServiceResource;

class UserBusinessController extends Controller
{
	protected $repo;

	public function __construct(Businesses $repo)
	{
		$this->repo = $repo;
	}

    public function show(Request $request)
	{
		if(!$request->user()->business)
		{
			return $this->respond(['notCreated' => 'Business not created!']);
        }

        return $this->respond(['business' => new BusinessResource($request->user()->business)]);
    }

    public function create(BusinessCreateRequest $request)
    {
        $business = $request->user()->business()->create($request->all());
        dd($business);
    }

    public function update(BusinessUpdateRequest $request, $id)
    {
		$business = $request->user()->business()->find($id);
		$result = $this->repo->update($business, $request->all());
		if($result['updated'])
		{
			return $this->respond(['success' => true, 'update' => true, 'message' => 'Updated successfully!', 'business' => new BusinessResource($result['business'])]);
		}

		return $this->setResponseCode(422)->respondWithError(['success' => 'false', 'update' => 'false', 'message' => 'Something went wrong. Please try again']);
    }

    public function createService(ServiceCreateRequest $request, Services $serviceRepo, $businessId)
    {
		$service = $serviceRepo->createByCurrentUser($request);

		if($service)
		{
			return $this->respond(['success' => true, 'create' => true, 'message' => 'Service created successfully', 'service' => new ServiceResource($service)]);
		}
    }
}
