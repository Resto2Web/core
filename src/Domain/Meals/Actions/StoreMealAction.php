<?php


namespace Resto2web\Core\Domain\Meals\Actions;

use Resto2web\Core\Domain\Meals\DataTransferObjects\MealData;
use Resto2web\Core\Domain\Meals\Models\Meal;
use Resto2web\Core\Domain\Meals\Models\MealCategory;

class StoreMealAction
{

    public static function execute(MealData $data): Meal
    {
        if ($data->meal_category_id != null) {
            $mealCategory = MealCategory::findOrFail($data->meal_category_id);
            $data->position = $mealCategory->meals()->count() + 1;
        }
        return Meal::create($data->toArray());
    }
}
