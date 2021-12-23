<?php

namespace Resto2web\Core\Admin\Theme\Controllers;

use Illuminate\Contracts\View\View;
use Resto2web\Core\Common\Controllers\Controller;

class ThemeEditorPageController extends Controller
{
    public function __invoke(): View
    {
        return view('resto2web-admin::pages.theme.editor');
    }
}
