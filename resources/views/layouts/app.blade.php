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
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,600;1,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Vite compiled CSS + JS (Tailwind is included here) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @stack('styles')
</head>
<body class="bg-white text-gray-800 antialiased selection:bg-[#FFF0F5] selection:text-[#E0004D]">


{{-- ═══ NAVBAR ═══════════════════════════════════════════════════════════ --}}
<nav class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100 shadow-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2 group flex-shrink-0 py-1">
                <img src="/images/logo.png"
                     alt="Hallobun - Layanan Perkebunan & Pertanian"
                     class="h-9 sm:h-11 w-auto object-contain transition-transform group-hover:scale-105"
                     style="max-width:180px">
            </a>

            {{-- Desktop Menu (Halodoc style) --}}
            <div class="hidden md:flex items-center gap-6 lg:gap-8">
                <a href="{{ route('home') }}"
                   class="nav-link text-sm font-semibold transition-colors py-1 {{ request()->routeIs('home') ? 'text-[#E0004D] border-b-2 border-[#E0004D]' : 'text-gray-600 hover:text-[#E0004D]' }}">
                    Beranda
                </a>
                <a href="{{ route('layanan') }}"
                   class="nav-link text-sm font-semibold transition-colors py-1 {{ request()->routeIs('layanan') ? 'text-[#E0004D] border-b-2 border-[#E0004D]' : 'text-gray-600 hover:text-[#E0004D]' }}">
                    Layanan
                </a>
                <a href="{{ route('konsultasi.index') }}"
                   class="nav-link text-sm font-semibold transition-colors py-1 {{ request()->routeIs('konsultasi.*') ? 'text-[#E0004D] border-b-2 border-[#E0004D]' : 'text-gray-600 hover:text-[#E0004D]' }}">
                    Tanya Pakar
                </a>
                <a href="{{ route('sarana.index') }}"
                   class="nav-link text-sm font-semibold transition-colors py-1 {{ request()->routeIs('sarana.*') ? 'text-[#E0004D] border-b-2 border-[#E0004D]' : 'text-gray-600 hover:text-[#E0004D]' }}">
                    Toko Sarana
                </a>
                <a href="{{ route('kunjungan.index') }}"
                   class="nav-link text-sm font-semibold transition-colors py-1 {{ request()->routeIs('kunjungan.*') ? 'text-[#E0004D] border-b-2 border-[#E0004D]' : 'text-gray-600 hover:text-[#E0004D]' }}">
                    Kunjungan Lahan
                </a>
                <a href="{{ route('narsum.index') }}"
                   class="nav-link text-sm font-semibold transition-colors py-1 {{ request()->routeIs('narsum.*') ? 'text-[#E0004D] border-b-2 border-[#E0004D]' : 'text-gray-600 hover:text-[#E0004D]' }}">
                    Undang Narsum
                </a>
            </div>

            {{-- Right side --}}
            <div class="flex items-center gap-2 sm:gap-3">
                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                                class="flex items-center gap-2 text-sm font-semibold text-gray-700 hover:text-[#E0004D] transition-colors focus:outline-none">
                            <div class="w-8 h-8 bg-[#FFF0F5] border border-[#FFD1DF] rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-[#E0004D] font-bold text-xs">{{ substr(auth()->user()->name, 0, 2) }}</span>
                            </div>
                            <span class="hidden sm:block max-w-[120px] truncate">{{ auth()->user()->name }}</span>
                            <svg class="w-3.5 h-3.5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition
                             class="absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-xl border border-gray-100 py-1.5 z-50">
                            <a href="{{ route('dashboard') }}"
                               class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-[#FFF0F5] hover:text-[#E0004D]">
                                📊 Dashboard
                            </a>
                            <a href="{{ route('konsultasi.riwayat') }}"
                               class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-[#FFF0F5] hover:text-[#E0004D]">
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
                       class="text-sm font-semibold text-gray-700 hover:text-[#E0004D] px-3 py-2 transition-colors hidden sm:block">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}"
                       class="bg-[#E0004D] hover:bg-[#C70044] text-white text-xs sm:text-sm font-bold px-4 py-2 rounded-xl transition-all shadow-xs whitespace-nowrap active:scale-95">
                        Daftar
                    </a>
                @endauth

                {{-- Hamburger button --}}
                <button id="hamburger-btn"
                        aria-label="Buka menu navigasi"
                        aria-expanded="false"
                        aria-controls="mobile-menu"
                        class="md:hidden p-2 rounded-xl text-gray-600 hover:bg-gray-100 hover:text-[#E0004D] transition-colors focus:outline-none">
                    <svg id="icon-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg id="icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu"
         role="navigation"
         class="md:hidden bg-white border-b border-gray-100">
        <div class="px-4 py-3 space-y-1">
            <a href="{{ route('home') }}"
               class="block px-3 py-2 rounded-xl text-base font-semibold {{ request()->routeIs('home') ? 'bg-[#FFF0F5] text-[#E0004D]' : 'text-gray-700 hover:bg-gray-50' }}">
                Beranda
            </a>
            <a href="{{ route('layanan') }}"
               class="block px-3 py-2 rounded-xl text-base font-semibold {{ request()->routeIs('layanan') ? 'bg-[#FFF0F5] text-[#E0004D]' : 'text-gray-700 hover:bg-gray-50' }}">
                Layanan
            </a>
            <a href="{{ route('konsultasi.index') }}"
               class="block px-3 py-2 rounded-xl text-base font-semibold {{ request()->routeIs('konsultasi.*') ? 'bg-[#FFF0F5] text-[#E0004D]' : 'text-gray-700 hover:bg-gray-50' }}">
                Tanya Pakar
            </a>
            <a href="{{ route('sarana.index') }}"
               class="block px-3 py-2 rounded-xl text-base font-semibold {{ request()->routeIs('sarana.*') ? 'bg-[#FFF0F5] text-[#E0004D]' : 'text-gray-700 hover:bg-gray-50' }}">
                Toko Sarana
            </a>
            <a href="{{ route('kunjungan.index') }}"
               class="block px-3 py-2 rounded-xl text-base font-semibold {{ request()->routeIs('kunjungan.*') ? 'bg-[#FFF0F5] text-[#E0004D]' : 'text-gray-700 hover:bg-gray-50' }}">
                Kunjungan Lahan
            </a>
            <a href="{{ route('narsum.index') }}"
               class="block px-3 py-2 rounded-xl text-base font-semibold {{ request()->routeIs('narsum.*') ? 'bg-[#FFF0F5] text-[#E0004D]' : 'text-gray-700 hover:bg-gray-50' }}">
                Undang Narsum
            </a>
            @guest
            <div class="flex gap-2 pt-3 pb-1 border-t border-gray-100 mt-2">
                <a href="{{ route('login') }}"
                   class="flex-1 text-center px-3 py-2.5 rounded-xl text-sm font-bold text-gray-700 border border-gray-200 hover:bg-gray-50">
                    Masuk
                </a>
                <a href="{{ route('register') }}"
                   class="flex-1 text-center px-3 py-2.5 rounded-xl text-sm font-bold text-white bg-[#E0004D] hover:bg-[#C70044]">
                    Daftar
                </a>
            </div>
            @endguest
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
<footer class="bg-[#F8F9FA] text-gray-600 mt-16 sm:mt-24 border-t border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 sm:gap-10">
            <div class="sm:col-span-2 md:col-span-1">
                <a href="{{ route('home') }}" class="inline-block mb-3.5">
                    <img src="/images/logo.png"
                         alt="Hallobun - Layanan Perkebunan & Pertanian"
                         class="h-10 sm:h-12 w-auto object-contain"
                         style="max-width:200px">
                </a>
                <p class="text-xs sm:text-sm text-gray-500 leading-relaxed mb-4">
                    Platform tele-agronomi dan perawatan kebun tepercaya. Menghubungkan pekebun dengan pakar berpengalaman untuk solusi cepat, ilmiah, dan akurat.
                </p>
                <div class="inline-flex items-center gap-2 text-xs font-bold text-[#E0004D] bg-[#FFF0F5] px-3 py-1.5 rounded-full">
                    🌱 Tumbuh Sehat Bersama Hallobun
                </div>
            </div>
            <div>
                <h4 class="font-bold text-gray-900 mb-4 text-xs sm:text-sm tracking-wider uppercase">Layanan Utama</h4>
                <ul class="space-y-2.5 text-xs sm:text-sm">
                    <li><a href="{{ route('konsultasi.index') }}" class="hover:text-[#E0004D] transition-colors">💬 Tanya Praktisi Kebun</a></li>
                    <li><a href="{{ route('sarana.index') }}" class="hover:text-[#E0004D] transition-colors">🛒 Toko Sarana Kebun</a></li>
                    <li><a href="{{ route('kunjungan.index') }}" class="hover:text-[#E0004D] transition-colors">🚜 Kunjungan Lahan On-Site</a></li>
                    <li><a href="{{ route('narsum.index') }}" class="hover:text-[#E0004D] transition-colors">🎤 Undang Narasumber</a></li>
                    <li><a href="{{ route('layanan') }}" class="hover:text-[#E0004D] transition-colors">📋 Semua Layanan</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-gray-900 mb-4 text-xs sm:text-sm tracking-wider uppercase">Akses Pengguna</h4>
                <ul class="space-y-2.5 text-xs sm:text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-[#E0004D] transition-colors">Beranda</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-[#E0004D] transition-colors">Masuk ke Akun</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-[#E0004D] transition-colors">Daftar Akun Baru</a></li>
                    <li><a href="{{ route('dashboard') }}" class="hover:text-[#E0004D] transition-colors">Dashboard Pekebun</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-gray-900 mb-4 text-xs sm:text-sm tracking-wider uppercase">Bantuan &amp; Kontak</h4>
                <ul class="space-y-2.5 text-xs sm:text-sm text-gray-500">
                    <li class="flex items-center gap-2"><span class="text-[#E0004D]">✉️</span><span>info@hallobun.com</span></li>
                    <li class="flex items-center gap-2"><span class="text-[#E0004D]">📞</span><span>+62 812-3456-7890</span></li>
                    <li class="flex items-center gap-2"><span class="text-[#E0004D]">🕐</span><span>Senin – Sabtu, 08.00 – 17.00 WIB</span></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-200 mt-10 pt-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-gray-400">
            <p>© {{ date('Y') }} Hallobun. Sahabat Kesehatan Kebun &amp; Pertanian Terlengkap di Indonesia.</p>
            <div class="flex items-center gap-4">
                <a href="#" class="hover:text-[#E0004D]">Kebijakan Privasi</a>
                <a href="#" class="hover:text-[#E0004D]">Syarat &amp; Ketentuan</a>
            </div>
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
