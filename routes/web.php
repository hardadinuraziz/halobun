<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\NarsumController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\SaranaController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\AdminKunjunganController;
use App\Http\Controllers\Admin\AdminNarsumController;
use App\Http\Controllers\Admin\AdminSaranaController;
use App\Http\Controllers\Admin\AdminKonsultanController;
use Illuminate\Support\Facades\Route;

// ─── Public Routes ──────────────────────────────────────────────────────────
Route::get('/',        [HomeController::class, 'index'])->name('home');
Route::get('/layanan', [HomeController::class, 'layanan'])->name('layanan');

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

// Undang Narsum (Public Landing)
Route::get('/narsum', [NarsumController::class, 'index'])->name('narsum.index');

// Kunjungan Offline (Public Landing)
Route::get('/kunjungan', [KunjunganController::class, 'index'])->name('kunjungan.index');

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

    // Undang Narsum (Submit & Riwayat)
    Route::prefix('narsum')->name('narsum.')->group(function () {
        Route::post('/store',    [NarsumController::class, 'store'])->name('store');
        Route::get('/riwayat',   [NarsumController::class, 'riwayat'])->name('riwayat');
    });

    // Kunjungan Offline (Submit & Riwayat)
    Route::prefix('kunjungan')->name('kunjungan.')->group(function () {
        Route::post('/store',    [KunjunganController::class, 'store'])->name('store');
        Route::get('/riwayat',   [KunjunganController::class, 'riwayat'])->name('riwayat');
    });

    // Dashboard user
    Route::get('/dashboard', function () {
        $user = auth()->user();
        $bookings = \App\Models\Booking::with(['konsultan.user', 'jadwal', 'payment'])
            ->where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();
        $kunjungans = \App\Models\KunjunganOffline::where('user_id', $user->id)->latest()->take(5)->get();
        $narsums = \App\Models\NarsumUndangan::where('user_id', $user->id)->latest()->take(5)->get();
        return view('dashboard', compact('bookings', 'kunjungans', 'narsums'));
    })->name('dashboard');
});

// ─── Payment Webhook (no CSRF) ──────────────────────────────────────────────
Route::post('/payment/callback', [PaymentController::class, 'callback'])
    ->name('payment.callback')
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);

Route::get('/payment/finish/{kodeBooking}', [PaymentController::class, 'finish'])
    ->name('payment.finish');

// ─── Admin Management Panel ─────────────────────────────────────────────────
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Booking Konsultasi
    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
    Route::patch('/bookings/{booking}/status', [AdminBookingController::class, 'updateStatus'])->name('bookings.update-status');

    // Kunjungan Lahan
    Route::get('/kunjungan', [AdminKunjunganController::class, 'index'])->name('kunjungan.index');
    Route::patch('/kunjungan/{kunjungan}/status', [AdminKunjunganController::class, 'updateStatus'])->name('kunjungan.update-status');

    // Undang Narasumber
    Route::get('/narsum', [AdminNarsumController::class, 'index'])->name('narsum.index');
    Route::patch('/narsum/{narsum}/status', [AdminNarsumController::class, 'updateStatus'])->name('narsum.update-status');

    // Sarana Produk
    Route::resource('sarana', AdminSaranaController::class);

    // Praktisi / Konsultan
    Route::get('/konsultan', [AdminKonsultanController::class, 'index'])->name('konsultan.index');
    Route::patch('/konsultan/{konsultan}/toggle', [AdminKonsultanController::class, 'toggleStatus'])->name('konsultan.toggle');
    Route::put('/konsultan/{konsultan}', [AdminKonsultanController::class, 'update'])->name('konsultan.update');
});

require __DIR__ . '/auth.php';
