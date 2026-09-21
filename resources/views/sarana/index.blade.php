@extends('layouts.app')

@section('title', 'Sarana Pertanian')

@section('content')
<div class="bg-gray-50 min-h-screen">
    {{-- Header --}}
    <div class="bg-gradient-to-r from-lime-600 to-green-700 py-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <div class="text-5xl mb-4">🌿</div>
            <h1 class="text-3xl sm:text-4xl font-extrabold mb-3">Sarana Pertanian</h1>
            <p class="text-lime-100 text-lg max-w-2xl mx-auto">Produk pertanian berkualitas: pupuk, bibit unggul, pestisida, dan peralatan tani terlengkap</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Filter --}}
        <form method="GET" action="{{ route('sarana.index') }}" class="bg-white border border-gray-200 rounded-2xl p-4 mb-8 flex flex-wrap gap-3 items-end">
            <div class="flex-1 min-w-40">
                <label class="block text-xs font-semibold text-gray-500 mb-1.5">Cari Produk</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama produk..."
                    class="w-full border border-gray-200 rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-lime-500">
            </div>
            <div class="min-w-40">
                <label class="block text-xs font-semibold text-gray-500 mb-1.5">Kategori</label>
                <select name="kategori" class="w-full border border-gray-200 rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-lime-500">
                    <option value="">Semua Kategori</option>
                    @foreach($kategoris as $kat)
                    <option value="{{ $kat }}" {{ request('kategori')==$kat?'selected':'' }}>{{ ucfirst($kat) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="min-w-40">
                <label class="block text-xs font-semibold text-gray-500 mb-1.5">Harga Maks</label>
                <select name="harga_max" class="w-full border border-gray-200 rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-lime-500">
                    <option value="">Semua Harga</option>
                    <option value="50000" {{ request('harga_max')=='50000'?'selected':'' }}>≤ Rp 50.000</option>
                    <option value="100000" {{ request('harga_max')=='100000'?'selected':'' }}>≤ Rp 100.000</option>
                    <option value="500000" {{ request('harga_max')=='500000'?'selected':'' }}>≤ Rp 500.000</option>
                </select>
            </div>
            <button type="submit" class="bg-lime-600 hover:bg-lime-700 text-white font-semibold px-5 py-2.5 rounded-xl text-sm transition-colors">
                🔍 Cari
            </button>
        </form>

        {{-- Products Grid --}}
        @if($saranas->isEmpty())
        <div class="text-center py-20">
            <div class="text-6xl mb-4">🌱</div>
            <h3 class="text-xl font-bold text-gray-700">Produk tidak ditemukan</h3>
        </div>
        @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($saranas as $sarana)
            <div class="card-hover bg-white border border-gray-100 rounded-2xl overflow-hidden group">
                {{-- Product Image --}}
                <div class="aspect-square bg-gradient-to-br from-lime-50 to-green-100 flex items-center justify-center relative">
                    @if($sarana->gambar)
                        <img src="{{ Storage::url($sarana->gambar) }}" alt="{{ $sarana->nama }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                        <span class="text-6xl">🌿</span>
                    @endif
                    @if($sarana->is_featured)
                    <span class="absolute top-2 left-2 bg-yellow-400 text-yellow-900 text-xs font-bold px-2 py-0.5 rounded-full">⭐ Unggulan</span>
                    @endif
                    @if($sarana->diskonPersen())
                    <span class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">-{{ $sarana->diskonPersen() }}%</span>
                    @endif
                </div>

                <div class="p-4">
                    <span class="text-xs text-lime-600 font-semibold uppercase tracking-wide">{{ $sarana->kategori }}</span>
                    <h3 class="font-bold text-gray-900 mt-1 leading-tight">{{ $sarana->nama }}</h3>
                    @if($sarana->merek)
                    <p class="text-gray-400 text-xs mt-0.5">{{ $sarana->merek }}</p>
                    @endif
                    @if($sarana->deskripsi_singkat)
                    <p class="text-gray-500 text-sm mt-2 line-clamp-2">{{ $sarana->deskripsi_singkat }}</p>
                    @endif

                    <div class="mt-3 flex items-end justify-between">
                        <div>
                            <div class="font-extrabold text-gray-900">
                                Rp {{ number_format($sarana->harga, 0, ',', '.') }}
                            </div>
                            @if($sarana->harga_coret)
                            <div class="text-gray-400 text-xs line-through">
                                Rp {{ number_format($sarana->harga_coret, 0, ',', '.') }}
                            </div>
                            @endif
                            <div class="text-xs text-gray-400">per {{ $sarana->satuan }}</div>
                        </div>
                        <a href="{{ route('sarana.show', $sarana) }}"
                           class="bg-lime-600 hover:bg-lime-700 text-white text-xs font-semibold px-3 py-2 rounded-xl transition-colors">
                            Detail
                        </a>
                    </div>

                    @if($sarana->stok <= 5 && $sarana->stok > 0)
                    <p class="text-orange-500 text-xs mt-2 font-medium">⚠️ Stok terbatas ({{ $sarana->stok }} tersisa)</p>
                    @elseif($sarana->stok == 0)
                    <p class="text-red-500 text-xs mt-2 font-medium">❌ Stok habis</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $saranas->withQueryString()->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
