<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Pays extends Model
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
		"order",
		"created_at",
		"updated_at"
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
	];

	function getPays($filter)
	{
		return $this::where($filter)->first();
	}

	function getMultiplePays($filter)
	{
		return $this::where($filter)->get();
	}

	function getAllPays()
	{
		return $this::all();
	}

	function recordExist($column, $value)
	{
		return (!!$this->where($column, $value)->count());
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
