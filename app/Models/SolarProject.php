<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class SolarProject extends Model
{
    protected $table = 'solar_projects';

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'completed_at' => 'date',
            'sort_order' => 'integer',
        ];
    }

    public function media(): MorphMany
    {
        return $this->morphMany(
            SolarMedia::class,
            'mediable'
        )
        ->orderBy('sort_order')
        ->orderBy('id');
    }

    public function galleryImages(): MorphMany
    {
        return $this->morphMany(
            SolarMedia::class,
            'mediable'
        )
        ->where('type', 'image')
        ->orderBy('sort_order')
        ->orderBy('id');
    }

    public function galleryVideos(): MorphMany
    {
        return $this->morphMany(
            SolarMedia::class,
            'mediable'
        )
        ->where('type', 'video')
        ->orderBy('sort_order')
        ->orderBy('id');
    }
}
