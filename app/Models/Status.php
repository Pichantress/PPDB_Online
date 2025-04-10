<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\registrants;

class Status extends Model
{
    use HasFactory;
    public function registrants()
    {
        return $this->hasMany(registrants::class);
    }
}

