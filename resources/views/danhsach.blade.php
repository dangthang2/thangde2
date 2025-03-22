@extends('layout.master')

@section('title', 'Danh sách Món Ăn')

@section('content')
<div class="container mt-4">
    <h3 class="text-center text-uppercase fw-bold text-danger shadow-lg p-3 mb-3 bg-light rounded">
        DANH SÁCH MÓN ĂN
    </h3>      

    <a href="{{ route('foods.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Thêm món mới
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form tìm kiếm -->
    <form action="{{ route('foods.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm món ăn..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i> Tìm kiếm
            </button>
        </div>
    </form>

    <!-- Kiểm tra nếu có món ăn -->
    @if($foods->isNotEmpty())
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên Món</th>
                    <th>Mô Tả</th>
                    <th>Danh Mục</th>
                    <th>Giá</th>
                    <th>Ảnh</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($foods as $food)
                <tr>
                    <td>{{ $food->id }}</td>
                    <td class="fw-bold">{{ $food->name }}</td>
                    <td>{{ $food->description }}</td>
                    <td>{{ $food->category->name ?? 'Không có danh mục' }}</td>
                    <td class="text-danger fw-bold">{{ number_format($food->price) }} VND</td>
                    <td>
                        <img src="{{ asset($food->image ?? 'images/default.jpg') }}" 
                             alt="{{ $food->name }}" width="100" class="rounded shadow">
                    </td>
                    <td>
                        <a href="{{ route('foods.edit', $food->id) }}" class="btn btn-warning">✏️ Sửa</a>

                        <form action="{{ route('foods.destroy', $food->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc muốn xóa món này?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">❌ Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning text-center">
            <strong>⚠ Không tìm thấy món ăn nào!</strong>
        </div>
    @endif
</div>  
@endsection
