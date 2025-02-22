<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(["auth"])->group(function()
{
	Route::get("/", "DashboardController@printDashboard")->name("home");

	Route::group(["prefix" => "/gestion"], function()
	{
		Route::get("/", function()
		{
			return(view("gestion"));
		});
	});

	Route::group(["prefix" => "/parametres"], function()
	{
		Route::get("/", function(){ return(view("settings")); });
		Route::get("/unites", function(){ return(view("units"));});
	});

	Route::get("/deconnexion", function()
	{
		Auth::logout();
		return(redirect("connexion"));
	});
});

Route::get('/connexion', function()
{
	return(view("login"));
})->name("connexion");

Auth::routes();
