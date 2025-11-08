<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use Sluggable;

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'client_id',
        'category_id',
        'thumbnail',
        'link',
        'video_url',
        'status',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function stack()
    {
        return $this->belongsToMany(Stack::class, 'project_stack', 'project_id', 'stack_id');
    }

    public function feature()
    {
        return $this->belongsToMany(Feature::class, 'feature_project', 'project_id', 'feature_id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriProject::class, 'category_id');
    }

    public function galleries()
    {
        return $this->hasMany(ProjectGallery::class);
    }
}
