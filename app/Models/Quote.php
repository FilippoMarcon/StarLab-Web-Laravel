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
        'deposit_paid_at', 'deposit_paypal_txn_id', 'delivered_at',
        'client_last_viewed_at', 'staff_last_viewed_at',
    ];

    protected function casts(): array
    {
        return [
            'staff_notes_updated_at' => 'datetime',
            'paid_at' => 'datetime',
            'deposit_paid_at' => 'datetime',
            'delivered_at' => 'datetime',
            'client_last_viewed_at' => 'datetime',
            'staff_last_viewed_at' => 'datetime',
            'amount' => 'decimal:2',
        ];
    }

    public function clientLastActivity(): ?\Illuminate\Support\Carbon
    {
        return $this->user?->last_activity_at;
    }

    public function staffLastActivity(): ?\Illuminate\Support\Carbon
    {
        $staff = \App\Models\User::whereIn('role', ['admin', 'staff'])->latest('last_activity_at')->first();
        return $staff?->last_activity_at;
    }

    public function isClientOnline(): bool
    {
        $last = $this->clientLastActivity();
        return $last && $last->gt(now()->subMinutes(5));
    }

    public function isStaffOnline(): bool
    {
        $last = $this->staffLastActivity();
        return $last && $last->gt(now()->subMinutes(5));
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

    public function activities()
    {
        return $this->hasMany(QuoteActivity::class)->latest();
    }

    public function downloadLogs()
    {
        return $this->hasMany(DownloadLog::class);
    }

    public function logActivity(string $type, string $description, ?int $userId = null): void
    {
        $this->activities()->create([
            'type' => $type,
            'description' => $description,
            'user_id' => $userId ?? auth()->id(),
        ]);
    }

    public function isPaid(): bool
    {
        return $this->paid_at !== null;
    }

    public function hasPaidDeposit(): bool
    {
        return $this->deposit_paid_at !== null;
    }

    public function isDelivered(): bool
    {
        return $this->deliverables()->count() > 0;
    }

    public function hasAmount(): bool
    {
        return $this->amount !== null && $this->amount > 0;
    }

    public function depositAmount(): float
    {
        return $this->amount ? round($this->amount / 2, 2) : 0;
    }

    public function finalAmount(): float
    {
        return $this->amount ? round($this->amount / 2, 2) : 0;
    }

    public static function servicePrices(): array
    {
        return [
            'Thumbnail & Social' => 10,
            'Logo Design' => 25,
            'Banner' => 20,
            'Grafica Avanzata' => 30,
            'Bundle / Pack' => 40,
            'Sviluppo Web' => null,
            'Altro' => null,
        ];
    }

    public function getServicePriceAttribute(): ?float
    {
        return self::servicePrices()[$this->service_type] ?? null;
    }
}
