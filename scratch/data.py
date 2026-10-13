# Datasets for Hallobun Static Site
HARGA_PANGAN = [
    {"icon":"🌶️","komoditas":"Cabai Rawit Merah","kategori":"Hortikultura","harga":"42.500","satuan":"kg","perubahan":"+3.2%","trend":"up","update":"Hari ini, 08:30 WIB","wilayah":"Rata-rata Nasional"},
    {"icon":"🧅","komoditas":"Bawang Merah Brebes","kategori":"Hortikultura","harga":"34.000","satuan":"kg","perubahan":"-1.8%","trend":"down","update":"Hari ini, 08:30 WIB","wilayah":"Pasar Induk"},
    {"icon":"🌾","komoditas":"Beras Medium Pandan","kategori":"Pangan Pokok","harga":"14.500","satuan":"kg","perubahan":"0.0%","trend":"stable","update":"Hari ini, 08:30 WIB","wilayah":"Stabil"},
    {"icon":"🥬","komoditas":"Sayur Pakcoy Segar","kategori":"Sayuran","harga":"8.500","satuan":"kg","perubahan":"+4.1%","trend":"up","update":"Hari ini, 08:30 WIB","wilayah":"Segar Petani"},
    {"icon":"🍅","komoditas":"Tomat Buah Unggul","kategori":"Hortikultura","harga":"12.000","satuan":"kg","perubahan":"-2.4%","trend":"down","update":"Hari ini, 08:30 WIB","wilayah":"Panen Raya"},
    {"icon":"🌽","komoditas":"Jagung Manis Pipil","kategori":"Pangan Pokok","harga":"9.500","satuan":"kg","perubahan":"+1.5%","trend":"up","update":"Hari ini, 08:30 WIB","wilayah":"Pasar Tradisional"},
]

GEJALA_MANDIRI = [
    {
        "id": "daun-kuning",
        "icon": "🍂",
        "gejala": "Daun Menguning & Bercak",
        "tanaman": "Cabai, Tomat, Sayuran",
        "penyebab": "Kekurangan nitrogen (N) atau infeksi bercak daun cercospora",
        "solusi": "Aplikasi pupuk N seimbang, pangkas daun terinfeksi, dan gunakan fungisida nabati atau Trichoderma.",
        "rekomendasi_ahli": "Dr. Budi Santoso (Hama & Penyakit)"
    },
    {
        "id": "daun-keriting",
        "icon": "🐛",
        "gejala": "Daun Keriting & Kerdil",
        "tanaman": "Cabai, Melon, Terong",
        "penyebab": "Serangan kutu kebul (Bemisia tabaci), tungau merah, atau thrips pembawa virus Gemini",
        "solusi": "Semprot pestisida nabati neem oil / ekstrak tembakau tiap 3 hari sore hari, pasang perangkap kuning.",
        "rekomendasi_ahli": "Dr. Budi Santoso (Hama & Penyakit)"
    },
    {
        "id": "batang-layu",
        "icon": "🥀",
        "gejala": "Batang Layu Mendadak",
        "tanaman": "Cabai, Tomat, Padi",
        "penyebab": "Layu bakteri (Ralstonia) atau jamur Fusarium oxysporum pada media tanam terlalu lembab",
        "solusi": "Perbaiki drainase tanah, kurangi penyiraman, taburkan kapur dolomit jika tanah asam (pH < 6), kocor agens hayati.",
        "rekomendasi_ahli": "Prof. Ahmad Fauzi (Kesuburan Tanah)"
    },
    {
        "id": "buah-busuk",
        "icon": "🍅",
        "gejala": "Buah Busuk Ujung / Rontok",
        "tanaman": "Tomat, Cabai, Melon",
        "penyebab": "Blossom End Rot (kekurangan kalsium Ca) atau serangan lalat buah (Bactrocera)",
        "solusi": "Semprot kalsium nitrat cair (CaNO3), pasang perangkap feromon metil eugenol untuk lalat buah.",
        "rekomendasi_ahli": "Dr. Dewi Lestari (Hortikultura)"
    }
]

BERITA = [
    {"tag":"Pengendalian Hama","color":"#16A34A","title":"Cara Mengatasi Kutu Putih & Ulat Grayak Tanpa Pestisida Kimia","excerpt":"Gunakan ramuan pestisida nabati daun tembakau dan minyak nimba yang aman untuk sayuran organik dan tanaman hias pekarangan.","author":"Dr. Ir. Suwandi, M.Si","date":"28 Sep 2026","read_time":"4 mnt baca","img":"halobun_real_pest_control.jpg"},
    {"tag":"Teknik Pemupukan","color":"#1D4ED8","title":"Panduan Aplikasi Pupuk Organik Cair (POC) untuk Hasil Panen Maksimal","excerpt":"Ketahui rasio pengenceran air serta waktu terbaik penyemprotan stomata daun pada pagi hari sebelum sinar matahari terik.","author":"Bayu Pratama, S.P.","date":"26 Sep 2026","read_time":"5 mnt baca","img":"halobun_real_sarana.jpg"},
    {"tag":"Urban Farming","color":"#D97706","title":"Strategi Kebun Sayur Vertikal di Rooftop dan Pekarangan Sempit","excerpt":"Memanfaatkan instalasi pipa talang dan pot susun vertikal untuk menanam selada, seledri, dan mint secara mandiri.","author":"Dewi Lestari, S.Pt","date":"24 Sep 2026","read_time":"3 mnt baca","img":"halobun_real_hydroponics.jpg"},
]

TESTIMONIALS = [
    {"name":"H. Ahmad Syafi'i","role":"Petani Cabai & Melon, Magelang","avatar":"👨‍🌾","rating":5,"comment":"Konsultasi video call di Hallobun sangat solutif. Daun cabai yang kriting langsung terdiagnosa kutu kebul dan sembuh setelah ikuti dosis rekomendasi pakar."},
    {"name":"Rina Kusuma","role":"Urban Farmer & Hidroponik, Tangerang","avatar":"👩‍🌾","rating":5,"comment":"Suka sekali dengan konsep temanya yang asri dan praktisi yang ramah. Sekarang kebun selada rooftop saya bebas busuk akar berkat bimbingan rutin."},
    {"name":"Bambang Triyono","role":"Ketua Kelompok Tani Mandiri, Boyolali","avatar":"🌾","rating":5,"comment":"Fitur undang narsum sangat mempermudah kelompok kami membuat workshop pemupukan berimbang. Materinya aplikatif dan pendampingannya berkelanjutan."},
]

KONSULTANS = [
    {"id":1,"name":"Dr. Budi Santoso, M.Si","spesialisasi":"Penyakit & Hama Tanaman","pengalaman":"8 tahun","rating":"4.9","sesi":47,"harga":"150.000","img":"halobun_real_practitioner.jpg","jadwal":"Senin-Jumat, 08.00-17.00 WIB","bio":"Doktor IPB bidang Proteksi Tanaman dengan spesialisasi pengendalian OPT sayuran dan hortikultura. Berpengalaman mendampingi petani cabai, tomat, dan tanaman hias di Jawa Tengah dan DIY."},
    {"id":2,"name":"Ir. Siti Rahayu, M.P","spesialisasi":"Padi & Palawija","pengalaman":"6 tahun","rating":"4.8","sesi":32,"harga":"120.000","img":"halobun_praktisi_hero.jpg","jadwal":"Senin-Sabtu, 09.00-16.00 WIB","bio":"Ahli budidaya padi, jagung, dan kedelai. Alumni Universitas Gadjah Mada. Mendampingi kelompok tani dengan metode SRI dan PHT terpadu."},
    {"id":3,"name":"Prof. Ahmad Fauzi, Ph.D","spesialisasi":"Agronomi & Kesuburan Tanah","pengalaman":"15 tahun","rating":"5.0","sesi":58,"harga":"200.000","img":"halobun_hero_halodoc.jpg","jadwal":"Selasa-Kamis, 10.00-15.00 WIB","bio":"Profesor tamu Agroteknologi. Ahli kesuburan tanah, formulasi pupuk organik dan hayati, serta audit lahan perkebunan skala besar."},
    {"id":4,"name":"Dr. Dewi Lestari, M.Si","spesialisasi":"Hortikultura & Florikultura","pengalaman":"10 tahun","rating":"4.7","sesi":24,"harga":"130.000","img":"halobun_real_sarana.jpg","jadwal":"Senin-Jumat, 08.00-17.00 WIB","bio":"Spesialis tanaman hias, sayuran premium, dan bunga potong. Berpengalaman mendampingi usaha greenhouse dan urban farming rooftop."},
    {"id":5,"name":"Ir. Rudi Hartono, M.P","spesialisasi":"Perkebunan & Tanaman Industri","pengalaman":"12 tahun","rating":"4.9","sesi":41,"harga":"175.000","img":"halobun_real_livestock.jpg","jadwal":"Senin-Jumat, 09.00-16.00 WIB","bio":"Konsultan perkebunan sawit, karet, dan kakao. Ahli manajemen nutrisi tanaman industri dan sertifikasi RSPO/Rainforest Alliance."},
    {"id":6,"name":"Dr. Nina Kusuma, M.Si","spesialisasi":"Pertanian Organik & Agroekologi","pengalaman":"7 tahun","rating":"4.8","sesi":29,"harga":"160.000","img":"halobun_real_training.jpg","jadwal":"Rabu-Sabtu, 09.00-15.00 WIB","bio":"Pelopor pertanian organik bersertifikat. Mendampingi konversi lahan konvensional ke organik, penyusunan SOP sertifikasi, dan pemasaran produk organik."},
]

PRODUK = [
    {"id":1,"nama":"Bibit Cabai Merah TW Super","deskripsi":"Varietas unggulan, tahan virus kuning & keriting, produktivitas tinggi 1–1.2 kg/tanaman. Daya kecambah >90%.","img":"halobun_real_sarana.jpg","harga":"45.000","kategori":"Bibit","stok":150,"featured":True},
    {"id":2,"nama":"Pupuk NPK Organik 25 Kg","deskripsi":"Formulasi khusus sayuran dan buah. Memperkuat akar, meningkatkan bobot panen, ramah lingkungan.","img":"halobun_real_hydroponics.jpg","harga":"185.000","kategori":"Pupuk","stok":80,"featured":True},
    {"id":3,"nama":"Pestisida Nabati Neem Oil 500ml","deskripsi":"Pengendali hama organik dari biji nimba. Efektif vs thrips, tungau, aphid. Aman untuk lebah dan tanah.","img":"halobun_real_pest_control.jpg","harga":"75.000","kategori":"Pestisida","stok":0,"featured":False},
    {"id":4,"nama":"Nutrisi Hidroponik AB Mix 1L","deskripsi":"Larutan nutrisi lengkap untuk sistem NFT, DFT, dan wick. Sudah diformulasi sesuai fase vegetatif & generatif.","img":"halobun_real_soil_test.jpg","harga":"125.000","kategori":"Nutrisi","stok":60,"featured":True},
    {"id":5,"nama":"Bibit Tomat Cherry Premium","deskripsi":"Cocok untuk pot dan greenhouse. Produktif sepanjang tahun, rasa manis, ukuran seragam.","img":"halobun_real_practitioner.jpg","harga":"35.000","kategori":"Bibit","stok":0,"featured":False},
    {"id":6,"nama":"Soil Test Kit Digital 3-in-1","deskripsi":"Uji pH, NPK, dan kelembaban tanah secara instan tanpa reagen kimia. Akurasi tinggi untuk keputusan pemupukan.","img":"halobun_hero_halodoc.jpg","harga":"350.000","kategori":"Alat","stok":12,"featured":True},
    {"id":7,"nama":"Media Tanam Cocopeat 10L","deskripsi":"Cocopeat steril bebas patogen, kapasitas menahan air optimal. Cocok hidroponik, pot, dan benih.","img":"halobun_real_sarana.jpg","harga":"45.000","kategori":"Media Tanam","stok":200,"featured":False},
    {"id":8,"nama":"Pupuk Cair Organik 1L (POC)","deskripsi":"Pupuk cair fermentasi limbah sayur + EM4. Tinggi C-organik, langsung terserap akar dalam 30 menit.","img":"halobun_real_hydroponics.jpg","harga":"55.000","kategori":"Pupuk","stok":90,"featured":False},
]

LAYANAN = [
    {"id":"crop-production","badge":"Siklus Lengkap","icon":"🌾","title":"Produksi Tanaman & Hortikultura","desc":"Pendampingan terpadu dari persiapan media tanam, pemupukan berimbang, manajemen irigasi, hingga panen untuk sayur, buah tropis, cabai, padi, dan tanaman hias.","features":["Kalender tanam & pemupukan presisi","Manajemen Pengendalian Hama Terpadu (PHT)","Teknik budidaya organik & hidroponik modern","Optimalisasi kualitas dan kuantitas hasil panen"],"cta":"Konsultasikan Budidaya","url":"konsultasi.html","color":"#16A34A"},
    {"id":"consulting","badge":"Populer & Cepat","icon":"💬","title":"Konsultasi Agrikultur & Agronomi","desc":"Konsultasi interaktif 1-on-1 bersama pakar agronomis berlisensi via video call untuk diagnosa instan penyakit tanaman, rekomendasi nutrisi, dan pencegahan gagal panen.","features":["Sesi video call tatap muka via Jitsi Meet","Diagnosa foto hama & daun menguning secara mendalam","Resep dosis pupuk & nutrisi sesuai jenis tanah","Notifikasi & ringkasan terkirim langsung ke WhatsApp"],"cta":"Pilih Konsultan Online","url":"konsultasi.html","color":"#16A34A"},
    {"id":"training","badge":"Edukasi & Praktik","icon":"🎓","title":"Pelatihan & Lokakarya Pekebun","desc":"Program pelatihan praktis untuk kelompok tani, komunitas urban farming, institusi pendidikan, dan program CSR korporasi dengan kurikulum aplikatif.","features":["Pelatihan langsung (on-site) atau webinar online","Praktik pembuatan kompos hayati & pestisida nabati","Modul pembelajaran terstruktur & e-sertifikat resmi","Sesi tanya jawab interaktif bersama narasumber senior"],"cta":"Undang Narasumber","url":"narsum.html","color":"#1D4ED8"},
    {"id":"field-visit","badge":"On-Site Langsung","icon":"🚜","title":"Kunjungan Lapangan & Uji Lahan","desc":"Tim agronomis kami hadir langsung ke lahan, pekarangan, kebun buah, atau greenhouse Anda untuk evaluasi fisik, uji pH tanah, dan pemetaan zonasi tanam.","features":["Inspeksi langsung kondisi tanaman di lapangan","Pengukuran pH, kelembapan, dan kepadatan tanah","Penyusunan denah tata kelola air dan irigasi","Laporan komprehensif tertulis pasca kunjungan"],"cta":"Pesan Kunjungan Kebun","url":"kunjungan.html","color":"#D97706"},
    {"id":"seed-supply","badge":"Tersertifikasi","icon":"🪴","title":"Penyediaan Benih & Sarana Organik","desc":"Katalog sarana kebun terlengkap: benih unggul daya kecambah tinggi, pupuk organik hayati, nutrisi AB Mix, dan alat berkebun berkualitas.","features":["Benih bersertifikasi bebas penyakit benih","Pupuk organik ramah lingkungan & hayati mikroba","Media tanam siap pakai bebas patogen","Pengiriman aman ke seluruh wilayah Indonesia"],"cta":"Lihat Katalog Sarana","url":"sarana.html","color":"#65A30D"},
    {"id":"livestock","badge":"Integrated Farming","icon":"🐄","title":"Peternakan Terpadu & Pakan Alami","desc":"Menerapkan siklus pertanian sirkular yang menggabungkan kebun dengan ternak (unggas, domba, kambing, sapi) melalui formulasi pakan fermentasi mandiri.","features":["Formulasi pakan hemat biaya berbasis bahan lokal","Pengolahan feses/urin menjadi biogas & pupuk cair","Standar sanitasi dan biosafety kandang sehat","Siklus nutrisi tertutup dari kebun kembali ke kebun"],"cta":"Konsultasikan Peternakan","url":"konsultasi.html","color":"#D97706"},
    {"id":"rd-testing","badge":"Laboratorium & Ilmiah","icon":"🔬","title":"Riset, Analisis Tanah & Formulasi","desc":"Uji laboratorium kadar hara tanah (N, P, K, C-Organik), uji efikasi produk pertanian hayati, dan formulasi pupuk khusus untuk perkebunan luas.","features":["Uji laboratorium kimia & biologi tanah lengkap","Rekomendasi takaran pemupukan presisi per hektar","Uji efikasi lapangan skala percontohan (demo plot)","Laporan analisis ilmiah untuk standarisasi sertifikasi"],"cta":"Diskusikan Riset & Uji","url":"kunjungan.html","color":"#1D4ED8"},
]
