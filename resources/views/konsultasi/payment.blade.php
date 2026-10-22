@extends('layouts.app')

@section('title', 'Pembayaran Booking ' . $booking->kode_booking . ' — Hallobun')

@section('content')
@php
    $totalAmount = $booking->payment?->amount ?? $booking->konsultan->harga_per_sesi;
    $adminPhone = preg_replace('/[^0-9]/', '', config('hallobun.admin_phone', '6285713850615'));
    if (str_starts_with($adminPhone, '0')) {
        $adminPhone = '62' . substr($adminPhone, 1);
    }
    
    $waText = "Halo Kak Amanda (Admin Hallobun), saya telah melakukan transfer pembayaran konsultasi:\n\n"
            . "• Kode Booking: {$booking->kode_booking}\n"
            . "• Praktisi: {$booking->konsultan->user->name}\n"
            . "• Tanggal Sesi: " . ($booking->jadwal ? $booking->jadwal->tanggal->format('d M Y') : 'Fleksibel') . "\n"
            . "• Jumlah: Rp " . number_format($totalAmount, 0, ',', '.') . "\n"
            . "• Rekening Tujuan: Bank Mandiri (1030012983454 a.n CV SARANA HIJAU)\n\n"
            . "Berikut terlampir bukti transfer saya. Mohon segera diverifikasi ya, terima kasih!";
    $waUrl = "https://wa.me/{$adminPhone}?text=" . rawurlencode($waText);
@endphp

<div class="bg-[#F8FAFC] min-h-screen py-10 sm:py-14">
    <div class="max-w-2xl mx-auto px-4 sm:px-6">

        {{-- Top Notification Badge --}}
        <div class="text-center mb-8">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800 border border-amber-200 mb-3">
                <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                Menunggu Pembayaran
            </span>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#1E293B]">Instruksi Pembayaran</h1>
            <p class="text-slate-600 text-sm mt-1.5">Selesaikan transfer untuk mengaktifkan sesi konsultasi Anda</p>
        </div>

        {{-- Booking Summary Card --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 mb-6 shadow-xs">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4 mb-4">
                <div>
                    <span class="text-xs text-slate-500 font-medium">KODE BOOKING</span>
                    <div class="font-mono font-extrabold text-slate-800 text-base sm:text-lg tracking-wider">{{ $booking->kode_booking }}</div>
                </div>
                <div class="text-right">
                    <span class="text-xs text-slate-500 font-medium">TOTAL TRANSFER</span>
                    <div class="text-lg sm:text-xl font-extrabold text-[#16A34A]">Rp {{ number_format($totalAmount, 0, ',', '.') }}</div>
                </div>
            </div>

            <div class="space-y-2.5 text-xs sm:text-sm">
                <div class="flex justify-between">
                    <span class="text-slate-500">Praktisi</span>
                    <span class="font-bold text-slate-800">{{ $booking->konsultan->user->name }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-slate-500">Spesialisasi</span>
                    <span class="text-slate-700 text-right">{{ $booking->konsultan->spesialisasi }}</span>
                </div>
                @if($booking->jadwal)
                <div class="flex justify-between">
                    <span class="text-slate-500">Jadwal Sesi</span>
                    <span class="font-semibold text-slate-800">
                        {{ $booking->jadwal->tanggal->format('d M Y') }} • {{ substr($booking->jadwal->jam_mulai, 0, 5) }} – {{ substr($booking->jadwal->jam_selesai, 0, 5) }} WIB
                    </span>
                </div>
                @endif
                <div class="flex justify-between">
                    <span class="text-slate-500">Media Konsultasi</span>
                    <span class="font-medium text-slate-700">Video Call Interaktif (Jitsi Meet)</span>
                </div>
            </div>
        </div>

        {{-- Official Bank Account Card (Bank Mandiri) --}}
        <div class="bg-gradient-to-br from-[#0F2B48] via-[#003B73] to-[#002244] text-white rounded-3xl p-6 sm:p-8 mb-6 shadow-xl relative overflow-hidden border border-blue-900">
            {{-- Decorative watermark background --}}
            <div class="absolute -right-8 -bottom-8 w-44 h-44 rounded-full bg-white/5 pointer-events-none"></div>
            <div class="absolute -right-4 -top-8 w-32 h-32 rounded-full bg-amber-400/10 pointer-events-none"></div>

            <div class="flex items-start justify-between relative z-10 mb-6">
                <div>
                    <span class="text-[11px] uppercase tracking-wider text-blue-200 font-bold block mb-1">REKENING PEMBAYARAN RESMI</span>
                    <h2 class="text-xl sm:text-2xl font-black tracking-tight text-white flex items-center gap-2">
                        <span>Bank Mandiri</span>
                        <span class="text-xs bg-amber-400 text-slate-900 font-extrabold px-2 py-0.5 rounded-full">Official</span>
                    </h2>
                </div>
                <div class="text-right">
                    <span class="text-xs text-blue-200 font-mono">ID: 008</span>
                </div>
            </div>

            {{-- Account Number Box with Copy --}}
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-4 sm:p-5 border border-white/15 mb-4 relative z-10">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div>
                        <div class="text-xs text-blue-200 mb-1">Nomor Rekening Mandiri</div>
                        <div class="font-mono text-2xl sm:text-3xl font-extrabold tracking-wider text-amber-300" id="rek-num">
                            1030012983454
                        </div>
                    </div>
                    <button type="button" onclick="copyText('1030012983454', this)"
                        class="self-start sm:self-center bg-white hover:bg-slate-100 text-[#003B73] font-bold text-xs px-4 py-2.5 rounded-xl transition-all shadow-sm active:scale-95 flex items-center gap-1.5 cursor-pointer">
                        <span>📋</span> <span>Salin Nomor</span>
                    </button>
                </div>
            </div>

            {{-- Account Name & Amount --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 relative z-10 pt-2 border-t border-white/10 text-xs sm:text-sm">
                <div>
                    <span class="text-blue-200 text-xs block mb-0.5">Atas Nama (A/N):</span>
                    <div class="font-bold text-base text-white tracking-wide">CV SARANA HIJAU</div>
                </div>
                <div>
                    <span class="text-blue-200 text-xs block mb-0.5">Jumlah Tepat Transfer:</span>
                    <div class="flex items-center gap-2">
                        <span class="font-mono font-extrabold text-base text-amber-300">Rp {{ number_format($totalAmount, 0, ',', '.') }}</span>
                        <button type="button" onclick="copyText('{{ $totalAmount }}', this)"
                            class="text-[11px] bg-white/20 hover:bg-white/30 text-white font-semibold px-2 py-1 rounded-lg transition-all cursor-pointer">
                            Salin
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Transfer Guide & WhatsApp Confirmation --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 mb-6 shadow-xs">
            <h3 class="font-bold text-slate-800 text-base mb-3 flex items-center gap-2">
                <span>📌</span> Langkah Mudah Pembayaran &amp; Aktivasi:
            </h3>
            <ol class="space-y-3 text-xs sm:text-sm text-slate-600 list-decimal list-inside pl-1">
                <li>Transfer nominal <strong class="text-slate-900 font-bold">Rp {{ number_format($totalAmount, 0, ',', '.') }}</strong> ke rekening <strong class="text-slate-900 font-bold">Bank Mandiri 1030012983454 (a.n CV SARANA HIJAU)</strong>.</li>
                <li>Gunakan berita transfer / keterangan: <strong class="font-mono text-slate-900 bg-slate-100 px-1.5 py-0.5 rounded">{{ $booking->kode_booking }}</strong>.</li>
                <li>Simpan struk atau tangkapan layar (screenshot) bukti transfer Anda.</li>
                <li>Klik tombol hijau di bawah untuk konfirmasi ke WhatsApp Admin agar jadwal dan tautan video call segera diaktifkan.</li>
            </ol>

            {{-- WhatsApp Confirmation Button --}}
            <div class="mt-6 pt-5 border-t border-slate-100">
                <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer"
                    class="w-full bg-[#16A34A] hover:bg-[#15803D] text-white font-extrabold text-sm sm:text-base py-3.5 px-6 rounded-xl transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2.5 text-center group">
                    <span class="text-xl">💬</span>
                    <span>Konfirmasi Pembayaran via WhatsApp</span>
                    <span class="group-hover:translate-x-1 transition-transform">→</span>
                </a>
                <p class="text-center text-[11px] text-slate-400 mt-2.5">
                    Pesan otomatis telah disiapkan dengan Kode Booking Anda. Cukup kirimkan foto bukti transfer.
                </p>
            </div>
        </div>

        {{-- Midtrans Snap Button (jika tersedia) --}}
        @if(!empty($snapToken))
        <div class="bg-slate-50 border border-slate-200 rounded-2xl p-5 mb-6 text-center">
            <div class="text-xs text-slate-500 mb-2 font-medium">Ingin bayar otomatis via QRIS / E-Wallet?</div>
            <button id="pay-button" onclick="openMidtransPayment()"
                class="inline-flex items-center justify-center gap-2 bg-slate-800 hover:bg-slate-900 text-white font-bold text-xs sm:text-sm py-2.5 px-5 rounded-xl transition-all shadow-xs cursor-pointer">
                <span>⚡</span>
                <span>Bayar Otomatis (QRIS / GoPay / Virtual Account)</span>
            </button>
        </div>
        @endif

        {{-- Footer Actions --}}
        <div class="flex items-center justify-between text-xs text-slate-500 pt-2 px-2">
            <a href="{{ route('konsultasi.riwayat') }}" class="hover:text-slate-800 underline flex items-center gap-1">
                ← Lihat Riwayat Booking
            </a>
            <a href="{{ route('konsultasi.index') }}" class="hover:text-slate-800 underline">
                Kembali ke Daftar Praktisi
            </a>
        </div>

    </div>
</div>

{{-- Toast Notification for Copy --}}
<div id="copy-toast" class="fixed bottom-6 right-6 bg-slate-900 text-white text-xs font-semibold px-4 py-2.5 rounded-xl shadow-2xl transition-all transform translate-y-16 opacity-0 pointer-events-none z-50 flex items-center gap-2">
    <span>✓</span>
    <span id="copy-toast-text">Berhasil disalin ke clipboard</span>
</div>

@endsection

@push('scripts')
<script>
function copyText(text, btnElement) {
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(text).then(showToast).catch(() => fallbackCopy(text));
    } else {
        fallbackCopy(text);
    }

    if (btnElement) {
        const originalText = btnElement.innerHTML;
        btnElement.innerHTML = '<span>✓</span> <span>Tersalin!</span>';
        setTimeout(() => {
            btnElement.innerHTML = originalText;
        }, 2000);
    }
}

function fallbackCopy(text) {
    const textArea = document.createElement("textarea");
    textArea.value = text;
    textArea.style.position = "fixed";
    textArea.style.opacity = "0";
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    try {
        document.execCommand('copy');
        showToast();
    } catch (err) {
        console.error('Fallback copy failed', err);
    }
    document.body.removeChild(textArea);
}

function showToast() {
    const toast = document.getElementById('copy-toast');
    toast.classList.remove('translate-y-16', 'opacity-0');
    toast.classList.add('translate-y-0', 'opacity-100');
    setTimeout(() => {
        toast.classList.remove('translate-y-0', 'opacity-100');
        toast.classList.add('translate-y-16', 'opacity-0');
    }, 2500);
}
</script>

@if(!empty($snapToken))
<script src="{{ config('midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}"
    data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
function openMidtransPayment() {
    const btn = document.getElementById('pay-button');
    if (btn) {
        btn.disabled = true;
        btn.innerHTML = '⌛ Memproses...';
    }

    window.snap.pay('{{ $snapToken }}', {
        onSuccess: function(result) {
            window.location.href = '{{ route("payment.finish", $booking->kode_booking) }}';
        },
        onPending: function(result) {
            alert('Pembayaran sedang diproses.');
            window.location.href = '{{ route("konsultasi.riwayat") }}';
        },
        onError: function(result) {
            alert('Pembayaran gagal. Silakan gunakan metode Transfer Bank Mandiri.');
            if (btn) {
                btn.disabled = false;
                btn.innerHTML = '<span>⚡</span> <span>Bayar Otomatis (QRIS / Virtual Account)</span>';
            }
        },
        onClose: function() {
            if (btn) {
                btn.disabled = false;
                btn.innerHTML = '<span>⚡</span> <span>Bayar Otomatis (QRIS / Virtual Account)</span>';
            }
        }
    });
}
</script>
@endif
@endpush
