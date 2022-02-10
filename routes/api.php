<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\TradeController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\User\ReviewController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('trades')->middleware(['auth:users'])->group(function () {
    Route::post('show/add', [TradeController::class, 'add'])->name('trades.show.add');
    Route::post('show/delete{trade}', [TradeController::class, 'delete'])->name('trades.show.delete');
});
Route::prefix('reviews')->middleware(['auth:users'])->group(function () {
    Route::post('/good', [ReviewController::class,'good'])->name('reviews.good');
    Route::post('/normal', [ReviewController::class,'normal'])->name('reviews.normal');
    Route::post('/bad', [ReviewController::class,'bad'])->name('reviews.bad');
});
