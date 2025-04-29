<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;

use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, "login"])->name("admin.login");
Route::post('admin/auth', [AdminController::class, "auth"])->name("admin.auth");

Route::prefix("admin")->middleware("admin")->group(function () {
    Route::get('dashboard', [AdminController::class, "index"])->name("admin.index");
    Route::post('logout', [AdminController::class, "logout"])->name("admin.logout");



    Route::prefix('categories')->name('admin.category.')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');               // Danh sách
        Route::post('/', 'store')->name('store');              // Lưu mới
        Route::get('/{category}/edit', 'edit')->name('edit');   // Sửa
        Route::put('/{category}', 'update')->name('update');    // Cập nhật
        Route::delete('/{category}', 'destroy')->name('destroy'); // Xóa mềm

        // Các route custom
        Route::get('/trashed', 'trashed')->name('trashed'); // Xem danh sách đã xóa
        Route::post('/{category:slug}/restore', 'restore')->name('restore'); // Khôi phục
        Route::delete('/{category:slug}/force-delete', 'forceDelete')->name('forceDelete'); // Xóa cứng
    });

    Route::prefix('brands')->name('admin.brand.')->controller(BrandController::class)->group(function () {
        Route::get('/', 'index')->name('index');               // Danh sách
        Route::post('/', 'store')->name('store');              // Lưu mới
        Route::get('/{brand}/edit', 'edit')->name('edit');   // Sửa
        Route::put('/{brand}', 'update')->name('update');    // Cập nhật
        Route::delete('/{brand}', 'destroy')->name('destroy'); // Xóa mềm

        // Các route custom
        Route::get('/trashed', 'trashed')->name('trashed'); // Xem danh sách đã xóa
        Route::post('/{brand:slug}/restore', 'restore')->name('restore'); // Khôi phục
        Route::delete('/{brand:slug}/force-delete', 'forceDelete')->name('forceDelete'); // Xóa cứng
    });
});
