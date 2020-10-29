<?php


namespace Resto2web\Core\Http\Controllers;


use Artesaos\SEOTools\Traits\SEOTools;

class ContactPageController extends Controller
{
    use SEOTools;
    public function __invoke()
    {
        $this->seo()->setTitle('Contact');
        return view('resto2web-core::pages.contact');
    }
}
