<?php


namespace Resto2web\Core\Website\Controllers;


use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Contracts\View\View;
use Resto2web\Core\Common\Controllers\Controller;
use Resto2web\Core\Domain\Meals\Models\MealCategory;

class MenuPageController extends Controller
{
    use SEOTools;
    public function __invoke(): View
    {
        $mealCategories = MealCategory::all();
        $this->seo()->setTitle('Menu');
        return view('resto2web::pages.menu')
            ->with(compact('mealCategories'));
    }
}
