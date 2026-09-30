@extends('admin.layout')

@section('title', 'Dashboard Admin — Hallobun')
@section('page-title', 'Ringkasan Dashboard')

@section('content')
<div class="space-y-6">
    {{-- Header Greeting --}}
    <div class="bg-gradient-to-r from-[#16A34A] to-[#15803D] rounded-2xl p-6 text-white shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl sm:text-2xl font-extrabold">Selamat Datang, {{ auth()->user()->name }}! 👋</h2>
            <p class="text-[#BBF7D0] text-sm mt-1">Kelola konsultasi agronom, kunjungan kebun, undangan narasumber, dan sarana pertanian di satu tempat.</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.sarana.create') }}" class="px-4 py-2 bg-white text-[#16A34A] hover:bg-gray-50 rounded-xl font-bold text-xs shadow transition-all active:scale-95 inline-flex items-center gap-1.5 whitespace-nowrap">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                + Produk Baru
            </a>
        </div>
    </div>

    {{-- Stats Cards Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        {{-- Card 1: Total Pendapatan --}}
        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-xs">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Total Pendapatan</span>
                <div class="w-10 h-10 rounded-xl bg-[#F0FDF4] border border-[#BBF7D0] flex items-center justify-center text-[#16A34A]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <div class="text-2xl font-extrabold text-gray-900">Rp {{ number_format($stats['total_pendapatan'], 0, ',', '.') }}</div>
                <div class="text-xs text-gray-400 mt-1">Dari booking & transaksi terbayar</div>
            </div>
        </div>

        {{-- Card 2: Booking Konsultasi --}}
        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-xs">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Booking Konsultasi</span>
                <div class="w-10 h-10 rounded-xl bg-blue-50 border border-blue-200 flex items-center justify-center text-blue-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-baseline justify-between">
                <div class="text-2xl font-extrabold text-gray-900">{{ $stats['total_booking'] }}</div>
                @if($stats['pending_booking'] > 0)
                    <span class="px-2 py-0.5 text-xs font-bold bg-amber-100 text-amber-800 rounded-full">{{ $stats['pending_booking'] }} Menunggu</span>
                @else
                    <span class="px-2 py-0.5 text-xs font-bold bg-gray-100 text-gray-600 rounded-full">Semua Terproses</span>
                @endif
            </div>
            <a href="{{ route('admin.bookings.index') }}" class="text-xs font-bold text-[#16A34A] hover:underline mt-2 inline-block">Lihat semua booking &rarr;</a>
        </div>

        {{-- Card 3: Kunjungan Lahan --}}
        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-xs">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Kunjungan Lahan</span>
                <div class="w-10 h-10 rounded-xl bg-purple-50 border border-purple-200 flex items-center justify-center text-purple-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-baseline justify-between">
                <div class="text-2xl font-extrabold text-gray-900">{{ $stats['total_kunjungan'] }}</div>
                @if($stats['pending_kunjungan'] > 0)
                    <span class="px-2 py-0.5 text-xs font-bold bg-amber-100 text-amber-800 rounded-full">{{ $stats['pending_kunjungan'] }} Pending</span>
                @endif
            </div>
            <a href="{{ route('admin.kunjungan.index') }}" class="text-xs font-bold text-[#16A34A] hover:underline mt-2 inline-block">Kelola kunjungan &rarr;</a>
        </div>

        {{-- Card 4: Undang Narasumber --}}
        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-xs">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Undangan Narsum</span>
                <div class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-200 flex items-center justify-center text-emerald-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 100-6 3 3 0 000 6z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-baseline justify-between">
                <div class="text-2xl font-extrabold text-gray-900">{{ $stats['total_narsum'] }}</div>
                @if($stats['pending_narsum'] > 0)
                    <span class="px-2 py-0.5 text-xs font-bold bg-amber-100 text-amber-800 rounded-full">{{ $stats['pending_narsum'] }} Baru</span>
                @endif
            </div>
            <a href="{{ route('admin.narsum.index') }}" class="text-xs font-bold text-[#16A34A] hover:underline mt-2 inline-block">Kelola narasumber &rarr;</a>
        </div>
    </div>

    {{-- Secondary Metric Bar --}}
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <div class="bg-white p-4 rounded-xl border border-gray-100 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-gray-100 flex items-center justify-center text-gray-700 font-bold text-sm">
                👥
            </div>
            <div>
                <p class="text-[11px] text-gray-400 font-bold uppercase">Petani Terdaftar</p>
                <p class="text-lg font-extrabold text-gray-800">{{ $stats['total_users'] }}</p>
            </div>
        </div>

        <div class="bg-white p-4 rounded-xl border border-gray-100 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-[#F0FDF4] text-[#16A34A] flex items-center justify-center font-bold text-sm">
                🌱
            </div>
            <div>
                <p class="text-[11px] text-gray-400 font-bold uppercase">Praktisi Aktif</p>
                <p class="text-lg font-extrabold text-gray-800">{{ $stats['total_konsultan'] }}</p>
            </div>
        </div>

        <div class="bg-white p-4 rounded-xl border border-gray-100 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-orange-50 text-orange-600 flex items-center justify-center font-bold text-sm">
                📦
            </div>
            <div>
                <p class="text-[11px] text-gray-400 font-bold uppercase">Total Produk</p>
                <p class="text-lg font-extrabold text-gray-800">{{ $stats['total_sarana'] }}</p>
            </div>
        </div>

        <div class="bg-white p-4 rounded-xl border border-gray-100 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-rose-50 text-rose-600 flex items-center justify-center font-bold text-sm">
                ⚠️
            </div>
            <div>
                <p class="text-[11px] text-gray-400 font-bold uppercase">Stok Rendah (≤5)</p>
                <p class="text-lg font-extrabold {{ $stats['low_stock_sarana'] > 0 ? 'text-rose-600' : 'text-gray-800' }}">{{ $stats['low_stock_sarana'] }}</p>
            </div>
        </div>
    </div>

    {{-- Recent Tables Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Recent Bookings --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-xs overflow-hidden">
            <div class="p-5 border-b border-gray-100 flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-gray-900 text-sm sm:text-base">Booking Konsultasi Terbaru</h3>
                    <p class="text-xs text-gray-400 mt-0.5">5 sesi konsultasi online terakhir</p>
                </div>
                <a href="{{ route('admin.bookings.index') }}" class="text-xs font-bold text-[#16A34A] hover:underline">Semua &rarr;</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-gray-50 text-gray-500 uppercase font-bold border-b border-gray-100">
                        <tr>
                            <th class="px-4 py-3">Kode / Petani</th>
                            <th class="px-4 py-3">Praktisi</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($recentBookings as $b)
                            <tr class="hover:bg-gray-50/80">
                                <td class="px-4 py-3">
                                    <div class="font-bold text-gray-900">{{ $b->kode_booking }}</div>
                                    <div class="text-[11px] text-gray-500">{{ $b->user->name ?? '-' }}</div>
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-700">
                                    {{ $b->konsultan->user->name ?? '-' }}
                                </td>
                                <td class="px-4 py-3">
                                    @php
                                        $badgeColor = match($b->status) {
                                            'confirmed' => 'bg-emerald-100 text-emerald-800',
                                            'completed' => 'bg-blue-100 text-blue-800',
                                            'cancelled' => 'bg-rose-100 text-rose-800',
                                            default     => 'bg-amber-100 text-amber-800',
                                        };
                                    @endphp
                                    <span class="px-2 py-0.5 text-[10px] font-bold rounded-full {{ $badgeColor }}">
                                        {{ ucfirst($b->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <a href="{{ route('admin.bookings.index', ['search' => $b->kode_booking]) }}" class="text-[#16A34A] font-bold hover:underline">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-6 text-center text-gray-400">Belum ada booking konsultasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Recent Kunjungan Lahan --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-xs overflow-hidden">
            <div class="p-5 border-b border-gray-100 flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-gray-900 text-sm sm:text-base">Permintaan Kunjungan Lapangan</h3>
                    <p class="text-xs text-gray-400 mt-0.5">5 permintaan inspeksi kebun terbaru</p>
                </div>
                <a href="{{ route('admin.kunjungan.index') }}" class="text-xs font-bold text-[#16A34A] hover:underline">Semua &rarr;</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-gray-50 text-gray-500 uppercase font-bold border-b border-gray-100">
                        <tr>
                            <th class="px-4 py-3">Pemilik / Lokasi</th>
                            <th class="px-4 py-3">Tanaman</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($recentKunjungan as $k)
                            <tr class="hover:bg-gray-50/80">
                                <td class="px-4 py-3">
                                    <div class="font-bold text-gray-900">{{ $k->nama_pemilik }}</div>
                                    <div class="text-[11px] text-gray-500">{{ $k->kota }}</div>
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-700">
                                    {{ $k->jenis_tanaman }}
                                </td>
                                <td class="px-4 py-3">
                                    @php
                                        $badgeColor = match($k->status) {
                                            'confirmed' => 'bg-emerald-100 text-emerald-800',
                                            'completed' => 'bg-blue-100 text-blue-800',
                                            'cancelled' => 'bg-rose-100 text-rose-800',
                                            default     => 'bg-amber-100 text-amber-800',
                                        };
                                    @endphp
                                    <span class="px-2 py-0.5 text-[10px] font-bold rounded-full {{ $badgeColor }}">
                                        {{ ucfirst($k->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <a href="{{ route('admin.kunjungan.index', ['search' => $k->nama_pemilik]) }}" class="text-[#16A34A] font-bold hover:underline">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-6 text-center text-gray-400">Belum ada permintaan kunjungan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
