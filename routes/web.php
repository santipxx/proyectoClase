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

Route::prefix('cart')->controller(\App\Http\Controllers\CartController::class)->group(function() {
    Route::get('/', 'view')->name('cart.view');
    Route::post('/add/{product}', 'add')->name('cart.add');
    Route::post('/remove/{id}', 'remove')->name('cart.remove');
    Route::get('/checkout', 'checkout')->name('cart.checkout');
    Route::post('/checkout', 'processCheckout')->name('cart.process');
});


Route::prefix('product')->controller(ProductController::class)->group(function(){
    Route::get('/','index')->name('product.index');
    Route::get('/create','create');
    Route::post('/store','store')->name('product.store');
    Route::get('/{product}','show')->name('product.show');
    Route::delete('/{product}','destroy')->name('product.destroy');
});
//rutas dinamicas

