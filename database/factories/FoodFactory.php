<?php


use App\Models\Food;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodFactory extends Factory
{
    protected $model = Food::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'category_id' => \App\Models\Category::factory(),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'image' => $this->faker->imageUrl(640, 480, 'food'),
        ];
    }
}
