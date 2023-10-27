<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::prefix('/medicine')->name('medicine.')->group(function() {
    Route::get('/create', [MedicineController::class, 'create'])->name('create');
    Route::post('/store', [MedicineController::class, 'store'])->name('store');  
    Route::get('/', [MedicineController::class, 'index'])->name('home');
    Route::get('/{id}', [MedicineController::class, 'edit'])->name('edit');    
    Route::patch('/{id}', [MedicineController::class, 'update'])->name('update');    
    Route::delete('/{id}', [MedicineController::class, 'destroy'])->name('delete');    
    Route::get('/data/stock', [MedicineController::class, 'stock'])->name('stock');    
    Route::get('/data/stock/{id}', [MedicineController::class, 'stockEdit'])->name('stock.edit');    
    Route::patch('/data/stock/{id}', [MedicineController::class, 'stockUpdate'])->name('stock.update');    
});

Route::prefix('/user')->name('user.')->group(function(){
Route::get('/create', [UserController::class, 'create'])->name('create');
Route::post('/store', [UserController::class, 'store'])->name('store');
Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/{id}', [UserController::class, 'edit'])->name('edit');
Route::patch('/{id}', [UserController::class, 'update'])->name('update');
Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
});