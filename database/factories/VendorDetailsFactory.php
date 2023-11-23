<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VendorDetails>
 */
class VendorDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vendor_id' => function () {
                return \App\Models\User::factory()->create(['is_vendor' => true])->id;
            },
            'address_id' => function () {
                return \App\Models\Address::factory()->create()->id;
            },
            'name' => $this->faker->unique()->company,
            'summary' => $this->faker->sentence(10),
            'phone' => $this->faker->phoneNumber,
            'twitter' => $this->faker->userName,
            'facebook' => $this->faker->userName,
            'instagram' => $this->faker->userName,
            'pinterest' => $this->faker->userName,
            'since' => $this->faker->date,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
