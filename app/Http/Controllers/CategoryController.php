<?php

namespace App\Http\Controllers;

use App\Category;
use App\CustomLibrary\HttpResponseCode;
use App\Http\Controllers\Controller;
use App\Traits\eloquentRequests;

use Illuminate\Http\Request;

use Validator;

class CategoryController extends Controller
{
	use eloquentRequests;

	public function getCategories()
	{
		return(Category::orderBy("id")->get()->toJson());
	}
}
