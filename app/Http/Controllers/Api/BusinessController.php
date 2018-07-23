<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

use App\Repositories\Businesses;
use App\Http\Resources\Business as BusinessResource;

class BusinessController extends Controller
{

    public function index(Request $request, Businesses $repo)
    {
        $data = [];
		$limit = $request->has('limit') ? $request->get('limit') : 50;
        $businesses =  $repo->approvedAndActive()->orderBy('title');

        // ... more request checks

        $businesses = $businesses->paginate($limit);
        $data = ['businesses' => BusinessResource::collection($businesses)];

        return $this->respondWithPagination([
			    'data'=>$data,
		    ], $businesses);
	}

	public function show(Request $request, Businesses $repo, $businessid)
	{
		$business = $repo->approvedAndActive()->where('businessid', $businessid)->firstOrFail();

		return $this->respond(['data' => new BusinessResource($business)]);
	}
}
