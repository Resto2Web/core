<?php


namespace Domain\Users\Models;


use Domain\Websites\Models\Website;
use Illuminate\Database\Eloquent\Model;

class SsoToken extends Model
{
    protected $guarded = [];
    protected $casts = [
        'expires_at' => 'timestamp'
    ];

    public function getExpiredAttribute()
    {
        //TODO
        return false;
    }

    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
