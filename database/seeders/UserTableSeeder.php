<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1 ; $i <= 20 ; $i++){

           User::create([
                'name' => 'admin '.$i,
                'phone' => '0106293318'.$i,
                'password' => Hash::make('123456'),
                'is_admin' => 1,
                'company_id' => $i,
           ]);

        }
    }
}
