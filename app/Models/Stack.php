<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stack extends Model
{
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(KategoriStack::class);
    }
}
