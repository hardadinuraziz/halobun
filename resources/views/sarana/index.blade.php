@extends('layouts.app')

@section('title', 'Sarana Pertanian')

@section('content')
<div class="bg-[#F8FAF7] min-h-screen">
    {{-- Header --}}
    <div class="gradient-nursery py-14 text-white shadow-sm relative overflow-hidden">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -top-10 -right-10 w-64 h-64 bg-white/10 rounded-full blur-2xl"></div>
            <div class="absolute -bottom-10 -left-10 w-52 h-52 bg-[#F7ECC0]/20 rounded-full blur-2xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="text-5xl mb-3">🪴</div>
            <h1 class="text-3xl sm:text-4xl font-extrabold mb-2 text-white">Sarana & Bibit Kebun</h1>
            <p class="text-[#E2EDE1] text-base max-w-2xl mx-auto">Bibit unggul pilihan, media tanam bernutrisi, pupuk organik, dan perkakas berkebun ramah lingkungan.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Filter --}}
        <form method="GET" action="{{ route('sarana.index') }}" class="bg-white/90 border border-[#E2EAE0] rounded-2xl p-4 mb-8 shadow-sm">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <div>
                    <label class="block text-xs font-semibold text-[#5A6D59] mb-1.5">Cari Produk</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama produk bibit, pupuk..."
                        class="w-full border border-[#DCE4DA] rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 bg-[#FAFBF9]">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-[#5A6D59] mb-1.5">Kategori</label>
                    <select name="kategori" class="w-full border border-[#DCE4DA] rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 bg-[#FAFBF9]">
                        <option value="">Semua Kategori</option>
                        @foreach($kategoris as $kat)
                        <option value="{{ $kat }}" {{ request('kategori')==$kat?'selected':'' }}>{{ ucfirst($kat) }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-[#5A6D59] mb-1.5">Harga Maks</label>
                    <select name="harga_max" class="w-full border border-[#DCE4DA] rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 bg-[#FAFBF9]">
                        <option value="">Semua Harga</option>
                        <option value="50000" {{ request('harga_max')=='50000'?'selected':'' }}>≤ Rp 50.000</option>
                        <option value="100000" {{ request('harga_max')=='100000'?'selected':'' }}>≤ Rp 100.000</option>
                        <option value="500000" {{ request('harga_max')=='500000'?'selected':'' }}>≤ Rp 500.000</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="w-full bg-emerald-700 hover:bg-emerald-800 text-white font-semibold px-4 py-2.5 rounded-xl text-sm transition-colors shadow-sm">
                        🔍 Cari Produk
                    </button>
                </div>
            </div>
        </form>

        {{-- Products Grid --}}
        @if($saranas->isEmpty())
        <div class="text-center py-20 bg-white/60 rounded-3xl border border-[#E2EAE0]">
            <div class="text-6xl mb-4">🌱</div>
            <h3 class="text-xl font-bold text-gray-800">Produk tidak ditemukan</h3>
            <p class="text-[#5A6D59] text-sm mt-1">Coba gunakan kata kunci kategori lainnya</p>
        </div>
        @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($saranas as $sarana)
            <div class="card-hover bg-white border border-[#E2EAE0] rounded-2xl overflow-hidden group shadow-sm flex flex-col">
                {{-- Product Image --}}
                <div class="aspect-square bg-gradient-to-br from-[#EEF4ED] to-[#E2EDE1] flex items-center justify-center relative">
                    @if($sarana->gambar)
                        <img src="{{ Storage::url($sarana->gambar) }}" alt="{{ $sarana->nama }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                        <span class="text-6xl">🌿</span>
                    @endif
                    @if($sarana->is_featured)
                    <span class="absolute top-2.5 left-2.5 bg-amber-300/95 text-amber-950 text-xs font-bold px-2.5 py-0.5 rounded-full shadow-sm">⭐ Unggulan</span>
                    @endif
                    @if($sarana->diskonPersen())
                    <span class="absolute top-2.5 right-2.5 bg-rose-500/90 text-white text-xs font-bold px-2.5 py-0.5 rounded-full shadow-sm">-{{ $sarana->diskonPersen() }}%</span>
                    @endif
                </div>

                <div class="p-4 flex-1 flex flex-col">
                    <span class="text-[11px] text-emerald-800 bg-emerald-50 border border-emerald-200/60 font-semibold uppercase tracking-wider px-2 py-0.5 rounded-md inline-block w-fit">{{ $sarana->kategori }}</span>
                    <h3 class="font-bold text-gray-900 mt-2 leading-tight group-hover:text-emerald-800 transition-colors">{{ $sarana->nama }}</h3>
                    @if($sarana->merek)
                    <p class="text-gray-400 text-xs mt-0.5">{{ $sarana->merek }}</p>
                    @endif
                    @if($sarana->deskripsi_singkat)
                    <p class="text-[#5A6D59] text-sm mt-2 line-clamp-2">{{ $sarana->deskripsi_singkat }}</p>
                    @endif

                    <div class="mt-auto pt-4 flex items-end justify-between border-t border-[#EEF2EC]">
                        <div>
                            <div class="font-extrabold text-emerald-950 text-base">
                                Rp {{ number_format($sarana->harga, 0, ',', '.') }}
                            </div>
                            @if($sarana->harga_coret)
                            <div class="text-gray-400 text-xs line-through">
                                Rp {{ number_format($sarana->harga_coret, 0, ',', '.') }}
                            </div>
                            @endif
                            <div class="text-xs text-[#7A8E79]">per {{ $sarana->satuan }}</div>
                        </div>
                        <a href="{{ route('sarana.show', $sarana) }}"
                           class="bg-emerald-700 hover:bg-emerald-800 text-white text-xs font-semibold px-3.5 py-2 rounded-xl transition-colors shadow-sm">
                            Detail
                        </a>
                    </div>

                    @if($sarana->stok <= 5 && $sarana->stok > 0)
                    <p class="text-amber-700 text-xs mt-2 font-medium">⚠️ Stok terbatas ({{ $sarana->stok }} tersisa)</p>
                    @elseif($sarana->stok == 0)
                    <p class="text-rose-600 text-xs mt-2 font-medium">❌ Stok habis</p>
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
