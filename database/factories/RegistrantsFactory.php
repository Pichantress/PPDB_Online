<?php

namespace Database\Factories;

use App\Models\Registrants;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class RegistrantsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Registrants::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        $name = $this->faker->name($gender);

        // Set the jenis_kelamin_id based on the gender
        $jenis_kelamin_id = $gender === 'male' ? 1 : 2;
        return [
            'kenal' => $this->faker->word,
            'name' => $name,
            'jenis_kelamin_id' => $jenis_kelamin_id,
            'alamat' => $this->faker->address,
            'kabupaten' => $this->faker->city,
            'kecamatan' => $this->faker->word,
            'kelurahan' => $this->faker->word,
            'kode_pos' => $this->faker->postcode,
            'rw' => $this->faker->randomNumber(2),
            'rt' => $this->faker->randomNumber(2),
            'sekolah_asal' => $this->faker->word,
            'nama_ayah' => $this->faker->name('name'),
            'wa_ayah' => '08' . $this->faker->randomNumber(8),
            'nama_ibu' => $this->faker->name,
            'wa_ibu' => '08' . $this->faker->randomNumber(8),
            'password' => Hash::make('12345678'), // You can set a default password or use the actual password hashing logic here
            'akta_kelahiran' => $this->faker->sha256,
            'kartu_keluarga' => $this->faker->sha256,
            'status_id' => 1,
            'periode' => now()->year,
            'remember_token' => Str::random(10),
        ];
    }
}
