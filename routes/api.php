<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(["middleware" => ['sessions', "web"], "prefix" => "/"], function()
{
	Route::group(["middleware" => ['sessions', "web"], "prefix" => "/categories"], function()
	{
		Route::get("/", "CategoryController@getCategories");
		Route::put("/", "CategoryController@setCategories");
	});

	Route::group(["middleware" => ['sessions', "web"], "prefix" => "/parametres/{node}"], function()
	{
		Route::get("/", "ParametreController@getParameter");
		Route::put("/", "ParametreController@setParameter");
	});
});



