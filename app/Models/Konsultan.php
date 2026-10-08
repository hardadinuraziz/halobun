<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'klasifikasi', 'spesialisasi', 'bio', 'foto',
        'harga_per_sesi', 'durasi_menit', 'is_active',
        'rating', 'total_konsultasi',
    ];

    protected $casts = [
        'is_active'        => 'boolean',
        'harga_per_sesi'   => 'decimal:2',
        'rating'           => 'decimal:2',
    ];

    public function getKlasifikasiLabelAttribute(): string
    {
        return match($this->klasifikasi) {
            'umum'             => 'Praktisi Umum',
            'super_spesialis'  => 'Praktisi Super Spesialis',
            default            => 'Praktisi Spesialis',
        };
    }

    public function getFotoUrlAttribute(): string
    {
        if ($this->foto && file_exists(public_path($this->foto))) {
            return asset($this->foto);
        }
        if ($this->user && $this->user->avatar && file_exists(public_path($this->user->avatar))) {
            return asset($this->user->avatar);
        }

        $map = [
            1 => '/images/halobun_real_practitioner.jpg',     // Dr. Budi Santoso, M.Si
            2 => '/images/halobun_praktisi_hero.jpg',         // Ir. Siti Rahayu, M.P
            3 => '/images/halobun_hero_halodoc.jpg',          // Prof. Ahmad Fauzi, Ph.D
            4 => '/images/halobun_real_female_1.jpg',         // Drh. Maya Kusuma
            5 => '/images/dashboard_praktisi_banner.jpg',     // Rahmat Hidayat, S.P, M.Agr
            6 => '/images/halobun_real_female_2.jpg',         // Dr. Lestari Wulandari
            7 => '/images/halobun_real_practitioner_2.jpg',   // Bayu Pratama, S.P.
            8 => '/images/halobun_real_soil_test.jpg',        // Prof. Dr. Ir. Suwandi, M.Sc
        ];

        return asset($map[$this->id] ?? '/images/halobun_real_practitioner.jpg');
    }

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

    public function scopeKlasifikasi($query, $klasifikasi)
    {
        return $query->where('klasifikasi', $klasifikasi);
    }
}
