@extends('layouts.app')

@section('title', 'Solusi Perawatan Kebun & Pertanian Terlengkap')
@section('meta_description', 'Platform tele-agronomi dan perawatan kebun terlengkap. Chat dokter tanaman, beli sarana & pupuk, hingga undang narasumber dan kunjungan lahan.')

@section('content')

{{-- ═══════════════════════════════════════════════════════════════════════════
     1. HERO SECTION (HALODOC CLEAN RED & WHITE THEME)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section class="bg-white pt-6 sm:pt-10 pb-8 sm:pb-12 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- 2-Column Hero: Copy & Search (Left) + Halodoc 3D Plant Doctor Illustration (Right) --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center mb-10 sm:mb-12">
            
            {{-- Left Column: Copy & Search --}}
            <div class="lg:col-span-7 text-left">
                <div class="inline-flex items-center gap-2 bg-[#FFF0F5] border border-[#FFD1DF] px-3.5 py-1 rounded-full mb-3.5 shadow-2xs">
                    <span class="w-2 h-2 rounded-full bg-[#E0004D] animate-pulse"></span>
                    <span class="text-[11px] sm:text-xs font-bold text-[#E0004D] tracking-wide uppercase">
                        Tele-Agronomi &amp; Layanan Kebun #1 Indonesia
                    </span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight leading-[1.18] mb-3.5">
                    Solusi Perawatan Kebun &amp; Pertanian<br>
                    <span class="text-[#E0004D]">Terlengkap di Tanganmu</span>
                </h1>

                <p class="text-xs sm:text-base text-gray-600 leading-relaxed max-w-xl mb-6">
                    Chat dokter tanaman terpercaya, beli nutrisi &amp; bibit unggul, hingga booking kunjungan lapangan langsung ke kebun Anda. Praktis, ilmiah, dan ramah pemula.
                </p>

                {{-- Halodoc Signature Clean Search Bar --}}
                <div class="mb-4">
                    <form action="{{ route('konsultasi.index') }}" method="GET" class="bg-white rounded-2xl sm:rounded-full p-2 border border-gray-200 shadow-sm flex flex-col sm:flex-row items-center gap-2 transition-all focus-within:border-[#E0004D] focus-within:ring-2 focus-within:ring-[#FFF0F5]">
                        <div class="flex items-center gap-2.5 flex-1 px-3 w-full">
                            <svg class="w-5 h-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <input type="text" 
                                   name="search"
                                   id="homeSearchInput"
                                   placeholder="Cari dokter kebun, hama kutu kebul, pupuk NPK..."
                                   class="w-full bg-transparent border-none text-xs sm:text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-0 py-1.5">
                        </div>
                        <button type="submit" 
                                class="w-full sm:w-auto px-6 py-2.5 rounded-xl sm:rounded-full bg-[#E0004D] hover:bg-[#C70044] text-white text-xs sm:text-sm font-bold text-center transition-all shadow-xs flex-shrink-0 active:scale-95">
                            Cari Solusi
                        </button>
                    </form>

                    {{-- Popular Search Chips --}}
                    <div class="flex flex-wrap items-center gap-1.5 sm:gap-2 mt-3 text-[11px] text-gray-500">
                        <span class="font-semibold text-gray-400">Populer:</span>
                        <a href="{{ route('konsultasi.index') }}?search=kutu+putih" class="bg-gray-50 hover:bg-[#FFF0F5] hover:text-[#E0004D] hover:border-[#FFD1DF] text-gray-600 px-3 py-1 rounded-full border border-gray-200 transition-colors">
                            🐛 Kutu Putih
                        </a>
                        <a href="{{ route('konsultasi.index') }}?search=daun+kuning" class="bg-gray-50 hover:bg-[#FFF0F5] hover:text-[#E0004D] hover:border-[#FFD1DF] text-gray-600 px-3 py-1 rounded-full border border-gray-200 transition-colors">
                            🍂 Daun Kuning
                        </a>
                        <a href="{{ route('sarana.index') }}" class="bg-gray-50 hover:bg-[#FFF0F5] hover:text-[#E0004D] hover:border-[#FFD1DF] text-gray-600 px-3 py-1 rounded-full border border-gray-200 transition-colors">
                            🌱 Pupuk Organik
                        </a>
                        <a href="{{ route('konsultasi.index') }}?search=hidroponik" class="bg-gray-50 hover:bg-[#FFF0F5] hover:text-[#E0004D] hover:border-[#FFD1DF] text-gray-600 px-3 py-1 rounded-full border border-gray-200 transition-colors">
                            🥬 Hidroponik
                        </a>
                    </div>
                </div>

                {{-- Fast Trust Highlights --}}
                <div class="flex flex-wrap items-center gap-4 sm:gap-6 pt-3 text-xs text-gray-500 font-medium">
                    <span class="flex items-center gap-1.5">
                        <span class="text-emerald-500 font-bold">✓</span> Respon Cepat &lt; 5 Menit
                    </span>
                    <span class="flex items-center gap-1.5">
                        <span class="text-emerald-500 font-bold">✓</span> 150+ Dokter Tanaman
                    </span>
                    <span class="flex items-center gap-1.5">
                        <span class="text-emerald-500 font-bold">✓</span> Tarif Mulai Rp 25.000
                    </span>
                </div>
            </div>

            {{-- Right Column: 3D Halodoc Agronomist Illustration --}}
            <div class="lg:col-span-5 flex justify-center">
                <div class="relative w-full max-w-md lg:max-w-none">
                    {{-- Decorative Subtle Aura --}}
                    <div class="absolute -inset-2 bg-gradient-to-r from-[#FFF0F5] to-emerald-50 rounded-3xl blur-xl opacity-70"></div>
                    
                    {{-- Main 3D Card --}}
                    <div class="relative bg-white rounded-3xl p-3 sm:p-4 border border-gray-200/80 shadow-md">
                        <img src="/images/halobun_hero_halodoc.jpg" 
                             alt="Dokter Tanaman &amp; Konsultasi Kebun Halobun" 
                             class="w-full h-auto rounded-2xl object-cover shadow-2xs select-none"
                             loading="eager">
                        
                        {{-- Floating Mini Badge --}}
                        <div class="absolute -bottom-3 left-6 sm:left-8 bg-white/95 backdrop-blur-md px-4 py-2 rounded-2xl border border-gray-100 shadow-lg flex items-center gap-2.5">
                            <span class="w-3 h-3 rounded-full bg-emerald-500 animate-pulse flex-shrink-0"></span>
                            <div class="text-left">
                                <p class="text-[11px] font-bold text-gray-900 leading-tight">Dokter Tanaman Aktif</p>
                                <p class="text-[9.5px] text-[#E0004D] font-semibold leading-tight">Bimbingan Diagnosa Online</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- ═══════════════════════════════════════════════════════════════════
             HALODOC SIGNATURE 6 CORE SERVICES GRID
             ═══════════════════════════════════════════════════════════════════ --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 sm:gap-4 mb-2">
            
            {{-- Service 1: Chat Dokter / Tanya Pakar --}}
            <a href="{{ route('konsultasi.index') }}" 
               class="bg-white hover:bg-gray-50/80 rounded-2xl p-4 sm:p-5 border border-gray-200/90 hover:border-[#E0004D]/40 shadow-xs hover:shadow-md transition-all group flex flex-col items-center text-center">
                <div class="w-14 h-14 rounded-2xl bg-[#FFF0F5] border border-[#FFD1DF] flex items-center justify-center text-2xl mb-2.5 group-hover:scale-110 transition-transform">
                    💬
                </div>
                <h3 class="font-bold text-gray-900 text-xs sm:text-sm group-hover:text-[#E0004D] transition-colors mb-0.5">
                    Tanya Pakar
                </h3>
                <p class="text-[11px] text-gray-500 line-clamp-1">
                    Chat &amp; Video Call
                </p>
            </a>

            {{-- Service 2: Toko Sarana Kebun --}}
            <a href="{{ route('sarana.index') }}" 
               class="bg-white hover:bg-gray-50/80 rounded-2xl p-4 sm:p-5 border border-gray-200/90 hover:border-blue-400 shadow-xs hover:shadow-md transition-all group flex flex-col items-center text-center">
                <div class="w-14 h-14 rounded-2xl bg-blue-50 border border-blue-100 flex items-center justify-center text-2xl mb-2.5 group-hover:scale-110 transition-transform">
                    🛒
                </div>
                <h3 class="font-bold text-gray-900 text-xs sm:text-sm group-hover:text-blue-600 transition-colors mb-0.5">
                    Toko Sarana
                </h3>
                <p class="text-[11px] text-gray-500 line-clamp-1">
                    Bibit &amp; Pupuk
                </p>
            </a>

            {{-- Service 3: Kunjungan Lahan --}}
            <a href="{{ route('kunjungan.index') }}" 
               class="bg-white hover:bg-gray-50/80 rounded-2xl p-4 sm:p-5 border border-gray-200/90 hover:border-amber-400 shadow-xs hover:shadow-md transition-all group flex flex-col items-center text-center">
                <div class="w-14 h-14 rounded-2xl bg-amber-50 border border-amber-100 flex items-center justify-center text-2xl mb-2.5 group-hover:scale-110 transition-transform">
                    🚜
                </div>
                <h3 class="font-bold text-gray-900 text-xs sm:text-sm group-hover:text-amber-700 transition-colors mb-0.5">
                    Kunjungan Lahan
                </h3>
                <p class="text-[11px] text-gray-500 line-clamp-1">
                    Inspeksi On-Site
                </p>
            </a>

            {{-- Service 4: Undang Narasumber --}}
            <a href="{{ route('narsum.index') }}" 
               class="bg-white hover:bg-gray-50/80 rounded-2xl p-4 sm:p-5 border border-gray-200/90 hover:border-purple-400 shadow-xs hover:shadow-md transition-all group flex flex-col items-center text-center">
                <div class="w-14 h-14 rounded-2xl bg-purple-50 border border-purple-100 flex items-center justify-center text-2xl mb-2.5 group-hover:scale-110 transition-transform">
                    🎤
                </div>
                <h3 class="font-bold text-gray-900 text-xs sm:text-sm group-hover:text-purple-700 transition-colors mb-0.5">
                    Undang Narsum
                </h3>
                <p class="text-[11px] text-gray-500 line-clamp-1">
                    Pelatihan &amp; Bimtek
                </p>
            </a>

            {{-- Service 5: Cek Gejala Mandiri --}}
            <a href="#cek-gejala" 
               class="bg-white hover:bg-gray-50/80 rounded-2xl p-4 sm:p-5 border border-gray-200/90 hover:border-emerald-400 shadow-xs hover:shadow-md transition-all group flex flex-col items-center text-center">
                <div class="w-14 h-14 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-2xl mb-2.5 group-hover:scale-110 transition-transform">
                    🔬
                </div>
                <h3 class="font-bold text-gray-900 text-xs sm:text-sm group-hover:text-emerald-700 transition-colors mb-0.5">
                    Cek Gejala
                </h3>
                <p class="text-[11px] text-gray-500 line-clamp-1">
                    Diagnosa Mandiri
                </p>
            </a>

            {{-- Service 6: Cuaca & Rekomendasi --}}
            <a href="#cuaca-pasar" 
               class="bg-white hover:bg-gray-50/80 rounded-2xl p-4 sm:p-5 border border-gray-200/90 hover:border-orange-400 shadow-xs hover:shadow-md transition-all group flex flex-col items-center text-center">
                <div class="w-14 h-14 rounded-2xl bg-orange-50 border border-orange-100 flex items-center justify-center text-2xl mb-2.5 group-hover:scale-110 transition-transform">
                    🌦️
                </div>
                <h3 class="font-bold text-gray-900 text-xs sm:text-sm group-hover:text-orange-700 transition-colors mb-0.5">
                    Cuaca &amp; Pasar
                </h3>
                <p class="text-[11px] text-gray-500 line-clamp-1">
                    Prakiraan Kebun
                </p>
            </a>

        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     2. REKOMENDASI PAKAR AGRONOMI (HALODOC DOCTOR CARD STYLE)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section class="py-10 sm:py-14 bg-[#F8F9FA] border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-end justify-between mb-6">
            <div>
                <span class="text-xs font-bold text-[#E0004D] uppercase tracking-wider">Praktisi &amp; Agronomis Pilihan</span>
                <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mt-1">Konsultasi dengan Dokter Tanaman</h2>
                <p class="text-xs sm:text-sm text-gray-500 mt-0.5">Respon cepat via video call atau chat untuk solusi penyakit &amp; perawatan tanaman.</p>
            </div>
            <a href="{{ route('konsultasi.index') }}" 
               class="text-xs sm:text-sm font-bold text-[#E0004D] hover:text-[#C70044] flex items-center gap-1 transition-colors flex-shrink-0">
                Lihat Semua Pakar <span class="text-base">→</span>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">
            @forelse($konsultanFeatured as $k)
            <div class="bg-white rounded-2xl p-5 border border-gray-200/90 hover:border-[#E0004D]/30 shadow-xs hover:shadow-md transition-all flex flex-col justify-between group">
                
                <div>
                    {{-- Top: Avatar & Info --}}
                    <div class="flex items-start gap-3.5 mb-3.5">
                        <div class="relative flex-shrink-0">
                            @if($k->user->avatar_url ?? false)
                                <img src="{{ $k->user->avatar_url }}" alt="{{ $k->user->name }}" class="w-14 h-14 rounded-2xl object-cover border border-gray-100 shadow-2xs">
                            @else
                                <div class="w-14 h-14 rounded-2xl bg-[#FFF0F5] border border-[#FFD1DF] flex items-center justify-center text-[#E0004D] font-extrabold text-xl shadow-2xs">
                                    {{ substr($k->user->name, 0, 1) }}
                                </div>
                            @endif
                            <span class="absolute -bottom-1 -right-1 w-3.5 h-3.5 rounded-full bg-emerald-500 border-2 border-white" title="Online &amp; Siap Melayani"></span>
                        </div>

                        <div class="min-w-0 flex-1">
                            <div class="flex items-center gap-1.5">
                                <h3 class="font-bold text-gray-900 text-sm sm:text-base truncate group-hover:text-[#E0004D] transition-colors">
                                    {{ $k->user->name }}
                                </h3>
                                <span class="text-[#E0004D] text-xs" title="Terverifikasi">✓</span>
                            </div>
                            <p class="text-xs text-gray-500 truncate mt-0.5">{{ $k->spesialisasi }}</p>
                            
                            {{-- Rating & Total Sesi --}}
                            <div class="flex items-center gap-2 mt-1.5 text-xs text-gray-500">
                                <span class="flex items-center gap-1 text-amber-500 font-bold">
                                    ⭐ {{ number_format($k->rating, 1) }}
                                </span>
                                <span class="text-gray-300">·</span>
                                <span>{{ $k->total_konsultasi }} sesi</span>
                                <span class="text-gray-300">·</span>
                                <span>{{ $k->durasi_menit }} mnt</span>
                            </div>
                        </div>
                    </div>

                    {{-- Short Bio --}}
                    @if($k->bio)
                    <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed mb-4">
                        {{ $k->bio }}
                    </p>
                    @endif
                </div>

                {{-- Bottom Price & Action (Halodoc Outlined Red Button) --}}
                <div class="pt-3 border-t border-gray-100 flex items-center justify-between mt-auto">
                    <div>
                        <span class="text-[10px] text-gray-400 block">Tarif Konsultasi</span>
                        <span class="font-extrabold text-sm sm:text-base text-gray-900">
                            Rp {{ number_format($k->harga_per_sesi, 0, ',', '.') }}
                        </span>
                    </div>

                    <a href="{{ route('konsultasi.show', $k->id) }}" 
                       class="border border-[#E0004D] text-[#E0004D] hover:bg-[#E0004D] hover:text-white font-bold text-xs sm:text-sm px-5 py-2 rounded-xl transition-all active:scale-95 shadow-2xs">
                        Chat
                    </a>
                </div>

            </div>
            @empty
            <div class="col-span-full text-center py-12 bg-white rounded-2xl border border-gray-200">
                <span class="text-4xl mb-2 block">🌱</span>
                <p class="text-gray-500 text-sm">Belum ada profil pakar aktif saat ini.</p>
            </div>
            @endforelse
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     3. CEK GEJALA MANDIRI (HALODOC-STYLE SYMPTOM TRIAGE)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section id="cek-gejala" class="py-12 sm:py-16 bg-white border-b border-gray-100" x-data="{
    activeTab: 'kuning',
    symptoms: {
        'kuning': {
            title: 'Daun Menguning (Klorosis)',
            penyebab: 'Kekurangan unsur hara Nitrogen (N) atau overwatering yang menyebabkan akar kekurangan oksigen.',
            solusi: 'Kurangi intensitas penyiraman, cek drainase pot, dan berikan pupuk NPK seimbang atau pupuk organik cair tinggi N.',
            query: 'daun kuning'
        },
        'kutu': {
            title: 'Hama Kutu Putih / Kutu Kebul',
            penyebab: 'Serangan koloni kutu di balik daun yang menghisap cairan tanaman dan meninggalkan embun jelaga.',
            solusi: 'Semprot larutan sabun nabati (neem oil) atau insektisida organik setiap 3 hari sekali pada sore hari.',
            query: 'kutu putih'
        },
        'busuk': {
            title: 'Busuk Batang &amp; Rebah Semai',
            penyebab: 'Infeksi jamur Phytophthora atau Fusarium akibat kelembaban media tanam terlalu tinggi.',
            solusi: 'Pangkas bagian batang yang terinfeksi, oleskan fungisida tembaga atau arang aktif, dan jemur media tanam.',
            query: 'busuk batang'
        },
        'rontok': {
            title: 'Bunga &amp; Buah Rontok',
            penyebab: 'Kekurangan unsur Kalsium (Ca) dan Boron (B), atau fluktuasi suhu dan kelembaban ekstrem.',
            solusi: 'Aplikasi pupuk kalsium-nitrat (CN) atau pupuk mikro organik untuk memperkuat tangkai bunga dan buah.',
            query: 'buah rontok'
        },
        'tanah': {
            title: 'Tanah Padat &amp; Keras',
            penyebab: 'Kandungan bahan organik rendah dan pemakaian pupuk kimia sintetis berlebih dalam jangka panjang.',
            solusi: 'Gemburkan tanah perlahan, tambahkan pupuk kompos matang, asam humat, dan biang cacing tanah.',
            query: 'tanah padat'
        }
    }
}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-8 sm:mb-10">
            <span class="text-xs font-bold text-[#E0004D] uppercase tracking-wider">Diagnosa Mandiri</span>
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mt-1">Cek Gejala Masalah Tanaman</h2>
            <p class="text-xs sm:text-sm text-gray-500 mt-1">Pilih keluhan yang terjadi pada tanaman Anda untuk melihat analisa awal dan rekomendasi penanganan.</p>
        </div>

        {{-- Symptom Tabs --}}
        <div class="flex flex-wrap items-center justify-center gap-2 mb-6">
            <button type="button" 
                    @click="activeTab = 'kuning'"
                    :class="activeTab === 'kuning' ? 'bg-[#E0004D] text-white border-[#E0004D]' : 'bg-gray-50 text-gray-700 border-gray-200 hover:bg-gray-100'"
                    class="px-4 py-2 rounded-full text-xs sm:text-sm font-semibold border transition-all">
                🍂 Daun Kuning
            </button>
            <button type="button" 
                    @click="activeTab = 'kutu'"
                    :class="activeTab === 'kutu' ? 'bg-[#E0004D] text-white border-[#E0004D]' : 'bg-gray-50 text-gray-700 border-gray-200 hover:bg-gray-100'"
                    class="px-4 py-2 rounded-full text-xs sm:text-sm font-semibold border transition-all">
                🐛 Kutu Putih
            </button>
            <button type="button" 
                    @click="activeTab = 'busuk'"
                    :class="activeTab === 'busuk' ? 'bg-[#E0004D] text-white border-[#E0004D]' : 'bg-gray-50 text-gray-700 border-gray-200 hover:bg-gray-100'"
                    class="px-4 py-2 rounded-full text-xs sm:text-sm font-semibold border transition-all">
                🍄 Busuk Batang
            </button>
            <button type="button" 
                    @click="activeTab = 'rontok'"
                    :class="activeTab === 'rontok' ? 'bg-[#E0004D] text-white border-[#E0004D]' : 'bg-gray-50 text-gray-700 border-gray-200 hover:bg-gray-100'"
                    class="px-4 py-2 rounded-full text-xs sm:text-sm font-semibold border transition-all">
                🥀 Buah Rontok
            </button>
            <button type="button" 
                    @click="activeTab = 'tanah'"
                    :class="activeTab === 'tanah' ? 'bg-[#E0004D] text-white border-[#E0004D]' : 'bg-gray-50 text-gray-700 border-gray-200 hover:bg-gray-100'"
                    class="px-4 py-2 rounded-full text-xs sm:text-sm font-semibold border transition-all">
                🪴 Tanah Keras
            </button>
        </div>

        {{-- Diagnostic Detail Card --}}
        <div class="max-w-3xl mx-auto bg-[#F8F9FA] rounded-2xl p-6 sm:p-8 border border-gray-200 shadow-xs">
            <div class="flex items-start justify-between gap-4 mb-4">
                <div>
                    <span class="inline-block text-[11px] font-bold text-[#E0004D] bg-[#FFF0F5] px-2.5 py-0.5 rounded-full mb-1.5">
                        Analisa Cepat Gejala
                    </span>
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900" x-html="symptoms[activeTab].title"></h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-2xl flex-shrink-0">
                    🔬
                </div>
            </div>

            <div class="space-y-3.5 mb-6 text-xs sm:text-sm">
                <div class="bg-white p-3.5 rounded-xl border border-gray-200/80">
                    <span class="font-bold text-gray-800 block mb-1">🔍 Kemungkinan Penyebab:</span>
                    <p class="text-gray-600 leading-relaxed" x-text="symptoms[activeTab].penyebab"></p>
                </div>
                <div class="bg-white p-3.5 rounded-xl border border-gray-200/80">
                    <span class="font-bold text-emerald-800 block mb-1">💡 Langkah Penanganan Pertama:</span>
                    <p class="text-gray-600 leading-relaxed" x-text="symptoms[activeTab].solusi"></p>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 pt-4 border-t border-gray-200">
                <p class="text-xs text-gray-500 text-center sm:text-left">
                    Butuh analisa lebih mendalam bersama pakar spesialis tanaman?
                </p>
                <a :href="'{{ route('konsultasi.index') }}?search=' + encodeURIComponent(symptoms[activeTab].query)" 
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#E0004D] hover:bg-[#C70044] text-white text-xs sm:text-sm font-bold px-6 py-2.5 rounded-xl transition-all shadow-xs active:scale-95">
                    <span>Chat Dokter Tanaman</span>
                    <span>→</span>
                </a>
            </div>
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     4. TOKO SARANA & OBAT KEBUN (HALODOC HEALTH STORE STYLE)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section class="py-10 sm:py-14 bg-[#F8F9FA] border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-end justify-between mb-6">
            <div>
                <span class="text-xs font-bold text-[#E0004D] uppercase tracking-wider">Apotek Kebun &amp; Saprotan</span>
                <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mt-1">Sarana &amp; Nutrisi Tanaman Pilihan</h2>
                <p class="text-xs sm:text-sm text-gray-500 mt-0.5">Pupuk organik, nutrisi hidroponik, dan benih unggul dengan jaminan kualitas.</p>
            </div>
            <a href="{{ route('sarana.index') }}" 
               class="text-xs sm:text-sm font-bold text-[#E0004D] hover:text-[#C70044] flex items-center gap-1 transition-colors flex-shrink-0">
                Katalog Lengkap <span class="text-base">→</span>
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-5">
            @forelse($saranaFeatured as $s)
            <div class="bg-white rounded-2xl p-4 border border-gray-200/90 hover:border-[#E0004D]/30 shadow-xs hover:shadow-md transition-all flex flex-col justify-between group">
                <div>
                    {{-- Image Container --}}
                    <div class="aspect-square rounded-xl overflow-hidden bg-gray-100 mb-3 relative">
                        @if($s->foto_url ?? false)
                            <img src="{{ $s->foto_url }}" alt="{{ $s->nama }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <img src="/images/layanan/benih.jpg" alt="{{ $s->nama }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @endif
                        <span class="absolute top-2 left-2 bg-white/95 text-gray-700 text-[10px] font-bold px-2 py-0.5 rounded-md shadow-2xs">
                            {{ $s->kategori ?? 'Nutrisi Kebun' }}
                        </span>
                    </div>

                    <h3 class="font-bold text-gray-900 text-xs sm:text-sm group-hover:text-[#E0004D] transition-colors line-clamp-2 mb-1">
                        {{ $s->nama }}
                    </h3>
                </div>

                <div class="pt-2 mt-auto">
                    <span class="text-[10px] text-gray-400 block">Harga</span>
                    <div class="flex items-center justify-between mt-0.5">
                        <span class="font-extrabold text-sm sm:text-base text-gray-900">
                            Rp {{ number_format($s->harga, 0, ',', '.') }}
                        </span>
                        <a href="{{ route('sarana.index') }}" 
                           class="border border-[#E0004D] text-[#E0004D] hover:bg-[#E0004D] hover:text-white px-3 py-1.5 rounded-lg text-xs font-bold transition-all active:scale-95">
                            Beli
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-10 bg-white rounded-2xl border border-gray-200">
                <p class="text-gray-500 text-sm">Produk sarana sedang diperbarui.</p>
            </div>
            @endforelse
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     5. CUACA & HARGA PASAR (AGRI INTELLIGENCE WIDGET)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section id="cuaca-pasar" class="py-10 sm:py-14 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            {{-- Weather Card --}}
            <div class="bg-[#F8F9FA] rounded-2xl p-6 border border-gray-200 shadow-xs flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs font-bold text-orange-600 bg-orange-50 px-2.5 py-1 rounded-full">
                            🌦️ Cuaca Mikro Kebun
                        </span>
                        <span class="text-xs text-gray-400">Hari ini</span>
                    </div>

                    <div class="flex items-center gap-4 mb-4">
                        <span class="text-4xl">🌤️</span>
                        <div>
                            <span class="text-2xl sm:text-3xl font-extrabold text-gray-900">29°C</span>
                            <p class="text-xs text-gray-500 font-medium">Cerah Berawan · Kelembaban 72%</p>
                        </div>
                    </div>

                    <div class="bg-white p-3.5 rounded-xl border border-gray-200/80 mb-2 text-xs text-gray-600 leading-relaxed">
                        <span class="font-bold text-gray-800 block mb-0.5">Rekomendasi Agronomis:</span>
                        Waktu ideal penyiraman pagi (06.30 - 08.00 WIB) dan pemupukan foliar sore hari. Waspada kelembaban tinggi di malam hari.
                    </div>
                </div>

                <a href="{{ route('konsultasi.index') }}" class="text-xs font-bold text-[#E0004D] hover:underline pt-2">
                    Tanya penyesuaian cuaca ke pakar →
                </a>
            </div>

            {{-- Market Commodity Price Ticker --}}
            <div class="lg:col-span-2 bg-[#F8F9FA] rounded-2xl p-6 border border-gray-200 shadow-xs">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <span class="text-xs font-bold text-[#E0004D] bg-[#FFF0F5] px-2.5 py-1 rounded-full">
                            📈 Tren Pasar Terkini
                        </span>
                        <h3 class="text-base font-bold text-gray-900 mt-2">Harga Komoditas Acuan Petani</h3>
                    </div>
                    <span class="text-xs text-gray-400">Update Harian</span>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                    @foreach(array_slice($hargaPangan, 0, 6) as $hp)
                    <div class="bg-white p-3 rounded-xl border border-gray-200/80 flex flex-col justify-between">
                        <div class="flex items-center justify-between text-xs mb-1">
                            <span class="text-base">{{ $hp['icon'] }}</span>
                            <span class="text-[10px] font-bold {{ $hp['trend'] === 'up' ? 'text-red-600 bg-red-50' : ($hp['trend'] === 'down' ? 'text-emerald-700 bg-emerald-50' : 'text-gray-500 bg-gray-100') }} px-1.5 py-0.5 rounded">
                                {{ $hp['perubahan'] }}
                            </span>
                        </div>
                        <h4 class="font-bold text-gray-900 text-xs truncate">{{ $hp['komoditas'] }}</h4>
                        <span class="text-xs font-extrabold text-gray-800 mt-1">
                            Rp {{ number_format($hp['harga'], 0, ',', '.') }}<span class="text-[10px] font-normal text-gray-400">/{{ $hp['satuan'] }}</span>
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     6. EDUKASI & ARTIKEL KEBUN (HALODOC ARTICLE STYLE)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section class="py-12 sm:py-16 bg-[#F8F9FA] border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-end justify-between mb-8">
            <div>
                <span class="text-xs font-bold text-[#E0004D] uppercase tracking-wider">Edukasi &amp; Panduan</span>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mt-1">Artikel Kebun Terpopuler</h2>
                <p class="text-xs sm:text-sm text-gray-500 mt-1">Tips praktis dan panduan budidaya yang ditinjau langsung oleh agronomis.</p>
            </div>
            <a href="{{ route('layanan') }}" 
               class="text-xs sm:text-sm font-bold text-[#E0004D] hover:text-[#C70044] flex items-center gap-1 transition-colors flex-shrink-0">
                Lihat Semua Artikel <span class="text-base">→</span>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            
            {{-- Article 1 --}}
            <article class="bg-white rounded-2xl overflow-hidden border border-gray-200/90 hover:border-[#E0004D]/30 shadow-xs hover:shadow-md transition-all group flex flex-col">
                <div class="aspect-[16/9] overflow-hidden bg-gray-100 relative">
                    <img src="/images/layanan/konsultasi.jpg" alt="Panduan Hama Kutu Putih" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    <span class="absolute top-3 left-3 bg-white text-[#E0004D] font-bold text-[10px] px-2.5 py-1 rounded-full shadow-xs">
                        Pengendalian Hama
                    </span>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <h3 class="font-bold text-gray-900 text-sm sm:text-base group-hover:text-[#E0004D] transition-colors line-clamp-2 leading-snug mb-2">
                            5 Cara Ampuh Basmi Kutu Putih Tanpa Racun Kimia Berbahaya
                        </h3>
                        <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed mb-4">
                            Kutu putih sering menyerang tanaman hias dan cabai. Pelajari racikan pestisida nabati berbahan dasar daun mimba dan sabun kastil.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-gray-100 flex items-center justify-between text-[11px] text-gray-400">
                        <span>✓ Ditinjau oleh Agronomis</span>
                        <span>4 mnt baca</span>
                    </div>
                </div>
            </article>

            {{-- Article 2 --}}
            <article class="bg-white rounded-2xl overflow-hidden border border-gray-200/90 hover:border-[#E0004D]/30 shadow-xs hover:shadow-md transition-all group flex flex-col">
                <div class="aspect-[16/9] overflow-hidden bg-gray-100 relative">
                    <img src="/images/layanan/pelatihan.jpg" alt="Hidroponik Rumahan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    <span class="absolute top-3 left-3 bg-white text-[#E0004D] font-bold text-[10px] px-2.5 py-1 rounded-full shadow-xs">
                        Urban Farming
                    </span>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <h3 class="font-bold text-gray-900 text-sm sm:text-base group-hover:text-[#E0004D] transition-colors line-clamp-2 leading-snug mb-2">
                            Panduan Memulai Hidroponik NFT untuk Pekebun Pemula
                        </h3>
                        <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed mb-4">
                            Mulai dari pengaturan PPM nutrisi AB Mix, kontrol pH air 5.5 - 6.5, hingga rotasi panen sayuran daun seperti pakcoy dan selada.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-gray-100 flex items-center justify-between text-[11px] text-gray-400">
                        <span>✓ Ditinjau oleh Agronomis</span>
                        <span>6 mnt baca</span>
                    </div>
                </div>
            </article>

            {{-- Article 3 --}}
            <article class="bg-white rounded-2xl overflow-hidden border border-gray-200/90 hover:border-[#E0004D]/30 shadow-xs hover:shadow-md transition-all group flex flex-col">
                <div class="aspect-[16/9] overflow-hidden bg-gray-100 relative">
                    <img src="/images/layanan/riset.jpg" alt="Kesuburan Tanah" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    <span class="absolute top-3 left-3 bg-white text-[#E0004D] font-bold text-[10px] px-2.5 py-1 rounded-full shadow-xs">
                        Manajemen Tanah
                    </span>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <h3 class="font-bold text-gray-900 text-sm sm:text-base group-hover:text-[#E0004D] transition-colors line-clamp-2 leading-snug mb-2">
                            Mengenal Tanda Tanah Kering Mati dan Cara Menghidupkannya
                        </h3>
                        <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed mb-4">
                            Struktur tanah keras dan kekurangan mikroorganisme dapat dipulihkan dengan aplikasi asam humat, trichoderma, dan mulsa organik.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-gray-100 flex items-center justify-between text-[11px] text-gray-400">
                        <span>✓ Ditinjau oleh Agronomis</span>
                        <span>5 mnt baca</span>
                    </div>
                </div>
            </article>

        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     7. TRUST PILLARS & CTA BANNER (HALODOC STANDARDS)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section class="py-12 sm:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="flex items-start gap-4 p-5 rounded-2xl bg-[#F8F9FA] border border-gray-200">
                <div class="w-12 h-12 rounded-xl bg-[#FFF0F5] border border-[#FFD1DF] flex items-center justify-center text-2xl flex-shrink-0">
                    🛡️
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 text-sm mb-1">Agronomis Terverifikasi</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">
                        Pakar berpengalaman dengan latar belakang akademis dan sertifikasi agronomi resmi.
                    </p>
                </div>
            </div>

            <div class="flex items-start gap-4 p-5 rounded-2xl bg-[#F8F9FA] border border-gray-200">
                <div class="w-12 h-12 rounded-xl bg-[#FFF0F5] border border-[#FFD1DF] flex items-center justify-center text-2xl flex-shrink-0">
                    ⚡
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 text-sm mb-1">Respon Cepat &amp; Praktis</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">
                        Langsung terhubung lewat video call dan WhatsApp tanpa perlu menunggu antrean panjang.
                    </p>
                </div>
            </div>

            <div class="flex items-start gap-4 p-5 rounded-2xl bg-[#F8F9FA] border border-gray-200">
                <div class="w-12 h-12 rounded-xl bg-[#FFF0F5] border border-[#FFD1DF] flex items-center justify-center text-2xl flex-shrink-0">
                    🔒
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 text-sm mb-1">Aman &amp; Transparan</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">
                        Tarif konsultasi tertera jelas sejak awal dengan verifikasi pembayaran QRIS otomatis.
                    </p>
                </div>
            </div>
        </div>

        {{-- Simple Halodoc Red CTA Card --}}
        <div class="bg-gradient-to-r from-[#E0004D] to-[#C70044] rounded-3xl p-8 sm:p-12 text-white shadow-md relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="max-w-xl text-center md:text-left">
                <span class="inline-block bg-white/20 text-white text-xs font-bold px-3 py-1 rounded-full mb-3 backdrop-blur-xs">
                    ✦ Mulai Konsultasi Pertamamu
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight mb-2">
                    Tanamanmu Mengalami Masalah Hari Ini?
                </h2>
                <p class="text-xs sm:text-sm text-white/90 leading-relaxed">
                    Jangan biarkan hama atau penyakit menyebar ke seluruh kebun. Konsultasikan sekarang bersama dokter tanaman Hallobun.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-3 w-full md:w-auto flex-shrink-0">
                <a href="{{ route('konsultasi.index') }}" 
                   class="w-full sm:w-auto bg-white text-[#E0004D] hover:bg-gray-50 font-bold px-6 py-3.5 rounded-xl text-xs sm:text-sm text-center transition-all shadow-sm active:scale-95">
                    Tanya Pakar Sekarang
                </a>
                <a href="{{ route('sarana.index') }}" 
                   class="w-full sm:w-auto bg-white/10 hover:bg-white/20 border border-white/30 text-white font-bold px-6 py-3.5 rounded-xl text-xs sm:text-sm text-center transition-all">
                    Beli Sarana &amp; Pupuk
                </a>
            </div>
        </div>

    </div>
</section>

@endsection
