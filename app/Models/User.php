<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'nama_lengkap',
        'alamat'
    ];

    // MEMBERIKAN DATA KE TABEL PEMINJAMAN
    public function user()
    {
        return $this->hasMany(Peminjaman::class);
    }

    // MEMBERIKAN DATA KE TABEL KOLEKSI PRIBADI
    public function koleksibuku()
    {
        return $this->hasMany(Koleksi::class);
    }

    // MEMBERIKAN DATA KE TABEL ULASAN BUKU
    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}