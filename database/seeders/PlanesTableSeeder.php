<?php

namespace Database\Seeders;

use App\Models\Plane;
use Illuminate\Database\Seeder;

class PlanesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plane::create([
            'name' => "monthly",
            'price' => 50,
        ]);
        Plane::create([
            'name' => "yearly",
            'price' => 500,
        ]);
    }
}
