<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods'; // Đảm bảo đúng tên bảng
    protected $fillable = ['name', 'description', 'price', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
