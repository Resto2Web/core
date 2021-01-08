<?php


namespace Resto2web\Core\API\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Resto2web\Core\Common\Controllers\Controller;
use Resto2web\Core\Settings\GeneralSettings;

class WebsiteStatusController extends Controller
{
    public function __invoke(Request $request)
    {
        $settings = app(GeneralSettings::class);
        $settings->siteActive = (bool) $request->input('active');
        $settings->save();
        return Response::json(
            [
                'status' => 'ok',
                'active' => $settings->siteActive
            ],
            200);
    }
}
