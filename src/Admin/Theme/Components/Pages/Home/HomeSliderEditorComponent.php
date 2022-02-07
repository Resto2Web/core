<?php

namespace Resto2web\Core\Admin\Theme\Components\Pages\Home;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;
use MarkSitko\LaravelUnsplash\UnsplashFacade as Unsplash;
use Resto2web\Core\Domain\Theme\HomeSlides\Models\HomeSlide;

class HomeSliderEditorComponent extends Component
{

    use WithFileUploads;
    public bool $showSlideModal = false;
    public bool $showImageForm = true;
    public ?int $homeSlideId = null;
    public ?string $unsplashId = null;
    public HomeSlide $homeSlide;
    public $image;

    protected $listeners = [
        'selectedUnsplashImage'
    ];

    protected $rules = [
        'homeSlide.title' => 'required',
        'homeSlide.subtitle' => 'required',
    ];

    public function mount()
    {
        $this->homeSlide = new HomeSlide();
    }

    public function render(): View
    {
        $homeSlides = HomeSlide::all();
        return view('resto2web-admin::pages.theme.components.pages.home.home-slider-editor')
            ->with(compact('homeSlides'));
    }

    public function create()
    {
        $this->showModal();
        $this->homeSlideId = null;
    }

    public function edit($id)
    {
        $this->homeSlideId = $id;
        $this->showImageForm = false;
        $this->homeSlide = HomeSlide::findOrFail($this->homeSlideId);
        $this->showModal();
    }

    public function close()
    {
        $this->hideModal();
    }

    public function delete($id)
    {
        HomeSlide::findOrFail($id)->delete();
        $this->emit('refreshPreview');
    }

    public function save()
    {
        $this->validate();
        if (!is_null($this->homeSlideId)) {
            $this->homeSlide->save();
        } else {
            $this->homeSlide = HomeSlide::create($this->homeSlide->toArray());
        }
        if ($this->image) {
            $this->homeSlide->clearMediaCollection('image');
            $this->homeSlide
                ->addMedia($this->image)
                ->toMediaCollection('image');
        }
        if ($this->unsplashId) {
            $this->homeSlide->clearUnsplashMedia();
            $this->homeSlide->addMediaFromUnsplashId($this->unsplashId);
        }
        $this->image = null;
        $this->hideModal();
        $this->emit('refreshPreview');
    }

    public function showModal()
    {
        $this->showSlideModal = true;
        $this->emit('slideModalDisplay',true);
    }

    public function hideModal()
    {
        $this->showSlideModal = false;
        $this->emit('slideModalDisplay',false);
    }

    public function selectedUnsplashImage($id)
    {
        $this->unsplashId = $id;
    }

}
