@extends('layouts.app')

@section('title', 'Konsultasi Online')
@section('meta_description', 'Konsultasi pertanian online dengan pakar berpengalaman via video call. Pilih konsultan, jadwal, bayar QRIS.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    {{-- Header --}}
    <div class="bg-white border-b border-gray-100 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-extrabold text-gray-900">Konsultasi Online</h1>
            <p class="text-gray-500 mt-2">Konsultasikan masalah pertanian Anda dengan pakar terpercaya via video call</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{-- Filter Bar --}}
        <form method="GET" action="{{ route('konsultasi.index') }}" class="bg-white border border-gray-200 rounded-2xl p-4 mb-8 flex flex-wrap gap-3 items-end">
            <div class="flex-1 min-w-40">
                <label class="block text-xs font-semibold text-gray-500 mb-1.5">Cari Konsultan</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama atau spesialisasi..."
                    class="w-full border border-gray-200 rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
            </div>
            <div class="min-w-44">
                <label class="block text-xs font-semibold text-gray-500 mb-1.5">Spesialisasi</label>
                <select name="spesialisasi" class="w-full border border-gray-200 rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">Semua Spesialisasi</option>
                    @foreach($spesialisasiList as $sp)
                    <option value="{{ $sp }}" {{ request('spesialisasi') == $sp ? 'selected' : '' }}>{{ $sp }}</option>
                    @endforeach
                </select>
            </div>
            <div class="min-w-40">
                <label class="block text-xs font-semibold text-gray-500 mb-1.5">Harga Maks</label>
                <select name="harga_max" class="w-full border border-gray-200 rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">Semua Harga</option>
                    <option value="50000" {{ request('harga_max')=='50000' ? 'selected' : '' }}>≤ Rp 50.000</option>
                    <option value="100000" {{ request('harga_max')=='100000' ? 'selected' : '' }}>≤ Rp 100.000</option>
                    <option value="200000" {{ request('harga_max')=='200000' ? 'selected' : '' }}>≤ Rp 200.000</option>
                    <option value="500000" {{ request('harga_max')=='500000' ? 'selected' : '' }}>≤ Rp 500.000</option>
                </select>
            </div>
            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-5 py-2.5 rounded-xl text-sm transition-colors">
                🔍 Cari
            </button>
            @if(request()->hasAny(['search','spesialisasi','harga_max']))
            <a href="{{ route('konsultasi.index') }}" class="text-gray-500 hover:text-gray-700 text-sm font-medium py-2.5">Reset</a>
            @endif
        </form>

        {{-- Results --}}
        @if($konsultans->isEmpty())
        <div class="text-center py-20">
            <div class="text-6xl mb-4">🔍</div>
            <h3 class="text-xl font-bold text-gray-700 mb-2">Konsultan tidak ditemukan</h3>
            <p class="text-gray-500">Coba ubah filter pencarian Anda</p>
        </div>
        @else
        <div class="flex items-center justify-between mb-4">
            <p class="text-sm text-gray-500">Menampilkan <strong>{{ $konsultans->total() }}</strong> konsultan</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($konsultans as $konsultan)
            <div class="card-hover bg-white border border-gray-100 rounded-2xl p-6 flex flex-col">
                <div class="flex items-start gap-4 mb-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-400 to-green-600 rounded-2xl flex items-center justify-center text-white font-extrabold text-xl flex-shrink-0">
                        {{ substr($konsultan->user->name, 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-bold text-gray-900 text-lg leading-tight">{{ $konsultan->user->name }}</h3>
                        <span class="inline-block bg-emerald-100 text-emerald-700 text-xs font-semibold px-2.5 py-1 rounded-full mt-1">
                            {{ $konsultan->spesialisasi }}
                        </span>
                    </div>
                </div>

                <div class="flex items-center gap-3 mb-3 text-sm">
                    <div class="flex items-center gap-1">
                        <span class="text-yellow-400">⭐</span>
                        <span class="font-semibold text-gray-800">{{ number_format($konsultan->rating, 1) }}</span>
                    </div>
                    <span class="text-gray-300">|</span>
                    <span class="text-gray-500">{{ $konsultan->total_konsultasi }} sesi</span>
                    <span class="text-gray-300">|</span>
                    <span class="text-gray-500">{{ $konsultan->durasi_menit }} mnt</span>
                </div>

                @if($konsultan->bio)
                <p class="text-gray-500 text-sm leading-relaxed mb-4 line-clamp-3 flex-1">{{ $konsultan->bio }}</p>
                @else
                <div class="flex-1"></div>
                @endif

                <div class="pt-4 border-t border-gray-100 flex items-center justify-between mt-auto">
                    <div>
                        <div class="text-xs text-gray-400 mb-0.5">Harga per sesi</div>
                        <div class="font-extrabold text-gray-900 text-lg">
                            Rp {{ number_format($konsultan->harga_per_sesi, 0, ',', '.') }}
                        </div>
                    </div>
                    <a href="{{ route('konsultasi.show', $konsultan) }}"
                       class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-5 py-2.5 rounded-xl text-sm transition-colors shadow-sm">
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
