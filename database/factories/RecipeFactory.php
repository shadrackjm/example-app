<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    protected $model = \App\Models\Recipe::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(),
            'instructions' => $this->faker->paragraph,
            'ingredients' => $this->faker->paragraph,
            'category_id' => \App\Models\Category::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
