@extends('layouts.app')

@section('title', $sarana->nama . ' - Toko Sarana Kebun Hallobun')
@section('meta_description', $sarana->deskripsi_singkat ?? 'Pesan sarana pertanian berkualitas di Hallobun.')

@section('content')
<div class="bg-[#F8FAFC] min-h-screen py-8 sm:py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-xs text-slate-500 mb-6 font-medium">
            <a href="{{ route('home') }}" class="hover:text-[#16A34A] transition-colors">Beranda</a>
            <span>/</span>
            <a href="{{ route('sarana.index') }}" class="hover:text-[#16A34A] transition-colors">Toko Sarana</a>
            <span>/</span>
            <span class="text-slate-800 font-semibold">{{ $sarana->nama }}</span>
        </nav>

        <div class="bg-white border border-slate-200 rounded-3xl p-6 sm:p-8 shadow-sm grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
            {{-- Image --}}
            <div class="relative rounded-2xl overflow-hidden bg-slate-50 border border-slate-100 aspect-square flex items-center justify-center">
                @if($sarana->gambar)
                    <img src="{{ Storage::url($sarana->gambar) }}" alt="{{ $sarana->nama }}" class="w-full h-full object-cover">
                @else
                    <img src="/images/halobun_real_sarana.jpg" alt="{{ $sarana->nama }}" class="w-full h-full object-cover">
                @endif
                @if($sarana->diskonPersen())
                    <span class="absolute top-4 right-4 bg-[#16A34A] text-white text-xs font-extrabold px-3 py-1 rounded-full shadow-md">
                        Hemat {{ $sarana->diskonPersen() }}%
                    </span>
                @endif
            </div>

            {{-- Detail Info --}}
            <div class="flex flex-col">
                <div class="inline-flex items-center gap-2 mb-2">
                    <span class="text-xs font-bold text-[#16A34A] bg-[#F0FDF4] border border-[#BBF7D0] px-2.5 py-0.5 rounded-md uppercase">
                        {{ $sarana->kategori }}
                    </span>
                    @if($sarana->merek)
                        <span class="text-xs font-medium text-slate-500">Merek: <strong class="text-slate-700">{{ $sarana->merek }}</strong></span>
                    @endif
                </div>

                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 leading-tight">{{ $sarana->nama }}</h1>

                <div class="mt-4 p-4 rounded-2xl bg-[#F0FDF4] border border-[#BBF7D0]/60 flex items-baseline gap-3">
                    <div class="text-3xl font-black text-[#16A34A]">
                        Rp {{ number_format($sarana->harga, 0, ',', '.') }}
                    </div>
                    @if($sarana->harga_coret)
                        <div class="text-sm font-semibold text-slate-400 line-through">
                            Rp {{ number_format($sarana->harga_coret, 0, ',', '.') }}
                        </div>
                    @endif
                    <span class="text-xs text-slate-500 font-medium">/ {{ $sarana->satuan }}</span>
                </div>

                <div class="mt-6 text-sm text-slate-600 leading-relaxed space-y-3">
                    <p class="font-semibold text-slate-900">Deskripsi Produk:</p>
                    <p>{{ $sarana->deskripsi ?? $sarana->deskripsi_singkat ?? 'Sarana pertanian berkualitas tinggi bersertifikasi untuk mendukung produktivitas kebun dan lahan Anda.' }}</p>
                </div>

                <div class="mt-6 pt-6 border-t border-slate-100 flex items-center gap-3">
                    <span class="text-xs font-semibold text-slate-500">Ketersediaan Stok:</span>
                    @if($sarana->stok > 5)
                        <span class="text-xs font-bold text-emerald-700 bg-emerald-50 border border-emerald-200 px-2.5 py-0.5 rounded-full">Tersedia ({{ $sarana->stok }} {{ $sarana->satuan }})</span>
                    @elseif($sarana->stok > 0)
                        <span class="text-xs font-bold text-amber-700 bg-amber-50 border border-amber-200 px-2.5 py-0.5 rounded-full">Sisa {{ $sarana->stok }} {{ $sarana->satuan }}</span>
                    @else
                        <span class="text-xs font-bold text-rose-700 bg-rose-50 border border-rose-200 px-2.5 py-0.5 rounded-full">Habis</span>
                    @endif
                </div>

                {{-- Action Buttons --}}
                <div class="mt-8 flex flex-col sm:flex-row gap-3">
                    <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Hallobun,%20saya%20ingin%20memesan%20produk%20*{{ urlencode($sarana->nama) }}*%20seharga%20Rp%20{{ number_format($sarana->harga, 0, ',', '.') }}.%20Apakah%20stok%20masih%20tersedia?"
                       target="_blank"
                       class="flex-1 bg-[#16A34A] hover:bg-[#15803D] text-white font-bold text-sm px-6 py-3.5 rounded-xl shadow-md hover:shadow-lg transition-all text-center flex items-center justify-center gap-2">
                        <span>💬</span> Pesan Cepat via WhatsApp
                    </a>
                    <a href="{{ route('konsultasi.index') }}"
                       class="bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 font-bold text-sm px-5 py-3.5 rounded-xl transition-all text-center">
                        Tanya Pakar Dulu
                    </a>
                </div>
            </div>
        </div>

        {{-- Related Products --}}
        @if(isset($related) && $related->isNotEmpty())
        <div class="mt-12">
            <h2 class="text-lg sm:text-xl font-bold text-slate-900 mb-6">Produk Terkait Lainnya</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($related as $rel)
                <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden p-4 shadow-sm hover:shadow-md transition-all flex flex-col">
                    <div class="aspect-square bg-slate-100 rounded-xl overflow-hidden mb-3">
                        <img src="{{ $rel->gambar ? Storage::url($rel->gambar) : '/images/halobun_real_sarana.jpg' }}" alt="{{ $rel->nama }}" class="w-full h-full object-cover">
                    </div>
                    <span class="text-[10px] font-bold text-[#16A34A] uppercase">{{ $rel->kategori }}</span>
                    <h3 class="font-bold text-sm text-slate-900 mt-1 mb-2 line-clamp-1">{{ $rel->nama }}</h3>
                    <div class="mt-auto flex items-center justify-between pt-2 border-t border-slate-100">
                        <span class="font-extrabold text-sm text-[#16A34A]">Rp {{ number_format($rel->harga, 0, ',', '.') }}</span>
                        <a href="{{ route('sarana.show', $rel) }}" class="text-xs font-bold text-[#16A34A] hover:underline">Lihat</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
