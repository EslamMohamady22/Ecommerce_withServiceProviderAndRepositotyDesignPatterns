<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
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
        $int = mt_rand(1262055681, 1262055681);
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'image' => $this->faker->image,
            'price' => rand(1, 4000),
            'discount_price' => rand(1, 4000),
            'category_id' => rand(1, Category::all()->count()), 
            'created_at' => date("Y-m-d H:i:s",$int),
        ];
    }
}
