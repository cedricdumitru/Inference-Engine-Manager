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
		Route::post("/", function(Request $request)
		{
			echo("POST");
			//$request->node
		});
		Route::get("/", function(Request $request)
		{
			//return response()->json(["header" => ["Libellé"], 'data' => [["bonjour", "test"], ["un", "DEIx"], ["deux", "zerfr"]]]);
			return response()->json(["header" => ["Libellé"], 'data' => [["bonjour"], ["un"], ["deux"]]]);
		});
		Route::put("/", function(Request $request)
		{
			var_dump([["bonjour"], ["un"], ["deux"]]);
			var_dump($request->all());
			die();
		});
		Route::delete("/", function(Request $request)
		{
			echo("DELETE");
		});
	});

});