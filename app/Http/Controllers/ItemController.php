<?php

namespace App\Http\Controllers;

use App\Item;
use App\CustomLibrary\HttpResponseCode;
use App\Http\Controllers\Controller;
use Validator;

class ItemController extends Controller
{
	public static function getItems($filters = ["id", '>', '0'], $orderBy = ["id", "asc"])
	{
		return(Item::where(...$filters)->/*orderBy($orderBy)->*/get());
	}
}
