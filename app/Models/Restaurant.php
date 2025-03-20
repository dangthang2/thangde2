<?php
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    protected $model = Restaurant::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'category' => $this->faker->randomElement(['Cơm Dĩa', 'Bánh Mỳ', 'Bún Phở']),
            'price' => $this->faker->randomFloat(2, 20, 200),
            'image' => $this->faker->imageUrl(640, 480, 'food'),
        ];
    }
}