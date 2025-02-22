<?php

namespace App\Http\Controllers;


use App\CustomLibrary\HttpResponseCode;
use App\Http\Controllers\Controller;
use App\Traits\eloquentRequests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use Validator;

class DataController extends Controller
{
	use eloquentRequests;

	public function __construct(Request $request)
	{
		if ($request->route()->getPrefix())
			$this->groupeType = $request->route()->getPrefix();
		if ($request->route('node'))
		{
			$this->node = $request->route('node');
			$this->models =
			[
				"produits" => "Produit",
				"collections" => "Collection",
				"tarifs" => "Tarif",
				"fournisseurs" => "Fournisseur",
				"clients" => "Client",
			];
			$this->model = app("App\\".$this->models[$this->node]);
		}
	}

	public function PrintCollections()
	{
		return view("singleTableNode", [
			"title" => "Collections",
			"groupeType" => $this->groupeType,
			"node" => "collections",
			"navigation" => false,
			"specialEdit" => true
		]);
	}

	public function PrintTarifs()
	{
		return view("singleTableNode", [
			"title" => "Tarifs",
			"groupeType" => $this->groupeType,
			"node" => "tarifs",
			"navigation" => false,
			"specialEdit" => true
		]);
	}

	public function PrintFournisseurs()
	{
		return view("singleTableNode", [
			"title" => "Fournisseurs",
			"groupeType" => $this->groupeType,
			"node" => "fournisseurs",
			"navigation" => false,
			"specialEdit" => true
		]);
	}

	public function PrintProduits()
	{
		return view("singleTableNode", ["title" => "Produits", 'groupeType' => $this->groupeType, 'node' => "produits", "navigation" => true, "url" => "/api/list/categories", "specialEdit" => true]);
	}

	public function getData(Request $request)
	{

		$header = array_values($this->model->getTableColumns());
		$result = array_values($this->model->{"getAll".$this->models[$this->node]}()->toArray());
		$data = array();
		foreach ($result as $value)
		{
			array_push($data, array_values($value));
		}
		return response()->json(["header" => $header, "data" => $data]);
	}

	public function setData(Request $request)
	{
		$results = array_values($this->model->{"getAll".$this->models[$this->node]}()->toArray());
		$data = array();
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
				$this->model->{"get".$this->models[$this->node]}(["Libellé" => $filter["Libellé"]])->update($edits);
			}
			else
			{
				$model = "App\\".$this->models[$this->node];
				$data = new $model;
				foreach ($value as $newData)
				{
					$data[$request->header[$j]] = $newData;
					$j++;
				}
				$data->order = $order;
				$data->save();
			}
		}
		foreach ($libelleList as $libelle)
		{
			$this->model->{"get".$this->models[$this->node]}(["Libellé" => $libelle])->delete();
		}
		return;
	}
}
