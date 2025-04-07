<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulirPendaftaran extends Model
{
    use HasFactory;

    protected $table = 'formulir_pendaftaran';

    protected $fillable = [
        'registrant_id',
        'username',
        'name',
        'file_path',
    ];

    public function registrant()
    {
        return $this->belongsTo(registrants::class, 'registrant_id');
    }
}
