<?php

namespace Maxpro\Role\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $primaryKey = 'id_companies';

	protected $fillable = ['name','description','address','phone','is_active'];

	public static function list($paginate = null) {
		if(is_null($paginate)) {
			return static::orderBy('updated_at', 'desc')->get();
		}
		return static::orderBy('updated_at', 'desc')->paginate($paginate);
	}
	
	public static function findById($id) {
		return static::find($id);
	}
}