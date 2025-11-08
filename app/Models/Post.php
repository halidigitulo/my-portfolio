<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;

    protected $fillable = [
        'judul',
        'slug',
        'excerpt',
        'isi',
        'tag',
        'thumbnail',
        'author_id',
        'is_slider',
        'kategori_id',
        'views',
        'likes',
        'comments_count',
        'shares',
        'published_at',
        'author_id',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
