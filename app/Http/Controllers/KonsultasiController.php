<?php

namespace App\Http\Controllers;

use App\Models\Konsultan;
use App\Models\Jadwal;
use App\Models\Booking;
use App\Services\PaymentService;
use App\Services\VideoCallService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KonsultasiController extends Controller
{
    public function __construct(
        private PaymentService   $paymentService,
        private VideoCallService $videoCallService
    ) {}

    /**
     * Daftar konsultan dengan filter
     */
    public function index(Request $request)
    {
        $query = Konsultan::active()->with('user');

        if ($request->filled('spesialisasi')) {
            $query->where('spesialisasi', $request->spesialisasi);
        }

        if ($request->filled('harga_max')) {
            $query->where('harga_per_sesi', '<=', $request->harga_max);
        }

        if ($request->filled('search')) {
            $query->whereHas('user', fn($q) => $q->where('name', 'like', "%{$request->search}%"))
                  ->orWhere('spesialisasi', 'like', "%{$request->search}%");
        }

        $konsultans      = $query->orderByDesc('rating')->paginate(12);
        $spesialisasiList = Konsultan::active()->distinct()->pluck('spesialisasi');

        return view('konsultasi.index', compact('konsultans', 'spesialisasiList'));
    }

    /**
     * Detail konsultan + jadwal tersedia
     */
    public function show(Konsultan $konsultan)
    {
        $konsultan->load('user', 'jadwalTersedia');
        return view('konsultasi.show', compact('konsultan'));
    }

    /**
     * Form booking & konfirmasi
     */
    public function booking(Request $request, Konsultan $konsultan)
    {
        $request->validate([
            'jadwal_id' => 'required|exists:jadwals,id',
            'keluhan'   => 'required|string|max:1000',
        ]);

        $jadwal = Jadwal::findOrFail($request->jadwal_id);

        if (!$jadwal->is_available) {
            return back()->with('error', 'Jadwal ini sudah tidak tersedia.');
        }

        return view('konsultasi.konfirmasi', compact('konsultan', 'jadwal', 'request'));
    }

    /**
     * Proses booking & redirect ke payment
     */
    public function store(Request $request, Konsultan $konsultan)
    {
        $request->validate([
            'jadwal_id' => 'required|exists:jadwals,id',
            'keluhan'   => 'required|string|max:1000',
        ]);

        $jadwal = Jadwal::findOrFail($request->jadwal_id);

        DB::beginTransaction();
        try {
            // Buat booking
            $booking = Booking::create([
                'user_id'      => Auth::id(),
                'konsultan_id' => $konsultan->id,
                'jadwal_id'    => $jadwal->id,
                'tipe'         => 'online',
                'status'       => 'pending',
                'keluhan'      => $request->keluhan,
            ]);

            // Block jadwal
            $jadwal->update(['is_available' => false]);

            // Buat transaksi Midtrans
            $snapToken = $this->paymentService->createSnapTransaction($booking);

            DB::commit();

            return view('konsultasi.payment', compact('booking', 'snapToken'));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    /**
     * Halaman room video call Jitsi
     */
    public function meetingRoom(Booking $booking)
    {
        // Pastikan hanya user yang bersangkutan atau konsultan bisa akses
        $user = Auth::user();
        if ($booking->user_id !== $user->id && $booking->konsultan->user_id !== $user->id) {
            abort(403);
        }

        if ($booking->status !== 'confirmed') {
            return redirect()->route('dashboard')->with('error', 'Booking belum dikonfirmasi.');
        }

        $jitsiConfig = $this->videoCallService->getJitsiConfig($booking);

        return view('konsultasi.meeting', compact('booking', 'jitsiConfig'));
    }

    /**
     * Halaman setelah pembayaran selesai (redirect dari Midtrans)
     */
    public function paymentFinish(string $kodeBooking)
    {
        $booking = Booking::where('kode_booking', $kodeBooking)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('konsultasi.payment-finish', compact('booking'));
    }

    /**
     * Riwayat konsultasi user
     */
    public function riwayat()
    {
        $bookings = Booking::with(['konsultan.user', 'jadwal', 'payment'])
            ->where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('konsultasi.riwayat', compact('bookings'));
    }
}
