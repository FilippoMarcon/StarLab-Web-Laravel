<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteDeliverable extends Model
{
    protected $fillable = ['quote_id', 'filename', 'original_name', 'path_original', 'path_watermarked', 'mime_type', 'size'];

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function getUrlWatermarkedAttribute()
    {
        return $this->path_watermarked ? \App\Services\CloudinaryUrl::get($this->path_watermarked) : null;
    }

    public function getUrlOriginalAttribute()
    {
        return \App\Services\CloudinaryUrl::get($this->path_original);
    }

    public function isImage()
    {
        return $this->mime_type && str_starts_with($this->mime_type, 'image/');
    }

    public function getSizeForHumansAttribute()
    {
        $bytes = $this->size;
        $units = ['B', 'KB', 'MB', 'GB'];
        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }
        return round($bytes, 1) . ' ' . $units[$i];
    }
}
