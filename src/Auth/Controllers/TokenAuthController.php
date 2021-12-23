<?php


namespace Resto2web\Core\Auth\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Resto2web\Core\Common\Controllers\Controller;

class TokenAuthController extends Controller
{
    public function loginWithToken(string $ssoToken)
    {
        $secret = config('resto2web.core.secret');
        if (strlen($secret) == 0 || $secret == '') {
            abort(500, "Secret not configured");
        }
        $response = Http::withoutVerifying()
            ->acceptJson()
            ->get(config('resto2web.core.platform_url')."/ssoCheck/".$ssoToken."/".$secret);
        if ($response->successful()) {
            $user = User::where('email',$response->object()->email)->firstOrFail();
            if ($user->type != 'admin') {
                abort(403);
            }
            if ($this->guard()->user()) {
                return redirect()->route('admin.index');
            }
            $this->guard()->login($user);
            return redirect($this->redirectTo());
        }else{
            dd($response->object());
            return ;
        }
    }

    public function redirectTo(): string
    {
        return route('admin.index');
    }


    protected function guard(): \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
    {
        return Auth::guard(app('Resto2WebGuard'));
    }
}
