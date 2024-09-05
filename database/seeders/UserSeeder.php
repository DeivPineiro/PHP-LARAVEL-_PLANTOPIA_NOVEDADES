<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'David Piñeiro',
                'email' => 'david.pineiro@davinci.edu.ar',
                'editor' => 1,
                'password' => Hash::make('123456'),                
                'fecha_compra'=> null,
                'cantidad_entradas' => 0,
                'n_factura' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Lucas Orlando',
                'email' => 'lucas.orlando@davinci.edu.ar',
                'editor' => 1,
                'password' => Hash::make('123456'),                
                'fecha_compra'=> null,
                'cantidad_entradas' => 0,
                'n_factura' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Lucia Muñoz',
                'email' => 'lucia.munoz@davinci.edu.ar',
                'editor' => 1,
                'password' => Hash::make('123456'),                
                'fecha_compra'=> null,
                'cantidad_entradas' => 0,
                'n_factura' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Santiago Gallino',
                'email' => 'santiago.gallino@davinci.edu.ar',
                'editor' => 1,
                'password' => Hash::make('123456'),                
                'fecha_compra'=> null,
                'cantidad_entradas' => 0,
                'n_factura' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Fulano',
                'email' => 'fulano@davinci.edu.ar',
                'editor' => 0,
                'password' => Hash::make('123456'),             
                'fecha_compra'=> now(), 
                'cantidad_entradas' => 1,
                'n_factura' => 123456789,
                'created_at' => '2023-11-10 17:50:06',
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Mengano',
                'email' => 'mengano@davinci.edu.ar',
                'editor' => 0,
                'password' => Hash::make('123456'),             
                'fecha_compra'=> now(), 
                'cantidad_entradas' => 2,
                'n_factura' => 987654321,
                'created_at' => '2023-10-25 17:50:06',
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'Chongano',
                'email' => 'chongano@davinci.edu.ar',
                'editor' => 0,
                'password' => Hash::make('123456'),             
                'fecha_compra'=> now(), 
                'cantidad_entradas' => 3,
                'n_factura' => 987654321,
                'created_at' => '2023-09-13 17:50:06',
                'updated_at' => now(),
            ],[
                'id' => 8,
                'name' => 'Chingano',
                'email' => 'chingano@davinci.edu.ar',
                'editor' => 0,
                'password' => Hash::make('123456'),             
                'fecha_compra'=> now(), 
                'cantidad_entradas' => 2,
                'n_factura' => 987654321,
                'created_at' => '2023-09-13 17:50:06',
                'updated_at' => now(),
            ],
        ]);
    }
}


