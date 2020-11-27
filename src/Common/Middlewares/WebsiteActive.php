<?php

namespace Resto2web\Core\Common\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class WebsiteActive
{
    private array $except = [
        'api/*',
        '/'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (setting()->get('site_active')
            || $this->inExceptArray($request)) {
            return $next($request);
        } else {
            return redirect(route('home'));
        }
    }

    protected function inExceptArray($request)
    {
        foreach ($this->except as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }

            if ($request->fullUrlIs($except) || $request->is($except)) {
                return true;
            }
        }

        return false;
    }

}
