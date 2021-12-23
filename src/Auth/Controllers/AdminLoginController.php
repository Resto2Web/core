<?php


namespace Resto2web\Core\Auth\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Resto2web\Core\Common\Controllers\Controller;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    public function login(): View|RedirectResponse
    {
        if ($this->guard()->user()) {
            return redirect()->route('admin.index');
        }

        $domain = parse_url(config('app.url'))['host'];
        return view('resto2web-auth::admin-login')
            ->with(compact('domain'));
    }


    /*
     * Preempts $redirectTo member variable (from RedirectsUsers trait)
     */
    public function redirectTo(): string
    {
        return route('admin.index');
    }


    protected function guard(): Guard
    {
        return Auth::guard(app('Resto2WebGuard'));
    }
}
