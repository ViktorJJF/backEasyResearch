<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            ['name' => 'Proyecto de tesis'],
            ['name' => 'Tesis'],
            ['name' => 'Trabajo de investigación'],
            ['name' => 'Artículo Científico'],
            ['name' => 'Tesina'],
        ]);
    }
}
