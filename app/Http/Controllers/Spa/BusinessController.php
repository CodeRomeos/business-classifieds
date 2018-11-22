<?php

namespace App\Http\Controllers\Spa;

use Illuminate\Http\Request;
use App\Http\Controllers\Spa\Controller;

use App\Repositories\Businesses;
use App\Http\Resources\Business as BusinessResource;

class BusinessController extends Controller
{
    public function index(Request $request, Businesses $repo)
    {
        $data = [];
		$limit = $request->has('limit') ? $request->get('limit') : 8;
		$businesses =  $repo->approvedAndActive()->orderBy('title');
		if($request->has('keyword') && !empty($request->keyword))
		{
			$keyword = $request->get('keyword');
			$businesses = $businesses->where('title', 'LIKE', "%". $keyword . "%");
		}

		if($request->has('city') && !empty($request->city))
		{
			$city = $request->get('city');
			$businesses = $businesses->where('city', $city);
		}

        // ... more request checks

        $businesses = $businesses->paginate($limit);
        $data = ['businesses' => BusinessResource::collection($businesses), 'search' => compact('keyword', 'city')];

        return $this->respondWithPagination([
			    'data'=>$data,
		    ], $businesses);
	}

	public function show(Request $request, Businesses $repo, $businessid)
	{
		$business = $repo->approvedAndActive()->where('businessid', $businessid)->firstOrFail();

		return $this->respond(['data' => new BusinessResource($business)]);
	}

	public function cities(Request $request, Businesses $repo)
	{
		$cities =  $repo->approvedAndActive()->orderBy('city')->distinct('city')->pluck('city');

		return $this->respond(['data' => compact('cities')]);
	}
}
