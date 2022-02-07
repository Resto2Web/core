<?php

namespace Resto2web\Core\Admin\Theme\Components;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Resto2web\Core\Settings\ThemeSettings;

class GeneralEditorComponent extends Component
{
    public string $headings_font = '';
    public string $body_font = '';
    public string $primary_color = '';
    public string $secondary_color = '';

    public function mount()
    {
        $themeSettings = app(ThemeSettings::class);
        $this->headings_font = $themeSettings->headings_font;
        $this->body_font = $themeSettings->body_font;
        $this->primary_color = $themeSettings->primary_color;
        $this->secondary_color = $themeSettings->secondary_color;
    }

    public function render(): View
    {
        return view('resto2web-admin::pages.theme.components.general.general-component');
    }

    public function updated()
    {
        $themeSettings = app(ThemeSettings::class);
        $themeSettings->headings_font = $this->headings_font;
        $themeSettings->body_font = $this->body_font;
        $themeSettings->primary_color = $this->primary_color;
        $themeSettings->secondary_color = $this->secondary_color;
        $themeSettings->save();
        $this->emit('refreshPreview');
    }

}
