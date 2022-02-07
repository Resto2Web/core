<?php

namespace Resto2web\Core\Domain\UnsplashMedia\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class UnsplashMedia extends Model
{
    protected $table = 'unsplash_media';
    protected $guarded = [];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }
}
