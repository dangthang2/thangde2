<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
Route::get('/danhsach', [FoodController::class, 'danhsach'])->name('foods.danhsach');
Route::get('/trangchinh', [FoodController::class, 'index'])->name('foods.index');
Route::get('/foods/create', [FoodController::class, 'create'])->name('foods.create');
Route::post('/foods', [FoodController::class, 'store'])->name('foods.store');
Route::get('/foods/{food}/edit', [FoodController::class, 'edit'])->name('foods.edit');
Route::put('/foods/{food}', [FoodController::class, 'update'])->name('foods.update');
Route::delete('/foods/{food}', [FoodController::class, 'destroy'])->name('foods.destroy');
Route::get('/foods', [FoodController::class, 'index'])->name('foods.index');
Route::get('/foods/{id}', [FoodController::class, 'show'])->name('foods.show');



