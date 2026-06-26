<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class QuoteAttachment extends Model
{
    protected $fillable = ['quote_id', 'filename', 'original_name', 'path', 'mime_type', 'size'];

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function getUrlAttribute()
    {
        return Storage::url($this->path);
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

    public function isImage()
    {
        return $this->mime_type && str_starts_with($this->mime_type, 'image/');
    }
}
