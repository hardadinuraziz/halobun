<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NarsumUndangan extends Model
{
    use HasFactory;

    protected $table = 'narsum_undangans';

    protected $fillable = [
        'user_id', 'nama_acara', 'penyelenggara', 'tanggal_acara',
        'jam_mulai', 'jam_selesai', 'lokasi', 'kota', 'tema',
        'deskripsi_kebutuhan', 'estimasi_peserta', 'format',
        'budget', 'kontak_pic', 'phone_pic', 'status', 'catatan_admin',
    ];

    protected $casts = [
        'tanggal_acara'   => 'date',
        'budget'          => 'decimal:2',
        'estimasi_peserta'=> 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
