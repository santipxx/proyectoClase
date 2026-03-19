<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/',HomeController::class);

Route::prefix('admin')->group(function() {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
});


Route::prefix('product')->controller(ProductController::class)->group(function(){
    Route::get('/','index')->name('product.index');
    Route::get('/create','create');
    Route::post('/store','store')->name('product.store');
    Route::get('/{product}','show')->name('product.show');
    Route::delete('/{product}','destroy')->name('product.destroy');
});
//rutas dinamicas

