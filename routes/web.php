<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\TypeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('index');
})->middleware('auth')->name('home');


Route::get('/', function () {
    return view('login');
});

Route::get('login', function () {
    return view('login');
})->name('login');

Route::post('login', [AuthController::class,'login'])->name('login.post');
Route::post('logout', [AuthController::class,'logout'])->name('logout');

// Kota
Route::get('kota', [KotaController::class, 'index'])->name('kota.index');
Route::get('kota/create', [KotaController::class, 'create'])->name('kota.create');
Route::post('kota/store', [KotaController::class, 'store'])->name('kota.store');
Route::get('kota/{id}/edit', [KotaController::class, 'edit'])->name('kota.edit');
Route::post('kota/{id}/update', [KotaController::class, 'update'])->name('kota.update');
Route::post('kota/{id}/delete', [KotaController::class, 'delete'])->name('kota.destroy');

// Type
Route::get('type', [TypeController::class, 'index'])->name('type.index');
Route::get('type/create', [TypeController::class, 'create'])->name('type.create');
Route::post('type/store', [TypeController::class, 'store'])->name('type.store');
Route::get('type/{id}/edit', [TypeController::class, 'edit'])->name('type.edit');
Route::post('type/{id}/update', [TypeController::class, 'update'])->name('type.update');
Route::post('type/{id}/delete', [TypeController::class, 'delete'])->name('type.destroy');
