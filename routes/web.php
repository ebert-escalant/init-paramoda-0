<?php

use App\Http\Controllers\GenericController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GenericController::class,'index'])->name('generic.index');
Route::get('about', [GenericController::class,'about'])->name('generic.about');
Route::get('contact', [GenericController::class,'contact'])->name('generic.contact');
/* Route::get('/', function () {
    return view('welcome');
}); */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
