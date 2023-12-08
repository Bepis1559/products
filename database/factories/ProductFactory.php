<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryIds = Category::pluck('id')->toArray();
        $randomCategoryId = $this->faker->randomElement($categoryIds);
        $imageFilePath = 'images/' . $this->faker->image('public/storage/images', 640, 480, null, false);

        return [
            'name' => $this->faker->word,
            'productCategory' => $randomCategoryId,
            'description' => $this->faker->sentence,
            'image' => $imageFilePath,
        ];
    }
}
