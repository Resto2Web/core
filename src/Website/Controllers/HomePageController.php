<?php


namespace Resto2web\Core\Website\Controllers;


use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Contracts\View\View;
use Resto2web\Core\Common\Controllers\Controller;
use Resto2web\Core\Domain\Theme\HomeSlides\Models\HomeSlide;
use Resto2web\Core\Domain\Utility\Helpers\CartOrderHelper;
use Resto2web\Core\Settings\GeneralSettings;
use Resto2web\Core\Settings\MenuSettings;

class HomePageController extends Controller
{
    use SEOTools;
    public function __invoke(): View
    {
        dd(money(10));
        $theme = config('resto2web.core.theme');
        $homeSlides = HomeSlide::all();
        $this->seo()->setTitle('Accueil');
        return view('resto2web.templates::themes.'.$theme.".pages.home")
            ->with(compact('homeSlides'));
    }
}
