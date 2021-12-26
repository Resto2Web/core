<?php


namespace Resto2web\Core\Domain\Meals\Actions;


use Resto2web\Core\Domain\Meals\DataTransferObjects\MealCategoryData;
use Resto2web\Core\Domain\Meals\Models\MealCategory;

class UpdateMealCategoryAction
{
    public static function execute(MealCategoryData $data, MealCategory $mealCategory)
    {
        $mealCategory->update($data->toArray());
    }
}
