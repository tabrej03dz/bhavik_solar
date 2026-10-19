<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class SolarMedia extends Model
{
    protected $table = 'solar_media';

    protected $fillable = [
        'mediable_type',
        'mediable_id',
        'type',
        'file_path',
        'original_name',
        'alt_text',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }

    public function mediable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getUrlAttribute(): string
    {
        return Storage::disk('public')
            ->url($this->file_path);
    }
}
