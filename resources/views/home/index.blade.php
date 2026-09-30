@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

{{-- ═══ HERO SECTION ═══════════════════════════════════════════════════════ --}}
{{-- ═══ HERO SECTION — MOBILE VIEW (INSPIRASI SHINE JOURNEY PASTEL CARD STYLE) ═══ --}}
<section class="block md:hidden bg-gradient-to-b from-[#EEF5EC] via-[#F8FAF7] to-[#F8FAF7] px-4 pt-3 pb-8 border-b border-[#E2EAE0] relative overflow-hidden">
    {{-- Ambient Aura Glows --}}
    <div class="aura-glow aura-glow-1"></div>
    <div class="aura-glow aura-glow-2"></div>

    <div class="max-w-sm mx-auto relative z-10">

        {{-- Top Brand Row --}}
        <div class="flex items-center justify-between mb-2.5 px-0.5">
            <div class="flex items-center gap-2">
                <img src="/images/logo_icon.jpg" alt="Hallobun" class="w-9 h-9 rounded-full object-cover shadow-xs border border-emerald-200 flex-shrink-0 bg-white p-0.5">
                <div>
                    <h2 class="font-extrabold text-gray-900 text-sm leading-tight tracking-tight">Hallobun</h2>
                    <p class="text-[8px] font-bold text-emerald-800 tracking-wider uppercase">Layanan Kebun &amp; Tani Online</p>
                </div>
            </div>

            {{-- Aesthetic Palette Dots (Interactive Theme Switcher) --}}
            <div class="flex items-center gap-1 bg-white/90 px-2 py-1 rounded-full border border-emerald-100 shadow-xs" title="Ganti Tema Warna Pastel">
                <button type="button" onclick="setHallobunTheme('terracotta')" class="theme-chip-btn w-2.5 h-2.5 rounded-full bg-[#8E4A2E] transition-transform hover:scale-125 active:scale-95" aria-label="Tema Terracotta" title="Terracotta"></button>
                <button type="button" onclick="setHallobunTheme('sage')" class="theme-chip-btn w-2.5 h-2.5 rounded-full bg-[#4A7A48] transition-transform hover:scale-125 active:scale-95" aria-label="Tema Sage Green" title="Sage Green"></button>
                <button type="button" onclick="setHallobunTheme('lavender')" class="theme-chip-btn w-2.5 h-2.5 rounded-full bg-[#5D5778] transition-transform hover:scale-125 active:scale-95" aria-label="Tema Lavender" title="Lavender"></button>
                <button type="button" onclick="setHallobunTheme('sky')" class="theme-chip-btn w-2.5 h-2.5 rounded-full bg-[#2B4E63] transition-transform hover:scale-125 active:scale-95" aria-label="Tema Sky Mist" title="Sky Mist"></button>
                <button type="button" onclick="setHallobunTheme('rose')" class="theme-chip-btn w-2.5 h-2.5 rounded-full bg-[#8C3A4E] transition-transform hover:scale-125 active:scale-95" aria-label="Tema Rose Blush" title="Rose Blush"></button>
            </div>

            {{-- Action Pill --}}
            <a href="{{ route('layanan') }}" class="inline-flex items-center gap-1 bg-[#2E4A2C] text-white text-[11px] font-bold px-3 py-1.5 rounded-full shadow-xs hover:bg-[#223820] transition-colors">
                <span>Katalog</span>
                <span>→</span>
            </a>
        </div>

        {{-- Banner Card with Multi-Slide Carousel & Breathing Effect --}}
        <div class="bg-gradient-to-b from-[#E7F0E5] to-white rounded-3xl p-2 sm:p-2.5 border border-[#D5E4D2] shadow-sm mb-3.5 art-card-breathe relative">
            <div class="rounded-2xl overflow-hidden aspect-[16/9] relative shadow-inner bg-[#EBF4EA] flex items-center justify-center slider-container" id="homeMobileSlider">
                {{-- Slide 1 --}}
                <div class="slider-slide active" data-home-slide="0">
                    <img src="/images/hero_banner.jpg" 
                         alt="Konsultasi Berkebun Hallobun" 
                         class="w-full h-full object-cover object-center select-none"
                         loading="eager">
                    <div class="absolute inset-x-0 bottom-0 p-2.5 bg-gradient-to-t from-black/60 via-black/20 to-transparent text-white pointer-events-none">
                        <span class="inline-block text-[8.5px] font-bold bg-white/20 backdrop-blur-xs px-2 py-0.5 rounded-full mb-0.5">✦ Lahan &amp; Kebun Sehat</span>
                        <p class="text-[10.5px] font-semibold leading-tight drop-shadow-sm">Pikiran tenang, tanaman bertumbuh riang</p>
                    </div>
                </div>

                {{-- Slide 2 --}}
                <div class="slider-slide" data-home-slide="1">
                    <img src="/images/layanan/konsultasi.jpg" 
                         alt="Konsultasi Hangat Bersama Agronomis" 
                         class="w-full h-full object-cover object-center select-none"
                         loading="lazy">
                    <div class="absolute inset-x-0 bottom-0 p-2.5 bg-gradient-to-t from-black/60 via-black/20 to-transparent text-white pointer-events-none">
                        <span class="inline-block text-[8.5px] font-bold bg-white/20 backdrop-blur-xs px-2 py-0.5 rounded-full mb-0.5">✦ Teman Cerita Tanaman</span>
                        <p class="text-[10.5px] font-semibold leading-tight drop-shadow-sm">Diskusi santai temukan solusi tepat</p>
                    </div>
                </div>

                {{-- Slide 3 --}}
                <div class="slider-slide" data-home-slide="2">
                    <img src="/images/layanan/pelatihan.jpg" 
                         alt="Edukasi Pekebun & Praktek Tani" 
                         class="w-full h-full object-cover object-center select-none"
                         loading="lazy">
                    <div class="absolute inset-x-0 bottom-0 p-2.5 bg-gradient-to-t from-black/60 via-black/20 to-transparent text-white pointer-events-none">
                        <span class="inline-block text-[8.5px] font-bold bg-white/20 backdrop-blur-xs px-2 py-0.5 rounded-full mb-0.5">✦ Edukasi &amp; Komunitas</span>
                        <p class="text-[10.5px] font-semibold leading-tight drop-shadow-sm">Tumbuh bersama komunitas pekebun se-Indonesia</p>
                    </div>
                </div>

                {{-- Carousel indicators floating pill --}}
                <div class="absolute bottom-2 inset-x-0 flex items-center justify-center z-10 pointer-events-auto">
                    <div class="flex items-center gap-1.5 bg-white/85 backdrop-blur-xs px-3 py-1 rounded-full shadow-xs border border-white/70" id="homeMobileSliderDots">
                        <button type="button" onclick="goToHomeMobileSlide(0)" class="home-mobile-dot w-5 h-1.5 rounded-full bg-emerald-800 transition-all" aria-label="Slide 1"></button>
                        <button type="button" onclick="goToHomeMobileSlide(1)" class="home-mobile-dot w-1.5 h-1.5 rounded-full bg-emerald-300 transition-all" aria-label="Slide 2"></button>
                        <button type="button" onclick="goToHomeMobileSlide(2)" class="home-mobile-dot w-1.5 h-1.5 rounded-full bg-emerald-300 transition-all" aria-label="Slide 3"></button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Headings --}}
        <div class="text-center px-1 mb-2.5">
            <h1 class="text-3xl font-extrabold text-[#243723] tracking-tight font-serif-title mb-0.5">
                Hallobun
            </h1>
            <p class="font-script text-2xl text-[#2F5E2D] font-bold">
                Temani Setiap Langkah Berkebunmu ♡
            </p>
            <p class="text-[12px] text-[#4A6149] leading-relaxed mt-1.5 max-w-xs mx-auto">
                Ruang aman dan terpercaya untuk kamu bercerita seputar tanaman, mengatasi hama, memulihkan kebun yang layu, dan menemukan solusi bersama agronomis berpengalaman.
            </p>
        </div>

        {{-- Interactive Plant Health Symptom Selector --}}
        <div class="mb-3.5 bg-white/85 backdrop-blur-xs p-2.5 rounded-2xl border border-[#DCE8DB] shadow-xs">
            <div class="flex items-center justify-between mb-1.5 px-0.5">
                <span class="text-[10px] font-bold text-gray-600 uppercase tracking-wider flex items-center gap-1">
                    <span>🌱</span> Tanamanmu sedang kenapa?
                </span>
                <span class="text-[9px] text-emerald-700 font-semibold" id="homeSymptomLabel">Pilih gejala</span>
            </div>
            <div class="flex flex-wrap gap-1.5 justify-center" id="homeSymptomChips">
                <button type="button" onclick="selectHomeSymptom(this, 'Daun Menguning & Layu')" class="home-symptom-chip text-[10.5px] font-semibold px-2.5 py-1 rounded-xl bg-white border border-gray-200 text-gray-700 hover:border-emerald-500 hover:bg-emerald-50 transition-all flex items-center gap-1">
                    <span>🍂</span> Daun Kuning
                </button>
                <button type="button" onclick="selectHomeSymptom(this, 'Serangan Hama / Kutu Putih')" class="home-symptom-chip text-[10.5px] font-semibold px-2.5 py-1 rounded-xl bg-white border border-gray-200 text-gray-700 hover:border-emerald-500 hover:bg-emerald-50 transition-all flex items-center gap-1">
                    <span>🐛</span> Hama &amp; Kutu
                </button>
                <button type="button" onclick="selectHomeSymptom(this, 'Batang Layu / Membusuk')" class="home-symptom-chip text-[10.5px] font-semibold px-2.5 py-1 rounded-xl bg-white border border-gray-200 text-gray-700 hover:border-emerald-500 hover:bg-emerald-50 transition-all flex items-center gap-1">
                    <span>🥀</span> Batang Layu
                </button>
                <button type="button" onclick="selectHomeSymptom(this, 'Tanah Keras / Kurang Subur')" class="home-symptom-chip text-[10.5px] font-semibold px-2.5 py-1 rounded-xl bg-white border border-gray-200 text-gray-700 hover:border-emerald-500 hover:bg-emerald-50 transition-all flex items-center gap-1">
                    <span>🌾</span> Tanah Keras
                </button>
                <button type="button" onclick="selectHomeSymptom(this, 'Buah & Bunga Rontok')" class="home-symptom-chip text-[10.5px] font-semibold px-2.5 py-1 rounded-xl bg-white border border-gray-200 text-gray-700 hover:border-emerald-500 hover:bg-emerald-50 transition-all flex items-center gap-1">
                    <span>🍓</span> Buah Rontok
                </button>
            </div>
        </div>

        {{-- Consultation session pills --}}
        <div class="text-center mb-3">
            <span class="text-[11px] font-bold text-gray-500 uppercase tracking-wider block mb-2">
                Pilihan Sesi Konsultasi:
            </span>
            <div class="grid grid-cols-3 gap-2">
                <a id="homeChannelChatBtn" href="{{ route('konsultasi.index') }}" class="flex flex-col items-center justify-center py-2 px-1 bg-white rounded-2xl border border-gray-200 shadow-xs hover:border-emerald-500 hover:bg-emerald-50 transition-all text-gray-700 group">
                    <span class="text-base group-hover:scale-110 transition-transform">💬</span>
                    <span class="text-xs font-bold text-gray-800 mt-0.5">Chat</span>
                    <span class="text-[9px] text-gray-400">WhatsApp</span>
                </a>
                <a id="homeChannelCallBtn" href="{{ route('konsultasi.index') }}" class="flex flex-col items-center justify-center py-2 px-1 bg-white rounded-2xl border border-gray-200 shadow-xs hover:border-emerald-500 hover:bg-emerald-50 transition-all text-gray-700 group">
                    <span class="text-base group-hover:scale-110 transition-transform">📞</span>
                    <span class="text-xs font-bold text-gray-800 mt-0.5">Call</span>
                    <span class="text-[9px] text-gray-400">Panggilan Suara</span>
                </a>
                <a id="homeChannelZoomBtn" href="{{ route('konsultasi.index') }}" class="flex flex-col items-center justify-center py-2 px-1 bg-white rounded-2xl border border-gray-200 shadow-xs hover:border-emerald-500 hover:bg-emerald-50 transition-all text-gray-700 group">
                    <span class="text-base group-hover:scale-110 transition-transform">🎥</span>
                    <span class="text-xs font-bold text-gray-800 mt-0.5">Zoom</span>
                    <span class="text-[9px] text-gray-400">Cek Live Lahan</span>
                </a>
            </div>
        </div>

        {{-- Big Main CTA Button --}}
        <div class="mb-3">
            <a id="homeMainCta" href="{{ route('layanan') }}" class="w-full flex items-center justify-center gap-2 py-3.5 px-6 rounded-2xl bg-[#2E4A2C] hover:bg-[#223820] text-white font-bold text-sm shadow-md transition-all active:scale-[0.98]">
                <span id="homeMainCtaText">Temukan Layanan Kami</span>
                <span>→</span>
            </a>
        </div>

        {{-- Quote --}}
        <div class="text-center py-1 px-3 mb-3">
            <p class="font-script text-xl text-[#2F5E2D] font-bold leading-snug">
                “Langkah kecil hari ini, bisa membawa panen besar esok hari.” ♡
            </p>
        </div>

        {{-- Contact bar --}}
        <div class="pt-2.5 border-t border-[#E3EAE0] text-[10.5px] text-[#5A6D59]">
            <div class="grid grid-cols-2 gap-y-1.5 gap-x-2 text-center">
                <a href="{{ route('home') }}" class="hover:text-emerald-800 truncate">🌐 hallobun.com</a>
                <a href="mailto:info@hallobun.com" class="hover:text-emerald-800 truncate">✉️ info@hallobun.com</a>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', config('hallobun.admin_phone', '6281234567890')) }}" class="hover:text-emerald-800 truncate">📞 +62 812-3456-7890</a>
                <a href="https://instagram.com" class="hover:text-emerald-800 truncate">📷 @hallobun.id</a>
            </div>
        </div>

    </div>
</section>

{{-- ═══ HERO SECTION — TABLET & DESKTOP VIEW ════════════════════════════════ --}}
<section class="hidden md:flex gradient-hero min-h-[70vh] items-center relative overflow-hidden">
    {{-- Decorative pastel garden blobs --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-32 -right-32 w-96 h-96 bg-[#DCEBCA] rounded-full opacity-20 blur-3xl"></div>
        <div class="absolute bottom-0 -left-20 w-80 h-80 bg-[#F7ECC0] rounded-full opacity-20 blur-3xl"></div>
        <div class="absolute top-1/2 left-1/3 -translate-x-1/2 w-[550px] h-[550px] bg-[#CADBCA] rounded-full opacity-15 blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16 lg:py-20 relative z-10 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-flex items-center gap-2 bg-white/15 border border-white/25 text-[#E6F0E5] text-sm font-medium px-4 py-1.5 rounded-full mb-6 backdrop-blur-md shadow-sm">
                    <span class="w-2 h-2 bg-lime-300 rounded-full animate-pulse flex-shrink-0"></span>
                    <span>🌱 Ekosistem Berkebun &amp; Pertanian Modern</span>
                </div>
                <h1 class="text-4xl lg:text-6xl font-extrabold text-white leading-[1.15] mb-5 break-words">
                    Solusi Berkebun &amp; Tani<br>
                    <span class="text-[#E7F0D8]">Cerdas, Asri &amp; Terpercaya</span>
                </h1>
                <p class="text-[#D8E6D7] text-lg leading-relaxed mb-8 max-w-lg">
                    Konsultasikan kendala tanaman, hidroponik, hama kebun hingga perkebunan luas bersama pakar terpercaya. Video call santai, rekomendasi tepat, dan kunjungan on-site di Hallobun.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('konsultasi.index') }}" id="hero-cta-konsultasi"
                       class="bg-[#F8FAF7] text-emerald-800 font-bold px-7 py-3.5 rounded-xl hover:bg-[#EAF1E9] transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5 border border-white/60">
                        Konsultasi Kebun Sekarang →
                    </a>
                    <a href="{{ route('narsum.index') }}"
                       class="glass text-white font-semibold px-7 py-3.5 rounded-xl hover:bg-white/20 transition-all border border-white/30">
                        Undang Narasumber
                    </a>
                </div>

                {{-- Stats --}}
                <div class="flex items-center gap-6 mt-10 pt-6 border-t border-white/15">
                    <div>
                        <div class="text-3xl font-extrabold text-white">{{ number_format($totalKonsultan) }}+</div>
                        <div class="text-[#CADACA] text-sm mt-0.5">Pakar &amp; Agronomis</div>
                    </div>
                    <div class="w-px h-10 bg-white/20"></div>
                    <div>
                        <div class="text-3xl font-extrabold text-white">{{ number_format($totalKonsultasi) }}+</div>
                        <div class="text-[#CADACA] text-sm mt-0.5">Sesi Selesai</div>
                    </div>
                    <div class="w-px h-10 bg-white/20"></div>
                    <div>
                        <div class="text-3xl font-extrabold text-white">98%</div>
                        <div class="text-[#CADACA] text-sm mt-0.5">Pekebun Puas</div>
                    </div>
                </div>
            </div>

            {{-- Hero illustration (card style) --}}
            <div class="hidden lg:block">
                <div class="relative art-card-breathe">
                    <div class="glass rounded-3xl p-5 shadow-2xl border border-white/25">
                        <div class="rounded-2xl overflow-hidden aspect-[16/9] mb-4 relative shadow-inner border border-white/20 bg-emerald-950/40">
                            <img src="/images/hero_banner.jpg" 
                                 alt="Konsultasi Berkebun Hallobun" 
                                 class="w-full h-full object-cover object-center select-none"
                                 loading="eager">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/65 via-transparent to-transparent"></div>
                            <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-white">
                                <div>
                                    <span class="inline-block text-[10px] font-bold bg-white/20 backdrop-blur-xs px-2.5 py-0.5 rounded-full mb-0.5">✦ Temani Setiap Langkah Berkebunmu ♡</span>
                                    <div class="text-xs font-semibold text-emerald-100">Bimbingan agronomis berlisensi langsung ke kebunmu</div>
                                </div>
                                <span class="bg-emerald-400 text-emerald-950 text-xs px-2.5 py-1 rounded-full font-bold shadow-sm">ACTIVE</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-2.5">
                            <a href="{{ route('konsultasi.index') }}" class="bg-white/15 hover:bg-white/25 rounded-xl p-3 text-center border border-white/15 transition-all group">
                                <div class="text-2xl mb-1 group-hover:scale-110 transition-transform">💬</div>
                                <div class="text-white text-xs font-bold">Konsultasi Chat &amp; Call</div>
                                <div class="text-emerald-200 text-[10px]">Tanya jawab fleksibel</div>
                            </a>
                            <a href="{{ route('kunjungan.index') }}" class="bg-white/15 hover:bg-white/25 rounded-xl p-3 text-center border border-white/15 transition-all group">
                                <div class="text-2xl mb-1 group-hover:scale-110 transition-transform">🚜</div>
                                <div class="text-white text-xs font-bold">Kunjungan On-Site</div>
                                <div class="text-emerald-200 text-[10px]">Pakar cek ke kebun</div>
                            </a>
                            <a href="{{ route('narsum.index') }}" class="bg-white/15 hover:bg-white/25 rounded-xl p-3 text-center border border-white/15 transition-all group">
                                <div class="text-2xl mb-1 group-hover:scale-110 transition-transform">🎤</div>
                                <div class="text-white text-xs font-bold">Undang Narsum</div>
                                <div class="text-emerald-200 text-[10px]">Workshop &amp; pelatihan</div>
                            </a>
                            <a href="{{ route('sarana.index') }}" class="bg-white/15 hover:bg-white/25 rounded-xl p-3 text-center border border-white/15 transition-all group">
                                <div class="text-2xl mb-1 group-hover:scale-110 transition-transform">🪴</div>
                                <div class="text-white text-xs font-bold">Bibit &amp; Sarana</div>
                                <div class="text-emerald-200 text-[10px]">Produk uji agronomi</div>
                            </a>
                        </div>
                    </div>
                    {{-- Floating badge --}}
                    <div class="absolute -top-3.5 -right-3.5 bg-gradient-to-r from-amber-300 to-amber-400 text-amber-950 font-bold text-xs sm:text-sm px-4 py-1.5 rounded-full shadow-lg border border-amber-200 flex items-center gap-1.5">
                        <span>⭐</span>
                        <span>4.9/5.0 Dari 1.200+ Pekebun</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══ LAYANAN SECTION ═══════════════════════════════════════════════════ --}}
<section class="py-12 sm:py-20 bg-[#F4F7F3]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10 sm:mb-12">
            <span class="inline-block bg-emerald-100 text-emerald-800 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-2">Layanan Terpadu</span>
            <h2 class="text-2xl sm:text-4xl font-extrabold text-emerald-950 mt-1">Semua Kebutuhan Berkebun<br class="hidden sm:inline"> Ada di Sini</h2>
            <p class="text-[#5A6D59] mt-2 sm:mt-3 text-sm sm:text-base max-w-xl mx-auto">Solusi lengkap dari konsultasi perawatan tanaman, bibit unggul, hingga pendampingan on-site.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            @foreach($layananList as $layanan)
            <a href="{{ $layanan['url'] }}" class="card-hover bg-white/90 border border-[#E2EAE0] rounded-2xl p-5 sm:p-6 text-center group shadow-sm flex flex-col items-center">
                <div class="w-14 h-14 bg-{{ $layanan['color'] }}-100 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-4 group-hover:scale-110 transition-transform shadow-inner flex-shrink-0">
                    {{ $layanan['icon'] }}
                </div>
                <h3 class="font-bold text-gray-900 mb-1.5 group-hover:text-emerald-800 transition-colors text-base">{{ $layanan['title'] }}</h3>
                <p class="text-[#5E715D] text-xs sm:text-sm leading-relaxed flex-1">{{ $layanan['desc'] }}</p>
                <div class="mt-4 text-{{ $layanan['color'] }}-700 text-xs sm:text-sm font-semibold group-hover:underline">
                    Selengkapnya →
                </div>
            </a>
            @endforeach
        </div>

        {{-- Link to Afriba-style full services page --}}
        <div class="mt-8 sm:mt-10 text-center px-2">
            <a href="{{ route('layanan') }}" class="inline-flex items-center justify-center gap-2 max-w-full px-5 py-3 rounded-xl sm:rounded-full bg-emerald-800 hover:bg-emerald-900 text-white font-semibold text-xs sm:text-sm shadow-md hover:shadow-lg transition-all">
                <span class="sm:hidden">Lihat 7 Layanan Komprehensif Kebun →</span>
                <span class="hidden sm:inline">Lihat Katalog 7 Layanan Komprehensif (Produksi, Pelatihan, Uji Tanah, dll.) →</span>
            </a>
        </div>
    </div>
</section>

{{-- ═══ KONSULTAN FEATURED ═══════════════════════════════════════════════ --}}
@if($konsultanFeatured->isNotEmpty())
<section class="py-12 sm:py-20 bg-[#F8FAF7]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-end justify-between mb-8 sm:mb-10">
            <div>
                <span class="inline-block bg-emerald-100 text-emerald-800 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-2">Praktisi & Pakar</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-emerald-950 mt-1">Konsultan Kebun & Pertanian</h2>
            </div>
            <a href="{{ route('konsultasi.index') }}" class="text-emerald-700 font-bold hover:underline text-sm hidden sm:block">
                Lihat Semua Konsultan →
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">
            @foreach($konsultanFeatured as $konsultan)
            <div class="card-hover bg-white border border-[#E2EAE0] rounded-2xl p-5 sm:p-6 shadow-sm flex flex-col">
                <div class="flex items-start gap-3.5 sm:gap-4 mb-4">
                    <div class="w-13 h-13 sm:w-14 sm:h-14 bg-gradient-to-br from-emerald-100 to-emerald-200 border border-emerald-300/40 rounded-2xl flex items-center justify-center text-xl sm:text-2xl font-bold text-emerald-800 flex-shrink-0 shadow-sm">
                        {{ substr($konsultan->user->name, 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-bold text-gray-900 truncate text-base">{{ $konsultan->user->name }}</h3>
                        <p class="text-emerald-700 text-xs sm:text-sm font-medium">{{ $konsultan->spesialisasi }}</p>
                        <div class="flex items-center gap-1 mt-1">
                            <span class="text-amber-500 text-sm">⭐</span>
                            <span class="text-xs sm:text-sm font-semibold text-gray-700">{{ number_format($konsultan->rating, 1) }}</span>
                            <span class="text-gray-400 text-xs">({{ $konsultan->total_konsultasi }} sesi)</span>
                        </div>
                    </div>
                </div>
                @if($konsultan->bio)
                <p class="text-[#5A6D59] text-xs sm:text-sm leading-relaxed mb-4 line-clamp-2 flex-1">{{ $konsultan->bio }}</p>
                @else
                <div class="flex-1"></div>
                @endif
                <div class="flex items-center justify-between pt-4 border-t border-[#EEF2EC] mt-auto">
                    <div>
                        <div class="text-[11px] text-gray-400">Mulai dari</div>
                        <div class="font-bold text-emerald-900 text-base sm:text-lg">Rp {{ number_format($konsultan->harga_per_sesi, 0, ',', '.') }}</div>
                    </div>
                    <a href="{{ route('konsultasi.show', $konsultan) }}" class="bg-emerald-700 hover:bg-emerald-800 text-white text-xs sm:text-sm font-semibold px-4 py-2 rounded-xl transition-colors shadow-sm">
                        Konsultasi
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-6 text-center sm:hidden">
            <a href="{{ route('konsultasi.index') }}" class="inline-block w-full py-3 bg-emerald-50 text-emerald-800 font-bold rounded-xl border border-emerald-200 text-sm">
                Lihat Semua Konsultan →
            </a>
        </div>
    </div>
</section>
@endif

{{-- ═══ HOW IT WORKS ════════════════════════════════════════════════════ --}}
<section class="py-12 sm:py-20 bg-[#F4F7F3]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10 sm:mb-14">
            <span class="inline-block bg-emerald-100 text-emerald-800 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-2">Cara Praktis</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-emerald-950 mt-1">Mudah dalam 4 Langkah</h2>
            <p class="text-[#5A6D59] text-xs sm:text-sm mt-2">Dapatkan bimbingan langsung tanpa ribet</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            @foreach([
                ['step'=>'01','icon'=>'🔍','title'=>'Pilih Konsultan','desc'=>'Pilih pakar kebun & tani yang pas dengan spesialisasi tanaman Anda.'],
                ['step'=>'02','icon'=>'📅','title'=>'Tentukan Jadwal','desc'=>'Pilih tanggal & waktu luang yang paling nyaman untuk sesi konsultasi.'],
                ['step'=>'03','icon'=>'💳','title'=>'Bayar Instan','desc'=>'Selesaikan pembayaran aman via QRIS atau Transfer Bank Midtrans.'],
                ['step'=>'04','icon'=>'📱','title'=>'Mulai Sesi Kebun','desc'=>'Tautan meeting otomatis terkirim via WhatsApp. Sesi video call siap dimulai!'],
            ] as $step)
            <div class="text-center relative bg-white/80 border border-[#E3EAE0] rounded-2xl p-5 sm:p-6 shadow-sm">
                <div class="w-14 h-14 sm:w-16 sm:h-16 bg-emerald-50 border-2 border-emerald-200/80 rounded-2xl flex items-center justify-center text-2xl sm:text-3xl mx-auto mb-3 sm:mb-4 shadow-sm">
                    {{ $step['icon'] }}
                </div>
                <div class="absolute -top-2.5 right-4 w-6 h-6 sm:w-7 sm:h-7 bg-emerald-700 text-white text-[10px] sm:text-xs font-bold rounded-full flex items-center justify-center shadow-md">
                    {{ $step['step'] }}
                </div>
                <h3 class="font-bold text-gray-900 mb-1.5 text-sm sm:text-base">{{ $step['title'] }}</h3>
                <p class="text-[#5A6D59] text-xs sm:text-sm leading-relaxed">{{ $step['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══ CTA SECTION ════════════════════════════════════════════════════ --}}
<section class="py-12 sm:py-16 bg-gradient-to-r from-emerald-800 via-emerald-700 to-emerald-800 relative overflow-hidden text-white">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-10 -right-10 w-72 h-72 bg-[#DCEBCA] rounded-full opacity-15 blur-2xl"></div>
        <div class="absolute -bottom-10 -left-10 w-64 h-64 bg-[#F7ECC0] rounded-full opacity-15 blur-2xl"></div>
    </div>
    <div class="max-w-3xl mx-auto px-4 text-center relative z-10">
        <span class="inline-block bg-white/20 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-3 backdrop-blur-sm">Mulai Hari Ini</span>
        <h2 class="text-2xl sm:text-4xl font-extrabold text-white mb-3 sm:mb-4">Tanaman Subur, Kebun Asri, Hasil Melimpah</h2>
        <p class="text-emerald-100 text-sm sm:text-base mb-6 sm:mb-8 max-w-xl mx-auto">Bergabunglah bersama ribuan pekebun dan petani di seluruh Indonesia yang telah terbantu oleh Hallobun.</p>
        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center">
            <a href="{{ route('register') }}" id="cta-daftar-gratis" class="w-full sm:w-auto text-center justify-center bg-[#F8FAF7] text-emerald-900 font-bold px-7 py-3.5 rounded-xl hover:bg-[#EAF1EA] transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5 border border-white/60 text-sm sm:text-base">
                Daftar Akun Gratis Sekarang
            </a>
            <a href="{{ route('konsultasi.index') }}" class="w-full sm:w-auto text-center justify-center border border-white/40 glass text-white font-semibold px-7 py-3.5 rounded-xl hover:bg-white/20 transition-all text-sm sm:text-base">
                Jelajahi Konsultan
            </a>
        </div>
    </div>
</section>

@push('scripts')
<script>
    var homeCurrentSlide = 0;
    var homeSlideInterval = null;
    var homeAdminWaNumber = "{{ preg_replace('/[^0-9]/', '', config('hallobun.admin_phone', '6281234567890')) }}";

    function goToHomeMobileSlide(idx) {
        var slides = document.querySelectorAll('#homeMobileSlider .slider-slide');
        var dots = document.querySelectorAll('#homeMobileSliderDots .home-mobile-dot');
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
                d.className = 'home-mobile-dot w-5 h-1.5 rounded-full bg-emerald-800 transition-all';
            } else {
                d.className = 'home-mobile-dot w-1.5 h-1.5 rounded-full bg-emerald-300 transition-all';
            }
        });
    }

    function selectHomeSymptom(el, symptom) {
        var chips = document.querySelectorAll('.home-symptom-chip');
        chips.forEach(function(c) {
            c.classList.remove('bg-emerald-600', 'text-white', 'border-emerald-600', 'shadow-xs');
            c.classList.add('bg-white', 'text-gray-700', 'border-gray-200');
        });
        el.classList.remove('bg-white', 'text-gray-700', 'border-gray-200');
        el.classList.add('bg-emerald-600', 'text-white', 'border-emerald-600', 'shadow-xs');

        var label = document.getElementById('homeSymptomLabel');
        if (label) label.textContent = '✓ Terpilih: ' + symptom;

        var encodedMsg = encodeURIComponent("Halo Hallobun, saya ingin berkonsultasi mengenai masalah tanaman saya: " + symptom + ". Mohon bantuan diagnosis dan solusinya 🙏");
        var waUrl = "https://wa.me/" + homeAdminWaNumber + "?text=" + encodedMsg;

        var chatBtn = document.getElementById('homeChannelChatBtn');
        if (chatBtn) chatBtn.href = waUrl;

        var mainCta = document.getElementById('homeMainCta');
        var mainCtaText = document.getElementById('homeMainCtaText');
        if (mainCta && mainCtaText) {
            mainCta.href = waUrl;
            mainCtaText.textContent = "Konsultasi Masalah Ini Sekarang";
        }
    }

    // Auto rotate mobile hero slider
    document.addEventListener('DOMContentLoaded', function() {
        if (document.getElementById('homeMobileSlider')) {
            homeSlideInterval = setInterval(function() {
                goToHomeMobileSlide(homeCurrentSlide + 1);
            }, 4500);
        }
    });
</script>
@endpush

@endsection
