<?php


namespace Resto2web\Core\Website\Controllers;


use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Contracts\View\View;
use Resto2web\Core\Common\Controllers\Controller;
use Resto2web\Core\Domain\Theme\HomeSlides\Models\HomeSlide;

class HomePageController extends Controller
{
    use SEOTools;
    public function __invoke(): View
    {
        $theme = 'italian-romantic';
        $homeSlides = HomeSlide::all();
        $this->seo()->setTitle('Accueil');
        return view('resto2web.templates::themes.'.$theme.".home")
            ->with(compact('homeSlides'));
    }
}
