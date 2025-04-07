<?php

namespace App\Models;

use App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class registrants extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'kenal',
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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($registrants) {
            do {
                $randomNumber = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
                $username = "SMP-$randomNumber";
            } while (registrants::where('username', $username)->exists());

            $registrants->username = $username;
            $defaultStatus = Status::where('name', 'Belum Upload Formulir')->first();
            $registrants->status()->associate($defaultStatus);
        });
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function genderType()
    {
        return $this->belongsTo(GenderType::class, 'jenis_kelamin_id');
    }

    public function buktiPembayaran()
    {
        return $this->hasMany(BuktiPembayaran::class);
    }

    public function formulirPendaftaran()
    {
        return $this->hasMany(FormulirPendaftaran::class);
    }


    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode', 'tahun_ajaran');
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}

// do {
//     $randomNumber = str_pad(rand(1, 999), 4, '0', STR_PAD_LEFT);
//     $username = "SMP - $randomNumber";
// } while (self::where('username', $username)->exists());