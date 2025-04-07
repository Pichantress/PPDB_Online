<?php

namespace App\Models;
use App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class acceptedRegistrants extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'jenis_kelamin_id',
        'alamat',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'kode_pos',
        'rw',
        'rt',
        'sekolah_asal',
        'nama_ayah',
        'wa_ayah',
        'nama_ibu',
        'wa_ibu',
        'password',
        'akta_kelahiran',
        'kartu_keluarga',
        'status',
        'periode',
        'verify_key',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    // public function user()
    // {
    //     return $this->hasOne(User::class, 'username', 'username');
    // }
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