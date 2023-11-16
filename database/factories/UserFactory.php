<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'type' => 'admin',
            'password' => '$2y$10$v3kKpmMTirycU5vfybpy2O8xSiUwhkdFPn0aST5u3FrKCYYJ26vCW', // 123456
            'remember_token' => Str::random(10),
        ];
    }
}
