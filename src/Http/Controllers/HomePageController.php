<?php


namespace Resto2web\Core\Http\Controllers;


use Artesaos\SEOTools\Traits\SEOTools;

class HomePageController extends Controller
{
    use SEOTools;
    public function __invoke()
    {
        $this->seo()->setTitle('Accueil');
        return view('resto2web-core::pages.home');
    }
}
