@extends('admin.layout')

@section('title', 'Tambah Produk Sarana Baru — Hallobun Admin')
@section('page-title', 'Tambah Produk Sarana')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.sarana.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-gray-500 hover:text-gray-800">
            &larr; Kembali ke Daftar Produk
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-xs p-6 sm:p-8">
        <form method="POST" action="{{ route('admin.sarana.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Nama Produk --}}
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Nama Produk <span class="text-rose-500">*</span></label>
                    <input type="text"
                           name="nama"
                           value="{{ old('nama') }}"
                           required
                           placeholder="Contoh: Pupuk NPK Mutiara 16-16-16 Premium"
                           class="w-full text-xs p-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#16A34A] focus:outline-none">
                </div>

                {{-- Kategori --}}
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Kategori <span class="text-rose-500">*</span></label>
                    <select name="kategori" required class="w-full text-xs p-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#16A34A] focus:outline-none font-semibold">
                        <option value="">Pilih Kategori</option>
                        <option value="benih" {{ old('kategori') == 'benih' ? 'selected' : '' }}>Benih & Bibit</option>
                        <option value="pupuk" {{ old('kategori') == 'pupuk' ? 'selected' : '' }}>Pupuk & Nutrisi</option>
                        <option value="pestisida" {{ old('kategori') == 'pestisida' ? 'selected' : '' }}>Pestisida & Proteksi Hama</option>
                        <option value="alat" {{ old('kategori') == 'alat' ? 'selected' : '' }}>Alat & Mesin Pertanian</option>
                        <option value="media_tanam" {{ old('kategori') == 'media_tanam' ? 'selected' : '' }}>Media Tanam & Hidroponik</option>
                        <option value="lainnya" {{ old('kategori') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                {{-- Merek --}}
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Merek / Produsen</label>
                    <input type="text"
                           name="merek"
                           value="{{ old('merek') }}"
                           placeholder="Contoh: Meroke Tetap Jaya, Cap Kapal Terbang"
                           class="w-full text-xs p-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#16A34A] focus:outline-none">
                </div>

                {{-- Harga --}}
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Harga Jual (Rp) <span class="text-rose-500">*</span></label>
                    <input type="number"
                           name="harga"
                           value="{{ old('harga') }}"
                           required
                           min="0"
                           placeholder="Contoh: 150000"
                           class="w-full text-xs p-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#16A34A] focus:outline-none">
                </div>

                {{-- Harga Coret --}}
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Harga Coret / Promo (Rp)</label>
                    <input type="number"
                           name="harga_coret"
                           value="{{ old('harga_coret') }}"
                           min="0"
                           placeholder="Contoh: 175000 (kosongkan jika tidak ada promo)"
                           class="w-full text-xs p-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#16A34A] focus:outline-none">
                </div>

                {{-- Stok --}}
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Stok Tersedia <span class="text-rose-500">*</span></label>
                    <input type="number"
                           name="stok"
                           value="{{ old('stok', 10) }}"
                           required
                           min="0"
                           placeholder="Contoh: 50"
                           class="w-full text-xs p-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#16A34A] focus:outline-none">
                </div>

                {{-- Satuan --}}
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Satuan Produk <span class="text-rose-500">*</span></label>
                    <input type="text"
                           name="satuan"
                           value="{{ old('satuan', 'kg') }}"
                           required
                           placeholder="Contoh: kg, liter, botol, sachet, paket, karung"
                           class="w-full text-xs p-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#16A34A] focus:outline-none">
                </div>

                {{-- Deskripsi Singkat --}}
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Deskripsi Singkat</label>
                    <input type="text"
                           name="deskripsi_singkat"
                           value="{{ old('deskripsi_singkat') }}"
                           placeholder="Ringkasan 1 kalimat keunggulan produk untuk kartu katalog..."
                           class="w-full text-xs p-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#16A34A] focus:outline-none">
                </div>

                {{-- Deskripsi Lengkap --}}
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Deskripsi & Petunjuk Penggunaan <span class="text-rose-500">*</span></label>
                    <textarea name="deskripsi"
                              rows="5"
                              required
                              placeholder="Deskripsi detail, dosis aplikasi per tanaman, komposisi hara / kandungan aktif..."
                              class="w-full text-xs p-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#16A34A] focus:outline-none">{{ old('deskripsi') }}</textarea>
                </div>

                {{-- Upload Gambar --}}
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Foto / Gambar Produk</label>
                    <input type="file"
                           name="gambar"
                           accept="image/*"
                           class="w-full text-xs p-2 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#16A34A] focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#F0FDF4] file:text-[#16A34A] hover:file:bg-[#DCFCE7]">
                    <p class="text-[11px] text-gray-400 mt-1">Format: JPG, PNG, WEBP. Maksimal 2MB.</p>
                </div>

                {{-- Checkbox Status --}}
                <div class="md:col-span-2 flex flex-wrap items-center gap-6 pt-2">
                    <label class="inline-flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="w-4 h-4 text-[#16A34A] rounded border-gray-300 focus:ring-[#16A34A]">
                        <span class="text-xs font-bold text-gray-700">Aktif & Tampilkan di Katalog Toko</span>
                    </label>

                    <label class="inline-flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="w-4 h-4 text-[#16A34A] rounded border-gray-300 focus:ring-[#16A34A]">
                        <span class="text-xs font-bold text-gray-700">Tampilkan sebagai Produk Unggulan ⭐</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-100">
                <a href="{{ route('admin.sarana.index') }}" class="px-5 py-2.5 text-xs font-bold text-gray-600 hover:bg-gray-100 rounded-xl transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-[#16A34A] hover:bg-[#15803D] text-white rounded-xl font-bold text-xs shadow-xs transition-all active:scale-95">
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
