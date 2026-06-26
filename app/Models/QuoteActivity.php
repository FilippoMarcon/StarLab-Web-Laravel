<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteActivity extends Model
{
    protected $fillable = ['quote_id', 'type', 'description', 'user_id'];

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
