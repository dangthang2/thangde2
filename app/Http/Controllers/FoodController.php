<?php

namespace App\Http\Controllers;
use App\Http\Requests\FoodRequest; // Đúng, chỉ cần dòng này

use App\Models\Food;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FoodController extends Controller
{
    /**
     * Hiển thị danh sách món ăn.
     */
    public function index(Request $request)
    {
        $query = Food::with('category');
    
        // Kiểm tra nếu có tìm kiếm
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
    
        // Lấy danh sách món ăn và nhóm theo danh mục
        $foods = $query->get()->groupBy('category.name');
    
        return view('trangchinh', compact('foods'));
        
    }
    
public function danhsach(Request $request)
{
    $query = Food::with('category');

    // Kiểm tra nếu có tìm kiếm
    if ($request->has('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // Lấy danh sách món ăn để chỉnh sửa
    $foods = $query->get();

    return view('danhsach', compact('foods'));
}
    

    /**
     * Hiển thị form thêm món ăn mới.
     */
    public function create()
    {
        $categories = Category::all(); // Lấy danh sách danh mục
        return view('themmonan', compact('categories'));
    }
    

    /**
     * Lưu món ăn mới vào database.
     */
 

    public function store(FoodRequest $request)
    {
        $imagePath = null;
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            // Lưu file vào thư mục public/imgthucan/
            $image->move(public_path('imgthucan'), $imageName);
    
            // Lưu đường dẫn file vào database
            $imagePath = 'imgthucan/' . $imageName;
        }
    
        // Lưu vào database
        Food::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imagePath, // Đường dẫn ảnh
        ]);
    
        return redirect()->route('foods.index')->with('success', 'Thêm món ăn thành công!');
    }
    
    
public function show($id)
{
    $food = Food::findOrFail($id);
    return view('chitietmonan', compact('food'));
}

    /**
     * Hiển thị form chỉnh sửa món ăn.
     */
    public function edit($id)
    {
        $food = Food::findOrFail($id);
        $categories = Category::all();
    
        return view('edit', compact('food', 'categories'));
    }
    

    /**
     * Cập nhật thông tin món ăn.
     */
    public function update(Request $request, Food $food)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        // Xóa ảnh cũ nếu có ảnh mới
        if ($request->hasFile('image')) {
            if ($food->image) {
                $imagePath = public_path('images/foods/' . $food->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Lưu ảnh mới
            $file = $request->file('image');
            $name = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('images/foods');
            $file->move($destinationPath, $name);
            $food->image = $name;
        }

        // Cập nhật món ăn
        $food->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('foods.index')->with('success', 'Cập nhật món ăn thành công!');
    }

    /**
     * Xóa món ăn.
     */
    public function destroy(Food $food)
    {
        // Xóa ảnh nếu có
        if ($food->image) {
            $imagePath = public_path('images/foods/' . $food->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $food->delete();

        return redirect()->route('foods.index')->with('success', 'Xóa món ăn thành công!');
    }
}
