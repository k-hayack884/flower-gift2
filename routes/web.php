<?php

use App\Http\Controllers\User\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\TradeController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\User\BadController;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" miuserddleware group. Now create something great!
|
*/

Route::get('/', [ViewController::class,'index'])->name('view');


// Route::resource('profile', ProfileController::class)
// ->middleware('auth:users');

Route::prefix('profiles')->middleware(['auth:users'])->group(function () {
    // Route::get('index', [ProfileController::class], 'index')->name('profiles.index');
    Route::get('show/{profile}', [ProfileController::class,'show'])->name('profiles.show');
    Route::get('edit/{profile}', [ProfileController::class,'edit'])->name('profiles.edit');
    Route::post('update/{profile}', [ProfileController::class,'update'])->name('profiles.update');
    Route::post('destroy/{profile}', [ProfileController::class,'destroy'])->name('profiles.destroy');
});

Route::resource('products', ProductController::class)
->middleware('auth:users');

Route::prefix('emails')->middleware(['auth:users'])->group(function () {
    Route::get('/create/{mail}', [MailController::class, 'create'])->name('emails.create');
    Route::post('/send', [MailController::class, 'send'])->name('emails.send');
    
});
Route::prefix('trades')->middleware(['auth:users'])->group(function () {
    Route::get('show/{trade}', [TradeController::class, 'show'])->name('trades.show');
    Route::post('show/add', [TradeController::class, 'add'])->name('trades.show.add');
    Route::post('show/delete{trade}', [TradeController::class, 'delete'])->name('trades.show.delete');
});
Route::prefix('bads')->middleware(['auth:users'])->group(function () {
    Route::get('/product/{bad}', [BadController::class, 'product'])->name('bads.product');
    Route::post('/product/send/{product}', [BadController::class, 'productSend'])->name('bads.product.send');
    Route::get('/comment/{bad}', [badController::class, 'comment'])->name('bads.comment');
    Route::post('/comment/send/{comment}', [badController::class, 'commentSend'])->name('bads.comment.send');
});


Route::prefix('favorites')->middleware(['auth:users'])->group(function () {
    Route::get('/index', [FavoriteController::class, 'index'])->name('favorites.index');
    // Route::post('/add', [FavoriteController::class,'add'])->name('favorites.add');
    // Route::post('/delete', [FavoriteController::class,'delete'])->name('favorites.delete');
    // Route::post('/delete/{favorite}', [FavoriteController::class,'indexDelete'])->name('favorites.indexdelete');
});


Route::get('/dashboard', [ ProductController::class,'view'])
->middleware(['auth:users'])->name('dashboard');

require __DIR__ . '/auth.php';
