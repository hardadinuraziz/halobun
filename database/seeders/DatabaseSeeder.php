<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Konsultan;
use App\Models\Jadwal;
use App\Models\Sarana;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ─── Admin ───────────────────────────────────────
        User::create([
            'name'     => 'Admin Hallobun',
            'email'    => 'admin@hallobun.com',
            'password' => Hash::make('password'),
            'role'     => 'admin',
            'phone'    => '081234567890',
        ]);

        // ─── Konsultan ────────────────────────────────────
        $konsultanData = [
            ['Dr. Budi Santoso, M.Si',     'Penyakit & Hama Tanaman', 150000, 4.9, 'Ahli patologi tanaman lulusan IPB dengan pengalaman 15 tahun menangani berbagai penyakit pada tanaman pangan dan hortikultura.'],
            ['Ir. Siti Rahayu, M.P',       'Tanaman Padi & Palawija', 120000, 4.8, 'Spesialis budidaya padi dan palawija. Pernah membantu lebih dari 500 petani meningkatkan hasil panen hingga 40%.'],
            ['Prof. Ahmad Fauzi, Ph.D',    'Agronomi & Kesuburan Tanah', 200000, 5.0, 'Guru besar agronomi. Pakar dalam analisis tanah dan pemupukan berimbang untuk optimasi produksi.'],
            ['Drh. Maya Kusuma',           'Peternakan & Pertanian Terpadu', 130000, 4.7, 'Dokter hewan sekaligus konsultan pertanian terpadu. Spesialis sistem integrated farming.'],
            ['Rahmat Hidayat, S.P, M.Agr', 'Pertanian Organik', 100000, 4.8, 'Praktisi pertanian organik bersertifikat. Membantu petani beralih ke sistem pertanian organik yang menguntungkan.'],
            ['Dr. Lestari Wulandari',      'Hortikultura & Tanaman Buah', 175000, 4.9, 'Spesialis hortikultura dengan fokus pada tanaman buah tropis. Alumni University of Queensland.'],
        ];

        foreach ($konsultanData as [$name, $spesialisasi, $harga, $rating, $bio]) {
            $user = User::create([
                'name'     => $name,
                'email'    => strtolower(preg_replace('/[^a-z]/i', '.', $name)) . '@hallobun.com',
                'password' => Hash::make('password'),
                'role'     => 'konsultan',
                'phone'    => '08' . rand(100000000, 999999999),
            ]);

            $konsultan = Konsultan::create([
                'user_id'        => $user->id,
                'spesialisasi'   => $spesialisasi,
                'bio'            => $bio,
                'harga_per_sesi' => $harga,
                'durasi_menit'   => 60,
                'is_active'      => true,
                'rating'         => $rating,
                'total_konsultasi' => rand(50, 300),
            ]);

            // Buat jadwal untuk 14 hari ke depan
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

        // ─── Sarana Pertanian ─────────────────────────────
        $saranaData = [
            ['Pupuk Urea Cap Kuda', 'pupuk', 'Pupuk nitrogen tinggi untuk kebutuhan pertumbuhan tanaman vegetatif.', 'Pupuk urea berkualitas tinggi dengan kandungan N 46%.', 45000, 55000, 100, 'kg', 'Pusri'],
            ['Pupuk NPK Mutiara', 'pupuk', 'Pupuk lengkap NPK 16-16-16 untuk semua jenis tanaman.', 'Formula seimbang untuk pertumbuhan optimal.', 85000, null, 80, 'kg', 'Mutiara'],
            ['Bibit Cabai Merah Keriting F1', 'bibit', 'Bibit cabai hibrida tahan penyakit, produktivitas tinggi.', 'Bibit F1 dengan produktivitas 1-1.5 kg per tanaman.', 35000, 45000, 200, 'sachet', 'East West Seed'],
            ['Bibit Padi IR64', 'bibit', 'Benih padi unggul varietas IR64. Tahan wereng coklat.', 'Hasil 6-8 ton GKP per hektar.', 25000, null, 150, 'kg', 'Sang Hyang Seri'],
            ['Pestisida Furadan 3G', 'pestisida', 'Insektisida granular untuk pengendalian hama tanah.', 'Efektif melawan nematoda dan serangga tanah.', 55000, 70000, 60, 'kg', 'FMC'],
            ['Fungisida Dithane M-45', 'pestisida', 'Fungisida protektif broad spectrum untuk berbagai jamur.', 'Kandungan Mankozeb 80%. Aman untuk sayuran.', 48000, null, 90, 'kg', 'Dow AgroSciences'],
            ['Sprayer Elektrik 20L', 'alat', 'Alat semprot elektrik kapasitas 20 liter dengan motor DC.', 'Baterai tahan 4-6 jam. Dilengkapi 4 nosel.', 650000, 750000, 30, 'unit', 'Solo'],
            ['Cangkul Baja Premium', 'alat', 'Cangkul baja karbon tinggi, gagang kayu jati solid.', 'Tahan lama untuk tanah keras sekalipun.', 85000, null, 50, 'unit', 'Fortex'],
            ['POC Biourin Sapi', 'pupuk', 'Pupuk organik cair dari urin sapi yang difermentasi.', 'Kaya hormon pertumbuhan alami untuk tanaman.', 30000, 40000, 120, 'liter', 'BioStar'],
            ['ZA Ammonium Sulfate', 'pupuk', 'Pupuk nitrogen dan sulfur untuk mendorong pertumbuhan.', 'Ideal untuk tanaman yang membutuhkan sulfur tinggi.', 40000, null, 75, 'kg', 'Petrokimia'],
            ['Bibit Jagung Hibrida NK22', 'bibit', 'Benih jagung hibrida tahan bulai dan produktivitas tinggi.', 'Potensi hasil 9-12 ton per hektar.', 95000, 110000, 40, 'kg', 'Syngenta'],
            ['Herbisida Roundup 480', 'pestisida', 'Herbisida sistemik non-selektif berbahan aktif glifosat.', 'Efektif untuk gulma tahunan dan rumput liar.', 75000, null, 55, 'liter', 'Monsanto'],
        ];

        foreach ($saranaData as $idx => [$nama, $kategori, $desc, $singkat, $harga, $hargaCoret, $stok, $satuan, $merek]) {
            Sarana::create([
                'nama'             => $nama,
                'kategori'         => $kategori,
                'deskripsi'        => $desc,
                'deskripsi_singkat'=> $singkat,
                'harga'            => $harga,
                'harga_coret'      => $hargaCoret,
                'stok'             => $stok,
                'satuan'           => $satuan,
                'merek'            => $merek,
                'is_active'        => true,
                'is_featured'      => $idx < 4,
                'total_terjual'    => rand(10, 200),
            ]);
        }

        // ─── Demo User ────────────────────────────────────
        User::create([
            'name'     => 'Petani Demo',
            'email'    => 'demo@hallobun.com',
            'password' => Hash::make('password'),
            'role'     => 'user',
            'phone'    => '082345678901',
        ]);
    }
}
