<?php


namespace Resto2web\Core\Admin\Middleware;


use Artesaos\SEOTools\Traits\SEOTools;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminSeoMiddleware
{
    use SEOTools;
    public function handle($request, Closure $next)
    {
        config()->set('seotools.meta.defaults.title','Resto2Web');
        return $next($request);
    }
}
