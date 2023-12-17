<?php

namespace Database\Factories;

use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' =>fake()->dateTime(),
            'supplier_id' => fake()->randomElement(Supplier::pluck('id')),
            'total' => fake() -> numberBetween(10,100000),
            'user_id' => fake()->randomElement(User::pluck('id')),
        ];
    }
}
