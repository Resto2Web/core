<?php

namespace Resto2web\Core\Auth\Controllers;

use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Resto2web\Core\Common\Controllers\Controller;

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

    use AuthenticatesUsers;
    use SEOTools;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $this->seo()->setTitle('Connexion');
        $this->seo()->setDescription('Connectez-vous à votre compte Huy au plaisir pour profiter dès maintenant de pleins d\'avantages et récoltez des points!');
        if (request()->get('back_to')) {
            session()->put('url.intended', request()->get('back_to'));
        }
        return view('resto2web-auth::.login');

    }
}
