<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([

            'email' => 'bolainas@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([

            'email' => 'vale@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([

            'email' => 'vj.jimenez96@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([

            'email' => 'blanca@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'email' => 'jhojanmll@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'email' => 'vj@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        // $table->engine = 'InnoDB';
        //     $table->increments('id');
        //     $table->string('email')->unique();
        //     $table->string('password')->nullable();
        //     $table->string('provider')->nullable();
        //     $table->string('provider_unique_id')->nullable();
        //     $table->string('activation_token',64)->nullable();
        //     $table->string('status',25)->nullable();
        //     $table->rememberToken();
        //     $table->timestamps();

    }
}
