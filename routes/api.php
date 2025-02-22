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
	Route::group(["middleware" => ['sessions', "web"], "prefix" => "/parametres/{node}"], function()
	{
		Route::get("/", "ParametreController@getParameter");

		Route::post("/", function(Request $request)
		{
		});

		Route::put("/", "ParametreController@setParameter");
		Route::delete("/", function(Request $request)
		{
			echo("DELETE");
		});
	});

});