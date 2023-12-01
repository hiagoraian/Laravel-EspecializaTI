<?php

use App\Enums\SupportStatus;
use App\Http\Controllers\SupportController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SupportController::class, 'index'])->name('index');
Route::get('/create', [SupportController::class, 'create'])->name('create');
Route::get('/{id}', [SupportController::class,'show'])->name('show');
Route::post('/',[SupportController::class,'store'])->name('store');

Route::get('/edit/{id}', [SupportController::class, 'edit'])->name('edit');
Route::put('/{id}', [SupportController::class, 'update'])->name('update');

Route::delete('/{id}', [SupportController::class, 'destroy'])->name('destroy');

Route::get('/test', function(){
    dd(array_column(SupportStatus::cases(), 'name'));
});