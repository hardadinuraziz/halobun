<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Hallobun - Platform Konsultasi Pertanian Digital. Konsultasi online, undang narasumber, kunjungan lapangan, dan sarana pertanian terlengkap.')">
    <title>@yield('title', 'Hallobun') - Platform Konsultasi Pertanian</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        // Sage & Matcha Pastel Garden
                        emerald: {
                            50: '#F4F7F3',
                            100: '#E5EDE3',
                            200: '#CADBCA',
                            300: '#B0C8AF',
                            400: '#8EAF8D',
                            500: '#6E976D',
                            600: '#567D55',
                            700: '#436342',
                            800: '#334D32',
                            900: '#243723',
                        },
                        // Warm Terracotta / Pot Tembikar & Tanah Kebun
                        amber: {
                            50: '#FDF9F6',
                            100: '#FAF0E8',
                            200: '#F4DFD2',
                            300: '#E9C4AF',
                            400: '#D99F80',
                            500: '#C5805C',
                            600: '#AA6743',
                            700: '#894E30',
                            800: '#6C3D26',
                            900: '#4E2B1A',
                        },
                        // Sprout & Mint Herbal
                        lime: {
                            50: '#F8FAF3',
                            100: '#EDF5E0',
                            200: '#DCEBCA',
                            300: '#C4DEAA',
                            400: '#A4CD84',
                            500: '#84B462',
                            600: '#69954A',
                            700: '#517439',
                            800: '#3D572B',
                            900: '#2A3C1D',
                        },
                        // Bunga Kebun / Lavender Sky
                        blue: {
                            50: '#F6F8FB',
                            100: '#EAF0F6',
                            200: '#D7E2EE',
                            300: '#BACBE0',
                            400: '#97AFCE',
                            500: '#7592B8',
                            600: '#5B769B',
                            700: '#455C7B',
                            800: '#33455D',
                            900: '#222F40',
                        },
                        // Soft Warm Gray (Organic Paper & Stone)
                        gray: {
                            50: '#F8FAF7',
                            100: '#F1F4EE',
                            200: '#E4E8E0',
                            300: '#CFD6CA',
                            400: '#9EAA98',
                            500: '#717E6B',
                            600: '#546050',
                            700: '#3E473B',
                            800: '#2C3329',
                            900: '#1B2119',
                        },
                    }
                }
            }
        }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        * { box-sizing: border-box; }
        html, body { overflow-x: hidden; max-width: 100vw; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #F8FAF7; color: #2D3A2C; }
        .gradient-hero { background: linear-gradient(135deg, #375136 0%, #466744 35%, #598057 70%, #70996D 100%); }
        .glass { backdrop-filter: blur(16px); background: rgba(255,255,255,0.14); border: 1px solid rgba(255,255,255,0.22); }
        .card-hover { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 16px 32px -8px rgba(65, 99, 64, 0.12); border-color: #B0C8AF; }
        .nav-link { position: relative; }
        .nav-link::after { content:''; position:absolute; bottom:-3px; left:0; width:0; height:2px; background:#6E976D; border-radius:9999px; transition:width 0.3s ease; }
        .nav-link:hover::after, .nav-link.active::after { width:100%; }
        img { max-width: 100%; height: auto; }
    </style>
    @stack('styles')
</head>
<body class="bg-[#F8FAF7] text-[#2D3A2C] antialiased selection:bg-emerald-200 selection:text-emerald-900">

{{-- Navbar --}}
<nav class="bg-[#F8FAF7]/90 backdrop-blur-md shadow-[0_2px_12px_rgba(45,58,44,0.04)] sticky top-0 z-50 border-b border-[#E3EAE0]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center group flex-shrink-0">
                <img src="/images/logo.jpg"
                     alt="Hallobun — Layanan Perkebunan & Pertanian"
                     class="h-9 sm:h-10 w-auto object-contain group-hover:opacity-90 transition-opacity"
                     style="max-width:160px;object-position:left center">
            </a>

            {{-- Menu Desktop --}}
            <div class="hidden md:flex items-center gap-6">
                <a href="{{ route('home') }}" class="nav-link text-sm font-medium text-gray-600 hover:text-emerald-600 transition-colors {{ request()->routeIs('home') ? 'text-emerald-600 active' : '' }}">Beranda</a>
                <a href="{{ route('layanan') }}" class="nav-link text-sm font-medium text-gray-600 hover:text-emerald-600 transition-colors {{ request()->routeIs('layanan') ? 'text-emerald-600 active' : '' }}">Layanan</a>
                <a href="{{ route('konsultasi.index') }}" class="nav-link text-sm font-medium text-gray-600 hover:text-emerald-600 transition-colors {{ request()->routeIs('konsultasi.*') ? 'text-emerald-600 active' : '' }}">Konsultasi</a>
                <a href="{{ route('narsum.index') }}" class="nav-link text-sm font-medium text-gray-600 hover:text-emerald-600 transition-colors {{ request()->routeIs('narsum.*') ? 'text-emerald-600 active' : '' }}">Undang Narsum</a>
                <a href="{{ route('kunjungan.index') }}" class="nav-link text-sm font-medium text-gray-600 hover:text-emerald-600 transition-colors {{ request()->routeIs('kunjungan.*') ? 'text-emerald-600 active' : '' }}">Kunjungan</a>
                <a href="{{ route('sarana.index') }}" class="nav-link text-sm font-medium text-gray-600 hover:text-emerald-600 transition-colors {{ request()->routeIs('sarana.*') ? 'text-emerald-600 active' : '' }}">Sarana</a>
            </div>

            {{-- Auth Buttons --}}
            <div class="flex items-center gap-3">
                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-2 text-sm font-medium text-gray-700 hover:text-emerald-600 transition-colors">
                            <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center">
                                <span class="text-emerald-700 font-bold text-xs">{{ substr(auth()->user()->name, 0, 2) }}</span>
                            </div>
                            <span class="hidden sm:block">{{ auth()->user()->name }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-1 z-50">
                            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/></svg>
                                Dashboard
                            </a>
                            <a href="{{ route('konsultasi.riwayat') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                Riwayat Konsultasi
                            </a>
                            <hr class="my-1 border-gray-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center gap-2 w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-emerald-600 transition-colors">Masuk</a>
                    <a href="{{ route('register') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition-colors shadow-sm">Daftar</a>
                @endauth

                {{-- Mobile Menu Toggle --}}
                <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg text-gray-600 hover:bg-gray-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="hidden md:hidden border-t border-gray-100 bg-white px-4 py-3 space-y-1">
        <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg text-sm font-medium text-gray-700 hover:bg-emerald-50 hover:text-emerald-600">Beranda</a>
        <a href="{{ route('layanan') }}" class="block px-3 py-2 rounded-lg text-sm font-medium text-gray-700 hover:bg-emerald-50 hover:text-emerald-600">Semua Layanan</a>
        <a href="{{ route('konsultasi.index') }}" class="block px-3 py-2 rounded-lg text-sm font-medium text-gray-700 hover:bg-emerald-50 hover:text-emerald-600">Konsultasi Online</a>
        <a href="{{ route('narsum.index') }}" class="block px-3 py-2 rounded-lg text-sm font-medium text-gray-700 hover:bg-emerald-50 hover:text-emerald-600">Undang Narsum</a>
        <a href="{{ route('kunjungan.index') }}" class="block px-3 py-2 rounded-lg text-sm font-medium text-gray-700 hover:bg-emerald-50 hover:text-emerald-600">Kunjungan Offline</a>
        <a href="{{ route('sarana.index') }}" class="block px-3 py-2 rounded-lg text-sm font-medium text-gray-700 hover:bg-emerald-50 hover:text-emerald-600">Sarana Pertanian</a>
    </div>
</nav>

{{-- Flash Messages --}}
@if(session('success'))
    <div class="fixed top-20 right-4 z-50 max-w-sm" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)">
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl shadow-lg flex items-start gap-3">
            <svg class="w-5 h-5 text-emerald-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
            <span class="text-sm">{{ session('success') }}</span>
            <button @click="show = false" class="ml-auto text-emerald-400 hover:text-emerald-600">✕</button>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="fixed top-20 right-4 z-50 max-w-sm" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)">
        <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl shadow-lg flex items-start gap-3">
            <svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
            <span class="text-sm">{{ session('error') }}</span>
            <button @click="show = false" class="ml-auto text-red-400 hover:text-red-600">✕</button>
        </div>
    </div>
@endif

{{-- Main Content --}}
<main>
    @yield('content')
</main>

{{-- Floating WhatsApp Action Button (Afriba Global Style) --}}
<aside aria-label="Bantuan WhatsApp" class="fixed bottom-6 right-6 z-40">
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', config('hallobun.admin_phone', '6281234567890')) }}?text={{ urlencode('Halo Hallobun, saya ingin berkonsultasi mengenai layanan kebun dan pertanian.') }}" 
       target="_blank" 
       rel="noopener noreferrer"
       class="inline-flex items-center gap-2.5 bg-[#25D366] text-white pl-4 pr-5 py-3 rounded-full shadow-lg shadow-[#25D366]/30 hover:shadow-xl hover:shadow-[#25D366]/40 hover:-translate-y-1 transition-all duration-300 font-semibold text-sm group"
       title="Chat via WhatsApp">
        <span class="w-2.5 h-2.5 rounded-full bg-white animate-ping"></span>
        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>
        <span class="hidden sm:inline">Tanya Kami</span>
    </a>
</aside>

{{-- Footer --}}
<footer class="bg-[#1F2C1F] text-[#CADACA] mt-24 border-t border-[#2C3E2C]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="col-span-1 md:col-span-1">
                <a href="{{ route('home') }}" class="inline-block mb-4">
                    {{-- Logo with green tint overlay for dark footer --}}
                    <div class="relative inline-block">
                        <img src="/images/logo.jpg"
                             alt="Hallobun"
                             class="h-10 w-auto object-contain"
                             style="max-width:160px;filter:brightness(0) invert(1) sepia(1) saturate(2) hue-rotate(80deg) brightness(1.4)">
                    </div>
                </a>
                <p class="text-sm text-[#9BB19A] leading-relaxed">Platform digital terpadu untuk berkebun dan pertanian modern. Konsultasi ramah, ilmiah, dan tepat sasaran.</p>
                <div class="flex gap-3 mt-5">
                    <span class="inline-flex items-center gap-1.5 text-xs font-medium bg-[#2C3E2C] text-emerald-300 px-3 py-1.5 rounded-full">
                        🌱 Tumbuh Subur Bersama
                    </span>
                </div>
            </div>
            <div>
                <h4 class="font-bold text-white mb-4 text-sm tracking-wider uppercase">Layanan Kebun</h4>
                <ul class="space-y-2.5 text-sm text-[#A8BEA7]">
                    <li><a href="{{ route('layanan') }}" class="hover:text-emerald-300 transition-colors font-semibold text-emerald-400">📋 Katalog Layanan Lengkap</a></li>
                    <li><a href="{{ route('konsultasi.index') }}" class="hover:text-emerald-300 transition-colors">💬 Konsultasi Online</a></li>
                    <li><a href="{{ route('narsum.index') }}" class="hover:text-emerald-300 transition-colors">🎤 Undang Narasumber</a></li>
                    <li><a href="{{ route('kunjungan.index') }}" class="hover:text-emerald-300 transition-colors">🚜 Kunjungan Lapangan</a></li>
                    <li><a href="{{ route('sarana.index') }}" class="hover:text-emerald-300 transition-colors">🌿 Sarana & Bibit Kebun</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-white mb-4 text-sm tracking-wider uppercase">Navigasi</h4>
                <ul class="space-y-2.5 text-sm text-[#A8BEA7]">
                    <li><a href="{{ route('home') }}" class="hover:text-emerald-300 transition-colors">Beranda</a></li>
                    <li><a href="{{ route('layanan') }}" class="hover:text-emerald-300 transition-colors">Layanan Pertanian & Kebun</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-emerald-300 transition-colors">Masuk Akun</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-emerald-300 transition-colors">Daftar Pengguna Baru</a></li>
                    <li><a href="{{ route('dashboard') }}" class="hover:text-emerald-300 transition-colors">Dashboard Petani/Pekebun</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-white mb-4 text-sm tracking-wider uppercase">Kontak & Bantuan</h4>
                <ul class="space-y-2.5 text-sm text-[#A8BEA7]">
                    <li class="flex items-center gap-2"><span>📧</span><span>info@hallobun.com</span></li>
                    <li class="flex items-center gap-2"><span>📱</span><span>+62 812-3456-7890</span></li>
                    <li class="flex items-center gap-2"><span>🏡</span><span>Senin-Jumat, 08.00-17.00 WIB</span></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-[#2C3E2C] mt-12 pt-6 text-center text-xs text-[#7D967C]">
            <p>© {{ date('Y') }} Hallobun. Sahabat Konsultasi Berkebun & Pertanian Indonesia. Hak Cipta Dilindungi.</p>
        </div>
    </div>
</footer>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>

@stack('scripts')
</body>
</html>
