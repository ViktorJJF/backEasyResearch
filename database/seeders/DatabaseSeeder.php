<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ResearcherProfileSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(ThesisTemplatesSeeder::class);
        $this->call(ProfileTableSeeder::class);
    }
}
