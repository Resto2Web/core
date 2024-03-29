<?php

namespace Resto2web\Core\Admin\Meals\Controllers;


use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Resto2web\Core\Common\Controllers\Controller;
use Resto2web\Core\Settings\PaymentsSettings;
use Resto2web\Core\Settings\MenuSettings;

class MenuSettingsController extends Controller
{

    public function show(): View
    {
        $settings = app(MenuSettings::class);
        $paymentsSettings = app(PaymentsSettings::class);
        return view("resto2web-admin::pages.settings.menu")
            ->with(compact('settings','paymentsSettings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'minimumOrder' => 'required|numeric'
        ]);
        $settings = app(MenuSettings::class);

        $settings->minimumOrder = $request->input('minimumOrder');
        $settings->takeaway = $request->has('takeaway');
        $settings->delivery = $request->has('delivery');
        $settings->hasFreeDeliveryMinimum = $request->has('hasFreeDeliveryMinimum');
        $settings->freeDeliveryMinimum = $request->input('freeDeliveryMinimum');
        $settings->deliveryPrice = $request->input('deliveryPrice');
        $settings->save();

        $paymentsSettings = app(PaymentsSettings::class);
        $paymentsSettings->cashOnDelivery = $request->has('cashOnDelivery');
        $paymentsSettings->cardOnDelivery = $request->has('cardOnDelivery');
        $paymentsSettings->acceptsBancontact = $request->has('acceptsBancontact');
        $paymentsSettings->acceptsVisa = $request->has('acceptsVisa');
        $paymentsSettings->online = $request->has('online');
        $paymentsSettings->save();

        notify()->addNotification('success','Modifications enregistreées');
        return back();
    }
}
