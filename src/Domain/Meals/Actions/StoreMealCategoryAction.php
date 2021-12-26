<?php


namespace Resto2web\Core\Domain\Meals\Actions;


use Resto2web\Core\Domain\Meals\DataTransferObjects\MealCategoryData;
use Resto2web\Core\Domain\Meals\Models\MealCategory;


class StoreMealCategoryAction
{
    public static function execute(MealCategoryData $data)
    {
        $data->position = MealCategory::count() + 1;
        return MealCategory::create($data->toArray());
    }
}
