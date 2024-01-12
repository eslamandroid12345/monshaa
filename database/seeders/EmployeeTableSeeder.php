<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1 ; $i <= 20 ; $i++){

            Employee::create([
                'name' => 'User '.$i,
                'address' => 'address '.$i,
                'phone' => "0105298871".$i,
                'card_number' => "746209125435908".$i,
                'password' => Hash::make('123456'),
                'user_id' => $i,
            ]);

        }
    }
}
