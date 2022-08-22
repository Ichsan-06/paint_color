<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AwalanController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\WarnaController;
use App\Http\Controllers\FormulaController;
use App\Http\Controllers\PricelistController;

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
    // Kota
    $kota = App\Models\Kota::all();
    return view('welcome', compact('kota'));
});

Route::get('/price/kota/{id_kota}', [AwalanController::class, 'kota'])->name('price.kota');
Route::get('/price/kota/{kota_id}/warna/{warna_id}', [AwalanController::class, 'warna'])->name('price.warna');
Route::get('/list-harga/{kota_id}', [AwalanController::class, 'listHarga'])->name('list.harga');
Route::get('/list-formula/{kota_id}', [AwalanController::class, 'listFormula'])->name('list.formula');
Route::get('/list-formula-harga/{kota_id}', [AwalanController::class, 'listFormulaHarga'])->name('list.formulaHarga');
Route::get('/hitung/{warna_id}', [AwalanController::class, 'hitung'])->name('hitung');
Route::post('/hitung/{warna_id}', [AwalanController::class, 'postHitung'])->name('hitung.post');

Route::get('login', function () {
    return view('login');
})->name('login');


Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

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

// Jenis
Route::get('jenis', [JenisController::class, 'index'])->name('jenis.index');
Route::get('jenis/create', [JenisController::class, 'create'])->name('jenis.create');
Route::post('jenis/store', [JenisController::class, 'store'])->name('jenis.store');
Route::get('jenis/{id}/edit', [JenisController::class, 'edit'])->name('jenis.edit');
Route::post('jenis/{id}/update', [JenisController::class, 'update'])->name('jenis.update');
Route::post('jenis/{id}/delete', [JenisController::class, 'delete'])->name('jenis.destroy');

// Pricelist
Route::get('pricelist', [PricelistController::class, 'index'])->name('pricelist.index');
Route::get('pricelist/create', [PricelistController::class, 'create'])->name('pricelist.create');
Route::post('pricelist/store', [PricelistController::class, 'store'])->name('pricelist.store');
Route::get('pricelist/{id}/edit', [PricelistController::class, 'edit'])->name('pricelist.edit');
Route::post('pricelist/{id}/update', [PricelistController::class, 'update'])->name('pricelist.update');
Route::post('pricelist/{id}/delete', [PricelistController::class, 'delete'])->name('pricelist.destroy');

// Warna
Route::get('warna', [WarnaController::class, 'index'])->name('warna.index');
Route::get('warna/create', [WarnaController::class, 'create'])->name('warna.create');
Route::post('warna/store', [WarnaController::class, 'store'])->name('warna.store');
Route::get('warna/{id}/edit', [WarnaController::class, 'edit'])->name('warna.edit');
Route::post('warna/{id}/update', [WarnaController::class, 'update'])->name('warna.update');
Route::post('warna/{id}/delete', [WarnaController::class, 'delete'])->name('warna.destroy');

// Formula
Route::get('formula', [FormulaController::class, 'index'])->name('formula.index');
Route::get('formula/create', [FormulaController::class, 'create'])->name('formula.create');
Route::post('formula/store', [FormulaController::class, 'store'])->name('formula.store');
Route::get('formula/{id}/edit', [FormulaController::class, 'edit'])->name('formula.edit');
Route::post('formula/{id}/update', [FormulaController::class, 'update'])->name('formula.update');
Route::post('formula/{id}/delete', [FormulaController::class, 'delete'])->name('formula.destroy');
