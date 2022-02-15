<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('admin.welcome');
// });


Route::prefix('expired-users')
    ->middleware('auth:admin')->group(function () {
        Route::get('index', [AdminController::class, 'expiredUserIndex'])->name('expired-users.index');
        Route::post('destroy/{user}', [AdminController::class, 'expiredUserDestroy'])->name('expired-users.destroy');
    });

Route::prefix('bads')
    ->middleware('auth:admin')->group(function () {
        Route::get('comment/index', [BadController::class, 'badCommentIndex'])->name('bads.comment-index');
        Route::get('product/index', [BadController::class, 'badProductIndex'])->name('bads.product-index');
        Route::post('comment/delete/{comment}', [BadController::class, 'badCommentDelete'])->name('bads.comment.delete');
        Route::post('comment/cancel/{comment}', [BadController::class, 'badCommentCancel'])->name('bads.comment.cancel');
        Route::get('product/show/{product}', [BadController::class, 'badProductShow'])->name('bads.product-show');
        Route::post('product/delete/{product}', [BadController::class, 'badProductDelete'])->name('bads.product.delete');
        Route::post('product/cancel/{product}', [BadController::class, 'badProductCancel'])->name('bads.product.cancel');
    });

Route::resource('users', AdminController::class)
    ->middleware('auth:admin')->except(['show']);

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin'])->name('dashboard');

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest:admin')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest:admin');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest:admin')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest:admin');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest:admin')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest:admin')
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest:admin')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest:admin')
    ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware('auth:admin')
    ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['auth:admin', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth:admin', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->middleware('auth:admin')
    ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
    ->middleware('auth:admin');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:admin')
    ->name('logout');
