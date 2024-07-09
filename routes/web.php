<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AboutController;

Route::get('/', [SuratController::class, 'index'])->name('surats.index');
Route::resource('surats', SuratController::class);
Route::get('surats/download/{id}', [SuratController::class, 'download'])->name('surats.download');
Route::get('surats/view/{id}', [SuratController::class, 'view'])->name('surats.view');

Route::resource('categories', CategoryController::class);

Route::get('/about', [AboutController::class, 'index'])->name('about.index');