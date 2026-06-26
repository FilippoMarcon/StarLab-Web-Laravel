<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteMessage extends Model
{
    protected $fillable = ['quote_id', 'user_id', 'is_staff', 'message'];

    protected function casts(): array
    {
        return [
            'is_staff' => 'boolean',
        ];
    }

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
