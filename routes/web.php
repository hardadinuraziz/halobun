<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\NarsumController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\SaranaController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ─── Public Routes ──────────────────────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');

// Konsultasi Online
Route::prefix('konsultasi')->name('konsultasi.')->group(function () {
    Route::get('/',                         [KonsultasiController::class, 'index'])->name('index');
    Route::get('/{konsultan}',              [KonsultasiController::class, 'show'])->name('show');
});

// Sarana Pertanian
Route::prefix('sarana')->name('sarana.')->group(function () {
    Route::get('/',              [SaranaController::class, 'index'])->name('index');
    Route::get('/{sarana:slug}', [SaranaController::class, 'show'])->name('show');
});

// ─── Authenticated Routes ────────────────────────────────────────────────────
Route::middleware(['auth', 'verified'])->group(function () {

    // Profile (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Konsultasi - booking flow
    Route::prefix('konsultasi')->name('konsultasi.')->group(function () {
        Route::post('/{konsultan}/booking',            [KonsultasiController::class, 'booking'])->name('booking');
        Route::post('/{konsultan}/store',              [KonsultasiController::class, 'store'])->name('store');
        Route::get('/meeting/{booking}',               [KonsultasiController::class, 'meetingRoom'])->name('meeting');
        Route::get('/payment-finish/{kodeBooking}',   [KonsultasiController::class, 'paymentFinish'])->name('payment-finish');
        Route::get('/riwayat',                         [KonsultasiController::class, 'riwayat'])->name('riwayat');
    });

    // Undang Narsum
    Route::prefix('narsum')->name('narsum.')->group(function () {
        Route::get('/',          [NarsumController::class, 'index'])->name('index');
        Route::post('/store',    [NarsumController::class, 'store'])->name('store');
        Route::get('/riwayat',   [NarsumController::class, 'riwayat'])->name('riwayat');
    });

    // Kunjungan Offline
    Route::prefix('kunjungan')->name('kunjungan.')->group(function () {
        Route::get('/',          [KunjunganController::class, 'index'])->name('index');
        Route::post('/store',    [KunjunganController::class, 'store'])->name('store');
        Route::get('/riwayat',   [KunjunganController::class, 'riwayat'])->name('riwayat');
    });

    // Dashboard user
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
});

// ─── Payment Webhook (no CSRF) ──────────────────────────────────────────────
Route::post('/payment/callback', [PaymentController::class, 'callback'])
    ->name('payment.callback')
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);

Route::get('/payment/finish/{kodeBooking}', [PaymentController::class, 'finish'])
    ->name('payment.finish');

require __DIR__ . '/auth.php';
