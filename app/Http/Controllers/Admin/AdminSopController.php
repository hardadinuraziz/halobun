<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\KunjunganOffline;
use App\Models\NarsumUndangan;
use App\Models\Sarana;
use App\Services\SopTemplateService;
use Illuminate\Http\Request;

class AdminSopController extends Controller
{
    public function index()
    {
        $recentBookings = Booking::with(['user', 'konsultan.user', 'jadwal'])
            ->latest()
            ->take(10)
            ->get();

        $recentKunjungans = KunjunganOffline::latest()
            ->take(10)
            ->get();

        $recentNarsums = NarsumUndangan::latest()
            ->take(10)
            ->get();

        $saranaList = Sarana::where('is_active', true)
            ->orderBy('nama')
            ->take(20)
            ->get();

        return view('admin.sop.index', compact(
            'recentBookings',
            'recentKunjungans',
            'recentNarsums',
            'saranaList'
        ));
    }
}
