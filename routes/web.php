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
		Route::get("/", function(){ return(view("datas.index")); });

		Route::get("/collections", "DataController@printCollections");
		Route::get("/tarifs", "DataController@printTarifs");
		Route::get("/fournisseurs", "DataController@printFournisseurs");
		Route::get("/tva", "DataController@printTva");

		//node == produits
		Route::get("/produits", "DataController@PrintProduits");
	});

	Route::group(["prefix" => "/parametres"], function()
	{
		Route::get("/", function(){ return(view("parametres.index")); });
		Route::get("/{node}", "ParametreController@PrintParameter");
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



Route::get('/home', 'HomeController@index')->name('home');
