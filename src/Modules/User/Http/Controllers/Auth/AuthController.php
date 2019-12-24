<?php

namespace Modules\User\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController
{
	public function showLoginForm() {
		return view("user::admin.auth.login");
	}
}