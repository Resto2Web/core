<?php

namespace Resto2web\Core\Admin\Theme\Components;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class EditorSidebarComponent extends Component
{
    const GENERAL_MODE = 'general';
    const PAGES_MODE = 'pages';

    public string $mode = self::GENERAL_MODE;
    public string $page = 'home';

    public function render(): View
    {
        return view('resto2web-admin::pages.theme.components.editor-sidebar');
    }

    public function setMode($mode)
    {
        $this->mode = $mode;
    }

    public function updatedPage()
    {
        $this->emit('redirectPreviewTo',route($this->page));
    }

}
