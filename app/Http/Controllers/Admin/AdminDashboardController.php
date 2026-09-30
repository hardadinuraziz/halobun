<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Konsultan;
use App\Models\KunjunganOffline;
use App\Models\NarsumUndangan;
use App\Models\Payment;
use App\Models\Sarana;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users'        => User::where('role', 'user')->count(),
            'total_konsultan'    => Konsultan::count(),
            'total_booking'      => Booking::count(),
            'pending_booking'    => Booking::where('status', 'pending')->count(),
            'total_kunjungan'    => KunjunganOffline::count(),
            'pending_kunjungan'  => KunjunganOffline::where('status', 'pending')->count(),
            'total_narsum'       => NarsumUndangan::count(),
            'pending_narsum'     => NarsumUndangan::where('status', 'pending')->count(),
            'total_sarana'       => Sarana::count(),
            'low_stock_sarana'   => Sarana::where('stok', '<=', 5)->count(),
            'total_pendapatan'   => Payment::where('status', 'paid')->sum('amount'),
        ];

        $recentBookings  = Booking::with(['user', 'konsultan.user', 'payment'])
            ->latest()
            ->take(5)
            ->get();

        $recentKunjungan = KunjunganOffline::with(['user', 'konsultan.user'])
            ->latest()
            ->take(5)
            ->get();

        $recentNarsum    = NarsumUndangan::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentBookings', 'recentKunjungan', 'recentNarsum'));
    }
}
