<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransferController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('menu')->group(function () {
    Route::get('/transfer', [TransferController::class, 'menu'])->name('menu.transfer');
});

Route::prefix('transfer/bank-lain')->group(function () {
    Route::get('/metode', [TransferController::class, 'metode'])->name('transfer.metode');
    Route::post('/metode', [TransferController::class, 'storeMetode'])->name('transfer.metode.store');
    
    Route::get('/data-pengirim', [TransferController::class, 'dataPengirim'])->name('transfer.data-pengirim');
    Route::post('/data-pengirim', [TransferController::class, 'storeDataPengirim'])->name('transfer.data-pengirim.store');
    
    Route::get('/konfirmasi', [TransferController::class, 'konfirmasi'])->name('transfer.konfirmasi');
    Route::post('/konfirmasi', [TransferController::class, 'proses'])->name('transfer.proses');
    
    Route::get('/ringkasan', [TransferController::class, 'ringkasan'])->name('transfer.ringkasan');
});

Route::get('/reset', [TransferController::class, 'reset'])->name('transfer.reset');