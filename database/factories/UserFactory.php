<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

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
          'user' => $this->faker->name(),
          'username' => $this->faker->firstName(),
          'password' => Hash::make('password'),
          'email' => $this->faker->unique()->safeEmail(),
          'state' => $this->faker->randomElement(['1','0']),
        ];
    }
}
