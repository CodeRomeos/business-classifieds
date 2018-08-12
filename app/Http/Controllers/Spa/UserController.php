<?php

namespace App\Http\Controllers\Spa;

use Illuminate\Http\Request;
use App\Http\Controllers\Spa\Controller;
use App\Repositories\Businesses;

class UserController extends Controller
{
    public function bookmark(Request $request, Businesses $businesses, $business_id)
    {
        $business = $businesses->findOrFail($business_id);
        $user = $request->user();

        if(empty($business = $user->bookmarks()->find($business->id)))
        {
            $user->bookmarks()->attach($business_id);
            return $this->respond(['bookmark' => true]);
        }

        $user->bookmarks()->detach($business_id);
        return $this->respond(['bookmark' => false]);
    }

    public function getBookmarkStatus(Request $request, Businesses $businesses, $business_id)
    {
        $business = $businesses->findOrFail($business_id);
        $user = $request->user();

        if($business = $user->bookmarks()->find($business->id))
        {
            return $this->respond(['bookmarked' => true]);
        }

        return $this->respond(['bookmarked' => false]);
    }
}
