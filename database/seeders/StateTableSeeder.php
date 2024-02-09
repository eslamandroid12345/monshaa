<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        for ($i = 1 ; $i <= 30 ; $i++){

        State::create([
            'building_number' => 20,
            'apartment_number' => 10,
            'real_state_address' => 'Real State Address '. $i,
            'real_state_address_details' => 'Real State Address Details'. $i,
            'real_state_type' => $i >= 15 ? 'apartment' : 'villa',
            'department' => $i >= 15 ? 'sale' : 'rent',
            'advertiser_type' => $i >= 15 ? 'real_state_owner' : 'real_state_company',
            'advertised_phone_number' => '0105298818'.$i,
            'real_state_space' => 120,
            'real_state_price' => $i >= 15 ? 600000.00 : 3000000.00,
            'number_of_bathrooms' => $i <= 15 ? 1 : 2 ,
            'number_of_rooms' => $i <= 15 ? 1 : 2 ,
            'user_id' => 20,
            'company_id' => 20,
            'state_date_register' => date('Y-m-d')

        ]);
      }

    }
}
