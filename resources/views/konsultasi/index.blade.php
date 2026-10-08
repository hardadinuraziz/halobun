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
        {{-- Halodoc-style Classification Tabs --}}
        <div class="mb-6">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Pilih Klasifikasi Praktisi:</span>
                @if(request('klasifikasi'))
                <a href="{{ route('konsultasi.index') }}" class="text-xs font-bold text-[#16A34A] hover:underline">
                    Reset Filter Klasifikasi &times;
                </a>
                @endif
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-2.5 sm:gap-3">
                {{-- Tab: Semua --}}
                <a href="{{ route('konsultasi.index', array_merge(request()->except('klasifikasi', 'page'), [])) }}"
                   class="rounded-2xl p-3 sm:p-4 border transition-all text-left flex flex-col justify-between {{ !request('klasifikasi') ? 'bg-[#16A34A] text-white border-[#16A34A] shadow-md shadow-emerald-900/10' : 'bg-white text-gray-700 border-gray-200 hover:border-emerald-300 hover:bg-emerald-50/30' }}">
                    <div class="flex items-center justify-between">
                        <span class="text-xl">🌿</span>
                        <span class="text-[11px] font-bold px-2 py-0.5 rounded-full {{ !request('klasifikasi') ? 'bg-white/20 text-white' : 'bg-gray-100 text-gray-600' }}">
                            {{ $klasifikasiCounts['semua'] }}
                        </span>
                    </div>
                    <div class="mt-2.5">
                        <div class="font-extrabold text-xs sm:text-sm">Semua Praktisi</div>
                        <div class="text-[10px] {{ !request('klasifikasi') ? 'text-emerald-100' : 'text-gray-400' }} truncate">Seluruh tingkatan</div>
                    </div>
                </a>

                {{-- Tab: Praktisi Umum --}}
                <a href="{{ route('konsultasi.index', array_merge(request()->except('page'), ['klasifikasi' => 'umum'])) }}"
                   class="rounded-2xl p-3 sm:p-4 border transition-all text-left flex flex-col justify-between {{ request('klasifikasi') === 'umum' ? 'bg-emerald-600 text-white border-emerald-600 shadow-md shadow-emerald-900/10' : 'bg-white text-gray-700 border-gray-200 hover:border-emerald-300 hover:bg-emerald-50/30' }}">
                    <div class="flex items-center justify-between">
                        <span class="text-xl">🌱</span>
                        <span class="text-[11px] font-bold px-2 py-0.5 rounded-full {{ request('klasifikasi') === 'umum' ? 'bg-white/20 text-white' : 'bg-emerald-50 text-emerald-700 border border-emerald-200' }}">
                            {{ $klasifikasiCounts['umum'] }}
                        </span>
                    </div>
                    <div class="mt-2.5">
                        <div class="font-extrabold text-xs sm:text-sm">Praktisi Umum</div>
                        <div class="text-[10px] {{ request('klasifikasi') === 'umum' ? 'text-emerald-100' : 'text-gray-400' }} truncate">Kebun &amp; Pekarangan</div>
                    </div>
                </a>

                {{-- Tab: Praktisi Spesialis --}}
                <a href="{{ route('konsultasi.index', array_merge(request()->except('page'), ['klasifikasi' => 'spesialis'])) }}"
                   class="rounded-2xl p-3 sm:p-4 border transition-all text-left flex flex-col justify-between {{ request('klasifikasi') === 'spesialis' ? 'bg-blue-600 text-white border-blue-600 shadow-md shadow-blue-900/10' : 'bg-white text-gray-700 border-gray-200 hover:border-blue-300 hover:bg-blue-50/30' }}">
                    <div class="flex items-center justify-between">
                        <span class="text-xl">🔬</span>
                        <span class="text-[11px] font-bold px-2 py-0.5 rounded-full {{ request('klasifikasi') === 'spesialis' ? 'bg-white/20 text-white' : 'bg-blue-50 text-blue-700 border border-blue-200' }}">
                            {{ $klasifikasiCounts['spesialis'] }}
                        </span>
                    </div>
                    <div class="mt-2.5">
                        <div class="font-extrabold text-xs sm:text-sm">Praktisi Spesialis</div>
                        <div class="text-[10px] {{ request('klasifikasi') === 'spesialis' ? 'text-blue-100' : 'text-gray-400' }} truncate">Hama, OPT &amp; Komoditas</div>
                    </div>
                </a>

                {{-- Tab: Praktisi Super Spesialis --}}
                <a href="{{ route('konsultasi.index', array_merge(request()->except('page'), ['klasifikasi' => 'super_spesialis'])) }}"
                   class="rounded-2xl p-3 sm:p-4 border transition-all text-left flex flex-col justify-between {{ request('klasifikasi') === 'super_spesialis' ? 'bg-purple-700 text-white border-purple-700 shadow-md shadow-purple-900/10' : 'bg-white text-gray-700 border-gray-200 hover:border-purple-300 hover:bg-purple-50/30' }}">
                    <div class="flex items-center justify-between">
                        <span class="text-xl">🏛️</span>
                        <span class="text-[11px] font-bold px-2 py-0.5 rounded-full {{ request('klasifikasi') === 'super_spesialis' ? 'bg-white/20 text-white' : 'bg-purple-50 text-purple-700 border border-purple-200' }}">
                            {{ $klasifikasiCounts['super_spesialis'] }}
                        </span>
                    </div>
                    <div class="mt-2.5">
                        <div class="font-extrabold text-xs sm:text-sm">Super Spesialis</div>
                        <div class="text-[10px] {{ request('klasifikasi') === 'super_spesialis' ? 'text-purple-100' : 'text-gray-400' }} truncate">Riset, Uji Lab &amp; Audit</div>
                    </div>
                </a>
            </div>
        </div>

        {{-- Active Tier Info Banner --}}
        @if(request('klasifikasi') === 'umum')
        <div class="bg-emerald-50 border border-emerald-200 rounded-2xl p-4 sm:p-5 mb-6 flex items-start gap-3.5">
            <span class="text-2xl flex-shrink-0">🌱</span>
            <div class="text-xs sm:text-sm text-emerald-950">
                <span class="font-bold text-emerald-900 block text-sm sm:text-base">Kategori: Praktisi Umum (Dokter Kebun Pemula)</span>
                Bimbingan perawatan rutin pekarangan rumah, sayuran hidroponik hobi, media tanam pot, dan pencegahan hama dasar. Cocok untuk pekebun rumahan &amp; pemula. Tarif terjangkau mulai Rp 35.000 / sesi.
            </div>
        </div>
        @elseif(request('klasifikasi') === 'spesialis')
        <div class="bg-blue-50 border border-blue-200 rounded-2xl p-4 sm:p-5 mb-6 flex items-start gap-3.5">
            <span class="text-2xl flex-shrink-0">🔬</span>
            <div class="text-xs sm:text-sm text-blue-950">
                <span class="font-bold text-blue-900 block text-sm sm:text-base">Kategori: Praktisi Spesialis (Dokter Tanaman Berlisensi)</span>
                Pakar diagnosa spesifik organisme pengganggu tumbuhan (OPT), penyakit layu/daun, nutrisi presisi hidroponik komersial, dan budidaya cabai/bawang merah/padi.
            </div>
        </div>
        @elseif(request('klasifikasi') === 'super_spesialis')
        <div class="bg-purple-50 border border-purple-200 rounded-2xl p-4 sm:p-5 mb-6 flex items-start gap-3.5">
            <span class="text-2xl flex-shrink-0">🏛️</span>
            <div class="text-xs sm:text-sm text-purple-950">
                <span class="font-bold text-purple-900 block text-sm sm:text-base">Kategori: Praktisi Super Spesialis (Guru Besar &amp; Konsultan Senior)</span>
                Pakar uji laboratorium kimia tanah, bioteknologi tanaman hayati, audit kelayakan perkebunan industri luas hektaran, dan riset formulasi pupuk.
            </div>
        </div>
        @endif

        {{-- Filter Bar --}}
        <form method="GET" action="{{ route('konsultasi.index') }}" class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5 mb-8 shadow-xs">
            @if(request('klasifikasi'))
            <input type="hidden" name="klasifikasi" value="{{ request('klasifikasi') }}">
            @endif
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
                    <button type="submit" class="flex-1 bg-[#16A34A] hover:bg-[#15803D] text-white font-bold px-4 py-2.5 rounded-xl text-sm transition-colors shadow-xs">
                        Terapkan Filter
                    </button>
                    @if(request()->hasAny(['search','spesialisasi','harga_max','klasifikasi']))
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
            @if(request('klasifikasi'))
            <a href="{{ route('konsultasi.index') }}" class="inline-block mt-4 text-xs font-bold text-emerald-600 hover:underline">
                Lihat Praktisi di Semua Klasifikasi &rarr;
            </a>
            @endif
        </div>
        @else
        <div class="flex items-center justify-between mb-4">
            <p class="text-sm text-slate-600">Menampilkan <strong class="text-slate-900">{{ $konsultans->total() }}</strong> praktisi perkebunan</p>
            @if(request('klasifikasi'))
            <span class="text-xs font-semibold px-2.5 py-1 rounded-full {{ request('klasifikasi') === 'umum' ? 'bg-emerald-100 text-emerald-800' : (request('klasifikasi') === 'spesialis' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800') }}">
                Filter: {{ request('klasifikasi') === 'umum' ? 'Praktisi Umum' : (request('klasifikasi') === 'spesialis' ? 'Praktisi Spesialis' : 'Praktisi Super Spesialis') }}
            </span>
            @endif
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($konsultans as $konsultan)
            <div class="bg-white border border-slate-200 hover:border-emerald-500/50 rounded-2xl p-5 sm:p-6 flex flex-col shadow-xs hover:shadow-md transition-all group">
                <div class="flex items-start gap-4 mb-4">
                    <div class="relative flex-shrink-0">
                        <img src="{{ $konsultan->foto_url }}" alt="{{ $konsultan->user->name }}" class="w-14 h-14 rounded-2xl object-cover border border-emerald-100 shadow-xs">
                        <span class="absolute -bottom-1 -right-1 w-3 h-3 rounded-full bg-emerald-500 border-2 border-white"></span>
                    </div>

                    <div class="flex-1 min-w-0">
                        {{-- Klasifikasi Badge --}}
                        <div class="mb-1">
                            @if($konsultan->klasifikasi === 'umum')
                                <span class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    🌱 Praktisi Umum
                                </span>
                            @elseif($konsultan->klasifikasi === 'super_spesialis')
                                <span class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-md bg-purple-50 text-purple-700 border border-purple-200">
                                    🏛️ Super Spesialis
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-md bg-blue-50 text-blue-700 border border-blue-200">
                                    🔬 Praktisi Spesialis
                                </span>
                            @endif
                        </div>

                        <h3 class="font-bold text-slate-900 text-base sm:text-lg leading-snug group-hover:text-emerald-600 transition-colors truncate">
                            {{ $konsultan->user->name }}
                        </h3>
                        <span class="text-xs text-gray-500 block truncate">
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
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed mb-4 line-clamp-3 flex-1">{{ $konsultan->bio }}</p>
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
                       class="bg-[#16A34A] hover:bg-[#15803D] text-white font-bold px-4 py-2 rounded-xl text-sm transition-colors shadow-xs active:scale-95">
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
