<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UUIDController;
use App\Http\Controllers\CashoutController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WithDrawController;
use App\Http\Controllers\SendMoneyController;
use App\Http\Controllers\TransfertValidation;
use App\Http\Controllers\WithdrawalController;
use App\Http\Controllers\ConfirmInteracController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->middleware(['auth', 'verified']);

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/done', function () {
    return view('success');
})->name('done');

Route::middleware('auth')->group(function () {
    Route::get('deposit', [DepositController::class, 'index'])->name('deposit.index');

    Route::resource('transfert', CashoutController::class);

    Route::resource('withdrawal', WithdrawalController::class);

    Route::post('/stripeSession', [DepositController::class, 'stripeSession'])->name('stripeSession');
    Route::get('/success', [DepositController::class, 'success'])->name('success');

    Route::post('/transfer-validation', [TransfertValidation::class, 'store'])->name('transfer-validation');

    Route::post('/interac-confirm', [ConfirmInteracController::class, 'store'])->name('interac-confirm');

    Route::get('/uuid', [UUIDController::class, 'show'])->name('uuid');
    Route::get('/print', [UUIDController::class, 'print'])->name('uuid.print');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
