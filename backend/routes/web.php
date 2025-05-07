<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, "login"])->name("admin.login")->middleware('prevent-back-history');
Route::post('admin/auth', [AdminController::class, "auth"])->name("admin.auth")->middleware('prevent-back-history');

Route::prefix("admin")->middleware(["admin","prevent-back-history"])->group(function () {
    Route::get('dashboard', [AdminController::class, "index"])->name("admin.index");
    Route::post('logout', [AdminController::class, "logout"])->name("admin.logout");



    Route::prefix('categories')->name('admin.category.')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');               // Danh sách
        Route::post('/', 'store')->name('store');              // Lưu mới
        Route::get('/{category}/edit', 'edit')->name('edit');   // Sửa
        Route::put('/{category}', 'update')->name('update');    // Cập nhật
        Route::delete('/{category}', 'destroy')->name('destroy'); // Xóa mềm

        Route::get('/trashed', 'trashed')->name('trashed'); // Xem danh sách đã xóa
        Route::post('/{category:slug}/restore', 'restore')->name('restore'); // Khôi phục
        Route::delete('/{category:slug}/force-delete', 'forceDelete')->name('forceDelete'); // Xóa cứng
    });

    Route::prefix('brands')->name('admin.brand.')->controller(BrandController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{brand}/edit', 'edit')->name('edit');
        Route::put('/{brand}', 'update')->name('update');
        Route::delete('/{brand}', 'destroy')->name('destroy');

        Route::get('/trashed', 'trashed')->name('trashed');
        Route::post('/{brand:slug}/restore', 'restore')->name('restore');
        Route::delete('/{brand:slug}/force-delete', 'forceDelete')->name('forceDelete');
    });

    Route::prefix('colors')->name('admin.color.')->controller(ColorController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{color}/edit', 'edit')->name('edit');
        Route::put('/{color}', 'update')->name('update');
        Route::delete('/{color}', 'destroy')->name('destroy');

        Route::get('/trashed', 'trashed')->name('trashed');
        Route::post('/{color}/restore', 'restore')->name('restore');
        Route::delete('/{color}/force-delete', 'forceDelete')->name('forceDelete');
    });

    Route::prefix('sizes')->name('admin.size.')->controller(SizeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{size}/edit', 'edit')->name('edit');
        Route::put('/{size}', 'update')->name('update');
        Route::delete('/{size}', 'destroy')->name('destroy');

        Route::get('/trashed', 'trashed')->name('trashed');
        Route::post('/{size}/restore', 'restore')->name('restore');
        Route::delete('/{size}/force-delete', 'forceDelete')->name('forceDelete');
    });

    Route::prefix('products')->name('admin.product.')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->name('index');               // Danh sách
        Route::get('create', 'create')->name('create');               // Danh sách
        Route::post('/', 'store')->name('store');              // Lưu mới
        Route::get('/{product}/edit', 'edit')->name('edit');   // Sửa
        Route::put('/{product}', 'update')->name('update');    // Cập nhật
        Route::delete('/{product}', 'destroy')->name('destroy'); // Xóa mềm

        Route::get('/trashed', 'trashed')->name('trashed'); // Xem danh sách đã xóa
        Route::post('/{product:slug}/restore', 'restore')->name('restore'); // Khôi phục
        Route::delete('/{product:slug}/force-delete', 'forceDelete')->name('forceDelete'); // Xóa cứng
    });
});
