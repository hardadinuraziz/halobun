<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sarana extends Model
{
    use HasFactory;

    protected $table = 'saranas';

    protected $fillable = [
        'nama', 'slug', 'kategori', 'deskripsi', 'deskripsi_singkat',
        'harga', 'harga_coret', 'stok', 'satuan', 'gambar',
        'gambar_galeri', 'merek', 'is_active', 'is_featured', 'total_terjual',
    ];

    protected $casts = [
        'is_active'     => 'boolean',
        'is_featured'   => 'boolean',
        'gambar_galeri' => 'array',
        'harga'         => 'decimal:2',
        'harga_coret'   => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->slug = $model->slug ?? Str::slug($model->nama) . '-' . Str::random(4);
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function diskonPersen(): ?int
    {
        if ($this->harga_coret && $this->harga_coret > $this->harga) {
            return (int)(($this->harga_coret - $this->harga) / $this->harga_coret * 100);
        }
        return null;
    }
}
