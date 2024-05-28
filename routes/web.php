<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('index');
Auth::routes();

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('profile');

Route::get('/profile_settings', [App\Http\Controllers\HomeController::class, 'index2'])->name('profile_settings');

Route::post('/profile/new_transactions', [App\Http\Controllers\TransactionController::class, 'transactions'])->name('new_transaction');

Route::post('/save_settings', [App\Http\Controllers\HomeController::class, 'edit_info'])->name('edit_info');
