@extends('layouts.app')

@section('title', 'Undang Narasumber & Trainer Pertanian')
@section('meta_description', 'Hadirkan praktisi perkebunan, pakar agronomi, dan trainer kredibel untuk seminar, workshop, webinar, dan pelatihan komunitas.')

@section('content')
<div class="bg-[#F8FAFC] min-h-screen">
    {{-- Header --}}
    <div class="bg-white border-b border-slate-200 py-10 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="inline-flex items-center gap-1.5 bg-[#FFF0F5] text-[#E0004D] border border-[#FFD1DF] text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-3">
                🎤 Edukasi &amp; Pelatihan
            </span>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#1E293B]">Undang Narasumber &amp; Trainer Kebun</h1>
            <p class="text-slate-600 mt-2 max-w-2xl text-sm sm:text-base">Hadirkan praktisi dan akademisi berpengalaman untuk webinar, workshop komunitas urban farming, dan pelatihan teknis agribisnis.</p>
        </div>
    </div>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {{-- Success Message --}}
        @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 rounded-2xl p-4 sm:p-5 mb-8 flex gap-3 shadow-sm">
            <span class="text-2xl">🌱</span>
            <div>
                <p class="font-bold text-emerald-900 text-sm sm:text-base">{{ session('success') }}</p>
                <p class="text-emerald-700 text-xs mt-0.5">Tim kami akan segera menghubungi kontak PIC melalui WhatsApp.</p>
            </div>
        </div>
        @endif

        {{-- Keuntungan --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4 mb-8">
            @foreach([
                ['🏆','Praktisi Berpengalaman','Pakar & praktisi teruji di bidangnya'],
                ['📍','Online & On-Site','Fleksibel webinar atau praktik kebun langsung'],
                ['⚡','Koordinasi Cepat','Respons dan pendampingan dalam 1x24 jam'],
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
            <h2 class="text-lg sm:text-xl font-bold text-slate-900 mb-6">Formulir Pengajuan Narasumber</h2>

            <form action="{{ route('narsum.store') }}" method="POST" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">NAMA ACARA <span class="text-[#E0004D]">*</span></label>
                        <input type="text" name="nama_acara" value="{{ old('nama_acara') }}" required
                            placeholder="Contoh: Lokakarya Urban Farming 2026"
                            class="w-full border @error('nama_acara') border-red-400 @else border-slate-200 @enderror rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                        @error('nama_acara')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">PENYELENGGARA <span class="text-[#E0004D]">*</span></label>
                        <input type="text" name="penyelenggara" value="{{ old('penyelenggara') }}" required
                            placeholder="Nama instansi / komunitas / kampus"
                            class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                        @error('penyelenggara')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">TANGGAL ACARA <span class="text-[#E0004D]">*</span></label>
                        <input type="date" name="tanggal_acara" value="{{ old('tanggal_acara') }}" required min="{{ now()->addDay()->format('Y-m-d') }}"
                            class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                        @error('tanggal_acara')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">JAM MULAI</label>
                        <input type="time" name="jam_mulai" value="{{ old('jam_mulai') }}" required
                            class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">JAM SELESAI</label>
                        <input type="time" name="jam_selesai" value="{{ old('jam_selesai') }}" required
                            class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">LOKASI / TEMPAT</label>
                        <input type="text" name="lokasi" value="{{ old('lokasi') }}" required
                            placeholder="Gedung pertemuan / Zoom Meeting"
                            class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">KOTA</label>
                        <input type="text" name="kota" value="{{ old('kota') }}" required
                            placeholder="Jakarta, Bogor, Bandung..."
                            class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">FORMAT ACARA</label>
                        <select name="format" class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                            <option value="offline" {{ old('format')=='offline'?'selected':'' }}>Offline (Tatap Muka & Praktik)</option>
                            <option value="online" {{ old('format')=='online'?'selected':'' }}>Online (Webinar Virtual)</option>
                            <option value="hybrid" {{ old('format')=='hybrid'?'selected':'' }}>Hybrid</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">ESTIMASI PESERTA</label>
                        <input type="number" name="estimasi_peserta" value="{{ old('estimasi_peserta') }}" min="1" required
                            placeholder="50"
                            class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">TEMA / TOPIK PELATIHAN <span class="text-[#E0004D]">*</span></label>
                    <input type="text" name="tema" value="{{ old('tema') }}" required
                        placeholder="Contoh: Pembuatan Pupuk Kompos Organik & Pengendalian Hama Hayati"
                        class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">DESKRIPSI KEBUTUHAN <span class="text-[#E0004D]">*</span></label>
                    <textarea name="deskripsi_kebutuhan" rows="3" required
                        placeholder="Ceritakan gambaran umum acara, target peserta, dan materi yang diharapkan..."
                        class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50 resize-none">{{ old('deskripsi_kebutuhan') }}</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">NAMA PIC / PENANGGUNG JAWAB</label>
                        <input type="text" name="kontak_pic" value="{{ old('kontak_pic') }}" required
                            class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">NO. WHATSAPP PIC</label>
                        <input type="text" name="phone_pic" value="{{ old('phone_pic') }}" required
                            placeholder="08xxxxxxxxxx"
                            class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">BUDGET (OPSIONAL)</label>
                    <input type="number" name="budget" value="{{ old('budget') }}" min="0" step="10000"
                        placeholder="Rp 0 (kosongkan jika fleksibel)"
                        class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E0004D] bg-slate-50">
                </div>

                @auth
                <button type="submit" id="btn-kirim-narsum"
                    class="w-full bg-[#E0004D] hover:bg-[#C70044] text-white font-bold py-3.5 rounded-xl transition-colors shadow-sm text-sm">
                    Kirim Pengajuan Narasumber →
                </button>
                @else
                <a href="{{ route('login') }}" class="block w-full text-center bg-[#E0004D] hover:bg-[#C70044] text-white font-bold py-3.5 rounded-xl transition-colors shadow-sm text-sm">
                    Masuk untuk Mengajukan Narasumber
                </a>
                @endauth
            </form>
        </div>
    </div>
</div>
@endsection
