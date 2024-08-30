<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'last_login' => fake()->dateTimeThisMonth,
            'last_login_ip' => fake()->ipv6,
            'role' => fake()->randomElement(['CEO','CTO','CFO','VP of Marketing','HR','VP of Engineering','VP of Sales','Lead Developer','Chai Wala','Adminstrator']),
            'profile_photo' => fake()->randomElement(['profile01.png','profile02.png','profile03.png','profile04.png','profile05.png','profile06.png','profile07.png','profile08.png','profile09.png','profile10.png']),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
