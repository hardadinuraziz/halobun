<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Konsultan;
use App\Models\Jadwal;

return new class extends Migration
{
    /**
     * Run the migrations to add/update all 11 specialist practitioners from Praktisi spesialist.pdf.
     */
    public function up(): void
    {
        $specialists = [
            [
                'name'          => 'Ahmad Suhaemi, S.TP',
                'email'         => 'ahmad.suhaemi@hallobun.com',
                'phone'         => '081200000006',
                'spesialisasi'  => 'Sertifikasi Organik & Perkebunan Kelapa (Coconut Plantation & Farmer)',
                'bio'           => 'Praktisi spesialis sertifikasi organik dengan pengalaman sebagai Organic Certification Officer & Internal Control System. Memiliki keahlian mendalam pada standar sertifikasi organik perkebunan kelapa (Coconut Plantation & Farmer) serta pendampingan budidaya petani berkelanjutan.',
                'foto'          => '/images/praktisi/ahmad_suhaemi.jpg',
                'rating'        => 4.9,
            ],
            [
                'name'          => 'Azhar Mahir, S.P.',
                'email'         => 'azhar.mahir@hallobun.com',
                'phone'         => '081200000011',
                'spesialisasi'  => 'Budidaya Kakao & Pengelolaan Pupuk Organik (Kompos)',
                'bio'           => 'Praktisi spesialis budidaya kakao dan formulasi pupuk organik kompos. Berpengalaman dalam pengelolaan kebun kakao produktif, rehabilitasi tanaman kakao, pemupukan organik terpadu, dan peningkatan mutu biji kakao.',
                'foto'          => '/images/praktisi/azhar_mahir.jpg',
                'rating'        => 4.9,
            ],
            [
                'name'          => 'Edi Sapwanto, S.T.',
                'email'         => 'edi.sapwanto@hallobun.com',
                'phone'         => '081200000012',
                'spesialisasi'  => 'Tanaman Perkebunan, Rempah & Penangkaran Bibit',
                'bio'           => 'Petani rempah dan praktisi penangkaran bibit tanaman perkebunan. Berpengalaman dalam teknik pembibitan unggul, budidaya tanaman perkebunan & rempah, serta manajemen pemupukan tanaman komersial.',
                'foto'          => '/images/praktisi/edi_sapwanto.jpg',
                'rating'        => 4.8,
            ],
            [
                'name'          => 'Ahmad Sujana',
                'email'         => 'ahmad.sujana@hallobun.com',
                'phone'         => '081200000013',
                'spesialisasi'  => 'Perbenihan, Budidaya & Pengolahan Aren',
                'bio'           => 'Direktur CV Sari Aren Mandiri. Spesialis hulu-hilir komoditas aren: penangkaran dan seleksi benih aren unggul, teknik budidaya pohon aren, manajemen penyadapan nira, serta pengolahan produk turunan aren berkualitas tinggi.',
                'foto'          => '/images/praktisi/ahmad_sujana.jpg',
                'rating'        => 4.9,
            ],
            [
                'name'          => 'Yusthian Hendra Mahardika',
                'email'         => 'yusthian.hendra@hallobun.com',
                'phone'         => '081200000014',
                'spesialisasi'  => 'Budidaya Tanaman Vanili, Polinasi & Pasca Panen',
                'bio'           => 'Praktisi spesialis budidaya tanaman vanili emas hijau. Menguasai teknik perawatan sulur, manajemen naungan, teknik polinasi/penyerbukan bunga presisi, pemupukan organik, serta proses curing dan pengolahan pasca panen vanili ekspor.',
                'foto'          => '/images/praktisi/yusthian_hendra.jpg',
                'rating'        => 4.9,
            ],
            [
                'name'          => 'Chandra Rika Herlin, S.P.',
                'email'         => 'chandra.rika@hallobun.com',
                'phone'         => '081200000015',
                'spesialisasi'  => 'Pembibitan Sawit & Budidaya Kelapa Sawit',
                'bio'           => 'Praktisi agronomi spesialis kelapa sawit dengan pengalaman lapangan intensif (Penasehat/Pendamping). Ahli dalam seleksi & manajemen pembibitan sawit (pre-nursery & main nursery), manajemen kultur teknis, pemupukan efisien, dan perawatan tanaman menghasilkan (TM).',
                'foto'          => '/images/praktisi/chandra_rika.jpg',
                'rating'        => 4.8,
            ],
            [
                'name'          => 'Kodrat Samadikun, Amd.Pi.',
                'email'         => 'kodrat.samadikun@hallobun.com',
                'phone'         => '081200000016',
                'spesialisasi'  => 'Benih & Budidaya Nilam Organik, Minyak Atsiri & Udang Vannamei',
                'bio'           => 'Produsen benih nilam berlisensi dan praktisi budidaya nilam organik serta penyulingan minyak atsiri nilam berkualitas ekspor. Juga menguasai budidaya udang Vannamei dengan metode mikrobiologi ramah lingkungan.',
                'foto'          => '/images/praktisi/kodrat_samadikun.jpg',
                'rating'        => 4.9,
            ],
            [
                'name'          => 'Nana Supriatna',
                'email'         => 'nana.supriatna@hallobun.com',
                'phone'         => '081200000017',
                'spesialisasi'  => 'Ekspor Impor Rempah, Hasil Hutan Bukan Kayu & Lidi Sawit',
                'bio'           => 'Praktisi perdagangan internasional komoditas sejak 2010. Spesialis ekspor-impor rempah-rempah Nusantara, hasil hutan bukan kayu (HHBK), dan valorisasi limbah perkebunan seperti lidi kelapa sawit untuk pasar global.',
                'foto'          => '/images/praktisi/nana_supriatna.jpg',
                'rating'        => 4.9,
            ],
            [
                'name'          => 'Ahmad Zakaria',
                'email'         => 'ahmad.zakaria@hallobun.com',
                'phone'         => '081200000018',
                'spesialisasi'  => 'Kopi Robusta Temanggung, Budidaya & Prosesor Kopi',
                'bio'           => 'Ketua MPIG Kopi Robusta Temanggung, pengelola kebun kopi dan narasumber nasional perkopian. Ahli dalam budidaya kopi robusta dataran tinggi, pemangkasan, pemupukan, panen petik merah, hingga proses pasca panen (natural, honey, full wash, winey processor).',
                'foto'          => '/images/praktisi/ahmad_zakaria.jpg',
                'rating'        => 4.9,
            ],
            [
                'name'          => 'Opi',
                'email'         => 'opi.vanili@hallobun.com',
                'phone'         => '081200000019',
                'spesialisasi'  => 'Budidaya & Perawatan Kebun Vanili',
                'bio'           => 'Praktisi lapangan budidaya tanaman vanili. Berpengalaman intensif dalam teknik budidaya, pembuatan paranet/greenhouse vanili, perawatan media tanam, pemangkasan sulur, serta perlindungan tanaman vanili dari busuk batang.',
                'foto'          => '/images/praktisi/opi.jpg',
                'rating'        => 4.8,
            ],
            [
                'name'          => 'Agus S. Susanto, M.Pd',
                'email'         => 'agus.susanto@hallobun.com',
                'phone'         => '081200000020',
                'spesialisasi'  => 'Budidaya Lada & Kelembagaan Petani (Ketua MPIG Lada Lamtim)',
                'bio'           => 'Ketua Kelompok Tani Lada, Ketua Prabu Lampung Timur, dan Ketua MPIG Lada Hitam Lampung Timur. Pakar budidaya lada unggul, manajemen tiang panjat lada, penanganan penyakit busuk pangkal batang lada, serta penguatan kelembagaan kelompok tani.',
                'foto'          => '/images/praktisi/agus_susanto.jpg',
                'rating'        => 4.9,
            ],
        ];

        foreach ($specialists as $s) {
            $user = User::updateOrCreate(
                ['email' => $s['email']],
                [
                    'name'              => $s['name'],
                    'password'          => Hash::make('halobun2026'),
                    'role'              => 'konsultan',
                    'phone'             => $s['phone'],
                    'email_verified_at' => now(),
                    'avatar'            => $s['foto'],
                ]
            );

            $konsultan = Konsultan::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'spesialisasi'     => $s['spesialisasi'],
                    'klasifikasi'      => 'spesialis',
                    'bio'              => $s['bio'],
                    'foto'             => $s['foto'],
                    'harga_per_sesi'   => 75000,
                    'durasi_menit'     => 60,
                    'is_active'        => true,
                    'rating'           => $s['rating'],
                    'total_konsultasi' => rand(35, 95),
                ]
            );

            // Buat jadwal weekday jika belum ada
            if (Jadwal::where('konsultan_id', $konsultan->id)->count() === 0) {
                for ($i = 1; $i <= 14; $i++) {
                    $date = now()->addDays($i);
                    if ($date->isWeekday()) {
                        Jadwal::create([
                            'konsultan_id' => $konsultan->id,
                            'tanggal'      => $date->format('Y-m-d'),
                            'jam_mulai'    => '09:00',
                            'jam_selesai'  => '10:00',
                            'is_available' => true,
                        ]);
                        Jadwal::create([
                            'konsultan_id' => $konsultan->id,
                            'tanggal'      => $date->format('Y-m-d'),
                            'jam_mulai'    => '14:00',
                            'jam_selesai'  => '15:00',
                            'is_available' => true,
                        ]);
                    }
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Safe down
    }
};
