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
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-gray-50 text-gray-500 uppercase font-bold border-b border-gray-100">
                    <tr>
                        <th class="px-5 py-3.5">Kode & Tanggal</th>
                        <th class="px-5 py-3.5">Petani (Klien)</th>
                        <th class="px-5 py-3.5">Praktisi Agronom</th>
                        <th class="px-5 py-3.5">Jadwal Sesi</th>
                        <th class="px-5 py-3.5">Pembayaran</th>
                        <th class="px-5 py-3.5">Status & Link</th>
                        <th class="px-5 py-3.5 text-right">Update Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($bookings as $b)
                        <tr class="hover:bg-gray-50/70 transition-colors" x-data="{ editModal: false }">
                            <td class="px-5 py-4">
                                <div class="font-extrabold text-gray-900">{{ $b->kode_booking }}</div>
                                <div class="text-[11px] text-gray-400 mt-0.5">{{ $b->created_at->format('d M Y, H:i') }}</div>
                            </td>
                            <td class="px-5 py-4">
                                <div class="font-bold text-gray-800">{{ $b->user->name ?? 'User dihapus' }}</div>
                                <div class="text-[11px] text-gray-400">{{ $b->user->email ?? '-' }}</div>
                            </td>
                            <td class="px-5 py-4">
                                <div class="font-bold text-[#16A34A]">{{ $b->konsultan->user->name ?? '-' }}</div>
                                <div class="text-[11px] text-gray-500">{{ $b->konsultan->spesialisasi ?? 'Praktisi Kebun' }}</div>
                            </td>
                            <td class="px-5 py-4">
                                @if($b->jadwal)
                                    <div class="font-semibold text-gray-800">{{ \Carbon\Carbon::parse($b->jadwal->tanggal)->translatedFormat('d M Y') }}</div>
                                    <div class="text-[11px] text-gray-500 font-mono">{{ $b->jadwal->jam_mulai }} - {{ $b->jadwal->jam_selesai }} WIB</div>
                                @else
                                    <span class="text-gray-400 italic">Jadwal fleksibel</span>
                                @endif
                            </td>
                            <td class="px-5 py-4">
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
                            <td class="px-5 py-4">
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
                            <td class="px-5 py-4 text-right">
                                <button @click="editModal = true" class="px-3 py-1.5 bg-[#F0FDF4] hover:bg-[#DCFCE7] text-[#16A34A] border border-[#BBF7D0] rounded-xl font-bold text-xs transition-colors">
                                    Edit Status
                                </button>

                                {{-- Modal Update Status --}}
                                <div x-show="editModal"
                                     x-cloak
                                     class="fixed inset-0 z-50 overflow-y-auto bg-gray-900/50 backdrop-blur-xs flex items-center justify-center p-4">
                                    <div @click.away="editModal = false" class="bg-white rounded-2xl max-w-md w-full p-6 text-left shadow-2xl space-y-4">
                                        <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                                            <h4 class="font-extrabold text-base text-gray-900">Update Booking {{ $b->kode_booking }}</h4>
                                            <button @click="editModal = false" class="text-gray-400 hover:text-gray-600">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </button>
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
                                                <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Link Meeting (Google Meet / Zoom)</label>
                                                <input type="url"
                                                       name="meeting_link"
                                                       value="{{ old('meeting_link', $b->meeting_link) }}"
                                                       placeholder="https://meet.google.com/xxx-xxxx-xxx"
                                                       class="w-full text-xs p-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#16A34A]">
                                                <p class="text-[10px] text-gray-400 mt-1">Klien dan praktisi akan melihat link ini di dashboard mereka setelah status dikonfirmasi.</p>
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
