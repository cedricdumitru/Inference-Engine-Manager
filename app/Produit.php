<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Produit extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [

	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		"id",
		"created_at",
		"updated_at",
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
	];

	function getProduit($filter)
	{
		return $this::where($filter)->orderBy('order', 'asc');
	}

	function getAllProduit()
	{
		return $this::orderBy('order', 'asc')->get();
	}

	function recordExist($column, $value)
	{
		$result = ($value != null) ? $this->where($column, $value)->count() : $this->where($column)->count();
		return (!!$result);
	}

	public function getTableColumns()
	{
		return(array_diff($this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable()), $this->hidden));
	}

	public function getAllTableColumns()
	{
		return($this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable()));
	}
}
