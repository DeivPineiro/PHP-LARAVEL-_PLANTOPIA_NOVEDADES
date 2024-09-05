<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            [
                'tag_id' => 1,
                'nombre' => 'Mapa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 2,
                'nombre' => 'Cosechas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 3,
                'nombre' => 'Exposiciones',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 4,
                'nombre' => 'Actualización',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 5,
                'nombre' => 'Wiki',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 6,
                'nombre' => 'Usuarios destacados',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 7,
                'nombre' => 'Plagas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 8,
                'nombre' => 'Otros',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
