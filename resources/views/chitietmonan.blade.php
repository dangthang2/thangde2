@extends('layout.master')

@section('title', 'Chi tiết Món Ăn')

@section('content')
<div class="container mt-4">
    <h3 class="text-center text-uppercase fw-bold text-danger shadow-lg p-3 mb-3 bg-light rounded">
        CHI TIẾT MÓN ĂN
    </h3>      

    <div class="row">
        <!-- Hình ảnh món ăn -->
        <div class="col-md-6 text-center">
            <img src="{{ asset($food->image ?? 'images/default.jpg') }}" 
                 alt="{{ $food->name }}" class="img-fluid rounded shadow-lg">
        </div>

        <!-- Thông tin món ăn -->
        <div class="col-md-6">
            <h4 class="fw-bold text-primary">{{ strtoupper($food->name) }}</h4>
            <p class="text-muted">{{ $food->description }}</p>
            <span class="fw-bold text-danger fs-4">{{ number_format($food->price) }} đ</span>

            <!-- Nút quay lại -->
            <div class="mt-3">
                <a href="{{ route('foods.index') }}" class="btn btn-secondary">← Quay lại</a>
            </div>
        </div>
    </div>
</div>
@endsection
