@extends('layouts.app')

@section('title', $konsultan->user->name . ' — Praktisi Perkebunan & Pertanian')

@section('content')
<div class="bg-[#F8FAFC] min-h-screen">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Left: Praktisi Info --}}
            <div class="lg:col-span-1">
                <div class="bg-white border border-slate-200 rounded-2xl p-6 sticky top-24 shadow-sm">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-[#F0FDF4] border border-[#BBF7D0] rounded-2xl flex items-center justify-center text-[#16A34A] font-extrabold text-3xl mx-auto mb-3">
                            {{ substr($konsultan->user->name, 0, 1) }}
                        </div>
                        <h1 class="text-lg font-bold text-slate-900 leading-snug">{{ $konsultan->user->name }}</h1>
                        <span class="inline-block bg-[#F0FDF4] text-[#16A34A] border border-[#BBF7D0] text-xs font-semibold px-3 py-1 rounded-full mt-2">
                            {{ $konsultan->spesialisasi }}
                        </span>
                        <div class="flex items-center justify-center gap-2 mt-3 text-xs sm:text-sm">
                            <span class="text-amber-500">⭐</span>
                            <span class="font-bold text-slate-800">{{ number_format($konsultan->rating, 1) }}</span>
                            <span class="text-slate-400">({{ $konsultan->total_konsultasi }} sesi)</span>
                        </div>
                    </div>

                    <div class="border-t border-slate-100 pt-4 space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-slate-500">Biaya Sesi</span>
                            <span class="font-extrabold text-[#16A34A]">Rp {{ number_format($konsultan->harga_per_sesi, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Durasi</span>
                            <span class="font-semibold text-slate-800">{{ $konsultan->durasi_menit }} menit</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Total Sesi</span>
                            <span class="font-semibold text-slate-800">{{ $konsultan->total_konsultasi }}</span>
                        </div>
                    </div>

                    @if($konsultan->bio)
                    <div class="border-t border-slate-100 pt-4 mt-4">
                        <h3 class="font-bold text-slate-800 mb-2 text-xs uppercase tracking-wider">Profil Praktisi</h3>
                        <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">{{ $konsultan->bio }}</p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Right: Jadwal & Booking Form --}}
            <div class="lg:col-span-2">
                <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-8 shadow-sm">
                    <h2 class="text-xl font-bold text-slate-900 mb-6">Pilih Jadwal Konsultasi</h2>

                    @guest
                    <div class="bg-[#F0FDF4] border border-[#BBF7D0] rounded-2xl p-5 text-center mb-6">
                        <p class="text-slate-800 font-medium mb-3 text-sm">Masuk terlebih dahulu untuk memesan sesi konsultasi</p>
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center bg-[#16A34A] text-white font-bold px-6 py-2.5 rounded-xl text-sm hover:bg-[#15803D] transition-colors shadow-sm">
                            Masuk Sekarang
                        </a>
                    </div>
                    @endguest

                    @if($konsultan->jadwalTersedia->isEmpty())
                    <div class="text-center py-10 text-slate-400">
                        <div class="text-4xl mb-3">📅</div>
                        <p class="font-semibold text-slate-700">Jadwal belum tersedia saat ini</p>
                        <p class="text-xs mt-1">Silakan cek kembali beberapa saat lagi</p>
                    </div>
                    @else
                    <form action="{{ route('konsultasi.store', $konsultan) }}" method="POST" class="space-y-5">
                        @csrf

                        {{-- Pilih Jadwal --}}
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-2.5">PILIH WAKTU SESI TERSEDIA</label>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3" id="jadwal-grid">
                                @foreach($konsultan->jadwalTersedia as $jadwal)
                                <label class="jadwal-card cursor-pointer">
                                    <input type="radio" name="jadwal_id" value="{{ $jadwal->id }}" class="sr-only peer" required>
                                    <div class="peer-checked:bg-[#F0FDF4] peer-checked:border-[#16A34A] peer-checked:ring-2 peer-checked:ring-[#BBF7D0] border border-slate-200 rounded-xl p-3.5 hover:border-slate-300 transition-all">
                                        <div class="font-bold text-slate-900 text-sm">{{ $jadwal->tanggal->format('d M Y') }}</div>
                                        <div class="text-[#16A34A] text-xs font-semibold mt-1">
                                            {{ substr($jadwal->jam_mulai, 0, 5) }} – {{ substr($jadwal->jam_selesai, 0, 5) }} WIB
                                        </div>
                                        <div class="text-[11px] text-slate-400 mt-1">{{ $jadwal->tanggal->diffForHumans() }}</div>
                                    </div>
                                </label>
                                @endforeach
                            </div>
                            @error('jadwal_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Keluhan --}}
                        <div>
                            <label for="keluhan" class="block text-xs font-semibold text-slate-700 mb-1.5">
                                KELUHAN / TOPIK KONSULTASI
                            </label>
                            <textarea id="keluhan" name="keluhan" rows="4" required
                                placeholder="Contoh: Tanaman cabai saya tiba-tiba layu dan daun menguning sejak seminggu lalu..."
                                class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#16A34A] bg-slate-50 resize-none">{{ old('keluhan') }}</textarea>
                            @error('keluhan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Ringkasan Biaya --}}
                        <div class="bg-slate-50 rounded-xl p-4 border border-slate-200">
                            <div class="flex justify-between text-xs sm:text-sm mb-1.5 text-slate-600">
                                <span>Biaya sesi praktisi</span>
                                <span class="font-bold text-slate-900">Rp {{ number_format($konsultan->harga_per_sesi, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-xs sm:text-sm mb-2 text-slate-600">
                                <span>Biaya admin (~2%)</span>
                                <span class="font-semibold text-slate-700">Rp ~{{ number_format(max($konsultan->harga_per_sesi * 0.02, 2000), 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between font-bold border-t border-slate-200 pt-2 text-sm sm:text-base">
                                <span class="text-slate-900">Total Pembayaran</span>
                                <span class="text-[#16A34A] font-extrabold">≈ Rp {{ number_format($konsultan->harga_per_sesi + max($konsultan->harga_per_sesi * 0.02, 2000), 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <p class="text-[11px] text-slate-500 leading-relaxed">
                            💳 Pembayaran resmi via <strong>QRIS</strong> atau <strong>Transfer Bank</strong> (Midtrans). Tautan ruang konsultasi video call langsung dikirimkan ke WhatsApp Anda setelah verifikasi berhasil.
                        </p>

                        @auth
                        <button type="submit" id="btn-lanjut-bayar"
                            class="w-full bg-[#16A34A] hover:bg-[#15803D] text-white font-bold py-3.5 rounded-xl transition-colors shadow-sm text-sm">
                            Lanjut ke Pembayaran →
                        </button>
                        @else
                        <a href="{{ route('login') }}" class="block w-full text-center bg-[#16A34A] hover:bg-[#15803D] text-white font-bold py-3.5 rounded-xl transition-colors shadow-sm text-sm">
                            Masuk untuk Booking
                        </a>
                        @endauth
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
