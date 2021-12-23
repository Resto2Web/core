<?php

namespace Resto2web\Core\Admin\Theme\Components\Pages;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use function view;

class ContactPageEditorComponent extends Component
{

    public function render(): View
    {
        return view('resto2web-admin::pages.theme.components.pages.contact-page-editor');
    }
}
