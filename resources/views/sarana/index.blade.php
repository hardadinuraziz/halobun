@extends('layouts.app')

@section('title', 'Toko Sarana Pertanian & Bibit Berkebun')
@section('meta_description', 'Katalog sarana pertanian berkualitas: benih unggul, pupuk organik, nutrisi tanaman, dan alat kebun.')

@section('content')
<div class="bg-[#F8FAFC] min-h-screen">
    {{-- Header --}}
    <div class="bg-white border-b border-slate-200 py-10 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="inline-flex items-center gap-1.5 bg-[#FFF0F5] text-[#E0004D] border border-[#FFD1DF] text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-3">
                🛒 Toko Sarana Kebun
            </span>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#1E293B]">Sarana, Benih &amp; Pupuk Berkebun</h1>
            <p class="text-slate-600 mt-2 max-w-2xl text-sm sm:text-base">Bibit unggul teruji, media tanam bernutrisi, pupuk organik hayati, dan perlengkapan perkebunan ramah lingkungan.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Filter --}}
        <form method="GET" action="{{ route('sarana.index') }}" class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5 mb-8 shadow-sm">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Cari Produk</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama benih, pupuk, alat..."
                        class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Kategori</label>
                    <select name="kategori" class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                        <option value="">Semua Kategori</option>
                        @foreach($kategoris as $kat)
                        <option value="{{ $kat }}" {{ request('kategori')==$kat?'selected':'' }}>{{ ucfirst($kat) }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Harga Maks</label>
                    <select name="harga_max" class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                        <option value="">Semua Harga</option>
                        <option value="50000" {{ request('harga_max')=='50000'?'selected':'' }}>≤ Rp 50.000</option>
                        <option value="100000" {{ request('harga_max')=='100000'?'selected':'' }}>≤ Rp 100.000</option>
                        <option value="500000" {{ request('harga_max')=='500000'?'selected':'' }}>≤ Rp 500.000</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="w-full bg-[#E0004D] hover:bg-[#C70044] text-white font-bold px-4 py-2.5 rounded-xl text-sm transition-colors shadow-sm">
                        Cari Produk
                    </button>
                </div>
            </div>
        </form>

        {{-- Products Grid --}}
        @if($saranas->isEmpty())
        <div class="text-center py-20 bg-white rounded-2xl border border-slate-200">
            <div class="text-5xl mb-3">🌱</div>
            <h3 class="text-lg font-bold text-slate-800 mb-1">Produk tidak ditemukan</h3>
            <p class="text-slate-500 text-sm">Coba gunakan kata kunci pencarian lainnya</p>
        </div>
        @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($saranas as $sarana)
            <div class="bg-white border border-slate-200 hover:border-slate-300 rounded-2xl overflow-hidden group shadow-sm hover:shadow-md transition-all flex flex-col">
                {{-- Product Image --}}
                <div class="aspect-square bg-slate-100 flex items-center justify-center relative overflow-hidden">
                    @if($sarana->gambar)
                        <img src="{{ Storage::url($sarana->gambar) }}" alt="{{ $sarana->nama }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                        <img src="/images/halobun_real_sarana.jpg" alt="{{ $sarana->nama }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @endif
                    @if($sarana->is_featured)
                    <span class="absolute top-2.5 left-2.5 bg-amber-400 text-slate-900 text-[10px] font-bold px-2.5 py-0.5 rounded-full shadow-sm">⭐ Unggulan</span>
                    @endif
                    @if($sarana->diskonPersen())
                    <span class="absolute top-2.5 right-2.5 bg-[#E0004D] text-white text-[10px] font-bold px-2.5 py-0.5 rounded-full shadow-sm">-{{ $sarana->diskonPersen() }}%</span>
                    @endif
                </div>

                <div class="p-4 flex-1 flex flex-col">
                    <span class="text-[10px] text-[#E0004D] bg-[#FFF0F5] border border-[#FFD1DF] font-bold uppercase tracking-wider px-2 py-0.5 rounded-md inline-block w-fit">{{ $sarana->kategori }}</span>
                    <h3 class="font-bold text-slate-900 text-sm sm:text-base mt-2 leading-snug group-hover:text-[#E0004D] transition-colors">{{ $sarana->nama }}</h3>
                    @if($sarana->merek)
                    <p class="text-slate-400 text-xs mt-0.5">{{ $sarana->merek }}</p>
                    @endif
                    @if($sarana->deskripsi_singkat)
                    <p class="text-slate-600 text-xs mt-2 line-clamp-2 leading-relaxed">{{ $sarana->deskripsi_singkat }}</p>
                    @endif

                    <div class="mt-auto pt-3 flex items-end justify-between border-t border-slate-100">
                        <div>
                            <div class="font-extrabold text-[#E0004D] text-base">
                                Rp {{ number_format($sarana->harga, 0, ',', '.') }}
                            </div>
                            @if($sarana->harga_coret)
                            <div class="text-slate-400 text-xs line-through">
                                Rp {{ number_format($sarana->harga_coret, 0, ',', '.') }}
                            </div>
                            @endif
                            <div class="text-[11px] text-slate-400">per {{ $sarana->satuan }}</div>
                        </div>
                        <a href="{{ route('sarana.show', $sarana) }}"
                           class="bg-[#FFF0F5] hover:bg-[#E0004D] text-[#E0004D] hover:text-white border border-[#FFD1DF] hover:border-[#E0004D] text-xs font-bold px-3 py-1.5 rounded-xl transition-all">
                            Beli
                        </a>
                    </div>

                    @if($sarana->stok <= 5 && $sarana->stok > 0)
                    <p class="text-amber-600 text-[11px] mt-2 font-medium">⚠️ Stok terbatas ({{ $sarana->stok }} tersisa)</p>
                    @elseif($sarana->stok == 0)
                    <p class="text-rose-600 text-[11px] mt-2 font-medium">❌ Stok habis</p>
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
