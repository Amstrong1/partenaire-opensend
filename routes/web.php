<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UUIDController;
use App\Http\Controllers\CashoutController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SendMoneyController;
use App\Http\Controllers\TransfertValidation;
use App\Http\Controllers\WithdrawalController;

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
    Route::get('transfert', [CashoutController::class, 'index'])->name('transfert.index');
    Route::get('withdrawal', [WithdrawalController::class, 'index'])->name('withdrawal.index');

    Route::post('/stripeSession', [DepositController::class, 'stripeSession'])->name('stripeSession');
    Route::get('/success', [DepositController::class, 'success'])->name('success');

    Route::get('/send', [SendMoneyController::class, 'create'])->name('send.create');
    Route::post('/send', [SendMoneyController::class, 'store'])->name('send.store');

    Route::post('/transfer-validation', [TransfertValidation::class, 'store'])->name('transfer-validation');

    Route::get('/uuid', [UUIDController::class, 'show'])->name('uuid');
    Route::get('/print', [UUIDController::class, 'print'])->name('uuid.print');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
