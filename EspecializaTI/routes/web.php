<?php

use App\Http\Controllers\SupportController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SupportController::class, 'index'])->name('index');
Route::get('/create', [SupportController::class, 'create'])->name('create');
Route::get('/{id}', [SupportController::class,'show'])->name('show');
Route::post('/',[SupportController::class,'store'])->name('store');

Route::get('/edit/{id}', [SupportController::class, 'edit'])->name('edit');
Route::put('/{id}', [SupportController::class, 'update'])->name('update');