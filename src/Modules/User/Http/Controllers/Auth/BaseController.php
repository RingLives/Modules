<?php

namespace Modules\User\Http\Auth\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Modules\User\Http\Auth\Controllers\Controller;
use Modules\User\Contracts\Authentication;

abstract class BaseAuthController extends Controller
{
	protected $auth;

	/**
	 * @param \Modules\User\Contracts\Authentication $auth
	 */
	public function __construct(Authentication $auth)
	{
    	$this->auth = $auth;

    	$this->middleware('guest')->except('getLogout');
	}
	
	protected function redirectTo()
	{
	    return route('account.dashboard.index');
	}
	/**
	 * Login a user.
	 *
	 * @param \Modules\User\Http\Requests\LoginRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function login(Request $request)
	{
	    try {
	        $loggedIn = $this->auth->login([
	            'email' => $request->email,
	            'password' => $request->password,
	        ], (bool) $request->get('remember_me', false));

	        if (! $loggedIn) {
	            return back()->withInput()
	                ->withError(trans('user::messages.users.invalid_credentials'));
	        }

	        return redirect()->intended($this->redirectTo());

	    } catch (NotActivatedException $e) {
	        return back()->withInput()
	            ->withError(trans('user::messages.users.account_not_activated'));
	    } catch (ThrottlingException $e) {
	        return back()->withInput()
	            ->withError(trans('user::messages.users.account_is_blocked', ['delay' => intl_number($e->getDelay())]));
	    }
	}
}