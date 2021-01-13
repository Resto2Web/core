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
        $url = Url::temporarySignedRoute('admin.qrcode-auth',now()->addMinutes(5),['user' => Auth::id()]);
        $url = Url::route('admin.qrcode-auth',['user' => Auth::id()]);
        $url = str_replace('resto.test',"e29e2330e575.ngrok.io",$url);
        $qrCode = new QrCode(json_encode([
            'url' => $url
        ]));
        $qrCode->setWriterByName('png');
        $qrCode->setEncoding('UTF-8');
        return view('resto2web-admin::pages.auth.showQrCode')
            ->with(compact('qrCode','url'));
    }

    public function getToken(User $user)
    {
        if (! request()->hasValidSignature() && app()->environment('production')) {
            abort(401);
        }
        $token = $user->createToken('mobile')->plainTextToken;
        $url = URL::secure('/');
        $url = "https://a8de3e995092.ngrok.io";
        return [
            'token' => $token,
            'email'=> $user->email,
            'baseUrl' => $url
        ];

    }
}
