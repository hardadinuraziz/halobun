@extends('layouts.app')

@section('title', 'Platform Konsultasi & Solusi Berkebun Modern Indonesia')

@section('content')

{{-- ═══════════════════════════════════════════════════════════════════════════
     1. HERO SECTION (JURUTANI STYLE + HALLOBUN PASTEL SYSTEM)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section class="relative bg-gradient-to-b from-[#EFF5EE] via-[#F8FAF7] to-[#FFFFFF] pt-4 sm:pt-8 pb-14 sm:pb-20 border-b border-[#E2EAE0] overflow-hidden">
    {{-- Ambient Aura Glows for Pastel Theme --}}
    <div class="aura-glow aura-glow-1"></div>
    <div class="aura-glow aura-glow-2"></div>
    <div class="aura-glow aura-glow-3"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        {{-- Top Bar: Theme Switcher & Micro Brand Badge --}}
        <div class="flex flex-wrap items-center justify-between gap-3 mb-6 sm:mb-8 pb-3 border-b border-[#E3EBE1]/80">
            <div class="flex items-center gap-2.5">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                <span class="text-xs font-bold text-[#355333] tracking-wide uppercase">
                    Ekosistem Digital Pertanian &amp; Pekebun Indonesia
                </span>
            </div>

            {{-- Interactive Pastel Palette Switcher --}}
            <div class="flex items-center gap-2 bg-white/95 px-3 py-1.5 rounded-full border border-[#D5E4D2] shadow-xs" title="Pilih Nuansa Warna Pastel">
                <span class="text-[11px] font-semibold text-gray-500 hidden sm:inline">Nuansa Tema:</span>
                <div class="flex items-center gap-1.5">
                    <button type="button" onclick="setHallobunTheme('sage')" class="theme-chip-btn w-3.5 h-3.5 rounded-full bg-[#4A7A48] transition-transform hover:scale-125 active:scale-95" aria-label="Sage Green" title="Sage Green"></button>
                    <button type="button" onclick="setHallobunTheme('terracotta')" class="theme-chip-btn w-3.5 h-3.5 rounded-full bg-[#8E4A2E] transition-transform hover:scale-125 active:scale-95" aria-label="Terracotta" title="Terracotta"></button>
                    <button type="button" onclick="setHallobunTheme('lavender')" class="theme-chip-btn w-3.5 h-3.5 rounded-full bg-[#5D5778] transition-transform hover:scale-125 active:scale-95" aria-label="Lavender" title="Lavender"></button>
                    <button type="button" onclick="setHallobunTheme('sky')" class="theme-chip-btn w-3.5 h-3.5 rounded-full bg-[#2B4E63] transition-transform hover:scale-125 active:scale-95" aria-label="Sky Mist" title="Sky Mist"></button>
                    <button type="button" onclick="setHallobunTheme('rose')" class="theme-chip-btn w-3.5 h-3.5 rounded-full bg-[#8C3A4E] transition-transform hover:scale-125 active:scale-95" aria-label="Rose Blush" title="Rose Blush"></button>
                </div>
            </div>
        </div>

        {{-- Main Hero Content Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center">
            
            {{-- Left Column: Copy, Headlines & Quick Access --}}
            <div class="lg:col-span-7 flex flex-col items-start">
                
                {{-- JuruTani style verified badge --}}
                <div class="section-badge-jur mb-4">
                    <span class="badge-dot"></span>
                    <span class="text-[11px] sm:text-xs font-bold text-[#2A4B28] tracking-widest uppercase">
                        Platform Penyuluhan &amp; Konsultasi Digital Indonesia
                    </span>
                    <span class="badge-sweep"></span>
                </div>

                {{-- Headline --}}
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-[#223521] leading-[1.15] tracking-tight font-serif-title mb-4">
                    Pertanian &amp; Kebun Modern<br class="hidden sm:inline">
                    <span class="bg-gradient-to-r from-[#2F5E2D] via-[#467944] to-[#2B4E63] bg-clip-text text-transparent">
                        untuk Indonesia Subur
                    </span>
                </h1>

                <p class="text-sm sm:text-base lg:text-lg text-[#4A6149] leading-relaxed mb-6 sm:mb-8 max-w-2xl">
                    Temani setiap langkah berkebunmu ♡. Akses bimbingan langsung agronomis berlisensi via video call, pantau cuaca kebun, cek harga pangan komoditas terkini, hingga pesan bibit &amp; sarana pertanian berkualitas.
                </p>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap items-center gap-3 sm:gap-4 mb-8 w-full sm:w-auto">
                    <a href="{{ route('konsultasi.index') }}" 
                       class="w-full sm:w-auto text-center px-7 py-3.5 rounded-2xl bg-[#2E4A2C] hover:bg-[#223820] text-white font-bold text-sm sm:text-base shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all">
                        Konsultasi Pakar Sekarang →
                    </a>
                    <a href="{{ route('layanan') }}" 
                       class="w-full sm:w-auto text-center px-6 py-3.5 rounded-2xl bg-white hover:bg-[#F2F6F1] text-[#2E4A2C] font-semibold text-sm sm:text-base border border-[#D5E4D2] shadow-xs hover:border-[#2E4A2C] transition-all">
                        Jelajahi 7 Layanan Kebun
                    </a>
                </div>

                {{-- Live Counter Stats (JuruTani Counter Grid) --}}
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 sm:gap-6 py-4 px-5 rounded-2xl bg-white/80 border border-[#DFE9DE] backdrop-blur-xs shadow-xs w-full">
                    <div>
                        <div class="text-2xl sm:text-3xl font-extrabold text-[#243723]">{{ number_format($totalKonsultan) }}+</div>
                        <div class="text-[11px] font-bold text-gray-500 uppercase tracking-wider mt-0.5">Pakar &amp; Penyuluh</div>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl font-extrabold text-[#243723]">{{ number_format($totalKonsultasi) }}+</div>
                        <div class="text-[11px] font-bold text-gray-500 uppercase tracking-wider mt-0.5">Sesi Terlaksana</div>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl font-extrabold text-[#243723]">{{ number_format($totalPekebun) }}+</div>
                        <div class="text-[11px] font-bold text-gray-500 uppercase tracking-wider mt-0.5">Pekebun Bergabung</div>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl font-extrabold text-emerald-700">98.4%</div>
                        <div class="text-[11px] font-bold text-gray-500 uppercase tracking-wider mt-0.5">Kepuasan Pengguna</div>
                    </div>
                </div>

                {{-- Quick Access Section (JuruTani Quick Access Bar) --}}
                <div class="mt-6 w-full">
                    <span class="text-[11px] font-bold text-gray-500 uppercase tracking-wider block mb-2.5">
                        ⚡ Akses Cepat Fitur Populer:
                    </span>
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('konsultasi.index') }}" class="quick-pill">
                            <span class="text-base">💬</span>
                            <span>Konsultasi Pakar</span>
                        </a>
                        <a href="{{ route('kunjungan.index') }}" class="quick-pill">
                            <span class="text-base">🚜</span>
                            <span>Kunjungan Lapangan</span>
                        </a>
                        <a href="{{ route('sarana.index') }}" class="quick-pill">
                            <span class="text-base">🪴</span>
                            <span>Sarana &amp; Bibit</span>
                        </a>
                        <a href="#harga-pangan-section" class="quick-pill">
                            <span class="text-base">📈</span>
                            <span>Harga Pangan Terkini</span>
                        </a>
                        <a href="#smart-dashboard-section" class="quick-pill">
                            <span class="text-base">🌦️</span>
                            <span>Cuaca Kebun</span>
                        </a>
                        <a href="#berita-section" class="quick-pill">
                            <span class="text-base">📚</span>
                            <span>Edukasi &amp; Berita</span>
                        </a>
                    </div>
                </div>

            </div>

            {{-- Right Column: Interactive Visual Card & Slider (Mobile & Desktop) --}}
            <div class="lg:col-span-5">
                <div class="bg-gradient-to-b from-[#E7F0E5] to-white rounded-3xl p-3 sm:p-4 border border-[#D5E4D2] shadow-sm art-card-breathe relative">
                    
                    {{-- Floating Badge --}}
                    <div class="absolute -top-3 right-4 z-20 bg-emerald-800 text-white text-[11px] font-bold px-3 py-1 rounded-full shadow-md flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-lime-300 animate-ping"></span>
                        <span>Agri-Expert Online</span>
                    </div>

                    {{-- Carousel Slider --}}
                    <div class="rounded-2xl overflow-hidden aspect-[16/10] relative shadow-inner bg-[#EBF4EA] slider-container" id="homeSlider">
                        {{-- Slide 1 --}}
                        <div class="slider-slide active" data-home-slide="0">
                            <img src="/images/hero_banner.jpg" 
                                 alt="Konsultasi Berkebun Hallobun" 
                                 class="w-full h-full object-cover object-center select-none"
                                 loading="eager">
                            <div class="absolute inset-x-0 bottom-0 p-3.5 bg-gradient-to-t from-black/70 via-black/30 to-transparent text-white pointer-events-none">
                                <span class="inline-block text-[9px] font-bold bg-white/20 backdrop-blur-xs px-2.5 py-0.5 rounded-full mb-1">
                                    ✦ Lahan &amp; Kebun Sehat
                                </span>
                                <p class="text-xs sm:text-sm font-semibold leading-tight drop-shadow-sm">
                                    Pikiran tenang, tanaman bertumbuh riang di pekarangan Anda
                                </p>
                            </div>
                        </div>

                        {{-- Slide 2 --}}
                        <div class="slider-slide" data-home-slide="1">
                            <img src="/images/layanan/konsultasi.jpg" 
                                 alt="Bimbingan 1-on-1 bersama Agronomis" 
                                 class="w-full h-full object-cover object-center select-none"
                                 loading="lazy">
                            <div class="absolute inset-x-0 bottom-0 p-3.5 bg-gradient-to-t from-black/70 via-black/30 to-transparent text-white pointer-events-none">
                                <span class="inline-block text-[9px] font-bold bg-white/20 backdrop-blur-xs px-2.5 py-0.5 rounded-full mb-1">
                                    ✦ Teman Cerita Tanaman
                                </span>
                                <p class="text-xs sm:text-sm font-semibold leading-tight drop-shadow-sm">
                                    Diagnosa daun layu, hama kutu kebul &amp; nutrisi lewat video call
                                </p>
                            </div>
                        </div>

                        {{-- Slide 3 --}}
                        <div class="slider-slide" data-home-slide="2">
                            <img src="/images/layanan/pelatihan.jpg" 
                                 alt="Pelatihan Kebun & Komunitas Tani" 
                                 class="w-full h-full object-cover object-center select-none"
                                 loading="lazy">
                            <div class="absolute inset-x-0 bottom-0 p-3.5 bg-gradient-to-t from-black/70 via-black/30 to-transparent text-white pointer-events-none">
                                <span class="inline-block text-[9px] font-bold bg-white/20 backdrop-blur-xs px-2.5 py-0.5 rounded-full mb-1">
                                    ✦ Edukasi &amp; Komunitas
                                </span>
                                <p class="text-xs sm:text-sm font-semibold leading-tight drop-shadow-sm">
                                    Undang narsum &amp; tingkatkan kapasitas kelompok tani Anda
                                </p>
                            </div>
                        </div>

                        {{-- Carousel Dots --}}
                        <div class="absolute bottom-2.5 inset-x-0 flex items-center justify-center z-10 pointer-events-auto">
                            <div class="flex items-center gap-1.5 bg-white/85 backdrop-blur-xs px-3 py-1 rounded-full shadow-xs border border-white/70" id="homeSliderDots">
                                <button type="button" onclick="goToHomeSlide(0)" class="home-slider-dot w-5 h-1.5 rounded-full bg-emerald-800 transition-all" aria-label="Slide 1"></button>
                                <button type="button" onclick="goToHomeSlide(1)" class="home-slider-dot w-1.5 h-1.5 rounded-full bg-emerald-300 transition-all" aria-label="Slide 2"></button>
                                <button type="button" onclick="goToHomeSlide(2)" class="home-slider-dot w-1.5 h-1.5 rounded-full bg-emerald-300 transition-all" aria-label="Slide 3"></button>
                            </div>
                        </div>
                    </div>

                    {{-- Interactive Symptom Checker Card --}}
                    <div class="mt-3.5 bg-white p-3 rounded-2xl border border-[#DFEADE] shadow-xs">
                        <div class="flex items-center justify-between mb-2 px-1">
                            <span class="text-[11px] font-bold text-gray-700 flex items-center gap-1">
                                <span>🌱</span> Gejala apa yang dialami tanamanmu?
                            </span>
                            <span class="text-[10px] text-emerald-800 font-semibold" id="homeSymptomLabel">Pilih untuk konsultasi</span>
                        </div>
                        <div class="flex flex-wrap gap-1.5 justify-center sm:justify-start" id="homeSymptomChips">
                            <button type="button" onclick="selectHomeSymptom(this, 'Daun Menguning & Layu')" class="home-symptom-chip text-[11px] font-semibold px-2.5 py-1 rounded-xl bg-gray-50 border border-gray-200 text-gray-700 hover:border-emerald-600 hover:bg-emerald-50 transition-all flex items-center gap-1">
                                <span>🍂</span> Daun Kuning
                            </button>
                            <button type="button" onclick="selectHomeSymptom(this, 'Serangan Hama / Kutu Putih')" class="home-symptom-chip text-[11px] font-semibold px-2.5 py-1 rounded-xl bg-gray-50 border border-gray-200 text-gray-700 hover:border-emerald-600 hover:bg-emerald-50 transition-all flex items-center gap-1">
                                <span>🐛</span> Hama &amp; Kutu
                            </button>
                            <button type="button" onclick="selectHomeSymptom(this, 'Batang Layu / Membusuk')" class="home-symptom-chip text-[11px] font-semibold px-2.5 py-1 rounded-xl bg-gray-50 border border-gray-200 text-gray-700 hover:border-emerald-600 hover:bg-emerald-50 transition-all flex items-center gap-1">
                                <span>🥀</span> Batang Layu
                            </button>
                            <button type="button" onclick="selectHomeSymptom(this, 'Tanah Keras / Kurang Subur')" class="home-symptom-chip text-[11px] font-semibold px-2.5 py-1 rounded-xl bg-gray-50 border border-gray-200 text-gray-700 hover:border-emerald-600 hover:bg-emerald-50 transition-all flex items-center gap-1">
                                <span>🌾</span> Tanah Keras
                            </button>
                            <button type="button" onclick="selectHomeSymptom(this, 'Buah & Bunga Rontok')" class="home-symptom-chip text-[11px] font-semibold px-2.5 py-1 rounded-xl bg-gray-50 border border-gray-200 text-gray-700 hover:border-emerald-600 hover:bg-emerald-50 transition-all flex items-center gap-1">
                                <span>🍓</span> Bunga Rontok
                            </button>
                        </div>

                        {{-- Fast Action Buttons --}}
                        <div class="mt-3 pt-2.5 border-t border-gray-100 flex items-center justify-between gap-2">
                            <a id="homeChannelChatBtn" href="{{ route('konsultasi.index') }}" class="flex-1 text-center py-2 px-2 bg-emerald-50 hover:bg-emerald-100 text-emerald-900 rounded-xl text-xs font-bold transition-colors border border-emerald-200 flex items-center justify-center gap-1">
                                <span>💬</span> Chat Pakar
                            </a>
                            <a id="homeChannelCallBtn" href="{{ route('konsultasi.index') }}" class="flex-1 text-center py-2 px-2 bg-[#2E4A2C] hover:bg-[#223820] text-white rounded-xl text-xs font-bold transition-colors shadow-xs flex items-center justify-center gap-1">
                                <span>🎥</span> Video Call
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     2. SMART DASHBOARD SECTION (JURUTANI SMART DASHBOARD COUNTERPART)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section id="smart-dashboard-section" class="py-12 sm:py-16 bg-[#F4F8F3] border-b border-[#E1EAE0]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8 sm:mb-10">
            <div>
                <div class="section-badge-jur mb-2">
                    <span class="badge-dot"></span>
                    <span class="text-[11px] font-bold text-[#2A4B28] tracking-widest uppercase">
                        Smart Dashboard &amp; Cuaca Kebun
                    </span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#223521] tracking-tight font-serif-title">
                    Pantau Iklim &amp; Rekomendasi Agronomi Harian
                </h2>
                <p class="text-xs sm:text-sm text-[#526851] mt-1 max-w-xl">
                    Kombinasi data cuaca aktual dan panduan praktis agronomis untuk menjamin efektivitas pemupukan dan pencegahan penyakit tanaman.
                </p>
            </div>

            {{-- Region Picker Pill --}}
            <div class="flex items-center gap-2 bg-white px-3.5 py-1.5 rounded-2xl border border-[#D7E4D4] shadow-xs text-xs font-semibold text-gray-700">
                <span class="text-emerald-700">📍 Lokasi:</span>
                <select id="weatherRegionSelect" onchange="updateWeatherDisplay(this.value)" class="bg-transparent font-bold text-gray-800 focus:outline-none cursor-pointer">
                    <option value="jabodetabek">Jabodetabek &amp; Sekitarnya</option>
                    <option value="jabar">Jawa Barat (Bandung, Sukabumi)</option>
                    <option value="jateng">Jawa Tengah &amp; DIY (Magelang, Boyolali)</option>
                    <option value="jatim">Jawa Timur (Malang, Batu)</option>
                    <option value="luarjawa">Sumatera &amp; Luar Jawa</option>
                </select>
            </div>
        </div>

        {{-- Smart Dashboard Widgets Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 sm:gap-6">
            
            {{-- Weather & Micro-climate card --}}
            <div class="lg:col-span-5 weather-box p-5 sm:p-6 rounded-3xl flex flex-col justify-between relative overflow-hidden">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <span class="inline-block text-[10px] font-bold bg-emerald-100 text-emerald-900 px-2.5 py-0.5 rounded-full mb-1">
                            Prakiraan Hari Ini
                        </span>
                        <h3 class="text-xl font-bold text-gray-900" id="weatherCityName">Wilayah Sentra Hortikultura</h3>
                        <p class="text-xs text-gray-500" id="weatherDateText">Rabu, 30 September 2026 • 09:00 WIB</p>
                    </div>
                    <div class="text-4xl sm:text-5xl" id="weatherConditionIcon">⛅</div>
                </div>

                {{-- Metrics row --}}
                <div class="grid grid-cols-3 gap-2 py-3 px-3 bg-white/80 rounded-2xl border border-[#DFE8DD] mb-4">
                    <div class="text-center">
                        <div class="text-xl sm:text-2xl font-black text-gray-900" id="weatherTemp">29°C</div>
                        <div class="text-[10px] font-semibold text-gray-500">Suhu Udara</div>
                    </div>
                    <div class="text-center border-x border-gray-200">
                        <div class="text-xl sm:text-2xl font-black text-emerald-800" id="weatherHumidity">74%</div>
                        <div class="text-[10px] font-semibold text-gray-500">Kelembaban</div>
                    </div>
                    <div class="text-center">
                        <div class="text-xl sm:text-2xl font-black text-blue-800" id="weatherWind">12 km/h</div>
                        <div class="text-[10px] font-semibold text-gray-500">Kec. Angin</div>
                    </div>
                </div>

                {{-- Agronomy Advisory Box --}}
                <div class="bg-[#EBF3E8] p-3.5 rounded-2xl border border-[#D2E2CF]">
                    <div class="flex items-center gap-1.5 text-xs font-bold text-[#2A4D27] mb-1">
                        <span>💡</span>
                        <span>Rekomendasi Agronomi Hari Ini:</span>
                    </div>
                    <p class="text-xs text-[#3D563B] leading-relaxed" id="weatherAdvisoryText">
                        Cuaca cerah berawan sangat ideal untuk penyemprotan pupuk daun dan asam amino sebelum pukul 10:00 WIB. Jaga aerasi polybag dan periksa drainase pot agar terhindar dari jamur akar.
                    </p>
                </div>
            </div>

            {{-- 3 Diagnostic & Action Feature Panels --}}
            <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-3 gap-4">
                
                {{-- Panel 1: Kalender Tanam Pintar --}}
                <div class="bg-white p-5 rounded-3xl border border-[#E1ECE0] shadow-xs flex flex-col justify-between hover:border-emerald-500 transition-all group">
                    <div>
                        <div class="w-11 h-11 bg-emerald-50 rounded-2xl flex items-center justify-center text-2xl mb-3 group-hover:scale-110 transition-transform">
                            📅
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm mb-1">Kalender Tanam</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">
                            Panduan siklus semai, pindah tanam, hingga masa panen optimal sayur &amp; buah musiman.
                        </p>
                    </div>
                    <a href="{{ route('konsultasi.index') }}" class="mt-4 text-xs font-bold text-emerald-800 group-hover:underline flex items-center gap-1">
                        <span>Cek Panduan</span>
                        <span>→</span>
                    </a>
                </div>

                {{-- Panel 2: Diagnosa Cepat Hama --}}
                <div class="bg-white p-5 rounded-3xl border border-[#E1ECE0] shadow-xs flex flex-col justify-between hover:border-emerald-500 transition-all group">
                    <div>
                        <div class="w-11 h-11 bg-amber-50 rounded-2xl flex items-center justify-center text-2xl mb-3 group-hover:scale-110 transition-transform">
                            🔍
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm mb-1">Klinik Tanaman</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">
                            Konsultasikan foto daun kusam, busuk batang, atau bintik cokelat untuk penanganan akurat.
                        </p>
                    </div>
                    <a href="{{ route('konsultasi.index') }}" class="mt-4 text-xs font-bold text-amber-800 group-hover:underline flex items-center gap-1">
                        <span>Konsultasi Foto</span>
                        <span>→</span>
                    </a>
                </div>

                {{-- Panel 3: Kalkulator Pupuk & Nutrisi --}}
                <div class="bg-white p-5 rounded-3xl border border-[#E1ECE0] shadow-xs flex flex-col justify-between hover:border-emerald-500 transition-all group">
                    <div>
                        <div class="w-11 h-11 bg-blue-50 rounded-2xl flex items-center justify-center text-2xl mb-3 group-hover:scale-110 transition-transform">
                            🧪
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm mb-1">Rekomendasi Dosis</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">
                            Formula takaran NPK, POC, dan kapur dolomit berimbang sesuai jenis media tanam.
                        </p>
                    </div>
                    <a href="{{ route('sarana.index') }}" class="mt-4 text-xs font-bold text-blue-800 group-hover:underline flex items-center gap-1">
                        <span>Cek Produk Nutrisi</span>
                        <span>→</span>
                    </a>
                </div>

            </div>

        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     3. PENYULUHAN & PAKAR UNGGULAN (JURUTANI PAKAR PERTANIAN DIRECTORY)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section id="pakar-section" class="py-12 sm:py-20 bg-[#F9FBF8]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8 sm:mb-10">
            <div>
                <div class="section-badge-jur mb-2">
                    <span class="badge-dot"></span>
                    <span class="text-[11px] font-bold text-[#2A4B28] tracking-widest uppercase">
                        Penyuluhan &amp; Konsultasi Ahli
                    </span>
                </div>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-[#223521] tracking-tight font-serif-title">
                    Pakar Pertanian &amp; Agronomis Berlisensi
                </h2>
                <p class="text-xs sm:text-base text-[#526851] mt-1 max-w-xl">
                    Pilih pakar berpengalaman sesuai kebutuhan tanaman hias, sayur pekarangan, hidroponik, hingga perkebunan luas.
                </p>
            </div>

            <a href="{{ route('konsultasi.index') }}" class="inline-flex items-center gap-1 text-sm font-bold text-[#2E4A2C] hover:underline">
                <span>Lihat Semua Konsultan</span>
                <span>→</span>
            </a>
        </div>

        {{-- Consultant Grid --}}
        @if($konsultanFeatured->isNotEmpty())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">
            @foreach($konsultanFeatured as $konsultan)
            <div class="bg-white border border-[#DFE8DD] hover:border-emerald-500 rounded-3xl p-5 sm:p-6 shadow-xs hover:shadow-md transition-all flex flex-col justify-between group">
                <div>
                    {{-- Header with Avatar & Verified Badge --}}
                    <div class="flex items-start gap-4 mb-3.5">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#E2EDE0] to-[#C9DEC6] border border-[#BFD6BC] flex items-center justify-center text-2xl font-black text-[#264424] flex-shrink-0 shadow-inner group-hover:scale-105 transition-transform">
                            {{ substr($konsultan->user->name, 0, 1) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-1.5">
                                <h3 class="font-bold text-gray-900 text-base truncate group-hover:text-emerald-900 transition-colors">
                                    {{ $konsultan->user->name }}
                                </h3>
                                <span class="text-emerald-600 text-xs flex-shrink-0" title="Konsultan Terverifikasi">✓</span>
                            </div>
                            <span class="inline-block text-[11px] font-semibold text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded-md mt-0.5">
                                {{ $konsultan->spesialisasi }}
                            </span>
                            <div class="flex items-center gap-2 mt-1.5">
                                <div class="flex items-center text-amber-500 text-xs font-bold gap-0.5">
                                    <span>⭐</span>
                                    <span>{{ number_format($konsultan->rating, 1) }}</span>
                                </div>
                                <span class="text-gray-300 text-xs">•</span>
                                <span class="text-xs text-gray-500 font-medium">{{ $konsultan->total_konsultasi }} sesi sukses</span>
                            </div>
                        </div>
                    </div>

                    {{-- Bio snippet --}}
                    <p class="text-xs text-[#526851] leading-relaxed line-clamp-2 mb-4">
                        {{ $konsultan->bio ?? 'Praktisi agrikultur siap mendampingi perawatan tanaman hias, hortikultura dan pengendalian hama dengan solusi teruji.' }}
                    </p>
                </div>

                {{-- Price & CTA Button --}}
                <div class="pt-3.5 border-t border-[#EDF3EC] flex items-center justify-between mt-auto">
                    <div>
                        <span class="text-[10px] text-gray-400 block font-medium">Biaya Sesi</span>
                        <span class="font-extrabold text-[#223521] text-base">
                            Rp {{ number_format($konsultan->harga_per_sesi, 0, ',', '.') }}
                        </span>
                    </div>
                    <a href="{{ route('konsultasi.show', $konsultan) }}" 
                       class="px-4 py-2 rounded-xl bg-[#2E4A2C] hover:bg-[#20371E] text-white text-xs font-bold transition-all shadow-xs">
                        Konsultasi →
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12 bg-white rounded-3xl border border-gray-200">
            <p class="text-gray-500 text-sm">Konsultan belum tersedia saat ini.</p>
        </div>
        @endif

        {{-- Mobile Full Button --}}
        <div class="mt-6 text-center sm:hidden">
            <a href="{{ route('konsultasi.index') }}" class="w-full inline-block py-3 bg-white text-[#2E4A2C] font-bold rounded-2xl border border-[#D5E4D2] text-sm">
                Lihat Semua Konsultan ({{ $totalKonsultan }}) →
            </a>
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     4. PENAWARAN & PRODUK UNGGULAN (HALLOBUN MALL / JURUTANI PRODUCT SHOWCASE)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section id="sarana-section" class="py-12 sm:py-20 bg-[#F3F7F2] border-y border-[#E2EAE0]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8 sm:mb-10">
            <div>
                <div class="section-badge-jur mb-2">
                    <span class="badge-dot"></span>
                    <span class="text-[11px] font-bold text-[#2A4B28] tracking-widest uppercase">
                        Penawaran &amp; Produk Pilihan
                    </span>
                </div>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-[#223521] tracking-tight font-serif-title">
                    Sarana Berkebun &amp; Pertanian Teruji
                </h2>
                <p class="text-xs sm:text-base text-[#526851] mt-1 max-w-xl">
                    Dapatkan bibit varietas unggul, pupuk hayati, POC nutrisi tanaman, serta peralatan berkebun rekomendasi praktisi.
                </p>
            </div>

            <a href="{{ route('sarana.index') }}" class="inline-flex items-center gap-1 text-sm font-bold text-[#2E4A2C] hover:underline">
                <span>Katalog Sarana Lengkap</span>
                <span>→</span>
            </a>
        </div>

        {{-- Product Cards Grid --}}
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            @forelse($saranaFeatured as $sarana)
            <div class="bg-white rounded-3xl border border-[#DFE8DD] hover:border-emerald-500 overflow-hidden shadow-xs hover:shadow-md transition-all flex flex-col justify-between group">
                <div class="aspect-square bg-emerald-50 relative overflow-hidden">
                    @if($sarana->foto)
                    <img src="{{ asset('storage/' . $sarana->foto) }}" alt="{{ $sarana->nama }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                    <div class="w-full h-full flex items-center justify-center text-4xl text-emerald-800 bg-[#E9F2E7]">
                        🪴
                    </div>
                    @endif
                    <span class="absolute top-2.5 left-2.5 bg-white/90 backdrop-blur-xs text-emerald-900 text-[10px] font-bold px-2 py-0.5 rounded-full border border-emerald-100 shadow-xs">
                        {{ $sarana->kategori ?? 'Sarana' }}
                    </span>
                </div>
                <div class="p-3.5 sm:p-4 flex flex-col flex-1 justify-between">
                    <div>
                        <h4 class="font-bold text-gray-900 text-xs sm:text-sm line-clamp-2 mb-1 group-hover:text-emerald-900 transition-colors">
                            {{ $sarana->nama }}
                        </h4>
                        <div class="flex items-center gap-1 text-[11px] text-amber-500 mb-2">
                            <span>⭐</span>
                            <span class="font-semibold text-gray-700">4.9</span>
                            <span class="text-gray-400">• Teruji Agronomi</span>
                        </div>
                    </div>
                    <div class="pt-2 border-t border-gray-100 flex items-center justify-between">
                        <span class="font-extrabold text-sm sm:text-base text-[#243723]">
                            Rp {{ number_format($sarana->harga, 0, ',', '.') }}
                        </span>
                        <a href="{{ route('sarana.show', $sarana) }}" class="p-1.5 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 text-xs font-bold transition-colors">
                            Lihat →
                        </a>
                    </div>
                </div>
            </div>
            @empty
            {{-- Fallback Mock Cards if Database empty --}}
            @foreach([
                ['nama' => 'Pupuk Organik Hayati Trichoderma', 'kat' => 'Pupuk & Hayati', 'harga' => 45000, 'icon' => '🌿'],
                ['nama' => 'Benih Cabai Rawit Unggul Tahan Virus', 'kat' => 'Bibit & Benih', 'harga' => 28000, 'icon' => '🌶️'],
                ['nama' => 'Nutrisi AB Mix Sayuran Daun Hidroponik', 'kat' => 'Nutrisi & POC', 'harga' => 38000, 'icon' => '🧪'],
                ['nama' => 'Sprayer Tekanan 2 Liter Nozzle Kuningan', 'kat' => 'Alat Kebun', 'harga' => 62000, 'icon' => '🪴'],
            ] as $mock)
            <div class="bg-white rounded-3xl border border-[#DFE8DD] hover:border-emerald-500 overflow-hidden shadow-xs hover:shadow-md transition-all flex flex-col justify-between group">
                <div class="aspect-square bg-[#E9F2E7] flex items-center justify-center text-4xl group-hover:scale-105 transition-transform">
                    {{ $mock['icon'] }}
                </div>
                <div class="p-3.5 sm:p-4 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="inline-block text-[10px] font-bold text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded-full mb-1">
                            {{ $mock['kat'] }}
                        </span>
                        <h4 class="font-bold text-gray-900 text-xs sm:text-sm line-clamp-2 mb-1">
                            {{ $mock['nama'] }}
                        </h4>
                    </div>
                    <div class="pt-2 border-t border-gray-100 flex items-center justify-between">
                        <span class="font-extrabold text-sm sm:text-base text-[#243723]">
                            Rp {{ number_format($mock['harga'], 0, ',', '.') }}
                        </span>
                        <a href="{{ route('sarana.index') }}" class="p-1.5 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 text-xs font-bold transition-colors">
                            Pesan
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
     5. INFORMASI HARGA PANGAN TERKINI (JURUTANI COMMODITY PRICE UPDATE)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section id="harga-pangan-section" class="py-12 sm:py-20 bg-[#F9FBF8]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8">
            <div>
                <div class="section-badge-jur mb-2">
                    <span class="badge-dot"></span>
                    <span class="text-[11px] font-bold text-[#2A4B28] tracking-widest uppercase">
                        Pantauan Pasar Agrikultur
                    </span>
                </div>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-[#223521] tracking-tight font-serif-title">
                    Informasi Harga Pangan &amp; Komoditas Terkini
                </h2>
                <p class="text-xs sm:text-base text-[#526851] mt-1 max-w-xl">
                    Data referensi harga harian komoditas pangan pokok dan hortikultura untuk membantu pekebun &amp; petani mengoptimalkan masa panen.
                </p>
            </div>

            <div class="text-xs text-gray-500 font-semibold bg-white px-3 py-1.5 rounded-xl border border-gray-200">
                🔄 Update: <span class="text-emerald-800 font-bold">Hari ini, 08:30 WIB</span>
            </div>
        </div>

        {{-- Interactive Commodity Price Cards / Table --}}
        <div class="bg-white rounded-3xl border border-[#DFE8DD] shadow-xs overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-[#F2F7F1] border-b border-[#E1ECE0] text-[11px] font-bold text-[#355333] uppercase tracking-wider">
                            <th class="py-3.5 px-4 sm:px-6">Komoditas &amp; Jenis</th>
                            <th class="py-3.5 px-4">Kategori</th>
                            <th class="py-3.5 px-4">Harga Terkini</th>
                            <th class="py-3.5 px-4 text-center">Perubahan (24 Jam)</th>
                            <th class="py-3.5 px-4 text-right pr-4 sm:pr-6">Wilayah Pantau</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-xs sm:text-sm">
                        @foreach($hargaPangan as $pangan)
                        <tr class="hover:bg-[#F9FCF8] transition-colors">
                            <td class="py-3.5 px-4 sm:px-6 font-bold text-gray-900 flex items-center gap-2.5">
                                <span class="text-xl flex-shrink-0">{{ $pangan['icon'] }}</span>
                                <div>
                                    <div class="text-sm font-bold text-gray-900">{{ $pangan['komoditas'] }}</div>
                                    <div class="text-[10px] text-gray-400 font-normal">Per {{ $pangan['satuan'] }}</div>
                                </div>
                            </td>
                            <td class="py-3.5 px-4 text-gray-600">
                                <span class="inline-block text-[10.5px] font-semibold bg-gray-100 text-gray-700 px-2 py-0.5 rounded-md">
                                    {{ $pangan['kategori'] }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 font-black text-emerald-950 text-sm sm:text-base">
                                Rp {{ number_format($pangan['harga'], 0, ',', '.') }}
                            </td>
                            <td class="py-3.5 px-4 text-center">
                                @if($pangan['trend'] === 'up')
                                <span class="inline-flex items-center gap-1 text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200">
                                    <span>▲</span> {{ $pangan['perubahan'] }}
                                </span>
                                @elseif($pangan['trend'] === 'down')
                                <span class="inline-flex items-center gap-1 text-[11px] font-bold text-rose-700 bg-rose-50 px-2.5 py-0.5 rounded-full border border-rose-200">
                                    <span>▼</span> {{ $pangan['perubahan'] }}
                                </span>
                                @else
                                <span class="inline-flex items-center gap-1 text-[11px] font-bold text-gray-600 bg-gray-100 px-2.5 py-0.5 rounded-full">
                                    <span>▬</span> Stabil
                                </span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-right pr-4 sm:pr-6 text-gray-500 font-medium text-xs">
                                {{ $pangan['wilayah'] }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Footer Note --}}
            <div class="p-4 bg-[#F8FAF7] border-t border-[#DFE8DD] text-[11px] text-gray-500 flex flex-col sm:flex-row items-center justify-between gap-2">
                <span class="flex items-center gap-1.5">
                    <span>💡</span>
                    <span>Harga bersifat indikatif rata-rata pasar agrikultur &amp; sentra hortikultura nasional.</span>
                </span>
                <a href="{{ route('konsultasi.index') }}" class="font-bold text-emerald-800 hover:underline">
                    Konsultasikan Rencana Tanam &amp; Waktu Panen →
                </a>
            </div>
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     6. BERITA & EDUKASI PERTANIAN TERKINI (JURUTANI BERITA & INFORMASI)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section id="berita-section" class="py-12 sm:py-20 bg-[#F2F6F1] border-b border-[#E0E9DF]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8 sm:mb-10">
            <div>
                <div class="section-badge-jur mb-2">
                    <span class="badge-dot"></span>
                    <span class="text-[11px] font-bold text-[#2A4B28] tracking-widest uppercase">
                        Berita &amp; Literasi Kebun
                    </span>
                </div>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-[#223521] tracking-tight font-serif-title">
                    Edukasi, Riset &amp; Tips Praktis
                </h2>
                <p class="text-xs sm:text-base text-[#526851] mt-1 max-w-xl">
                    Tingkatkan wawasan berkebun mandiri dengan artikel teknik budidaya, pengendalian hayati, dan inovasi agrikultur terkini.
                </p>
            </div>

            <a href="{{ route('layanan') }}" class="inline-flex items-center gap-1 text-sm font-bold text-[#2E4A2C] hover:underline">
                <span>Pelajari Materi Workshop</span>
                <span>→</span>
            </a>
        </div>

        {{-- 3 Article Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($beritaTani as $berita)
            <div class="bg-white rounded-3xl border border-[#DFE8DD] overflow-hidden shadow-xs hover:shadow-md transition-all flex flex-col justify-between group">
                <div>
                    <div class="aspect-[16/9] bg-emerald-100 overflow-hidden relative">
                        <img src="{{ $berita['image'] }}" alt="{{ $berita['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <span class="absolute top-3 left-3 bg-white/95 backdrop-blur-xs text-emerald-900 text-[10.5px] font-bold px-2.5 py-0.5 rounded-full border border-emerald-100 shadow-xs">
                            {{ $berita['tag'] }}
                        </span>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 text-[11px] text-gray-400 mb-2">
                            <span>{{ $berita['date'] }}</span>
                            <span>•</span>
                            <span>{{ $berita['read_time'] }}</span>
                        </div>
                        <h3 class="font-bold text-gray-900 text-base leading-snug group-hover:text-emerald-900 transition-colors mb-2">
                            {{ $berita['title'] }}
                        </h3>
                        <p class="text-xs text-[#526851] leading-relaxed line-clamp-3">
                            {{ $berita['excerpt'] }}
                        </p>
                    </div>
                </div>
                <div class="px-5 pb-5 pt-2 flex items-center justify-between border-t border-gray-100 text-xs font-semibold">
                    <span class="text-gray-500 font-medium">✍️ {{ $berita['author'] }}</span>
                    <a href="{{ route('konsultasi.index') }}" class="text-emerald-800 font-bold hover:underline flex items-center gap-0.5">
                        <span>Konsultasikan</span>
                        <span>→</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     7. SATU PLATFORM, SEMUA KEBUTUHAN KEBUNMU (JURUTANI 4 PILLARS)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section class="py-12 sm:py-20 bg-[#F9FBF8]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-12">
            <div class="section-badge-jur mx-auto mb-2">
                <span class="badge-dot"></span>
                <span class="text-[11px] font-bold text-[#2A4B28] tracking-widest uppercase">
                    Tentang Ekosistem Hallobun
                </span>
            </div>
            <h2 class="text-2xl sm:text-4xl font-extrabold text-[#223521] tracking-tight font-serif-title">
                Satu Platform, Semua Kebutuhan Kebun &amp; Pertanianmu
            </h2>
            <p class="text-xs sm:text-base text-[#526851] mt-2">
                Solusi holistik dari bibit hingga panen yang didesain agar mudah diakses siapa saja, kapan saja.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="bg-white p-6 rounded-3xl border border-[#DFE8DD] shadow-xs text-center flex flex-col items-center hover:border-emerald-500 transition-all group">
                <div class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center text-3xl mb-4 group-hover:scale-110 transition-transform">
                    🎓
                </div>
                <h3 class="font-bold text-gray-900 text-base mb-2">Edukasi Pertanian</h3>
                <p class="text-xs text-[#526851] leading-relaxed">
                    Panduan budidaya terpadu, pencegahan hama, dan teknik urban farming hidroponik yang aplikatif.
                </p>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-[#DFE8DD] shadow-xs text-center flex flex-col items-center hover:border-emerald-500 transition-all group">
                <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-3xl mb-4 group-hover:scale-110 transition-transform">
                    👥
                </div>
                <h3 class="font-bold text-gray-900 text-base mb-2">Komunitas Pekebun</h3>
                <p class="text-xs text-[#526851] leading-relaxed">
                    Jaringan bertukar ide, saling dukung, dan sharing pengalaman berkebun dengan ribuan anggota se-Indonesia.
                </p>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-[#DFE8DD] shadow-xs text-center flex flex-col items-center hover:border-emerald-500 transition-all group">
                <div class="w-14 h-14 bg-amber-50 rounded-2xl flex items-center justify-center text-3xl mb-4 group-hover:scale-110 transition-transform">
                    🛒
                </div>
                <h3 class="font-bold text-gray-900 text-base mb-2">Marketplace Sarana</h3>
                <p class="text-xs text-[#526851] leading-relaxed">
                    Pilihan bibit unggul, pupuk organik, dan alat kebun yang sudah melalui verifikasi kualitas tim agronomi.
                </p>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-[#DFE8DD] shadow-xs text-center flex flex-col items-center hover:border-emerald-500 transition-all group">
                <div class="w-14 h-14 bg-purple-50 rounded-2xl flex items-center justify-center text-3xl mb-4 group-hover:scale-110 transition-transform">
                    💬
                </div>
                <h3 class="font-bold text-gray-900 text-base mb-2">Konsultasi Terpercaya</h3>
                <p class="text-xs text-[#526851] leading-relaxed">
                    Tanya jawab fleksibel via chat, call, hingga video call langsung di lahan bersama pakar berlisensi.
                </p>
            </div>

        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     8. TESTIMONI PENGGUNA (JURUTANI TESTIMONIAL CARDS)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section class="py-12 sm:py-20 bg-[#F4F8F3] border-t border-[#DFE8DD]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12">
            <div class="section-badge-jur mx-auto mb-2">
                <span class="badge-dot"></span>
                <span class="text-[11px] font-bold text-[#2A4B28] tracking-widest uppercase">
                    Testimoni Pengguna
                </span>
            </div>
            <h2 class="text-2xl sm:text-4xl font-extrabold text-[#223521] tracking-tight font-serif-title">
                Dipercaya Ribuan Pekebun &amp; Petani Indonesia
            </h2>
            <p class="text-xs sm:text-base text-[#526851] mt-2">
                Cerita nyata dari sahabat pekebun yang sukses memulihkan tanaman dan meningkatkan hasil panen bersama Hallobun.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($testimonials as $testi)
            <div class="bg-white p-6 rounded-3xl border border-[#DFE8DD] shadow-xs flex flex-col justify-between">
                <div>
                    {{-- Star Rating --}}
                    <div class="flex items-center gap-1 text-amber-500 text-sm mb-3">
                        @for($i = 0; $i < $testi['rating']; $i++)
                        <span>★</span>
                        @endfor
                    </div>
                    <p class="text-xs sm:text-sm text-[#445A43] leading-relaxed italic mb-4">
                        “{{ $testi['comment'] }}”
                    </p>
                </div>
                <div class="pt-4 border-t border-gray-100 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-xl flex-shrink-0">
                        {{ $testi['avatar'] }}
                    </div>
                    <div class="min-w-0">
                        <h4 class="font-bold text-gray-900 text-sm truncate">{{ $testi['name'] }}</h4>
                        <p class="text-[11px] text-gray-500 truncate">{{ $testi['role'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     9. MULAI PERJALANAN KEBUNMU SEKARANG (JURUTANI GLOBE / NETWORK CTA)
     ═══════════════════════════════════════════════════════════════════════════ --}}
<section class="py-12 sm:py-20 bg-[#EFF5EE]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="cta-globe-card p-8 sm:p-14 text-white relative">
            {{-- Decorative Rings & Glow --}}
            <div class="cta-deco-ring cta-deco-ring-1"></div>
            <div class="cta-deco-ring cta-deco-ring-2"></div>
            <div class="absolute -top-20 -left-20 w-80 h-80 bg-lime-400 rounded-full opacity-10 blur-3xl pointer-events-none"></div>

            <div class="max-w-2xl relative z-10">
                <span class="inline-block text-[11px] font-bold uppercase tracking-widest text-[#B4E3AF] mb-3 bg-white/10 px-3 py-1 rounded-full border border-white/20 backdrop-blur-xs">
                    ✦ Mulai Perjalanan Tani &amp; Kebunmu Sekarang ✦
                </span>
                <h2 class="text-3xl sm:text-5xl font-black text-white leading-tight font-serif-title mb-4">
                    Wujudkan Tanaman Subur &amp; Panen Melimpah Hari Ini
                </h2>
                <p class="text-xs sm:text-base text-[#D4E8D2] leading-relaxed mb-8">
                    Jangan biarkan hama atau daun layu merusak kebun impianmu. Gabung bersama ekosistem Hallobun, diskusikan langsung bersama pakar agrikultur, dan rasakan kepuasan berkebun yang asri.
                </p>

                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                    <a href="{{ route('register') }}" class="px-8 py-4 rounded-2xl bg-white text-[#21371F] font-extrabold text-sm sm:text-base text-center hover:bg-[#F2F6F1] shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all">
                        Daftar Akun Gratis Sekarang
                    </a>
                    <a href="{{ route('konsultasi.index') }}" class="px-7 py-4 rounded-2xl bg-transparent border border-white/40 hover:bg-white/15 text-white font-semibold text-sm sm:text-base text-center transition-all">
                        Jelajahi Konsultan Kami →
                    </a>
                </div>
            </div>

            {{-- Subtle Watermark Globe/Sprout Icon on Desktop --}}
            <div class="hidden lg:flex absolute right-12 top-1/2 -translate-y-1/2 w-72 h-72 rounded-full border border-white/10 items-center justify-center pointer-events-none">
                <div class="w-56 h-56 rounded-full border border-dashed border-white/15 flex items-center justify-center">
                    <div class="w-40 h-40 rounded-full bg-gradient-to-br from-emerald-600/30 to-transparent flex items-center justify-center text-7xl shadow-inner">
                        🌿
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@push('scripts')
<script>
    var homeCurrentSlide = 0;
    var homeSlideInterval = null;
    var homeAdminWaNumber = "{{ preg_replace('/[^0-9]/', '', config('hallobun.admin_phone', '6281234567890')) }}";

    function goToHomeSlide(idx) {
        var slides = document.querySelectorAll('#homeSlider .slider-slide');
        var dots = document.querySelectorAll('#homeSliderDots .home-slider-dot');
        if (!slides.length) return;
        homeCurrentSlide = (idx + slides.length) % slides.length;
        slides.forEach(function(s, i) {
            if (i === homeCurrentSlide) {
                s.classList.add('active');
            } else {
                s.classList.remove('active');
            }
        });
        dots.forEach(function(d, i) {
            if (i === homeCurrentSlide) {
                d.className = 'home-slider-dot w-5 h-1.5 rounded-full bg-emerald-800 transition-all';
            } else {
                d.className = 'home-slider-dot w-1.5 h-1.5 rounded-full bg-emerald-300 transition-all';
            }
        });
    }

    function selectHomeSymptom(el, symptom) {
        var chips = document.querySelectorAll('.home-symptom-chip');
        chips.forEach(function(c) {
            c.classList.remove('bg-emerald-600', 'text-white', 'border-emerald-600', 'shadow-xs');
            c.classList.add('bg-gray-50', 'text-gray-700', 'border-gray-200');
        });
        el.classList.remove('bg-gray-50', 'text-gray-700', 'border-gray-200');
        el.classList.add('bg-emerald-600', 'text-white', 'border-emerald-600', 'shadow-xs');

        var label = document.getElementById('homeSymptomLabel');
        if (label) label.textContent = '✓ ' + symptom;

        var encodedMsg = encodeURIComponent("Halo Hallobun, saya ingin berkonsultasi mengenai keluhan tanaman saya: " + symptom + ". Mohon rekomendasi jadwal dan pakar yang cocok 🙏");
        var waUrl = "https://wa.me/" + homeAdminWaNumber + "?text=" + encodedMsg;

        var chatBtn = document.getElementById('homeChannelChatBtn');
        if (chatBtn) chatBtn.href = waUrl;
    }

    // Dynamic Weather Region data (JuruTani Weather simulation)
    var weatherData = {
        'jabodetabek': {
            name: 'Jabodetabek & Sekitarnya',
            temp: '29°C',
            humidity: '74%',
            wind: '12 km/h',
            icon: '⛅',
            advisory: 'Cuaca cerah berawan sangat ideal untuk penyemprotan pupuk daun dan asam amino sebelum pukul 10:00 WIB. Jaga aerasi polybag dan periksa drainase pot agar terhindar dari jamur akar.'
        },
        'jabar': {
            name: 'Jawa Barat (Bandung & Sekitarnya)',
            temp: '24°C',
            humidity: '82%',
            wind: '9 km/h',
            icon: '🌦️',
            advisory: 'Suhu sejuk dengan kelembaban tinggi. Waspadai embun bulu (downy mildew) pada sayuran daun. Kurangi frekuensi penyiraman sore hari dan gunakan fungisida nabati secara berkala.'
        },
        'jateng': {
            name: 'Jawa Tengah & DIY (Magelang, Boyolali)',
            temp: '28°C',
            humidity: '70%',
            wind: '14 km/h',
            icon: '☀️',
            advisory: 'Sinar matahari melimpah sangat baik untuk pembesaran buah cabai dan tomat. Pastikan kebutuhan air tercukupi pada pagi hari dan periksa ketersediaan mulsa penutup tanah.'
        },
        'jatim': {
            name: 'Jawa Timur (Malang, Batu, Surabaya)',
            temp: '27°C',
            humidity: '72%',
            wind: '15 km/h',
            icon: '🌤️',
            advisory: 'Kondisi angin sedang. Cocok untuk aplikasi pupuk organik cair dan pemangkasan tunas air (pruning) pada tanaman buah dan hortikultura.'
        },
        'luarjawa': {
            name: 'Sumatera & Luar Jawa',
            temp: '30°C',
            humidity: '76%',
            wind: '11 km/h',
            icon: '⛅',
            advisory: 'Kondisi hangat tropis. Waktu tepat untuk pemupukan NPK berimbang dan pengomposan jerami/sisa panen sebagai pembenah tanah alami.'
        }
    };

    function updateWeatherDisplay(regionKey) {
        var data = weatherData[regionKey];
        if (!data) return;
        document.getElementById('weatherCityName').textContent = data.name;
        document.getElementById('weatherTemp').textContent = data.temp;
        document.getElementById('weatherHumidity').textContent = data.humidity;
        document.getElementById('weatherWind').textContent = data.wind;
        document.getElementById('weatherConditionIcon').textContent = data.icon;
        document.getElementById('weatherAdvisoryText').textContent = data.advisory;
    }

    // Auto rotate hero slider
    document.addEventListener('DOMContentLoaded', function() {
        if (document.getElementById('homeSlider')) {
            homeSlideInterval = setInterval(function() {
                goToHomeSlide(homeCurrentSlide + 1);
            }, 4500);
        }
    });
</script>
@endpush

@endsection
