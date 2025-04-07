<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPembayaran extends Model
{
    use HasFactory;

    protected $table = 'bukti_pembayaran';

    protected $fillable = [
        'registrant_id',
        'username',
        'name',
        'file_path',
        'tanggal_upload',
    ];

    public function registrant()
    {
        return $this->belongsTo(registrants::class, 'registrant_id');
    }
}
