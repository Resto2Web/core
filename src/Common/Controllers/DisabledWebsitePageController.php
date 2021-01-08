<?php


namespace Resto2web\Core\Common\Controllers;


use Resto2web\Core\Settings\GeneralSettings;

class DisabledWebsitePageController extends Controller
{
    public function __invoke(GeneralSettings $settings)
    {
        if ($settings->siteActive) {
            return redirect('/');
        }
        return view('resto2web::pages.disabled-website');
    }
}
