<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $foodTags = ['Organic', 'Gluten-Free', 'Vegan', 'Non-GMO'];

        return [
            'image' => null, // Adjust the size as needed
            'gallery' => [],
            'name' => $this->faker->unique()->sentence(4),
            'category_id' => \App\Models\Category::all()->random()->id,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'summary' => $this->faker->sentence(5),
            'description' => $this->faker->paragraph(20),
            'size_weight' => $this->faker->sentence,
            'stock' => $this->faker->numberBetween(1, 100),
            'type' => $this->faker->randomElement(['Fresh', 'Frozen', 'Canned']),
            'sku' => $this->faker->unique()->numberBetween(100000, 999999),
            'mfg' => $this->faker->date,
            'exp' => $this->faker->date,
            'tags' => $this->faker->randomElements($foodTags, $this->faker->numberBetween(1, count($foodTags))),
            'vendor_id' => \App\Models\VendorDetails::all()->random()->id,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
