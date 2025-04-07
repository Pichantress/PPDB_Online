<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GenderType;

class GenderTypeSeeder extends Seeder
{
    public function run()
    {
        GenderType::create(['name' => 'lakilaki']);
        GenderType::create(['name' => 'perempuan']);
    }
}
