<?php

namespace App\Http\Controllers;

use App\Civilite;
use App\Client;
use App\Devis;
use App\Fonction;
use App\Garantie;
use App\Pays;
use App\Reglement;
use App\Unite;
use App\Utilisateur;
use App\Variable;

use App\CustomLibrary\HttpResponseCode;
use App\Http\Controllers\Controller;
use App\Traits\ParametresTrait;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use Validator;

class ParametreController extends Controller
{
	use ParametresTrait;

	public function __construct(Request $request)
	{
		$this->models = [
			"civilités" => "civilites",
			"origine des clients" => "clients",
			"status des devis" => "devis",
			"fonctions personnes" => "fonctions",
			"types de garanties" => "garanties",
			"pays" => "pays",
			"modes de règlement" => "reglements",
			"unités" => "unites",
			"profils utilisateurs" => "utilisateurs",
			"variables" => "variables"
		];
		if ($request->route('node'))
			$this->node = $request->route('node');
		$this->fonction();
	}

	public function PrintParameter()
	{
		if(in_array($this->node, array_values($this->models)))
		{
			return view("parametres.node", ["title" => array_search($this->node, $this->models), 'node' => $this->node]);
		}
		return "La page que vous recherchez est introuvable";
	}
}
