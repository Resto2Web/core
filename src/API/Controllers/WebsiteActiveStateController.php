<?php


namespace Resto2web\Core\API\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Resto2web\Core\Common\Controllers\Controller;

class WebsiteActiveStateController extends Controller
{
    public function __invoke(Request $request)
    {
        setting()->set('site_active', (bool) $request->input('active'));
        setting()->save();
        return Response::json(
            [
                'status' => 'ok',
                'active' => setting()->get('site_active')
            ],
            200);
    }
}
