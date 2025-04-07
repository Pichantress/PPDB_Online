<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\registrants;

class Periode extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun_ajaran',
        'pendaftaran_mulai',
        'pendaftaran_selesai'
    ];

    public $timestamps = true;
    public function registrants()
    {
        return $this->hasMany(registrants::class);
    }
}
