<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KunjunganOffline;
use Illuminate\Http\Request;

class AdminKunjunganController extends Controller
{
    public function index(Request $request)
    {
        $query = KunjunganOffline::with(['user', 'konsultan.user'])->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_pemilik', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('kota', 'like', "%{$search}%")
                  ->orWhere('jenis_tanaman', 'like', "%{$search}%");
            });
        }

        $kunjungans = $query->paginate(15)->withQueryString();

        return view('admin.kunjungan.index', compact('kunjungans'));
    }

    public function updateStatus(Request $request, KunjunganOffline $kunjungan)
    {
        $request->validate([
            'status'            => 'required|in:pending,confirmed,completed,cancelled',
            'biaya'             => 'nullable|numeric|min:0',
            'laporan_kunjungan' => 'nullable|string',
        ]);

        $kunjungan->update([
            'status'            => $request->status,
            'biaya'             => $request->filled('biaya') ? $request->biaya : $kunjungan->biaya,
            'laporan_kunjungan' => $request->laporan_kunjungan ?? $kunjungan->laporan_kunjungan,
        ]);

        return back()->with('success', 'Permintaan kunjungan untuk ' . $kunjungan->nama_pemilik . ' berhasil diperbarui.');
    }
}
