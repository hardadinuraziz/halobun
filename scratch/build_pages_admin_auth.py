import os, sys
sys.path.append("/Users/as-saifi/Downloads/hallobun/scratch")
from data import KONSULTANS, PRODUK
from templates import head, nav, footer, adm_sidebar, adm_top

BASE = "/Users/as-saifi/Downloads/hallobun-static"
os.makedirs(f"{BASE}/pages/admin", exist_ok=True)

def write_file(rel_path, content):
    path = os.path.join(BASE, rel_path)
    os.makedirs(os.path.dirname(path), exist_ok=True)
    with open(path, "w", encoding="utf-8") as f:
        f.write(content)
    print(f"  ✓ {rel_path} ({len(content)} bytes)")

def badge_stok(stok):
    if stok == 0:
        return '<span class="sts sts-x">Habis</span>'
    elif stok <= 10:
        return f'<span class="sts sts-p">Stok {stok}</span>'
    return '<span class="sts sts-c">Tersedia</span>'

# ══════════════════════════════════════════
# 1. LOGIN.HTML
# ══════════════════════════════════════════
login_pg = head("Masuk ke Akun","../") + nav("../") + f"""
<div style="min-height:calc(100vh - 66px);display:flex;align-items:center;justify-content:center;padding:40px 16px;background:var(--s50)">
  <div style="width:100%;max-width:420px">
    <div style="text-align:center;margin-bottom:28px">
      <img src="../images/logo.png" alt="Hallobun" style="height:48px;margin:0 auto 12px">
      <div style="font-size:24px;font-weight:900;color:var(--s900)">Masuk ke Hallobun</div>
      <p class="tsm" style="color:var(--s500)">Akses dashboard konsultasi, kebun, dan invoice Anda</p>
    </div>
    <div style="background:#fff;border:1.5px solid var(--s200);border-radius:18px;padding:32px;box-shadow:var(--shd)">
      <div class="fg"><label class="fl">Email Terdaftar <span style="color:var(--g)">*</span></label><input type="email" id="lg_email" class="fc" placeholder="budi@petani.com" value="user@hallobun.com"></div>
      <div class="fg"><label class="fl">Kata Sandi <span style="color:var(--g)">*</span></label><input type="password" id="lg_pass" class="fc" placeholder="Masukkan password" value="halobun2026"></div>
      <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px">
        <label style="display:flex;align-items:center;gap:6px;font-size:13px;cursor:pointer"><input type="checkbox" checked style="accent-color:var(--g)"> Ingat saya</label>
        <a href="#" style="font-size:13px;color:var(--g);font-weight:700">Lupa password?</a>
      </div>
      <button type="button" onclick="doLogin()" class="btn btn-g w100 btn-lg">Masuk Sekarang</button>
      <div style="text-align:center;margin-top:16px;font-size:13px;color:var(--s500)">Belum punya akun? <a href="register.html" style="color:var(--g);font-weight:700">Daftar gratis di sini</a></div>
      <hr class="div">
      <div style="text-align:center;font-size:12px;color:var(--s400);margin-bottom:10px">Akses Cepat Pengujian:</div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px">
        <a href="dashboard.html" class="btn btn-o btn-sm">👨‍🌾 Dashboard User</a>
        <a href="admin/dashboard.html" class="btn btn-o btn-sm">🔐 Panel Admin</a>
      </div>
    </div>
  </div>
</div>
""" + footer("../") + """<script>
function doLogin(){
  var em=document.getElementById("lg_email").value;
  var pw=document.getElementById("lg_pass").value;
  if(!em||!pw){toast("Mohon masukkan email dan password","er");return;}
  toast("Login berhasil! Mengalihkan ke dashboard...","ok");
  setTimeout(function(){
    if(em.includes("admin")){window.location.href="admin/dashboard.html";}
    else{window.location.href="dashboard.html";}
  },1000);
}
</script></body></html>"""
write_file("pages/login.html", login_pg)

# ══════════════════════════════════════════
# 2. REGISTER.HTML
# ══════════════════════════════════════════
register_pg = head("Daftar Akun Baru","../") + nav("../") + f"""
<div style="min-height:calc(100vh - 66px);display:flex;align-items:center;justify-content:center;padding:40px 16px;background:var(--s50)">
  <div style="width:100%;max-width:500px">
    <div style="text-align:center;margin-bottom:28px">
      <img src="../images/logo.png" alt="Hallobun" style="height:48px;margin:0 auto 12px">
      <div style="font-size:24px;font-weight:900;color:var(--s900)">Buat Akun Hallobun</div>
      <p class="tsm" style="color:var(--s500)">Gratis selamanya &bull; Terhubung dengan ratusan praktisi kebun</p>
    </div>
    <div style="background:#fff;border:1.5px solid var(--s200);border-radius:18px;padding:32px;box-shadow:var(--shd)">
      <div class="grid g2" style="gap:12px">
        <div class="fg"><label class="fl">Nama Lengkap <span style="color:var(--g)">*</span></label><input type="text" id="rg_name" class="fc" placeholder="Budi Santoso"></div>
        <div class="fg"><label class="fl">No. WhatsApp <span style="color:var(--g)">*</span></label><input type="tel" id="rg_wa" class="fc" placeholder="0812-xxxx-xxxx"></div>
      </div>
      <div class="fg"><label class="fl">Email Aktif <span style="color:var(--g)">*</span></label><input type="email" id="rg_email" class="fc" placeholder="budi@contoh.com"></div>
      <div class="fg"><label class="fl">Kata Sandi Baru <span style="color:var(--g)">*</span></label>
        <input type="password" id="rg_pass" class="fc" placeholder="Minimal 8 karakter" oninput="checkStrength(this.value)">
        <div id="passStrength" style="height:4px;border-radius:9999px;margin-top:6px;background:var(--s200);transition:all .3s"></div>
        <div id="passLabel" style="font-size:11px;color:var(--s400);margin-top:3px"></div>
      </div>
      <div class="fg"><label class="fl">Peran / Kebutuhan Utama</label>
        <select class="fc" id="rg_role">
          <option>Pekebun Rumahan &amp; Urban Farming</option>
          <option>Petani Hortikultura / Palawija Komersial</option>
          <option>Pengelola Kebun &amp; Greenhouse</option>
          <option>Kelompok Tani / Komunitas</option>
        </select>
      </div>
      <div style="margin-bottom:20px;font-size:13px;color:var(--s500)">
        <label style="display:flex;align-items:flex-start;gap:8px;cursor:pointer;line-height:1.5">
          <input type="checkbox" id="rg_terms" checked style="accent-color:var(--g);margin-top:3px;flex-shrink:0">
          Saya menyetujui <a href="#" style="color:var(--g)">Ketentuan Layanan</a> &amp; <a href="#" style="color:var(--g)">Kebijakan Privasi</a> Hallobun.
        </label>
      </div>
      <button type="button" onclick="doRegister()" class="btn btn-g w100 btn-lg">Daftar Akun Sekarang</button>
      <div style="text-align:center;margin-top:16px;font-size:13px;color:var(--s500)">Sudah memiliki akun? <a href="login.html" style="color:var(--g);font-weight:700">Masuk</a></div>
    </div>
  </div>
</div>
""" + footer("../") + """<script>
function checkStrength(v){
  var bar=document.getElementById("passStrength");var lbl=document.getElementById("passLabel");
  if(!v){bar.style.width="0";lbl.textContent="";return;}
  var s=0;if(v.length>=8)s++;if(/[A-Z]/.test(v))s++;if(/[0-9]/.test(v))s++;if(/[^A-Za-z0-9]/.test(v))s++;
  var cols=["#EF4444","#F59E0B","#16A34A","#15803D"];var txt=["Lemah","Sedang","Kuat","Sangat Kuat"];
  bar.style.width=(s*25)+"%";bar.style.background=cols[s-1]||"#EF4444";
  lbl.textContent=txt[s-1]||"";lbl.style.color=cols[s-1]||"#EF4444";
}
function doRegister(){
  var nm=document.getElementById("rg_name").value;
  var em=document.getElementById("rg_email").value;
  var wa=document.getElementById("rg_wa").value;
  var pw=document.getElementById("rg_pass").value;
  if(!nm||!em||!wa||!pw){toast("Mohon lengkapi semua field bertanda (*)","er");return;}
  toast("Pendaftaran akun berhasil! Selamat datang di Hallobun.","ok");
  setTimeout(function(){window.location.href="dashboard.html";},1200);
}
</script></body></html>"""
write_file("pages/register.html", register_pg)

# ══════════════════════════════════════════
# 3. DASHBOARD.HTML & RIWAYAT.HTML (User)
# ══════════════════════════════════════════
booking_table_rows = """
<tr>
  <td><span class="tsm tm">#BK-0003</span></td>
  <td><div class="fw7">Dr. Budi Santoso</div><div class="txs tm">Hama &amp; Penyakit Tanaman</div></td>
  <td>Konsultasi Online</td>
  <td>1 Okt 2026, 14.00 WIB</td>
  <td class="status-cell"><span class="sts sts-c">Confirmed</span></td>
  <td>QRIS</td>
  <td class="fw7 tg">Rp 150.000</td>
  <td><a href="meeting.html" class="btn btn-g btn-sm">🎥 Buka Jitsi</a></td>
</tr>
<tr>
  <td><span class="tsm tm">#BK-0002</span></td>
  <td><div class="fw7">Ir. Siti Rahayu</div><div class="txs tm">Padi &amp; Palawija</div></td>
  <td>Konsultasi Online</td>
  <td>20 Sep 2026, 10.00 WIB</td>
  <td class="status-cell"><span class="sts sts-d">Selesai</span></td>
  <td>BCA VA</td>
  <td class="fw7">Rp 120.000</td>
  <td><button type="button" class="btn btn-o btn-sm" onclick="openModal('ulasModal')">⭐ Beri Ulasan</button></td>
</tr>
<tr>
  <td><span class="tsm tm">#KJ-0001</span></td>
  <td><div class="fw7">Prof. Ahmad Fauzi</div><div class="txs tm">Agronomi &amp; Kesuburan</div></td>
  <td>Kunjungan Lahan</td>
  <td>10 Sep 2026, 09.00 WIB</td>
  <td class="status-cell"><span class="sts sts-d">Selesai</span></td>
  <td>BNI VA</td>
  <td class="fw7">Rp 350.000</td>
  <td><a href="javascript:toast('Laporan hasil uji tanah komprehensif berhasil diunduh','ok')" class="btn btn-o btn-sm">📄 Unduh Laporan</a></td>
</tr>
"""

dashboard_pg = head("Dashboard Pengguna","../") + nav("../") + f"""
<div style="background:linear-gradient(135deg,var(--gx),var(--g));color:#fff;padding:36px 28px">
  <div class="con" style="display:flex;align-items:center;gap:20px;flex-wrap:wrap">
    <div style="width:64px;height:64px;background:rgba(255,255,255,.2);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:32px;flex-shrink:0">👨‍🌾</div>
    <div style="flex:1">
      <div style="font-size:22px;font-weight:900">Selamat Datang, Budi Santoso 👋</div>
      <p style="opacity:.8;font-size:13.5px">Pengguna Terdaftar &bull; Komoditas: Cabai &amp; Sayuran Hidroponik</p>
    </div>
    <div style="display:flex;gap:8px;flex-wrap:wrap">
      <a href="konsultasi.html" class="btn btn-w btn-sm">+ Booking Konsultasi Baru</a>
      <a href="kunjungan.html" class="btn btn-sm" style="background:rgba(255,255,255,.15);color:#fff;border:1.5px solid rgba(255,255,255,.3)">+ Pesan Kunjungan Lahan</a>
    </div>
  </div>
</div>

<section class="sec"><div class="con">
  <div class="grid g4 mb6">
    <div class="stat"><div style="font-size:22px;margin-bottom:4px">📋</div><div class="sv">3</div><div class="sl">Total Booking Sesi</div></div>
    <div class="stat"><div style="font-size:22px;margin-bottom:4px">🟢</div><div class="sv tg">1</div><div class="sl">Sesi Aktif Hari Ini</div></div>
    <div class="stat"><div style="font-size:22px;margin-bottom:4px">💰</div><div class="sv">Rp 620K</div><div class="sl">Total Pembayaran</div></div>
    <div class="stat"><div style="font-size:22px;margin-bottom:4px">⭐</div><div class="sv">5.0</div><div class="sl">Kepuasan Layanan</div></div>
  </div>

  <div class="alert al-ok mb6" style="display:flex;align-items:center;gap:14px;padding:18px">
    <span style="font-size:28px">🎥</span>
    <div style="flex:1">
      <strong style="font-size:15px">Sesi Konsultasi Anda Hari Ini Siap:</strong><br>
      <span class="tsm">Dr. Budi Santoso &bull; Pukul 14.00 WIB &bull; Topik: Penanganan Hama Kutu Putih &amp; Pemupukan Daun</span>
    </div>
    <a href="meeting.html" class="btn btn-g btn-sm" style="flex-shrink:0">Masuk Ruang Jitsi &rarr;</a>
  </div>

  <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
    <div style="font-weight:800;font-size:18px">📋 Riwayat Aktivitas &amp; Pemesanan Terkini</div>
    <a href="riwayat.html" class="btn btn-o btn-sm">Lihat Semua Riwayat &rarr;</a>
  </div>
  <div class="tw mb8">
    <table id="mainTable">
      <thead><tr><th>#Kode</th><th>Praktisi Ahli</th><th>Jenis Layanan</th><th>Jadwal Sesi</th><th>Status</th><th>Pembayaran</th><th>Total</th><th>Aksi</th></tr></thead>
      <tbody>{booking_table_rows}</tbody>
    </table>
  </div>
</div></section>

<!-- Modal Ulasan -->
<div class="mo" id="ulasModal">
  <div class="mo-box">
    <button class="mo-close" onclick="closeModal('ulasModal')">✕</button>
    <div style="font-weight:800;font-size:20px;margin-bottom:14px">⭐ Berikan Penilaian &amp; Ulasan</div>
    <div style="font-size:14px;color:var(--s600);margin-bottom:16px">Sesi bersama: <strong>Ir. Siti Rahayu, M.P</strong></div>
    <div style="display:flex;gap:8px;justify-content:center;margin-bottom:20px;font-size:36px" id="starRow">
      <span class="star-opt" onclick="setStars(1)" data-val="1" style="cursor:pointer;opacity:1">⭐</span>
      <span class="star-opt" onclick="setStars(2)" data-val="2" style="cursor:pointer;opacity:1">⭐</span>
      <span class="star-opt" onclick="setStars(3)" data-val="3" style="cursor:pointer;opacity:1">⭐</span>
      <span class="star-opt" onclick="setStars(4)" data-val="4" style="cursor:pointer;opacity:1">⭐</span>
      <span class="star-opt" onclick="setStars(5)" data-val="5" style="cursor:pointer;opacity:1">⭐</span>
    </div>
    <div class="fg"><label class="fl">Ulasan Anda</label><textarea class="fc" id="ulas_text" rows="3" placeholder="Sangat puas! Penjelasan praktisi sangat mudah dipahami dan takaran pupuk manjur..."></textarea></div>
    <button type="button" onclick="submitUlasan()" class="btn btn-g w100">Kirim Penilaian</button>
  </div>
</div>
""" + footer("../") + """<script>
var selectedStars=5;
function setStars(n){
  selectedStars=n;
  document.querySelectorAll(".star-opt").forEach(function(s){
    s.style.opacity=parseInt(s.getAttribute("data-val"))<=n?"1":".25";
  });
}
function submitUlasan(){
  toast("Terima kasih! Ulasan bintang "+selectedStars+" berhasil dikirimkan.","ok");
  closeModal("ulasModal");
}
</script></body></html>"""
write_file("pages/dashboard.html", dashboard_pg)

# RIWAYAT.HTML
riwayat_pg = head("Riwayat Lengkap Booking","../") + nav("../") + f"""
<div class="ph ph-lt" style="background:var(--s50);border-bottom:1px solid var(--s200);padding:32px 24px">
  <div class="ph-inner" style="color:var(--s900)">
    <h1 style="font-size:26px;font-weight:900">📋 Riwayat Lengkap Booking</h1>
    <p style="color:var(--s500)">Daftar seluruh transaksi konsultasi tele-agronomi, kunjungan lapangan, dan pengadaan sarana kebun Anda.</p>
  </div>
</div>
<section class="sec"><div class="con">
  <div style="display:flex;gap:12px;margin-bottom:20px;flex-wrap:wrap;align-items:center">
    <input type="text" id="searchInput" class="fc" placeholder="🔍 Cari nomor booking atau nama praktisi..." style="max-width:320px">
    <select class="fc" style="max-width:180px" onchange="filterByStatusRw(this)">
      <option value="">Semua Status</option>
      <option value="confirmed">Confirmed</option>
      <option value="selesai">Selesai</option>
      <option value="pending">Pending</option>
    </select>
    <a href="konsultasi.html" class="btn btn-g btn-sm" style="margin-left:auto">+ Booking Konsultasi Baru</a>
  </div>
  <div class="tw">
    <table id="mainTable">
      <thead><tr><th>#Kode</th><th>Praktisi Ahli</th><th>Jenis Layanan</th><th>Jadwal Sesi</th><th>Status</th><th>Pembayaran</th><th>Total</th><th>Aksi</th></tr></thead>
      <tbody>{booking_table_rows}</tbody>
    </table>
  </div>
</div></section>
""" + footer("../") + """<script>
function filterByStatusRw(sel){
  var v=sel.value.toLowerCase();
  document.querySelectorAll("#mainTable tbody tr").forEach(function(r){
    r.style.display=(!v||r.textContent.toLowerCase().includes(v))?"":"none";
  });
}
</script></body></html>"""
write_file("pages/riwayat.html", riwayat_pg)

# ══════════════════════════════════════════
# 4. ADMIN DASHBOARD & SUBPAGES
# ══════════════════════════════════════════
adm_dash_pg = head("Admin Dashboard","../../") + f"""<body>
<div class="adm-lay">
{adm_sidebar("dashboard.html")}
<div class="adm-main">
{adm_top("📊 Ringkasan Ekosistem Hallobun")}
<div class="adm-body">
  <div class="grid g4 mb6">
    <div class="stat"><div style="font-size:24px;margin-bottom:4px">💬</div><div class="sv">47</div><div class="sl">Konsultasi Selesai</div></div>
    <div class="stat"><div style="font-size:24px;margin-bottom:4px">🚜</div><div class="sv">12</div><div class="sl">Survei Lapangan</div></div>
    <div class="stat"><div style="font-size:24px;margin-bottom:4px">🎤</div><div class="sv">8</div><div class="sl">Undangan Narsum</div></div>
    <div class="stat"><div style="font-size:24px;margin-bottom:4px">💰</div><div class="sv tg">18.4jt</div><div class="sl">Pendapatan Bersih</div></div>
  </div>

  <div class="grid g2 mb6">
    <div class="stat"><div style="font-weight:700;font-size:15px;margin-bottom:14px">📊 Status Pemesanan Berjalan</div>
      <div style="display:flex;gap:12px">
        <div style="flex:1;text-align:center;background:var(--gl);border-radius:12px;padding:16px"><div style="font-size:26px;font-weight:900;color:var(--g)">15</div><div style="font-size:11px;color:var(--s500)">Pending Bayar</div></div>
        <div style="flex:1;text-align:center;background:#EFF6FF;border-radius:12px;padding:16px"><div style="font-size:26px;font-weight:900;color:#1D4ED8">23</div><div style="font-size:11px;color:var(--s500)">Siap Sesi / Confirmed</div></div>
        <div style="flex:1;text-align:center;background:var(--s100);border-radius:12px;padding:16px"><div style="font-size:26px;font-weight:900;color:var(--s600)">9</div><div style="font-size:11px;color:var(--s500)">Telah Selesai</div></div>
      </div>
    </div>
    <div class="stat"><div style="font-weight:700;font-size:15px;margin-bottom:14px">👥 Pertumbuhan Pengguna</div>
      <div style="font-size:13.5px;color:var(--s600);line-height:2.2">
        <div style="display:flex;justify-content:space-between"><span>Total Pengguna Terdaftar</span><span class="fw8">524</span></div>
        <div style="display:flex;justify-content:space-between"><span>Pertumbuhan Pengguna Baru</span><span class="fw8 tg">+38 Minggu Ini</span></div>
        <div style="display:flex;justify-content:space-between"><span>Praktisi Aktif On-Duty</span><span class="fw8">6 Pakar</span></div>
      </div>
    </div>
  </div>

  <div class="stat mb4">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
      <div style="font-weight:700;font-size:15px">🕐 Transaksi &amp; Booking Terbaru</div>
      <a href="konsultasi.html" class="btn btn-o btn-sm">Buka Semua Data &rarr;</a>
    </div>
    <div class="tw">
      <table id="mainTable">
        <thead><tr><th>#Kode</th><th>Nama Klien</th><th>Layanan</th><th>Praktisi</th><th>Waktu</th><th>Metode</th><th>Nominal</th><th>Status</th><th>Aksi</th></tr></thead>
        <tbody>
          <tr><td class="txs tm">#BK-0052</td><td><div class="fw7">Ahmad Fauzi</div></td><td>Konsultasi Online</td><td>Dr. Budi Santoso</td><td>Hari ini, 14.00</td><td>QRIS</td><td>Rp 150.000</td><td class="status-cell"><span class="sts sts-c">Confirmed</span></td><td><a href="konsultasi.html" class="btn btn-g btn-sm">Detail</a></td></tr>
          <tr><td class="txs tm">#KJ-0015</td><td><div class="fw7">Siti Aminah</div></td><td>Kunjungan Kebun</td><td>Ir. Rudi Hartono</td><td>Besok, 09.00</td><td>BCA VA</td><td>Rp 600.000</td><td class="status-cell"><span class="sts sts-p">Pending</span></td><td><button type="button" onclick="confirmBooking(this,'#')" class="btn btn-g btn-sm">Konfirmasi</button></td></tr>
          <tr><td class="txs tm">#NS-0008</td><td><div class="fw7">Poktan Maju</div></td><td>Undang Narsum</td><td>Prof. Ahmad Fauzi</td><td>10 Okt 2026</td><td>BNI VA</td><td>Rp 4.000.000</td><td class="status-cell"><span class="sts sts-p">Pending</span></td><td><a href="narsum.html" class="btn btn-g btn-sm">Verifikasi</a></td></tr>
        </tbody>
      </table>
    </div>
  </div>
</div></div></div>
<script src="../../js/app.js"></script></body></html>"""
write_file("pages/admin/dashboard.html", adm_dash_pg)

# ADMIN KONSULTASI
adm_konsultasi_pg = head("Admin Konsultasi","../../") + f"""<body>
<div class="adm-lay">
{adm_sidebar("konsultasi.html")}
<div class="adm-main">
{adm_top("💬 Manajemen Booking Konsultasi", '<button type="button" onclick="openModal(\'linkModal\')" class="btn btn-g btn-sm">+ Set Link Jitsi</button>')}
<div class="adm-body">
  <div style="display:flex;gap:12px;margin-bottom:20px;flex-wrap:wrap;align-items:center">
    <input type="text" id="searchInput" class="fc" placeholder="🔍 Cari nama klien atau kode booking..." style="max-width:320px">
    <select class="fc" style="max-width:160px" onchange="filterTableByCol(this, 7)">
      <option value="">Semua Status</option>
      <option value="confirmed">Confirmed</option>
      <option value="pending">Pending</option>
      <option value="selesai">Selesai</option>
    </select>
  </div>
  <div class="tw">
    <table id="mainTable">
      <thead><tr><th>#Kode</th><th>Klien</th><th>Praktisi Ahli</th><th>Keluhan</th><th>Jadwal</th><th>Metode</th><th>Biaya</th><th>Status</th><th>Aksi</th></tr></thead>
      <tbody>
        <tr><td class="txs tm">#BK-0052</td><td><div class="fw7">Ahmad Fauzi</div><div class="txs tm">ahmad@mail.com</div></td><td>Dr. Budi Santoso</td><td>Kutu kebul pada cabai</td><td>1 Okt, 14.00</td><td>QRIS</td><td class="fw7">Rp 150.000</td><td class="status-cell"><span class="sts sts-c">Confirmed</span></td><td style="display:flex;gap:4px"><button type="button" onclick="openModal('linkModal')" class="btn btn-g btn-sm">🔗 Link</button></td></tr>
        <tr><td class="txs tm">#BK-0051</td><td><div class="fw7">Siti Aminah</div><div class="txs tm">siti@mail.com</div></td><td>Ir. Siti Rahayu</td><td>Daun menguning</td><td>30 Sep, 10.00</td><td>BCA VA</td><td class="fw7">Rp 120.000</td><td class="status-cell"><span class="sts sts-d">Selesai</span></td><td><span class="tsm tm">Selesai</span></td></tr>
        <tr><td class="txs tm">#BK-0050</td><td><div class="fw7">Budi Hartono</div><div class="txs tm">budi@mail.com</div></td><td>Prof. Ahmad Fauzi</td><td>Pupuk hidroponik</td><td>2 Okt, 09.00</td><td>BNI VA</td><td class="fw7">Rp 200.000</td><td class="status-cell"><span class="sts sts-p">Pending</span></td><td style="display:flex;gap:4px"><button type="button" onclick="confirmBooking(this,'https://meet.jit.si/hallobun-bk50')" class="btn btn-g btn-sm">✓ Konfirmasi</button></td></tr>
      </tbody>
    </table>
  </div>
</div></div></div>

<div class="mo" id="linkModal">
  <div class="mo-box">
    <button class="mo-close" onclick="closeModal('linkModal')">✕</button>
    <div style="font-weight:800;font-size:18px;margin-bottom:16px">🔗 Tentukan Tautan Jitsi Meet</div>
    <div class="fg"><label class="fl">Kode Booking</label><input type="text" class="fc" value="#BK-0052" readonly></div>
    <div class="fg"><label class="fl">Tautan Ruang Video Call</label><input type="text" class="fc" id="j_link" value="https://meet.jit.si/hallobun-bk0052"></div>
    <div class="alert al-in mb4 tsm">Tautan akan otomatis terkirim ke WhatsApp pengguna setelah disimpan.</div>
    <button type="button" onclick="toast('Tautan Jitsi berhasil disimpan & dikirim ke WhatsApp user!','ok');closeModal('linkModal');" class="btn btn-g w100">Kirim Link ke Pengguna</button>
  </div>
</div>
<script src="../../js/app.js"></script>
<script>
function filterTableByCol(sel, colIdx){{
  var v=sel.value.toLowerCase();
  document.querySelectorAll("#mainTable tbody tr").forEach(function(r){{
    r.style.display=(!v||r.cells[colIdx].textContent.toLowerCase().includes(v))?"":"none";
  }});
}}
</script></body></html>"""
write_file("pages/admin/konsultasi.html", adm_konsultasi_pg)

# ADMIN KUNJUNGAN
adm_kunjungan_pg = head("Admin Kunjungan","../../") + f"""<body>
<div class="adm-lay">
{adm_sidebar("kunjungan.html")}
<div class="adm-main">
{adm_top("🚜 Manajemen Permintaan Kunjungan Lahan")}
<div class="adm-body">
  <div style="display:flex;gap:12px;margin-bottom:20px;flex-wrap:wrap">
    <input type="text" id="searchInput" class="fc" placeholder="🔍 Cari pemohon, kota, atau jenis komoditas..." style="max-width:320px">
  </div>
  <div class="tw">
    <table id="mainTable">
      <thead><tr><th>#Kode</th><th>Pemohon</th><th>Lokasi Lahan</th><th>Komoditas</th><th>Luas</th><th>Jadwal Request</th><th>Status</th><th>Aksi</th></tr></thead>
      <tbody>
        <tr><td class="txs tm">#KJ-0015</td><td><div class="fw7">Siti Aminah</div><div class="txs tm">0814-xxxx-xxxx</div></td><td>Cibodas, Bogor</td><td>Cabai &amp; Tomat</td><td>1.500 m²</td><td>2 Okt 2026</td><td class="status-cell"><span class="sts sts-p">Pending</span></td><td><button type="button" onclick="this.closest('tr').querySelector('.status-cell').innerHTML='<span class=&quot;sts sts-c&quot;>Scheduled</span>';toast('Kunjungan dijadwalkan! Surat tugas dibuat.','ok')" class="btn btn-g btn-sm">Jadwalkan</button></td></tr>
        <tr><td class="txs tm">#KJ-0014</td><td><div class="fw7">H. Ahmad Syafi'i</div><div class="txs tm">0812-xxxx-xxxx</div></td><td>Pakis, Malang</td><td>Melon &amp; Sayur</td><td>2 Hektar</td><td>25 Sep 2026</td><td class="status-cell"><span class="sts sts-d">Selesai</span></td><td><span class="tsm tm">Laporan Siap</span></td></tr>
      </tbody>
    </table>
  </div>
</div></div></div>
<script src="../../js/app.js"></script></body></html>"""
write_file("pages/admin/kunjungan.html", adm_kunjungan_pg)

# ADMIN NARSUM
adm_narsum_pg = head("Admin Narasumber","../../") + f"""<body>
<div class="adm-lay">
{adm_sidebar("narsum.html")}
<div class="adm-main">
{adm_top("🎤 Manajemen Undangan Narasumber")}
<div class="adm-body">
  <div style="display:flex;gap:12px;margin-bottom:20px;flex-wrap:wrap">
    <input type="text" id="searchInput" class="fc" placeholder="🔍 Cari nama kegiatan atau lembaga..." style="max-width:320px">
  </div>
  <div class="tw">
    <table id="mainTable">
      <thead><tr><th>#Kode</th><th>Lembaga Penyelenggara</th><th>Acara &amp; Format</th><th>Topik Pembahasan</th><th>Tanggal</th><th>Peserta</th><th>Status</th><th>Aksi</th></tr></thead>
      <tbody>
        <tr><td class="txs tm">#NS-0008</td><td><div class="fw7">Poktan Maju Mandiri</div><div class="txs tm">Budi - 0812-xxxx</div></td><td>Bimtek PHT / Offline</td><td>Pengendalian Hama Organik</td><td>10 Okt 2026</td><td>80 Orang</td><td class="status-cell"><span class="sts sts-p">Pending</span></td><td><button type="button" onclick="this.closest('tr').querySelector('.status-cell').innerHTML='<span class=&quot;sts sts-c&quot;>Disetujui</span>';toast('Undangan narasumber disetujui!','ok')" class="btn btn-g btn-sm">✓ Setujui</button></td></tr>
        <tr><td class="txs tm">#NS-0007</td><td><div class="fw7">Fakultas Pertanian</div><div class="txs tm">Dr. Hendra - 0813-xxxx</div></td><td>Kuliah Umum / Online</td><td>Modern Agronomy &amp; IoT</td><td>20 Sep 2026</td><td>150 Orang</td><td class="status-cell"><span class="sts sts-d">Selesai</span></td><td><span class="tsm tm">Arsip</span></td></tr>
      </tbody>
    </table>
  </div>
</div></div></div>
<script src="../../js/app.js"></script></body></html>"""
write_file("pages/admin/narsum.html", adm_narsum_pg)

# ADMIN SARANA
prod_rows_adm = "".join(f"""<tr>
  <td><img src="../../images/{p['img']}" style="width:48px;height:48px;border-radius:8px;object-fit:cover"></td>
  <td><div class="fw7">{p['nama']}</div><div class="txs tm">{p['deskripsi'][:45]}...</div></td>
  <td><span class="bdg bdg-g" style="font-size:11px">{p['kategori']}</span></td>
  <td class="fw7">Rp {p['harga']}</td>
  <td>{badge_stok(p['stok'])}</td>
  <td>{"✅ Ya" if p['featured'] else "—"}</td>
  <td style="display:flex;gap:4px">
    <button type="button" class="btn btn-o btn-sm" onclick="toast('Fitur edit produk dibuka dalam modal','in')">Edit</button>
    <button type="button" class="btn btn-red btn-sm" onclick="this.closest('tr').remove();toast('Produk berhasil dihapus','ok')">Hapus</button>
  </td>
</tr>""" for p in PRODUK)

adm_sarana_pg = head("Admin Sarana Tani","../../") + f"""<body>
<div class="adm-lay">
{adm_sidebar("sarana.html")}
<div class="adm-main">
{adm_top("🌿 Katalog &amp; Stok Sarana Tani", '<button type="button" onclick="openModal(\'addProdModal\')" class="btn btn-g btn-sm">+ Tambah Produk</button>')}
<div class="adm-body">
  <div style="display:flex;gap:12px;margin-bottom:20px;flex-wrap:wrap">
    <input type="text" id="searchInput" class="fc" placeholder="🔍 Cari nama sarana tani..." style="max-width:300px">
  </div>
  <div class="tw">
    <table id="mainTable">
      <thead><tr><th>Foto</th><th>Nama Produk</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Unggulan</th><th>Aksi</th></tr></thead>
      <tbody>{prod_rows_adm}</tbody>
    </table>
  </div>
</div></div></div>

<div class="mo" id="addProdModal">
  <div class="mo-box">
    <button class="mo-close" onclick="closeModal('addProdModal')">✕</button>
    <div style="font-weight:800;font-size:18px;margin-bottom:18px">+ Tambah Sarana Tani Baru</div>
    <div class="fg"><label class="fl">Nama Produk <span style="color:var(--g)">*</span></label><input type="text" class="fc" id="np_name" placeholder="Contoh: Pupuk Kompos Organik Super 10Kg"></div>
    <div class="grid g2" style="gap:12px">
      <div class="fg"><label class="fl">Kategori</label><select class="fc" id="np_kat"><option>Bibit</option><option>Pupuk</option><option>Pestisida</option><option>Nutrisi</option><option>Alat</option></select></div>
      <div class="fg"><label class="fl">Harga (Rp) <span style="color:var(--g)">*</span></label><input type="number" class="fc" id="np_price" placeholder="75000"></div>
    </div>
    <div class="fg"><label class="fl">Jumlah Stok</label><input type="number" class="fc" id="np_stock" value="50"></div>
    <button type="button" onclick="toast('Produk baru berhasil disimpan ke katalog!','ok');closeModal('addProdModal');" class="btn btn-g w100">Simpan Produk</button>
  </div>
</div>
<script src="../../js/app.js"></script></body></html>"""
write_file("pages/admin/sarana.html", adm_sarana_pg)

# ADMIN USERS
adm_users_pg = head("Admin Pengguna","../../") + f"""<body>
<div class="adm-lay">
{adm_sidebar("users.html")}
<div class="adm-main">
{adm_top("👥 Pengguna &amp; Akun Terdaftar", '<button type="button" onclick="openModal(\'addUserModal\')" class="btn btn-g btn-sm">+ Tambah Pengguna</button>')}
<div class="adm-body">
  <div style="display:flex;gap:12px;margin-bottom:20px;flex-wrap:wrap">
    <input type="text" id="searchInput" class="fc" placeholder="🔍 Cari nama atau email user..." style="max-width:320px">
  </div>
  <div class="tw">
    <table id="mainTable">
      <thead><tr><th>#</th><th>Nama Lengkap</th><th>Email</th><th>No. WhatsApp</th><th>Peran</th><th>Terdaftar</th><th>Status</th><th>Aksi</th></tr></thead>
      <tbody>
        <tr><td>1</td><td class="fw7">Budi Santoso</td><td>budi@petani.com</td><td>0812-3456-7890</td><td><span class="bdg bdg-s">Pekebun</span></td><td>1 Okt 2026</td><td><span class="sts sts-c">Aktif</span></td><td><button type="button" class="btn btn-o btn-sm">Edit</button></td></tr>
        <tr><td>2</td><td class="fw7">Dr. Budi Santoso, M.Si</td><td>dr.budi@hallobun.com</td><td>0813-5678-9012</td><td><span class="bdg bdg-g">Praktisi</span></td><td>15 Sep 2026</td><td><span class="sts sts-c">Aktif</span></td><td><button type="button" class="btn btn-o btn-sm">Edit</button></td></tr>
        <tr><td>3</td><td class="fw7">Administrator</td><td>admin@hallobun.com</td><td>0811-2222-3333</td><td><span class="bdg bdg-b">Admin Utama</span></td><td>1 Sep 2026</td><td><span class="sts sts-c">Aktif</span></td><td><button type="button" class="btn btn-o btn-sm">Edit</button></td></tr>
      </tbody>
    </table>
  </div>
</div></div></div>

<div class="mo" id="addUserModal">
  <div class="mo-box">
    <button class="mo-close" onclick="closeModal('addUserModal')">✕</button>
    <div style="font-weight:800;font-size:18px;margin-bottom:18px">+ Tambah Akun Pengguna</div>
    <div class="fg"><label class="fl">Nama Lengkap</label><input type="text" class="fc" placeholder="Nama user"></div>
    <div class="fg"><label class="fl">Email</label><input type="email" class="fc" placeholder="user@contoh.com"></div>
    <div class="fg"><label class="fl">Peran</label><select class="fc"><option>Pengguna / Pekebun</option><option>Praktisi Agronom</option><option>Administrator</option></select></div>
    <button type="button" onclick="toast('Akun berhasil dibuat dan notifikasi dikirimkan!','ok');closeModal('addUserModal');" class="btn btn-g w100">Simpan Akun</button>
  </div>
</div>
<script src="../../js/app.js"></script></body></html>"""
write_file("pages/admin/users.html", adm_users_pg)

# ADMIN PRAKTISI
pk_cards_adm = "".join(f"""<div class="stat" style="text-align:center">
  <img src="../../images/{p['img']}" style="width:84px;height:84px;border-radius:50%;object-fit:cover;margin:0 auto 12px;border:3px solid var(--gl)">
  <div class="fw8" style="font-size:16px;color:var(--s900)">{p['name']}</div>
  <div class="tsm tm mb2">🌿 {p['spesialisasi']}</div>
  <div class="mb4"><span class="sts sts-c">Aktif Bertugas</span></div>
  <div style="font-size:13px;color:var(--s600);margin-bottom:14px;line-height:1.9">
    <div>Tarif: <strong class="tg">Rp {p['harga']}/sesi</strong></div>
    <div>Rating: <strong>⭐ {p['rating']}</strong> ({p['sesi']} sesi)</div>
  </div>
  <div style="display:flex;gap:8px;justify-content:center">
    <button type="button" onclick="toast('Membuka formulir jadwal praktisi','in')" class="btn btn-o btn-sm">Edit Roster</button>
    <button type="button" onclick="this.closest('.stat').querySelector('.sts').className='sts sts-x';this.closest('.stat').querySelector('.sts').textContent='Cuti';toast('Status praktisi diubah ke Cuti','wa')" class="btn btn-red btn-sm">Cuti</button>
  </div>
</div>""" for p in KONSULTANS)

adm_praktisi_pg = head("Admin Praktisi","../../") + f"""<body>
<div class="adm-lay">
{adm_sidebar("praktisi.html")}
<div class="adm-main">
{adm_top("🌾 Manajemen Praktisi Agronom", '<button type="button" onclick="toast(\'Formulir pendaftaran mitra praktisi baru\',\'in\')" class="btn btn-g btn-sm">+ Rekrut Praktisi</button>')}
<div class="adm-body">
  <div class="grid g3 mb4">{pk_cards_adm}</div>
</div></div></div>
<script src="../../js/app.js"></script></body></html>"""
write_file("pages/admin/praktisi.html", adm_praktisi_pg)

# ADMIN PAYMENTS
pay_rows = [
    ("#BK-0052","Ahmad Fauzi","Konsultasi Online","QRIS","150.000","Hari ini, 13:45","sts-c","Sukses"),
    ("#KJ-0015","Siti Aminah","Kunjungan Lahan","BCA VA","600.000","Kemarin, 10:12","sts-c","Sukses"),
    ("#NS-0008","Poktan Maju","Narsum Bimtek","BNI VA","2.500.000","29 Sep, 15:30","sts-p","Pending"),
    ("#BK-0051","Dewi Lestari","Konsultasi Online","QRIS","160.000","28 Sep, 09:00","sts-c","Sukses"),
    ("#BK-0050","Rudi Hartono","Konsultasi Online","Mandiri VA","175.000","27 Sep, 11:00","sts-x","Gagal"),
]
pay_tbody = "".join(f"""<tr>
  <td><div class="fw7 txs">MID-{r[0].replace('#','')}</div><div class="txs tm">{r[0]}</div></td>
  <td>{r[1]}</td><td>{r[2]}</td>
  <td><span class="bdg {'bdg-g' if r[3]=='QRIS' else 'bdg-b'}" style="font-size:11px">{r[3]}</span></td>
  <td class="fw7">Rp {r[4]}</td>
  <td class="tsm tm">{r[5]}</td>
  <td class="status-cell"><span class="sts {r[6]}">{r[7]}</span></td>
</tr>""" for r in pay_rows)

adm_payments_pg = head("Admin Pembayaran","../../") + f"""<body>
<div class="adm-lay">
{adm_sidebar("payments.html")}
<div class="adm-main">
{adm_top("💳 Manajemen Transaksi &amp; Pembayaran")}
<div class="adm-body">
  <div class="grid g4 mb6">
    <div class="stat"><div style="font-size:22px;margin-bottom:4px">💰</div><div class="sv tg">18.4jt</div><div class="sl">Omzet Bulan Ini</div></div>
    <div class="stat"><div style="font-size:22px;margin-bottom:4px">✅</div><div class="sv">47</div><div class="sl">Transaksi Sukses</div></div>
    <div class="stat"><div style="font-size:22px;margin-bottom:4px">⏳</div><div class="sv" style="color:#F59E0B">5</div><div class="sl">Menunggu Bayar</div></div>
    <div class="stat"><div style="font-size:22px;margin-bottom:4px">❌</div><div class="sv" style="color:#EF4444">2</div><div class="sl">Kedaluwarsa</div></div>
  </div>
  <div class="tw">
    <table id="mainTable">
      <thead><tr><th>Order ID</th><th>Nama Pengguna</th><th>Layanan</th><th>Metode Bayar</th><th>Nominal</th><th>Waktu</th><th>Status</th></tr></thead>
      <tbody>{pay_tbody}</tbody>
    </table>
  </div>
</div></div></div>
<script src="../../js/app.js"></script></body></html>"""
write_file("pages/admin/payments.html", adm_payments_pg)

print("Auth and Admin pages generated successfully.")
