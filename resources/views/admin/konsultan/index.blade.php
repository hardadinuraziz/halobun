@extends('admin.layout')

@section('title', 'Kelola Praktisi Kebun — Hallobun Admin')
@section('page-title', 'Daftar Praktisi Agronom & Konsultan')

@section('content')
<div class="space-y-6">
    {{-- Search Toolbar --}}
    <div class="bg-white p-4 sm:p-5 rounded-2xl border border-gray-100 shadow-xs flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4">
        <form method="GET" action="{{ route('admin.konsultan.index') }}" class="flex items-center gap-2 flex-1 max-w-md">
            <div class="relative w-full">
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari nama praktisi / spesialisasi / email..."
                       class="w-full text-xs pl-8 pr-3 py-2 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#16A34A] focus:border-transparent">
                <svg class="w-4 h-4 text-gray-400 absolute left-2.5 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            <button type="submit" class="px-3 py-2 bg-[#16A34A] hover:bg-[#15803D] text-white rounded-xl text-xs font-bold transition-all">
                Cari
            </button>
            @if(request('search'))
                <a href="{{ route('admin.konsultan.index') }}" class="p-2 text-gray-400 hover:text-gray-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </a>
            @endif
        </form>

        <div class="text-xs text-gray-500 font-semibold">
            Total: <span class="font-extrabold text-[#16A34A]">{{ $konsultans->total() }}</span> Praktisi
        </div>
    </div>

    {{-- Praktisi Table --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-xs overflow-hidden">
        <div class="block lg:hidden px-4 py-2 bg-gray-50/90 border-b border-gray-100 text-[11px] text-gray-500 font-medium flex items-center gap-1.5">
            <span>↔️</span> Geser ke samping untuk melihat detail kolom
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-gray-50 text-gray-500 uppercase font-bold border-b border-gray-100">
                    <tr>
                        <th class="px-5 py-3.5 whitespace-nowrap">Praktisi Agronom</th>
                        <th class="px-5 py-3.5 whitespace-nowrap">Spesialisasi</th>
                        <th class="px-5 py-3.5 whitespace-nowrap">Tarif / Sesi</th>
                        <th class="px-5 py-3.5 whitespace-nowrap">Performa</th>
                        <th class="px-5 py-3.5 whitespace-nowrap">Status Aktif</th>
                        <th class="px-5 py-3.5 text-right whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($konsultans as $k)
                        <tr class="hover:bg-gray-50/70 transition-colors" x-data="{ editModal: false }">
                            <td class="px-5 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-[#F0FDF4] border border-[#BBF7D0] overflow-hidden flex items-center justify-center flex-shrink-0">
                                        @if($k->foto)
                                            <img src="{{ str_starts_with($k->foto, 'http') ? $k->foto : asset('storage/' . $k->foto) }}"
                                                 alt="{{ $k->user->name ?? 'Praktisi' }}"
                                                 class="w-full h-full object-cover">
                                        @else
                                            <span class="text-[#16A34A] font-extrabold text-xs">
                                                {{ substr($k->user->name ?? 'PK', 0, 2) }}
                                            </span>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="font-bold text-gray-900">{{ $k->user->name ?? '-' }}</div>
                                        <div class="text-[11px] text-gray-400">{{ $k->user->email ?? '-' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <div class="font-semibold text-gray-800">{{ $k->spesialisasi }}</div>
                                @if($k->bio)
                                    <div class="text-[11px] text-gray-400 line-clamp-1 max-w-xs mt-0.5">{{ $k->bio }}</div>
                                @endif
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <div class="font-extrabold text-[#16A34A]">Rp {{ number_format($k->harga_per_sesi, 0, ',', '.') }}</div>
                                <div class="text-[10px] text-gray-400">{{ $k->durasi_menit }} menit / sesi</div>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-1 font-bold text-gray-800">
                                    <span class="text-amber-400">★</span> {{ number_format($k->rating, 1) }}
                                </div>
                                <div class="text-[10px] text-gray-400 mt-0.5">{{ $k->total_konsultasi }} konsultasi selesai</div>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <form method="POST" action="{{ route('admin.konsultan.toggle', $k) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                            title="Klik untuk mengubah status aktif"
                                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold transition-all {{ $k->is_active ? 'bg-emerald-100 text-emerald-800 hover:bg-emerald-200' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $k->is_active ? 'bg-emerald-500' : 'bg-gray-400' }}"></span>
                                        {{ $k->is_active ? 'Aktif' : 'Non-aktif' }}
                                    </button>
                                </form>
                            </td>
                            <td class="px-5 py-4 text-right whitespace-nowrap">
                                <button @click="editModal = true" class="px-3 py-1.5 bg-[#F0FDF4] hover:bg-[#DCFCE7] text-[#16A34A] border border-[#BBF7D0] rounded-xl font-bold text-xs transition-colors">
                                    Edit Tarif
                                </button>

                                {{-- Modal Edit Praktisi --}}
                                <div x-show="editModal"
                                     x-cloak
                                     class="fixed inset-0 z-50 overflow-y-auto bg-gray-900/50 backdrop-blur-xs flex items-center justify-center p-4">
                                    <div @click.away="editModal = false" class="bg-white rounded-2xl max-w-lg w-full p-5 sm:p-6 text-left shadow-2xl space-y-4 max-h-[90vh] overflow-y-auto">
                                        <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                                            <div>
                                                <h4 class="font-extrabold text-base text-gray-900">Edit Praktisi: {{ $k->user->name ?? 'Praktisi' }}</h4>
                                                <p class="text-xs text-gray-400">{{ $k->user->email ?? '' }}</p>
                                            </div>
                                            <button @click="editModal = false" class="text-gray-400 hover:text-gray-600">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </button>
                                        </div>

                                        <form method="POST" action="{{ route('admin.konsultan.update', $k) }}" class="space-y-4">
                                            @csrf
                                            @method('PUT')

                                            <div>
                                                <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Spesialisasi</label>
                                                <input type="text"
                                                       name="spesialisasi"
                                                       value="{{ old('spesialisasi', $k->spesialisasi) }}"
                                                       required
                                                       class="w-full text-xs p-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#16A34A]">
                                            </div>

                                            <div class="grid grid-cols-2 gap-4">
                                                <div>
                                                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Tarif / Sesi (Rp)</label>
                                                    <input type="number"
                                                           name="harga_per_sesi"
                                                           value="{{ old('harga_per_sesi', $k->harga_per_sesi) }}"
                                                           required
                                                           min="0"
                                                           class="w-full text-xs p-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#16A34A]">
                                                </div>

                                                <div>
                                                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Durasi (Menit)</label>
                                                    <input type="number"
                                                           name="durasi_menit"
                                                           value="{{ old('durasi_menit', $k->durasi_menit) }}"
                                                           required
                                                           min="15"
                                                           class="w-full text-xs p-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#16A34A]">
                                                </div>
                                            </div>

                                            <div>
                                                <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Biodata / Profil Singkat</label>
                                                <textarea name="bio"
                                                          rows="3"
                                                          class="w-full text-xs p-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#16A34A]">{{ old('bio', $k->bio) }}</textarea>
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
                                Tidak ada data praktisi yang sesuai.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($konsultans->hasPages())
            <div class="p-4 border-t border-gray-100 bg-gray-50/50">
                {{ $konsultans->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
