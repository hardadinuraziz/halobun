@extends('layouts.app')

@section('title', 'Undang Narasumber')

@section('content')
<div class="bg-[#F8FAF7] min-h-screen">
    {{-- Header --}}
    <div class="gradient-greenhouse py-16 text-white relative overflow-hidden shadow-sm">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -top-10 -right-10 w-72 h-72 bg-white/10 rounded-full blur-2xl"></div>
            <div class="absolute -bottom-10 -left-10 w-52 h-52 bg-[#CADBCA]/20 rounded-full blur-2xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="text-5xl mb-3">🎤</div>
            <h1 class="text-3xl sm:text-4xl font-extrabold mb-2 text-white">Undang Narasumber & Trainer Kebun</h1>
            <p class="text-[#E0ECE8] text-base max-w-2xl mx-auto">Hadirkan praktisi dan narasumber kredibel untuk webinar, pelatihan urban farming, lokakarya komunitas, dan seminar agribisnis.</p>
        </div>
    </div>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {{-- Success Message --}}
        @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200/80 rounded-2xl p-5 mb-8 flex gap-3 shadow-sm">
            <span class="text-2xl">🌱</span>
            <div>
                <p class="font-semibold text-emerald-900">{{ session('success') }}</p>
            </div>
        </div>
        @endif

        {{-- Keuntungan --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-10">
            @foreach([
                ['🏆','Pakar Terverifikasi','Praktisi & akademisi teruji di bidangnya'],
                ['📍','Online & On-Site','Fleksibel webinar atau praktik langsung'],
                ['⚡','Koordinasi Cepat','Respons dan pendampingan dalam 1x24 jam'],
            ] as $item)
            <div class="bg-white/90 border border-[#E2EAE0] rounded-2xl p-4 text-center shadow-sm">
                <div class="text-2xl mb-2">{{ $item[0] }}</div>
                <div class="font-bold text-emerald-950 text-sm">{{ $item[1] }}</div>
                <div class="text-[#5A6D59] text-xs mt-1">{{ $item[2] }}</div>
            </div>
            @endforeach
        </div>

        {{-- Form --}}
        <div class="bg-white border border-[#E2EAE0] rounded-2xl p-8 shadow-sm">
            <h2 class="text-xl font-bold text-emerald-950 mb-6">Formulir Pengajuan Narasumber</h2>

            <form action="{{ route('narsum.store') }}" method="POST" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Acara <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_acara" value="{{ old('nama_acara') }}" required
                            placeholder="Contoh: Seminar Pertanian Organik 2025"
                            class="w-full border @error('nama_acara') border-red-400 @else border-gray-200 @enderror rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('nama_acara')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Penyelenggara <span class="text-red-500">*</span></label>
                        <input type="text" name="penyelenggara" value="{{ old('penyelenggara') }}" required
                            placeholder="Nama instansi / organisasi"
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('penyelenggara')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Tanggal Acara <span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_acara" value="{{ old('tanggal_acara') }}" required min="{{ now()->addDay()->format('Y-m-d') }}"
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('tanggal_acara')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Jam Mulai</label>
                        <input type="time" name="jam_mulai" value="{{ old('jam_mulai') }}" required
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Jam Selesai</label>
                        <input type="time" name="jam_selesai" value="{{ old('jam_selesai') }}" required
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Lokasi / Tempat</label>
                        <input type="text" name="lokasi" value="{{ old('lokasi') }}" required
                            placeholder="Nama gedung / platform online"
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Kota</label>
                        <input type="text" name="kota" value="{{ old('kota') }}" required
                            placeholder="Jakarta, Bandung, ..."
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Format Acara</label>
                        <select name="format" class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="offline" {{ old('format')=='offline'?'selected':'' }}>Offline (Tatap Muka)</option>
                            <option value="online" {{ old('format')=='online'?'selected':'' }}>Online (Virtual)</option>
                            <option value="hybrid" {{ old('format')=='hybrid'?'selected':'' }}>Hybrid</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Estimasi Peserta</label>
                        <input type="number" name="estimasi_peserta" value="{{ old('estimasi_peserta') }}" min="1" required
                            placeholder="100"
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Tema / Topik <span class="text-red-500">*</span></label>
                    <input type="text" name="tema" value="{{ old('tema') }}" required
                        placeholder="Contoh: Pertanian Organik untuk Ketahanan Pangan"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Deskripsi Kebutuhan <span class="text-red-500">*</span></label>
                    <textarea name="deskripsi_kebutuhan" rows="4" required
                        placeholder="Jelaskan detail kebutuhan narasumber, topik yang diinginkan, dan ekspektasi Anda..."
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none">{{ old('deskripsi_kebutuhan') }}</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama PIC / Kontak</label>
                        <input type="text" name="kontak_pic" value="{{ old('kontak_pic') }}" required
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">No. WhatsApp PIC</label>
                        <input type="text" name="phone_pic" value="{{ old('phone_pic') }}" required
                            placeholder="08xxxxxxxxxx"
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Budget (opsional)</label>
                    <input type="number" name="budget" value="{{ old('budget') }}" min="0" step="10000"
                        placeholder="Rp 0 (kosongkan jika belum ada budget)"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                @auth
                <button type="submit" id="btn-kirim-narsum"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-2xl transition-colors shadow-lg text-base">
                    📤 Kirim Pengajuan Narsum
                </button>
                @else
                <a href="{{ route('login') }}" class="block w-full text-center bg-blue-600 text-white font-bold py-4 rounded-2xl">
                    Masuk untuk Mengajukan
                </a>
                @endauth
            </form>
        </div>
    </div>
</div>
@endsection
