<?php


namespace Resto2web\Core\Admin\Controllers;


use Resto2web\Core\Common\Controllers\Controller;

class HomePageController extends Controller
{
    public function __invoke()
    {
        return view('resto2web-admin::pages.home');
    }
}
