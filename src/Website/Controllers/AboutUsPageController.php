<?php

namespace Resto2web\Core\Website\Controllers;

use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Contracts\View\View;

class AboutUsPageController
{
    use SEOTools;
    public function __invoke(): View
    {
        $this->seo()->setTitle('A propos de nous');
        return view('resto2web::pages.about-us');
    }
}
