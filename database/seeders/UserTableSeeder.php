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
               'logo' => 'storage/users/images/'.$i.'.png',
               'name' => 'User '.$i,
               'date_start_subscription' => Carbon::now()->format('Y-m-d'),
               'date_end_subscription' =>   Carbon::now()->addYear()->format('Y-m-d'),
               'shop_name' => 'Shop '.$i,
               'shop_address' => 'القاهره - التجمع الخامس',
               'phone' => "0105298871".$i,
               'tax_number' => "746209125435".$i,
               'status' => 'active',
               'password' => Hash::make('123456'),
           ]);

        }
    }
}
