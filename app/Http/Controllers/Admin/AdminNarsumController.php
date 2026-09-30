<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NarsumUndangan;
use Illuminate\Http\Request;

class AdminNarsumController extends Controller
{
    public function index(Request $request)
    {
        $query = NarsumUndangan::with('user')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_acara', 'like', "%{$search}%")
                  ->orWhere('penyelenggara', 'like', "%{$search}%")
                  ->orWhere('kontak_pic', 'like', "%{$search}%")
                  ->orWhere('phone_pic', 'like', "%{$search}%")
                  ->orWhere('kota', 'like', "%{$search}%");
            });
        }

        $narsums = $query->paginate(15)->withQueryString();

        return view('admin.narsum.index', compact('narsums'));
    }

    public function updateStatus(Request $request, NarsumUndangan $narsum)
    {
        $request->validate([
            'status'        => 'required|in:pending,confirmed,completed,cancelled',
            'catatan_admin' => 'nullable|string',
        ]);

        $narsum->update([
            'status'        => $request->status,
            'catatan_admin' => $request->catatan_admin ?? $narsum->catatan_admin,
        ]);

        return back()->with('success', 'Pengajuan narasumber untuk ' . $narsum->nama_acara . ' berhasil diperbarui.');
    }
}
