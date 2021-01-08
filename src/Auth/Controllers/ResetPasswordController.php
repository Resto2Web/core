<?php

namespace Resto2web\Core\Auth\Controllers;

use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Resto2web\Core\Common\Controllers\Controller;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
    use SEOTools;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function showResetForm(Request $request, $token = null)
    {
        $this->seo()->setTitle('Réinitialisation du mot de passe');
        $this->seo()->setDescription('Mot de passe oublié? Pas de soucis, réinitialisez le ici!');

        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
