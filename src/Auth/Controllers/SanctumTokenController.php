<?php


namespace Resto2web\Core\Auth\Controllers;


use Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Resto2web\Core\Common\Controllers\Controller;
use Resto2web\Core\Domain\Users\Models\User;

class SanctumTokenController extends Controller
{
    public function getToken($sso_token, Request $request)
    {
        $request->validate([
            'device_name' => 'required'
        ]);

        $secret = config('resto2web.core.secret');
        if (is_null($secret) || $secret == '') {
            abort(500, "Secret not configured");
        }
        $response = Http::withoutVerifying()->get(config('resto2web.core.platform_url')."/ssoCheck/".$sso_token."/".$secret);
        if ($response->successful()) {
            $user = User::where('email', $response->object()->email)->firstOrFail();
            if ($user->type != 'admin') {
                abort(403);
            }

            $token = $user->createToken($request->device_name)->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token,
            ];
            return response($response, 201);
        } else {
            return response($response->body(), 400);
        }


    }

    public function logout(Request $request)
    {
        Auth::user()->tokens()->delete();
        return response('Loggedout', 200);
    }
}
