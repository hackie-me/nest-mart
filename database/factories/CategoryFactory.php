<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $foodCategories = ['Fruits', 'Vegetables', 'Dairy', 'Meat', 'Bakery', 'Seafood', 'Snacks', 'Beverages', 'Grains', 'Canned Goods'];

        return [
            'name' => $this->faker->unique()->randomElement($foodCategories),
            'image' => null, // Adjust the size as needed
            'description' => $this->faker->paragraph,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
