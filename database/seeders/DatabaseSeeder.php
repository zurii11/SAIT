<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         Company::create([
            'name' => 'Okriba',
            'company_id' => '3B5710',
            'description' => 'Okriba rules'
         ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.comm',
            'company_id' => 1,
            'password' => Hash::make('12345678'),
        ]);
    }
}
