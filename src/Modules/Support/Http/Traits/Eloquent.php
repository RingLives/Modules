<?php

namespace App\Traits;

trait Eloquent
{
	/**
	 * @return Illuminate\Database\Eloquent\Model Table Name
	 */
	public static function getTableName() {
		return with(new static)->getTable();
	}
	/**
	 * @return Illuminate\Database\Eloquent\Model Primary Key
	 */
	public static function getPrimaryKey() {
		return with(new static)->getKeyName();
	}
}