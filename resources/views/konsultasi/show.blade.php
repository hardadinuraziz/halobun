@extends('layouts.app')

@section('title', $konsultan->user->name . ' — Konsultan Pertanian')

@section('content')
<div class="bg-[#F8FAF7] min-h-screen">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Left: Konsultan Info --}}
            <div class="lg:col-span-1">
                <div class="bg-white border border-[#E2EAE0] rounded-2xl p-6 sticky top-24 shadow-sm">
                    <div class="text-center mb-6">
                        <div class="w-24 h-24 bg-gradient-to-br from-emerald-100 via-emerald-200 to-emerald-300 border border-emerald-300/60 rounded-3xl flex items-center justify-center text-emerald-900 font-black text-4xl mx-auto mb-4 shadow-md shadow-emerald-900/10">
                            {{ substr($konsultan->user->name, 0, 1) }}
                        </div>
                        <h1 class="text-xl font-extrabold text-gray-900 leading-snug">{{ $konsultan->user->name }}</h1>
                        <span class="inline-block bg-emerald-100/80 text-emerald-800 text-sm font-semibold px-3 py-1 rounded-full mt-2">
                            {{ $konsultan->spesialisasi }}
                        </span>
                        <div class="flex items-center justify-center gap-2 mt-3 text-sm">
                            <span class="text-amber-500">⭐</span>
                            <span class="font-bold text-gray-800">{{ number_format($konsultan->rating, 1) }}</span>
                            <span class="text-[#718470]">({{ $konsultan->total_konsultasi }} sesi)</span>
                        </div>
                    </div>

                    <div class="border-t border-[#EEF2EC] pt-4 space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-[#5A6D59]">Harga Sesi</span>
                            <span class="font-bold text-emerald-950">Rp {{ number_format($konsultan->harga_per_sesi, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-[#5A6D59]">Durasi</span>
                            <span class="font-semibold text-gray-800">{{ $konsultan->durasi_menit }} menit</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-[#5A6D59]">Total Sesi</span>
                            <span class="font-semibold text-gray-800">{{ $konsultan->total_konsultasi }}</span>
                        </div>
                    </div>

                    @if($konsultan->bio)
                    <div class="border-t border-[#EEF2EC] pt-4 mt-4">
                        <h3 class="font-semibold text-emerald-950 mb-2 text-sm">Tentang Konsultan</h3>
                        <p class="text-[#5A6D59] text-sm leading-relaxed">{{ $konsultan->bio }}</p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Right: Jadwal & Booking Form --}}
            <div class="lg:col-span-2">
                <div class="bg-white border border-[#E2EAE0] rounded-2xl p-6 sm:p-8 shadow-sm">
                    <h2 class="text-xl font-bold text-emerald-950 mb-6">Buat Jadwal Konsultasi Kebun</h2>

                    @guest
                    <div class="bg-amber-50/80 border border-amber-200/80 rounded-2xl p-5 text-center mb-6">
                        <p class="text-amber-900 font-medium mb-3">Masuk terlebih dahulu untuk memesan sesi konsultasi</p>
                        <a href="{{ route('login') }}" class="bg-emerald-700 text-white font-semibold px-6 py-2.5 rounded-xl text-sm hover:bg-emerald-800 transition-colors shadow-sm">
                            Masuk Sekarang
                        </a>
                    </div>
                    @endguest

                    @if($konsultan->jadwalTersedia->isEmpty())
                    <div class="text-center py-10 text-gray-400">
                        <div class="text-5xl mb-3">📅</div>
                        <p class="font-medium">Jadwal tidak tersedia saat ini</p>
                        <p class="text-sm mt-1">Silakan cek kembali beberapa saat lagi</p>
                    </div>
                    @else
                    <form action="{{ route('konsultasi.store', $konsultan) }}" method="POST" class="space-y-5">
                        @csrf

                        {{-- Pilih Jadwal --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Pilih Jadwal Tersedia</label>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3" id="jadwal-grid">
                                @foreach($konsultan->jadwalTersedia as $jadwal)
                                <label class="jadwal-card cursor-pointer">
                                    <input type="radio" name="jadwal_id" value="{{ $jadwal->id }}" class="sr-only peer" required>
                                    <div class="peer-checked:bg-emerald-50 peer-checked:border-emerald-500 peer-checked:ring-2 peer-checked:ring-emerald-300 border-2 border-gray-200 rounded-xl p-4 hover:border-emerald-300 transition-all">
                                        <div class="font-semibold text-gray-800">{{ $jadwal->tanggal->format('d M Y') }}</div>
                                        <div class="text-emerald-600 text-sm font-medium mt-1">
                                            {{ substr($jadwal->jam_mulai, 0, 5) }} – {{ substr($jadwal->jam_selesai, 0, 5) }} WIB
                                        </div>
                                        <div class="text-xs text-gray-400 mt-1">{{ $jadwal->tanggal->diffForHumans() }}</div>
                                    </div>
                                </label>
                                @endforeach
                            </div>
                            @error('jadwal_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Keluhan --}}
                        <div>
                            <label for="keluhan" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                Ceritakan Masalah / Keluhan Anda
                            </label>
                            <textarea id="keluhan" name="keluhan" rows="4" required
                                placeholder="Contoh: Tanaman cabai saya tiba-tiba layu dan daun menguning. Sudah 2 minggu ini terjadi di seluruh kebun..."
                                class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 resize-none">{{ old('keluhan') }}</textarea>
                            @error('keluhan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Ringkasan Harga --}}
                        <div class="bg-[#F4F7F3] rounded-2xl p-5 border border-[#E2EAE0]">
                            <div class="flex justify-between text-sm mb-2 text-[#5A6D59]">
                                <span>Biaya konsultasi</span>
                                <span class="font-bold text-gray-900">Rp {{ number_format($konsultan->harga_per_sesi, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-sm mb-3 text-[#5A6D59]">
                                <span>Biaya admin (~2%)</span>
                                <span class="font-semibold text-gray-700">Rp ~{{ number_format(max($konsultan->harga_per_sesi * 0.02, 2000), 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between font-bold border-t border-[#DCE4DA] pt-3 text-base">
                                <span class="text-emerald-950">Total Estimasi</span>
                                <span class="text-emerald-800 font-extrabold">≈ Rp {{ number_format($konsultan->harga_per_sesi + max($konsultan->harga_per_sesi * 0.02, 2000), 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <p class="text-xs text-[#718470]">
                            💳 Pembayaran resmi via <strong>QRIS</strong> atau <strong>Transfer Bank</strong> (Midtrans). Tautan meeting Jitsi langsung dikirimkan ke WhatsApp Anda setelah transaksi diverifikasi.
                        </p>

                        @auth
                        <button type="submit" id="btn-lanjut-bayar"
                            class="w-full bg-emerald-700 hover:bg-emerald-800 text-white font-bold py-4 rounded-xl transition-colors shadow-md text-base">
                            Lanjut ke Pembayaran Kebun →
                        </button>
                        @else
                        <a href="{{ route('login') }}" class="block w-full text-center bg-emerald-700 hover:bg-emerald-800 text-white font-bold py-4 rounded-xl transition-colors shadow-md">
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
