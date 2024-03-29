<?php

namespace Resto2web\Core\Admin\Meals\Controllers;


use Resto2web\Core\Common\Controllers\Controller;
use Resto2web\Core\Domain\Meals\DataTransferObjects\MealData;
use Resto2web\Core\Admin\Meals\Requests\StoreMealRequest;
use Resto2web\Core\Admin\Meals\Requests\UpdateMealRequest;
use Resto2web\Core\Domain\Meals\Actions\DestroyMealAction;
use Resto2web\Core\Domain\Meals\Actions\ProcessMealImageAction;
use Resto2web\Core\Domain\Meals\Actions\StoreMealAction;
use Resto2web\Core\Domain\Meals\Actions\UpdateMealAction;
use Resto2web\Core\Domain\Meals\Models\Meal;
use Resto2web\Core\Domain\Meals\Models\MealCategory;

class MealsController extends Controller
{
    public function index()
    {
        $meals = Meal::all();
        return view("resto2web-admin::pages.meals.index")
            ->with(compact('meals'));
    }

    public function create()
    {
        $meal_categories = MealCategory::all();
        return (view("resto2web-admin::pages.meals.create"))
            ->with(compact( "meal_categories"));
    }

    public function show()
    {
        abort(404);
    }

    public function store(StoreMealRequest $request)
    {
        $data = MealData::fromRequest($request);
        $meal = StoreMealAction::execute($data);
        //TODO Images
        //TODO Toast
        return redirect(route("admin.meals.index"));
    }

    public function edit(Meal $meal)
    {
        $meal_categories = MealCategory::all();
        return view("resto2web-admin::pages.meals.edit")
            ->with(compact("meal", "meal_categories"));
    }

    public function update(UpdateMealRequest $request, Meal $meal)
    {
        $data = MealData::fromRequest($request);
        UpdateMealAction::execute($data, $meal);
        //TODO Images
        //TODO Toast
        notify()->success('Plat modifié');
        return redirect(route("admin.meals.index"));
    }

    public function destroy(Meal $meal)
    {
        DestroyMealAction::execute($meal);
        return redirect(route('dashboard.meals.index'));
    }
}
