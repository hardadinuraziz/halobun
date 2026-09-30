@extends('layouts.app')

@section('title', 'Riwayat Kunjungan Lahan — Hallobun')

@section('content')
<div class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <a href="{{ route('dashboard') }}" class="text-xs font-bold text-gray-500 hover:text-[#16A34A] inline-flex items-center gap-1 mb-2">
                    &larr; Kembali ke Dashboard
                </a>
                <h1 class="text-2xl font-extrabold text-gray-900">Riwayat Kunjungan Lahan</h1>
                <p class="text-xs text-gray-500 mt-0.5">Daftar permohonan kunjungan dan inspeksi kebun oleh tim ahli Hallobun.</p>
            </div>
            <a href="{{ route('kunjungan.index') }}"
               class="inline-flex items-center gap-2 px-4 py-2.5 bg-[#16A34A] hover:bg-[#15803D] text-white rounded-xl text-xs font-bold shadow-xs transition-all active:scale-95 whitespace-nowrap">
                + Ajukan Kunjungan Baru
            </a>
        </div>

        <div class="bg-white rounded-3xl border border-gray-100 shadow-xs overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-gray-50 text-gray-500 uppercase font-bold border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 whitespace-nowrap">Tanggal Pengajuan</th>
                            <th class="px-6 py-4 whitespace-nowrap">Lokasi & Kota</th>
                            <th class="px-6 py-4 whitespace-nowrap">Komoditas Tanaman</th>
                            <th class="px-6 py-4 whitespace-nowrap">Jadwal Kunjungan</th>
                            <th class="px-6 py-4 whitespace-nowrap">Status</th>
                            <th class="px-6 py-4 whitespace-nowrap">Catatan / Laporan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($kunjungans as $k)
                            <tr class="hover:bg-gray-50/70">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-bold text-gray-900">{{ $k->created_at->format('d M Y, H:i') }}</div>
                                    <div class="text-[11px] text-gray-400">Pemilik: {{ $k->nama_pemilik }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-bold text-gray-900">{{ $k->kota }}</div>
                                    <div class="text-[11px] text-gray-500">{{ $k->luas_lahan }} {{ $k->satuan_lahan ?? 'ha' }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-[#F0FDF4] text-[#16A34A] border border-[#BBF7D0]">
                                        {{ $k->jenis_tanaman }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-800">
                                    @if($k->tanggal_kunjungan)
                                        {{ \Carbon\Carbon::parse($k->tanggal_kunjungan)->translatedFormat('d M Y') }}
                                    @else
                                        <span class="text-gray-400 italic">Menunggu jadwal</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $badge = match($k->status) {
                                            'confirmed' => ['bg' => 'bg-emerald-100 text-emerald-800', 'label' => 'Dikonfirmasi'],
                                            'completed' => ['bg' => 'bg-blue-100 text-blue-800', 'label' => 'Selesai'],
                                            'cancelled' => ['bg' => 'bg-rose-100 text-rose-800', 'label' => 'Dibatalkan'],
                                            default     => ['bg' => 'bg-amber-100 text-amber-800', 'label' => 'Menunggu Konfirmasi'],
                                        };
                                    @endphp
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold {{ $badge['bg'] }} inline-block">
                                        {{ $badge['label'] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($k->laporan_kunjungan)
                                        <p class="text-gray-700 text-xs line-clamp-2">{{ $k->laporan_kunjungan }}</p>
                                    @else
                                        <span class="text-gray-400 italic">Belum ada catatan tim</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                                    Belum ada pengajuan kunjungan kebun.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($kunjungans->hasPages())
                <div class="p-4 border-t border-gray-100 bg-gray-50/50">
                    {{ $kunjungans->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
