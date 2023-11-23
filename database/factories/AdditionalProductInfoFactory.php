<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdditionalProductInfo>
 */
class AdditionalProductInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => \App\Models\Product::factory()->create()->id,
            'stand_up' => $this->faker->word,
            'folded_w_o_wheels' => $this->faker->word,
            'folded_w_wheels' => $this->faker->word,
            'door_pass_through' => $this->faker->word,
            'frame' => $this->faker->word,
            'weight' => $this->faker->word,
            'capacity' => $this->faker->word,
            'width' => $this->faker->word,
            'height' => $this->faker->word,
            'handle_height' => $this->faker->word,
            'wheels' => $this->faker->word,
            'seat_back_height' => $this->faker->word,
            'head_room' => $this->faker->word,
            'color' => $this->faker->colorName,
            'size' => $this->faker->word,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
