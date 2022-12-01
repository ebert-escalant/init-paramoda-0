<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class,'index'])->name('admin.index');
Route::resource('category',CategoryController::class)->names('admin.categories');