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
        // \App\Models\User::factory(10)->create();

//        $this->call(CompanyTableSeeder::class);
//        $this->call(UserTableSeeder::class);
//        $this->call(StateTableSeeder::class);
//        $this->call(LandTableSeeder::class);
        $this->call(AdminTableSeeder::class);

    }
}
