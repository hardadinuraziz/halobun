@extends('layouts.app')

@section('title', 'Solusi Perawatan Kebun & Pertanian Terlengkap di Tanganmu')

@section('content')

{{-- ═══════════════════════════════════════════════════════════════════════════
     1. HERO SECTION (HALODOC STYLE: CLEAN, SIMPLE & PROFESSIONAL)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section class="relative bg-gradient-to-b from-[#F2F7F0] via-[#FAFBF9] to-white pt-6 sm:pt-10 pb-8 sm:pb-12 border-b border-[#E3EBE1] overflow-hidden">
    {{-- Subtle Ambient Aura Glows --}}
    <div class="aura-glow aura-glow-1"></div>
    <div class="aura-glow aura-glow-2"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        {{-- Headline & Subtitle --}}
        <div class="text-center max-w-3xl mx-auto mb-6 sm:mb-8">
            <div class="inline-flex items-center gap-2 bg-white/90 border border-[#D5E5D2] px-3.5 py-1.5 rounded-full shadow-xs mb-3">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span class="text-[11px] sm:text-xs font-bold text-[#2A4D27] uppercase tracking-wider">
                    Tele-Agronomi &amp; Solusi Kebun #1 Indonesia
                </span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#1F331E] leading-[1.2] tracking-tight font-serif-title mb-3">
                Solusi Perawatan Kebun &amp; Pertanian<br class="hidden sm:inline">
                <span class="bg-gradient-to-r from-[#2F5E2D] to-[#4A7A48] bg-clip-text text-transparent">
                    Terlengkap di Tanganmu
                </span>
            </h1>

            <p class="text-xs sm:text-base text-[#4D654C] leading-relaxed max-w-2xl mx-auto">
                Chat dokter tanaman, beli bibit unggul &amp; nutrisi organik, undang narsum pelatihan, atau pesan kunjungan lapangan langsung ke kebun Anda.
            </p>
        </div>

        {{-- Halodoc Signature Search Bar --}}
        <div class="max-w-2xl mx-auto mb-8 sm:mb-10">
            <div class="bg-white rounded-2xl sm:rounded-full p-2 sm:p-2.5 border border-[#D4E4D1] shadow-md flex flex-col sm:flex-row items-center gap-2 transition-all focus-within:border-emerald-600 focus-within:ring-2 focus-within:ring-emerald-100">
                <div class="flex items-center gap-2.5 flex-1 px-3 w-full">
                    <span class="text-xl text-gray-400">🔍</span>
                    <input type="text" 
                           id="homeSearchInput"
                           placeholder="Cari agronomis, hama tanaman, pupuk, atau bibit..."
                           class="w-full bg-transparent border-none text-xs sm:text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-0 py-1.5">
                </div>
                <a href="{{ route('konsultasi.index') }}" 
                   id="homeSearchBtn"
                   class="w-full sm:w-auto px-6 py-2.5 rounded-xl sm:rounded-full bg-[#2E4A2C] hover:bg-[#223920] text-white text-xs sm:text-sm font-bold text-center transition-all shadow-xs flex-shrink-0">
                    Cari Solusi
                </a>
            </div>

            {{-- Quick Search Tags --}}
            <div class="flex flex-wrap items-center justify-center gap-1.5 sm:gap-2 mt-2.5 text-[11px] text-gray-500">
                <span class="font-semibold text-gray-400">Populer:</span>
                <a href="{{ route('konsultasi.index') }}?q=kutu+putih" class="bg-white/80 hover:bg-emerald-50 text-gray-700 hover:text-emerald-800 px-2.5 py-1 rounded-full border border-gray-200 transition-colors">
                    🐛 Kutu Putih
                </a>
                <a href="{{ route('konsultasi.index') }}?q=daun+kuning" class="bg-white/80 hover:bg-emerald-50 text-gray-700 hover:text-emerald-800 px-2.5 py-1 rounded-full border border-gray-200 transition-colors">
                    🍂 Daun Kuning
                </a>
                <a href="{{ route('sarana.index') }}" class="bg-white/80 hover:bg-emerald-50 text-gray-700 hover:text-emerald-800 px-2.5 py-1 rounded-full border border-gray-200 transition-colors">
                    🌱 Pupuk Organik
                </a>
                <a href="{{ route('konsultasi.index') }}?q=hidroponik" class="bg-white/80 hover:bg-emerald-50 text-gray-700 hover:text-emerald-800 px-2.5 py-1 rounded-full border border-gray-200 transition-colors">
                    🥬 Hidroponik
                </a>
                <a href="{{ route('kunjungan.index') }}" class="bg-white/80 hover:bg-emerald-50 text-gray-700 hover:text-emerald-800 px-2.5 py-1 rounded-full border border-gray-200 transition-colors">
                    🚜 Cek Lahan
                </a>
            </div>
        </div>

        {{-- ═══════════════════════════════════════════════════════════════════
             HALODOC SIGNATURE CORE SERVICES (6 CLEAN CARDS)
             ═══════════════════════════════════════════════════════════════════ --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 sm:gap-4 mb-4">
            
            {{-- Service 1: Tanya Pakar --}}
            <a href="{{ route('konsultasi.index') }}" 
               class="bg-white hover:bg-[#F9FCF8] rounded-2xl p-4 sm:p-5 border border-[#DEEADE] hover:border-emerald-500 shadow-xs hover:shadow-md transition-all group flex flex-col items-center text-center">
                <div class="w-14 h-14 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-3xl mb-2.5 group-hover:scale-110 transition-transform">
                    💬
                </div>
                <h3 class="font-bold text-gray-900 text-xs sm:text-sm group-hover:text-emerald-800 transition-colors mb-0.5">
                    Tanya Pakar
                </h3>
                <p class="text-[10.5px] text-gray-400 line-clamp-1">
                    Chat &amp; Video Call
                </p>
            </a>

            {{-- Service 2: Toko Sarana Kebun --}}
            <a href="{{ route('sarana.index') }}" 
               class="bg-white hover:bg-[#F9FCF8] rounded-2xl p-4 sm:p-5 border border-[#DEEADE] hover:border-emerald-500 shadow-xs hover:shadow-md transition-all group flex flex-col items-center text-center">
                <div class="w-14 h-14 rounded-2xl bg-blue-50 border border-blue-100 flex items-center justify-center text-3xl mb-2.5 group-hover:scale-110 transition-transform">
                    🛒
                </div>
                <h3 class="font-bold text-gray-900 text-xs sm:text-sm group-hover:text-emerald-800 transition-colors mb-0.5">
                    Toko Sarana
                </h3>
                <p class="text-[10.5px] text-gray-400 line-clamp-1">
                    Bibit &amp; Nutrisi Tanaman
                </p>
            </a>

            {{-- Service 3: Kunjungan Lahan --}}
            <a href="{{ route('kunjungan.index') }}" 
               class="bg-white hover:bg-[#F9FCF8] rounded-2xl p-4 sm:p-5 border border-[#DEEADE] hover:border-emerald-500 shadow-xs hover:shadow-md transition-all group flex flex-col items-center text-center">
                <div class="w-14 h-14 rounded-2xl bg-amber-50 border border-amber-100 flex items-center justify-center text-3xl mb-2.5 group-hover:scale-110 transition-transform">
                    🚜
                </div>
                <h3 class="font-bold text-gray-900 text-xs sm:text-sm group-hover:text-emerald-800 transition-colors mb-0.5">
                    Kunjungan Lahan
                </h3>
                <p class="text-[10.5px] text-gray-400 line-clamp-1">
                    Inspeksi On-Site
                </p>
            </a>

            {{-- Service 4: Undang Narasumber --}}
            <a href="{{ route('narsum.index') }}" 
               class="bg-white hover:bg-[#F9FCF8] rounded-2xl p-4 sm:p-5 border border-[#DEEADE] hover:border-emerald-500 shadow-xs hover:shadow-md transition-all group flex flex-col items-center text-center">
                <div class="w-14 h-14 rounded-2xl bg-purple-50 border border-purple-100 flex items-center justify-center text-3xl mb-2.5 group-hover:scale-110 transition-transform">
                    🎤
                </div>
                <h3 class="font-bold text-gray-900 text-xs sm:text-sm group-hover:text-emerald-800 transition-colors mb-0.5">
                    Undang Narsum
                </h3>
                <p class="text-[10.5px] text-gray-400 line-clamp-1">
                    Pelatihan &amp; Workshop
                </p>
            </a>

            {{-- Service 5: Cuaca Kebun --}}
            <a href="#cuaca-section" 
               class="bg-white hover:bg-[#F9FCF8] rounded-2xl p-4 sm:p-5 border border-[#DEEADE] hover:border-emerald-500 shadow-xs hover:shadow-md transition-all group flex flex-col items-center text-center">
                <div class="w-14 h-14 rounded-2xl bg-sky-50 border border-sky-100 flex items-center justify-center text-3xl mb-2.5 group-hover:scale-110 transition-transform">
                    🌦️
                </div>
                <h3 class="font-bold text-gray-900 text-xs sm:text-sm group-hover:text-emerald-800 transition-colors mb-0.5">
                    Cuaca Kebun
                </h3>
                <p class="text-[10.5px] text-gray-400 line-clamp-1">
                    Advisory Harian
                </p>
            </a>

            {{-- Service 6: Harga Pangan --}}
            <a href="#harga-section" 
               class="bg-white hover:bg-[#F9FCF8] rounded-2xl p-4 sm:p-5 border border-[#DEEADE] hover:border-emerald-500 shadow-xs hover:shadow-md transition-all group flex flex-col items-center text-center">
                <div class="w-14 h-14 rounded-2xl bg-rose-50 border border-rose-100 flex items-center justify-center text-3xl mb-2.5 group-hover:scale-110 transition-transform">
                    📈
                </div>
                <h3 class="font-bold text-gray-900 text-xs sm:text-sm group-hover:text-emerald-800 transition-colors mb-0.5">
                    Harga Pasar
                </h3>
                <p class="text-[10.5px] text-gray-400 line-clamp-1">
                    Komoditas Harian
                </p>
            </a>

        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     2. CEK GEJALA TANAMAN MANDIRI (HALODOC "CEK KESEHATAN MANDIRI")
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section class="py-6 sm:py-8 bg-white border-b border-[#E7EFE6]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-gradient-to-r from-[#EFF6ED] via-[#F8FAF7] to-[#F1F6F0] rounded-3xl p-5 sm:p-6 border border-[#DCE8DB] shadow-xs flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <span class="text-[10px] font-bold text-emerald-800 uppercase tracking-widest block mb-1">
                    🌱 Cek Gejala Mandiri
                </span>
                <h3 class="text-base sm:text-lg font-bold text-gray-900">
                    Tanamanmu Sedang Mengalami Kendala Apa?
                </h3>
                <p class="text-xs text-gray-500 mt-0.5">
                    Pilih gejala untuk langsung menghubungkan Anda ke agronomis yang tepat.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <button type="button" onclick="selectQuickSymptom('Daun Menguning & Layu')" class="symptom-quick-chip bg-white hover:bg-emerald-600 hover:text-white text-gray-700 text-xs font-semibold px-3 py-1.5 rounded-xl border border-gray-200 transition-all flex items-center gap-1.5 shadow-xs">
                    <span>🍂</span> Daun Kuning
                </button>
                <button type="button" onclick="selectQuickSymptom('Serangan Kutu Putih / Kutu Kebul')" class="symptom-quick-chip bg-white hover:bg-emerald-600 hover:text-white text-gray-700 text-xs font-semibold px-3 py-1.5 rounded-xl border border-gray-200 transition-all flex items-center gap-1.5 shadow-xs">
                    <span>🐛</span> Kutu Putih
                </button>
                <button type="button" onclick="selectQuickSymptom('Batang Busuk & Kering')" class="symptom-quick-chip bg-white hover:bg-emerald-600 hover:text-white text-gray-700 text-xs font-semibold px-3 py-1.5 rounded-xl border border-gray-200 transition-all flex items-center gap-1.5 shadow-xs">
                    <span>🥀</span> Batang Busuk
                </button>
                <button type="button" onclick="selectQuickSymptom('Bunga & Buah Rontok Dini')" class="symptom-quick-chip bg-white hover:bg-emerald-600 hover:text-white text-gray-700 text-xs font-semibold px-3 py-1.5 rounded-xl border border-gray-200 transition-all flex items-center gap-1.5 shadow-xs">
                    <span>🍓</span> Buah Rontok
                </button>
                <button type="button" onclick="selectQuickSymptom('Tanah Keras & pH Asam')" class="symptom-quick-chip bg-white hover:bg-emerald-600 hover:text-white text-gray-700 text-xs font-semibold px-3 py-1.5 rounded-xl border border-gray-200 transition-all flex items-center gap-1.5 shadow-xs">
                    <span>🌾</span> Tanah Keras
                </button>
            </div>
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     3. KONSULTASI PAKAR TEPERCAYA (HALODOC DOKTER TEPERCAYA CARDS)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section class="py-10 sm:py-16 bg-[#F8FAF7]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-end justify-between mb-6 sm:mb-8">
            <div>
                <span class="text-xs font-bold text-emerald-800 uppercase tracking-wider block mb-1">
                    Pakar Pertanian Berlisensi
                </span>
                <h2 class="text-xl sm:text-3xl font-extrabold text-[#1F331E] font-serif-title">
                    Konsultasi Spesialis Tepercaya
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 mt-0.5">
                    Praktisi agronomis teruji yang siap membantu diagnosa dan perawatan tanaman Anda.
                </p>
            </div>

            <a href="{{ route('konsultasi.index') }}" class="text-xs sm:text-sm font-bold text-emerald-800 hover:underline flex items-center gap-1">
                <span>Lihat Semua</span>
                <span>→</span>
            </a>
        </div>

        {{-- Consultant Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @forelse($konsultanFeatured as $konsultan)
            <div class="bg-white rounded-3xl p-5 border border-[#DEEADE] hover:border-emerald-500 shadow-xs hover:shadow-md transition-all flex flex-col justify-between group">
                <div>
                    {{-- Doctor/Consultant Header --}}
                    <div class="flex items-start gap-3.5 mb-3.5">
                        <div class="w-14 h-14 rounded-2xl bg-emerald-100/70 border border-emerald-200 flex items-center justify-center text-2xl font-bold text-emerald-900 flex-shrink-0">
                            {{ substr($konsultan->user->name, 0, 1) }}
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="flex items-center gap-1">
                                <h3 class="font-bold text-gray-900 text-sm sm:text-base truncate group-hover:text-emerald-800 transition-colors">
                                    {{ $konsultan->user->name }}
                                </h3>
                                <span class="text-emerald-600 text-xs" title="Terverifikasi">✓</span>
                            </div>
                            <span class="inline-block text-[11px] font-semibold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-md mt-0.5">
                                {{ $konsultan->spesialisasi }}
                            </span>
                            <div class="flex items-center gap-2 mt-1 text-xs text-gray-500">
                                <span class="text-amber-500 font-bold">⭐ {{ number_format($konsultan->rating, 1) }}</span>
                                <span>•</span>
                                <span>{{ $konsultan->total_konsultasi }} sesi</span>
                            </div>
                        </div>
                    </div>

                    {{-- Bio snippet --}}
                    <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed mb-4">
                        {{ $konsultan->bio ?? 'Praktisi agrikultur siap mendampingi perawatan tanaman hias, sayuran, dan penanganan hama secara presisi.' }}
                    </p>
                </div>

                {{-- Price & CTA Button --}}
                <div class="pt-3 border-t border-gray-100 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] text-gray-400 block font-medium">Biaya Konsultasi</span>
                        <span class="font-black text-emerald-950 text-sm sm:text-base">
                            Rp {{ number_format($konsultan->harga_per_sesi, 0, ',', '.') }}
                        </span>
                    </div>
                    <a href="{{ route('konsultasi.show', $konsultan) }}" 
                       class="px-4 py-2 rounded-xl bg-[#2E4A2C] hover:bg-[#20371E] text-white text-xs font-bold transition-all shadow-xs flex items-center gap-1">
                        <span>Chat Sekarang</span>
                        <span>→</span>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-8 bg-white rounded-3xl border border-gray-200">
                <p class="text-gray-500 text-sm">Konsultan belum tersedia.</p>
            </div>
            @endforelse
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     4. SMART CUACA KEBUN (HALODOC WIDGET INFORMASI)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section id="cuaca-section" class="py-10 sm:py-14 bg-white border-y border-[#E3EBE1]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-gradient-to-br from-[#F4F8F3] to-[#EAF2E8] rounded-3xl p-6 sm:p-8 border border-[#D5E5D2] shadow-xs">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
                
                {{-- Weather Summary --}}
                <div class="lg:col-span-5">
                    <span class="text-xs font-bold text-emerald-800 uppercase tracking-widest block mb-1">
                        🌦️ Cuaca Kebun Hari Ini
                    </span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-2">
                        Prakiraan &amp; Kondisi Iklim Mikro
                    </h3>
                    <p class="text-xs text-gray-600 mb-4 leading-relaxed">
                        Data cuaca aktual untuk memastikan waktu siram dan pemupukan tepat sasaran.
                    </p>

                    <div class="flex items-center gap-4 bg-white/90 p-4 rounded-2xl border border-emerald-100 shadow-xs">
                        <span class="text-4xl">⛅</span>
                        <div>
                            <div class="text-2xl font-black text-gray-900">29°C</div>
                            <div class="text-xs font-semibold text-gray-500">Cerah Berawan • Kelembaban 74%</div>
                        </div>
                    </div>
                </div>

                {{-- Agronomy Advisory Note --}}
                <div class="lg:col-span-7 bg-white/90 p-5 rounded-2xl border border-[#DFEBDE] shadow-xs">
                    <div class="flex items-center gap-2 text-xs font-bold text-emerald-900 mb-2">
                        <span>💡</span>
                        <span>Rekomendasi Agronomi Hari Ini:</span>
                    </div>
                    <p class="text-xs text-gray-700 leading-relaxed mb-3">
                        Kondisi pagi hari (06:30 - 09:30 WIB) sangat optimal untuk aplikasi pupuk organik cair dan asam amino pada daun. Stomata terbuka maksimal dan penyerapan nutrisi berlangsung efisien tanpa risiko daun terbakar.
                    </p>
                    <div class="flex items-center justify-between pt-3 border-t border-gray-100 text-xs">
                        <span class="text-gray-400">Ditinjau oleh Tim Agronomi Hallobun</span>
                        <a href="{{ route('konsultasi.index') }}" class="font-bold text-emerald-800 hover:underline">
                            Tanya Dosis Pupuk →
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     5. TOKO SARANA & NUTRISI TANAMAN (HALODOC BELI OBAT STYLE)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section class="py-10 sm:py-16 bg-[#F8FAF7]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-end justify-between mb-6 sm:mb-8">
            <div>
                <span class="text-xs font-bold text-emerald-800 uppercase tracking-wider block mb-1">
                    Toko Sarana Teruji
                </span>
                <h2 class="text-xl sm:text-3xl font-extrabold text-[#1F331E] font-serif-title">
                    Beli Bibit, Pupuk &amp; Suplemen Tanaman
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 mt-0.5">
                    Produk agrikultur kualitas pilihan yang direkomendasikan langsung oleh praktisi.
                </p>
            </div>

            <a href="{{ route('sarana.index') }}" class="text-xs sm:text-sm font-bold text-emerald-800 hover:underline flex items-center gap-1">
                <span>Lihat Semua Produk</span>
                <span>→</span>
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            @forelse($saranaFeatured as $sarana)
            <div class="bg-white rounded-3xl border border-[#DEEADE] hover:border-emerald-500 overflow-hidden shadow-xs hover:shadow-md transition-all flex flex-col justify-between group">
                <div class="aspect-square bg-emerald-50 relative overflow-hidden flex items-center justify-center">
                    @if($sarana->foto)
                    <img src="{{ asset('storage/' . $sarana->foto) }}" alt="{{ $sarana->nama }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                    <span class="text-5xl">🪴</span>
                    @endif
                    <span class="absolute top-2.5 left-2.5 bg-white/95 text-emerald-900 text-[10px] font-bold px-2.5 py-0.5 rounded-full border border-gray-200">
                        {{ $sarana->kategori ?? 'Sarana' }}
                    </span>
                </div>
                <div class="p-4 flex flex-col flex-1 justify-between">
                    <div>
                        <h4 class="font-bold text-gray-900 text-xs sm:text-sm line-clamp-2 mb-1 group-hover:text-emerald-800 transition-colors">
                            {{ $sarana->nama }}
                        </h4>
                        <div class="flex items-center gap-1 text-[11px] text-amber-500 mb-2">
                            <span>⭐</span>
                            <span class="font-semibold text-gray-700">4.9</span>
                            <span class="text-gray-400">• Teruji</span>
                        </div>
                    </div>
                    <div class="pt-2 border-t border-gray-100 flex items-center justify-between">
                        <span class="font-black text-sm sm:text-base text-[#1F331E]">
                            Rp {{ number_format($sarana->harga, 0, ',', '.') }}
                        </span>
                        <a href="{{ route('sarana.show', $sarana) }}" class="px-3 py-1.5 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-emerald-800 text-xs font-bold transition-colors">
                            Beli
                        </a>
                    </div>
                </div>
            </div>
            @empty
            @foreach([
                ['nama' => 'Pupuk Organik Hayati Trichoderma', 'kat' => 'Pupuk', 'harga' => 45000, 'icon' => '🌿'],
                ['nama' => 'Benih Cabai Rawit Unggul Tahan Virus', 'kat' => 'Bibit', 'harga' => 28000, 'icon' => '🌶️'],
                ['nama' => 'Nutrisi Sayuran Daun Hidroponik AB Mix', 'kat' => 'Nutrisi', 'harga' => 38000, 'icon' => '🧪'],
                ['nama' => 'Sprayer Tanaman 2 Liter Nozzle Kuningan', 'kat' => 'Alat', 'harga' => 62000, 'icon' => '🪴'],
            ] as $mock)
            <div class="bg-white rounded-3xl border border-[#DEEADE] hover:border-emerald-500 overflow-hidden shadow-xs hover:shadow-md transition-all flex flex-col justify-between group">
                <div class="aspect-square bg-emerald-50/50 flex items-center justify-center text-5xl group-hover:scale-105 transition-transform">
                    {{ $mock['icon'] }}
                </div>
                <div class="p-4 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="inline-block text-[10px] font-bold text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded-md mb-1">
                            {{ $mock['kat'] }}
                        </span>
                        <h4 class="font-bold text-gray-900 text-xs sm:text-sm line-clamp-2 mb-1">
                            {{ $mock['nama'] }}
                        </h4>
                    </div>
                    <div class="pt-2 border-t border-gray-100 flex items-center justify-between">
                        <span class="font-black text-sm sm:text-base text-[#1F331E]">
                            Rp {{ number_format($mock['harga'], 0, ',', '.') }}
                        </span>
                        <a href="{{ route('sarana.index') }}" class="px-3 py-1.5 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-emerald-800 text-xs font-bold transition-colors">
                            Beli
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            @endforelse
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     6. PANTAUAN HARGA PASAR HARI INI
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section id="harga-section" class="py-10 sm:py-14 bg-white border-y border-[#E3EBE1]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-end justify-between mb-6">
            <div>
                <span class="text-xs font-bold text-emerald-800 uppercase tracking-wider block mb-1">
                    📊 Info Pasar
                </span>
                <h2 class="text-xl sm:text-2xl font-extrabold text-[#1F331E] font-serif-title">
                    Harga Komoditas Pertanian Terkini
                </h2>
            </div>
            <span class="text-xs text-gray-400 font-medium">Update harian pasar nasional</span>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
            @foreach($hargaPangan as $pangan)
            <div class="bg-[#F8FAF7] rounded-2xl p-3.5 border border-[#DEEADE] text-center flex flex-col justify-between">
                <div>
                    <div class="text-2xl mb-1">{{ $pangan['icon'] }}</div>
                    <h4 class="font-bold text-gray-900 text-xs truncate">{{ $pangan['komoditas'] }}</h4>
                    <span class="text-[10px] text-gray-400">per {{ $pangan['satuan'] }}</span>
                </div>
                <div class="mt-2 pt-2 border-t border-gray-200">
                    <div class="font-black text-xs sm:text-sm text-gray-900">
                        Rp {{ number_format($pangan['harga'], 0, ',', '.') }}
                    </div>
                    @if($pangan['trend'] === 'up')
                    <span class="text-[10px] font-bold text-emerald-700">▲ {{ $pangan['perubahan'] }}</span>
                    @elseif($pangan['trend'] === 'down')
                    <span class="text-[10px] font-bold text-rose-700">▼ {{ $pangan['perubahan'] }}</span>
                    @else
                    <span class="text-[10px] font-bold text-gray-500">▬ Stabil</span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     7. ARTIKEL & TIPS KEBUN (HALODOC BACA ARTIKEL KESEHATAN)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section class="py-10 sm:py-16 bg-[#F8FAF7]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-end justify-between mb-6 sm:mb-8">
            <div>
                <span class="text-xs font-bold text-emerald-800 uppercase tracking-wider block mb-1">
                    Literasi &amp; Edukasi
                </span>
                <h2 class="text-xl sm:text-3xl font-extrabold text-[#1F331E] font-serif-title">
                    Baca Artikel &amp; Tips Berkebun
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 mt-0.5">
                    Informasi dan teknik budidaya yang ditinjau langsung oleh agronomis.
                </p>
            </div>

            <a href="{{ route('layanan') }}" class="text-xs sm:text-sm font-bold text-emerald-800 hover:underline flex items-center gap-1">
                <span>Lihat Semua Artikel</span>
                <span>→</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($beritaTani as $berita)
            <div class="bg-white rounded-3xl border border-[#DEEADE] overflow-hidden shadow-xs hover:shadow-md transition-all flex flex-col justify-between group">
                <div>
                    <div class="aspect-[16/9] bg-emerald-100 overflow-hidden relative">
                        <img src="{{ $berita['image'] }}" alt="{{ $berita['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <span class="absolute top-3 left-3 bg-white/95 text-emerald-900 text-[10px] font-bold px-2.5 py-0.5 rounded-full border border-gray-200">
                            {{ $berita['tag'] }}
                        </span>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 text-[11px] text-gray-400 mb-2">
                            <span>{{ $berita['date'] }}</span>
                            <span>•</span>
                            <span>{{ $berita['read_time'] }}</span>
                        </div>
                        <h3 class="font-bold text-gray-900 text-sm sm:text-base leading-snug group-hover:text-emerald-800 transition-colors mb-2">
                            {{ $berita['title'] }}
                        </h3>
                        <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed">
                            {{ $berita['excerpt'] }}
                        </p>
                    </div>
                </div>
                <div class="px-5 pb-4 pt-2 border-t border-gray-100 flex items-center justify-between text-xs">
                    <span class="text-gray-400 font-medium">✍️ {{ $berita['author'] }}</span>
                    <a href="{{ route('konsultasi.index') }}" class="font-bold text-emerald-800 hover:underline">
                        Baca →
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     8. JAMINAN KUALITAS & STANDAR MUTU (HALODOC MEDICAL EXCELLENCE)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section class="py-10 sm:py-14 bg-white border-t border-[#E3EBE1]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        
        <div class="max-w-xl mx-auto mb-8">
            <span class="text-xs font-bold text-emerald-800 uppercase tracking-widest block mb-1">
                Jaminan Kualitas Layanan
            </span>
            <h3 class="text-xl sm:text-2xl font-bold text-gray-900">
                Standar Mutu Agronomi Hallobun
            </h3>
            <p class="text-xs text-gray-500 mt-1">
                Setiap prosedur konsultasi dan rekomendasi produk dipastikan aman, ramah lingkungan, dan teruji.
            </p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="p-4 rounded-2xl bg-[#F8FAF7] border border-[#DEEADE]">
                <div class="text-2xl mb-2">🛡️</div>
                <div class="font-bold text-gray-900 text-xs sm:text-sm">Praktisi Berlisensi</div>
                <div class="text-[11px] text-gray-400 mt-0.5">Tersertifikasi kompetensi</div>
            </div>
            <div class="p-4 rounded-2xl bg-[#F8FAF7] border border-[#DEEADE]">
                <div class="text-2xl mb-2">🌿</div>
                <div class="font-bold text-gray-900 text-xs sm:text-sm">Solusi Hayati &amp; Alami</div>
                <div class="text-[11px] text-gray-400 mt-0.5">Aman untuk pangan keluarga</div>
            </div>
            <div class="p-4 rounded-2xl bg-[#F8FAF7] border border-[#DEEADE]">
                <div class="text-2xl mb-2">⚡</div>
                <div class="font-bold text-gray-900 text-xs sm:text-sm">Respons Cepat</div>
                <div class="text-[11px] text-gray-400 mt-0.5">Jadwal fleksibel tanpa antre</div>
            </div>
            <div class="p-4 rounded-2xl bg-[#F8FAF7] border border-[#DEEADE]">
                <div class="text-2xl mb-2">💬</div>
                <div class="font-bold text-gray-900 text-xs sm:text-sm">Follow-up Terpadu</div>
                <div class="text-[11px] text-gray-400 mt-0.5">Evaluasi berkala kebunmu</div>
            </div>
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     9. TESTIMONI PENGGUNA (HALODOC KATA MEREKA)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section class="py-10 sm:py-14 bg-[#F8FAF7] border-t border-[#E3EBE1]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-xl mx-auto mb-8">
            <span class="text-xs font-bold text-emerald-800 uppercase tracking-wider block mb-1">
                Kata Mereka
            </span>
            <h3 class="text-xl sm:text-2xl font-bold text-gray-900">
                Dipercaya Komunitas Pekebun Indonesia
            </h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            @foreach($testimonials as $testi)
            <div class="bg-white p-5 rounded-3xl border border-[#DEEADE] shadow-xs flex flex-col justify-between">
                <div>
                    <div class="text-amber-500 text-xs mb-2">★★★★★</div>
                    <p class="text-xs text-gray-600 leading-relaxed italic mb-3">
                        “{{ $testi['comment'] }}”
                    </p>
                </div>
                <div class="pt-3 border-t border-gray-100 flex items-center gap-2.5">
                    <span class="text-2xl">{{ $testi['avatar'] }}</span>
                    <div>
                        <div class="font-bold text-gray-900 text-xs">{{ $testi['name'] }}</div>
                        <div class="text-[10.5px] text-gray-400">{{ $testi['role'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

@push('scripts')
<script>
    var homeAdminWa = "{{ preg_replace('/[^0-9]/', '', config('hallobun.admin_phone', '6281234567890')) }}";

    function selectQuickSymptom(symptom) {
        var msg = encodeURIComponent("Halo Hallobun, tanaman saya mengalami kendala: " + symptom + ". Mohon rekomendasi agronomis yang cocok untuk konsultasi 🙏");
        window.location.href = "https://wa.me/" + homeAdminWa + "?text=" + msg;
    }

    // Enter key support on search bar
    document.addEventListener('DOMContentLoaded', function() {
        var input = document.getElementById('homeSearchInput');
        if (input) {
            input.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    var q = encodeURIComponent(input.value.trim());
                    if (q) {
                        window.location.href = "{{ route('konsultasi.index') }}?q=" + q;
                    }
                }
            });
        }
    });
</script>
@endpush

@endsection
