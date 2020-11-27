<?php


namespace Resto2web\Core\Common\Controllers;


class DisabledWebsitePageController extends Controller
{
    public function __invoke()
    {
        return view('resto2web::pages.disabled-website');
    }
}
