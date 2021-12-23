<?php


namespace Resto2web\Core\Common\Controllers;


use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Resto2web\Core\Settings\GeneralSettings;

class DisabledWebsitePageController extends Controller
{
    public function __invoke(GeneralSettings $settings): View|RedirectResponse
    {
        if ($settings->siteActive) {
            return redirect('/');
        }
        return view('resto2web::pages.disabled-website');
    }
}
