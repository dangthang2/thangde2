@extends('layout.master')

@section('content')
<div class="container">
    <h2>Thêm Món Ăn Mới</h2>

    <!-- Hiển thị lỗi -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('foods.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Tên món ăn</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Danh mục</label>
            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                <option value="">Chọn danh mục</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh món ăn</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Thêm Món</button>
    </form>
</div>
@endsection
