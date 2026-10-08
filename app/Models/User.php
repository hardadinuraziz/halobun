<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'phone', 'avatar',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isKonsultan(): bool
    {
        return $this->role === 'konsultan';
    }

    public function getAvatarUrlAttribute(): string
    {
        if ($this->avatar && file_exists(public_path($this->avatar))) {
            return asset($this->avatar);
        }
        if ($this->konsultan) {
            return $this->konsultan->foto_url;
        }
        return asset('/images/halobun_real_practitioner.jpg');
    }

    public function konsultan()
    {
        return $this->hasOne(Konsultan::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function narsumUndangans()
    {
        return $this->hasMany(NarsumUndangan::class);
    }

    public function kunjunganOfflines()
    {
        return $this->hasMany(KunjunganOffline::class);
    }
}
