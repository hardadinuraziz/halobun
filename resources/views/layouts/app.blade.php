<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="description" content="@yield('meta_description', 'Hallobun - Platform Konsultasi Pertanian Digital. Konsultasi online, undang narasumber, kunjungan lapangan, dan sarana pertanian terlengkap.')">
    <title>@yield('title', 'Hallobun') - Platform Konsultasi Pertanian</title>

    {{-- Preconnect fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Vite compiled CSS + JS (Tailwind is included here) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @stack('styles')
</head>
<body class="bg-[#F8FAF7] text-[#2D3A2C] antialiased">

{{-- ═══ NAVBAR ═══════════════════════════════════════════════════════════ --}}
<nav class="bg-[#F8FAF7]/95 backdrop-blur-md shadow-sm sticky top-0 z-50 border-b border-[#E3EAE0]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center flex-shrink-0 group">
                <img src="/images/logo.jpg"
                     alt="Hallobun"
                     class="h-8 sm:h-9 w-auto object-contain group-hover:opacity-85 transition-opacity"
                     style="max-width:130px">
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden md:flex items-center gap-5 lg:gap-6">
                <a href="{{ route('home') }}"
                   class="nav-link text-sm font-medium text-gray-600 hover:text-emerald-700 transition-colors
                          {{ request()->routeIs('home') ? 'text-emerald-700 active' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('layanan') }}"
                   class="nav-link text-sm font-medium text-gray-600 hover:text-emerald-700 transition-colors
                          {{ request()->routeIs('layanan') ? 'text-emerald-700 active' : '' }}">
                    Layanan
                </a>
                <a href="{{ route('konsultasi.index') }}"
                   class="nav-link text-sm font-medium text-gray-600 hover:text-emerald-700 transition-colors
                          {{ request()->routeIs('konsultasi.*') ? 'text-emerald-700 active' : '' }}">
                    Konsultasi
                </a>
                <a href="{{ route('narsum.index') }}"
                   class="nav-link text-sm font-medium text-gray-600 hover:text-emerald-700 transition-colors
                          {{ request()->routeIs('narsum.*') ? 'text-emerald-700 active' : '' }}">
                    Narsum
                </a>
                <a href="{{ route('kunjungan.index') }}"
                   class="nav-link text-sm font-medium text-gray-600 hover:text-emerald-700 transition-colors
                          {{ request()->routeIs('kunjungan.*') ? 'text-emerald-700 active' : '' }}">
                    Kunjungan
                </a>
                <a href="{{ route('sarana.index') }}"
                   class="nav-link text-sm font-medium text-gray-600 hover:text-emerald-700 transition-colors
                          {{ request()->routeIs('sarana.*') ? 'text-emerald-700 active' : '' }}">
                    Sarana
                </a>
            </div>

            {{-- Right side --}}
            <div class="flex items-center gap-2 sm:gap-3">
                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                                class="flex items-center gap-2 text-sm font-medium text-gray-700 hover:text-emerald-700 transition-colors focus:outline-none">
                            <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-emerald-700 font-bold text-xs">{{ substr(auth()->user()->name, 0, 2) }}</span>
                            </div>
                            <span class="hidden sm:block max-w-[100px] truncate">{{ auth()->user()->name }}</span>
                            <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition
                             class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-1 z-50">
                            <a href="{{ route('dashboard') }}"
                               class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700">
                                📊 Dashboard
                            </a>
                            <a href="{{ route('konsultasi.riwayat') }}"
                               class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700">
                                📋 Riwayat Konsultasi
                            </a>
                            <hr class="my-1 border-gray-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="flex items-center gap-2 w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                    🚪 Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                       class="text-sm font-medium text-gray-600 hover:text-emerald-700 transition-colors hidden sm:block">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}"
                       class="bg-emerald-700 hover:bg-emerald-800 text-white text-xs sm:text-sm font-semibold px-3 sm:px-3.5 py-1.5 sm:py-2 rounded-lg transition-colors shadow-sm whitespace-nowrap">
                        Daftar
                    </a>
                @endauth

                {{-- Hamburger button --}}
                <button id="hamburger-btn"
                        aria-label="Buka menu navigasi"
                        aria-expanded="false"
                        aria-controls="mobile-menu"
                        class="md:hidden p-2 rounded-lg text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors focus:outline-none">
                    <svg id="icon-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg id="icon-close" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu"
         role="navigation"
         class="md:hidden bg-white/98">
        <div class="px-4 py-3 space-y-1">
            <a href="{{ route('home') }}"
               class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-sm font-medium
                      {{ request()->routeIs('home') ? 'bg-emerald-50 text-emerald-800' : 'text-gray-700 hover:bg-emerald-50 hover:text-emerald-700' }}">
                🏡 Beranda
            </a>
            <a href="{{ route('layanan') }}"
               class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-sm font-medium
                      {{ request()->routeIs('layanan') ? 'bg-emerald-50 text-emerald-800' : 'text-gray-700 hover:bg-emerald-50 hover:text-emerald-700' }}">
                📋 Semua Layanan
            </a>
            <a href="{{ route('konsultasi.index') }}"
               class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-sm font-medium
                      {{ request()->routeIs('konsultasi.*') ? 'bg-emerald-50 text-emerald-800' : 'text-gray-700 hover:bg-emerald-50 hover:text-emerald-700' }}">
                💬 Konsultasi Online
            </a>
            <a href="{{ route('narsum.index') }}"
               class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-sm font-medium
                      {{ request()->routeIs('narsum.*') ? 'bg-emerald-50 text-emerald-800' : 'text-gray-700 hover:bg-emerald-50 hover:text-emerald-700' }}">
                🎤 Undang Narsum
            </a>
            <a href="{{ route('kunjungan.index') }}"
               class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-sm font-medium
                      {{ request()->routeIs('kunjungan.*') ? 'bg-emerald-50 text-emerald-800' : 'text-gray-700 hover:bg-emerald-50 hover:text-emerald-700' }}">
                🚜 Kunjungan Lapangan
            </a>
            <a href="{{ route('sarana.index') }}"
               class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-sm font-medium
                      {{ request()->routeIs('sarana.*') ? 'bg-emerald-50 text-emerald-800' : 'text-gray-700 hover:bg-emerald-50 hover:text-emerald-700' }}">
                🌿 Sarana & Bibit
            </a>

            @auth
            <div class="pt-3 pb-1 border-t border-gray-100 mt-2 space-y-1">
                <div class="px-3 py-1.5 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                    Akun: {{ auth()->user()->name }}
                </div>
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-3 py-2 rounded-xl text-sm font-medium text-gray-700 hover:bg-emerald-50 hover:text-emerald-700">
                    📊 Dashboard
                </a>
                <a href="{{ route('konsultasi.riwayat') }}" class="flex items-center gap-2 px-3 py-2 rounded-xl text-sm font-medium text-gray-700 hover:bg-emerald-50 hover:text-emerald-700">
                    📋 Riwayat Konsultasi
                </a>
                <form method="POST" action="{{ route('logout') }}" class="pt-1">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 w-full text-left px-3 py-2 rounded-xl text-sm font-medium text-red-600 hover:bg-red-50">
                        🚪 Keluar
                    </button>
                </form>
            </div>
            @else
            <div class="flex gap-2 pt-3 pb-1 border-t border-gray-100 mt-2">
                <a href="{{ route('login') }}"
                   class="flex-1 text-center px-3 py-2.5 rounded-xl text-sm font-semibold text-emerald-700 border border-emerald-200 hover:bg-emerald-50">
                    Masuk
                </a>
                <a href="{{ route('register') }}"
                   class="flex-1 text-center px-3 py-2.5 rounded-xl text-sm font-semibold text-white bg-emerald-700 hover:bg-emerald-800">
                    Daftar
                </a>
            </div>
            @endauth
        </div>
    </div>
</nav>

{{-- Flash Messages --}}
@if(session('success'))
    <div class="fixed top-20 right-4 left-4 sm:left-auto z-50 sm:max-w-sm"
         x-data="{ show: true }" x-show="show" x-transition
         x-init="setTimeout(() => show = false, 5000)">
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl shadow-lg flex items-start gap-3">
            <span class="text-lg flex-shrink-0">✅</span>
            <span class="text-sm flex-1">{{ session('success') }}</span>
            <button @click="show = false" class="text-emerald-400 hover:text-emerald-600 flex-shrink-0">✕</button>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="fixed top-20 right-4 left-4 sm:left-auto z-50 sm:max-w-sm"
         x-data="{ show: true }" x-show="show" x-transition
         x-init="setTimeout(() => show = false, 5000)">
        <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl shadow-lg flex items-start gap-3">
            <span class="text-lg flex-shrink-0">❌</span>
            <span class="text-sm flex-1">{{ session('error') }}</span>
            <button @click="show = false" class="text-red-400 hover:text-red-600 flex-shrink-0">✕</button>
        </div>
    </div>
@endif

{{-- Main Content --}}
<main>
    @yield('content')
</main>

{{-- WhatsApp FAB --}}
<aside aria-label="Chat WhatsApp" class="fixed bottom-5 right-4 z-40">
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', config('hallobun.admin_phone', '6281234567890')) }}?text={{ urlencode('Halo Hallobun, saya ingin berkonsultasi mengenai layanan kebun dan pertanian.') }}"
       target="_blank"
       rel="noopener noreferrer"
       class="inline-flex items-center gap-2 bg-[#25D366] text-white pl-3.5 pr-4 py-2.5 rounded-full shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300 font-semibold text-sm">
        <span class="w-2 h-2 rounded-full bg-white animate-ping flex-shrink-0"></span>
        <svg class="w-5 h-5 fill-current flex-shrink-0" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>
        <span class="hidden sm:inline">Tanya Kami</span>
    </a>
</aside>

{{-- Footer --}}
<footer class="bg-[#1F2C1F] text-[#CADACA] mt-16 sm:mt-24 border-t border-[#2C3E2C]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            <div class="sm:col-span-2 md:col-span-1">
                <a href="{{ route('home') }}" class="inline-block mb-4">
                    <img src="/images/logo.jpg"
                         alt="Hallobun"
                         class="h-9 w-auto object-contain"
                         style="max-width:140px;filter:brightness(0) invert(1) sepia(1) saturate(2) hue-rotate(80deg) brightness(1.4)">
                </a>
                <p class="text-sm text-[#9BB19A] leading-relaxed">Platform digital terpadu untuk berkebun dan pertanian modern. Konsultasi ramah, ilmiah, dan tepat sasaran.</p>
                <div class="mt-4">
                    <span class="inline-flex items-center gap-1.5 text-xs font-medium bg-[#2C3E2C] text-emerald-300 px-3 py-1.5 rounded-full">
                        🌱 Tumbuh Subur Bersama
                    </span>
                </div>
            </div>
            <div>
                <h4 class="font-bold text-white mb-4 text-sm tracking-wider uppercase">Layanan Kebun</h4>
                <ul class="space-y-2 text-sm text-[#A8BEA7]">
                    <li><a href="{{ route('layanan') }}" class="hover:text-emerald-300 transition-colors font-semibold text-emerald-400">📋 Katalog Layanan</a></li>
                    <li><a href="{{ route('konsultasi.index') }}" class="hover:text-emerald-300 transition-colors">💬 Konsultasi Online</a></li>
                    <li><a href="{{ route('narsum.index') }}" class="hover:text-emerald-300 transition-colors">🎤 Undang Narasumber</a></li>
                    <li><a href="{{ route('kunjungan.index') }}" class="hover:text-emerald-300 transition-colors">🚜 Kunjungan Lapangan</a></li>
                    <li><a href="{{ route('sarana.index') }}" class="hover:text-emerald-300 transition-colors">🌿 Sarana & Bibit</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-white mb-4 text-sm tracking-wider uppercase">Navigasi</h4>
                <ul class="space-y-2 text-sm text-[#A8BEA7]">
                    <li><a href="{{ route('home') }}" class="hover:text-emerald-300 transition-colors">Beranda</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-emerald-300 transition-colors">Masuk Akun</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-emerald-300 transition-colors">Daftar Pengguna Baru</a></li>
                    <li><a href="{{ route('dashboard') }}" class="hover:text-emerald-300 transition-colors">Dashboard</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-white mb-4 text-sm tracking-wider uppercase">Kontak</h4>
                <ul class="space-y-2 text-sm text-[#A8BEA7]">
                    <li class="flex items-start gap-2"><span>📧</span><span>info@hallobun.com</span></li>
                    <li class="flex items-start gap-2"><span>📱</span><span>+62 812-3456-7890</span></li>
                    <li class="flex items-start gap-2"><span>🕐</span><span>Senin–Jumat, 08.00–17.00 WIB</span></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-[#2C3E2C] mt-10 pt-5 text-center text-xs text-[#7D967C]">
            <p>© {{ date('Y') }} Hallobun. Sahabat Konsultasi Berkebun & Pertanian Indonesia.</p>
        </div>
    </div>
</footer>

<script>
    // Mobile menu toggle — CSS transition based (no flicker)
    (function () {
        var btn  = document.getElementById('hamburger-btn');
        var menu = document.getElementById('mobile-menu');
        var iconOpen  = document.getElementById('icon-open');
        var iconClose = document.getElementById('icon-close');
        if (!btn || !menu) return;

        btn.addEventListener('click', function () {
            var isOpen = menu.classList.contains('open');
            menu.classList.toggle('open');
            iconOpen.classList.toggle('hidden');
            iconClose.classList.toggle('hidden');
            btn.setAttribute('aria-expanded', String(!isOpen));
        });

        // Close when clicking a menu link
        menu.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                menu.classList.remove('open');
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
                btn.setAttribute('aria-expanded', 'false');
            });
        });
    })();
</script>

@stack('scripts')
</body>
</html>
