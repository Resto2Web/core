<?php


namespace Resto2web\Core\Admin\Settings\Controllers;

use Artesaos\SEOTools\Traits\SEOTools;
use Resto2web\Core\Common\Controllers\Controller;


class SettingsIndexPageController extends Controller
{
    use SEOTools;
    public function index()
    {
        $this->seo()->setTitle('Paramètres');
        return view('resto2web-admin::pages.settings.index');
    }
}
