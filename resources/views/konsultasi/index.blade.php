@extends('layouts.app')

@section('title', 'Konsultasi Online')
@section('meta_description', 'Konsultasi pertanian online dengan pakar berpengalaman via video call. Pilih konsultan, jadwal, bayar QRIS.')

@section('content')
<div class="bg-[#F8FAF7] min-h-screen">
    {{-- Header --}}
    <div class="bg-gradient-to-b from-[#EEF4ED] to-[#F8FAF7] border-b border-[#E0E9DE] py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="inline-flex items-center gap-1.5 bg-emerald-100/80 text-emerald-800 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-2">
                🌱 Konsultasi Praktisi
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-emerald-950">Konsultasi Kebun & Pertanian</h1>
            <p class="text-[#5A6D59] mt-2 max-w-2xl">Bimbingan langsung via video call bersama para pakar dan praktisi hortikultura, nutrisi tanaman, hidroponik, dan agribisnis.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{-- Filter Bar --}}
        <form method="GET" action="{{ route('konsultasi.index') }}" class="bg-white/90 border border-[#E2EAE0] rounded-2xl p-4 mb-8 shadow-sm">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <div>
                    <label class="block text-xs font-semibold text-[#5A6D59] mb-1.5">Cari Konsultan</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama atau spesialisasi..."
                        class="w-full border border-[#DCE4DA] rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent bg-[#FAFBF9]">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-[#5A6D59] mb-1.5">Spesialisasi</label>
                    <select name="spesialisasi" class="w-full border border-[#DCE4DA] rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 bg-[#FAFBF9]">
                        <option value="">Semua Spesialisasi</option>
                        @foreach($spesialisasiList as $sp)
                        <option value="{{ $sp }}" {{ request('spesialisasi') == $sp ? 'selected' : '' }}>{{ $sp }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-[#5A6D59] mb-1.5">Harga Maks</label>
                    <select name="harga_max" class="w-full border border-[#DCE4DA] rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 bg-[#FAFBF9]">
                        <option value="">Semua Harga</option>
                        <option value="50000" {{ request('harga_max')=='50000' ? 'selected' : '' }}>≤ Rp 50.000</option>
                        <option value="100000" {{ request('harga_max')=='100000' ? 'selected' : '' }}>≤ Rp 100.000</option>
                        <option value="200000" {{ request('harga_max')=='200000' ? 'selected' : '' }}>≤ Rp 200.000</option>
                        <option value="500000" {{ request('harga_max')=='500000' ? 'selected' : '' }}>≤ Rp 500.000</option>
                    </select>
                </div>
                <div class="flex items-end gap-2">
                    <button type="submit" class="flex-1 bg-emerald-700 hover:bg-emerald-800 text-white font-semibold px-4 py-2.5 rounded-xl text-sm transition-colors shadow-sm">
                        🔍 Cari
                    </button>
                    @if(request()->hasAny(['search','spesialisasi','harga_max']))
                    <a href="{{ route('konsultasi.index') }}" class="flex-shrink-0 text-[#5A6D59] hover:text-emerald-900 text-sm font-medium py-2.5 px-2">Reset</a>
                    @endif
                </div>
            </div>
        </form>

        {{-- Results --}}
        @if($konsultans->isEmpty())
        <div class="text-center py-20 bg-white/60 rounded-3xl border border-[#E2EAE0]">
            <div class="text-6xl mb-4">🪴</div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Konsultan tidak ditemukan</h3>
            <p class="text-[#5A6D59]">Coba ubah kata kunci atau filter pencarian Anda</p>
        </div>
        @else
        <div class="flex items-center justify-between mb-4">
            <p class="text-sm text-[#5A6D59]">Menampilkan <strong class="text-emerald-950">{{ $konsultans->total() }}</strong> konsultan kebun</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($konsultans as $konsultan)
            <div class="card-hover bg-white border border-[#E2EAE0] rounded-2xl p-6 flex flex-col shadow-sm">
                <div class="flex items-start gap-4 mb-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-100 to-emerald-200 border border-emerald-300/40 rounded-2xl flex items-center justify-center text-emerald-800 font-extrabold text-2xl flex-shrink-0 shadow-sm">
                        {{ substr($konsultan->user->name, 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-bold text-gray-900 text-lg leading-tight">{{ $konsultan->user->name }}</h3>
                        <span class="inline-block bg-emerald-100/80 text-emerald-800 text-xs font-semibold px-2.5 py-1 rounded-full mt-1.5">
                            {{ $konsultan->spesialisasi }}
                        </span>
                    </div>
                </div>

                <div class="flex items-center gap-3 mb-3 text-sm">
                    <div class="flex items-center gap-1">
                        <span class="text-amber-500">⭐</span>
                        <span class="font-semibold text-gray-800">{{ number_format($konsultan->rating, 1) }}</span>
                    </div>
                    <span class="text-gray-300">|</span>
                    <span class="text-[#5A6D59]">{{ $konsultan->total_konsultasi }} sesi</span>
                    <span class="text-gray-300">|</span>
                    <span class="text-[#5A6D59]">{{ $konsultan->durasi_menit }} mnt</span>
                </div>

                @if($konsultan->bio)
                <p class="text-[#5A6D59] text-sm leading-relaxed mb-4 line-clamp-3 flex-1">{{ $konsultan->bio }}</p>
                @else
                <div class="flex-1"></div>
                @endif

                <div class="pt-4 border-t border-[#EEF2EC] flex items-center justify-between mt-auto">
                    <div>
                        <div class="text-xs text-gray-400 mb-0.5">Harga per sesi</div>
                        <div class="font-extrabold text-emerald-950 text-lg">
                            Rp {{ number_format($konsultan->harga_per_sesi, 0, ',', '.') }}
                        </div>
                    </div>
                    <a href="{{ route('konsultasi.show', $konsultan) }}"
                       class="bg-emerald-700 hover:bg-emerald-800 text-white font-semibold px-5 py-2.5 rounded-xl text-sm transition-colors shadow-sm">
                        Booking →
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $konsultans->withQueryString()->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
