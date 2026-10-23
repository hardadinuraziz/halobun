@extends('admin.layout')

@section('title', 'SOP & Template Operasional — Hallobun Admin')
@section('page-title', 'Standar Operasional Prosedur (SOP) & Template Pesanan')

@section('content')
<div class="space-y-6" x-data="{
    activeTab: 'templates',
    copiedText: '',
    showToast: false,
    copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            this.showToast = true;
            setTimeout(() => { this.showToast = false; }, 2500);
        });
    }
}">

    {{-- Toast Notification --}}
    <div x-show="showToast"
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform translate-y-2"
         class="fixed bottom-6 right-6 z-50 bg-gray-900 text-white px-5 py-3 rounded-2xl shadow-xl flex items-center gap-3 text-sm font-semibold border border-gray-700">
        <span class="text-emerald-400 text-base">✓</span>
        <span>Template pesan berhasil disalin ke clipboard!</span>
    </div>

    {{-- Header Banner & Quick Operational Parameters --}}
    <div class="bg-gradient-to-br from-emerald-800 via-emerald-900 to-slate-900 rounded-3xl p-6 sm:p-8 text-white shadow-lg relative overflow-hidden">
        <div class="absolute -right-8 -bottom-8 w-64 h-64 bg-emerald-600/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="relative z-10 space-y-4">
            <div class="flex flex-wrap items-center gap-2">
                <span class="px-3 py-1 bg-white/15 backdrop-blur-xs text-emerald-200 text-xs font-extrabold rounded-full border border-white/10 uppercase tracking-wider">
                    Dokumen Induk Operasional
                </span>
                <span class="text-xs text-emerald-200/80">Disahkan: Amanda Qori Ifadakh (Manajemen) &amp; Raras (Koordinator Operasional)</span>
            </div>
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">SOP &amp; Template Administrasi HalloBun</h1>
                <p class="text-emerald-100/80 text-sm max-w-2xl mt-1">
                    Pedoman terpadu 4 lini layanan HalloBun (Tanya Pakar, Kunjungan Lahan, Undang Narasumber &amp; Toko Sarana Tani) dilengkapi template konfirmasi otomatis WhatsApp yang siap pakai.
                </p>
            </div>

            {{-- 4 Parameter Kunci SOP --}}
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-4 border-t border-white/15 text-xs">
                <div class="bg-white/10 backdrop-blur-xs rounded-xl p-3 border border-white/10">
                    <div class="text-emerald-200/70 text-[10px] font-bold uppercase">Jam Operasional</div>
                    <div class="font-extrabold text-sm sm:text-base mt-0.5">09.00 – 17.00 WIB</div>
                    <div class="text-[10px] text-emerald-200/60">Senin s.d Sabtu</div>
                </div>
                <div class="bg-white/10 backdrop-blur-xs rounded-xl p-3 border border-white/10">
                    <div class="text-emerald-200/70 text-[10px] font-bold uppercase">Target Respons (SLA)</div>
                    <div class="font-extrabold text-sm sm:text-base mt-0.5">&le; 30 Menit</div>
                    <div class="text-[10px] text-emerald-200/60">Pada jam kerja aktif</div>
                </div>
                <div class="bg-white/10 backdrop-blur-xs rounded-xl p-3 border border-white/10">
                    <div class="text-emerald-200/70 text-[10px] font-bold uppercase">Rekening Resmi TF</div>
                    <div class="font-extrabold text-sm sm:text-base mt-0.5">Bank Mandiri</div>
                    <div class="text-[10px] text-emerald-200/60">1030012983454 a.n CV SARANA HIJAU</div>
                </div>
                <div class="bg-white/10 backdrop-blur-xs rounded-xl p-3 border border-white/10">
                    <div class="text-emerald-200/70 text-[10px] font-bold uppercase">PIC &amp; Kanal Resmi</div>
                    <div class="font-extrabold text-sm sm:text-base mt-0.5">Amanda</div>
                    <div class="text-[10px] text-emerald-200/60">+62 857-1385-0615</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabs Navigation --}}
    <div class="bg-white p-2 rounded-2xl border border-gray-100 shadow-xs flex items-center gap-1 overflow-x-auto text-xs sm:text-sm font-bold">
        <button @click="activeTab = 'templates'"
                :class="activeTab === 'templates' ? 'bg-[#16A34A] text-white shadow-xs' : 'text-gray-600 hover:bg-gray-100'"
                class="px-4 py-2.5 rounded-xl whitespace-nowrap transition-all flex items-center gap-2">
            <span>💬</span> Template Konfirmasi WhatsApp (Interaktif)
        </button>
        <button @click="activeTab = 'checklist'"
                :class="activeTab === 'checklist' ? 'bg-[#16A34A] text-white shadow-xs' : 'text-gray-600 hover:bg-gray-100'"
                class="px-4 py-2.5 rounded-xl whitespace-nowrap transition-all flex items-center gap-2">
            <span>📋</span> Checklist Pra-Konsultasi
        </button>
        <button @click="activeTab = 'sla'"
                :class="activeTab === 'sla' ? 'bg-[#16A34A] text-white shadow-xs' : 'text-gray-600 hover:bg-gray-100'"
                class="px-4 py-2.5 rounded-xl whitespace-nowrap transition-all flex items-center gap-2">
            <span>⏱️</span> Standar Pelayanan &amp; SLA
        </button>
        <button @click="activeTab = 'dokumen'"
                :class="activeTab === 'dokumen' ? 'bg-[#16A34A] text-white shadow-xs' : 'text-gray-600 hover:bg-gray-100'"
                class="px-4 py-2.5 rounded-xl whitespace-nowrap transition-all flex items-center gap-2">
            <span>📖</span> SOP 4 Lini Layanan &amp; Ketentuan
        </button>
    </div>

    {{-- ══════════════════════════════════════════════════════════════════════════ --}}
    {{-- TAB 1: TEMPLATE KONFIRMASI WHATSAPP (INTERAKTIF)                           --}}
    {{-- ══════════════════════════════════════════════════════════════════════════ --}}
    <div x-show="activeTab === 'templates'" x-cloak class="space-y-6">

        {{-- 1. Template Konfirmasi Konsultasi --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-xs p-5 sm:p-6 space-y-4"
             x-data="{
                selectedBookingId: '{{ $recentBookings->first()?->id ?? '' }}',
                bookings: {{ Js::from($recentBookings->map(fn($b) => [
                    'id' => $b->id,
                    'kode' => $b->kode_booking,
                    'customer' => $b->user->name ?? '-',
                    'phone' => $b->user->phone ?? '',
                    'praktisi' => ($b->konsultan->user->name ?? 'Praktisi') . ' (' . ($b->konsultan->klasifikasi_label ?? 'Spesialis') . ')',
                    'topik' => $b->keluhan ?: ($b->konsultan->spesialisasi ?? 'Konsultasi Kebun'),
                    'tanggal' => $b->jadwal ? \Carbon\Carbon::parse($b->jadwal->tanggal)->translatedFormat('l, d F Y') : ($b->sesi_mulai ? $b->sesi_mulai->translatedFormat('l, d F Y') : 'Fleksibel'),
                    'waktu' => $b->jadwal ? substr($b->jadwal->jam_mulai, 0, 5) . ' - ' . substr($b->jadwal->jam_selesai, 0, 5) . ' WIB' : '09:00 - 10:00 WIB',
                    'durasi' => ($b->konsultan->durasi_menit ?? 60) . ' Menit',
                    'media' => 'Zoom Meeting / Jitsi Meet',
                    'tautan' => $b->meeting_link ?: ('https://meet.jit.si/hallobun-' . strtolower($b->kode_booking))
                ])) }},
                current: null,
                init() {
                    this.updateCurrent();
                },
                updateCurrent() {
                    this.current = this.bookings.find(b => b.id == this.selectedBookingId) || this.bookings[0] || {
                        customer: 'Bpk/Ibu Petani',
                        phone: '',
                        praktisi: 'Ahmad Suhaemi, S.TP (Praktisi Spesialis)',
                        topik: 'Penanganan Hama & OPT Kelapa',
                        tanggal: 'Senin, 26 Oktober 2026',
                        waktu: '10:00 - 11:00 WIB',
                        durasi: '60 Menit',
                        media: 'Zoom Meeting / Jitsi Meet',
                        tautan: 'https://meet.jit.si/hallobun-sample'
                    };
                },
                get message() {
                    return `Hallo, Bapak/Ibu ${this.current.customer}, pesanan konsultasi Hallobun telah terkonfirmasi sebagai berikut :\n\n` +
                           `Praktisi : ${this.current.praktisi}\n` +
                           `Topik    : ${this.current.topik}\n` +
                           `Tanggal  : ${this.current.tanggal}\n` +
                           `Waktu    : ${this.current.waktu}\n` +
                           `Durasi   : ${this.current.durasi}\n` +
                           `Media    : ${this.current.media}\n` +
                           `Tautan   : ${this.current.tautan}\n\n` +
                           `Mohon bergabung 5 – 10 menit lebih awal dan menyiapkan informasi yang relevan. Jika terdapat kendala, silakan hubungi admin melalui +62 857-1385-0615 (Amanda). Terima kasih.`;
                },
                get waLink() {
                    let p = (this.current.phone || '').replace(/[^0-9]/g, '');
                    if (p.startsWith('0')) p = '62' + p.substring(1);
                    return `https://wa.me/${p}?text=` + encodeURIComponent(this.message);
                }
             }">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-gray-100 gap-3">
                <div class="flex items-center gap-3">
                    <span class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center font-bold text-lg">🌱</span>
                    <div>
                        <h3 class="font-extrabold text-base text-gray-900">1. Template Konfirmasi Konsultasi Online</h3>
                        <p class="text-xs text-gray-400">Digunakan setelah pembayaran customer terverifikasi (via transfer Mandiri/otomatis)</p>
                    </div>
                </div>
                {{-- Selector Booking --}}
                <div class="flex items-center gap-2">
                    <label class="text-xs text-gray-500 font-bold whitespace-nowrap">Pilih Data Booking:</label>
                    <select x-model="selectedBookingId" @change="updateCurrent()" class="text-xs bg-gray-50 border border-gray-200 rounded-xl p-2 font-semibold">
                        <template x-for="b in bookings" :key="b.id">
                            <option :value="b.id" x-text="`${b.kode} - ${b.customer}`"></option>
                        </template>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200/80 font-mono text-xs whitespace-pre-wrap leading-relaxed text-gray-800" x-text="message"></div>
                <div class="space-y-3 flex flex-col justify-between">
                    <div class="text-xs text-gray-600 space-y-2 bg-emerald-50/60 p-4 rounded-xl border border-emerald-100">
                        <div class="font-bold text-emerald-900 flex items-center gap-1.5">
                            <span>📌</span> Ketentuan SOP Sesi Konsultasi:
                        </div>
                        <ul class="list-disc list-inside space-y-1 text-[11px] text-emerald-950/80">
                            <li>Kirim pesan ini segera setelah pembayaran lunas atau minimal 1 hari sebelum jadwal.</li>
                            <li>Tautan video call (Zoom/Jitsi) wajib telah dibuat dan dipastikan aktif sebelum dikirim.</li>
                            <li>Toleransi keterlambatan customer: <strong>15 menit</strong>. Praktisi wajib menunggu selama batas toleransi.</li>
                        </ul>
                    </div>
                    <div class="flex flex-wrap gap-2 pt-2">
                        <button type="button"
                                @click="copyToClipboard(message)"
                                class="flex-1 px-4 py-2.5 bg-gray-800 hover:bg-gray-900 text-white rounded-xl text-xs font-bold transition-all flex items-center justify-center gap-2 shadow-xs">
                            <span>📋</span> Salin Teks Template
                        </button>
                        <a :href="waLink"
                           target="_blank"
                           class="flex-1 px-4 py-2.5 bg-[#16A34A] hover:bg-[#15803D] text-white rounded-xl text-xs font-bold transition-all flex items-center justify-center gap-2 shadow-xs">
                            <span>💬</span> Buka WhatsApp Customer
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- 2. Template Konfirmasi Kunjungan Lahan --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-xs p-5 sm:p-6 space-y-4"
             x-data="{
                selectedKunjunganId: '{{ $recentKunjungans->first()?->id ?? '' }}',
                kunjungans: {{ Js::from($recentKunjungans->map(fn($k) => [
                    'id' => $k->id,
                    'nama' => $k->nama_pemilik,
                    'phone' => $k->phone,
                    'praktisi' => $k->konsultan?->user?->name ?? 'Tim Agronom Lapangan Hallobun',
                    'tanggal' => $k->tanggal_kunjungan ? \Carbon\Carbon::parse($k->tanggal_kunjungan)->translatedFormat('l, d F Y') : 'Sesuai kesepakatan',
                    'jam' => $k->jam_kunjungan ? 'Pukul ' . $k->jam_kunjungan . ' WIB' : '09:00 WIB',
                    'ruangLingkup' => 'Pemeriksaan Lahan & Komoditas ' . ($k->jenis_tanaman ?: 'Perkebunan') . ($k->luas_lahan ? ' (Luas: ' . $k->luas_lahan . ' ' . $k->satuan_lahan . ')' : '') . ' di ' . $k->kota . ', ' . $k->provinsi,
                    'biaya' => $k->biaya > 0 ? 'Rp ' . number_format($k->biaya, 0, ',', '.') . ' (Termasuk akomodasi & laporan)' : 'Sesuai kesepakatan penawaran survei awal'
                ])) }},
                current: null,
                init() {
                    this.updateCurrent();
                },
                updateCurrent() {
                    this.current = this.kunjungans.find(k => k.id == this.selectedKunjunganId) || this.kunjungans[0] || {
                        id: '01',
                        nama: 'Bpk. Hendra Gunawan',
                        phone: '',
                        praktisi: 'Tim Agronom Lapangan Hallobun',
                        tanggal: 'Rabu, 28 Oktober 2026',
                        jam: 'Pukul 09:00 WIB',
                        ruangLingkup: 'Pemeriksaan Lahan & Komoditas Vanili & Kopi (Luas: 2 Hektar) di Temanggung, Jawa Tengah',
                        biaya: 'Sesuai kesepakatan penawaran survei awal'
                    };
                },
                get message() {
                    return `Hallo, Bapak/Ibu ${this.current.nama}, permintaan kunjungan lahan Hallobun dengan nomor #KJ-${this.current.id} telah terkonfirmasi sebagai berikut :\n\n` +
                           `Praktisi            : ${this.current.praktisi}\n` +
                           `Tanggal dan Waktu   : ${this.current.tanggal} (${this.current.jam})\n` +
                           `Ruang Lingkup       : ${this.current.ruangLingkup}\n` +
                           `Biaya dan Ketentuan : ${this.current.biaya}\n\n` +
                           `Mohon memastikan akses lokasi dan data pendukung tersedia. Perubahan jadwal dapat disampaikan melalui +62 857-1385-0615 (Amanda). Terima kasih.`;
                },
                get waLink() {
                    let p = (this.current.phone || '').replace(/[^0-9]/g, '');
                    if (p.startsWith('0')) p = '62' + p.substring(1);
                    return `https://wa.me/${p}?text=` + encodeURIComponent(this.message);
                }
             }">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-gray-100 gap-3">
                <div class="flex items-center gap-3">
                    <span class="w-10 h-10 rounded-xl bg-blue-100 text-blue-800 flex items-center justify-center font-bold text-lg">🚜</span>
                    <div>
                        <h3 class="font-extrabold text-base text-gray-900">2. Template Konfirmasi Kunjungan Lahan On-Site</h3>
                        <p class="text-xs text-gray-400">Digunakan setelah penawaran teknis, estimasi rute/akomodasi, dan jadwal disetujui kedua pihak</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <label class="text-xs text-gray-500 font-bold whitespace-nowrap">Pilih Permintaan:</label>
                    <select x-model="selectedKunjunganId" @change="updateCurrent()" class="text-xs bg-gray-50 border border-gray-200 rounded-xl p-2 font-semibold">
                        <template x-for="k in kunjungans" :key="k.id">
                            <option :value="k.id" x-text="`#KJ-${k.id} - ${k.nama}`"></option>
                        </template>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200/80 font-mono text-xs whitespace-pre-wrap leading-relaxed text-gray-800" x-text="message"></div>
                <div class="space-y-3 flex flex-col justify-between">
                    <div class="text-xs text-gray-600 space-y-2 bg-blue-50/60 p-4 rounded-xl border border-blue-100">
                        <div class="font-bold text-blue-900 flex items-center gap-1.5">
                            <span>📌</span> Ketentuan SOP Kunjungan Lahan:
                        </div>
                        <ul class="list-disc list-inside space-y-1 text-[11px] text-blue-950/80">
                            <li>Pastikan titik lokasi GPS / Google Maps dan akses kendaraan sudah diterima tim lapangan.</li>
                            <li>Kunjungan dapat dijadwal ulang apabila kondisi cuaca ekstrem / faktor keamanan di lapangan.</li>
                            <li>Jika penawaran mencakup laporan tertulis, laporkan estimasi penyerahan hasil kepada pemilik lahan.</li>
                        </ul>
                    </div>
                    <div class="flex flex-wrap gap-2 pt-2">
                        <button type="button"
                                @click="copyToClipboard(message)"
                                class="flex-1 px-4 py-2.5 bg-gray-800 hover:bg-gray-900 text-white rounded-xl text-xs font-bold transition-all flex items-center justify-center gap-2 shadow-xs">
                            <span>📋</span> Salin Teks Template
                        </button>
                        <a :href="waLink"
                           target="_blank"
                           class="flex-1 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-xs font-bold transition-all flex items-center justify-center gap-2 shadow-xs">
                            <span>💬</span> Buka WhatsApp Pemilik Lahan
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- 3. Template Konfirmasi Undang Narasumber --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-xs p-5 sm:p-6 space-y-4"
             x-data="{
                selectedNarsumId: '{{ $recentNarsums->first()?->id ?? '' }}',
                narsums: {{ Js::from($recentNarsums->map(fn($n) => [
                    'id' => $n->id,
                    'tema' => $n->tema,
                    'narasumber' => $n->konsultan?->user?->name ?? 'Narasumber Ahli Hallobun',
                    'tanggal' => $n->tanggal_acara ? \Carbon\Carbon::parse($n->tanggal_acara)->translatedFormat('l, d F Y') : 'Sesuai Rundown Acara',
                    'waktu' => ($n->jam_mulai ?: '09:00') . ' - ' . ($n->jam_selesai ?: '12:00') . ' WIB',
                    'durasi' => $n->durasi ?: 'Sesuai Rundown',
                    'format' => strtoupper($n->format) . ' - ' . ($n->lokasi ? $n->lokasi . ', ' . $n->kota : $n->kota),
                    'materi' => $n->deskripsi_kebutuhan ?: 'Paparan materi teknis pertanian & sesi diskusi tanya jawab',
                    'pic' => $n->penyelenggara . ' (PIC: ' . $n->kontak_pic . ')',
                    'phone' => $n->phone_pic,
                    'picName' => $n->kontak_pic
                ])) }},
                current: null,
                init() {
                    this.updateCurrent();
                },
                updateCurrent() {
                    this.current = this.narsums.find(n => n.id == this.selectedNarsumId) || this.narsums[0] || {
                        id: '01',
                        tema: 'Workshop Budidaya Hortikultura & Pengendalian OPT Terpadu',
                        narasumber: 'Kismatullaili, S.P. / Narasumber Ahli',
                        tanggal: 'Sabtu, 31 Oktober 2026',
                        waktu: '09:00 - 12:00 WIB',
                        durasi: '180 Menit',
                        format: 'LURING - Aula Balai Desa, Brebes',
                        materi: 'Manajemen nutrisi tanaman & efisiensi biaya usaha tani',
                        pic: 'Dinas Pertanian Brebes (PIC: Ibu Siti Aminah)',
                        phone: '',
                        picName: 'Ibu Siti Aminah'
                    };
                },
                get message() {
                    return `Hallo, Bapak/Ibu ${this.current.picName}, pesanan/undangan narasumber Hallobun telah terkonfirmasi sebagai berikut :\n\n` +
                           `Tema                                : ${this.current.tema}\n` +
                           `Narasumber                          : ${this.current.narasumber}\n` +
                           `Tanggal                             : ${this.current.tanggal}\n` +
                           `Waktu                               : ${this.current.waktu}\n` +
                           `Durasi                              : ${this.current.durasi}\n` +
                           `Format/Lokasi                       : ${this.current.format}\n` +
                           `Lingkup Materi dan Kebutuhan Teknis : ${this.current.materi}\n` +
                           `PIC Penyelenggara                   : ${this.current.pic}\n\n` +
                           `Mohon informasikan perubahan melalui +62 857-1385-0615 (Amanda). Terima kasih.`;
                },
                get waLink() {
                    let p = (this.current.phone || '').replace(/[^0-9]/g, '');
                    if (p.startsWith('0')) p = '62' + p.substring(1);
                    return `https://wa.me/${p}?text=` + encodeURIComponent(this.message);
                }
             }">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-gray-100 gap-3">
                <div class="flex items-center gap-3">
                    <span class="w-10 h-10 rounded-xl bg-purple-100 text-purple-800 flex items-center justify-center font-bold text-lg">🎤</span>
                    <div>
                        <h3 class="font-extrabold text-base text-gray-900">3. Template Konfirmasi Undangan Narasumber</h3>
                        <p class="text-xs text-gray-400">Digunakan setelah narasumber bersedia, rundown disepakati, dan penawaran honorarium/teknis disetujui</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <label class="text-xs text-gray-500 font-bold whitespace-nowrap">Pilih Pengajuan:</label>
                    <select x-model="selectedNarsumId" @change="updateCurrent()" class="text-xs bg-gray-50 border border-gray-200 rounded-xl p-2 font-semibold">
                        <template x-for="n in narsums" :key="n.id">
                            <option :value="n.id" x-text="`#${n.id} - ${n.tema}`"></option>
                        </template>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200/80 font-mono text-xs whitespace-pre-wrap leading-relaxed text-gray-800" x-text="message"></div>
                <div class="space-y-3 flex flex-col justify-between">
                    <div class="text-xs text-gray-600 space-y-2 bg-purple-50/60 p-4 rounded-xl border border-purple-100">
                        <div class="font-bold text-purple-900 flex items-center gap-1.5">
                            <span>📌</span> Ketentuan SOP Undang Narasumber:
                        </div>
                        <ul class="list-disc list-inside space-y-1 text-[11px] text-purple-950/80">
                            <li>Untuk acara daring, uji platform (Zoom/Meet), presentasi slide &amp; audio sebelum hari H.</li>
                            <li>Untuk acara luring, koordinasikan penjemputan/akomodasi, transit room, dan sound system.</li>
                            <li>Materi presentasi hanya didistribusikan kepada peserta sesuai izin narasumber.</li>
                        </ul>
                    </div>
                    <div class="flex flex-wrap gap-2 pt-2">
                        <button type="button"
                                @click="copyToClipboard(message)"
                                class="flex-1 px-4 py-2.5 bg-gray-800 hover:bg-gray-900 text-white rounded-xl text-xs font-bold transition-all flex items-center justify-center gap-2 shadow-xs">
                            <span>📋</span> Salin Teks Template
                        </button>
                        <a :href="waLink"
                           target="_blank"
                           class="flex-1 px-4 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-xl text-xs font-bold transition-all flex items-center justify-center gap-2 shadow-xs">
                            <span>💬</span> Buka WhatsApp Panitia / PIC
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- 4. Template Konfirmasi Pesanan Toko Sarana Tani --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-xs p-5 sm:p-6 space-y-4"
             x-data="{
                namaCustomer: 'Ibu Rahmawati',
                produkDanJumlah: 'Pupuk Hayati Cair Trichoderma (2 Botol @ 1 Liter)',
                total: 'Rp 170.000 (Termasuk Ongkir J&T)',
                statusBayar: 'Lunas (Bank Mandiri 1030012983454 a.n CV SARANA HIJAU)',
                statusPengiriman: 'Sedang Dipacking & Siap Diserahkan ke Kurir',
                nomorResi: 'JT-982341908234',
                customerPhone: '',
                get message() {
                    return `Hallo, Bapak/Ibu ${this.namaCustomer}, pesanan toko sarana tani Hallobun telah terkonfirmasi sebagai berikut :\n\n` +
                           `Produk dan Jumlah            : ${this.produkDanJumlah}\n` +
                           `Total                        : ${this.total}\n` +
                           `Status Pembayaran            : ${this.statusBayar}\n` +
                           `Status Pemrosesan/Pengiriman : ${this.statusPengiriman}\n` +
                           `Nomor Resi                   : ${this.nomorResi}\n\n` +
                           `Untuk pertanyaan atau ketidaksesuaian pesanan hubungi admin melalui +62 857-1385-0615 (Amanda). Terima kasih.`;
                },
                get waLink() {
                    let p = (this.customerPhone || '').replace(/[^0-9]/g, '');
                    if (p.startsWith('0')) p = '62' + p.substring(1);
                    return `https://wa.me/${p}?text=` + encodeURIComponent(this.message);
                }
             }">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-gray-100 gap-3">
                <div class="flex items-center gap-3">
                    <span class="w-10 h-10 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center font-bold text-lg">🛒</span>
                    <div>
                        <h3 class="font-extrabold text-base text-gray-900">4. Template Konfirmasi Pesanan Toko Sarana Tani</h3>
                        <p class="text-xs text-gray-400">Digunakan setelah pesanan via WhatsApp terverifikasi pembayarannya dan disiapkan untuk pengiriman</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                {{-- Form Editor Generator --}}
                <div class="space-y-3 bg-gray-50/70 p-4 rounded-xl border border-gray-200">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-[11px] font-bold text-gray-600 mb-1">Nama Customer</label>
                            <input type="text" x-model="namaCustomer" class="w-full text-xs p-2 bg-white border border-gray-200 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-600 mb-1">No. WhatsApp Customer</label>
                            <input type="text" x-model="customerPhone" placeholder="0857xxxxxxxx" class="w-full text-xs p-2 bg-white border border-gray-200 rounded-lg">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-gray-600 mb-1">Produk &amp; Jumlah</label>
                        <input type="text" x-model="produkDanJumlah" class="w-full text-xs p-2 bg-white border border-gray-200 rounded-lg">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-[11px] font-bold text-gray-600 mb-1">Total Pembayaran</label>
                            <input type="text" x-model="total" class="w-full text-xs p-2 bg-white border border-gray-200 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-600 mb-1">Nomor Resi / Kurir</label>
                            <input type="text" x-model="nomorResi" class="w-full text-xs p-2 bg-white border border-gray-200 rounded-lg">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-[11px] font-bold text-gray-600 mb-1">Status Pembayaran</label>
                            <select x-model="statusBayar" class="w-full text-xs p-2 bg-white border border-gray-200 rounded-lg">
                                <option value="Lunas (Bank Mandiri 1030012983454 a.n CV SARANA HIJAU)">Lunas (Bank Mandiri CV SARANA HIJAU)</option>
                                <option value="Menunggu Verifikasi Bukti Transfer">Menunggu Bukti Transfer</option>
                                <option value="COD / Bayar di Tempat">COD / Bayar di Tempat</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-600 mb-1">Status Pengiriman</label>
                            <select x-model="statusPengiriman" class="w-full text-xs p-2 bg-white border border-gray-200 rounded-lg">
                                <option value="Sedang Dipacking & Siap Diserahkan ke Kurir">Sedang Dipacking</option>
                                <option value="Sudah Diserahkan ke Ekspedisi (Dalam Pengiriman)">Dalam Pengiriman (On Delivery)</option>
                                <option value="Telah Diterima Customer">Telah Diterima</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Live Preview & Actions --}}
                <div class="space-y-3 flex flex-col justify-between">
                    <div>
                        <div class="text-[11px] font-bold text-gray-400 uppercase mb-1">Preview Pesan Terformat:</div>
                        <div class="bg-gray-50 rounded-xl p-4 border border-gray-200/80 font-mono text-xs whitespace-pre-wrap leading-relaxed text-gray-800" x-text="message"></div>
                    </div>
                    <div class="flex flex-wrap gap-2 pt-2">
                        <button type="button"
                                @click="copyToClipboard(message)"
                                class="flex-1 px-4 py-2.5 bg-gray-800 hover:bg-gray-900 text-white rounded-xl text-xs font-bold transition-all flex items-center justify-center gap-2 shadow-xs">
                            <span>📋</span> Salin Teks Template
                        </button>
                        <a :href="waLink"
                           target="_blank"
                           class="flex-1 px-4 py-2.5 bg-[#16A34A] hover:bg-[#15803D] text-white rounded-xl text-xs font-bold transition-all flex items-center justify-center gap-2 shadow-xs">
                            <span>💬</span> Buka WhatsApp Customer
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- ══════════════════════════════════════════════════════════════════════════ --}}
    {{-- TAB 2: CHECKLIST PRA-KONSULTASI                                            --}}
    {{-- ══════════════════════════════════════════════════════════════════════════ --}}
    <div x-show="activeTab === 'checklist'" x-cloak class="bg-white rounded-2xl border border-gray-100 shadow-xs p-6 space-y-6">
        <div class="border-b border-gray-100 pb-4">
            <h3 class="font-extrabold text-lg text-gray-900">Checklist Admin Sebelum Sesi Konsultasi</h3>
            <p class="text-xs text-gray-500 mt-1">
                Wajib diperiksa oleh Admin/Koordinator sebelum menandai booking sebagai <strong>Confirmed</strong> atau mengirim tautan sesi ke customer &amp; praktisi.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @php
                $checklists = [
                    ['icon' => '👤', 'title' => '1. Data Customer & Topik Lengkap', 'desc' => 'Nama, nomor WhatsApp aktif, komoditas yang ditanam, serta uraian gejala atau permasalahan kebun sudah jelas.'],
                    ['icon' => '🎓', 'title' => '2. Praktisi Sesuai Kompetensi', 'desc' => 'Kategori praktisi (Umum / Spesialis / Super Spesialis) cocok dengan topik permasalahan dan jadwal telah dikonfirmasi ke praktisi.'],
                    ['icon' => '💰', 'title' => '3. Tarif, Durasi & Ketentuan Disampaikan', 'desc' => 'Customer memahami tarif sesi (Rp 150k Umum / Rp 350k Spesialis / Rp 750k Super Spesialis), durasi 60 menit, dan toleransi hadir 15 menit.'],
                    ['icon' => '🏦', 'title' => '4. Pembayaran Terverifikasi Valid', 'desc' => 'Bukti transfer ke Bank Mandiri CV SARANA HIJAU (1030012983454) telah dicek ke mutasi rekening, bukan sekadar screenshot.'],
                    ['icon' => '🔗', 'title' => '5. Tautan Sesi Dibuat & Diuji', 'desc' => 'Tautan video call (Zoom Meeting / Jitsi Meet) telah di-generate, diuji coba tidak terkunci kata sandi acak, dan siap dipakai.'],
                    ['icon' => '📩', 'title' => '6. Konfirmasi Diterima Kedua Pihak', 'desc' => 'Pesan konfirmasi resmi telah dikirim ke WhatsApp customer dan praktisi, dilengkapi instruksi bergabung 5–10 menit lebih awal.'],
                    ['icon' => '⏰', 'title' => '7. Pengingat Sesi (Reminder) Terjadwal', 'desc' => 'Kirim pesan pengingat 1 jam atau 15 menit sebelum waktu konsultasi untuk memastikan kehadiran kedua belah pihak.'],
                    ['icon' => '📸', 'title' => '8. Dokumen Pendukung Tersedia', 'desc' => 'Foto daun, batang, hama, tanah, atau data pupuk yang diunggah customer diteruskan ke praktisi sebelum sesi dimulai.'],
                ];
            @endphp

            @foreach($checklists as $c)
                <div class="p-4 rounded-xl border border-gray-200 bg-gray-50/60 hover:bg-white hover:border-emerald-300 transition-all flex items-start gap-3.5">
                    <span class="text-2xl flex-shrink-0 mt-0.5">{{ $c['icon'] }}</span>
                    <div>
                        <div class="font-extrabold text-sm text-gray-900">{{ $c['title'] }}</div>
                        <div class="text-xs text-gray-500 mt-1 leading-relaxed">{{ $c['desc'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ══════════════════════════════════════════════════════════════════════════ --}}
    {{-- TAB 3: STANDAR PELAYANAN & SLA                                             --}}
    {{-- ══════════════════════════════════════════════════════════════════════════ --}}
    <div x-show="activeTab === 'sla'" x-cloak class="bg-white rounded-2xl border border-gray-100 shadow-xs p-6 space-y-6">
        <div class="border-b border-gray-100 pb-4">
            <h3 class="font-extrabold text-lg text-gray-900">Standar Waktu Pelayanan (Service Level Agreement - SLA)</h3>
            <p class="text-xs text-gray-500 mt-1">
                Target internal HalloBun untuk menjaga kualitas layanan yang responsif, terpercaya, dan profesional.
            </p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-gray-50 text-gray-600 font-extrabold uppercase border-b border-gray-200">
                    <tr>
                        <th class="px-5 py-3.5">Aktivitas Operasional</th>
                        <th class="px-5 py-3.5">Target Waktu (SLA)</th>
                        <th class="px-5 py-3.5">Tanggung Jawab</th>
                        <th class="px-5 py-3.5">Catatan &amp; Ketentuan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50/60">
                        <td class="px-5 py-3.5 font-bold text-gray-900">Respons Awal Permintaan Masuk</td>
                        <td class="px-5 py-3.5 font-semibold text-emerald-700">&le; 30 Menit pada Jam Operasional</td>
                        <td class="px-5 py-3.5 text-gray-600">Admin Customer Service (Amanda)</td>
                        <td class="px-5 py-3.5 text-gray-500">Permintaan di luar jam 09.00–17.00 WIB dibalas hari berikutnya pukul 09.00 WIB.</td>
                    </tr>
                    <tr class="hover:bg-gray-50/60">
                        <td class="px-5 py-3.5 font-bold text-gray-900">Pemeriksaan &amp; Validasi Data</td>
                        <td class="px-5 py-3.5 font-semibold text-emerald-700">&le; 1 Jam Kerja Sejak Data Lengkap</td>
                        <td class="px-5 py-3.5 text-gray-600">Admin / Tim Operasional</td>
                        <td class="px-5 py-3.5 text-gray-500">Mengecek kesesuaian kategori praktisi, deskripsi masalah &amp; ketersediaan jadwal.</td>
                    </tr>
                    <tr class="hover:bg-gray-50/60">
                        <td class="px-5 py-3.5 font-bold text-gray-900">Konfirmasi Ketersediaan Praktisi</td>
                        <td class="px-5 py-3.5 font-semibold text-blue-700">&le; 1 Hari Kerja</td>
                        <td class="px-5 py-3.5 text-gray-600">Koordinator Praktisi (Raras)</td>
                        <td class="px-5 py-3.5 text-gray-500">Menghubungi praktisi terkait topik, jadwal, serta kebutuhan materi pendukung.</td>
                    </tr>
                    <tr class="hover:bg-gray-50/60">
                        <td class="px-5 py-3.5 font-bold text-gray-900">Penerbitan Penawaran Kunjungan / Narsum</td>
                        <td class="px-5 py-3.5 font-semibold text-blue-700">&le; 1 Hari Kerja</td>
                        <td class="px-5 py-3.5 text-gray-600">Manajemen / Koordinator</td>
                        <td class="px-5 py-3.5 text-gray-500">Memuat rincian honorarium, transportasi, akomodasi, dan deliverables laporan.</td>
                    </tr>
                    <tr class="hover:bg-gray-50/60">
                        <td class="px-5 py-3.5 font-bold text-gray-900">Verifikasi Pembayaran Transfer</td>
                        <td class="px-5 py-3.5 font-semibold text-emerald-700">&le; 15–30 Menit</td>
                        <td class="px-5 py-3.5 text-gray-600">Admin Keuangan</td>
                        <td class="px-5 py-3.5 text-gray-500">Mencocokkan mutasi rekening Bank Mandiri CV SARANA HIJAU.</td>
                    </tr>
                    <tr class="hover:bg-gray-50/60">
                        <td class="px-5 py-3.5 font-bold text-gray-900">Toleransi Keterlambatan Sesi</td>
                        <td class="px-5 py-3.5 font-semibold text-amber-700">Maksimal 15 Menit</td>
                        <td class="px-5 py-3.5 text-gray-600">Praktisi &amp; Customer</td>
                        <td class="px-5 py-3.5 text-gray-500">Jika melewati 15 menit tanpa kabar, sesi dicatat sebagai pembatalan/reschedule.</td>
                    </tr>
                    <tr class="hover:bg-gray-50/60">
                        <td class="px-5 py-3.5 font-bold text-gray-900">Respons Penanganan Keluhan (Tiket)</td>
                        <td class="px-5 py-3.5 font-semibold text-rose-700">&le; 1 Hari Kerja</td>
                        <td class="px-5 py-3.5 text-gray-600">Manajemen HalloBun</td>
                        <td class="px-5 py-3.5 text-gray-500">Keluhan serius dieskalasi langsung kepada manajemen untuk investigasi cepat.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════════════════════════════════ --}}
    {{-- TAB 4: RINGKASAN SOP LENGKAP 4 LINI LAYANAN                                --}}
    {{-- ══════════════════════════════════════════════════════════════════════════ --}}
    <div x-show="activeTab === 'dokumen'" x-cloak class="bg-white rounded-2xl border border-gray-100 shadow-xs p-6 space-y-6">
        <div class="border-b border-gray-100 pb-4">
            <h3 class="font-extrabold text-lg text-gray-900">Ringkasan Dokumen Induk Operasional HalloBun</h3>
            <p class="text-xs text-gray-500 mt-1">
                Ikhtisar resmi pelaksanaan 4 lini bisnis utama sesuai dokumen standar operasional prosedur yang disahkan.
            </p>
        </div>

        <div class="space-y-6">
            {{-- Layanan 1 --}}
            <div class="border border-emerald-100 bg-emerald-50/30 rounded-2xl p-5 space-y-3">
                <div class="flex items-center gap-2 font-extrabold text-emerald-900 text-sm">
                    <span>🌱</span> 1. Layanan Tanya Pakar Online (Video Call Konsultasi)
                </div>
                <div class="text-xs text-emerald-950/80 leading-relaxed space-y-2">
                    <p><strong>Media:</strong> Zoom Meeting / Jitsi Meet (link dikirim setelah lunas). Durasi sesi standar: <strong>60 menit</strong>.</p>
                    <p><strong>Struktur 3 Tier Tarif:</strong></p>
                    <ul class="list-disc list-inside ml-2 space-y-0.5">
                        <li><strong>Praktisi Umum (Rp 150.000):</strong> Pekarangan rumah, sayuran hobi, media tanam, pemupukan dasar.</li>
                        <li><strong>Praktisi Spesialis (Rp 350.000):</strong> Diagnosa OPT, penyakit layu, nutrisi hidroponik, cabai, bawang merah, kelapa &amp; sawit.</li>
                        <li><strong>Praktisi Super Spesialis (Rp 750.000):</strong> Uji lab tanah, bioteknologi hayati, audit kebun luas hektaran, riset formulasi.</li>
                    </ul>
                    <p><strong>Alur:</strong> Customer booking &rarr; Bayar Mandiri / Midtrans &rarr; Admin verifikasi &rarr; Kirim template konfirmasi WhatsApp &rarr; Sesi konsultasi &rarr; Catatan rekomendasi &rarr; Selesai.</p>
                </div>
            </div>

            {{-- Layanan 2 --}}
            <div class="border border-blue-100 bg-blue-50/30 rounded-2xl p-5 space-y-3">
                <div class="flex items-center gap-2 font-extrabold text-blue-900 text-sm">
                    <span>🚜</span> 2. Layanan Kunjungan Lahan (On-Site Field Visit)
                </div>
                <div class="text-xs text-blue-950/80 leading-relaxed space-y-2">
                    <p><strong>Ruang Lingkup:</strong> Pemeriksaan fisik kebun, pemetaan masalah hama/penyakit, pengambilan sampel tanah/daun, dan asesmen langsung.</p>
                    <p><strong>Alur:</strong> Formulir website diterima &rarr; Verifikasi titik GPS &amp; luas lahan &rarr; Penyusunan penawaran (biaya jasa + transportasi + akomodasi) &rarr; Pembayaran DP/lunas &rarr; Kunjungan lapangan &rarr; Laporan rekomendasi tertulis diserahkan.</p>
                </div>
            </div>

            {{-- Layanan 3 --}}
            <div class="border border-purple-100 bg-purple-50/30 rounded-2xl p-5 space-y-3">
                <div class="flex items-center gap-2 font-extrabold text-purple-900 text-sm">
                    <span>🎤</span> 3. Layanan Undang Narasumber (Daring &amp; Luring)
                </div>
                <div class="text-xs text-purple-950/80 leading-relaxed space-y-2">
                    <p><strong>Ruang Lingkup:</strong> Pembicara seminar, pelatihan petani, bimbingan teknis komunitas, webinar, dan lokakarya pertanian.</p>
                    <p><strong>Alur:</strong> Penyelenggara submit formulir &rarr; Konfirmasi kesesuaian tema &amp; profil peserta &rarr; Penunjukan narasumber &amp; kesepakatan honorarium &rarr; Persetujuan rundown &amp; teknis &rarr; Pelaksanaan acara &rarr; Berita acara &amp; administrasi selesai.</p>
                </div>
            </div>

            {{-- Layanan 4 --}}
            <div class="border border-amber-100 bg-amber-50/30 rounded-2xl p-5 space-y-3">
                <div class="flex items-center gap-2 font-extrabold text-amber-900 text-sm">
                    <span>🛒</span> 4. Toko Sarana Tani &amp; Kebun
                </div>
                <div class="text-xs text-amber-950/80 leading-relaxed space-y-2">
                    <p><strong>Ruang Lingkup:</strong> Benih unggul bersertifikat, bibit, pupuk hayati/organik, nutrisi presisi, dan perlengkapan berkebun.</p>
                    <p><strong>Alur:</strong> Pemesanan via WhatsApp Admin &rarr; Cek ketersediaan stok aktual &rarr; Hitung ongkos kirim &rarr; Pembayaran Mandiri &rarr; Pengepakan aman &rarr; Serah terima kurir (J&amp;T/JNE/Kargo) &rarr; Pengiriman nomor resi ke customer.</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
