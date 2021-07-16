<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('columns')->group(function () {
    Route::get('/all', [\App\Http\Controllers\ColumnsController::class, 'index']);
    Route::post('/create', [\App\Http\Controllers\ColumnsController::class, 'store']);
    Route::delete('/delete', [\App\Http\Controllers\ColumnsController::class, 'destroy']);
});

Route::prefix('cards')->group(function () {
    Route::post('/create', [\App\Http\Controllers\CardController::class, 'store']);
    Route::post('/update', [\App\Http\Controllers\CardController::class, 'update']);
});

Route::prefix('database')->group(function () {
    Route::get('/dump', [\App\Http\Controllers\DumpDBController::class, 'index']);
});
