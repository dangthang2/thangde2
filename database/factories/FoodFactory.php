<?php

namespace Database\Factories;

use App\Models\Food;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodFactory extends Factory
{
    protected $model = Food::class;

    public function definition(): array
    {
        // Kiểm tra xem có category nào chưa, nếu chưa có thì tạo một cái
        $category = Category::inRandomOrder()->first();
        if (!$category) {
            $category = Category::factory()->create();
        }

        // Danh sách ảnh có sẵn trong thư mục public/imgthucan/
        $images = [
            'hinh1.png',
            'hinh2.png',
            'hinh3.png',
            'hinh4.png',
            'hinh5.png',
            'hinh6.png',
            'hinh7.png',
            'hinh8.png',
            'hinh9.png',
            'hinh10.png',
        ];

        return [
            'name' => $this->faker->word,
            'description' => 'Món ăn ngon đặc sản',
            'category_id' => $category->id, // Đảm bảo có category
            'price' => rand(20000, 60000),
            'image' => 'imgthucan/' . $this->faker->randomElement($images),
        ];
    }
}
