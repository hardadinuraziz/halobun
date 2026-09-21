<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'konsultan_id', 'tanggal', 'jam_mulai', 'jam_selesai', 'is_available',
    ];

    protected $casts = [
        'tanggal'      => 'date',
        'is_available' => 'boolean',
    ];

    public function konsultan()
    {
        return $this->belongsTo(Konsultan::class);
    }

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }
}
