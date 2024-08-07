<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShotenerController;
use Illuminate\Support\Facades\Route;



Route::get('/{code_url}',[ShotenerController::class, 'redirect']);

Route::get('/', [HomeController::class, 'index'])->name('shortener');
Route::get('/shortener/create', [ShotenerController::class, 'create'])->name('shortener.create');
Route::post('/shortener/store', [ShotenerController::class, 'store'])->name('shortener.store');
Route::get('/shortener/redirect/{code_url}', [ShotenerController::class, 'redirect'])->name('shortener.redirect');
Route::delete('/shortener/destroy/{shortener}', [ShotenerController::class, 'destroy'])->name('shortener.destroy');


