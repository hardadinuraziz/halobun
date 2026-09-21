<?php

namespace App\Http\Controllers;

use App\Models\KunjunganOffline;
use App\Models\Konsultan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KunjunganController extends Controller
{
    public function index()
    {
        $konsultans = Konsultan::active()->with('user')->get();
        return view('kunjungan.index', compact('konsultans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'konsultan_id'          => 'nullable|exists:konsultans,id',
            'nama_pemilik'          => 'required|string|max:255',
            'phone'                 => 'required|string|max:20',
            'tanggal_kunjungan'     => 'required|date|after:today',
            'jam_kunjungan'         => 'required',
            'alamat_lahan'          => 'required|string|max:1000',
            'kota'                  => 'required|string|max:100',
            'provinsi'              => 'required|string|max:100',
            'jenis_tanaman'         => 'required|string|max:500',
            'masalah_yang_dihadapi' => 'required|string|max:2000',
            'luas_lahan'            => 'nullable|numeric|min:0',
            'satuan_lahan'          => 'required|string',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['status']  = 'pending';

        KunjunganOffline::create($validated);

        return redirect()->route('kunjungan.index')
            ->with('success', 'Permintaan kunjungan offline berhasil dikirim! Tim kami akan segera menghubungi Anda.');
    }

    public function riwayat()
    {
        $kunjungans = KunjunganOffline::with('konsultan.user')
            ->where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('kunjungan.riwayat', compact('kunjungans'));
    }
}
