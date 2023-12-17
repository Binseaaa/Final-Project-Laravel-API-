<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => fake()->randomElement(Customer::pluck('id')),
            'date'  => fake() -> dateTime(),
            'is_credit' => fake() -> randomDigit(),
            'user_id' => fake()->randomElement(User::pluck('id')),
        ];
    }
}