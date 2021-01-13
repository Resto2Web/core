<?php


namespace Resto2web\Core\Admin\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;
use Resto2web\Core\Domain\Users\Models\User;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        auth()->setDefaultDriver(app('Resto2WebGuard'));
        if (Auth::user()) {
            /** @var User $user */
            $user = Auth::user();
            abort_unless($user->type == 'admin',403);
            return $next($request);
        }else{
            return redirect()->route('admin.login');
        }

    }
}
