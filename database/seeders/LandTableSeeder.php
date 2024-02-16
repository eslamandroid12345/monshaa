<?php

namespace Database\Seeders;

use App\Models\Land;
use App\Models\State;
use Illuminate\Database\Seeder;

class LandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        for ($i = 1 ; $i <= 30 ; $i++){

            Land::create([
                'address' => "address ".$i,
                'address_details' => 'Land Address Details'. $i,
                'seller_name' => "seller ".$i,
                'size_in_metres' => 400,
                'price_of_one_meter' => 3000,
                'total_cost' => (400 * 3000),
                'seller_phone_number' => "0105329929".$i,
                'advertiser_type' => $i >= 15 ? 'real_state_owner' : 'real_state_company',
                'user_id' => 20,
                'company_id' => 20,
                'land_date_register' => date('Y-m-d')
            ]);
        }
    }
}
