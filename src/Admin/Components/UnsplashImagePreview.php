<?php

namespace Resto2web\Core\Admin\Components;

use Illuminate\Contracts\View\View;
use MarkSitko\LaravelUnsplash\UnsplashFacade as Unsplash;

class UnsplashImagePreview extends \Livewire\Component
{

    public string $unsplashId;

    public function render(): View
    {
        $url = Unsplash::photo($this->unsplashId)->toJson()->urls->small;
        return view('resto2web-admin::pages.theme.components.unsplash-image-preview')
            ->with(compact('url'));
    }

    public function selectUnsplashImage($id)
    {
        $this->emitUp('selectedUnsplashImage',$id);
    }
}
