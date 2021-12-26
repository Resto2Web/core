<?php


namespace Resto2web\Core\Domain\Meals\Actions;


use Exception;
use Resto2web\Core\Domain\Meals\Models\Meal;

class DestroyMealAction
{
    public static function execute(Meal $meal)
    {
        try {
            $meal->delete();
            RefreshMealsPositionInCategoryAction::execute($meal->category);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }
}
