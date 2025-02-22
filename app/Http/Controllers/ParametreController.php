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
		$this->views = ["civilites", "clients", "devis", "fonctions", "garanties", "pays", "reglements", "unites", "utilisateurs", "variables"];
		if ($request->route('node'))
			$this->view = $request->route('node');
		$this->fonction();
	}

	public function PrintParameter()
	{
		if(View::exists($this->view) && in_array($this->view, $this->views))
		{
			return view($this->view);
		}
		return "La page que vous recherchez est introuvable";
	}
}
