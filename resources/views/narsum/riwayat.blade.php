@extends('layouts.app')

@section('title', 'Riwayat Undangan Narasumber — Hallobun')

@section('content')
<div class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <a href="{{ route('dashboard') }}" class="text-xs font-bold text-gray-500 hover:text-[#16A34A] inline-flex items-center gap-1 mb-2">
                    &larr; Kembali ke Dashboard
                </a>
                <h1 class="text-2xl font-extrabold text-gray-900">Riwayat Undangan Narasumber</h1>
                <p class="text-xs text-gray-500 mt-0.5">Daftar permohonan pemateri dan narasumber praktisi perkebunan.</p>
            </div>
            <a href="{{ route('narsum.index') }}"
               class="inline-flex items-center gap-2 px-4 py-2.5 bg-[#16A34A] hover:bg-[#15803D] text-white rounded-xl text-xs font-bold shadow-xs transition-all active:scale-95 whitespace-nowrap">
                + Undang Narasumber Baru
            </a>
        </div>

        <div class="bg-white rounded-3xl border border-gray-100 shadow-xs overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-gray-50 text-gray-500 uppercase font-bold border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 whitespace-nowrap">Nama Acara & Instansi</th>
                            <th class="px-6 py-4 whitespace-nowrap">Tanggal Acara</th>
                            <th class="px-6 py-4 whitespace-nowrap">Format</th>
                            <th class="px-6 py-4 whitespace-nowrap">Topik</th>
                            <th class="px-6 py-4 whitespace-nowrap">Status</th>
                            <th class="px-6 py-4 whitespace-nowrap">Catatan Tim</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($narsums as $n)
                            <tr class="hover:bg-gray-50/70">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-bold text-gray-900">{{ $n->nama_acara }}</div>
                                    <div class="text-[11px] text-gray-400">Penyelenggara: {{ $n->penyelenggara }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-800">
                                    {{ \Carbon\Carbon::parse($n->tanggal_acara)->translatedFormat('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold {{ $n->format_acara === 'online' ? 'bg-blue-100 text-blue-800' : 'bg-emerald-100 text-emerald-800' }}">
                                        {{ ucfirst($n->format_acara ?? 'offline') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-gray-800 font-semibold max-w-xs">{{ $n->topik }}</p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $badge = match($n->status) {
                                            'confirmed' => ['bg' => 'bg-emerald-100 text-emerald-800', 'label' => 'Dikonfirmasi'],
                                            'completed' => ['bg' => 'bg-blue-100 text-blue-800', 'label' => 'Selesai'],
                                            'cancelled' => ['bg' => 'bg-rose-100 text-rose-800', 'label' => 'Dibatalkan'],
                                            default     => ['bg' => 'bg-amber-100 text-amber-800', 'label' => 'Menunggu Review'],
                                        };
                                    @endphp
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold {{ $badge['bg'] }} inline-block">
                                        {{ $badge['label'] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($n->catatan_admin)
                                        <p class="text-gray-700 text-xs line-clamp-2">{{ $n->catatan_admin }}</p>
                                    @else
                                        <span class="text-gray-400 italic">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                                    Belum ada pengajuan narasumber.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($narsums->hasPages())
                <div class="p-4 border-t border-gray-100 bg-gray-50/50">
                    {{ $narsums->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
