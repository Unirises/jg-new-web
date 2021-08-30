<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'JG Express',
            'email' => 'admin@test.com',
            'password' => Hash::make('test'),
            'dob' => '1970/03/03',
            'avatar' => 'default.png',
            'role' => 0
        ]);
        User::create([
            'name' => 'Merchant',
            'company_name' => 'My Default Merchant',
            'email' => 'merchant@test.com',
            'password' => Hash::make('test'),
            'dob' => '1970/03/03',
            'avatar' => 'default.png',
            'role' => 1
        ]);
        User::create([
            'name' => 'Rider',
            'email' => 'rider@test.com',
            'password' => Hash::make('test'),
            'dob' => '1970/03/03',
            'avatar' => 'default.png',
            'role' => 2
        ]);
        User::create([
            'name' => 'Client',
            'email' => 'client@test.com',
            'password' => Hash::make('test'),
            'dob' => '1970/03/03',
            'avatar' => 'default.png',
            'role' => 3
        ]);
    }
}
