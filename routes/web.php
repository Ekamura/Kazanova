<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\BasketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Route::get('/clear', function() {

    Artisan::call('optimize:clear');
    Artisan::call('storage:link');

    return "Кэш очищен.";
});

// Каталог

Route::get('/catalog',[\App\Http\Controllers\HomeController::class,'catalog'])->name('catalog');
Route::get('/products/{product}',[ProductController::class, 'show'] )->name('product.show');
Route::get('/category/products',[ProductController::class, 'getProductsByCategory'])->name('category.products');




Route::get('/register', [RegisterController::class, 'register'])->name('register.index');
Route::post('/register', [RegisterController::class, 'registerStore'])->name('register.store');


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginCheck'])->name('login.check');


Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/profile', [LoginController::class, 'profile'])->name('profile');
    Route::controller(\App\Http\Controllers\BasketController::class)->group(function () {
        Route::get('/basket', 'basket')->name('basket');
        Route::post('basket/plus', 'basketPlus')->name('basket.plus');
        Route::post('basket/minus', 'basketMinus')->name('basket.minus');
    });
    Route::controller(\App\Http\Controllers\OrderController::class)->group(function () {
        Route::post('/basket/order', 'create')->name('order.create');
        Route::delete('/profile/order/{order}', 'destroy')->name('order.destroy');
    });
});


// Админ панель

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('can:admin')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Admin\LoginController::class, 'dashboard'])->name('dashboard');
        Route::get('/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('logout');
    });
    Route::get('/', [\App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login');
    Route::post('/', [\App\Http\Controllers\Admin\LoginController::class, 'loginCheck'])->name('AdminCheck');
    //Категории
    Route::controller(\App\Http\Controllers\CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('category.index');
        Route::get('/category/create', 'create')->name('category.create');
        Route::post('/category/create/store', 'store')->name('category.store');
        Route::delete('/category/delete/{category}', 'destroy')->name('category.destroy');
    });

    // продукт
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index')->name('product.index');
        Route::delete('/products/delete/{product}','destroy')->name('product.destroy');
        Route::post('/products/create', 'store')->name('product.store');
        Route::patch('/products/update', 'update')->name('product.update');
        Route::post('/products/createImg','storeImage')->name('product.storeImg');
    });
    //Характеристики
    Route::controller(\App\Http\Controllers\SpecificationController::class)->group(function () {
        Route::get('/specification', 'index')->name('specification.index');
        Route::get('/specification/{specification}/characteristics', 'getCharacteristics')->name('specification.characteristics');
        Route::delete('/specification/delete/{specification}','deleteSpecification')->name('specification.destroy');
//        Route::get('/specification/delete/characteristics/{characteristic}','deleteCharacteristic')->name('specification.characteristics.delete');
        Route::delete('/specification/delete/characteristics/{characteristic}','deleteCharacteristic')->name('specification.characteristics.delete');
        Route::get('/specification/{specification}/add/characteristic','addCharacteristic')->name('specification.characteristics.add');

    });
    //Заказы

    Route::controller(OrderController::class)->group(function() {
        Route::get('/orders', 'index')->name('orders.index');
        Route::get('/orders/sort', 'sort')->name('orders.sort');
        Route::get('/order/show/{order}', 'show')->name('order.show');
        Route::patch('/order/show/{order}/update', 'update')->name('order.update-status');
    });
});
//    Route::get('/product/show/{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
//    Route::get('/product/edit/{product}', [\App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
//    Route::patch('/product/update/{product}', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
//    Route::get('/product/store', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
//    Route::get('/product/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('product.create');



//// Пользователи
//        Route::get('/users', [UserController::class, 'index'])->name('users.index');
//        Route::get('/user/filter/{role}', [UserController::class, 'userFilter'])->name('user.filter');
//
//        Route::patch('/users/update/{user}', [UserController::class, 'update'])->name('users.update');
//
//        Route::get('/users/all', [UserController::class, 'usersAll'])->name('usersAll');
//        Route::get('/users/filter/{role}', [UserController::class, 'usersFilter'])->name('filterUsers');
//
//        Route::patch('/users/update/{user}', [UserController::class, 'update'])->name('users.update');
//
//        Route::get('/users/all', [UserController::class, 'usersAll'])->name('usersAll');
//        Route::get('/users/filter/{role}', [UserController::class, 'usersFilter'])->name('filterUsers');
//
//        Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
//        //категории
//
//        Route::get('/category', [\App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
//        Route::get('/category/filter/', [\App\Http\Controllers\CategoryController::class, 'categoryFilter'])
//            ->name('category.filter');
//
//
//    });
