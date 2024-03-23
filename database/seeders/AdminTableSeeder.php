<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'اسلام محمد',
            'image'=> 'storage/admins/admin.png',
            'email' => 'eslamemo457@gmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
