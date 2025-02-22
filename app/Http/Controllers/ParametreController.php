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
use App\Traits\eloquentRequests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use Validator;

class ParametreController extends Controller
{
	use eloquentRequests;

	public function __construct(Request $request)
	{
		$this->models =
		[
			"civilites" => 
			[
				"title" => "civilités",
				"model" => "Civilite"
			],
			"clients" =>
			[
				"title" => "origine des clients",
				"model" => "Client"
			],
			"devis" =>
			[
				"title" => "status des devis",
				"model" => "Devis"
			],
			"fonctions" =>
			[
				"title" => "fonctions personnes",
				"model" => "Fonction"
			],
			"garanties" =>
			[
				"title" => "types de garanties",
				"model" => "Garantie"
			],
			"pays" =>
			[
				"title" => "pays",
				"model" => "Pays"
			],
			"reglements" =>
			[
				"title" => "modes de règlement",
				"model" => "Reglement"
			],
			"unites" =>
			[
				"title" => "unités",
				"model" => "Unite"
			],
			"utilisateurs" =>
			[
				"title" => "profils utilisateurs",
				"model" => "Utilisateur"
			],
			"variables" =>
			[
				"title" => "variables",
				"model" => "Variable"
			]
		];

		if ($request->route('node'))
			$this->node = $request->route('node');
		if ($request->route()->getPrefix())
			$this->groupeType = $request->route()->getPrefix();
		$this->model = app("App\\".$this->models[$this->node]["model"]);
	}

	public function PrintParameter()
	{
		if(array_key_exists($this->node, $this->models))
		{
			return view("singleTableNode", ["title" => $this->models[$this->node]["title"], 'groupeType' => $this->groupeType, 'node' => $this->node, "navigation" => false]);
		}
		return "La page que vous recherchez est introuvable";
	}

	public function getParameter()
	{
		$header = array_values($this->model->getTableColumns());
		$result = array_values($this->model->{"getAll".$this->models[$this->node]["model"]}()->toArray());
		$data = array();
		foreach ($result as $value)
		{
			array_push($data, array_values($value));
		}
		return response()->json(["header" => $header, "data" => $data]);
	}

	public function setParameter(Request $request)
	{
		$results = array_values($this->model->{"getAll".$this->models[$this->node]["model"]}()->toArray());
		$parameter = array();
		$libelleList = array();
		foreach ($results as $result)
		{
			array_push($libelleList, $result["Libellé"]);
		}
		$order = 0;
		foreach ($request->data as $value)
		{
			$order++;
			$j = 0;
			$k = 0;
			$filter = array();
			foreach ($request->header as $header)
			{
				$filter[$header] = $value[$k];
				$k++;
			}

			if ($this->model->recordExist("Libellé", $filter["Libellé"]))
			{
				array_splice($libelleList, array_search($value, $libelleList), 1);
				$edits = $filter;
				$edits["order"] = $order;
				$this->model->{"get".$this->models[$this->node]["model"]}(["Libellé" => $filter["Libellé"]])->update($edits);
			}
			else
			{
				$model = "App\\".$this->models[$this->node]["model"];
				$parameter = new $model;
				foreach ($value as $newData)
				{
					$parameter[$request->header[$j]] = $newData;
					$j++;
				}
				$parameter->order = $order;
				$parameter->save();
			}
		}
		foreach ($libelleList as $libelle)
		{
			$this->model->{"get".$this->models[$this->node]["model"]}(["Libellé" => $libelle])->delete();
		}
		return;
	}
}
