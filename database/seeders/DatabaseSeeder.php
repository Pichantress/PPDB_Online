<?php

namespace Database\Seeders;

use App\Models\registrants;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // $this->call(StatusSeeder::class);
        // $this->call(AdminSeeder::class);
        // $this->call(GenderTypeSeeder::class);
        // $this->call(BillSeeder::class);
        registrants::factory()->count(10)->create();
    }
}

