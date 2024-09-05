<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('topicos')->insert([
            [
                'nombre' => 'Informativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Update',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Urgente',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
