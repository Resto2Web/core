<?php


namespace Resto2web\Core\Auth\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Resto2web\Core\Common\Controllers\Controller;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;
    public function login()
    {
        if ($this->guard()->user()) {
            return redirect()->route('admin.index');
        }

        return view('resto2web-auth::admin-login');
    }


    /*
     * Preempts $redirectTo member variable (from RedirectsUsers trait)
     */
    public function redirectTo()
    {
        return route('admin.index');
    }


    protected function guard()
    {
        return Auth::guard(app('Resto2WebGuard'));
    }
}
