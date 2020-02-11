<?php

namespace Maxpro\Role\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Maxpro\Role\Http\Model\Company;
use Maxpro\Role\Http\Model\Menu;
use Maxpro\Role\Http\Model\Role;
use Illuminate\Http\Request;

class RolePermissionController extends BaseController
{
	public function index() {
		return view('role::role.permission', [
			'companies' => Company::list(),
			'roles' => Role::list(),
			'routes' => Menu::getRoutes(),
		]);
	}

	public function setRoutePermission(Request $request) {
		$this->validate($request,[
		        'role_id' => 'required',
		        'company_id' => 'required',
		    ]);

		// print_r("<pre>");
		// print_r($request->all());die();

		return view('role::role.permission', [
			'companies' => Company::list(),
			'roles' => Role::list(),
			'routes' => Menu::getRoutes(),
		]);
	}
}