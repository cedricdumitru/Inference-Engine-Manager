<?php

namespace App\Http\Controllers;

use App\Collection;
use App\CustomLibrary\HttpResponseCode;
use App\Http\Controllers\Controller;
use App\Traits\eloquentRequests;

use Illuminate\Http\Request;

use Validator;

class CollectionController extends Controller
{
	public function __construct()
	{
		$this->itemController = new ItemController();
	}
	use eloquentRequests;

	public function getCollectionsList()
	{
		$collections = Collection::orderBy("id")->get();
		return($collections->toJson());
	}
}
