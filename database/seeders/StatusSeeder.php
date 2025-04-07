<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    public function run()
    {
        Status::create(['name' => 'Belum Melakukan Pembayaran']);
        Status::create(['name' => 'Pending']);
        Status::create(['name' => 'Lulus']);
        Status::create(['name' => 'Kesalahan Data']);
    }
}
