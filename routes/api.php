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
	Route::group(["middleware" => ['sessions', "web"], "prefix" => "/list"], function()
	{
		Route::get("/collections", "CollectionController@getCollectionsList");
		Route::put("/collections", "CollectionController@setCollectionsList");

		Route::get("/categories", "CategoryController@getCategoriesList");
		Route::put("/categories", "CategoryController@setCategoriesList");
	});

	Route::group(["middleware" => ['sessions', "web"], "prefix" => "/parametres/{node}"], function()
	{
		Route::get("/", "ParametreController@getParameter");
		Route::put("/", "ParametreController@setParameter");
	});

	Route::group(["middleware" => ['sessions', "web"], "prefix" => "/gestion/{node}"], function()
	{
		Route::get("/", "DataController@getData");
		Route::put("/", "DataController@setData");
	});
});



