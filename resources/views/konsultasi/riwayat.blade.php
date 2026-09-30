@extends('layouts.app')

@section('title', 'Riwayat Konsultasi — Hallobun')

@section('content')
<div class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <a href="{{ route('dashboard') }}" class="text-xs font-bold text-gray-500 hover:text-[#16A34A] inline-flex items-center gap-1 mb-2">
                    &larr; Kembali ke Dashboard
                </a>
                <h1 class="text-2xl font-extrabold text-gray-900">Riwayat Konsultasi Online</h1>
                <p class="text-xs text-gray-500 mt-0.5">Daftar seluruh sesi konsultasi video call dengan praktisi agronom Hallobun.</p>
            </div>
            <a href="{{ route('konsultasi.index') }}"
               class="inline-flex items-center gap-2 px-4 py-2.5 bg-[#16A34A] hover:bg-[#15803D] text-white rounded-xl text-xs font-bold shadow-xs transition-all active:scale-95 whitespace-nowrap">
                + Jadwalkan Konsultasi Baru
            </a>
        </div>

        <div class="bg-white rounded-3xl border border-gray-100 shadow-xs overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-gray-50 text-gray-500 uppercase font-bold border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 whitespace-nowrap">Kode Booking & Tanggal</th>
                            <th class="px-6 py-4 whitespace-nowrap">Praktisi Agronom</th>
                            <th class="px-6 py-4 whitespace-nowrap">Jadwal Sesi</th>
                            <th class="px-6 py-4 whitespace-nowrap">Status Pembayaran</th>
                            <th class="px-6 py-4 whitespace-nowrap">Status Sesi</th>
                            <th class="px-6 py-4 text-right whitespace-nowrap">Aksi / Link</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($bookings as $b)
                            <tr class="hover:bg-gray-50/70">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-bold text-gray-900 font-mono">{{ $b->kode_booking }}</div>
                                    <div class="text-[11px] text-gray-400 mt-0.5">{{ $b->created_at->format('d M Y, H:i') }}</div>
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
                                    <div class="font-bold text-gray-900">Rp {{ number_format($b->payment->amount ?? $b->total_harga, 0, ',', '.') }}</div>
                                    @if($b->payment && $b->payment->status === 'paid')
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800 mt-0.5">
                                            ✓ Lunas
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-100 text-amber-800 mt-0.5">
                                            Menunggu Bayar
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $badge = match($b->status) {
                                            'confirmed' => ['bg' => 'bg-emerald-100 text-emerald-800', 'label' => 'Dikonfirmasi'],
                                            'completed' => ['bg' => 'bg-blue-100 text-blue-800', 'label' => 'Selesai'],
                                            'cancelled' => ['bg' => 'bg-rose-100 text-rose-800', 'label' => 'Dibatalkan'],
                                            default     => ['bg' => 'bg-amber-100 text-amber-800', 'label' => 'Menunggu'],
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
                                        <span class="text-gray-400 text-xs italic">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                                    Belum ada riwayat booking konsultasi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($bookings->hasPages())
                <div class="p-4 border-t border-gray-100 bg-gray-50/50">
                    {{ $bookings->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
