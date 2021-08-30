<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\User;
use App\Models\Vehicle;
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
        Store::create([
           'user_id' => 2,
           'representative_name' => 'Glennie',
           'representative_contact' => '+639451494339',
           'address' => 'National Capital Region',
           'lat' => 14.6959,
           'long' => 121.1217,
           'hero' => 'hero.png',
           'logo' => 'logo.png', 
        ]);
        User::create([
            'name' => 'Rider',
            'email' => 'rider@test.com',
            'password' => Hash::make('test'),
            'dob' => '1970/03/03',
            'avatar' => 'default.png',
            'role' => 2
        ]);
        Vehicle::create([
            'user_id' => 3,
            'license' => 'ABC1234',
            'type' => 0,
            'registration' => 'registration.png',
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
