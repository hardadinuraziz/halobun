<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_payment', 'booking_id', 'amount', 'biaya_admin',
        'metode', 'status', 'snap_token', 'transaction_id',
        'va_number', 'qris_url', 'midtrans_response', 'paid_at', 'expired_at',
    ];

    protected $casts = [
        'midtrans_response' => 'array',
        'paid_at'           => 'datetime',
        'expired_at'        => 'datetime',
        'amount'            => 'decimal:2',
        'biaya_admin'       => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->kode_payment = 'PAY-' . strtoupper(Str::random(10));
        });
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function totalAmount(): float
    {
        return (float)$this->amount + (float)$this->biaya_admin;
    }

    public function isPaid(): bool
    {
        return $this->status === 'paid';
    }
}
