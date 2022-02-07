<?php

namespace Resto2web\Core\Domain\Theme\HomeSlides\Models;

use Illuminate\Database\Eloquent\Model;
use Resto2web\Core\Domain\UnsplashMedia\Traits\HasUnsplashMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class HomeSlide extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasUnsplashMedia;

    public function getImageUrlAttribute(): string
    {
        if ($this->unsplashMedia()->count()) {
            return $this->unsplashMedia()->first()->regular_url;
        }else {
            return $this->getFirstMediaUrl('image');
        }
    }

    protected $guarded = [];
}
