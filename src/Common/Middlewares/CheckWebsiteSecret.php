<?php

namespace Resto2web\Core\Common\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use Response;

class CheckWebsiteSecret
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->bearerToken() == config('resto2web.core.secret')) {
            return $next($request);
        }else{
            return Response::json(['reason'=> 'Unauthorized'],403);
        }
    }
}
