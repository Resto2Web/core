<?php


namespace Resto2web\Core\Admin\Settings\Controllers;

use Artesaos\SEOTools\Traits\SEOTools;
use Resto2web\Core\Admin\Settings\Requests\GeneralSettingsRequest;
use Resto2web\Core\Common\Controllers\Controller;
use Resto2web\Core\Settings\GeneralSettings;


class GeneralSettingsPageController extends Controller
{
    use SEOTools;

    public function show()
    {
        $this->seo()->setTitle('Paramètres généraux');
        $settings = app(GeneralSettings::class);
        return view('resto2web-admin::pages.settings.general')
            ->with(compact('settings'));
    }

    public function update(GeneralSettingsRequest $request)
    {
        $request->validated();
        $settings = app(GeneralSettings::class);
        $settings->email = $request->input('email');
        $settings->phoneNumber = $request->input('phoneNumber');
        $settings->facebook_url = $request->input('facebook_url') ?? '';
        $settings->save();
        notify()->addNotification('success', 'Modifications enregistreées');
        return back();
    }
}
