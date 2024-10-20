<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PersonalisationController;

Route::middleware(['set.table.type'])->group(function () {

    Route::post('/set-language', [LanguageController::class, 'setLanguage'])->name('set-language');
    Route::post('/set-type', [LanguageController::class, 'setType'])->name('set-type');

    Route::get('/', [MainController::class, 'index'])->name('index');

    Route::get('/profile/delete_transaction/{id}', [HomeController::class, 'delete_transaction'])->name('DeleteTransaction');

    Route::get('/profile/transactionSum', [TransactionController::class, 'transactionTotalAmount'])->name('amoutCount');

    Route::get('/profile', [HomeController::class, 'index'])->name('profile');
    Route::get('/profile_settings', [HomeController::class, 'index2'])->name('profile_settings');
    Route::get('/profile_report', [HomeController::class, 'index3'])->name('profile_report');
    Route::get('/filter', [TransactionController::class, 'filter'])->name('filter');
    Route::get('/admin', [AdminController::class, 'admin'])->name('profile_admin');
    Route::put('/users/{id}/role', [AdminController::class, 'privelegeUser'])->name('users.privelege');
    Route::get('/users/{id}/details', [AdminController::class, 'showUserDetails'])->name('users.details');

    Route::get('/profile/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
    Route::put('/profile/{id}', [TransactionController::class, 'update'])->name('transactions.update');

    Route::get('/profile_personalisation', [PersonalisationController::class, 'personalisation'])->name('profile_personalisation');

    Route::post('/profile/new_transactions', [TransactionController::class, 'transactions'])->name('new_transaction');

    Route::post('/save_settings', [HomeController::class, 'edit_info'])->name('edit_info');

    Auth::routes();
});