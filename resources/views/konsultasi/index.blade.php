@extends('layouts.app')

@section('title', 'Konsultasi Praktisi Perkebunan & Pertanian Online')
@section('meta_description', 'Konsultasi pertanian & perkebunan online bersama praktisi dan pakar agronomi berpengalaman via video call.')

@section('content')
<div class="bg-[#F8FAFC] min-h-screen">
    {{-- Header --}}
    <div class="bg-white border-b border-slate-200 py-10 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="inline-flex items-center gap-1.5 bg-[#F0FDF4] text-[#16A34A] border border-[#BBF7D0] text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-3">
                💬 Tanya Praktisi Kebun
            </span>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#1E293B]">Konsultasi Praktisi Perkebunan &amp; Agronomi</h1>
            <p class="text-slate-600 mt-2 max-w-2xl text-sm sm:text-base">Bimbingan langsung via video call interaktif bersama para pakar hortikultura, nutrisi tanah, hama tanaman, dan hidroponik.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{-- Filter Bar --}}
        <form method="GET" action="{{ route('konsultasi.index') }}" class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5 mb-8 shadow-sm">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Cari Praktisi</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama atau spesialisasi..."
                        class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#16A34A] focus:border-transparent bg-slate-50">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Spesialisasi</label>
                    <select name="spesialisasi" class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#16A34A] bg-slate-50">
                        <option value="">Semua Spesialisasi</option>
                        @foreach($spesialisasiList as $sp)
                        <option value="{{ $sp }}" {{ request('spesialisasi') == $sp ? 'selected' : '' }}>{{ $sp }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Harga Maks</label>
                    <select name="harga_max" class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#16A34A] bg-slate-50">
                        <option value="">Semua Harga</option>
                        <option value="50000" {{ request('harga_max')=='50000' ? 'selected' : '' }}>≤ Rp 50.000</option>
                        <option value="100000" {{ request('harga_max')=='100000' ? 'selected' : '' }}>≤ Rp 100.000</option>
                        <option value="200000" {{ request('harga_max')=='200000' ? 'selected' : '' }}>≤ Rp 200.000</option>
                        <option value="500000" {{ request('harga_max')=='500000' ? 'selected' : '' }}>≤ Rp 500.000</option>
                    </select>
                </div>
                <div class="flex items-end gap-2">
                    <button type="submit" class="flex-1 bg-[#16A34A] hover:bg-[#15803D] text-white font-bold px-4 py-2.5 rounded-xl text-sm transition-colors shadow-sm">
                        Cari Praktisi
                    </button>
                    @if(request()->hasAny(['search','spesialisasi','harga_max']))
                    <a href="{{ route('konsultasi.index') }}" class="flex-shrink-0 text-slate-500 hover:text-slate-900 text-sm font-medium py-2.5 px-2">Reset</a>
                    @endif
                </div>
            </div>
        </form>

        {{-- Results --}}
        @if($konsultans->isEmpty())
        <div class="text-center py-20 bg-white rounded-2xl border border-slate-200">
            <div class="text-5xl mb-3">🪴</div>
            <h3 class="text-lg font-bold text-slate-800 mb-1">Praktisi tidak ditemukan</h3>
            <p class="text-slate-500 text-sm">Coba ubah kata kunci atau filter pencarian Anda</p>
        </div>
        @else
        <div class="flex items-center justify-between mb-4">
            <p class="text-sm text-slate-600">Menampilkan <strong class="text-slate-900">{{ $konsultans->total() }}</strong> praktisi perkebunan</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($konsultans as $konsultan)
            <div class="bg-white border border-slate-200 hover:border-slate-300 rounded-2xl p-5 sm:p-6 flex flex-col shadow-sm hover:shadow-md transition-all">
                <div class="flex items-start gap-4 mb-4">
                    <div class="w-14 h-14 bg-[#F0FDF4] border border-[#BBF7D0] rounded-2xl flex items-center justify-center text-[#16A34A] font-extrabold text-2xl flex-shrink-0">
                        {{ substr($konsultan->user->name, 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-bold text-slate-900 text-base sm:text-lg leading-snug">{{ $konsultan->user->name }}</h3>
                        <span class="inline-block bg-[#F0FDF4] text-[#16A34A] border border-[#BBF7D0] text-xs font-semibold px-2.5 py-0.5 rounded-full mt-1.5">
                            {{ $konsultan->spesialisasi }}
                        </span>
                    </div>
                </div>

                <div class="flex items-center gap-3 mb-3 text-xs sm:text-sm">
                    <div class="flex items-center gap-1">
                        <span class="text-amber-500">⭐</span>
                        <span class="font-bold text-slate-800">{{ number_format($konsultan->rating, 1) }}</span>
                    </div>
                    <span class="text-slate-300">|</span>
                    <span class="text-slate-500">{{ $konsultan->total_konsultasi }} sesi</span>
                    <span class="text-slate-300">|</span>
                    <span class="text-slate-500">{{ $konsultan->durasi_menit }} menit</span>
                </div>

                @if($konsultan->bio)
                <p class="text-slate-600 text-sm leading-relaxed mb-4 line-clamp-3 flex-1">{{ $konsultan->bio }}</p>
                @else
                <div class="flex-1"></div>
                @endif

                <div class="pt-4 border-t border-slate-100 flex items-center justify-between mt-auto">
                    <div>
                        <div class="text-[11px] text-slate-400 mb-0.5">Biaya per sesi</div>
                        <div class="font-extrabold text-[#16A34A] text-base sm:text-lg">
                            Rp {{ number_format($konsultan->harga_per_sesi, 0, ',', '.') }}
                        </div>
                    </div>
                    <a href="{{ route('konsultasi.show', $konsultan) }}"
                       class="bg-[#16A34A] hover:bg-[#15803D] text-white font-bold px-4 py-2 rounded-xl text-sm transition-colors shadow-sm">
                        Konsultasi →
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
