<?php

namespace Database\Factories;

use App\Models\Category; // Thêm dòng này
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class; // Đảm bảo rằng Category đã được import

    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}
