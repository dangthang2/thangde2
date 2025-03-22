<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Cho phép thực hiện request
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:1000',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Giới hạn dung lượng ảnh 2MB
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên món ăn không được để trống.',
            'name.max' => 'Tên món ăn không được vượt quá 255 ký tự.',
            'description.max' => 'Mô tả không được dài hơn 1000 ký tự.',
            'price.required' => 'Giá món ăn không được để trống.',
            'price.numeric' => 'Giá phải là số.',
            'price.min' => 'Giá món ăn phải lớn hơn 1000 VND.',
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'category_id.exists' => 'Danh mục không hợp lệ.',
            'image.image' => 'File tải lên phải là hình ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg, gif.',
            'image.max' => 'Dung lượng ảnh tối đa là 2MB.',
        ];
    }
}
