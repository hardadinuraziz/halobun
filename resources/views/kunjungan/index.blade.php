@extends('layouts.app')

@section('title', 'Kunjungan Offline')

@section('content')
<div class="bg-gray-50 min-h-screen">
    {{-- Header --}}
    <div class="bg-gradient-to-r from-amber-600 to-orange-700 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <div class="text-5xl mb-4">🚜</div>
            <h1 class="text-3xl sm:text-4xl font-extrabold mb-3">Kunjungan Lapangan</h1>
            <p class="text-amber-100 text-lg max-w-2xl mx-auto">Tim ahli kami siap datang langsung ke lahan Anda untuk konsultasi tatap muka dan solusi on-site</p>
        </div>
    </div>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {{-- Keunggulan --}}
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-10">
            @foreach([
                ['🌾','Analisa Langsung','Diagnosa masalah di lokasi'],
                ['🔬','Uji Tanah','Pengujian kondisi tanah'],
                ['💊','Rekomendasi Tepat','Solusi spesifik lahan Anda'],
                ['📋','Laporan Lengkap','Laporan tertulis pasca kunjungan'],
            ] as $item)
            <div class="bg-white border border-gray-100 rounded-xl p-4 text-center">
                <div class="text-2xl mb-2">{{ $item[0] }}</div>
                <div class="font-semibold text-gray-800 text-sm">{{ $item[1] }}</div>
                <div class="text-gray-400 text-xs mt-1">{{ $item[2] }}</div>
            </div>
            @endforeach
        </div>

        {{-- Form --}}
        <div class="bg-white border border-gray-100 rounded-2xl p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Form Pemesanan Kunjungan</h2>

            <form action="{{ route('kunjungan.store') }}" method="POST" class="space-y-5">
                @csrf

                {{-- Pilih Konsultan (opsional) --}}
                @if($konsultans->isNotEmpty())
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Pilih Konsultan (Opsional)</label>
                    <select name="konsultan_id" class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                        <option value="">Pilihkan kami konsultan terbaik untuk Anda</option>
                        @foreach($konsultans as $konsultan)
                        <option value="{{ $konsultan->id }}" {{ old('konsultan_id')==$konsultan->id?'selected':'' }}>
                            {{ $konsultan->user->name }} — {{ $konsultan->spesialisasi }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Pemilik Lahan <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_pemilik" value="{{ old('nama_pemilik', auth()->user()?->name) }}" required
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">No. WhatsApp <span class="text-red-500">*</span></label>
                        <input type="text" name="phone" value="{{ old('phone', auth()->user()?->phone) }}" required
                            placeholder="08xxxxxxxxxx"
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Tanggal Kunjungan <span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_kunjungan" value="{{ old('tanggal_kunjungan') }}" required
                            min="{{ now()->addDays(2)->format('Y-m-d') }}"
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Jam Kunjungan</label>
                        <input type="time" name="jam_kunjungan" value="{{ old('jam_kunjungan') }}" required
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Alamat Lengkap Lahan <span class="text-red-500">*</span></label>
                    <textarea name="alamat_lahan" rows="3" required
                        placeholder="Jl. Kebun Raya No. 5, Desa Maju Jaya, Kecamatan..."
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 resize-none">{{ old('alamat_lahan') }}</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Kota / Kabupaten</label>
                        <input type="text" name="kota" value="{{ old('kota') }}" required
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Provinsi</label>
                        <input type="text" name="provinsi" value="{{ old('provinsi') }}" required
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Jenis Tanaman <span class="text-red-500">*</span></label>
                    <input type="text" name="jenis_tanaman" value="{{ old('jenis_tanaman') }}" required
                        placeholder="Padi, Cabai, Jagung, Sawit, dll..."
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                </div>

                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Luas Lahan</label>
                        <input type="number" name="luas_lahan" value="{{ old('luas_lahan') }}" step="0.1" min="0"
                            placeholder="0"
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Satuan</label>
                        <select name="satuan_lahan" class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                            <option value="hektar">Hektar</option>
                            <option value="m2">Meter Persegi</option>
                            <option value="are">Are</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Masalah yang Dihadapi <span class="text-red-500">*</span></label>
                    <textarea name="masalah_yang_dihadapi" rows="5" required
                        placeholder="Jelaskan masalah yang Anda hadapi secara detail: gejala, kapan mulai terjadi, sudah penanganan apa yang dilakukan..."
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 resize-none">{{ old('masalah_yang_dihadapi') }}</textarea>
                </div>

                <div class="bg-amber-50 border border-amber-200 rounded-xl p-4 text-sm text-amber-800">
                    <p>ℹ️ Biaya kunjungan akan dikonfirmasi oleh tim kami sesuai jarak dan kompleksitas masalah. Kami akan menghubungi Anda via WhatsApp dalam 1x24 jam.</p>
                </div>

                @auth
                <button type="submit" id="btn-pesan-kunjungan"
                    class="w-full bg-amber-600 hover:bg-amber-700 text-white font-bold py-4 rounded-2xl transition-colors shadow-lg text-base">
                    📤 Kirim Permintaan Kunjungan
                </button>
                @else
                <a href="{{ route('login') }}" class="block w-full text-center bg-amber-600 text-white font-bold py-4 rounded-2xl">
                    Masuk untuk Memesan Kunjungan
                </a>
                @endauth
            </form>
        </div>
    </div>
</div>
@endsection
