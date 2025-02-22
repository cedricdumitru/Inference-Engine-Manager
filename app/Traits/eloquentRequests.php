<?php

namespace App\Traits;

trait eloquentRequests
{
	public function getPagination()
	{
		if (!($this->maxPaginationSize)) return(50);
		return (((request("pagination")) && (request('pagination') <= $this->maxPaginationSize)) ? request("pagination") : $this->maxPaginationSize);
	}

	public function getPage($page = 0)
	{
		return(($page > 0) ? $page : $page);
	}

	public function clearRequestFilter($request)
	{
		$columns = $this->model->getTableColumns();
		$filters = [];
		foreach ($columns as $column)
		{
			if(isset($request[$column]) && (null !== $request[$column]))
			{
				$filters[$column] = $request[$column];
			}
		}
		return $filters;
	}

	public function array_values_recursive($arr)
	{
		foreach ($arr as $key => $value)
		{
			if (is_array($value))
				$arr[$key] = $this->array_values_recursive($value);
		}
		if (isset($arr['children']))
			$arr['children'] = array_values($arr['children']);
		return $arr;
	}

	public function arrayRecursiveDiff($arr1, $arr2)
	{
		$outputDiff = [];
		foreach ($arr1 as $key => $value)
		{
			if (array_key_exists($key, $arr2))
			{
				if (is_array($value))
				{
					$recursiveDiff = $this->arrayRecursiveDiff($value, $arr2[$key]);
	
					if (count($recursiveDiff))
					{
						$outputDiff[$key] = $recursiveDiff;
					}
				}
				else if (!in_array($value, $arr2))
				{
					$outputDiff[$key] = $value;
				}
			}
			else if (!in_array($value, $arr2))
			{
				$outputDiff[$key] = $value;
			}
		}
		return $outputDiff;
	}
}
