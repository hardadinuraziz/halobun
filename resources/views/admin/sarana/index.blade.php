@extends('admin.layout')

@section('title', 'Kelola Sarana & Produk — Hallobun Admin')
@section('page-title', 'Katalog Sarana Produksi Pertanian')

@section('content')
<div class="space-y-6">
    {{-- Top Action and Filter Bar --}}
    <div class="bg-white p-4 sm:p-5 rounded-2xl border border-gray-100 shadow-xs flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">
        {{-- Category & Search Filter --}}
        <form method="GET" action="{{ route('admin.sarana.index') }}" class="flex flex-wrap items-center gap-2 flex-1">
            <select name="kategori"
                    onchange="this.form.submit()"
                    class="text-xs py-2 px-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#16A34A] font-semibold text-gray-700">
                <option value="">Semua Kategori</option>
                @foreach($kategoris as $kat)
                    <option value="{{ $kat }}" {{ request('kategori') == $kat ? 'selected' : '' }}>
                        {{ ucfirst($kat) }}
                    </option>
                @endforeach
            </select>

            <div class="relative flex-1 min-w-[200px] max-w-sm">
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari nama / merek / deskripsi..."
                       class="w-full text-xs pl-8 pr-3 py-2 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#16A34A] focus:border-transparent">
                <svg class="w-4 h-4 text-gray-400 absolute left-2.5 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>

            <button type="submit" class="px-3 py-2 bg-[#16A34A] hover:bg-[#15803D] text-white rounded-xl text-xs font-bold transition-all">
                Filter
            </button>

            @if(request('kategori') || request('search'))
                <a href="{{ route('admin.sarana.index') }}" class="p-2 text-gray-400 hover:text-gray-600" title="Reset filter">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </a>
            @endif
        </form>

        {{-- Add New Product Button --}}
        <div>
            <a href="{{ route('admin.sarana.create') }}"
               class="inline-flex items-center gap-2 px-4 py-2.5 bg-[#16A34A] hover:bg-[#15803D] text-white rounded-xl font-bold text-xs shadow-xs transition-all active:scale-95 whitespace-nowrap">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Produk
            </a>
        </div>
    </div>

    {{-- Sarana Products Table --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-xs overflow-hidden">
        <div class="block lg:hidden px-4 py-2 bg-gray-50/90 border-b border-gray-100 text-[11px] text-gray-500 font-medium flex items-center gap-1.5">
            <span>↔️</span> Geser ke samping untuk melihat detail kolom
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-gray-50 text-gray-500 uppercase font-bold border-b border-gray-100">
                    <tr>
                        <th class="px-5 py-3.5 whitespace-nowrap">Produk</th>
                        <th class="px-5 py-3.5 whitespace-nowrap">Kategori & Merek</th>
                        <th class="px-5 py-3.5 whitespace-nowrap">Harga</th>
                        <th class="px-5 py-3.5 whitespace-nowrap">Stok & Satuan</th>
                        <th class="px-5 py-3.5 whitespace-nowrap">Status</th>
                        <th class="px-5 py-3.5 text-right whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($saranas as $p)
                        <tr class="hover:bg-gray-50/70 transition-colors">
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-xl bg-gray-100 border border-gray-200 overflow-hidden flex-shrink-0 flex items-center justify-center">
                                        @if($p->gambar)
                                            <img src="{{ str_starts_with($p->gambar, 'http') ? $p->gambar : asset('storage/' . $p->gambar) }}"
                                                 alt="{{ $p->nama }}"
                                                 class="w-full h-full object-cover">
                                        @else
                                            <span class="text-xl">🌱</span>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="font-bold text-gray-900 line-clamp-1 max-w-xs">{{ $p->nama }}</div>
                                        <div class="text-[11px] text-gray-400 mt-0.5 line-clamp-1 max-w-xs">{{ $p->deskripsi_singkat ?? '-' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4">
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-[#F0FDF4] text-[#16A34A] border border-[#BBF7D0]">
                                    {{ ucfirst($p->kategori) }}
                                </span>
                                @if($p->merek)
                                    <div class="text-[11px] text-gray-500 font-semibold mt-1">🏷️ {{ $p->merek }}</div>
                                @endif
                            </td>
                            <td class="px-5 py-4">
                                <div class="font-extrabold text-gray-900">Rp {{ number_format($p->harga, 0, ',', '.') }}</div>
                                @if($p->harga_coret && $p->harga_coret > $p->harga)
                                    <div class="text-[10px] text-gray-400 line-through">Rp {{ number_format($p->harga_coret, 0, ',', '.') }}</div>
                                @endif
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-1.5">
                                    <span class="font-bold {{ $p->stok <= 5 ? 'text-rose-600' : 'text-gray-800' }}">
                                        {{ $p->stok }}
                                    </span>
                                    <span class="text-gray-400 text-[11px]">{{ $p->satuan }}</span>
                                </div>
                                @if($p->stok <= 5)
                                    <span class="inline-block mt-0.5 px-1.5 py-0.5 rounded text-[9px] font-bold bg-rose-100 text-rose-700">
                                        Stok Menipis
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-4">
                                <div class="space-y-1">
                                    <div>
                                        @if($p->is_active)
                                            <span class="px-2 py-0.5 text-[10px] font-bold bg-emerald-100 text-emerald-800 rounded-full">
                                                Aktif
                                            </span>
                                        @else
                                            <span class="px-2 py-0.5 text-[10px] font-bold bg-gray-100 text-gray-600 rounded-full">
                                                Non-aktif
                                            </span>
                                        @endif
                                    </div>
                                    @if($p->is_featured)
                                        <div>
                                            <span class="px-2 py-0.5 text-[10px] font-bold bg-amber-100 text-amber-800 rounded-full">
                                                ⭐ Unggulan
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-5 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.sarana.edit', $p) }}"
                                       class="px-2.5 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-bold text-xs transition-colors">
                                        Edit
                                    </a>

                                    <form method="POST" action="{{ route('admin.sarana.destroy', $p) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk {{ $p->nama }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2.5 py-1.5 bg-rose-50 hover:bg-rose-100 text-rose-600 rounded-lg font-bold text-xs transition-colors">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-12 text-center text-gray-400">
                                Tidak ada produk sarana yang ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($saranas->hasPages())
            <div class="p-4 border-t border-gray-100 bg-gray-50/50">
                {{ $saranas->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
