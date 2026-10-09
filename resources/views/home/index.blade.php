@extends('layouts.app')

@section('title', 'Solusi Perawatan Kebun & Pertanian — Hallobun')
@section('meta_description', 'Platform tele-agronomi dan bimbingan berkebun terpercaya bersama praktisi agronom ahli, booking kunjungan lahan, dan sarana tani.')

@section('content')

{{-- ═══════════════════════════════════════════════════════════════════════════
     1. HERO SECTION (MINIMALIST & PROFESSIONAL)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section class="hero relative overflow-hidden bg-slate-50 pt-6 sm:pt-10 pb-10 sm:pb-14 border-b border-gray-100">
    <div class="hero-bg"></div>
    <div class="hero-ov"></div>
    <div class="hero-shimmer"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            
            {{-- Left Column: Copy & Search --}}
            <div class="lg:col-span-7 text-left space-y-4">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight leading-tight">
                    Perawatan Kebun &amp; Tanaman<br>
                    <span class="text-[#16A34A]">Bersama Praktisi Ahli</span>
                </h1>

                <p class="text-sm sm:text-base text-gray-600 leading-relaxed max-w-xl">
                    Konsultasi langsung via video call, pemesanan inspeksi lahan fisik ke kebun Anda, hingga bimbingan budidaya tanaman bawang merah dan hortikultura terpercaya.
                </p>

                {{-- Clean Search Bar --}}
                <div class="pt-2">
                    <form action="{{ route('konsultasi.index') }}" method="GET" class="bg-white rounded-2xl p-1.5 border border-gray-200 shadow-xs flex flex-col sm:flex-row items-center gap-2 transition-all focus-within:border-[#16A34A] focus-within:ring-2 focus-within:ring-[#F0FDF4]">
                        <div class="flex items-center gap-2.5 flex-1 px-3 w-full">
                            <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <input type="text" 
                                   name="search"
                                   placeholder="Cari praktisi bawang, kendala hama ulat/moler..."
                                   class="w-full bg-transparent border-none text-xs sm:text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-0 py-2">
                        </div>
                        <button type="submit" 
                                class="w-full sm:w-auto px-5 py-2.5 rounded-xl bg-[#16A34A] hover:bg-[#15803D] text-white text-xs sm:text-sm font-bold transition-all shadow-xs active:scale-95">
                            Cari Solusi
                        </button>
                    </form>

                    {{-- Popular Quick Chips --}}
                    <div class="flex flex-wrap items-center gap-1.5 mt-3 text-xs text-gray-500">
                        <span class="text-gray-400 font-medium">Populer:</span>
                        <a href="{{ route('konsultasi.index') }}?search=bawang+merah" class="bg-white/90 hover:bg-[#F0FDF4] hover:text-[#16A34A] px-2.5 py-0.5 rounded-full border border-gray-200 transition-colors font-medium">
                            Bawang Merah
                        </a>
                        <a href="{{ route('konsultasi.index') }}?search=moler" class="bg-white/90 hover:bg-[#F0FDF4] hover:text-[#16A34A] px-2.5 py-0.5 rounded-full border border-gray-200 transition-colors font-medium">
                            Moler Bawang
                        </a>
                        <a href="{{ route('konsultasi.index') }}?search=ulat+grayak" class="bg-white/90 hover:bg-[#F0FDF4] hover:text-[#16A34A] px-2.5 py-0.5 rounded-full border border-gray-200 transition-colors font-medium">
                            Ulat Grayak
                        </a>
                        <a href="{{ route('sarana.index') }}" class="bg-white/90 hover:bg-[#F0FDF4] hover:text-[#16A34A] px-2.5 py-0.5 rounded-full border border-gray-200 transition-colors font-medium">
                            Nutrisi Umbi
                        </a>
                        <a href="{{ route('konsultasi.index') }}?search=daun+kuning" class="bg-white/90 hover:bg-[#F0FDF4] hover:text-[#16A34A] px-2.5 py-0.5 rounded-full border border-gray-200 transition-colors font-medium">
                            Daun Kuning
                        </a>
                    </div>
                </div>
            </div>

            {{-- Right Column: Multi-Slide Real Practitioner Photo --}}
            <div class="lg:col-span-5 flex justify-center"
                 x-data="{
                     activeSlide: 0,
                     isHovered: false,
                     slides: [
                         {
                             image: '{{ asset('images/halobun_real_practitioner.jpg') }}',
                             alt: 'Praktisi Kebun & Tanaman Hias Halobun',
                             title: 'Praktisi Kebun & Tanaman Hias',
                             subtitle: 'Bimbingan Agronomi Online'
                         },
                         {
                             image: '{{ asset('images/halobun_real_practitioner_2.jpg') }}',
                             alt: 'Dokter Tanaman & Pakar Hortikultura Halobun',
                             title: 'Dokter Tanaman & Sayuran',
                             subtitle: 'Konsultasi Nutrisi & Hidroponik'
                         },
                         {
                             image: '{{ asset('images/halobun_real_pest_control.jpg') }}',
                             alt: 'Inspeksi & Diagnosa Penyakit Daun',
                             title: 'Inspeksi & Diagnosa Hama',
                             subtitle: 'Deteksi Dini Masalah Daun & Buah'
                         },
                         {
                             image: '{{ asset('images/halobun_real_soil_test.jpg') }}',
                             alt: 'Uji Kesuburan Tanah & Pemupukan',
                             title: 'Uji Kesuburan Tanah',
                             subtitle: 'Solusi Pemupukan & pH Kebun'
                         },
                         {
                             image: '{{ asset('images/halobun_real_training.jpg') }}',
                             alt: 'Pelatihan & Bimtek Kelompok Tani',
                             title: 'Pelatihan & Narasumber Kebun',
                             subtitle: 'Bimtek Kelompok Tani Nusantara'
                         }
                     ],
                     timer: null,
                     nextSlide() {
                         this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                     },
                     prevSlide() {
                         this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
                     },
                     init() {
                         this.timer = setInterval(() => {
                             if (!this.isHovered) {
                                 this.nextSlide();
                             }
                         }, 4000);
                     }
                 }">
                <div class="relative w-full max-w-md select-none group"
                     @mouseenter="isHovered = true"
                     @mouseleave="isHovered = false">
                    
                    {{-- Minimalist Photo Card with Multi-Image Cross-Fade Slider --}}
                    <div class="relative bg-white rounded-3xl p-3 sm:p-4 border border-gray-100 shadow-md">
                        <div class="relative w-full aspect-[4/3] rounded-2xl overflow-hidden bg-gray-100 shadow-2xs">
                            <template x-for="(slide, index) in slides" :key="index">
                                <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out"
                                     :class="activeSlide === index ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'">
                                    <img :src="slide.image" 
                                         :alt="slide.alt" 
                                         class="w-full h-full object-cover select-none">
                                </div>
                            </template>

                            {{-- Navigation Buttons on Hover --}}
                            <button type="button" 
                                    @click="prevSlide()"
                                    aria-label="Sebelumnya"
                                    class="absolute left-2.5 top-1/2 -translate-y-1/2 z-20 w-8 h-8 rounded-full bg-black/40 hover:bg-black/65 text-white flex items-center justify-center backdrop-blur-xs border border-white/20 transition-all opacity-0 group-hover:opacity-100 active:scale-95">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </button>
                            <button type="button" 
                                    @click="nextSlide()"
                                    aria-label="Selanjutnya"
                                    class="absolute right-2.5 top-1/2 -translate-y-1/2 z-20 w-8 h-8 rounded-full bg-black/40 hover:bg-black/65 text-white flex items-center justify-center backdrop-blur-xs border border-white/20 transition-all opacity-0 group-hover:opacity-100 active:scale-95">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                                </svg>
                            </button>

                            {{-- Indicator Dots --}}
                            <div class="absolute top-3.5 right-3.5 z-20 flex items-center gap-1.5 bg-black/40 backdrop-blur-md px-2.5 py-1 rounded-full border border-white/20">
                                <template x-for="(slide, index) in slides" :key="'dot-' + index">
                                    <button type="button" 
                                            @click="activeSlide = index" 
                                            class="h-1.5 rounded-full transition-all duration-300"
                                            :class="activeSlide === index ? 'w-5 bg-[#4ADE80]' : 'w-1.5 bg-white/60 hover:bg-white'"></button>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     2. 4 LAYANAN UTAMA (MINIMALIST 4-GRID CARDS)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section class="py-10 sm:py-12 bg-gray-50/60 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-gray-900">Layanan Unggulan</h2>
                <p class="text-xs text-gray-500 mt-0.5">Solusi terintegrasi untuk kebutuhan kebun dan agribisnis Anda.</p>
            </div>
            <a href="{{ route('layanan') }}" class="text-xs font-bold text-[#16A34A] hover:text-[#15803D] flex items-center gap-1">
                Semua Layanan <span>&rarr;</span>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            
            {{-- Layanan 1: Tanya Pakar Online --}}
            <a href="{{ route('konsultasi.index') }}" 
               class="bg-white rounded-2xl p-5 border border-gray-100 hover:border-[#16A34A] hover:shadow-sm transition-all group flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-[#F0FDF4] border border-[#BBF7D0] flex items-center justify-center text-xl mb-4 group-hover:scale-105 transition-transform">
                        💬
                    </div>
                    <h3 class="font-bold text-gray-900 group-hover:text-[#16A34A] text-sm sm:text-base transition-colors">
                        Tanya Pakar Online
                    </h3>
                    <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                        Sesi video call &amp; chat untuk diagnosa hama, nutrisi tanaman, dan pemupukan.
                    </p>
                </div>
                <div class="pt-4 flex items-center justify-between text-xs font-bold text-[#16A34A]">
                    <span>Konsultasi</span>
                    <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
                </div>
            </a>

            {{-- Layanan 2: Kunjungan Lahan --}}
            <a href="{{ route('kunjungan.index') }}" 
               class="bg-white rounded-2xl p-5 border border-gray-100 hover:border-[#16A34A] hover:shadow-sm transition-all group flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-purple-50 border border-purple-100 flex items-center justify-center text-xl mb-4 group-hover:scale-105 transition-transform">
                        🚜
                    </div>
                    <h3 class="font-bold text-gray-900 group-hover:text-purple-600 text-sm sm:text-base transition-colors">
                        Kunjungan Lahan
                    </h3>
                    <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                        Inspeksi fisik langsung ke kebun untuk uji kesuburan tanah dan bimbingan lapangan.
                    </p>
                </div>
                <div class="pt-4 flex items-center justify-between text-xs font-bold text-purple-600">
                    <span>Ajukan Kunjungan</span>
                    <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
                </div>
            </a>

            {{-- Layanan 3: Undang Narasumber --}}
            <a href="{{ route('narsum.index') }}" 
               class="bg-white rounded-2xl p-5 border border-gray-100 hover:border-[#16A34A] hover:shadow-sm transition-all group flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center text-xl mb-4 group-hover:scale-105 transition-transform">
                        🎤
                    </div>
                    <h3 class="font-bold text-gray-900 group-hover:text-blue-600 text-sm sm:text-base transition-colors">
                        Undang Narasumber
                    </h3>
                    <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                        Pemateri berpengalaman untuk workshop budidaya, webinar, dan bimtek kelompok tani.
                    </p>
                </div>
                <div class="pt-4 flex items-center justify-between text-xs font-bold text-blue-600">
                    <span>Undang Pemateri</span>
                    <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
                </div>
            </a>

            {{-- Layanan 4: Toko Sarana Tani --}}
            <a href="{{ route('sarana.index') }}" 
               class="bg-white rounded-2xl p-5 border border-gray-100 hover:border-[#16A34A] hover:shadow-sm transition-all group flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-amber-50 border border-amber-100 flex items-center justify-center text-xl mb-4 group-hover:scale-105 transition-transform">
                        🛍️
                    </div>
                    <h3 class="font-bold text-gray-900 group-hover:text-amber-700 text-sm sm:text-base transition-colors">
                        Toko Sarana Tani
                    </h3>
                    <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                        Benih bersertifikat, pupuk organik hayati, pestisida nabati, dan peralatan kebun.
                    </p>
                </div>
                <div class="pt-4 flex items-center justify-between text-xs font-bold text-amber-700">
                    <span>Katalog Produk</span>
                    <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
                </div>
            </a>

        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     3. KLASIFIKASI PRAKTISI & DOKTER KEBUN (HALODOC-STYLE TIERS)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section class="py-14 sm:py-16 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Section Header --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
            <div>
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-gray-900">
                    Klasifikasi Praktisi &amp; Pakar Kebun
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 mt-1 max-w-2xl leading-relaxed">
                    Pilih tingkatan praktisi berdasarkan kompleksitas kendala lahan Anda — mulai dari bimbingan pekarangan rumah, diagnosa OPT komersial, hingga uji lab &amp; riset tanah.
                </p>
            </div>
            <a href="{{ route('konsultasi.index') }}" 
               class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-bold text-[#16A34A] hover:text-[#15803D] transition-colors self-start md:self-auto">
                <span>Buka Direktori Lengkap</span>
                <span>&rarr;</span>
            </a>
        </div>

        {{-- 3 Main Halodoc Classification Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 lg:gap-6">
            @foreach($klasifikasiPraktisi as $klas)
            <div class="bg-gradient-to-b from-gray-50/70 to-white rounded-3xl p-6 sm:p-7 border border-gray-200/80 hover:border-[#16A34A]/50 hover:shadow-xl transition-all duration-300 flex flex-col justify-between group relative overflow-hidden">
                
                {{-- Decorative background glow on hover --}}
                <div class="absolute -top-12 -right-12 w-32 h-32 rounded-full bg-emerald-100/40 blur-2xl group-hover:scale-150 transition-transform pointer-events-none"></div>

                <div>
                    {{-- Header / Badge & Icon --}}
                    <div class="flex items-start justify-between gap-3 mb-4">
                        <div class="w-14 h-14 rounded-2xl bg-white shadow-xs border border-gray-100 flex items-center justify-center text-3xl group-hover:scale-110 transition-transform">
                            {{ $klas['icon'] }}
                        </div>
                        <span class="text-[11px] font-bold px-2.5 py-1 rounded-full border {{ $klas['badge_color'] }}">
                            {{ $klas['badge'] }}
                        </span>
                    </div>

                    {{-- Title & Subtitle --}}
                    <h3 class="text-lg sm:text-xl font-extrabold text-gray-900 group-hover:text-[#16A34A] transition-colors">
                        {{ $klas['title'] }}
                    </h3>
                    <p class="text-xs font-semibold text-gray-500 mt-0.5">
                        {{ $klas['subtitle'] }}
                    </p>

                    {{-- Description --}}
                    <p class="text-xs text-gray-600 mt-3 leading-relaxed">
                        {{ $klas['desc'] }}
                    </p>

                    {{-- Kualifikasi Info --}}
                    <div class="mt-4 pt-3.5 border-t border-gray-100/80 flex items-center gap-2 text-[11px] text-gray-600">
                        <span class="text-emerald-600 font-bold">🎓 Kualifikasi:</span>
                        <span class="font-medium truncate">{{ $klas['kualifikasi'] }}</span>
                    </div>

                    {{-- Topik Populer / Kasus yang Ditangani --}}
                    <div class="mt-3.5">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 block mb-1.5">Topik Konsultasi:</span>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach($klas['topik'] as $topik)
                            <span class="text-[11px] font-medium bg-white text-gray-700 border border-gray-200/80 px-2.5 py-0.5 rounded-lg shadow-2xs">
                                {{ $topik }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Pricing & CTA Section --}}
                <div class="mt-6 pt-4 border-t border-gray-100">
                    <div class="flex items-center justify-between mb-3.5">
                        <div>
                            <span class="text-[10px] text-gray-400 block font-medium">Tarif Mulai</span>
                            <div class="flex items-baseline gap-1">
                                <span class="font-extrabold text-lg sm:text-xl text-gray-900">{{ $klas['harga_mulai'] }}</span>
                                <span class="text-[10px] text-gray-500 font-normal">/sesi</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="text-[10px] text-gray-400 block font-medium">Tersedia Online</span>
                            <span class="text-xs font-bold text-emerald-600 flex items-center gap-1 justify-end">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                {{ $klas['count'] }} Praktisi
                            </span>
                        </div>
                    </div>

                    <div>
                        <a href="{{ $klas['url'] }}" 
                           class="w-full block text-center bg-[#16A34A] hover:bg-[#15803D] text-white font-bold text-xs sm:text-sm py-2.5 sm:py-3 px-4 rounded-xl shadow-xs transition-all active:scale-[0.98]">
                            Pilih {{ $klas['title'] }} &rarr;
                        </a>
                    </div>
                </div>

            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     4. SARANA TANI PILIHAN (CLEAN PRODUCT CARDS)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section class="py-12 sm:py-14 bg-gray-50/60 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-gray-900">Sarana &amp; Nutrisi Tanaman</h2>
                <p class="text-xs text-gray-500 mt-0.5">Produk berkualitas teruji untuk mendukung hasil panen optimal.</p>
            </div>
            <a href="{{ route('sarana.index') }}" 
               class="text-xs font-bold text-[#16A34A] hover:text-[#15803D] flex items-center gap-1">
                Katalog Lengkap <span>&rarr;</span>
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
            @forelse($saranaFeatured as $s)
            <div class="bg-white rounded-2xl p-3 sm:p-4 border border-gray-100 hover:border-[#16A34A]/40 hover:shadow-md transition-all flex flex-col justify-between group">
                <div>
                    <div class="aspect-square rounded-xl overflow-hidden bg-gray-100 mb-3 relative">
                        <img src="{{ $s->foto_url ?? asset('images/halobun_real_sarana.jpg') }}" 
                             alt="{{ $s->nama }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <span class="absolute top-2 left-2 bg-white/90 backdrop-blur-xs text-gray-700 text-[10px] font-bold px-2 py-0.5 rounded-md shadow-2xs">
                            {{ ucfirst($s->kategori ?? 'Nutrisi') }}
                        </span>
                    </div>

                    <h3 class="font-bold text-gray-900 text-xs sm:text-sm group-hover:text-[#16A34A] transition-colors line-clamp-2 leading-snug mb-1">
                        {{ $s->nama }}
                    </h3>
                </div>

                <div class="pt-2 mt-auto">
                    <span class="text-[10px] text-gray-400 block leading-tight">Harga</span>
                    <div class="flex items-center justify-between mt-0.5">
                        <span class="font-extrabold text-sm sm:text-base text-gray-900">
                            Rp {{ number_format($s->harga, 0, ',', '.') }}
                        </span>
                        <a href="{{ route('sarana.index') }}" 
                           class="bg-[#F0FDF4] hover:bg-[#16A34A] text-[#16A34A] hover:text-white border border-[#BBF7D0] px-3 py-1.5 rounded-lg text-xs font-bold transition-all active:scale-95">
                            Beli
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-10 bg-white rounded-2xl border border-gray-100">
                <p class="text-gray-500 text-sm">Produk sarana sedang diperbarui.</p>
            </div>
            @endforelse
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     5. MINIMALIST PROFESSIONAL CALL TO ACTION
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section class="py-12 sm:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-gradient-to-r from-[#064E3B] via-[#047857] to-[#059669] rounded-3xl p-6 sm:p-10 text-white shadow-sm flex flex-col md:flex-row items-center justify-between gap-6 overflow-hidden relative">
            <div class="max-w-xl text-center md:text-left space-y-3 relative z-10">
                <span class="inline-block bg-white/15 text-[#DCFCE7] text-xs font-bold px-3 py-1 rounded-full border border-white/10">
                    🧅 Panduan Budidaya Bawang Merah &amp; Pertanian Modern
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                    Panen Bawang Merah Melimpah, Bebas Moler &amp; Hama
                </h2>
                <p class="text-xs sm:text-sm text-[#BBF7D0] leading-relaxed">
                    Konsultasi rutin bersama praktisi agronom spesialis hortikultura &amp; bawang merah. Panduan nutrisi umbi presisi, mitigasi penyakit moler (fusarium), dan manajemen air lahan.
                </p>
                <div class="pt-2 flex flex-col sm:flex-row items-center gap-3">
                    <a href="{{ route('konsultasi.index') }}" 
                       class="w-full sm:w-auto bg-white text-[#16A34A] hover:bg-gray-50 font-bold px-6 py-3 rounded-2xl text-xs sm:text-sm text-center transition-all shadow-md active:scale-95">
                        Tanya Pakar Sekarang
                    </a>
                    <a href="https://wa.me/{{ config('hallobun.admin_phone', '081234567890') }}" 
                       target="_blank"
                       class="w-full sm:w-auto bg-white/15 hover:bg-white/25 border border-white/20 text-white font-bold px-5 py-3 rounded-2xl text-xs sm:text-sm text-center transition-all">
                        Hubungi WhatsApp
                    </a>
                </div>
            </div>

            <div class="w-48 sm:w-64 flex-shrink-0 flex items-center justify-center relative z-10">
                <img src="{{ asset('images/halobun_onion_animation.svg') }}" 
                     alt="Animasi Tanaman Bawang Merah" 
                     class="w-full max-w-[210px] h-auto drop-shadow-[0_15px_30px_rgba(0,0,0,0.3)]">
            </div>
        </div>

    </div>
</section>

@endsection
