@extends('admin.layout')

@section('title', 'Kelola Undangan Narasumber — Hallobun Admin')
@section('page-title', 'Undang Narasumber & Pembicara Kebun')

@section('content')
<div class="space-y-6">
    {{-- Search and Filter Toolbar --}}
    <div class="bg-white p-4 sm:p-5 rounded-2xl border border-gray-100 shadow-xs flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">
        {{-- Status Filter Badges --}}
        <div class="flex items-center gap-1.5 overflow-x-auto pb-1 md:pb-0 text-xs font-semibold">
            @php $currentStatus = request('status'); @endphp
            <a href="{{ route('admin.narsum.index', request()->except('status', 'page')) }}"
               class="px-3 py-1.5 rounded-lg whitespace-nowrap transition-colors {{ empty($currentStatus) ? 'bg-[#16A34A] text-white shadow-xs' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                Semua
            </a>
            <a href="{{ route('admin.narsum.index', array_merge(request()->except('page'), ['status' => 'pending'])) }}"
               class="px-3 py-1.5 rounded-lg whitespace-nowrap transition-colors {{ $currentStatus === 'pending' ? 'bg-amber-500 text-white shadow-xs' : 'bg-amber-50 text-amber-800 hover:bg-amber-100' }}">
                Menunggu
            </a>
            <a href="{{ route('admin.narsum.index', array_merge(request()->except('page'), ['status' => 'confirmed'])) }}"
               class="px-3 py-1.5 rounded-lg whitespace-nowrap transition-colors {{ $currentStatus === 'confirmed' ? 'bg-emerald-600 text-white shadow-xs' : 'bg-emerald-50 text-emerald-800 hover:bg-emerald-100' }}">
                Dikonfirmasi
            </a>
            <a href="{{ route('admin.narsum.index', array_merge(request()->except('page'), ['status' => 'completed'])) }}"
               class="px-3 py-1.5 rounded-lg whitespace-nowrap transition-colors {{ $currentStatus === 'completed' ? 'bg-blue-600 text-white shadow-xs' : 'bg-blue-50 text-blue-800 hover:bg-blue-100' }}">
                Selesai
            </a>
            <a href="{{ route('admin.narsum.index', array_merge(request()->except('page'), ['status' => 'cancelled'])) }}"
               class="px-3 py-1.5 rounded-lg whitespace-nowrap transition-colors {{ $currentStatus === 'cancelled' ? 'bg-rose-600 text-white shadow-xs' : 'bg-rose-50 text-rose-800 hover:bg-rose-100' }}">
                Dibatalkan
            </a>
        </div>

        {{-- Search Input --}}
        <form method="GET" action="{{ route('admin.narsum.index') }}" class="flex items-center gap-2">
            @if(request('status'))
                <input type="hidden" name="status" value="{{ request('status') }}">
            @endif
            <div class="relative w-full sm:w-64">
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari acara / PIC / kota..."
                       class="w-full text-xs pl-8 pr-3 py-2 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#16A34A] focus:border-transparent">
                <svg class="w-4 h-4 text-gray-400 absolute left-2.5 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            <button type="submit" class="px-3 py-2 bg-[#16A34A] hover:bg-[#15803D] text-white rounded-xl text-xs font-bold transition-all">
                Cari
            </button>
            @if(request('search'))
                <a href="{{ route('admin.narsum.index', request()->only('status')) }}" class="p-2 text-gray-400 hover:text-gray-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </a>
            @endif
        </form>
    </div>

    {{-- Narsum Table --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-gray-50 text-gray-500 uppercase font-bold border-b border-gray-100">
                    <tr>
                        <th class="px-5 py-3.5">Acara & Penyelenggara</th>
                        <th class="px-5 py-3.5">PIC & Kontak</th>
                        <th class="px-5 py-3.5">Tgl & Format</th>
                        <th class="px-5 py-3.5">Topik Pelatihan</th>
                        <th class="px-5 py-3.5">Status</th>
                        <th class="px-5 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($narsums as $n)
                        <tr class="hover:bg-gray-50/70 transition-colors" x-data="{ editModal: false }">
                            <td class="px-5 py-4">
                                <div class="font-extrabold text-gray-900">{{ $n->nama_acara }}</div>
                                <div class="text-[11px] text-gray-500 font-semibold mt-0.5">🏢 {{ $n->penyelenggara }}</div>
                                @if($n->kota)
                                    <div class="text-[10px] text-gray-400">📍 {{ $n->kota }}</div>
                                @endif
                            </td>
                            <td class="px-5 py-4">
                                <div class="font-bold text-gray-800">{{ $n->kontak_pic }}</div>
                                @php
                                    $cleanPhone = preg_replace('/[^0-9]/', '', $n->phone_pic);
                                    if (str_starts_with($cleanPhone, '0')) {
                                        $cleanPhone = '62' . substr($cleanPhone, 1);
                                    }
                                @endphp
                                <a href="https://wa.me/{{ $cleanPhone }}?text=Halo%20{{ urlencode($n->kontak_pic) }},%20kami%20dari%20tim%20Hallobun%20terkait%20undangan%20narasumber%20acara%20{{ urlencode($n->nama_acara) }}."
                                   target="_blank"
                                   class="inline-flex items-center gap-1 text-[11px] font-bold text-emerald-600 hover:text-emerald-700 mt-0.5">
                                    💬 {{ $n->phone_pic }}
                                </a>
                            </td>
                            <td class="px-5 py-4">
                                <div class="font-bold text-gray-800">
                                    {{ \Carbon\Carbon::parse($n->tanggal_acara)->translatedFormat('d M Y') }}
                                </div>
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold {{ $n->format_acara === 'online' ? 'bg-blue-100 text-blue-800' : 'bg-emerald-100 text-emerald-800' }} mt-1">
                                    {{ ucfirst($n->format_acara ?? 'offline') }}
                                </span>
                            </td>
                            <td class="px-5 py-4">
                                <div class="font-semibold text-gray-800 max-w-xs">{{ $n->topik }}</div>
                                @if($n->estimasi_peserta)
                                    <div class="text-[11px] text-gray-400 mt-0.5">👥 Est. {{ $n->estimasi_peserta }} peserta</div>
                                @endif
                            </td>
                            <td class="px-5 py-4">
                                @php
                                    $badge = match($n->status) {
                                        'confirmed' => ['bg' => 'bg-emerald-100 text-emerald-800', 'label' => 'Dikonfirmasi'],
                                        'completed' => ['bg' => 'bg-blue-100 text-blue-800', 'label' => 'Selesai'],
                                        'cancelled' => ['bg' => 'bg-rose-100 text-rose-800', 'label' => 'Dibatalkan'],
                                        default     => ['bg' => 'bg-amber-100 text-amber-800', 'label' => 'Menunggu'],
                                    };
                                @endphp
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-bold {{ $badge['bg'] }} inline-block">
                                    {{ $badge['label'] }}
                                </span>
                            </td>
                            <td class="px-5 py-4 text-right">
                                <button @click="editModal = true" class="px-3 py-1.5 bg-[#F0FDF4] hover:bg-[#DCFCE7] text-[#16A34A] border border-[#BBF7D0] rounded-xl font-bold text-xs transition-colors">
                                    Update
                                </button>

                                {{-- Modal Update Narsum --}}
                                <div x-show="editModal"
                                     x-cloak
                                     class="fixed inset-0 z-50 overflow-y-auto bg-gray-900/50 backdrop-blur-xs flex items-center justify-center p-4">
                                    <div @click.away="editModal = false" class="bg-white rounded-2xl max-w-md w-full p-6 text-left shadow-2xl space-y-4">
                                        <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                                            <div>
                                                <h4 class="font-extrabold text-base text-gray-900">Kelola Undangan Narsum</h4>
                                                <p class="text-xs text-gray-400">{{ $n->nama_acara }}</p>
                                            </div>
                                            <button @click="editModal = false" class="text-gray-400 hover:text-gray-600">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </button>
                                        </div>

                                        <form method="POST" action="{{ route('admin.narsum.update-status', $n) }}" class="space-y-4">
                                            @csrf
                                            @method('PATCH')

                                            <div>
                                                <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Status Pengajuan</label>
                                                <select name="status" class="w-full text-xs p-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#16A34A]">
                                                    <option value="pending" {{ $n->status === 'pending' ? 'selected' : '' }}>Pending (Menunggu Persetujuan)</option>
                                                    <option value="confirmed" {{ $n->status === 'confirmed' ? 'selected' : '' }}>Confirmed (Disetujui / Narasumber Siap)</option>
                                                    <option value="completed" {{ $n->status === 'completed' ? 'selected' : '' }}>Completed (Acara Selesai)</option>
                                                    <option value="cancelled" {{ $n->status === 'cancelled' ? 'selected' : '' }}>Cancelled (Dibatalkan)</option>
                                                </select>
                                            </div>

                                            <div>
                                                <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Catatan Admin / Tim Narsum</label>
                                                <textarea name="catatan_admin"
                                                          rows="3"
                                                          placeholder="Catatan honorarium, akomodasi, nama narasumber yang ditugaskan..."
                                                          class="w-full text-xs p-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#16A34A]">{{ old('catatan_admin', $n->catatan_admin) }}</textarea>
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
                            <td colspan="6" class="px-5 py-12 text-center text-gray-400">
                                Tidak ada data pengajuan narasumber.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($narsums->hasPages())
            <div class="p-4 border-t border-gray-100 bg-gray-50/50">
                {{ $narsums->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
