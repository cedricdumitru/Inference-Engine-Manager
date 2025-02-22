<?php

namespace App\Http\Controllers;

use App\Category;
use App\CustomLibrary\HttpResponseCode;
use App\Http\Controllers\Controller;

class UniteController extends Controller
{
	use Validator;

	public function PrintUnites()
	{
		return(view("unites"));
	}
}
