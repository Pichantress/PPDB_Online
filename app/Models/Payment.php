<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payments";
    protected $primaryKey = "id";
    protected $fillable = [
        'registrant_id',
        'paid_date',
        'amount'
    ];
    use HasFactory;

    public function registrant(){
        return $this->belongsTo(registrants::class);
    }
}
