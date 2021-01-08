<?php


namespace Resto2web\Core\Auth\Controllers;


use Domain\Users\Actions\CreateOrLoginUserFromSocialAction;
use App\Admin\Controllers\Controller;
use Exception;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirectToSocial($social)
    {
        return Socialite::with($social)->redirect();
    }

    function handleSocialCallback($social)
    {
        if (request()->has('error_code') || request()->has('error_reason')) {
            toastError("Nous n'avons pas pu vous connecter, veuillez réessayer.",'Erreur');
            return redirect('/');
        }
//        if ($social == 'facebook'){
//            $provider = Socialite::driver($social);
//            $providerUser = $provider->user();
//            if ($providerUser->getEmail() == null){
////                $this->graphUrl.'/'.$this->version.'/me/permissions?access_token='.$access_token
////            $response = \Http::delete("https://graph.facebook.com/".$providerUser->getId()."/permissions");
//            toastError("Veuillez nous accorder l'accès à votre email. <br> Contactez-nous si le problème subsiste.",'Erreur');
//            return redirect('/');
//            }
//        }
        try {
            $user = CreateOrLoginUserFromSocialAction::execute(Socialite::driver($social));
            auth()->login($user);
            toastSuccess('Bienvenue!','Succès');
            $intendedUrl = session()->get('url.intended', url('/'));
            session()->forget('url.intended');
            return redirect($intendedUrl);
        } catch (Exception $e) {
            return $e;
        }
    }
}
