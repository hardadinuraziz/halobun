@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

{{-- ═══ HERO SECTION ═══════════════════════════════════════════════════════ --}}
<section class="gradient-hero min-h-[85vh] flex items-center relative overflow-hidden">
    {{-- Decorative blobs --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-32 -right-32 w-96 h-96 bg-emerald-400 rounded-full opacity-10 blur-3xl"></div>
        <div class="absolute bottom-0 -left-20 w-72 h-72 bg-green-300 rounded-full opacity-10 blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-teal-400 rounded-full opacity-5 blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 text-emerald-100 text-sm font-medium px-4 py-1.5 rounded-full mb-6">
                    <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                    Platform Pertanian Digital #1 Indonesia
                </div>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                    Solusi Pertanian<br>
                    <span class="text-emerald-300">Cerdas & Terpercaya</span>
                </h1>
                <p class="text-emerald-100 text-lg leading-relaxed mb-8 max-w-lg">
                    Konsultasikan masalah pertanian Anda dengan pakar berpengalaman kapanpun dan dimanapun. Video call, kunjungan lapangan, semua ada di Hallobun.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('konsultasi.index') }}" id="hero-cta-konsultasi"
                       class="bg-white text-emerald-700 font-bold px-7 py-3.5 rounded-xl hover:bg-emerald-50 transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                        Konsultasi Sekarang →
                    </a>
                    <a href="{{ route('narsum.index') }}"
                       class="glass text-white font-semibold px-7 py-3.5 rounded-xl hover:bg-white/20 transition-all">
                        Undang Narsum
                    </a>
                </div>

                {{-- Stats --}}
                <div class="flex gap-8 mt-12">
                    <div>
                        <div class="text-3xl font-extrabold text-white">{{ number_format($totalKonsultan) }}+</div>
                        <div class="text-emerald-200 text-sm">Pakar Pertanian</div>
                    </div>
                    <div class="w-px bg-white/20"></div>
                    <div>
                        <div class="text-3xl font-extrabold text-white">{{ number_format($totalKonsultasi) }}+</div>
                        <div class="text-emerald-200 text-sm">Konsultasi Selesai</div>
                    </div>
                    <div class="w-px bg-white/20"></div>
                    <div>
                        <div class="text-3xl font-extrabold text-white">98%</div>
                        <div class="text-emerald-200 text-sm">Tingkat Kepuasan</div>
                    </div>
                </div>
            </div>

            {{-- Hero illustration (card style) --}}
            <div class="hidden lg:block">
                <div class="relative">
                    <div class="glass rounded-3xl p-6 shadow-2xl">
                        <div class="bg-white/10 rounded-2xl p-4 mb-4">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 bg-emerald-400 rounded-full flex items-center justify-center text-xl">👨‍🌾</div>
                                <div>
                                    <div class="text-white font-semibold text-sm">Sesi Konsultasi Aktif</div>
                                    <div class="text-emerald-300 text-xs">Dr. Budi Santoso — Penyakit Tanaman</div>
                                </div>
                                <span class="ml-auto bg-red-500 text-white text-xs px-2 py-0.5 rounded-full animate-pulse">LIVE</span>
                            </div>
                            <div class="bg-gray-900 rounded-xl h-36 flex items-center justify-center">
                                <div class="text-center">
                                    <div class="text-5xl mb-2">🎥</div>
                                    <div class="text-gray-400 text-xs">Video Call via Jitsi Meet</div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-white/10 rounded-xl p-3 text-center">
                                <div class="text-2xl mb-1">💬</div>
                                <div class="text-white text-xs font-medium">Konsultasi Online</div>
                            </div>
                            <div class="bg-white/10 rounded-xl p-3 text-center">
                                <div class="text-2xl mb-1">🚜</div>
                                <div class="text-white text-xs font-medium">Kunjungan Lapangan</div>
                            </div>
                            <div class="bg-white/10 rounded-xl p-3 text-center">
                                <div class="text-2xl mb-1">🎤</div>
                                <div class="text-white text-xs font-medium">Undang Narsum</div>
                            </div>
                            <div class="bg-white/10 rounded-xl p-3 text-center">
                                <div class="text-2xl mb-1">🌿</div>
                                <div class="text-white text-xs font-medium">Sarana Pertanian</div>
                            </div>
                        </div>
                    </div>
                    {{-- Floating badge --}}
                    <div class="absolute -top-4 -right-4 bg-yellow-400 text-yellow-900 font-bold text-sm px-3 py-1.5 rounded-full shadow-lg">
                        ⭐ 4.9/5.0
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══ LAYANAN SECTION ═══════════════════════════════════════════════════ --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-emerald-600 text-sm font-semibold uppercase tracking-widest">Layanan Kami</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2">Semua Kebutuhan Pertanian<br>Ada di Sini</h2>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto">Pilih layanan yang sesuai dengan kebutuhan Anda</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($layananList as $layanan)
            <a href="{{ $layanan['url'] }}" class="card-hover bg-gray-50 border border-gray-100 rounded-2xl p-6 text-center group">
                <div class="w-14 h-14 bg-{{ $layanan['color'] }}-100 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-4 group-hover:scale-110 transition-transform">
                    {{ $layanan['icon'] }}
                </div>
                <h3 class="font-bold text-gray-900 mb-2">{{ $layanan['title'] }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $layanan['desc'] }}</p>
                <div class="mt-4 text-{{ $layanan['color'] }}-600 text-sm font-semibold group-hover:underline">
                    Selengkapnya →
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══ KONSULTAN FEATURED ═══════════════════════════════════════════════ --}}
@if($konsultanFeatured->isNotEmpty())
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-end justify-between mb-10">
            <div>
                <span class="text-emerald-600 text-sm font-semibold uppercase tracking-widest">Tim Ahli</span>
                <h2 class="text-3xl font-extrabold text-gray-900 mt-1">Pakar Pertanian Terbaik</h2>
            </div>
            <a href="{{ route('konsultasi.index') }}" class="text-emerald-600 font-semibold hover:underline text-sm hidden sm:block">
                Lihat Semua →
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($konsultanFeatured as $konsultan)
            <div class="card-hover bg-white border border-gray-100 rounded-2xl p-6">
                <div class="flex items-start gap-4 mb-4">
                    <div class="w-14 h-14 bg-emerald-100 rounded-2xl flex items-center justify-center text-2xl font-bold text-emerald-700 flex-shrink-0">
                        {{ substr($konsultan->user->name, 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-bold text-gray-900 truncate">{{ $konsultan->user->name }}</h3>
                        <p class="text-emerald-600 text-sm font-medium">{{ $konsultan->spesialisasi }}</p>
                        <div class="flex items-center gap-1 mt-1">
                            <span class="text-yellow-400">⭐</span>
                            <span class="text-sm font-semibold text-gray-700">{{ number_format($konsultan->rating, 1) }}</span>
                            <span class="text-gray-400 text-xs">({{ $konsultan->total_konsultasi }} sesi)</span>
                        </div>
                    </div>
                </div>
                @if($konsultan->bio)
                <p class="text-gray-500 text-sm leading-relaxed mb-4 line-clamp-2">{{ $konsultan->bio }}</p>
                @endif
                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                    <div>
                        <div class="text-xs text-gray-400">Mulai dari</div>
                        <div class="font-bold text-gray-900">Rp {{ number_format($konsultan->harga_per_sesi, 0, ',', '.') }}</div>
                    </div>
                    <a href="{{ route('konsultasi.show', $konsultan) }}" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2 rounded-xl transition-colors">
                        Konsultasi
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ═══ HOW IT WORKS ════════════════════════════════════════════════════ --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="text-emerald-600 text-sm font-semibold uppercase tracking-widest">Cara Kerja</span>
            <h2 class="text-3xl font-extrabold text-gray-900 mt-2">Mudah dalam 4 Langkah</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach([
                ['step'=>'01','icon'=>'🔍','title'=>'Pilih Konsultan','desc'=>'Cari dan pilih pakar pertanian sesuai kebutuhan dan spesialisasi Anda.'],
                ['step'=>'02','icon'=>'📅','title'=>'Pilih Jadwal','desc'=>'Tentukan tanggal dan waktu konsultasi yang sesuai dengan jadwal Anda.'],
                ['step'=>'03','icon'=>'💳','title'=>'Bayar QRIS/Transfer','desc'=>'Lakukan pembayaran dengan QRIS atau transfer bank. Cepat & aman via Midtrans.'],
                ['step'=>'04','icon'=>'📱','title'=>'Terima Link WA','desc'=>'Link meeting Jitsi dikirim otomatis ke WhatsApp dan email Anda. Siap konsultasi!'],
            ] as $step)
            <div class="text-center relative">
                <div class="w-16 h-16 bg-emerald-50 border-2 border-emerald-200 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-4">
                    {{ $step['icon'] }}
                </div>
                <div class="absolute top-0 right-0 sm:-right-4 w-7 h-7 bg-emerald-600 text-white text-xs font-bold rounded-full flex items-center justify-center">
                    {{ $step['step'] }}
                </div>
                <h3 class="font-bold text-gray-900 mb-2">{{ $step['title'] }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $step['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══ CTA SECTION ════════════════════════════════════════════════════ --}}
<section class="py-16 bg-emerald-700 relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-10 -right-10 w-64 h-64 bg-emerald-600 rounded-full opacity-50"></div>
        <div class="absolute -bottom-10 -left-10 w-48 h-48 bg-green-600 rounded-full opacity-50"></div>
    </div>
    <div class="max-w-3xl mx-auto px-4 text-center relative z-10">
        <h2 class="text-3xl font-extrabold text-white mb-4">Siap Atasi Masalah Pertanian Anda?</h2>
        <p class="text-emerald-100 mb-8">Bergabung dengan ribuan petani yang telah mempercayai Hallobun sebagai mitra pertanian digital mereka.</p>
        <div class="flex flex-wrap gap-4 justify-center">
            <a href="{{ route('register') }}" id="cta-daftar-gratis" class="bg-white text-emerald-700 font-bold px-8 py-3.5 rounded-xl hover:bg-emerald-50 transition-all shadow-lg">
                Daftar Gratis Sekarang
            </a>
            <a href="{{ route('konsultasi.index') }}" class="border-2 border-white text-white font-semibold px-8 py-3.5 rounded-xl hover:bg-white/10 transition-all">
                Lihat Konsultan
            </a>
        </div>
    </div>
</section>

@endsection
