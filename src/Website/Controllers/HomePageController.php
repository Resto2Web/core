<?php


namespace Resto2web\Core\Website\Controllers;


use Artesaos\SEOTools\Traits\SEOTools;
use Resto2web\Core\Common\Controllers\Controller;

class HomePageController extends Controller
{
    use SEOTools;
    public function __invoke()
    {
        $this->seo()->setTitle('Accueil');
        return view('resto2web::pages.home');
    }
}
