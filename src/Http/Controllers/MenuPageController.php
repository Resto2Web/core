<?php


namespace Resto2web\Core\Http\Controllers;


use Artesaos\SEOTools\Traits\SEOTools;

class MenuPageController extends Controller
{
    use SEOTools;
    public function __invoke()
    {
        $this->seo()->setTitle('Menu');
        return view('resto2web-core::pages.menu');
    }
}
