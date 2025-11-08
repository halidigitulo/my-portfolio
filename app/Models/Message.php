<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'subjek',
        'pesan',
    ];
}
