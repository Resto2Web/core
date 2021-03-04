<?php


namespace Resto2web\Core\Auth\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Resto2web\Core\Common\Controllers\Controller;
use Resto2web\Core\Domain\Users\Models\User;

class QrCodeAuthController extends Controller
{
    public function show()
    {
        $url = Url::temporarySignedRoute('admin.qrcode-auth',now()->addMinutes(5),['user' => Auth::user()->uuid]);
        $url = Url::route('admin.qrcode-auth',['user' => Auth::user()->uuid]);
        $url = str_replace('resto.test',"c4a089be73b4.ngrok.io",$url);
        return view('resto2web-admin::pages.auth.showQrCode')
            ->with(compact('url'));
    }

    public function getToken(User $user)
    {
        if (! request()->hasValidSignature() && app()->environment('production')) {
            abort(401);
        }
        $token = $user->createToken('mobile')->plainTextToken;
        $url = URL::secure('/');
        $url = "https://c4a089be73b4.ngrok.io";
        return [
            'token' => $token,
            'email'=> $user->email,
            'baseUrl' => $url
        ];

    }
}
