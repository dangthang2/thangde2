@extends('layout.master')

@section('title', 'Danh sách Món Ăn')

@section('content')
<div class="container mt-4">
    <h3 class="text-center text-uppercase fw-bold text-danger shadow-lg p-3 mb-3 bg-light rounded">
        DANH SÁCH MÓN ĂN
    </h3>      

    <!-- Form tìm kiếm -->
    <form action="{{ route('foods.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm món ăn..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">🔍 Tìm kiếm</button>
        </div>
    </form>

    <!-- Duyệt từng danh mục -->
    @foreach($foods as $category => $foodList)
        <h4 class="text-center fw-bold mt-4">{{ $category }}</h4>
        <hr class="border border-dark">

        <div class="row">
            @foreach($foodList as $food)
                <div class="col-md-6 d-flex align-items-center mb-3">
                <a href="{{ route('foods.show', $food->id) }}">
    <img src="{{ asset($food->image ?? 'images/default.jpg') }}" 
         alt="{{ $food->name }}" width="80" class="rounded shadow me-3">
</a>

                    <div>
                        <strong>{{ strtoupper($food->name) }}</strong>
                        <p class="text-muted">{{ $food->description }}</p>
                    </div>
                    <span class="ms-auto fw-bold text-danger">{{ number_format($food->price) }} đ</span>
                </div>
            @endforeach
        </div>
    @endforeach

</div>  
@endsection
