<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'spesialisasi', 'bio', 'foto',
        'harga_per_sesi', 'durasi_menit', 'is_active',
        'rating', 'total_konsultasi',
    ];

    protected $casts = [
        'is_active'        => 'boolean',
        'harga_per_sesi'   => 'decimal:2',
        'rating'           => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function jadwalTersedia()
    {
        return $this->hasMany(Jadwal::class)
            ->where('is_available', true)
            ->where('tanggal', '>=', now()->toDateString());
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
