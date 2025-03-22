<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Food;

class FoodSeeder extends Seeder
{
    public function run()
    {
       
        
        $foods = [
            ['name' => 'Bánh Mì Chả', 'category_id' => 1, 'price' => 20000, 'image' => 'imgthucan/hinh1.png'],
            ['name' => 'Bánh Mì Thịt', 'category_id' => 1, 'price' => 25000, 'image' => 'imgthucan/hinh2.png'],
            ['name' => 'Bánh Mì Trứng', 'category_id' => 1, 'price' => 22000, 'image' => 'imgthucan/hinh3.png'],
            ['name' => 'Bánh Mì Xíu Mại', 'category_id' => 1, 'price' => 28000, 'image' => 'imgthucan/hinh4.png'],
            ['name' => 'Cơm Sườn', 'category_id' => 2, 'price' => 45000, 'image' => 'imgthucan/hinh5.png'],
            ['name' => 'Cơm Gà', 'category_id' => 2, 'price' => 40000, 'image' => 'imgthucan/hinh6.png'],
            ['name' => 'Cơm Bì Chả', 'category_id' => 2, 'price' => 42000, 'image' => 'imgthucan/hinh7.png'],
            ['name' => 'Bún Nạm', 'category_id' => 3, 'price' => 50000, 'image' => 'imgthucan/hinh8.png'],
            ['name' => 'Bún Mắm', 'category_id' => 3, 'price' => 52000, 'image' => 'imgthucan/hinh9.png'],
            ['name' => 'Bún Bò', 'category_id' => 3, 'price' => 55000, 'image' => 'imgthucan/hinh10.png'],
        ];
        
        foreach ($foods as $food) {
            Food::create([
                'name' => $food['name'],
                'description' => 'Món ăn ngon đặc sản',
                'category_id' => $food['category_id'],
                'price' => $food['price'],
                'image' => $food['image'],
            ]);
        }
        
}
}
