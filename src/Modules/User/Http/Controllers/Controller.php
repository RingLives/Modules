<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Modules\Core\Http\Controllers\CoreController as BaseController;

class Controller extends BaseController
{
	/**
	 * Get the guard to be used during registration.
	 *
	 * @return \Illuminate\Contracts\Auth\StatefulGuard
	 */
	protected function guard()
	{
	    return Auth::guard();
	}
}