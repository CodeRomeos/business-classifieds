<?php

namespace App\Http\Controllers\Spa;

use Illuminate\Http\Request;
use App\Http\Controllers\Spa\Controller;
use App\Repositories\Keywords;

class KeywordController extends Controller
{
    private $repo;

    public function __construct(Keywords $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        $keywords =  $this->repo->all()->get()->toArray();

        return $this->respond(compact('keywords'));
    }

    public function test(Request $request)
    {
        $keywords= ['alskdfj', 'laskdjflskdf', 'test'];
        dd($this->repo->findOrCreate($keywords));
    }
}
