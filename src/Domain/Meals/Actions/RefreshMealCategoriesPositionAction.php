<?php


namespace Resto2web\Core\Domain\Meals\Actions;

use Resto2web\Core\Domain\Meals\Models\MealCategory;

class RefreshMealCategoriesPositionAction
{
    public static function execute()
    {
        $i = 1;
        $mealCategories = MealCategory::all();
        foreach ($mealCategories as $mealCategory) {
            $mealCategory->update([
                'position' => $i
            ]);
            $i++;
        }
    }
}
