<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sarana;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminSaranaController extends Controller
{
    public function index(Request $request)
    {
        $query = Sarana::latest();

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('merek', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        $saranas = $query->paginate(15)->withQueryString();
        $kategoris = Sarana::select('kategori')->distinct()->pluck('kategori');

        return view('admin.sarana.index', compact('saranas', 'kategoris'));
    }

    public function create()
    {
        return view('admin.sarana.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'              => 'required|string|max:255',
            'kategori'          => 'required|string|max:100',
            'merek'             => 'nullable|string|max:100',
            'harga'             => 'required|numeric|min:0',
            'harga_coret'       => 'nullable|numeric|min:0',
            'stok'              => 'required|integer|min:0',
            'satuan'            => 'required|string|max:50',
            'deskripsi_singkat' => 'nullable|string|max:500',
            'deskripsi'         => 'required|string',
            'gambar'            => 'nullable|image|max:2048',
            'is_active'         => 'nullable|boolean',
            'is_featured'       => 'nullable|boolean',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('sarana', 'public');
        }

        $data['slug'] = Str::slug($data['nama']) . '-' . Str::random(5);
        $data['is_active'] = $request->has('is_active');
        $data['is_featured'] = $request->has('is_featured');

        Sarana::create($data);

        return redirect()->route('admin.sarana.index')->with('success', 'Produk sarana ' . $data['nama'] . ' berhasil ditambahkan.');
    }

    public function edit(Sarana $sarana)
    {
        return view('admin.sarana.edit', compact('sarana'));
    }

    public function update(Request $request, Sarana $sarana)
    {
        $data = $request->validate([
            'nama'              => 'required|string|max:255',
            'kategori'          => 'required|string|max:100',
            'merek'             => 'nullable|string|max:100',
            'harga'             => 'required|numeric|min:0',
            'harga_coret'       => 'nullable|numeric|min:0',
            'stok'              => 'required|integer|min:0',
            'satuan'            => 'required|string|max:50',
            'deskripsi_singkat' => 'nullable|string|max:500',
            'deskripsi'         => 'required|string',
            'gambar'            => 'nullable|image|max:2048',
            'is_active'         => 'nullable|boolean',
            'is_featured'       => 'nullable|boolean',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('sarana', 'public');
        }

        $data['is_active'] = $request->has('is_active');
        $data['is_featured'] = $request->has('is_featured');

        $sarana->update($data);

        return redirect()->route('admin.sarana.index')->with('success', 'Produk sarana ' . $sarana->nama . ' berhasil diperbarui.');
    }

    public function destroy(Sarana $sarana)
    {
        $nama = $sarana->nama;
        $sarana->delete();

        return redirect()->route('admin.sarana.index')->with('success', 'Produk sarana ' . $nama . ' berhasil dihapus.');
    }
}
