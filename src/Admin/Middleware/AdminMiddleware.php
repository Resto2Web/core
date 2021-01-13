<?php


namespace Resto2web\Core\Admin\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        auth()->setDefaultDriver(app('Resto2WebGuard'));
        if (!Auth::guest()) {
            $user = Auth::user();
            if ($user->type == 'admin') {
                return $next($request);
            }
            return redirect('/');
        }
        $urlLogin = route('admin.login');

        return redirect()->guest($urlLogin);
    }
}
