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

		if (!$request->route('node')) return;
		$this->models =
		[
			"produits" => 
			[
				"title" => "produits",
				"model" => "Produit"
			],
			"collections" => 
			[
				"title" => "collections",
				"model" => "Collection"
			]
		];

		if ($request->route('node'))
			$this->node = $request->route('node');
		$this->model = app("App\\".$this->models[$this->node]["model"]);
	}

	public function PrintCollections()
	{
		return view("singleTableNode", ["title" => "Collections", 'groupeType' => $this->groupeType, 'node' => "collections", "navigation" => false, "specialEdit" => true]);
	}

	public function PrintData()
	{
		if(array_key_exists($this->node, $this->models))
		{
			return view("singleTableNode", ["title" => $this->models[$this->node]["title"], 'groupeType' => $this->groupeType, 'node' => $this->node, "navigation" => true, "url" => "/api/list/categories"]);
		}
		return "La page que vous recherchez est introuvable";
	}

	public function getData()
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

	public function setData(Request $request)
	{
		$result = array_values($this->model->{"getAll".$this->models[$this->node]["model"]}()->toArray());$data = array();
		$dataList = array();
		foreach ($result as $value)
		{
			array_push($dataList, array_values($value));
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

			if ($this->model->recordExist($filter, null))
			{
					array_splice($dataList, array_search($value, $dataList), 1);
					$edits = $filter;
					$edits["order"] = $order;
					$this->model->{"get".$this->models[$this->node]["model"]}($filter)->update($edits);
			}
			else
			{
				$model = "App\\".$this->models[$this->node]["model"];
				$data = new $model;
				foreach ($value as $data)
				{
					$data[$request->header[$j]] = $data;
				}
				$data->order = $order;
				$data->save();
				$j++;
			}
		}
		foreach ($dataList as $element)
		{
			$this->model->{"get".$this->models[$this->node]["model"]}(["Libellé" => $element])->delete();
		}
		return($this->getData());
	}
}
