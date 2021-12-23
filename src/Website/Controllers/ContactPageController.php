<?php


namespace Resto2web\Core\Website\Controllers;


use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Contracts\View\View;
use Resto2web\Core\Common\Controllers\Controller;

class ContactPageController extends Controller
{
    use SEOTools;
    public function __invoke(): View
    {
        $this->seo()->setTitle('Contact');
        return view('resto2web::pages.contact');
    }
}
