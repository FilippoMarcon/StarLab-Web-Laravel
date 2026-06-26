<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['graphic_id', 'customer_name', 'customer_email', 'tier', 'amount', 'stripe_session_id', 'stripe_payment_intent', 'payment_status', 'download_token', 'downloaded_at'];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'downloaded_at' => 'datetime',
        ];
    }

    public function graphic()
    {
        return $this->belongsTo(Graphic::class);
    }
}
