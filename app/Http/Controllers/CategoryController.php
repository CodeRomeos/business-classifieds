<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
	public function index(Request $request)
	{
		return view('categories.index');
	}

	public function adminIndex(Request $request, $type = null)
	{
		if($type == 'create')
			return view('categories.create');
		elseif($type == 'search') {
			$categories = Category::latest()->where('name', 'LIKE', "%$request->get('name')%");
		}
		else {
			$categories = Category::latest();
		}

		$categories = $categories->paginate('30');

		return view('admin.categories', compact('categories'));
	}
}