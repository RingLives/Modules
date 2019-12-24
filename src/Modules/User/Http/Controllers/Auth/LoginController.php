<?php

namespace Modules\User\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Modules\User\Contracts\Authentication;
use Modules\User\Http\Controllers\Controller;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    protected $auth;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user';

    /**
     * @param \Modules\User\Contracts\Authentication $auth
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm() {
        return view("user::admin.auth.login");
    }

    public function login(Request $request) {


        // print_r("<pre>");
        // print_r($request->all());die();

        try {
            $loggedIn = $this->auth->login([
                'email' => $request->email,
                'password' => $request->password,
            ], (bool) $request->get('remember_me', false));

            if (! $loggedIn) {
                return back()->withInput()
                    ->withError(trans('user::messages.users.invalid_credentials'));
            }

            return redirect()->intended($this->redirectPath());
        } catch (NotActivatedException $e) {
            return back()->withInput()
                ->withError(trans('user::messages.users.account_not_activated'));
        } catch (ThrottlingException $e) {
            return back()->withInput()
                ->withError(trans('user::messages.users.account_is_blocked', ['delay' => intl_number($e->getDelay())]));
        }
    }

    public function logout() {

        $this->auth->logout();
        $this->guard()->logout();

        $request->session()->invalidate();

        return "ss";
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
}
