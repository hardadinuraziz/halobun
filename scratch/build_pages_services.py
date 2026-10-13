import os, sys
sys.path.append("/Users/as-saifi/Downloads/hallobun/scratch")
from data import KONSULTANS, PRODUK, LAYANAN
from templates import head, nav, footer

BASE = "/Users/as-saifi/Downloads/hallobun-static"

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
# 1. LAYANAN.HTML
# ══════════════════════════════════════════
layanan_cards = ""
for l in LAYANAN:
    feat = "".join(f'<li style="display:flex;align-items:flex-start;gap:8px;margin-bottom:8px"><span style="color:var(--g);font-weight:700;flex-shrink:0">✓</span><span>{f}</span></li>' for f in l["features"])
    layanan_cards += f"""<div class="layanan-card" id="{l['id']}">
  <div style="display:flex;gap:20px;align-items:flex-start;flex-wrap:wrap">
    <div style="width:64px;height:64px;border-radius:16px;background:{l['color']}20;display:flex;align-items:center;justify-content:center;font-size:32px;flex-shrink:0">{l['icon']}</div>
    <div style="flex:1;min-width:200px">
      <div class="bdg mb2" style="background:{l['color']}20;color:{l['color']};border-color:{l['color']}40;font-size:11px">{l['badge']}</div>
      <h3 style="font-size:20px;font-weight:800;color:var(--s900);margin-bottom:8px">{l['title']}</h3>
      <p style="font-size:14px;color:var(--s500);line-height:1.7;margin-bottom:16px">{l['desc']}</p>
      <ul style="list-style:none;font-size:13.5px;color:var(--s600);margin-bottom:20px">{feat}</ul>
      <a href="{l['url']}" class="btn btn-g">{l['cta']} →</a>
    </div>
  </div>
</div>"""

layanan_pg = head("Semua Layanan Hallobun","../") + nav("../","Layanan") + f"""
<div class="ph"><div class="ph-inner">
  <div class="hero-tag"><span class="dot"></span> 7 Pilar Layanan Tele-Agronomi</div>
  <h1>🌾 Layanan Komprehensif Hallobun</h1>
  <p>Dari konsultasi online hingga kunjungan lahan fisik, Hallobun hadir sebagai mitra agronomi lengkap untuk kebun dan pertanian Anda di seluruh Indonesia.</p>
</div></div>
<section class="sec"><div class="con">
  <div style="display:flex;flex-direction:column;gap:20px">{layanan_cards}</div>
  <div style="margin-top:40px;background:linear-gradient(135deg,var(--gx),var(--g));border-radius:20px;padding:40px;text-align:center;color:#fff">
    <div style="font-size:26px;font-weight:800;margin-bottom:10px">🤝 Butuh Paket Layanan Khusus?</div>
    <p style="opacity:.85;margin-bottom:24px;font-size:15px;max-width:540px;margin-left:auto;margin-right:auto">Kami menyediakan paket kustom untuk perusahaan agribisnis, dinas pemerintah, komunitas tani, dan program CSR korporasi.</p>
    <a href="https://wa.me/6281234567890?text=Halo%20Hallobun,%20saya%20ingin%20diskusi%20paket%20layanan%20khusus" target="_blank" class="btn btn-w btn-lg">Diskusikan via WhatsApp CS</a>
  </div>
</div></section>
""" + footer("../") + "</body></html>"
write_file("pages/layanan.html", layanan_pg)

# ══════════════════════════════════════════
# 2. KONSULTASI.HTML (Directory)
# ══════════════════════════════════════════
spesialisasi_opts = "".join(f'<option value="{p["spesialisasi"].lower()}">{p["spesialisasi"]}</option>' for p in KONSULTANS)
pk_grid = ""
for p in KONSULTANS:
    pk_grid += f"""<div class="pk-card filterable-card" data-spesialisasi="{p['spesialisasi'].lower()}" data-harga="{p['harga'].replace('.','')}" data-id="{p['id']}">
  <img src="../images/{p['img']}" alt="{p['name']}">
  <div class="pk-b">
    <div class="pk-name">{p['name']}</div>
    <div class="pk-spec">🌿 {p['spesialisasi']}</div>
    <div style="font-size:12px;color:var(--s500);margin-bottom:6px">🕐 {p['jadwal']}</div>
    <div style="font-size:12px;color:var(--s500);margin-bottom:10px">📋 {p['pengalaman']} pengalaman</div>
    <div class="pk-ft">
      <div class="price">Rp {p['harga']}<span>/sesi</span></div>
      <div class="rating"><span class="star">⭐</span> {p['rating']} ({p['sesi']})</div>
    </div>
    <a href="konsultan-{p['id']}.html" class="btn btn-g w100 mt4" style="justify-content:center">Lihat Profil &amp; Booking</a>
  </div>
</div>"""

konsultasi = head("Konsultasi Agronom Online","../","Pilih dan booking sesi konsultasi online dengan pakar agronom bersertifikasi.") + nav("../","Konsultasi") + f"""
<div class="ph"><div class="ph-inner">
  <div class="hero-tag"><span class="dot"></span> Konsultasi Online via Jitsi Meet</div>
  <h1>💬 Konsultasi Agronom Online</h1>
  <p>Pilih praktisi ahli dan booking sesi video call tatap muka. Konsultasikan diagnosa hama, penyakit daun, formulasi pupuk, dan nutrisi tanaman langsung dengan pakar bersertifikasi.</p>
</div></div>

<section class="sec"><div class="con">
  <div style="background:#fff;border:1.5px solid var(--s200);border-radius:14px;padding:18px;margin-bottom:28px;display:flex;gap:12px;flex-wrap:wrap;align-items:center">
    <div style="position:relative;flex:1;min-width:220px">
      <svg style="position:absolute;left:12px;top:50%;transform:translateY(-50%)" width="16" height="16" fill="none" stroke="#9CA3AF" stroke-width="2.2" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
      <input type="text" id="searchCards" class="fc" placeholder="Cari nama atau masalah hama..." style="padding-left:38px">
    </div>
    <select class="fc" id="filterSpesialisasi" style="max-width:240px">
      <option value="">Semua Spesialisasi</option>
      {spesialisasi_opts}
    </select>
    <select class="fc" id="filterHarga" style="max-width:200px">
      <option value="">Semua Tarif</option>
      <option value="150000">&le; Rp 150.000</option>
      <option value="200000">&gt; Rp 150.000</option>
    </select>
  </div>
  <div class="grid g3" id="konsultanGrid">{pk_grid}</div>
  <div class="alert al-in mt6">💡 Butuh rekomendasi praktisi yang cocok dengan komoditas Anda? <a href="https://wa.me/6281234567890?text=Halo%20CS,%20saya%20butuh%20rekomendasi%20praktisi%20untuk..." target="_blank" style="font-weight:700">Hubungi WhatsApp CS Kami &rarr;</a></div>
</div></section>
""" + footer("../") + """<script>
filterCards("searchCards","filterable-card");
document.getElementById("filterSpesialisasi").addEventListener("change",function(){
  var v=this.value.toLowerCase();
  document.querySelectorAll(".filterable-card").forEach(function(c){
    c.style.display=(!v||c.getAttribute("data-spesialisasi").includes(v))?"":"none";
  });
});
document.getElementById("filterHarga").addEventListener("change",function(){
  var v=this.value;
  document.querySelectorAll(".filterable-card").forEach(function(c){
    if(!v){c.style.display="";return;}
    var h=parseInt(c.getAttribute("data-harga"));
    if(v==="150000"){c.style.display=h<=150000?"":"none";}
    else if(v==="200000"){c.style.display=h>150000?"":"none";}
  });
});
</script></body></html>"""
write_file("pages/konsultasi.html", konsultasi)

# ══════════════════════════════════════════
# 3. KONSULTAN DETAIL PAGES (1-6)
# ══════════════════════════════════════════
JADWAL_SLOTS = [
    {"id":1,"hari":"Senin","tanggal":"6 Okt 2026","jam":"08.00 – 09.00 WIB"},
    {"id":2,"hari":"Senin","tanggal":"6 Okt 2026","jam":"10.00 – 11.00 WIB"},
    {"id":3,"hari":"Selasa","tanggal":"7 Okt 2026","jam":"08.00 – 09.00 WIB"},
    {"id":4,"hari":"Selasa","tanggal":"7 Okt 2026","jam":"14.00 – 15.00 WIB"},
    {"id":5,"hari":"Rabu","tanggal":"8 Okt 2026","jam":"09.00 – 10.00 WIB"},
    {"id":6,"hari":"Kamis","tanggal":"9 Okt 2026","jam":"10.00 – 11.00 WIB"},
]

for p in KONSULTANS:
    slots_html = "".join(f"""<button type="button" class="slot" data-id="{j['id']}" onclick="selectSlot(this)" style="padding:12px 14px;border:1.5px solid var(--s200);border-radius:10px;background:#fff;cursor:pointer;text-align:left;transition:all .18s;font-family:inherit">
  <div style="font-weight:700;font-size:13px;color:var(--s800)">{j['hari']}, {j['tanggal']}</div>
  <div style="font-size:12px;color:var(--s500)">🕐 {j['jam']}</div>
</button>""" for j in JADWAL_SLOTS)

    detail_pg = head(f"{p['name']} — Profil & Booking","../") + nav("../","Konsultasi") + f"""
<section style="background:var(--s50);padding:36px 24px;border-bottom:1px solid var(--s200)">
  <div class="con">
    <div style="display:flex;gap:28px;align-items:flex-start;flex-wrap:wrap">
      <img src="../images/{p['img']}" alt="{p['name']}" style="width:140px;height:140px;border-radius:16px;object-fit:cover;border:3px solid #fff;box-shadow:var(--shd);flex-shrink:0">
      <div style="flex:1;min-width:240px">
        <div class="bdg bdg-g mb2">🟢 Praktisi Aktif</div>
        <h1 style="font-size:26px;font-weight:900;color:var(--s900);margin-bottom:4px">{p['name']}</h1>
        <div style="color:var(--s500);margin-bottom:10px">🌿 {p['spesialisasi']} · {p['pengalaman']} pengalaman</div>
        <div style="display:flex;flex-wrap:wrap;gap:16px;font-size:14px;color:var(--s600)">
          <span>⭐ <strong>{p['rating']}</strong> rating</span>
          <span>📋 <strong>{p['sesi']}</strong> sesi selesai</span>
          <span>🕐 {p['jadwal']}</span>
        </div>
        <div style="margin-top:14px;font-size:14px;color:var(--s600);line-height:1.7">{p['bio']}</div>
      </div>
      <div style="background:#fff;border:1.5px solid var(--s200);border-radius:14px;padding:22px;min-width:220px;flex-shrink:0;text-align:center">
        <div style="font-size:24px;font-weight:900;color:var(--g)">Rp {p['harga']}</div>
        <div style="font-size:12px;color:var(--s400);margin-bottom:16px">per sesi (60 menit)</div>
        <a href="#booking-form" class="btn btn-g w100">Booking Konsultasi</a>
        <div style="margin-top:10px;font-size:12px;color:var(--s400)">Bayar QRIS / Transfer Bank</div>
      </div>
    </div>
  </div>
</section>

<section class="sec" id="booking-form"><div class="con">
  <div class="grid g2" style="gap:36px;align-items:start">
    <div>
      <div style="font-weight:800;font-size:20px;color:var(--s900);margin-bottom:16px">📅 1. Pilih Jadwal Sesi Tersedia</div>
      <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:10px;margin-bottom:24px">
        {slots_html}
      </div>
      <input type="hidden" id="jadwal_id" value="">

      <div style="font-weight:800;font-size:18px;color:var(--s900);margin-bottom:14px">📝 2. Detail Masalah Tanaman</div>
      <div class="fg"><label class="fl">Deskripsi Keluhan <span style="color:var(--g)">*</span></label>
        <textarea id="keluhan" class="fc" rows="4" placeholder="Ceritakan detail masalah tanaman Anda: nama tanaman, usia tanam, gejala (daun kuning, bercak, layu), dan tindakan yang sudah pernah dicoba..." required></textarea>
      </div>
      <div class="fg"><label class="fl">Foto Pendukung (Opsional)</label>
        <div style="border:2px dashed var(--s200);border-radius:10px;padding:18px;text-align:center;color:var(--s400);font-size:13px;cursor:pointer" onclick="toast('Upload foto berhasil disimulasikan (format JPG/PNG maks 5MB)','in')">
          📷 Klik untuk upload foto daun atau akar tanaman
        </div>
      </div>
      <button type="button" onclick="submitBooking()" class="btn btn-g btn-lg w100">Lanjut Bayar &amp; Dapatkan Link Video Call &rarr;</button>
    </div>

    <div>
      <div style="font-weight:800;font-size:18px;color:var(--s900);margin-bottom:14px">💳 3. Pilih Metode Pembayaran</div>
      <div class="card mb4"><div class="card-b">
        <div style="display:flex;flex-direction:column;gap:8px" id="payMethods">
          <label style="display:flex;align-items:center;gap:10px;padding:12px;border:1.5px solid var(--g);background:var(--gl);border-radius:10px;cursor:pointer" onclick="selectPay(this)">
            <input type="radio" name="pay" value="QRIS" checked style="accent-color:var(--g)"> <span style="font-size:20px">📱</span> <div><div class="fw7" style="font-size:13px">QRIS (Gopay, OVO, Dana, ShopeePay, BCA Mobile)</div><div class="txs tm">Verifikasi otomatis &bull; Biaya 0.7%</div></div>
          </label>
          <label style="display:flex;align-items:center;gap:10px;padding:12px;border:1.5px solid var(--s200);border-radius:10px;cursor:pointer" onclick="selectPay(this)">
            <input type="radio" name="pay" value="BCA Virtual Account" style="accent-color:var(--g)"> <span style="font-size:20px">🏦</span> <div><div class="fw7" style="font-size:13px">BCA Virtual Account</div><div class="txs tm">Bebas biaya admin</div></div>
          </label>
          <label style="display:flex;align-items:center;gap:10px;padding:12px;border:1.5px solid var(--s200);border-radius:10px;cursor:pointer" onclick="selectPay(this)">
            <input type="radio" name="pay" value="BNI Virtual Account" style="accent-color:var(--g)"> <span style="font-size:20px">🏦</span> <div><div class="fw7" style="font-size:13px">BNI Virtual Account</div><div class="txs tm">Bebas biaya admin</div></div>
          </label>
          <label style="display:flex;align-items:center;gap:10px;padding:12px;border:1.5px solid var(--s200);border-radius:10px;cursor:pointer" onclick="selectPay(this)">
            <input type="radio" name="pay" value="BRI Virtual Account" style="accent-color:var(--g)"> <span style="font-size:20px">🏦</span> <div><div class="fw7" style="font-size:13px">BRI Virtual Account</div><div class="txs tm">Bebas biaya admin</div></div>
          </label>
        </div>
      </div></div>

      <div class="card mb4"><div class="card-b">
        <div style="font-weight:700;margin-bottom:8px">📋 Ringkasan Pemesanan</div>
        <div style="font-size:13px;color:var(--s600);line-height:2">
          <div style="display:flex;justify-content:space-between"><span>Praktisi:</span><span class="fw7">{p['name']}</span></div>
          <div style="display:flex;justify-content:space-between"><span>Durasi:</span><span class="fw7">60 Menit</span></div>
          <div style="display:flex;justify-content:space-between"><span>Media:</span><span class="fw7">Jitsi Meet (Video 1-on-1)</span></div>
          <div style="display:flex;justify-content:space-between;border-top:1px solid var(--s100);padding-top:6px;margin-top:6px"><span>Total Biaya:</span><span class="fw9 tg" style="font-size:16px">Rp {p['harga']}</span></div>
        </div>
      </div></div>
    </div>
  </div>

  <div id="payStatus" style="display:none;margin-top:24px"></div>
  <div id="payOverlay" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.6);z-index:9998;align-items:center;justify-content:center">
    <div style="background:#fff;border-radius:18px;padding:36px;text-align:center;max-width:380px;width:90%;box-shadow:var(--shl)">
      <div style="font-size:48px;margin-bottom:12px;animation:spin 1s linear infinite">⏳</div>
      <div style="font-weight:800;font-size:18px;margin-bottom:6px">Menghubungkan ke Gateway Midtrans...</div>
      <p style="font-size:13px;color:var(--s500)">Menyiapkan invoice resmi QRIS / Virtual Account.</p>
    </div>
  </div>
</div></section>

<style>
.slot.sel{{border-color:var(--g)!important;background:var(--gl)!important;box-shadow:0 0 0 2px rgba(22,163,74,.2)}}
@keyframes spin{{to{{transform:rotate(360deg)}}}}
</style>
""" + footer("../") + f"""<script>
function selectPay(el){{
  document.querySelectorAll("#payMethods label").forEach(function(l){{l.style.borderColor="var(--s200)";l.style.background="#fff"}});
  el.style.borderColor="var(--g)";el.style.background="var(--gl)";
}}
function submitBooking(){{
  var jid=document.getElementById("jadwal_id").value;
  var kel=document.getElementById("keluhan").value;
  var pay=document.querySelector("input[name=pay]:checked");
  if(!jid){{toast("Pilih salah satu jadwal sesi yang tersedia","er");return;}}
  if(!kel.trim()){{toast("Tuliskan deskripsi keluhan tanaman Anda","er");return;}}
  simulatePayment(pay?pay.value:"QRIS");
}}
</script></body></html>"""
    write_file(f"pages/konsultan-{p['id']}.html", detail_pg)

# ══════════════════════════════════════════
# 4. KUNJUNGAN.HTML
# ══════════════════════════════════════════
konsultan_opts = '<option value="">Pilihkan praktisi terbaik untuk saya</option>' + "".join(f'<option value="{p["id"]}">{p["name"]} — {p["spesialisasi"]}</option>' for p in KONSULTANS)

kunjungan_pg = head("Kunjungan Lapangan & Inspeksi Kebun","../") + nav("../","Kunjungan") + f"""
<div class="ph"><div class="ph-inner">
  <div class="hero-tag"><span class="dot"></span> Kunjungan On-Site Langsung</div>
  <h1>🚜 Kunjungan Lapangan &amp; Survei Kebun</h1>
  <p>Praktisi dan agronomis kami hadir langsung ke lahan, greenhouse, atau pekarangan Anda untuk evaluasi fisik, uji keasaman pH tanah, dan menyusun SOP perawatan terpadu.</p>
</div></div>

<section class="sec-sm" style="background:var(--s50);border-bottom:1px solid var(--s200)">
  <div class="con"><div class="grid g4">
    <div class="card"><div class="card-b" style="text-align:center"><div style="font-size:28px;margin-bottom:8px">🌾</div><div style="font-weight:700;font-size:13px;color:var(--s900)">Analisa Lapangan</div><div style="font-size:12px;color:var(--s500)">Diagnosa hama &amp; gejala daun</div></div></div>
    <div class="card"><div class="card-b" style="text-align:center"><div style="font-size:28px;margin-bottom:8px">🔬</div><div style="font-weight:700;font-size:13px;color:var(--s900)">Uji Kesuburan</div><div style="font-size:12px;color:var(--s500)">Evaluasi fisik &amp; pH tanah</div></div></div>
    <div class="card"><div class="card-b" style="text-align:center"><div style="font-size:28px;margin-bottom:8px">🌱</div><div style="font-weight:700;font-size:13px;color:var(--s900)">Solusi Tepat Guna</div><div style="font-size:12px;color:var(--s500)">Rekomendasi ramah lingkungan</div></div></div>
    <div class="card"><div class="card-b" style="text-align:center"><div style="font-size:28px;margin-bottom:8px">📋</div><div style="font-weight:700;font-size:13px;color:var(--s900)">Panduan Tertulis</div><div style="font-size:12px;color:var(--s500)">Laporan &amp; SOP pasca survei</div></div></div>
  </div></div>
</section>

<section class="sec"><div class="con" style="max-width:768px">
  <div style="background:#fff;border:1.5px solid var(--s200);border-radius:16px;padding:32px;box-shadow:var(--shd)">
    <h2 style="font-size:20px;font-weight:800;color:var(--s900);margin-bottom:6px">Formulir Pemesanan Kunjungan Kebun</h2>
    <p class="tsm" style="color:var(--s500);margin-bottom:24px">Tim kami akan mengonfirmasi rincian akomodasi, biaya transparan, dan jadwal praktisi via WhatsApp dalam 1×24 jam.</p>

    <div class="fg"><label class="fl">Pilih Praktisi Ahli (Opsional)</label>
      <select class="fc" id="kv_konsultan">{konsultan_opts}</select>
    </div>
    <div class="grid g2" style="gap:12px">
      <div class="fg"><label class="fl">Nama Pemilik Lahan <span style="color:var(--g)">*</span></label><input type="text" class="fc" id="kv_nama" placeholder="Contoh: Budi Santoso"></div>
      <div class="fg"><label class="fl">No. WhatsApp <span style="color:var(--g)">*</span></label><input type="tel" class="fc" id="kv_wa" placeholder="08xx-xxxx-xxxx"></div>
    </div>
    <div class="grid g2" style="gap:12px">
      <div class="fg"><label class="fl">Tanggal Kunjungan <span style="color:var(--g)">*</span></label><input type="date" class="fc" id="kv_tanggal" min="2026-10-03"></div>
      <div class="fg"><label class="fl">Jam Kunjungan</label><input type="time" class="fc" id="kv_jam" value="09:00"></div>
    </div>
    <div class="fg"><label class="fl">Alamat Lengkap Lahan <span style="color:var(--g)">*</span></label>
      <textarea class="fc" id="kv_alamat" rows="3" placeholder="Jl. Raya Perkebunan No. 12, Desa Maju, Kecamatan..."></textarea>
    </div>
    <div class="grid g2" style="gap:12px">
      <div class="fg"><label class="fl">Kota / Kabupaten <span style="color:var(--g)">*</span></label><input type="text" class="fc" id="kv_kota" placeholder="Contoh: Tasikmalaya / Bogor"></div>
      <div class="fg"><label class="fl">Provinsi</label><input type="text" class="fc" id="kv_provinsi" placeholder="Contoh: Jawa Barat"></div>
    </div>
    <div class="fg"><label class="fl">Jenis Tanaman / Komoditas <span style="color:var(--g)">*</span></label>
      <input type="text" class="fc" id="kv_tanaman" placeholder="Contoh: Cabai Rawit, Melon Hidroponik, Padi, atau Alpukat">
    </div>
    <div class="grid g2" style="gap:12px">
      <div class="fg"><label class="fl">Luas Lahan</label><input type="number" class="fc" id="kv_luas" step="0.1" min="0" placeholder="1000"></div>
      <div class="fg"><label class="fl">Satuan</label>
        <select class="fc" id="kv_satuan"><option value="m2">Meter Persegi (m²)</option><option value="hektar">Hektar</option><option value="are">Are</option></select>
      </div>
    </div>
    <div class="fg"><label class="fl">Permasalahan / Kebutuhan Survei <span style="color:var(--g)">*</span></label>
      <textarea class="fc" id="kv_masalah" rows="4" placeholder="Jelaskan kondisi kebun: daun rontok, tanah padat, irigasi tersumbat, atau rencana ekspansi tanaman baru..."></textarea>
    </div>
    <div class="alert al-in mb4">ℹ️ Setelah formulir dikirim, tim koordinator Hallobun akan menghubungi WhatsApp Anda untuk koordinasi logistik dan pengiriman surat tugas praktisi.</div>
    <button type="button" onclick="submitKunjungan()" class="btn btn-g btn-lg w100">Kirim Permintaan Kunjungan Lahan &rarr;</button>
  </div>
</div></section>
""" + footer("../") + """<script>
function submitKunjungan(){
  var nama=document.getElementById("kv_nama").value;
  var wa=document.getElementById("kv_wa").value;
  var tanggal=document.getElementById("kv_tanggal").value;
  var alamat=document.getElementById("kv_alamat").value;
  var tanaman=document.getElementById("kv_tanaman").value;
  var masalah=document.getElementById("kv_masalah").value;
  if(!nama||!wa||!tanggal||!alamat||!tanaman||!masalah){
    toast("Mohon lengkapi semua isian bertanda bintang (*)","er");
    return;
  }
  toast("Permintaan kunjungan lahan berhasil diajukan! Tim kami akan menghubungi WhatsApp Anda dalam 1x24 jam.","ok");
  setTimeout(function(){window.location.href="dashboard.html";},2000);
}
</script></body></html>"""
write_file("pages/kunjungan.html", kunjungan_pg)

# ══════════════════════════════════════════
# 5. NARSUM.HTML
# ══════════════════════════════════════════
narsum_pg = head("Undang Narasumber Agronom","../") + nav("../","Narsum") + f"""
<div class="ph"><div class="ph-inner">
  <div class="hero-tag"><span class="dot"></span> Pakar &amp; Dosen Agronomi Berpengalaman</div>
  <h1>🎤 Undang Narasumber Pertanian</h1>
  <p>Hadirkan pakar agronomi untuk seminar nasional, workshop komunitas, bimtek poktan, pelatihan CSR perusahaan, atau kuliah umum agribisnis.</p>
</div></div>

<section class="sec"><div class="con">
  <div class="grid g2" style="gap:40px;align-items:start">
    <div>
      <div style="background:#fff;border:1.5px solid var(--s200);border-radius:16px;padding:28px;box-shadow:var(--shd)">
        <h2 style="font-size:20px;font-weight:800;color:var(--s900);margin-bottom:20px">Formulir Undangan Narasumber</h2>
        <div class="fg"><label class="fl">Nama Kegiatan / Acara <span style="color:var(--g)">*</span></label><input type="text" class="fc" id="ns_acara" placeholder="Contoh: Bimtek Pengendalian Hama Padi Se-Kabupaten"></div>
        <div class="fg"><label class="fl">Instansi / Penyelenggara <span style="color:var(--g)">*</span></label><input type="text" class="fc" id="ns_penye" placeholder="Contoh: Dinas Pertanian / Gabungan Kelompok Tani Mandiri"></div>
        <div class="grid g2" style="gap:12px">
          <div class="fg"><label class="fl">Tanggal Acara <span style="color:var(--g)">*</span></label><input type="date" class="fc" id="ns_tanggal" min="2026-10-02"></div>
          <div class="fg"><label class="fl">Format Kegiatan</label>
            <select class="fc" id="ns_format"><option value="offline">Offline / Tatap Muka</option><option value="online">Online / Webinar Zoom</option><option value="hybrid">Hybrid</option></select>
          </div>
        </div>
        <div class="grid g2" style="gap:12px">
          <div class="fg"><label class="fl">Jam Mulai</label><input type="time" class="fc" id="ns_mulai" value="09:00"></div>
          <div class="fg"><label class="fl">Jam Selesai</label><input type="time" class="fc" id="ns_selesai" value="12:00"></div>
        </div>
        <div class="fg"><label class="fl">Lokasi / Tautan Webinar <span style="color:var(--g)">*</span></label><input type="text" class="fc" id="ns_lokasi" placeholder="Alamat gedung / tautan Zoom Meeting"></div>
        <div class="fg"><label class="fl">Tema / Pokok Materi <span style="color:var(--g)">*</span></label><input type="text" class="fc" id="ns_tema" placeholder="Contoh: Penerapan Pengendalian Hama Terpadu (PHT)"></div>
        <div class="fg"><label class="fl">Deskripsi Kebutuhan Acara <span style="color:var(--g)">*</span></label><textarea class="fc" id="ns_desc" rows="3" placeholder="Jelaskan profil peserta, tujuan pelatihan, dan harapan dari narasumber..."></textarea></div>
        <div class="grid g2" style="gap:12px">
          <div class="fg"><label class="fl">Estimasi Jumlah Peserta <span style="color:var(--g)">*</span></label><input type="number" class="fc" id="ns_peserta" min="1" placeholder="75"></div>
          <div class="fg"><label class="fl">Rencana Anggaran (Opsional)</label><input type="number" class="fc" id="ns_budget" min="0" placeholder="Rp 2.500.000"></div>
        </div>
        <div class="fg"><label class="fl">Nama PIC &amp; WhatsApp <span style="color:var(--g)">*</span></label><input type="text" class="fc" id="ns_pic" placeholder="Contoh: Ahmad Wijaya - 0812-xxxx-xxxx"></div>
        <button type="button" onclick="submitNarsum()" class="btn btn-g btn-lg w100">Kirim Permintaan Narasumber &rarr;</button>
      </div>
    </div>

    <div>
      <img src="../images/halobun_real_training.jpg" alt="Narasumber" style="border-radius:16px;width:100%;margin-bottom:20px">
      <div class="card mb4"><div class="card-b">
        <div style="font-weight:800;font-size:15px;margin-bottom:12px">🏷️ Topik Narasumber Unggulan</div>
        <div style="display:flex;flex-wrap:wrap;gap:8px">
          <span class="bdg bdg-g">Pengendalian Hama Terpadu (PHT)</span>
          <span class="bdg bdg-g">Pertanian Organik Bersertifikat</span>
          <span class="bdg bdg-g">Sistem Hidroponik Modern</span>
          <span class="bdg bdg-g">Manajemen Nutrisi Tanaman</span>
          <span class="bdg bdg-g">Budidaya Padi Presisi</span>
          <span class="bdg bdg-g">Agribisnis &amp; Pasar Pangan</span>
          <span class="bdg bdg-g">Urban Farming Pekarangan</span>
        </div>
      </div></div>

      <div class="card mb4"><div class="card-b">
        <div style="font-weight:800;font-size:14px;margin-bottom:12px">💰 Panduan Honorarium Referensi</div>
        <div style="font-size:13px;color:var(--s600);line-height:2">
          <div style="display:flex;justify-content:space-between;border-bottom:1px solid var(--s100);padding-bottom:6px"><span>Webinar Online (1-2 Jam)</span><span class="fw7 tg">Rp 1.000.000</span></div>
          <div style="display:flex;justify-content:space-between;border-bottom:1px solid var(--s100);padding:6px 0"><span>Workshop Half-Day (4 Jam)</span><span class="fw7 tg">Rp 2.500.000</span></div>
          <div style="display:flex;justify-content:space-between;padding-top:6px"><span>Bimtek Full-Day (8 Jam)</span><span class="fw7 tg">Rp 4.000.000</span></div>
        </div>
      </div></div>
    </div>
  </div>
</div></section>
""" + footer("../") + """<script>
function submitNarsum(){
  var acara=document.getElementById("ns_acara").value;
  var penye=document.getElementById("ns_penye").value;
  var tanggal=document.getElementById("ns_tanggal").value;
  var lokasi=document.getElementById("ns_lokasi").value;
  var pic=document.getElementById("ns_pic").value;
  if(!acara||!penye||!tanggal||!lokasi||!pic){
    toast("Mohon lengkapi semua isian wajib (*)","er");
    return;
  }
  toast("Permintaan narasumber berhasil dikirim! Tim kurasi Hallobun akan menghubungi PIC via WhatsApp dalam 1x24 jam.","ok");
}
</script></body></html>"""
write_file("pages/narsum.html", narsum_pg)

# ══════════════════════════════════════════
# 6. SARANA.HTML (Catalog)
# ══════════════════════════════════════════
kat_list = list(dict.fromkeys([p["kategori"] for p in PRODUK]))
kat_opts = "".join(f'<option value="{k.lower()}">{k}</option>' for k in kat_list)

prod_cards = ""
for p in PRODUK:
    btn_wa = f'<a href="https://wa.me/6281234567890?text=Halo%20Hallobun,%20saya%20ingin%20memesan%20produk%20{p["nama"]}" target="_blank" class="btn btn-g btn-sm">Pesan via WA</a>' if p['stok'] > 0 else '<span style="font-size:12px;color:var(--s400)">Habis Sementara</span>'
    prod_cards += f"""<div class="card filterable-card" data-kategori="{p['kategori'].lower()}" data-harga="{p['harga'].replace('.','')}" data-featured="{str(p['featured']).lower()}">
  <img src="../images/{p['img']}" alt="{p['nama']}" style="width:100%;height:180px;object-fit:cover">
  <div class="card-b">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px">
      <span class="bdg bdg-g" style="font-size:11px">{p['kategori']}</span>
      {badge_stok(p['stok'])}
    </div>
    <div style="font-weight:800;font-size:15px;margin-bottom:6px;color:var(--s900)">{p['nama']}</div>
    <p style="font-size:13px;color:var(--s500);margin-bottom:14px;line-height:1.5">{p['deskripsi']}</p>
    <div style="display:flex;justify-content:space-between;align-items:center">
      <div style="font-size:18px;font-weight:900;color:var(--g)">Rp {p['harga']}</div>
      {btn_wa}
    </div>
  </div>
</div>"""

sarana_pg = head("Sarana Pertanian &amp; Kebun","../") + nav("../","Sarana") + f"""
<div class="ph"><div class="ph-inner">
  <div class="hero-tag"><span class="dot"></span> Tersertifikasi &amp; Teruji Ilmiah</div>
  <h1>🌿 Sarana Pertanian &amp; Kebun Terpercaya</h1>
  <p>Katalog benih unggul, pupuk organik cair/granul, nutrisi hidroponik AB Mix, pestisida hayati, dan alat ukur kebun teruji. Pemesanan cepat langsung via WhatsApp CS resmi.</p>
</div></div>
<section class="sec"><div class="con">
  <div style="background:#fff;border:1.5px solid var(--s200);border-radius:14px;padding:16px;margin-bottom:24px;display:flex;gap:12px;flex-wrap:wrap;align-items:center">
    <div style="position:relative;flex:1;min-width:200px">
      <svg style="position:absolute;left:12px;top:50%;transform:translateY(-50%)" width="16" height="16" fill="none" stroke="#9CA3AF" stroke-width="2.2" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
      <input type="text" id="searchCards" class="fc" placeholder="Cari benih, pupuk, alat..." style="padding-left:38px">
    </div>
    <select class="fc" id="filterKat" style="max-width:180px">
      <option value="">Semua Kategori</option>
      {kat_opts}
    </select>
    <select class="fc" id="filterStock" style="max-width:160px">
      <option value="">Semua Status</option>
      <option value="tersedia">Tersedia</option>
      <option value="featured">Produk Unggulan</option>
    </select>
  </div>
  <div class="grid g3" id="prodGrid">{prod_cards}</div>
</div></section>
""" + footer("../") + """<script>
filterCards("searchCards","filterable-card");
document.getElementById("filterKat").addEventListener("change",function(){
  var v=this.value.toLowerCase();
  document.querySelectorAll(".filterable-card").forEach(function(c){
    c.style.display=(!v||c.getAttribute("data-kategori")===v)?"":"none";
  });
});
document.getElementById("filterStock").addEventListener("change",function(){
  var v=this.value.toLowerCase();
  document.querySelectorAll(".filterable-card").forEach(function(c){
    if(!v){c.style.display="";return;}
    var stok=c.querySelector(".sts");
    if(v==="tersedia"){c.style.display=(stok&&stok.textContent.trim()==="Tersedia")?"":"none";}
    else if(v==="featured"){c.style.display=(c.getAttribute("data-featured")==="true")?"":"none";}
  });
});
</script></body></html>"""
write_file("pages/sarana.html", sarana_pg)

# ══════════════════════════════════════════
# 7. MEETING.HTML (Jitsi Simulation)
# ══════════════════════════════════════════
meeting_pg = head("Ruang Konsultasi Jitsi Meet","../") + nav("../") + f"""
<div style="background:var(--s900);min-height:calc(100vh - 66px);padding:32px 24px;color:#fff">
  <div class="con" style="max-width:960px">
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;flex-wrap:wrap;gap:12px">
      <div>
        <div class="bdg" style="background:rgba(74,222,128,.15);color:#4ADE80;border-color:rgba(74,222,128,.3);margin-bottom:8px"><span class="dot" style="background:#4ADE80"></span> Sesi Konsultasi Aktif</div>
        <div style="font-size:22px;font-weight:800">Ruang Tatap Muka: Penyakit &amp; Hama Tanaman</div>
        <div style="color:rgba(255,255,255,.6);font-size:14px">Dr. Budi Santoso, M.Si &bull; Durasi Sesi: 60 Menit</div>
      </div>
      <div style="display:flex;gap:8px">
        <button onclick="copyText('https://meet.jit.si/hallobun-session-live')" class="btn btn-sm" style="background:rgba(255,255,255,.1);color:#fff;border:1px solid rgba(255,255,255,.2)">🔗 Salin Tautan</button>
        <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-sm" style="background:#25D366;color:#fff;border:none">💬 Hubungi CS</a>
      </div>
    </div>

    <div class="meet-wrap mb6">
      <iframe src="https://meet.jit.si/hallobun-demo-session-online" allow="camera; microphone; fullscreen; display-capture; autoplay" style="width:100%;height:100%;border:none;position:absolute;inset:0"></iframe>
      <div style="position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center;z-index:1;background:rgba(0,0,0,.7);border-radius:16px">
        <div style="font-size:48px;margin-bottom:16px">🎥</div>
        <div style="font-size:18px;font-weight:800;margin-bottom:8px">Ruang Konsultasi Jitsi Meet Siap</div>
        <p style="color:rgba(255,255,255,.6);text-align:center;max-width:420px;font-size:14px;margin-bottom:24px">Pastikan mikrofon dan kamera diizinkan oleh browser Anda untuk mulai berdialog langsung dengan praktisi agronom.</p>
        <a href="https://meet.jit.si/hallobun-session-live" target="_blank" class="btn btn-g btn-lg">🚀 Gabung Sekarang di Tab Penuh</a>
      </div>
    </div>

    <div class="grid g3" style="gap:16px">
      <div style="background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);border-radius:12px;padding:16px">
        <div style="font-weight:700;margin-bottom:8px;color:rgba(255,255,255,.9)">📝 Catatan Hasil Sesi</div>
        <textarea style="width:100%;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.15);border-radius:8px;padding:10px;color:#fff;font-size:13px;resize:vertical;outline:none;font-family:inherit" rows="5" placeholder="Tuliskan resep pupuk atau saran penanganan praktisi di sini..."></textarea>
      </div>
      <div style="background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);border-radius:12px;padding:16px">
        <div style="font-weight:700;margin-bottom:8px;color:rgba(255,255,255,.9)">👨‍⚕️ Data Praktisi</div>
        <div style="font-size:13px;color:rgba(255,255,255,.6);line-height:2">
          <div><strong style="color:#fff">Dr. Budi Santoso, M.Si</strong></div>
          <div>Spesialisasi: Hama Tanaman</div>
          <div>Status: <span style="color:#4ADE80">Tersambung</span></div>
          <div>Sisa Waktu Sesi: <strong style="color:#4ADE80" id="countdown">58:45</strong></div>
        </div>
      </div>
      <div style="background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);border-radius:12px;padding:16px">
        <div style="font-weight:700;margin-bottom:8px;color:rgba(255,255,255,.9)">💡 Panduan Video Call</div>
        <ul style="list-style:none;font-size:12.5px;color:rgba(255,255,255,.6);line-height:2">
          <li>📷 Arahkan kamera ke bagian daun/tanaman sakit</li>
          <li>💡 Pastikan koneksi internet stabil &ge; 2 Mbps</li>
          <li>📝 Catat dosis pupuk yang diresepkan</li>
        </ul>
      </div>
    </div>
  </div>
</div>
""" + footer("../") + """<script>
var t=58*60+45;
var timer=setInterval(function(){
  t--;
  if(t<=0){clearInterval(timer);document.getElementById("countdown").textContent="Selesai";return;}
  var m=Math.floor(t/60);var s=t%60;
  document.getElementById("countdown").textContent=(m<10?"0":"")+m+":"+(s<10?"0":"")+s;
},1000);
</script></body></html>"""
write_file("pages/meeting.html", meeting_pg)

print("Services and interactive pages generated successfully.")
