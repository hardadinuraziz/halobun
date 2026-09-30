@extends('layouts.app')

@section('title', 'Layanan Pertanian & Berkebun Terpadu — Hallobun')
@section('meta_description', 'Layanan pertanian dan berkebun terintegrasi dari olah tanah hingga panen bersama praktisi perkebunan dan pakar agronomi berpengalaman.')

@section('content')

{{-- ═══ HERO ═══════════════════════════════════════════════════════════════════ --}}
<section class="bg-gradient-to-b from-white via-[#F0FDF4] to-white border-b border-slate-100 py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            
            {{-- Left Column: Hero Text --}}
            <div class="lg:col-span-7">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold bg-[#F0FDF4] text-[#16A34A] border border-[#BBF7D0] mb-4">
                    <span class="w-2 h-2 rounded-full bg-[#16A34A] animate-pulse"></span>
                    Solusi Pertanian &amp; Berkebun Profesional
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#1E293B] leading-tight mb-4 tracking-tight">
                    Layanan Terpadu<br>
                    <span class="text-[#16A34A]">Praktisi Perkebunan</span> &amp; Pertanian
                </h1>

                <p class="text-slate-600 text-base sm:text-lg leading-relaxed mb-6 max-w-2xl">
                    Dampingi kebun dan agribisnis Anda mulai dari olah tanah, diagnosa hama tanaman, video call bersama pakar agronomi, inspeksi lahan langsung, hingga penyediaan sarana berkualitas.
                </p>

                <div class="flex flex-wrap gap-2.5 mb-8">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-slate-50 border border-slate-200 text-xs font-semibold text-slate-700">
                        ⭐ 98% Pekebun Puas
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-slate-50 border border-slate-200 text-xs font-semibold text-slate-700">
                        🌿 100+ Praktisi Berlisensi
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-slate-50 border border-slate-200 text-xs font-semibold text-slate-700">
                        🇮🇩 Layanan Seluruh Indonesia
                    </span>
                </div>

                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('konsultasi.index') }}"
                       class="inline-flex items-center justify-center gap-2 bg-[#16A34A] hover:bg-[#15803D] text-white font-bold px-6 py-3.5 rounded-xl shadow-sm hover:shadow transition-all text-sm">
                        Konsultasi Praktisi Sekarang
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    <a href="#katalog-layanan"
                       class="inline-flex items-center justify-center gap-2 bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 font-bold px-6 py-3.5 rounded-xl transition-all text-sm">
                        Lihat 7 Layanan Kami
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                </div>
            </div>

            {{-- Right Column: Real Photo Hero --}}
            <div class="lg:col-span-5 relative">
                <div class="relative rounded-2xl overflow-hidden shadow-lg border border-slate-100 bg-white">
                    <img src="/images/halobun_real_practitioner.jpg"
                         alt="Praktisi Perkebunan Indonesia"
                         class="w-full h-80 sm:h-96 object-cover object-center">
                    
                    {{-- Floating Trust Badge --}}
                    <div class="absolute bottom-4 left-4 right-4 bg-white/95 backdrop-blur-md rounded-xl p-3 border border-slate-100 shadow-sm flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-[#F0FDF4] text-[#16A34A] flex items-center justify-center font-bold text-lg">
                                👨‍🌾
                            </div>
                            <div>
                                <div class="text-xs font-bold text-slate-900">Praktisi Perkebunan &amp; Agronomi</div>
                                <div class="text-[11px] text-slate-500">Pendampingan ilmiah terpercaya</div>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-xs font-extrabold text-[#16A34A]">Rating 4.9/5</div>
                            <div class="text-[10px] text-slate-400">Terverifikasi</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ═══ SERVICES CATALOG ═══════════════════════════════════════════════════════ --}}
<section id="katalog-layanan" class="py-14 sm:py-20 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-[#F0FDF4] text-[#16A34A] border border-[#BBF7D0] mb-2">
                Katalog Layanan Lengkap
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#1E293B]">
                Solusi Agribisnis &amp; Berkebun untuk Anda
            </h2>
            <p class="text-slate-500 mt-2 text-sm sm:text-base">
                Pilih layanan sesuai kebutuhan, mulai dari sesi tanya jawab online, kunjungan fisik lapangan, hingga penyediaan sarana produksi.
            </p>
        </div>

        @php
        $servicePhotos = [
            'crop-production' => '/images/halobun_real_hydroponics.jpg',
            'consulting'      => '/images/halobun_real_practitioner.jpg',
            'training'        => '/images/halobun_real_training.jpg',
            'field-visit'     => '/images/halobun_real_pest_control.jpg',
            'seed-supply'     => '/images/halobun_real_sarana.jpg',
            'livestock'       => '/images/halobun_real_livestock.jpg',
            'rd-testing'      => '/images/halobun_real_soil_test.jpg',
        ];
        @endphp

        {{-- Grid of 7 Services --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($services as $idx => $service)
            @php
                $photo = $servicePhotos[$service['id']] ?? '/images/halobun_real_practitioner.jpg';
            @endphp
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-md transition-all duration-200 flex flex-col group">
                
                {{-- Real Image Thumbnail --}}
                <div class="relative h-48 overflow-hidden bg-slate-100">
                    <img src="{{ $photo }}"
                         alt="{{ $service['title'] }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                         loading="lazy">
                    
                    {{-- Category Badge --}}
                    <div class="absolute top-3 left-3">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-[11px] font-bold bg-white/95 text-slate-800 shadow-sm backdrop-blur-sm border border-slate-100">
                            {{ $service['badge'] }}
                        </span>
                    </div>

                    {{-- Icon Badge --}}
                    <div class="absolute bottom-3 right-3 w-9 h-9 rounded-xl bg-white/95 text-slate-800 shadow-sm flex items-center justify-center text-lg backdrop-blur-sm">
                        {{ $service['icon'] }}
                    </div>
                </div>

                {{-- Content Body --}}
                <div class="p-5 sm:p-6 flex flex-col flex-1">
                    <div class="text-[11px] font-bold text-[#16A34A] uppercase tracking-wider mb-1">
                        {{ $service['title_en'] }}
                    </div>
                    <h3 class="text-lg font-bold text-[#1E293B] mb-2 leading-snug group-hover:text-[#16A34A] transition-colors">
                        {{ $service['title'] }}
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-4 flex-1">
                        {{ $service['description'] }}
                    </p>

                    {{-- Key Features List --}}
                    <div class="space-y-1.5 mb-6 pt-3 border-t border-slate-100">
                        @foreach(array_slice($service['features'], 0, 3) as $feature)
                        <div class="flex items-start gap-2 text-xs text-slate-700">
                            <svg class="w-3.5 h-3.5 text-[#16A34A] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>{{ $feature }}</span>
                        </div>
                        @endforeach
                    </div>

                    {{-- Action Button --}}
                    <div class="pt-2">
                        <a href="{{ $service['action_url'] }}"
                           class="w-full inline-flex items-center justify-center gap-2 bg-[#F0FDF4] hover:bg-[#16A34A] text-[#16A34A] hover:text-white font-bold px-4 py-2.5 rounded-xl border border-[#BBF7D0] hover:border-[#16A34A] text-sm transition-all">
                            <span>{{ $service['action_text'] }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ═══ CARA KERJA (HOW IT WORKS) ═════════════════════════════════════════════ --}}
<section class="py-14 sm:py-20 bg-white border-y border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-[#F0FDF4] text-[#16A34A] border border-[#BBF7D0] mb-2">
                Mudah &amp; Transparan
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#1E293B]">
                3 Langkah Praktis Mulai di Hallobun
            </h2>
            <p class="text-slate-500 mt-2 text-sm sm:text-base">
                Proses cepat dan aman untuk mendapatkan bimbingan dari praktisi perkebunan terpercaya.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            {{-- Step 1 --}}
            <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200 relative flex flex-col">
                <div class="w-10 h-10 rounded-xl bg-[#16A34A] text-white flex items-center justify-center font-extrabold text-base mb-4 shadow-sm">
                    1
                </div>
                <div class="rounded-xl overflow-hidden h-36 mb-4 bg-slate-200">
                    <img src="/images/halobun_real_practitioner.jpg" alt="Pilih Layanan" class="w-full h-full object-cover">
                </div>
                <h3 class="font-bold text-slate-900 text-lg mb-1">Pilih Layanan &amp; Praktisi</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Tentukan layanan yang Anda butuhkan (konsultasi online, survei kebun, atau narasumber) dan pilih praktisi sesuai spesialisasi.
                </p>
            </div>

            {{-- Step 2 --}}
            <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200 relative flex flex-col">
                <div class="w-10 h-10 rounded-xl bg-[#16A34A] text-white flex items-center justify-center font-extrabold text-base mb-4 shadow-sm">
                    2
                </div>
                <div class="rounded-xl overflow-hidden h-36 mb-4 bg-slate-200">
                    <img src="/images/halobun_real_training.jpg" alt="Jadwalkan & Bayar" class="w-full h-full object-cover">
                </div>
                <h3 class="font-bold text-slate-900 text-lg mb-1">Tentukan Jadwal &amp; Konfirmasi</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Pilih jam sesi yang cocok dan selesaikan pembayaran aman via QRIS atau transfer otomatis. Tautan sesi dikirim langsung ke WhatsApp.
                </p>
            </div>

            {{-- Step 3 --}}
            <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200 relative flex flex-col">
                <div class="w-10 h-10 rounded-xl bg-[#16A34A] text-white flex items-center justify-center font-extrabold text-base mb-4 shadow-sm">
                    3
                </div>
                <div class="rounded-xl overflow-hidden h-36 mb-4 bg-slate-200">
                    <img src="/images/halobun_real_hydroponics.jpg" alt="Sesi Berjalan" class="w-full h-full object-cover">
                </div>
                <h3 class="font-bold text-slate-900 text-lg mb-1">Pendampingan &amp; Tumbuh Subur</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Dapatkan resep pemupukan, panduan pengendalian hama, atau SOP kebun langsung dari praktisi untuk hasil panen optimal.
                </p>
            </div>

        </div>

    </div>
</section>

{{-- ═══ CUSTOM CONSULTATION CALLOUT ═══════════════════════════════════════════ --}}
<section class="py-14 sm:py-20 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm">
            <div class="grid grid-cols-1 lg:grid-cols-12 items-center">
                
                <div class="p-8 sm:p-12 lg:col-span-7">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-[#F0FDF4] text-[#16A34A] border border-[#BBF7D0] mb-3">
                        Program Khusus &amp; Kustom
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-[#1E293B] mb-3">
                        Butuh Paket Pendampingan Khusus untuk Perkebunan Anda?
                    </h2>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed mb-6">
                        Kami menyediakan paket pendampingan intensif untuk greenhouse komersial, kelompok tani perkebunan, dan instansi. Mulai dari audit kesuburan tanah laboratorium, formulasi pupuk presisi, hingga pendampingan rutin hingga masa panen.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $adminPhone) }}?text=Halo%20Hallobun%2C%20saya%20ingin%20berkonsultasi%20mengenai%20paket%20layanan%20kustom"
                           target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center justify-center gap-2 bg-[#25D366] hover:bg-[#20bd5a] text-white font-bold px-6 py-3.5 rounded-xl shadow-sm text-sm transition-all">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                            Diskusikan via WhatsApp
                        </a>
                        <a href="{{ route('kunjungan.index') }}"
                           class="inline-flex items-center justify-center gap-2 bg-white hover:bg-slate-50 text-slate-800 border border-slate-200 font-bold px-6 py-3.5 rounded-xl text-sm transition-all">
                            Ajukan Kunjungan Lahan
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-5 h-72 lg:h-full relative overflow-hidden bg-slate-100">
                    <img src="/images/halobun_real_pest_control.jpg"
                         alt="Inspeksi Praktisi Perkebunan"
                         class="w-full h-full object-cover">
                </div>

            </div>
        </div>
    </div>
</section>

{{-- ═══ FAQ SECTION ═══════════════════════════════════════════════════════════ --}}
<section class="py-14 sm:py-20 bg-white border-t border-slate-100">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-10">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-[#F0FDF4] text-[#16A34A] border border-[#BBF7D0] mb-2">
                Tanya Jawab
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#1E293B]">
                Pertanyaan yang Sering Diajukan
            </h2>
        </div>

        <div class="space-y-3" x-data="{ active: null }">
            @foreach([
                ['q'=>'Bagaimana cara konsultasi video call dengan praktisi kebun?','a'=>'Pilih praktisi atau pakar agronomi di halaman Konsultasi, tentukan jadwal yang tersedia, dan selesaikan pembayaran via QRIS atau transfer Midtrans. Tautan ruang konsultasi video interaktif (Jitsi Meet) akan dikirimkan otomatis ke WhatsApp Anda.'],
                ['q'=>'Apakah tim praktisi Hallobun bisa datang ke luar kota untuk kunjungan lahan?','a'=>'Bisa. Tim praktisi perkebunan dan agronomi kami melayani kunjungan kebun, pekarangan, dan greenhouse di berbagai kota di Indonesia. Rincian akomodasi dan jadwal akan dikonfirmasikan transparan sebelum keberangkatan.'],
                ['q'=>'Apakah benih dan bibit di Toko Sarana Hallobun bergaransi?','a'=>'Seluruh benih dan bibit yang tersedia di Hallobun memiliki sertifikasi resmi dari produsen tepercaya dengan garansi daya kecambah tinggi serta panduan penyemaian langsung dari praktisi kami.'],
                ['q'=>'Berapa lama proses konfirmasi pemesanan layanan?','a'=>'Untuk konsultasi online, jadwal terkonfirmasi secara instan setelah pembayaran berhasil diverifikasi otomatis oleh sistem. Untuk kunjungan lapangan atau narasumber, tim kami mengonfirmasi maksimal dalam 1x24 jam kerja.'],
            ] as $fi => $faq)
            <div class="bg-white border border-slate-200 rounded-xl overflow-hidden transition-all">
                <button @click="active = active === {{ $fi }} ? null : {{ $fi }}"
                        class="w-full px-5 py-4 text-left flex items-center justify-between font-bold text-slate-800 text-sm sm:text-base hover:text-[#16A34A] transition-colors">
                    <span class="flex items-center gap-3">
                        <span class="w-6 h-6 rounded-lg bg-[#F0FDF4] text-[#16A34A] text-xs font-extrabold flex items-center justify-center flex-shrink-0">
                            {{ $fi+1 }}
                        </span>
                        {{ $faq['q'] }}
                    </span>
                    <svg class="w-4 h-4 text-slate-400 flex-shrink-0 transition-transform duration-200"
                         :class="active === {{ $fi }} ? 'rotate-180 text-[#16A34A]' : ''"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === {{ $fi }}" x-collapse class="px-5 pb-4 text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                    {{ $faq['a'] }}
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

@endsection
