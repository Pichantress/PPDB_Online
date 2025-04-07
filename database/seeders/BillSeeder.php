<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bill;
use App\Models\GenderType;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genderTypes = GenderType::all();

        foreach ($genderTypes as $genderType) {
            $amount = $genderType->id == 1 ? '19.300.000' : '19.950.000';

            Bill::create([
                'jenis_kelamin_id' => $genderType->id,
                'amount' => $amount,
            ]);
        }
    }
}
