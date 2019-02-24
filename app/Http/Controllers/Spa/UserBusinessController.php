<?php

namespace App\Http\Controllers\Spa;

use Illuminate\Http\Request;
use App\Http\Controllers\Spa\Controller;
use App\Http\Requests\BusinessCreateRequest;
use App\Http\Requests\BusinessUpdateRequest;
use App\Http\Requests\ServiceCreateRequest;
use App\Http\Requests\ServiceUpdateRequest;
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
        $data = $request->all();
        $data['contacts'] = json_decode($data['contacts']);
        $data['emails'] = json_decode($data['emails']);

		$result = $this->repo->update($business, $data);
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

	public function updateService(ServiceUpdateRequest $request, Services $serviceRepo, $businessId, $serviceId)
	{
		$service = $request->user()->business->services()->find($serviceId);

		if($service)
		{
			$service = $serviceRepo->updateByCurrentUser($request, $service);

			return $this->respond(['success' => true, 'update' => true, 'message' => 'Service updated successfully', 'service' => new ServiceResource($service)]);
		}

		return $this->respondNotFound('Service not found!');
	}
}
