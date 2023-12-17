<?php

namespace Database\Factories;

use App\Models\Merchandise;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\soldItems>
 */
class SoldItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'merchandise_id' => fake()->randomElement(Merchandise::pluck('id')),
            'sale_id' => fake()->randomElement(Sale::pluck('id')),
            'qty'     => fake()->numberBetween(1,100000),
            'selling_price' => fake() -> numberBetween(2,1000000)
        ];
    }
}
