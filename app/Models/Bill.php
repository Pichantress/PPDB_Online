<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{

    protected $fillable = ['gender_type_id', 'amount'];
    use HasFactory;

    public function genderType()
    {
        return $this->belongsTo(GenderType::class, 'jenis_kelamin_id');
    }
}
