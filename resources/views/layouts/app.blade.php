<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Hallobun - Platform Konsultasi Pertanian Digital. Konsultasi online, undang narasumber, kunjungan lapangan, dan sarana pertanian terlengkap.')">
    <title>@yield('title', 'Hallobun') - Platform Konsultasi Pertanian</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        emerald: { 50:'#ecfdf5',100:'#d1fae5',200:'#a7f3d0',300:'#6ee7b7',400:'#34d399',500:'#10b981',600:'#059669',700:'#047857',800:'#065f46',900:'#064e3b' },
                    }
                }
            }
        }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .gradient-hero { background: linear-gradient(135deg, #064e3b 0%, #065f46 40%, #047857 70%, #059669 100%); }
        .glass { backdrop-filter: blur(16px); background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 20px 40px rgba(0,0,0,0.12); }
        .nav-link { position: relative; }
        .nav-link::after { content:''; position:absolute; bottom:-2px; left:0; width:0; height:2px; background:#10b981; transition:width 0.3s; }
        .nav-link:hover::after, .nav-link.active::after { width:100%; }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

{{-- Navbar --}}
<nav class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <div class="w-9 h-9 bg-gradient-to-br from-emerald-500 to-green-700 rounded-xl flex items-center justify-center shadow-md">
                    <span class="text-white font-black text-lg leading-none">H</span>
                </div>
                <span class="font-extrabold text-xl text-emerald-700 tracking-tight">hallo<span class="text-gray-800">bun</span></span>
            </a>

            {{-- Menu Desktop --}}
            <div class="hidden md:flex items-center gap-6">
                <a href="{{ route('home') }}" class="nav-link text-sm font-medium text-gray-600 hover:text-emerald-600 transition-colors {{ request()->routeIs('home') ? 'text-emerald-600 active' : '' }}">Beranda</a>
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

{{-- Footer --}}
<footer class="bg-gray-900 text-gray-300 mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="col-span-1 md:col-span-1">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 bg-emerald-500 rounded-lg flex items-center justify-center">
                        <span class="text-white font-black">H</span>
                    </div>
                    <span class="font-extrabold text-lg text-white">hallo<span class="text-emerald-400">bun</span></span>
                </div>
                <p class="text-sm text-gray-400 leading-relaxed">Platform digital konsultasi pertanian terpercaya. Solusi cerdas untuk petani Indonesia.</p>
                <div class="flex gap-3 mt-4">
                    <a href="#" class="w-8 h-8 bg-gray-800 hover:bg-emerald-600 rounded-lg flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" class="w-8 h-8 bg-gray-800 hover:bg-emerald-600 rounded-lg flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                </div>
            </div>
            <div>
                <h4 class="font-semibold text-white mb-4">Layanan</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('konsultasi.index') }}" class="hover:text-emerald-400 transition-colors">Konsultasi Online</a></li>
                    <li><a href="{{ route('narsum.index') }}" class="hover:text-emerald-400 transition-colors">Undang Narasumber</a></li>
                    <li><a href="{{ route('kunjungan.index') }}" class="hover:text-emerald-400 transition-colors">Kunjungan Offline</a></li>
                    <li><a href="{{ route('sarana.index') }}" class="hover:text-emerald-400 transition-colors">Sarana Pertanian</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-white mb-4">Akun</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('login') }}" class="hover:text-emerald-400 transition-colors">Masuk</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-emerald-400 transition-colors">Daftar</a></li>
                    <li><a href="{{ route('dashboard') }}" class="hover:text-emerald-400 transition-colors">Dashboard</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-white mb-4">Kontak</h4>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-center gap-2"><span>📧</span><span>info@hallobun.com</span></li>
                    <li class="flex items-center gap-2"><span>📱</span><span>+62 812-3456-7890</span></li>
                    <li class="flex items-center gap-2"><span>🕐</span><span>Senin-Jumat, 08.00-17.00</span></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-10 pt-6 text-center text-sm text-gray-500">
            <p>© {{ date('Y') }} Hallobun. Platform Konsultasi Pertanian Indonesia. Hak Cipta Dilindungi.</p>
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
