<?php


namespace Resto2web\Core\Domain\Meals\Actions;



use Resto2web\Core\Domain\Meals\Models\Meal;

class ToggleMealActiveStateAction
{
    public static function execute(Meal $meal)
    {
        $meal->update(['active'=>!$meal->active]);
    }
}
