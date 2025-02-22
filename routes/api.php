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
	Route::group(["prefix" => "/list"], function()
	{
		Route::get("/categories", "CategoryController@getCategoriesList");
		Route::put("/categories", "CategoryController@setCategoriesList");
	});

	Route::group(["prefix" => "/parametres/{node}"], function()
	{
		Route::get("/", "ParametreController@getParameter");
		Route::put("/", "ParametreController@setParameter");
	});

	Route::group(["prefix" => "/gestion/{node}"], function()
	{
		Route::get("/", "DataController@getData");
		Route::put("/", "DataController@setData");
		Route::get("/details", "DataController@getDataDetails");
		Route::put("/details", "DataController@setDataDetails");
	});
});



