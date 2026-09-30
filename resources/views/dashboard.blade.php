@extends('layouts.app')

@section('title', 'Dashboard Petani — Hallobun')

@section('content')
<div class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        {{-- Welcome Banner with Real Agronomist Illustration --}}
        <div class="relative overflow-hidden bg-gradient-to-r from-[#16A34A] via-[#15803D] to-[#166534] rounded-3xl text-white shadow-sm border border-[#BBF7D0]/20">
            {{-- Decorative soft lighting --}}
            <div class="absolute -right-16 -top-16 w-64 h-64 bg-white/5 rounded-full blur-2xl pointer-events-none"></div>
            <div class="absolute right-1/3 -bottom-12 w-48 h-48 bg-emerald-400/10 rounded-full blur-xl pointer-events-none"></div>

            <div class="relative grid grid-cols-1 lg:grid-cols-12 gap-8 items-center p-6 sm:p-8 lg:p-10">
                {{-- Left Text Column --}}
                <div class="lg:col-span-7 space-y-4">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold bg-white/15 text-[#DCFCE7] backdrop-blur-xs border border-white/10">
                        <span class="w-2 h-2 rounded-full bg-[#4ADE80] animate-pulse"></span>
                        Akun Petani & Pekebun Aktif
                    </div>

                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight leading-tight">
                        Selamat Datang, <br class="hidden sm:inline">{{ auth()->user()->name }}! 👋
                    </h1>

                    <p class="text-[#BBF7D0] text-sm sm:text-base leading-relaxed max-w-xl font-normal">
                        Konsultasikan langsung kendala hama, penyakit tanaman, atau nutrisi tanah Anda bersama praktisi perkebunan terpercaya secara cepat, ilmiah, dan akurat.
                    </p>

                    <div class="flex flex-wrap items-center gap-3 pt-2">
                        <a href="{{ route('konsultasi.index') }}"
                           class="px-5 py-3 bg-white text-[#16A34A] hover:bg-gray-50 rounded-2xl font-bold text-xs sm:text-sm shadow-md transition-all active:scale-95 inline-flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#16A34A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            Tanya Pakar Sekarang
                        </a>

                        <a href="{{ route('kunjungan.index') }}"
                           class="px-4 py-3 bg-white/15 hover:bg-white/25 text-white border border-white/20 rounded-2xl font-semibold text-xs sm:text-sm transition-all inline-flex items-center gap-1.5">
                            🚜 Kunjungan Lahan
                        </a>

                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}"
                               class="px-4 py-3 bg-[#052E16] hover:bg-[#042411] text-white rounded-2xl font-bold text-xs sm:text-sm shadow-md transition-all inline-flex items-center gap-1.5">
                                ⚙️ Panel Admin
                            </a>
                        @endif
                    </div>
                </div>

                {{-- Right Real Person Illustration Photo Slider (Auto 2 Images) --}}
                <div class="lg:col-span-5 flex justify-center lg:justify-end"
                     x-data="{
                         activeSlide: 0,
                         slides: [
                             {
                                 image: '{{ asset('images/dashboard_praktisi_banner.jpg') }}',
                                 alt: 'Praktisi Agronom Hallobun',
                                 status: 'Praktisi Agronom Siap Konsultasi'
                             },
                             {
                                 image: '{{ asset('images/halobun_real_practitioner.jpg') }}',
                                 alt: 'Spesialis Tanaman & Kebun Hallobun',
                                 status: 'Dokter Tanaman Aktif Melayani'
                             }
                         ],
                         timer: null,
                         init() {
                             this.timer = setInterval(() => {
                                 this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                             }, 4500);
                         }
                     }">
                    <div class="relative w-full max-w-[280px] sm:max-w-[320px] select-none">
                        {{-- Minimalist Photo Frame with 2-Image Slider --}}
                        <div class="relative aspect-square rounded-3xl overflow-hidden border-4 border-white/25 shadow-2xl bg-white/10">
                            {{-- Slide 1 --}}
                            <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out"
                                 :class="activeSlide === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'">
                                <img src="{{ asset('images/dashboard_praktisi_banner.jpg') }}"
                                     alt="Praktisi Pertanian Hallobun"
                                     class="w-full h-full object-cover object-top">
                            </div>

                            {{-- Slide 2 --}}
                            <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out"
                                 :class="activeSlide === 1 ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'">
                                <img src="{{ asset('images/halobun_real_practitioner.jpg') }}"
                                     alt="Spesialis Tanaman Hallobun"
                                     class="w-full h-full object-cover object-center">
                            </div>

                            {{-- Dots Indicator --}}
                            <div class="absolute top-3 right-3 z-20 flex items-center gap-1.5 bg-black/40 backdrop-blur-md px-2.5 py-1 rounded-full border border-white/20">
                                <button type="button" @click="activeSlide = 0" 
                                        class="h-1.5 rounded-full transition-all duration-300"
                                        :class="activeSlide === 0 ? 'w-4 bg-[#4ADE80]' : 'w-1.5 bg-white/60'"></button>
                                <button type="button" @click="activeSlide = 1" 
                                        class="h-1.5 rounded-full transition-all duration-300"
                                        :class="activeSlide === 1 ? 'w-4 bg-[#4ADE80]' : 'w-1.5 bg-white/60'"></button>
                            </div>
                        </div>

                        {{-- Floating Status Pill with dynamic status --}}
                        <div class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-white text-gray-800 px-3.5 py-1.5 rounded-full shadow-lg border border-gray-100 flex items-center gap-2 whitespace-nowrap z-30">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span class="text-[11px] font-extrabold text-[#15803D]" x-text="slides[activeSlide].status">Praktisi Agronom Siap Konsultasi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick Service Action Cards with Real Photos --}}
        <div>
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold text-gray-900">Layanan yang Dapat Anda Akses</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                {{-- Layanan 1: Tanya Pakar --}}
                <a href="{{ route('konsultasi.index') }}"
                   class="bg-white rounded-2xl border border-gray-100 hover:border-[#16A34A] hover:shadow-md transition-all group overflow-hidden flex flex-col justify-between">
                    <div>
                        <div class="h-32 w-full overflow-hidden bg-gray-100 relative">
                            <img src="{{ asset('images/halobun_praktisi_hero.jpg') }}"
                                 alt="Tanya Pakar"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <span class="absolute top-2.5 left-2.5 px-2 py-0.5 rounded-full bg-white/90 backdrop-blur-xs text-[10px] font-bold text-[#16A34A]">
                                Tele-Agronomi
                            </span>
                        </div>
                        <div class="p-4">
                            <h3 class="font-extrabold text-gray-900 group-hover:text-[#16A34A] transition-colors text-base">Tanya Pakar Online</h3>
                            <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                Konsultasi video call dengan praktisi agronom untuk diagnosa penyakit, hama, & pemupukan.
                            </p>
                        </div>
                    </div>
                    <div class="px-4 pb-4 pt-1 flex items-center justify-between text-xs font-bold text-[#16A34A]">
                        <span>Pilih Praktisi</span>
                        <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
                    </div>
                </a>

                {{-- Layanan 2: Kunjungan Lahan --}}
                <a href="{{ route('kunjungan.index') }}"
                   class="bg-white rounded-2xl border border-gray-100 hover:border-[#16A34A] hover:shadow-md transition-all group overflow-hidden flex flex-col justify-between">
                    <div>
                        <div class="h-32 w-full overflow-hidden bg-gray-100 relative">
                            <img src="{{ asset('images/halobun_real_soil_test.jpg') }}"
                                 alt="Kunjungan Lahan"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <span class="absolute top-2.5 left-2.5 px-2 py-0.5 rounded-full bg-white/90 backdrop-blur-xs text-[10px] font-bold text-purple-700">
                                On-Site Visit
                            </span>
                        </div>
                        <div class="p-4">
                            <h3 class="font-extrabold text-gray-900 group-hover:text-purple-600 transition-colors text-base">Kunjungan Lahan</h3>
                            <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                Datangkan praktisi langsung ke kebun Anda untuk survei tanah, pH, dan bimbingan lapangan.
                            </p>
                        </div>
                    </div>
                    <div class="px-4 pb-4 pt-1 flex items-center justify-between text-xs font-bold text-purple-600">
                        <span>Ajukan Kunjungan</span>
                        <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
                    </div>
                </a>

                {{-- Layanan 3: Undang Narasumber --}}
                <a href="{{ route('narsum.index') }}"
                   class="bg-white rounded-2xl border border-gray-100 hover:border-[#16A34A] hover:shadow-md transition-all group overflow-hidden flex flex-col justify-between">
                    <div>
                        <div class="h-32 w-full overflow-hidden bg-gray-100 relative">
                            <img src="{{ asset('images/halobun_real_training.jpg') }}"
                                 alt="Undang Narasumber"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <span class="absolute top-2.5 left-2.5 px-2 py-0.5 rounded-full bg-white/90 backdrop-blur-xs text-[10px] font-bold text-blue-700">
                                Workshop & Pelatihan
                            </span>
                        </div>
                        <div class="p-4">
                            <h3 class="font-extrabold text-gray-900 group-hover:text-blue-600 transition-colors text-base">Undang Narasumber</h3>
                            <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                Pemateri praktisi berpengalaman untuk penyuluhan kelompok tani, webinar, atau seminar kebun.
                            </p>
                        </div>
                    </div>
                    <div class="px-4 pb-4 pt-1 flex items-center justify-between text-xs font-bold text-blue-600">
                        <span>Undang Pemateri</span>
                        <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
                    </div>
                </a>

                {{-- Layanan 4: Toko Sarana --}}
                <a href="{{ route('sarana.index') }}"
                   class="bg-white rounded-2xl border border-gray-100 hover:border-[#16A34A] hover:shadow-md transition-all group overflow-hidden flex flex-col justify-between">
                    <div>
                        <div class="h-32 w-full overflow-hidden bg-gray-100 relative">
                            <img src="{{ asset('images/halobun_real_sarana.jpg') }}"
                                 alt="Toko Sarana Tani"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <span class="absolute top-2.5 left-2.5 px-2 py-0.5 rounded-full bg-white/90 backdrop-blur-xs text-[10px] font-bold text-orange-700">
                                Sarana Produksi
                            </span>
                        </div>
                        <div class="p-4">
                            <h3 class="font-extrabold text-gray-900 group-hover:text-orange-600 transition-colors text-base">Toko Sarana Tani</h3>
                            <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                Beli benih bersertifikat, pupuk organik, pestisida terdaftar, dan perlengkapan perkebunan.
                            </p>
                        </div>
                    </div>
                    <div class="px-4 pb-4 pt-1 flex items-center justify-between text-xs font-bold text-orange-600">
                        <span>Katalog Produk</span>
                        <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
                    </div>
                </a>
            </div>
        </div>

        {{-- Sesi Konsultasi Pengguna --}}
        <div class="bg-white rounded-3xl border border-gray-100 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-gray-900 text-base sm:text-lg">Jadwal Sesi Konsultasi Anda</h3>
                    <p class="text-xs text-gray-400 mt-0.5">Sesi konsultasi video call yang sudah Anda jadwalkan</p>
                </div>
                <a href="{{ route('konsultasi.riwayat') }}" class="text-xs font-bold text-[#16A34A] hover:underline">
                    Semua Riwayat &rarr;
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-gray-50 text-gray-500 uppercase font-bold border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-3.5 whitespace-nowrap">Kode Booking</th>
                            <th class="px-6 py-3.5 whitespace-nowrap">Praktisi Agronom</th>
                            <th class="px-6 py-3.5 whitespace-nowrap">Jadwal Sesi</th>
                            <th class="px-6 py-3.5 whitespace-nowrap">Status</th>
                            <th class="px-6 py-3.5 text-right whitespace-nowrap">Akses Meeting</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($bookings as $b)
                            <tr class="hover:bg-gray-50/70">
                                <td class="px-6 py-4 whitespace-nowrap font-mono font-bold text-gray-900">
                                    {{ $b->kode_booking }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-bold text-gray-900">{{ $b->konsultan->user->name ?? '-' }}</div>
                                    <div class="text-[11px] text-gray-500">{{ $b->konsultan->spesialisasi ?? 'Praktisi Kebun' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($b->jadwal)
                                        <div class="font-semibold text-gray-800">
                                            {{ \Carbon\Carbon::parse($b->jadwal->tanggal)->translatedFormat('d M Y') }}
                                        </div>
                                        <div class="text-[11px] text-gray-500 font-mono">{{ $b->jadwal->jam_mulai }} - {{ $b->jadwal->jam_selesai }} WIB</div>
                                    @else
                                        <span class="text-gray-400 italic">Jadwal fleksibel</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $badge = match($b->status) {
                                            'confirmed' => ['bg' => 'bg-emerald-100 text-emerald-800', 'label' => 'Dikonfirmasi'],
                                            'completed' => ['bg' => 'bg-blue-100 text-blue-800', 'label' => 'Selesai'],
                                            'cancelled' => ['bg' => 'bg-rose-100 text-rose-800', 'label' => 'Dibatalkan'],
                                            default     => ['bg' => 'bg-amber-100 text-amber-800', 'label' => 'Menunggu Pembayaran'],
                                        };
                                    @endphp
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold {{ $badge['bg'] }} inline-block">
                                        {{ $badge['label'] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right whitespace-nowrap">
                                    @if($b->status === 'confirmed')
                                        @if($b->meeting_link)
                                            <a href="{{ $b->meeting_link }}" target="_blank"
                                               class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-[#16A34A] hover:bg-[#15803D] text-white rounded-xl text-xs font-bold shadow-xs transition-all">
                                                <span>🎥</span> Masuk Meeting
                                            </a>
                                        @else
                                            <a href="{{ route('konsultasi.meeting', $b) }}"
                                               class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-[#16A34A] hover:bg-[#15803D] text-white rounded-xl text-xs font-bold shadow-xs transition-all">
                                                <span>🎥</span> Buka Room
                                            </a>
                                        @endif
                                    @else
                                        <span class="text-gray-400 text-xs italic">Menunggu jadwal</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center">
                                    <div class="w-12 h-12 rounded-full bg-[#F0FDF4] text-[#16A34A] text-xl flex items-center justify-center mx-auto mb-3">
                                        🌱
                                    </div>
                                    <p class="font-bold text-gray-700 text-sm">Belum Ada Sesi Konsultasi Terjadwal</p>
                                    <p class="text-xs text-gray-400 mt-1 max-w-sm mx-auto">
                                        Punya masalah tanaman, hama, atau butuh rekomendasi pupuk? Hubungi praktisi kebun terbaik kami sekarang.
                                    </p>
                                    <a href="{{ route('konsultasi.index') }}"
                                       class="inline-flex items-center gap-2 mt-4 px-4 py-2 bg-[#16A34A] hover:bg-[#15803D] text-white text-xs font-bold rounded-xl shadow-xs transition-all">
                                        Mulai Konsultasi Pertama
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Bantuan & Layanan Kontak Cepat --}}
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-100 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl flex-shrink-0">
                    💬
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 text-sm sm:text-base">Butuh Bantuan atau Pertanyaan Khusus?</h3>
                    <p class="text-xs text-gray-500 mt-0.5">Tim pendamping Hallobun siap membantu via WhatsApp untuk kebutuhan kebun Anda.</p>
                </div>
            </div>
            <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Hallobun,%20saya%20sudah%20mendaftar%20dan%20ingin%20bertanya%20mengenai%20layanan."
               target="_blank"
               class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl font-bold text-xs shadow-xs transition-all active:scale-95 whitespace-nowrap">
                <span>Hubungi CS WhatsApp</span>
                <span>&rarr;</span>
            </a>
        </div>
    </div>
</div>
@endsection
