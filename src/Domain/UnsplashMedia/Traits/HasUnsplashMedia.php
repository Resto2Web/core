<?php

namespace Resto2web\Core\Domain\UnsplashMedia\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use MarkSitko\LaravelUnsplash\UnsplashFacade;
use Resto2web\Core\Domain\UnsplashMedia\Models\UnsplashMedia;

trait HasUnsplashMedia
{
    public function unsplashMedia(): MorphMany
    {
        return $this->morphMany(UnsplashMedia::class, 'model');
    }

    public function addMediaFromUnsplashId($id)
    {
        $photo = UnsplashFacade::photo($id)->toJson();
        $this->unsplashMedia()->create([
            'unsplash_id' => $id,
            'regular_url' => $photo->urls->regular,
            'small_url' => $photo->urls->small
        ]);
    }

    public function clearUnsplashMedia()
    {
        $this->unsplashMedia()->delete();
    }

}
