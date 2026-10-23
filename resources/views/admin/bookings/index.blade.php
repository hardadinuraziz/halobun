@extends('admin.layout')

@section('title', 'Kelola Booking Konsultasi — Hallobun Admin')
@section('page-title', 'Booking Konsultasi Online')

@section('content')
<div class="space-y-6">
    {{-- Search and Filter Toolbar --}}
    <div class="bg-white p-4 sm:p-5 rounded-2xl border border-gray-100 shadow-xs flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">
        {{-- Status Filter Badges --}}
        <div class="flex items-center gap-1.5 overflow-x-auto pb-1 md:pb-0 text-xs font-semibold">
            @php
                $currentStatus = request('status');
            @endphp
            <a href="{{ route('admin.bookings.index', array_merge(request()->except('status', 'page'), [])) }}"
               class="px-3 py-1.5 rounded-lg whitespace-nowrap transition-colors {{ empty($currentStatus) ? 'bg-[#16A34A] text-white shadow-xs' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                Semua
            </a>
            <a href="{{ route('admin.bookings.index', array_merge(request()->except('page'), ['status' => 'pending'])) }}"
               class="px-3 py-1.5 rounded-lg whitespace-nowrap transition-colors {{ $currentStatus === 'pending' ? 'bg-amber-500 text-white shadow-xs' : 'bg-amber-50 text-amber-800 hover:bg-amber-100' }}">
                Menunggu
            </a>
            <a href="{{ route('admin.bookings.index', array_merge(request()->except('page'), ['status' => 'confirmed'])) }}"
               class="px-3 py-1.5 rounded-lg whitespace-nowrap transition-colors {{ $currentStatus === 'confirmed' ? 'bg-emerald-600 text-white shadow-xs' : 'bg-emerald-50 text-emerald-800 hover:bg-emerald-100' }}">
                Dikonfirmasi
            </a>
            <a href="{{ route('admin.bookings.index', array_merge(request()->except('page'), ['status' => 'completed'])) }}"
               class="px-3 py-1.5 rounded-lg whitespace-nowrap transition-colors {{ $currentStatus === 'completed' ? 'bg-blue-600 text-white shadow-xs' : 'bg-blue-50 text-blue-800 hover:bg-blue-100' }}">
                Selesai
            </a>
            <a href="{{ route('admin.bookings.index', array_merge(request()->except('page'), ['status' => 'cancelled'])) }}"
               class="px-3 py-1.5 rounded-lg whitespace-nowrap transition-colors {{ $currentStatus === 'cancelled' ? 'bg-rose-600 text-white shadow-xs' : 'bg-rose-50 text-rose-800 hover:bg-rose-100' }}">
                Dibatalkan
            </a>
        </div>

        {{-- Search Input --}}
        <form method="GET" action="{{ route('admin.bookings.index') }}" class="flex items-center gap-2">
            @if(request('status'))
                <input type="hidden" name="status" value="{{ request('status') }}">
            @endif
            <div class="relative w-full sm:w-64">
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari kode booking / nama..."
                       class="w-full text-xs pl-8 pr-3 py-2 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#16A34A] focus:border-transparent">
                <svg class="w-4 h-4 text-gray-400 absolute left-2.5 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            <button type="submit" class="px-3 py-2 bg-[#16A34A] hover:bg-[#15803D] text-white rounded-xl text-xs font-bold transition-all">
                Cari
            </button>
            @if(request('search'))
                <a href="{{ route('admin.bookings.index', request()->only('status')) }}" class="p-2 text-gray-400 hover:text-gray-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </a>
            @endif
        </form>
    </div>

    {{-- Bookings Table --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-xs overflow-hidden">
        <div class="block lg:hidden px-4 py-2 bg-gray-50/90 border-b border-gray-100 text-[11px] text-gray-500 font-medium flex items-center gap-1.5">
            <span>↔️</span> Geser ke samping untuk melihat detail kolom
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-gray-50 text-gray-500 uppercase font-bold border-b border-gray-100">
                    <tr>
                        <th class="px-5 py-3.5 whitespace-nowrap">Kode & Tanggal</th>
                        <th class="px-5 py-3.5 whitespace-nowrap">Petani (Klien)</th>
                        <th class="px-5 py-3.5 whitespace-nowrap">Praktisi Agronom</th>
                        <th class="px-5 py-3.5 whitespace-nowrap">Jadwal Sesi</th>
                        <th class="px-5 py-3.5 whitespace-nowrap">Pembayaran</th>
                        <th class="px-5 py-3.5 whitespace-nowrap">Status & Link</th>
                        <th class="px-5 py-3.5 text-right whitespace-nowrap">Update Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($bookings as $b)
                        <tr class="hover:bg-gray-50/70 transition-colors" x-data="{ editModal: false }">
                            <td class="px-5 py-4 whitespace-nowrap">
                                <div class="font-extrabold text-gray-900">{{ $b->kode_booking }}</div>
                                <div class="text-[11px] text-gray-400 mt-0.5">{{ $b->created_at->format('d M Y, H:i') }}</div>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <div class="font-bold text-gray-800">{{ $b->user->name ?? 'User dihapus' }}</div>
                                <div class="text-[11px] text-gray-400">{{ $b->user->email ?? '-' }}</div>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <div class="font-bold text-[#16A34A]">{{ $b->konsultan->user->name ?? '-' }}</div>
                                <div class="text-[11px] text-gray-500">{{ $b->konsultan->spesialisasi ?? 'Praktisi Kebun' }}</div>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                @if($b->jadwal)
                                    <div class="font-semibold text-gray-800">{{ \Carbon\Carbon::parse($b->jadwal->tanggal)->translatedFormat('d M Y') }}</div>
                                    <div class="text-[11px] text-gray-500 font-mono">{{ $b->jadwal->jam_mulai }} - {{ $b->jadwal->jam_selesai }} WIB</div>
                                @else
                                    <span class="text-gray-400 italic">Jadwal fleksibel</span>
                                @endif
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <div class="font-bold text-gray-900">Rp {{ number_format($b->payment->amount ?? $b->total_harga, 0, ',', '.') }}</div>
                                @if($b->payment && $b->payment->status === 'paid')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800 mt-1">
                                        ✓ Lunas
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-100 text-amber-800 mt-1">
                                        Menunggu Bayar
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                @php
                                    $badge = match($b->status) {
                                        'confirmed' => ['bg' => 'bg-emerald-100 text-emerald-800', 'label' => 'Dikonfirmasi'],
                                        'completed' => ['bg' => 'bg-blue-100 text-blue-800', 'label' => 'Selesai'],
                                        'cancelled' => ['bg' => 'bg-rose-100 text-rose-800', 'label' => 'Dibatalkan'],
                                        default     => ['bg' => 'bg-amber-100 text-amber-800', 'label' => 'Menunggu'],
                                    };
                                @endphp
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-bold {{ $badge['bg'] }} inline-block">
                                    {{ $badge['label'] }}
                                </span>
                                @if($b->meeting_link)
                                    <div class="mt-1">
                                        <a href="{{ $b->meeting_link }}" target="_blank" class="text-[11px] text-blue-600 hover:underline font-semibold flex items-center gap-1">
                                            🔗 Link Meeting
                                        </a>
                                    </div>
                                @endif
                            </td>
                            <td class="px-5 py-4 text-right whitespace-nowrap">
                                @php
                                    $sopMsg = \App\Services\SopTemplateService::konfirmasiKonsultasi($b);
                                    $cleanPhone = preg_replace('/[^0-9]/', '', $b->user->phone ?? '');
                                    if (str_starts_with($cleanPhone, '0')) {
                                        $cleanPhone = '62' . substr($cleanPhone, 1);
                                    }
                                    $waUrl = $cleanPhone ? ('https://wa.me/' . $cleanPhone . '?text=' . urlencode($sopMsg)) : '#';
                                @endphp

                                <div class="flex items-center justify-end gap-1.5">
                                    @if($cleanPhone)
                                        <a href="{{ $waUrl }}"
                                           target="_blank"
                                           title="Kirim Konfirmasi WhatsApp Sesuai SOP"
                                           class="px-2.5 py-1.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 border border-emerald-200 rounded-xl font-bold text-xs transition-colors flex items-center gap-1">
                                            <span>💬</span> <span class="hidden sm:inline">WA SOP</span>
                                        </a>
                                    @endif
                                    <button type="button"
                                            @click="navigator.clipboard.writeText(@js($sopMsg)); alert('Template Konfirmasi SOP berhasil disalin ke clipboard!');"
                                            title="Salin Pesan Konfirmasi Sesuai SOP"
                                            class="px-2.5 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl font-bold text-xs transition-colors">
                                        📋
                                    </button>
                                    <button @click="editModal = true" class="px-3 py-1.5 bg-[#F0FDF4] hover:bg-[#DCFCE7] text-[#16A34A] border border-[#BBF7D0] rounded-xl font-bold text-xs transition-colors">
                                        Edit
                                    </button>
                                </div>

                                {{-- Modal Update Status --}}
                                <div x-show="editModal"
                                     x-cloak
                                     class="fixed inset-0 z-50 overflow-y-auto bg-gray-900/50 backdrop-blur-xs flex items-center justify-center p-4">
                                    <div @click.away="editModal = false" class="bg-white rounded-2xl max-w-lg w-full p-5 sm:p-6 text-left shadow-2xl space-y-4 max-h-[90vh] overflow-y-auto">
                                        <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                                            <div>
                                                <h4 class="font-extrabold text-base text-gray-900">Update Booking {{ $b->kode_booking }}</h4>
                                                <p class="text-xs text-gray-400">Pastikan seluruh checklist SOP terpenuhi sebelum mengonfirmasi.</p>
                                            </div>
                                            <button @click="editModal = false" class="text-gray-400 hover:text-gray-600">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </button>
                                        </div>

                                        {{-- Checklist SOP Mini --}}
                                        <div class="bg-emerald-50/70 border border-emerald-200/70 rounded-xl p-3 text-[11px] text-emerald-950 space-y-1">
                                            <div class="font-bold text-emerald-900 flex items-center gap-1">
                                                <span>✓</span> Checklist SOP Pra-Konsultasi:
                                            </div>
                                            <div class="grid grid-cols-2 gap-1 text-[10px] text-emerald-900/80">
                                                <div>• Data &amp; topik lengkap</div>
                                                <div>• Jadwal praktisi disetujui</div>
                                                <div>• Pembayaran Mandiri valid</div>
                                                <div>• Link video call aktif</div>
                                            </div>
                                        </div>

                                        <form method="POST" action="{{ route('admin.bookings.update-status', $b) }}" class="space-y-4">
                                            @csrf
                                            @method('PATCH')

                                            <div>
                                                <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Status Booking</label>
                                                <select name="status" class="w-full text-xs p-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#16A34A]">
                                                    <option value="pending" {{ $b->status === 'pending' ? 'selected' : '' }}>Pending (Menunggu)</option>
                                                    <option value="confirmed" {{ $b->status === 'confirmed' ? 'selected' : '' }}>Confirmed (Dikonfirmasi)</option>
                                                    <option value="completed" {{ $b->status === 'completed' ? 'selected' : '' }}>Completed (Selesai)</option>
                                                    <option value="cancelled" {{ $b->status === 'cancelled' ? 'selected' : '' }}>Cancelled (Dibatalkan)</option>
                                                </select>
                                            </div>

                                            <div>
                                                <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Link Meeting (Zoom / Google Meet / Jitsi)</label>
                                                <input type="url"
                                                       name="meeting_link"
                                                       value="{{ old('meeting_link', $b->meeting_link) }}"
                                                       placeholder="https://meet.jit.si/hallobun-..."
                                                       class="w-full text-xs p-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#16A34A]">
                                                <p class="text-[10px] text-gray-400 mt-1">Sesuai SOP, link meeting akan dikirim ke customer &amp; praktisi.</p>
                                            </div>

                                            <div class="flex items-center justify-end gap-2 pt-2">
                                                <button type="button" @click="editModal = false" class="px-4 py-2 text-xs font-bold text-gray-600 hover:bg-gray-100 rounded-xl">
                                                    Batal
                                                </button>
                                                <button type="submit" class="px-4 py-2 text-xs font-bold bg-[#16A34A] hover:bg-[#15803D] text-white rounded-xl shadow-xs">
                                                    Simpan Perubahan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-5 py-12 text-center text-gray-400">
                                Tidak ada data booking yang sesuai filter.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($bookings->hasPages())
            <div class="p-4 border-t border-gray-100 bg-gray-50/50">
                {{ $bookings->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
