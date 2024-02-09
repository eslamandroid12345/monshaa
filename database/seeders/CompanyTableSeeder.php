<?php

namespace Database\Seeders;

use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 1; $i <= 20 ; $i++){

            Company::create([
                'logo' => 'storage/companies/images/'.$i.'.png',
                'company_name' => 'Company '.$i,
                'company_address' => 'القاهره - التجمع الخامس',
                'date_start_subscription' => Carbon::now()->format('Y-m-d'),
                'date_end_subscription' =>   Carbon::now()->addYear()->format('Y-m-d'),
                'company_phone' => "0105298871".$i,
            ]);
        }
    }
}
