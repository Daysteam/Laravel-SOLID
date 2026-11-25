<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama'    => fake()->name(),
            'kelas'   => fake()->randomElement(['X', 'XI', 'XII']) . ' ' . fake()->randomElement(['RPL', 'TKJ', 'MM', 'AK']),
            'nisn'    => fake()->numerify('##########'), 
            'jurusan' => fake()->randomElement(['Rekayasa Perangkat Lunak', 'Teknik Komputer & Jaringan', 'Multimedia', 'Akuntansi']),
            'alamat'  => fake()->address(), 
        ];
    }
}
