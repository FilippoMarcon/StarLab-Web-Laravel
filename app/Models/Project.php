<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title', 'slug', 'category', 'description', 'problem', 'solution',
        'concept', 'client_name', 'cover_image', 'featured', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'featured' => 'boolean',
        ];
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('sort_order');
    }

    public function testimonial()
    {
        return $this->hasOne(Testimonial::class);
    }

    public function getExcerptAttribute(): string
    {
        return Str::limit(strip_tags($this->description), 120);
    }
}
