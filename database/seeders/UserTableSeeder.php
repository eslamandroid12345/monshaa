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
        $permissions = [
            "home_page",
            "states",
            "lands",
            "tenants",
            "tenant_contracts",
            "financial_receipt",
            "financial_cash",
            "expenses",
            "employees",
            "reports",
            "notifications",
            "setting",
            "technical_support",
            "expired_contracts"
        ];
        for ($i = 1 ; $i <= 20 ; $i++){

           User::create([
                'name' => 'admin '.$i,
                'job_title' => $i <= 10 ? 'Employee' : 'Sales',
                'phone' => '0106293318'.$i,
                'password' => Hash::make('123456'),
                'is_admin' => 1,
                'employee_permissions' => json_encode($permissions),
                'company_id' => $i,
           ]);

        }
    }
}
