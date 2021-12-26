<?php

namespace Resto2web\Core\Admin\Components;

use Illuminate\Contracts\View\View;
use MarkSitko\LaravelUnsplash\UnsplashFacade as Unsplash;

class UnsplashImageSearch extends \Livewire\Component
{
    public ?string $unsplashSearch = null;

    public function mount()
    {

    }

    public function render(): View
    {
        $unsplashResults = collect();
        if (strlen($this->unsplashSearch) > 3) {
         $unsplashResults = collect(Unsplash::search()
                ->term($this->unsplashSearch)
                ->orientation('landscape')->toJson()->results);
        }
        return view('resto2web-admin::pages.theme.components.unsplash-image-search')
            ->with(compact('unsplashResults'));
    }

    public function selectUnsplashImage($id)
    {
        $this->emitUp('selectedUnsplashImage',$id);
    }
}
