<?php

namespace App\Http\Controllers\Spa;

use Illuminate\Http\Request;
use App\Http\Controllers\Spa\Controller;
use App\Repositories\Keywords;
use App\Http\Resources\Keyword as KeywordResource;

class KeywordController extends Controller
{
    private $repo;

    public function __construct(Keywords $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        $keywords =  $this->repo->all()->get();

        return $this->respond(['keywords' => KeywordResource::collection($keywords)]);
    }

    public function test(Request $request)
    {
        $keywords= ['alskdfj', 'laskdjflskdf', 'test'];
        dd($this->repo->findOrCreate($keywords));
    }
}
