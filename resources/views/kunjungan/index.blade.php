@extends('layouts.app')

@section('title', 'Kunjungan Lahan & Survei Kebun')
@section('meta_description', 'Layanan kunjungan on-site oleh praktisi perkebunan dan agronomis ke kebun, pekarangan, atau greenhouse Anda.')

@section('content')
<div class="bg-[#F8FAFC] min-h-screen">
    {{-- Header --}}
    <div class="bg-white border-b border-slate-200 py-10 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="inline-flex items-center gap-1.5 bg-[#FFF0F5] text-[#E0004D] border border-[#FFD1DF] text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-3">
                🚜 Kunjungan On-Site
            </span>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#1E293B]">Kunjungan Lapangan &amp; Survei Kebun</h1>
            <p class="text-slate-600 mt-2 max-w-2xl text-sm sm:text-base">Praktisi dan agronomis kami hadir langsung ke lokasi kebun, pekarangan, atau greenhouse Anda untuk inspeksi mendalam.</p>
        </div>
    </div>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {{-- Keunggulan --}}
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 mb-8">
            @foreach([
                ['🌾','Analisa Lapangan','Diagnosa hama & gejala daun'],
                ['🔬','Uji Kesuburan','Evaluasi fisik & pH tanah'],
                ['🌱','Solusi Tepat Guna','Rekomendasi ramah lingkungan'],
                ['📋','Panduan Tertulis','Laporan & SOP perawatan kebun'],
            ] as $item)
            <div class="bg-white border border-slate-200 rounded-2xl p-4 text-center shadow-sm">
                <div class="text-2xl mb-1.5">{{ $item[0] }}</div>
                <div class="font-bold text-slate-800 text-xs sm:text-sm">{{ $item[1] }}</div>
                <div class="text-slate-500 text-[11px] mt-1">{{ $item[2] }}</div>
            </div>
            @endforeach
        </div>

        {{-- Form --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-8 shadow-sm">
            <h2 class="text-lg sm:text-xl font-bold text-slate-900 mb-6">Formulir Permintaan Kunjungan Kebun</h2>

            <form action="{{ route('kunjungan.store') }}" method="POST" class="space-y-5">
                @csrf

                {{-- Pilih Praktisi (opsional) --}}
                @if($konsultans->isNotEmpty())
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">PILIH PRAKTISI (OPSIONAL)</label>
                    <select name="konsultan_id" class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                        <option value="">Pilihkan kami praktisi terbaik untuk Anda</option>
                        @foreach($konsultans as $konsultan)
                        <option value="{{ $konsultan->id }}" {{ old('konsultan_id')==$konsultan->id?'selected':'' }}>
                            {{ $konsultan->user->name }} — {{ $konsultan->spesialisasi }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">NAMA PEMILIK LAHAN <span class="text-[#E0004D]">*</span></label>
                        <input type="text" name="nama_pemilik" value="{{ old('nama_pemilik', auth()->user()?->name) }}" required
                            class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">NO. WHATSAPP <span class="text-[#E0004D]">*</span></label>
                        <input type="text" name="phone" value="{{ old('phone', auth()->user()?->phone) }}" required
                            placeholder="08xxxxxxxxxx"
                            class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">TANGGAL KUNJUNGAN <span class="text-[#E0004D]">*</span></label>
                        <input type="date" name="tanggal_kunjungan" value="{{ old('tanggal_kunjungan') }}" required
                            min="{{ now()->addDays(2)->format('Y-m-d') }}"
                            class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">JAM KUNJUNGAN</label>
                        <input type="time" name="jam_kunjungan" value="{{ old('jam_kunjungan') }}" required
                            class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">ALAMAT LENGKAP LAHAN <span class="text-[#E0004D]">*</span></label>
                    <textarea name="alamat_lahan" rows="3" required
                        placeholder="Jl. Kebun Raya No. 5, Desa Maju Jaya, Kecamatan..."
                        class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50 resize-none">{{ old('alamat_lahan') }}</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">KOTA / KABUPATEN</label>
                        <input type="text" name="kota" value="{{ old('kota') }}" required
                            class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">PROVINSI</label>
                        <input type="text" name="provinsi" value="{{ old('provinsi') }}" required
                            class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">JENIS TANAMAN / KOMODITAS <span class="text-[#E0004D]">*</span></label>
                    <input type="text" name="jenis_tanaman" value="{{ old('jenis_tanaman') }}" required
                        placeholder="Cabai, Melon, Hidroponik Sayur, Padi, dll..."
                        class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">LUAS LAHAN</label>
                        <input type="number" name="luas_lahan" value="{{ old('luas_lahan') }}" step="0.1" min="0"
                            placeholder="0"
                            class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">SATUAN</label>
                        <select name="satuan_lahan" class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                            <option value="hektar">Hektar</option>
                            <option value="m2">Meter Persegi (m²)</option>
                            <option value="are">Are</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">MASALAH / TOPIK SURVEI <span class="text-[#E0004D]">*</span></label>
                    <textarea name="masalah_yang_dihadapi" rows="4" required
                        placeholder="Jelaskan kendala di lahan: hama daun, tanah liat/asam, irigasi, atau target hasil panen..."
                        class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50 resize-none">{{ old('masalah_yang_dihadapi') }}</textarea>
                </div>

                <div class="bg-[#FFF0F5] border border-[#FFD1DF] rounded-xl p-3.5 text-xs text-slate-700 leading-relaxed">
                    ℹ️ Estimasi biaya akomodasi &amp; kunjungan akan dikonfirmasikan transparan oleh tim kami via WhatsApp dalam 1x24 jam sebelum jadwal keberangkatan.
                </div>

                @auth
                <button type="submit" id="btn-pesan-kunjungan"
                    class="w-full bg-[#E0004D] hover:bg-[#C70044] text-white font-bold py-3.5 rounded-xl transition-colors shadow-sm text-sm">
                    Kirim Permintaan Kunjungan Lahan →
                </button>
                @else
                <a href="{{ route('login') }}" class="block w-full text-center bg-[#E0004D] hover:bg-[#C70044] text-white font-bold py-3.5 rounded-xl transition-colors shadow-sm text-sm">
                    Masuk untuk Mengajukan Kunjungan
                </a>
                @endauth
            </form>
        </div>
    </div>
</div>
@endsection
