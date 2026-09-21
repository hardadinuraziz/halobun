<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KunjunganOffline extends Model
{
    use HasFactory;

    protected $table = 'kunjungan_offlines';

    protected $fillable = [
        'user_id', 'konsultan_id', 'nama_pemilik', 'phone',
        'tanggal_kunjungan', 'jam_kunjungan', 'alamat_lahan',
        'kota', 'provinsi', 'jenis_tanaman', 'masalah_yang_dihadapi',
        'luas_lahan', 'satuan_lahan', 'status', 'laporan_kunjungan', 'biaya',
    ];

    protected $casts = [
        'tanggal_kunjungan' => 'date',
        'luas_lahan'        => 'decimal:2',
        'biaya'             => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function konsultan()
    {
        return $this->belongsTo(Konsultan::class);
    }
}
