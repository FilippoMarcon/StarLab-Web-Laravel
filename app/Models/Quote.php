<?php

namespace App\Models;

use App\Models\QuoteMessage;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'user_id', 'name', 'email', 'phone', 'service_type', 'description',
        'status', 'token', 'staff_notes', 'staff_notes_updated_at',
        'amount', 'paid_at', 'paypal_txn_id',
    ];

    protected function casts(): array
    {
        return [
            'staff_notes_updated_at' => 'datetime',
            'paid_at' => 'datetime',
            'amount' => 'decimal:2',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attachments()
    {
        return $this->hasMany(QuoteAttachment::class);
    }

    public function deliverables()
    {
        return $this->hasMany(QuoteDeliverable::class);
    }

    public function messages()
    {
        return $this->hasMany(QuoteMessage::class);
    }

    public function isPaid(): bool
    {
        return $this->paid_at !== null;
    }

    public function hasAmount(): bool
    {
        return $this->amount !== null && $this->amount > 0;
    }
}
