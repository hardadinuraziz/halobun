@extends('layouts.app')

@section('title', 'Layanan Pertanian & Berkebun Terpadu — Hallobun')
@section('meta_description', 'Layanan pertanian dan berkebun terintegrasi dari olah tanah hingga panen: konsultasi video call, pelatihan, kunjungan lapangan, sarana kebun, peternakan terpadu, dan riset uji tanah.')

@push('styles')
<style>
    :root {
        --sage:#8BAF89;--sage-pale:#EBF4EA;--clay:#C28060;--clay-pale:#FDF0E8;
        --linen:#F8FAF7;--mint:#D4EDD4;--butter:#FBF3D5;--lavender:#EBE6F5;
        --peach:#FDEBD8;--sky:#DFF0F8;--forest:#2E4A2C;
    }
    @keyframes float-slow{0%,100%{transform:translateY(0) rotate(0deg)}50%{transform:translateY(-14px) rotate(3deg)}}
    @keyframes float-mid{0%,100%{transform:translateY(0)}50%{transform:translateY(-9px)}}
    @keyframes float-fast{0%,100%{transform:translateY(0)}50%{transform:translateY(-5px)}}
    @keyframes pulse-soft{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.7;transform:scale(0.94)}}
    @keyframes card-in{from{opacity:0;transform:translateY(32px)}to{opacity:1;transform:translateY(0)}}
    @keyframes img-shine{0%{left:-100%}100%{left:200%}}
    .float-slow{animation:float-slow 5s ease-in-out infinite}
    .float-mid{animation:float-mid 3.8s ease-in-out infinite}
    .float-fast{animation:float-fast 2.5s ease-in-out infinite}
    .pulse-soft{animation:pulse-soft 2.5s ease-in-out infinite}
    .svc-card{animation:card-in .6s ease both}
    .svc-card:nth-child(1){animation-delay:.05s}.svc-card:nth-child(2){animation-delay:.13s}
    .svc-card:nth-child(3){animation-delay:.21s}.svc-card:nth-child(4){animation-delay:.29s}
    .svc-card:nth-child(5){animation-delay:.37s}.svc-card:nth-child(6){animation-delay:.45s}
    .svc-card:nth-child(7){animation-delay:.53s}
    .hero-pastel{background:linear-gradient(145deg,#C8DEC6 0%,#D4EDD4 28%,#EBF4EA 52%,#FBF3D5 76%,#FDEBD8 100%)}
    .card-hover-soft{transition:transform .35s cubic-bezier(.4,0,.2,1),box-shadow .35s ease}
    .card-hover-soft:hover{transform:translateY(-8px);box-shadow:0 24px 48px -12px rgba(65,99,64,.18)}
    .img-card{overflow:hidden;position:relative}
    .img-card img{transition:transform .5s ease}
    .img-card:hover img{transform:scale(1.07)}
    .img-card::after{content:'';position:absolute;top:0;left:-100%;width:60%;height:100%;background:linear-gradient(90deg,transparent,rgba(255,255,255,.25),transparent);animation:img-shine 3.5s ease-in-out infinite}
    .badge-pill{background:rgba(255,255,255,.75);backdrop-filter:blur(8px);border:1px solid rgba(139,175,137,.35);color:var(--forest);font-size:.65rem;font-weight:800;letter-spacing:.08em;text-transform:uppercase;padding:.35rem .85rem;border-radius:9999px;display:inline-flex;align-items:center;gap:.4rem}
    .faq-item{transition:box-shadow .25s}
    .faq-item:hover{box-shadow:0 4px 24px rgba(139,175,137,.18)}
</style>
@endpush

@section('content')

{{-- ═══ HERO ═══════════════════════════════════════════════════════════════════ --}}
<section class="hero-pastel relative overflow-hidden">
    {{-- Blob backgrounds --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-32 -left-32 w-[500px] h-[500px] bg-[#C8DEC6] rounded-full opacity-50 blur-3xl float-slow"></div>
        <div class="absolute bottom-0 right-0 w-[420px] h-[420px] bg-[#FBF3D5] rounded-full opacity-60 blur-3xl float-mid"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 pt-12 pb-4 sm:pt-16 md:pt-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-end">
            {{-- Left: Text --}}
            <div class="pb-10 sm:pb-16 md:pb-20">
                <div class="badge-pill mb-5 sm:mb-6 max-w-full">
                    <span class="w-2 h-2 rounded-full bg-[#8BAF89] pulse-soft inline-block flex-shrink-0"></span>
                    <span class="truncate">Layanan Kebun &amp; Pertanian Terpadu</span>
                </div>
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-[#2E4A2C] leading-[1.15] mb-4 sm:mb-5">
                    Solusi Agribisnis<br class="hidden sm:inline">
                    <span class="text-[#C28060]">dari Hulu</span><br class="hidden sm:inline">
                    <span class="text-[#C28060]"> hingga Hilir</span>
                </h1>
                <p class="text-[#4A6348] text-base sm:text-lg leading-relaxed mb-6 sm:mb-8 max-w-md">
                    Baik pekebun rumahan, greenhouse, kelompok tani, hingga perkebunan komersial — tim agronomis Hallobun siap mendampingi Anda tumbuh subur &amp; berkelanjutan.
                </p>
                <div class="flex flex-wrap gap-2 sm:gap-3 mb-6 sm:mb-8">
                    <span class="badge-pill">⭐ 98% Pekebun Puas</span>
                    <span class="badge-pill">🌿 100+ Agronomis</span>
                    <span class="badge-pill">🏡 Seluruh Indonesia</span>
                </div>
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                    <a href="{{ route('konsultasi.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#4A7A48] hover:bg-[#3B6039] text-white font-bold px-6 py-3.5 rounded-2xl shadow-md hover:shadow-lg transition-all hover:-translate-y-0.5 text-sm">
                        Mulai Konsultasi Sekarang →
                    </a>
                    <a href="#layanan-grid" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 border-2 border-[#8BAF89] text-[#3B6039] hover:bg-[#EBF4EA] font-bold px-6 py-3.5 rounded-2xl transition-all text-sm">
                        Lihat Semua Layanan ↓
                    </a>
                </div>
            </div>

            {{-- Right: Hero illustration image --}}
            <div class="hidden lg:block relative">
                <div class="rounded-t-3xl overflow-hidden shadow-2xl float-slow" style="animation-delay:.3s">
                    <img src="/images/layanan/hero.jpg"
                         alt="Kebun dan pertanian Indonesia yang subur"
                         class="w-full object-cover"
                         style="max-height:460px;object-position:center bottom">
                </div>
                {{-- Floating badge on image --}}
                <div class="absolute top-6 -left-6 bg-white rounded-2xl shadow-lg px-4 py-3 flex items-center gap-3 float-fast" style="animation-delay:.5s">
                    <div class="w-10 h-10 bg-[#EBF4EA] rounded-xl flex items-center justify-center text-xl">🌱</div>
                    <div>
                        <div class="font-extrabold text-[#2E4A2C] text-sm">Tumbuh Subur</div>
                        <div class="text-[#8BAF89] text-xs">Bersama Hallobun</div>
                    </div>
                </div>
                <div class="absolute -bottom-4 right-4 bg-white rounded-2xl shadow-lg px-4 py-3 float-mid" style="animation-delay:.9s">
                    <div class="font-extrabold text-[#2E4A2C] text-sm">⭐ 4.9/5.0</div>
                    <div class="text-[#8BAF89] text-xs">Rating Pekebun</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Wave --}}
    <div class="relative z-0">
        <svg viewBox="0 0 1440 64" preserveAspectRatio="none" class="w-full h-12 md:h-16 block" fill="none">
            <path d="M0 42 C360 0 1080 80 1440 22 L1440 64 L0 64Z" fill="#F8FAF7"/>
        </svg>
    </div>
</section>

{{-- ═══ SERVICES GRID ════════════════════════════════════════════════════════ --}}
<section id="layanan-grid" class="py-20 md:py-28 bg-[#F8FAF7]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="inline-block bg-[#EBF4EA] text-[#3B6039] text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider mb-3 border border-[#C8DEC6]">
                🌿 Katalog Solusi Kami
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#2E4A2C] mt-1">
                Pilih Layanan Sesuai<br>Kebutuhan Kebun Anda
            </h2>
            <p class="text-[#5A6D59] mt-3 text-base leading-relaxed">
                Dari konsultasi digital instan, survei fisik on-site, penyediaan sarana organik, hingga riset laboratorium tanah.
            </p>
        </div>

        @php
        $serviceImages = [
            'produksi.jpg','konsultasi.jpg','pelatihan.jpg','kunjungan.jpg',
            'sarana.jpg','peternakan.jpg','riset.jpg'
        ];
        $cardAccents = [
            ['bg'=>'#EBF4EA','border'=>'#C8DEC6','badge_bg'=>'#D4EDD4','badge_text'=>'#2E4A2C'],
            ['bg'=>'#FDF0E8','border'=>'#EDCBB5','badge_bg'=>'#FDEBD8','badge_text'=>'#7A3A1A'],
            ['bg'=>'#EBE6F5','border'=>'#D8CFEE','badge_bg'=>'#DDD6F3','badge_text'=>'#3D2A6E'],
            ['bg'=>'#FBF3D5','border'=>'#EFE2A0','badge_bg'=>'#F5E9A0','badge_text'=>'#5A4A00'],
            ['bg'=>'#DFF0F8','border'=>'#B8DCF0','badge_bg'=>'#C8E8F8','badge_text'=>'#1A4A6A'],
            ['bg'=>'#D4EDD4','border'=>'#B2D9B2','badge_bg'=>'#BEE3BE','badge_text'=>'#1A4A1A'],
            ['bg'=>'#FDEBD8','border'=>'#F5CEAC','badge_bg'=>'#F8D8B8','badge_text'=>'#6A3010'],
        ];
        @endphp

        <div class="grid gap-7 md:grid-cols-2 lg:grid-cols-3">
            @foreach($services as $idx => $service)
            @php
                $accent = $cardAccents[$idx % count($cardAccents)];
                $imgFile = $serviceImages[$idx] ?? 'produksi.jpg';
            @endphp
            <div class="svc-card card-hover-soft rounded-3xl overflow-hidden flex flex-col shadow-sm border"
                 style="background:{{ $accent['bg'] }};border-color:{{ $accent['border'] }}">

                {{-- Illustration image --}}
                <div class="img-card h-48 overflow-hidden relative">
                    <img src="/images/layanan/{{ $imgFile }}"
                         alt="{{ $service['title'] }}"
                         class="w-full h-full object-cover"
                         loading="lazy">
                    {{-- Badge overlay on image --}}
                    <div class="absolute top-3 right-3">
                        <span class="text-[10px] font-black uppercase tracking-widest px-2.5 py-1 rounded-full backdrop-blur-sm shadow-sm border"
                              style="background:{{ $accent['badge_bg'] }};color:{{ $accent['badge_text'] }};border-color:{{ $accent['border'] }}">
                            {{ $service['badge'] }}
                        </span>
                    </div>
                </div>

                {{-- Card content --}}
                <div class="p-6 flex flex-col flex-1">
                    <h3 class="text-lg font-extrabold text-[#2E4A2C] leading-snug mb-0.5 group-hover:text-[#C28060] transition-colors">
                        {{ $service['title'] }}
                    </h3>
                    <p class="text-[10px] font-bold text-[#839782] uppercase tracking-widest mb-3">
                        {{ $service['title_en'] }}
                    </p>
                    <p class="text-[#4A5D49] text-sm leading-relaxed mb-4 flex-1">
                        {{ $service['description'] }}
                    </p>

                    {{-- Feature pills --}}
                    <div class="flex flex-wrap gap-1.5 mb-5">
                        @foreach(array_slice($service['features'], 0, 3) as $feature)
                        <span class="inline-flex items-center gap-1 text-[10px] font-semibold px-2.5 py-1 rounded-full bg-white/70 text-[#3B4F3A] border border-white/80">
                            <svg class="w-2.5 h-2.5 text-[#8BAF89]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            {{ $feature }}
                        </span>
                        @endforeach
                    </div>

                    {{-- CTA --}}
                    <a href="{{ $service['action_url'] }}"
                       class="inline-flex items-center gap-2 text-sm font-bold transition-all group/link"
                       style="color:{{ $accent['badge_text'] }}">
                        <span class="group-hover/link:underline">{{ $service['action_text'] }}</span>
                        <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach

            {{-- 7th card: wide CTA card (spans 2 columns on desktop) --}}
        </div>
    </div>
</section>

{{-- ═══ HOW IT WORKS — illustrated steps ═══════════════════════════════════ --}}
<section class="py-16 bg-[#EBF4EA]">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="inline-block bg-white text-[#3B6039] text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider mb-3 border border-[#C8DEC6]">Cara Kerja</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#2E4A2C]">Mudah, Cepat, Terpercaya</h2>
            <p class="text-[#5A6D59] mt-2 text-sm max-w-lg mx-auto">Tiga langkah sederhana untuk mulai berkonsultasi dan mendapat pendampingan agronomis profesional.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            {{-- Step 1 --}}
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-[#C8DEC6] flex flex-col float-slow" style="animation-delay:0s">
                <div class="h-40 overflow-hidden relative">
                    <img src="/images/layanan/konsultasi.jpg" alt="Pilih Layanan" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#EBF4EA]/80 to-transparent"></div>
                    <div class="absolute bottom-3 left-4">
                        <span class="w-9 h-9 bg-[#8BAF89] text-white rounded-full flex items-center justify-center font-black text-base shadow-md">1</span>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-extrabold text-[#2E4A2C] mb-1.5">Pilih Layanan</h3>
                    <p class="text-[#5A6D59] text-sm leading-relaxed">Telusuri 7 layanan kami dan pilih yang paling sesuai kebutuhan kebun Anda.</p>
                </div>
            </div>

            {{-- Step 2 --}}
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-[#EDCBB5] flex flex-col float-mid" style="animation-delay:.4s">
                <div class="h-40 overflow-hidden relative">
                    <img src="/images/layanan/pelatihan.jpg" alt="Jadwalkan Sesi" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#FDF0E8]/80 to-transparent"></div>
                    <div class="absolute bottom-3 left-4">
                        <span class="w-9 h-9 bg-[#C28060] text-white rounded-full flex items-center justify-center font-black text-base shadow-md">2</span>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-extrabold text-[#2E4A2C] mb-1.5">Jadwalkan Sesi</h3>
                    <p class="text-[#5A6D59] text-sm leading-relaxed">Tentukan waktu konsultasi atau kunjungan yang paling nyaman bagi Anda.</p>
                </div>
            </div>

            {{-- Step 3 --}}
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-[#B2D9B2] flex flex-col float-fast" style="animation-delay:.8s">
                <div class="h-40 overflow-hidden relative">
                    <img src="/images/layanan/produksi.jpg" alt="Tumbuh dan Panen" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#D4EDD4]/80 to-transparent"></div>
                    <div class="absolute bottom-3 left-4">
                        <span class="w-9 h-9 bg-[#6A9660] text-white rounded-full flex items-center justify-center font-black text-base shadow-md">3</span>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-extrabold text-[#2E4A2C] mb-1.5">Tumbuh &amp; Panen</h3>
                    <p class="text-[#5A6D59] text-sm leading-relaxed">Praktikkan rekomendasi agronomis dan nikmati hasil panen yang optimal &amp; berkelanjutan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══ CTA CALLOUT ════════════════════════════════════════════════════════ --}}
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-[#F8FAF7]">
    <div class="max-w-6xl mx-auto">
        <div class="relative overflow-hidden rounded-3xl border border-[#C8DEC6] shadow-sm">
            {{-- Background image --}}
            <div class="absolute inset-0">
                <img src="/images/layanan/kunjungan.jpg" alt="" class="w-full h-full object-cover opacity-15">
                <div class="absolute inset-0 bg-gradient-to-r from-[#EBF4EA] via-[#EBF4EA]/95 to-[#FBF3D5]/80"></div>
            </div>

            <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 gap-0">
                {{-- Text side --}}
                <div class="p-5 sm:p-8 md:p-12">
                    <span class="inline-block bg-white/80 text-[#3B6039] text-xs font-bold px-3.5 sm:px-4 py-1.5 rounded-full uppercase tracking-wider mb-4 border border-[#C8DEC6]">
                        🪴 Solusi Fleksibel &amp; Kustom
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-[#2E4A2C] mb-3 sm:mb-4 leading-tight">
                        Butuh Paket Khusus<br class="hidden sm:inline"> untuk Kebun Anda?
                    </h2>
                    <p class="text-[#4A6348] text-sm sm:text-base leading-relaxed mb-6 sm:mb-8">
                        Tim agronomis kami dapat merancang program pendampingan spesifik — bibit unggul, uji hara laboratorium, pelatihan kebun, hingga kunjungan rutin sampai masa panen.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $adminPhone) }}?text=Halo%20Hallobun%2C%20saya%20ingin%20paket%20layanan%20kustom"
                           target="_blank" rel="noopener noreferrer"
                           class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 bg-[#25D366] hover:bg-[#20bd5a] text-white font-bold px-6 py-3.5 rounded-2xl shadow-md hover:shadow-lg transition-all hover:-translate-y-0.5 text-sm">
                            <svg class="w-5 h-5 fill-current flex-shrink-0" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                            Konsultasi Paket Kustom
                        </a>
                        <a href="{{ route('kunjungan.index') }}"
                           class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white hover:bg-[#EBF4EA] text-[#3B6039] border-2 border-[#8BAF89] font-bold px-6 py-3.5 rounded-2xl transition-all text-sm hover:-translate-y-0.5">
                            Ajukan Survei Kebun →
                        </a>
                    </div>
                </div>

                {{-- Image side --}}
                <div class="hidden md:block relative">
                    <img src="/images/layanan/peternakan.jpg"
                         alt="Integrasi Pertanian & Peternakan"
                         class="w-full h-full object-cover rounded-r-3xl"
                         style="min-height:320px">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══ FAQ ════════════════════════════════════════════════════════════════ --}}
<section class="py-16 bg-[#F4F7F3] border-t border-[#E3EAE0]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block bg-white text-[#3B6039] text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider mb-3 border border-[#C8DEC6]">Tanya Jawab</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#2E4A2C]">Pertanyaan yang Sering Diajukan</h2>
        </div>
        <div class="space-y-4" x-data="{ active: null }">
            @foreach([
                ['q'=>'Bagaimana cara kerja konsultasi online di Hallobun?','a'=>'Anda cukup memilih konsultan yang sesuai di halaman Konsultasi, menentukan jadwal yang tersedia, dan menyelesaikan pembayaran via QRIS/Transfer Midtrans. Tautan ruang video call interaktif (Jitsi Meet) akan langsung dikirimkan ke WhatsApp Anda.'],
                ['q'=>'Apakah tim Hallobun bisa datang ke luar kota untuk kunjungan lahan?','a'=>'Ya, tim agronomis kami siap melayani kunjungan kebun dan lahan di berbagai kota di Indonesia. Estimasi biaya akomodasi akan dikonfirmasikan secara transparan sebelum jadwal keberangkatan.'],
                ['q'=>'Apakah bibit dan produk sarana di Hallobun bergaransi?','a'=>'Seluruh benih dan bibit yang terdaftar di Hallobun memiliki sertifikasi resmi dari produsen tepercaya dengan garansi daya kecambah tinggi serta panduan SOP semai dari praktisi kami.'],
                ['q'=>'Berapa lama waktu respons setelah pemesanan layanan?','a'=>'Tim kami merespons setiap pemesanan dalam 24–48 jam kerja. Untuk layanan konsultasi online, konfirmasi sesi dikirim otomatis begitu pembayaran berhasil diverifikasi.'],
            ] as $fi => $faq)
            <div class="faq-item bg-white border border-[#E2EAE0] rounded-2xl overflow-hidden">
                <button @click="active = active === {{ $fi }} ? null : {{ $fi }}"
                        class="w-full px-6 py-4 text-left flex items-center justify-between font-bold text-[#2E4A2C] text-base hover:text-[#C28060] transition-colors">
                    <span class="flex items-center gap-3">
                        <span class="w-7 h-7 rounded-full bg-[#EBF4EA] text-[#3B6039] text-xs font-black flex items-center justify-center flex-shrink-0">{{ $fi+1 }}</span>
                        {{ $faq['q'] }}
                    </span>
                    <svg class="w-5 h-5 text-[#8BAF89] flex-shrink-0 transition-transform duration-300" :class="active === {{ $fi }} ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="active === {{ $fi }}" x-collapse class="px-6 pb-5 text-sm text-[#5A6D59] leading-relaxed border-t border-[#EEF2EC] pt-4">
                    {{ $faq['a'] }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
