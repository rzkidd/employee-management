<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'tgl_lahir' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['Laki-laki', "Perempuan"]),
            'photo_url' => $this->faker->imageUrl(480, 640, 'person'),
            'email' => $this->faker->email(),
            'no_telp' => $this->faker->phoneNumber(),
            'provinsi' => $this->faker->city(),
            'kab/kota' => $this->faker->city(),
            'kecamatan' => $this->faker->city(),
            'kelurahan' => $this->faker->city(),
            'jabatan' => $this->faker->randomElement(['Web Developer', 'Finance', 'Manager', 'HR']),
        ];
    }
}
