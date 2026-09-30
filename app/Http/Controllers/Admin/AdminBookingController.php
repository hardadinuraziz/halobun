<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with(['user', 'konsultan.user', 'payment', 'jadwal'])->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('kode_booking', 'like', "%{$search}%")
                  ->orWhereHas('user', fn($u) => $u->where('name', 'like', "%{$search}%"))
                  ->orWhereHas('konsultan.user', fn($k) => $k->where('name', 'like', "%{$search}%"));
            });
        }

        $bookings = $query->paginate(15)->withQueryString();

        return view('admin.bookings.index', compact('bookings'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status'       => 'required|in:pending,confirmed,completed,cancelled',
            'meeting_link' => 'nullable|url',
        ]);

        $booking->update([
            'status'       => $request->status,
            'meeting_link' => $request->meeting_link ?? $booking->meeting_link,
        ]);

        return back()->with('success', 'Status booking ' . $booking->kode_booking . ' berhasil diperbarui.');
    }
}
