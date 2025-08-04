<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the logo URL.
     */
    public function getLogoUrlAttribute()
    {
        return asset('uploads/' . $this->logo);
    }

    /**
     * Get the cover URL.
     */
    public function getCoverUrlAttribute()
    {
        return asset('uploads/' . $this->cover);
    }
}
