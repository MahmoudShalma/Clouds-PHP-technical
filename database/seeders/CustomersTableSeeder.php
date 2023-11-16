<?php

namespace Database\Seeders;

use App\Models\CustomerPlane;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Adjust the number based on how many fake users you want to generate
        $numberOfUsers = 10000;

        for ($i = 0; $i < $numberOfUsers; $i++) {
            $customer=User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                // Add more columns and fake data as needed
            ]);
            CustomerPlane::create([
                'user_id' => $customer->id,
                'plane_id' => rand(1, 2),  
            ]);
        }
    }
}
