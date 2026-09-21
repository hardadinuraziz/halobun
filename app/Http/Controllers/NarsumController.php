<?php

namespace App\Http\Controllers;

use App\Models\NarsumUndangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NarsumController extends Controller
{
    public function index()
    {
        return view('narsum.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_acara'           => 'required|string|max:255',
            'penyelenggara'        => 'required|string|max:255',
            'tanggal_acara'        => 'required|date|after:today',
            'jam_mulai'            => 'required',
            'jam_selesai'          => 'required',
            'lokasi'               => 'required|string|max:500',
            'kota'                 => 'required|string|max:100',
            'tema'                 => 'required|string|max:500',
            'deskripsi_kebutuhan'  => 'required|string|max:2000',
            'estimasi_peserta'     => 'required|integer|min:1',
            'format'               => 'required|in:offline,online,hybrid',
            'kontak_pic'           => 'required|string|max:100',
            'phone_pic'            => 'required|string|max:20',
            'budget'               => 'nullable|numeric|min:0',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['status']  = 'pending';

        NarsumUndangan::create($validated);

        return redirect()->route('narsum.index')
            ->with('success', 'Pengajuan undangan narasumber berhasil dikirim! Tim kami akan menghubungi Anda dalam 1x24 jam.');
    }

    public function riwayat()
    {
        $undangans = NarsumUndangan::where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('narsum.riwayat', compact('undangans'));
    }
}
