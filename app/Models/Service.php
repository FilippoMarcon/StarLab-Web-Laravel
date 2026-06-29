<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'content', 'price_from', 'icon',
        'features', 'delivery_time', 'revisions', 'file_formats',
        'active', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'features' => 'json',
            'active' => 'boolean',
            'price_from' => 'decimal:2',
        ];
    }

    public function getExcerptAttribute(): string
    {
        return Str::limit(strip_tags($this->description), 150);
    }
}
