<?php

namespace Resto2web\Core\Common\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Resto2web\Core\Settings\GeneralSettings;

class WebsiteActive
{
    /**
     * @var GeneralSettings
     */
    private GeneralSettings $settings;

    public function __construct(GeneralSettings $settings)
    {
        $this->settings = $settings;
    }

    private array $except = [
        'api/*',
        'site-desactive'
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
        if ($this->settings->siteActive
            || $this->inExceptArray($request)) {
            return $next($request);
        } else {
            return redirect(route('disabled'));
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
