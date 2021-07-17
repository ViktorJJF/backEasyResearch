<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'user_id' => 1,
            'first_name' => 'El señor Bolainas',
            'last_name' => 'Burns',
        ]);
        DB::table('profiles')->insert([
            'user_id' => 2,
            'first_name' => 'Valeria',
            'last_name' => 'Kurnushkina',
        ]);
        DB::table('profiles')->insert([
            'user_id' => 3,
            'first_name' => 'Víctor Juan',
            'last_name' => 'Jimenez Flores',
        ]);
        DB::table('profiles')->insert([
            'user_id' => 4,
            'first_name' => 'Blanca Marialena',
            'last_name' => 'Jimenez Flores',
        ]);
        DB::table('profiles')->insert([
            'user_id' => 5,
            'first_name' => 'Jhojan Gianmarco',
            'last_name' => 'Mamani Llanos',
        ]);
        DB::table('profiles')->insert([
            'user_id' => 6,
            'first_name' => 'Viktor',
            'last_name' => 'Jimenez',
        ]);
    }
}
