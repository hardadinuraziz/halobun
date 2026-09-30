<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Konsultan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminKonsultanController extends Controller
{
    public function index(Request $request)
    {
        $query = Konsultan::with('user')->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            })->orWhere('spesialisasi', 'like', "%{$search}%");
        }

        $konsultans = $query->paginate(15)->withQueryString();

        return view('admin.konsultan.index', compact('konsultans'));
    }

    public function toggleStatus(Konsultan $konsultan)
    {
        $konsultan->update([
            'is_active' => !$konsultan->is_active,
        ]);

        $status = $konsultan->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('success', 'Status praktisi ' . $konsultan->user->name . ' berhasil ' . $status . '.');
    }

    public function update(Request $request, Konsultan $konsultan)
    {
        $request->validate([
            'spesialisasi'   => 'required|string|max:150',
            'harga_per_sesi' => 'required|numeric|min:0',
            'durasi_menit'   => 'required|integer|min:15',
            'bio'            => 'nullable|string',
        ]);

        $konsultan->update($request->only(['spesialisasi', 'harga_per_sesi', 'durasi_menit', 'bio']));

        return back()->with('success', 'Data praktisi ' . $konsultan->user->name . ' berhasil diperbarui.');
    }
}
