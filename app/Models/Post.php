<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'content', 'image', 'meta_title',
        'meta_description', 'published_at', 'active',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'active' => 'boolean',
        ];
    }

    public function getExcerptAttribute(): string
    {
        return Str::limit(strip_tags($this->content), 160);
    }

    public function getReadingTimeAttribute(): string
    {
        $minutes = ceil(str_word_count(strip_tags($this->content)) / 200);
        return $minutes <= 1 ? '1 min' : $minutes . ' min';
    }
}
