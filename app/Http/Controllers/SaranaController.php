<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
use Illuminate\Http\Request;

class SaranaController extends Controller
{
    public function index(Request $request)
    {
        $query = Sarana::active();

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', "%{$request->search}%")
                  ->orWhere('deskripsi_singkat', 'like', "%{$request->search}%");
            });
        }

        if ($request->filled('harga_max')) {
            $query->where('harga', '<=', $request->harga_max);
        }

        $saranas     = $query->orderByDesc('is_featured')->orderByDesc('total_terjual')->paginate(12);
        $kategoris   = Sarana::active()->distinct()->pluck('kategori');

        return view('sarana.index', compact('saranas', 'kategoris'));
    }

    public function show(Sarana $sarana)
    {
        $related = Sarana::active()
            ->where('kategori', $sarana->kategori)
            ->where('id', '!=', $sarana->id)
            ->take(4)
            ->get();

        return view('sarana.show', compact('sarana', 'related'));
    }
}
