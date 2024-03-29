<?php


namespace Resto2web\Core\Domain\Meals\Actions;


use Resto2web\Core\Domain\Meals\Models\Meal;

class UpdateMealPositionAction
{
    public static function execute(Meal $meal, $newPosition)
    {
        $oldPosition = $meal->position;
        if ($meal->category){
            if ($oldPosition < $newPosition) {
                //ON DESCEND UN LINE
                foreach ($meal->category->meals->sortBy('position') as $line) {
                    if ($oldPosition < $line->position && $line->position <= $newPosition) {
                        $line->update(['position'=>$line->position - 1]);
                    }
                }
            } else {
                //ON MONTE UN LINE
                foreach ($meal->category->meals->sortBy('position') as $line) {
                    if ($line->position < $oldPosition && $line->position >= $newPosition) {
                        $line->update(['position'=>$line->position + 1]);
                    }
                }
            }
        }
        $meal->update(['position'=>$newPosition]);
    }
}
