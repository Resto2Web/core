<?php


namespace Resto2web\Core\Domain\Meals\Actions;



use Exception;
use Resto2web\Core\Domain\Meals\Models\MealCategory;

class DestroyMealCategoryAction
{
    public static function execute(MealCategory $mealCategory)
    {
        foreach ($mealCategory->meals as $meal) {
            $meal->update([
                'meal_category_id' => null
            ]);
        }
        $mealCategory->delete();
        RefreshMealCategoriesPositionAction::execute();
    }
}
