<?php

namespace App\Http\Controllers;

use App\Category;
use App\CustomLibrary\HttpResponseCode;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Controller;
use App\Traits\eloquentRequests;

use Illuminate\Http\Request;

use Validator;

class CategoryController extends Controller
{
	public function __construct()
	{
		$this->itemController = new ItemController();
	}
	use eloquentRequests;

	public function getCategoriesList()
	{
		$categories = Category::orderBy("id")->get();
		foreach ($categories as $category)
		{
			$category->type = "category";
			$category->products = $this->itemController->getItems(['referral', $category->id], ["id"]);
		}
		return($categories->toJson());
	}
}
