@extends('layouts.app')

@section('title', 'Pembayaran — ' . $booking->kode_booking)

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-2xl mx-auto px-4">

        <div class="text-center mb-8">
            <h1 class="text-2xl font-extrabold text-gray-900">Selesaikan Pembayaran</h1>
            <p class="text-gray-500 mt-1">Booking Anda menunggu pembayaran</p>
        </div>

        {{-- Booking Summary --}}
        <div class="bg-white border border-gray-100 rounded-2xl p-6 mb-6">
            <h2 class="font-bold text-gray-800 mb-4 text-lg">Ringkasan Booking</h2>
            <div class="space-y-3 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-500">Kode Booking</span>
                    <span class="font-mono font-bold text-gray-800">{{ $booking->kode_booking }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Konsultan</span>
                    <span class="font-semibold">{{ $booking->konsultan->user->name }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Spesialisasi</span>
                    <span>{{ $booking->konsultan->spesialisasi }}</span>
                </div>
                @if($booking->jadwal)
                <div class="flex justify-between">
                    <span class="text-gray-500">Tanggal</span>
                    <span class="font-semibold">{{ $booking->jadwal->tanggal->format('d M Y') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Waktu</span>
                    <span>{{ substr($booking->jadwal->jam_mulai, 0, 5) }} – {{ substr($booking->jadwal->jam_selesai, 0, 5) }} WIB</span>
                </div>
                @endif
                <div class="flex justify-between border-t border-gray-100 pt-3 font-bold text-base">
                    <span>Total Bayar</span>
                    <span class="text-emerald-700">
                        Rp {{ number_format($booking->payment?->totalAmount() ?? $booking->konsultan->harga_per_sesi, 0, ',', '.') }}
                    </span>
                </div>
            </div>
        </div>

        {{-- Payment Info --}}
        <div class="bg-emerald-50 border border-emerald-200 rounded-2xl p-5 mb-6">
            <div class="flex gap-3">
                <span class="text-2xl">💳</span>
                <div>
                    <h3 class="font-semibold text-emerald-800 mb-1">Metode Pembayaran</h3>
                    <p class="text-emerald-700 text-sm">Pilih pembayaran dengan <strong>QRIS</strong>, <strong>Transfer Bank (BCA, BNI, BRI, Mandiri)</strong> atau metode lainnya melalui Midtrans.</p>
                </div>
            </div>
        </div>

        {{-- Pay Button --}}
        <button id="pay-button"
            onclick="openMidtransPayment()"
            class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-lg py-4 rounded-2xl transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
            💳 Bayar Sekarang
        </button>

        <p class="text-center text-xs text-gray-400 mt-4">
            🔒 Pembayaran aman diproses oleh <strong>Midtrans</strong> — terpercaya & tersertifikasi PCI DSS
        </p>

        <div class="text-center mt-4">
            <a href="{{ route('konsultasi.index') }}" class="text-sm text-gray-500 hover:text-gray-700 underline">
                Batalkan dan kembali
            </a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
function openMidtransPayment() {
    const btn = document.getElementById('pay-button');
    btn.disabled = true;
    btn.innerHTML = '⌛ Memproses...';

    window.snap.pay('{{ $snapToken }}', {
        onSuccess: function(result) {
            window.location.href = '{{ route("payment.finish", $booking->kode_booking) }}';
        },
        onPending: function(result) {
            alert('Pembayaran sedang diproses. Cek email/WA Anda untuk konfirmasi.');
            window.location.href = '{{ route("konsultasi.riwayat") }}';
        },
        onError: function(result) {
            alert('Pembayaran gagal. Silakan coba lagi.');
            btn.disabled = false;
            btn.innerHTML = '💳 Bayar Sekarang';
        },
        onClose: function() {
            btn.disabled = false;
            btn.innerHTML = '💳 Bayar Sekarang';
        }
    });
}
</script>
@endpush
