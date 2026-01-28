<?php

use App\Http\Controllers\Api\RekeningController;
use Illuminate\Support\Facades\Route;

Route::get('/rekening/{nomor_rekening}', [RekeningController::class, 'show']);