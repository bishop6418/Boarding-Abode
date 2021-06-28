<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Board',
            'last_name' => 'test',
            'email' => 'super@admin.com',
            'password' => Hash::make('password'), // password
            'address' => 'Oquendo Poblacion, Calbayog City',
            'birth_date' => '2021-8-8',
            'city' => 'Calbayog City',
            'zip_code' => '6710',
            'mobile' => '09366406548',
            'remember_token' => Str::random(10),
        ]);
    }
}
