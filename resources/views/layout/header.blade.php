<header class="bg-success text-white text-center py-3">
    <h1>🍽️ Quản lý Món Ăn</h1>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="{{ route('foods.index') }}">Trang chủ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('foods.index') }}">📋 Danh sách món</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('foods.danhsach') }}">menu thức ăn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('foods.create') }}">➕ Thêm món</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
