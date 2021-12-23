<?php

namespace Resto2web\Core\Domain\Theme\HomeSlides\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class HomeSlide extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = [];
}
