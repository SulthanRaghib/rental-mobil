<?php

use App\Http\Controllers\BahanBakarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/pages-blank', [DashboardController::class, 'blank'])->name('pages-blank');

Route::get('/role', [RoleController::class, 'index'])->name('role.index');
Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
Route::post('/role', [RoleController::class, 'store'])->name('role.store');
Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
Route::put('/role/{id}', [RoleController::class, 'update'])->name('role.update');
Route::delete('/role/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

Route::get('/mobil', [MobilController::class, 'index'])->name('mobil.index');
Route::get('/mobil/detail/{id}', [MobilController::class, 'detail'])->name('mobil.detail');
Route::get('/mobil/create', [MobilController::class, 'create'])->name('mobil.create');
Route::post('/mobil', [MobilController::class, 'store'])->name('mobil.store');
Route::get('/mobil/edit/{id}', [MobilController::class, 'edit'])->name('mobil.edit');
Route::put('/mobil/{id}', [MobilController::class, 'update'])->name('mobil.update');
Route::delete('/mobil/{id}', [MobilController::class, 'destroy'])->name('mobil.destroy');

Route::get('/bahanbakar', [BahanBakarController::class, 'index'])->name('bahanbakar.index');
Route::get('/bahanbakar/create', [BahanBakarController::class, 'create'])->name('bahanbakar.create');
Route::post('/bahanbakar', [BahanBakarController::class, 'store'])->name('bahanbakar.store');
Route::get('/bahanbakar/edit/{id}', [BahanBakarController::class, 'edit'])->name('bahanbakar.edit');
Route::put('/bahanbakar/{id}', [BahanBakarController::class, 'update'])->name('bahanbakar.update');
Route::delete('/bahanbakar/{id}', [BahanBakarController::class, 'destroy'])->name('bahanbakar.destroy');

Route::get('/merek', [MerekController::class, 'index'])->name('merek.index');
Route::get('/merek/create', [MerekController::class, 'create'])->name('merek.create');
Route::post('/merek', [MerekController::class, 'store'])->name('merek.store');
Route::get('/merek/edit/{id}', [MerekController::class, 'edit'])->name('merek.edit');
Route::put('/merek/{id}', [MerekController::class, 'update'])->name('merek.update');
Route::delete('/merek/{id}', [MerekController::class, 'destroy'])->name('merek.destroy');
