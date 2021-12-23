<?php

namespace Resto2web\Core\Admin\Theme\Components\Pages;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
use Resto2web\Core\Domain\Theme\HomeSlides\Models\HomeSlide;
use function view;

class HomePageEditorComponent extends Component
{

    use WithFileUploads;
    public bool $showSlideModal = false;
    public ?int $homeSlideId = null;
    public HomeSlide $homeSlide;
    public $image;

    public function mount()
    {
        $this->homeSlide = new HomeSlide();
    }

    protected $rules = [
        'homeSlide.title' => 'required',
        'homeSlide.subtitle' => 'required',
    ];

    public function render(): View
    {
        $homeSlides = HomeSlide::all();
        return view('resto2web-admin::pages.theme.components.pages.home-page-editor')
            ->with(compact('homeSlides'));
    }

    public function create()
    {
        $this->showSlideModal = true;
        $this->homeSlideId = null;
    }

    public function edit($id)
    {
        $this->homeSlideId = $id;
        $this->homeSlide = HomeSlide::findOrFail($this->homeSlideId);
        $this->showSlideModal = true;
    }

    public function close()
    {
        $this->showSlideModal = false;
    }

    public function delete($id)
    {
        HomeSlide::findOrFail($id)->delete();
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
        $this->image = null;
        $this->showSlideModal = false;
    }
}
