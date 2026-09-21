@extends('layouts.app')

@section('title', 'Room Meeting — ' . $booking->kode_booking)

@section('content')
<div class="bg-gray-900 min-h-screen flex flex-col">
    {{-- Meeting Header --}}
    <div class="bg-gray-800 border-b border-gray-700 px-6 py-3 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-7 h-7 bg-emerald-500 rounded-lg flex items-center justify-center">
                <span class="text-white font-black text-sm">H</span>
            </div>
            <span class="text-white font-semibold">hallobun</span>
            <span class="text-gray-500">•</span>
            <span class="text-gray-300 text-sm">Konsultasi dengan <strong class="text-white">{{ $booking->konsultan->user->name }}</strong></span>
        </div>
        <div class="flex items-center gap-3 text-sm">
            <span class="bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full animate-pulse">LIVE</span>
            <span class="text-gray-400 font-mono" id="session-timer">00:00</span>
            <a href="{{ route('dashboard') }}"
               onclick="return confirm('Yakin ingin keluar dari sesi?')"
               class="bg-red-600 hover:bg-red-700 text-white text-xs font-semibold px-3 py-1.5 rounded-lg transition-colors">
                Akhiri Sesi
            </a>
        </div>
    </div>

    {{-- Jitsi Meet Frame --}}
    <div class="flex-1 relative" id="jitsi-container">
        <div id="jitsi-loading" class="absolute inset-0 flex items-center justify-center bg-gray-900 z-10">
            <div class="text-center">
                <div class="w-16 h-16 border-4 border-emerald-500 border-t-transparent rounded-full animate-spin mx-auto mb-4"></div>
                <p class="text-white font-semibold">Menghubungkan ke room...</p>
                <p class="text-gray-400 text-sm mt-1">{{ $booking->meeting_room }}</p>
            </div>
        </div>
        <div id="jitsi-frame" class="w-full" style="height: calc(100vh - 56px)"></div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://meet.jit.si/external_api.js"></script>
<script>
const config = @json($jitsiConfig);

const api = new JitsiMeetExternalAPI(config.domain, {
    roomName: config.roomName,
    parentNode: document.getElementById('jitsi-frame'),
    width: '100%',
    height: '100%',
    userInfo: config.userInfo,
    configOverwrite: config.configOverwrite,
    interfaceConfigOverwrite: config.interfaceConfigOverwrite,
});

api.addEventListener('videoConferenceJoined', function() {
    document.getElementById('jitsi-loading').style.display = 'none';
    startTimer();
});

// Session timer
let seconds = 0;
function startTimer() {
    setInterval(() => {
        seconds++;
        const m = String(Math.floor(seconds / 60)).padStart(2, '0');
        const s = String(seconds % 60).padStart(2, '0');
        document.getElementById('session-timer').textContent = `${m}:${s}`;
    }, 1000);
}

api.addEventListener('readyToClose', function() {
    window.location.href = '{{ route("dashboard") }}';
});
</script>
@endpush
