@extends('layouts.app')

@section('title', 'Dashboard Petani — Hallobun')

@section('content')
<div class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        {{-- Welcome Banner --}}
        <div class="bg-gradient-to-r from-[#16A34A] to-[#15803D] rounded-3xl p-6 sm:p-8 text-white shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-2">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold bg-white/20 text-[#DCFCE7] backdrop-blur-xs">
                    🌱 Akun Petani & Pekebun Aktif
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                    Selamat Datang, {{ auth()->user()->name }}! 👋
                </h1>
                <p class="text-[#BBF7D0] text-sm max-w-xl">
                    Melalui akun Hallobun Anda, Anda dapat berkonsultasi langsung dengan praktisi agronom, memesan inspeksi kebun, mengundang narasumber, dan memantau status seluruh layanan perkebunan Anda.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <a href="{{ route('konsultasi.index') }}"
                   class="px-5 py-3 bg-white text-[#16A34A] hover:bg-gray-50 rounded-2xl font-bold text-xs sm:text-sm shadow-md transition-all active:scale-95 flex items-center gap-2">
                    <span>💬</span>
                    <span>Tanya Pakar Sekarang</span>
                </a>
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}"
                       class="px-4 py-3 bg-[#052E16] hover:bg-[#042411] text-white rounded-2xl font-bold text-xs sm:text-sm shadow-md transition-all flex items-center gap-1.5">
                        <span>⚙️</span>
                        <span>Panel Admin</span>
                    </a>
                @endif
            </div>
        </div>

        {{-- Quick Service Action Cards --}}
        <div>
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold text-gray-900">Layanan yang Dapat Anda Akses</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                {{-- Layanan 1: Tanya Pakar --}}
                <a href="{{ route('konsultasi.index') }}"
                   class="bg-white p-5 rounded-2xl border border-gray-100 hover:border-[#16A34A] hover:shadow-md transition-all group flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-[#F0FDF4] border border-[#BBF7D0] flex items-center justify-center text-2xl group-hover:scale-105 transition-transform mb-4">
                            💬
                        </div>
                        <h3 class="font-extrabold text-gray-900 group-hover:text-[#16A34A] transition-colors text-base">Tanya Pakar Online</h3>
                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                            Konsultasi via video call dengan praktisi agronom ahli untuk diagnosa hama, nutrisi, dan pemupukan.
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-gray-50 flex items-center justify-between text-xs font-bold text-[#16A34A]">
                        <span>Pilih Praktisi</span>
                        <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
                    </div>
                </a>

                {{-- Layanan 2: Kunjungan Lahan --}}
                <a href="{{ route('kunjungan.index') }}"
                   class="bg-white p-5 rounded-2xl border border-gray-100 hover:border-[#16A34A] hover:shadow-md transition-all group flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-purple-50 border border-purple-200 flex items-center justify-center text-2xl group-hover:scale-105 transition-transform mb-4">
                            🚜
                        </div>
                        <h3 class="font-extrabold text-gray-900 group-hover:text-purple-600 transition-colors text-base">Kunjungan Lahan</h3>
                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                            Undang tim ahli datang langsung ke kebun Anda untuk survei tanah, kesehatan tanaman, dan bimbingan lapangan.
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-gray-50 flex items-center justify-between text-xs font-bold text-purple-600">
                        <span>Ajukan Kunjungan</span>
                        <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
                    </div>
                </a>

                {{-- Layanan 3: Undang Narasumber --}}
                <a href="{{ route('narsum.index') }}"
                   class="bg-white p-5 rounded-2xl border border-gray-100 hover:border-[#16A34A] hover:shadow-md transition-all group flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-blue-50 border border-blue-200 flex items-center justify-center text-2xl group-hover:scale-105 transition-transform mb-4">
                            🎤
                        </div>
                        <h3 class="font-extrabold text-gray-900 group-hover:text-blue-600 transition-colors text-base">Undang Narasumber</h3>
                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                            Pemateri praktisi berpengalaman untuk penyuluhan kelompok tani, webinar, atau workshop perkebunan.
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-gray-50 flex items-center justify-between text-xs font-bold text-blue-600">
                        <span>Undang Pemateri</span>
                        <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
                    </div>
                </a>

                {{-- Layanan 4: Toko Sarana --}}
                <a href="{{ route('sarana.index') }}"
                   class="bg-white p-5 rounded-2xl border border-gray-100 hover:border-[#16A34A] hover:shadow-md transition-all group flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-orange-50 border border-orange-200 flex items-center justify-center text-2xl group-hover:scale-105 transition-transform mb-4">
                            🛍️
                        </div>
                        <h3 class="font-extrabold text-gray-900 group-hover:text-orange-600 transition-colors text-base">Toko Sarana Tani</h3>
                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                            Beli benih unggul, pupuk organik, pestisida ramah lingkungan, dan peralatan kebun bersertifikat.
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-gray-50 flex items-center justify-between text-xs font-bold text-orange-600">
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
