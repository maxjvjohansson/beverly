<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
        return [
            'name' => $this->faker->realText(10),
            'description' => $this->faker->realText(100),
            'category_id' => $this->faker->randomNumber(),
            'price' => $this->faker->randomFloat(2, 1, 50),
            'img_url' => $this->faker->imageUrl(150, 150, 'drinks')
        ];
    }
}
