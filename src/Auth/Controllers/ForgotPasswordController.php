<?php

namespace Resto2web\Core\Auth\Controllers;

use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Resto2web\Core\Common\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    use SEOTools;

    public function showLinkRequestForm()
    {
        $this->seo()->setTitle('Réinitialisation du mot de passe');
        $this->seo()->setDescription('Mot de passe oublié? Pas de soucis, réinitialisez le ici!');

        return view('auth.passwords.email');
    }

}
