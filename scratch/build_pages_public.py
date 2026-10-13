import os, sys
sys.path.append("/Users/as-saifi/Downloads/hallobun/scratch")
from data import HARGA_PANGAN, GEJALA_MANDIRI, BERITA, TESTIMONIALS, KONSULTANS, PRODUK, LAYANAN
from templates import head, nav, footer, adm_sidebar, adm_top

BASE = "/Users/as-saifi/Downloads/hallobun-static"
os.makedirs(f"{BASE}/pages", exist_ok=True)

def write_file(rel_path, content):
    path = os.path.join(BASE, rel_path)
    os.makedirs(os.path.dirname(path), exist_ok=True)
    with open(path, "w", encoding="utf-8") as f:
        f.write(content)
    print(f"  ✓ {rel_path} ({len(content)} bytes)")

def trend_icon(t):
    return {"up":"▲","down":"▼","stable":"●"}.get(t,"●")
def trend_color(t):
    return {"up":"#16A34A","down":"#EF4444","stable":"#6B7280"}.get(t,"#6B7280")
def badge_stok(stok):
    if stok == 0:
        return '<span class="sts sts-x">Habis</span>'
    elif stok <= 10:
        return f'<span class="sts sts-p">Stok {stok}</span>'
    return '<span class="sts sts-c">Tersedia</span>'

# ══════════════════════════════════════════
# 1. INDEX.HTML (BERANDA)
# ══════════════════════════════════════════
slides = [
    ("halobun_real_practitioner.jpg","Praktisi agronom bersertifikasi IPB & UGM"),
    ("halobun_real_hydroponics.jpg","Solusi hidroponik modern & nutrisi presisi"),
    ("halobun_real_pest_control.jpg","Pengendalian hama & diagnosa penyakit daun"),
    ("halobun_real_livestock.jpg","Pertanian & peternakan sirkular terpadu"),
    ("halobun_real_training.jpg","Pelatihan & bimtek kelompok tani nusantara"),
]
slide_html = "".join(f'<div class="s-slide"><img src="images/{s[0]}" alt="{s[1]}"></div>' for s in slides)
dot_html = "".join(f'<button class="s-dot{" active" if i==0 else ""}" aria-label="Slide {i+1}"></button>' for i,_ in enumerate(slides))

svcs = [
    ("💬","Konsultasi Online","Sesi 1-on-1 via video call dengan pakar agronomi bersertifikasi.","pages/konsultasi.html","Pilih Praktisi"),
    ("🎤","Undang Narasumber","Hadirkan pakar untuk seminar, penyuluhan, atau workshop komunitas.","pages/narsum.html","Undang Sekarang"),
    ("🚜","Kunjungan Offline","Tim ahli kami siap datang langsung ke kebun atau lahan Anda.","pages/kunjungan.html","Jadwalkan Kunjungan"),
    ("🌿","Sarana Pertanian","Bibit unggul, pupuk organik, nutrisi tanaman & alat kebun berkualitas.","pages/sarana.html","Lihat Katalog")
]
svc_cards = "".join(f"""<div class="card"><div class="card-b" style="text-align:center">
  <div style="font-size:40px;margin-bottom:14px">{s[0]}</div>
  <div style="font-weight:800;font-size:16px;margin-bottom:8px;color:var(--s900)">{s[1]}</div>
  <p style="font-size:13.5px;color:var(--s500);line-height:1.6;margin-bottom:18px">{s[2]}</p>
  <a href="{s[3]}" class="btn btn-g btn-sm">{s[4]}</a>
</div></div>""" for s in svcs)

harga_items = ""
for h in HARGA_PANGAN:
    tc = trend_color(h["trend"])
    ti = trend_icon(h["trend"])
    harga_items += f"""<div class="harga-card">
  <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px">
    <span style="font-size:26px">{h['icon']}</span>
    <span style="font-size:12px;font-weight:700;color:{tc}">{ti} {h['perubahan']}</span>
  </div>
  <div style="font-weight:800;font-size:14px;color:var(--s900);margin-bottom:2px">{h['komoditas']}</div>
  <div style="font-size:11px;color:var(--s400);margin-bottom:8px">{h['kategori']} · {h['wilayah']}</div>
  <div style="font-size:20px;font-weight:900;color:var(--g)">Rp {h['harga']}<span style="font-size:12px;font-weight:500;color:var(--s400)">/{h['satuan']}</span></div>
  <div style="font-size:10.5px;color:var(--s400);margin-top:4px">🕐 {h['update']}</div>
</div>"""

# Cek Gejala Mandiri
gejala_btns = ""
gejala_results = ""
for idx, g in enumerate(GEJALA_MANDIRI):
    act = " active" if idx == 0 else ""
    shw = " show" if idx == 0 else ""
    gejala_btns += f"""<button class="gejala-btn{act}" onclick="selectGejala('{g['id']}', this)">
  <span style="font-size:24px">{g['icon']}</span>
  <div>
    <div style="font-weight:700;font-size:14px;color:var(--s900)">{g['gejala']}</div>
    <div style="font-size:11.5px;color:var(--s500)">Contoh: {g['tanaman']}</div>
  </div>
</button>"""
    gejala_results += f"""<div class="gejala-res{shw}" id="res-{g['id']}">
  <div style="display:flex;align-items:center;gap:10px;margin-bottom:12px">
    <span style="font-size:28px">{g['icon']}</span>
    <div>
      <div style="font-size:16px;font-weight:800;color:var(--s900)">Hasil Diagnosa Cepat: {g['gejala']}</div>
      <div style="font-size:12px;color:var(--s500)">Komoditas rentan: {g['tanaman']}</div>
    </div>
  </div>
  <div style="background:#fff;border-radius:10px;padding:16px;border:1px solid var(--s200);margin-bottom:14px">
    <div style="font-size:12px;font-weight:700;color:var(--s400);text-transform:uppercase;letter-spacing:.5px;margin-bottom:4px">Kemungkinan Penyebab</div>
    <p style="font-size:14px;color:var(--s700);line-height:1.6">{g['penyebab']}</p>
  </div>
  <div style="background:#fff;border-radius:10px;padding:16px;border:1px solid var(--s200);margin-bottom:18px">
    <div style="font-size:12px;font-weight:700;color:var(--g);text-transform:uppercase;letter-spacing:.5px;margin-bottom:4px">Rekomendasi Tindakan Awal</div>
    <p style="font-size:14px;color:var(--s700);line-height:1.6">{g['solusi']}</p>
  </div>
  <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;padding-top:8px">
    <div style="font-size:13px;color:var(--s600)">Rekomendasi praktisi: <strong>{g['rekomendasi_ahli']}</strong></div>
    <a href="pages/konsultasi.html" class="btn btn-g btn-sm">Konsultasikan Langsung →</a>
  </div>
</div>"""

pk_cards = ""
for p in KONSULTANS[:3]:
    pk_cards += f"""<div class="pk-card">
  <img src="images/{p['img']}" alt="{p['name']}">
  <div class="pk-b">
    <div class="pk-name">{p['name']}</div>
    <div class="pk-spec">🌿 {p['spesialisasi']} · {p['pengalaman']}</div>
    <div class="pk-ft">
      <div class="price">Rp {p['harga']}<span>/sesi</span></div>
      <div class="rating"><span class="star">⭐</span> {p['rating']} ({p['sesi']} sesi)</div>
    </div>
    <a href="pages/konsultan-{p['id']}.html" class="btn btn-g w100 mt4" style="justify-content:center">Lihat Profil & Booking</a>
  </div>
</div>"""

prod_featured = ""
for p in PRODUK[:4]:
    prod_featured += f"""<div class="card">
  <img src="images/{p['img']}" alt="{p['nama']}" style="width:100%;height:170px;object-fit:cover">
  <div class="card-b">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px">
      <span class="bdg bdg-g" style="font-size:11px">{p['kategori']}</span>
      {badge_stok(p['stok'])}
    </div>
    <div style="font-weight:800;font-size:14px;margin-bottom:4px;color:var(--s900)">{p['nama']}</div>
    <p style="font-size:12.5px;color:var(--s500);margin-bottom:12px;line-height:1.5">{p['deskripsi'][:60]}...</p>
    <div style="display:flex;justify-content:space-between;align-items:center">
      <div style="font-size:16px;font-weight:800;color:var(--g)">Rp {p['harga']}</div>
      <a href="https://wa.me/6281234567890?text=Halo, saya ingin memesan {p['nama']}" target="_blank" class="btn btn-g btn-sm">Pesan WA</a>
    </div>
  </div>
</div>"""

berita_cards = ""
for b in BERITA:
    berita_cards += f"""<div class="berita-card">
  <img src="images/{b['img']}" alt="{b['title']}">
  <div style="padding:18px">
    <span style="display:inline-block;background:{b['color']}22;color:{b['color']};font-size:11px;font-weight:700;padding:3px 10px;border-radius:9999px;margin-bottom:10px">{b['tag']}</span>
    <div style="font-weight:800;font-size:15px;line-height:1.4;color:var(--s900);margin-bottom:8px">{b['title']}</div>
    <p style="font-size:13px;color:var(--s500);line-height:1.6;margin-bottom:12px">{b['excerpt']}</p>
    <div style="display:flex;justify-content:space-between;font-size:11px;color:var(--s400)">
      <span>✍️ {b['author']}</span><span>{b['date']} · {b['read_time']}</span>
    </div>
  </div>
</div>"""

testi_cards = ""
for t in TESTIMONIALS:
    s = "⭐" * t["rating"]
    testi_cards += f"""<div class="testi-card">
  <div style="font-size:24px;margin-bottom:12px">{s}</div>
  <p style="font-size:14px;color:var(--s700);line-height:1.7;margin-bottom:16px">"{t['comment']}"</p>
  <div style="display:flex;align-items:center;gap:12px">
    <div style="width:40px;height:40px;border-radius:50%;background:var(--gl);display:flex;align-items:center;justify-content:center;font-size:20px">{t['avatar']}</div>
    <div><div style="font-weight:700;font-size:14px;color:var(--s900)">{t['name']}</div>
    <div style="font-size:12px;color:var(--s400)">{t['role']}</div></div>
  </div>
</div>"""

index_content = head("Solusi Perawatan Kebun & Pertanian Terlengkap","") + nav("","Beranda") + f"""
<section class="hero">
  <div class="hero-in">
    <div>
      <div class="hero-tag"><span class="dot"></span> Tele-Agronomi &amp; Layanan Kebun #1 Indonesia</div>
      <h1>Solusi Perawatan Kebun &amp; Pertanian<br><span>Terlengkap di Tanganmu</span></h1>
      <p class="hero-lead">Bimbingan langsung bersama praktisi perkebunan &amp; agronomis terpercaya, beli nutrisi &amp; bibit unggul, hingga booking kunjungan lapangan langsung ke kebun Anda. Praktis, ilmiah, dan ramah pemula.</p>
      
      <div class="hero-search">
        <svg width="18" height="18" fill="none" stroke="#9CA3AF" stroke-width="2.2" viewBox="0 0 24 24" style="flex-shrink:0;margin-left:8px"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        <input type="text" placeholder="Cari praktisi kebun, agronomis, hama kutu kebul, pupuk NPK..." id="heroSearch">
        <a href="pages/konsultasi.html" class="btn btn-g btn-sm">Cari Solusi</a>
      </div>
      
      <div class="hero-chips">
        <span class="lbl">Populer:</span>
        <a href="pages/konsultasi.html" class="chip">🐛 Kutu Putih</a>
        <a href="pages/konsultasi.html" class="chip">🍂 Daun Kuning</a>
        <a href="pages/sarana.html" class="chip">🌱 Pupuk Organik</a>
        <a href="pages/konsultasi.html" class="chip">🥬 Hidroponik</a>
        <a href="pages/konsultasi.html" class="chip">🌾 Padi</a>
      </div>
      
      <div class="hero-trust">
        <div class="trust-it"><span class="chk">✓</span> Respon Cepat &lt;5 Menit</div>
        <div class="trust-it"><span class="chk">✓</span> 150+ Praktisi Berpengalaman</div>
        <div class="trust-it"><span class="chk">✓</span> Bayar QRIS / Transfer</div>
      </div>
    </div>
    
    <div class="slider" id="heroSlider">
      <div class="s-track">{slide_html}</div>
      <button class="s-btn prev">&#8592;</button>
      <button class="s-btn next">&#8594;</button>
      <div class="s-dots">{dot_html}</div>
    </div>
  </div>
</section>

<!-- Trust Metric Bar -->
<section class="sec-sm" style="background:var(--s50);border-bottom:1px solid var(--s200)">
  <div class="con"><div class="grid g4" style="text-align:center">
    <div><div style="font-size:32px;font-weight:900;color:var(--g)">500+</div><div class="tsm" style="color:var(--s500)">Pekebun Terbantu</div></div>
    <div><div style="font-size:32px;font-weight:900;color:var(--g)">6</div><div class="tsm" style="color:var(--s500)">Praktisi Bersertifikasi</div></div>
    <div><div style="font-size:32px;font-weight:900;color:var(--g)">4.9⭐</div><div class="tsm" style="color:var(--s500)">Rating Rata-rata</div></div>
    <div><div style="font-size:32px;font-weight:900;color:var(--g)">24/7</div><div class="tsm" style="color:var(--s500)">Dukungan WhatsApp</div></div>
  </div></div>
</section>

<!-- Layanan Cards -->
<section class="sec"><div class="con">
  <div class="sec-hd"><div class="sec-ttl">Layanan Unggulan Hallobun</div>
  <p class="sec-sub" style="margin:0 auto">Solusi terintegrasi dari bimbingan online hingga sarana tanam berkualitas.</p></div>
  <div class="grid g4">{svc_cards}</div>
  <div class="tc mt8"><a href="pages/layanan.html" class="btn btn-o btn-lg">Lihat Semua 7 Layanan Kami →</a></div>
</div></section>

<!-- CEK GEJALA MANDIRI (Symptom Triage) -->
<section class="sec" style="background:#FAFBF9;border-top:1px solid var(--s200);border-bottom:1px solid var(--s200)"><div class="con">
  <div class="sec-hd">
    <div style="display:inline-flex;align-items:center;gap:6px;background:var(--gl);border:1px solid var(--g100);padding:4px 14px;border-radius:9999px;font-size:12px;font-weight:700;color:var(--g);margin-bottom:10px">
      🩺 Fitur Cek Mandiri
    </div>
    <div class="sec-ttl">Diagnosa Gejala Masalah Tanaman</div>
    <p class="sec-sub" style="margin:0 auto">Pilih gejala yang dialami tanaman Anda untuk mendapatkan diagnosa awal ilmiah dan solusi tepat.</p>
  </div>
  <div class="grid g2" style="gap:32px;align-items:start">
    <div style="display:flex;flex-direction:column;gap:12px">{gejala_btns}</div>
    <div>{gejala_results}</div>
  </div>
</div></section>

<!-- HARGA PANGAN TERKINI -->
<section class="sec-sm" style="background:var(--s50);border-bottom:1px solid var(--s200)">
  <div class="con">
    <div class="sec-hd"><div style="display:flex;align-items:center;gap:10px;justify-content:center;margin-bottom:6px"><span style="font-size:22px">📊</span><div class="sec-ttl" style="margin-bottom:0">Harga Pangan &amp; Komoditas Terkini</div></div>
    <p class="sec-sub" style="margin:0 auto">Pantau pergerakan harga pasar hortikultura &amp; pangan rata-rata nasional hari ini.</p></div>
    <div class="grid g3">{harga_items}</div>
  </div>
</section>

<!-- PRAKTISI UNGGULAN -->
<section class="sec"><div class="con">
  <div class="sec-hd"><div class="sec-ttl">Praktisi Agronom Berlisensi</div>
  <p class="sec-sub" style="margin:0 auto">Konsultasi 1-on-1 via video call interaktif Jitsi Meet kapanpun Anda butuhkan.</p></div>
  <div class="grid g3">{pk_cards}</div>
  <div class="tc mt8"><a href="pages/konsultasi.html" class="btn btn-g btn-lg">Lihat Semua Konsultan Online →</a></div>
</div></section>

<!-- TOKO SARANA -->
<section class="sec" style="background:var(--s50);border-top:1px solid var(--s200)"><div class="con">
  <div class="sec-hd"><div class="sec-ttl">🌿 Sarana &amp; Nutrisi Kebun Teruji</div>
  <p class="sec-sub" style="margin:0 auto">Produk pertanian organik terpercaya untuk hasil panen optimal.</p></div>
  <div class="grid g4">{prod_featured}</div>
  <div class="tc mt8"><a href="pages/sarana.html" class="btn btn-o btn-lg">Buka Katalog Sarana Lengkap →</a></div>
</div></section>

<!-- BERITA & EDUKASI -->
<section class="sec"><div class="con">
  <div class="sec-hd"><div class="sec-ttl">📰 Edukasi &amp; Berita Pertanian</div>
  <p class="sec-sub" style="margin:0 auto">Tips praktis dari praktisi berpengalaman untuk merawat tanaman Anda.</p></div>
  <div class="grid g3">{berita_cards}</div>
</div></section>

<!-- TESTIMONIAL -->
<section class="sec" style="background:var(--s50);border-top:1px solid var(--s200)"><div class="con">
  <div class="sec-hd"><div class="sec-ttl">💬 Dipercaya 500+ Pekebun &amp; Petani</div>
  <p class="sec-sub" style="margin:0 auto">Ulasan nyata dari pengguna layanan konsultasi dan kunjungan Hallobun.</p></div>
  <div class="grid g3">{testi_cards}</div>
</div></section>

<!-- CTA -->
<section class="sec-sm" style="background:linear-gradient(135deg,var(--gx),var(--g));color:#fff"><div class="con tc">
  <div style="font-size:30px;font-weight:900;margin-bottom:10px">🌱 Tanaman Anda Bermasalah? Konsultasikan Sekarang</div>
  <p style="opacity:.85;margin-bottom:28px;font-size:15px;max-width:540px;margin-left:auto;margin-right:auto">Dapatkan solusi cepat dan tepat dari praktisi agronom terpercaya. Tanpa antre, langsung dari gadget Anda.</p>
  <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap">
    <a href="pages/konsultasi.html" class="btn btn-w btn-lg">Pilih Praktisi &amp; Booking</a>
    <a href="https://wa.me/6281234567890?text=Halo%20Hallobun,%20saya%20ingin%20tanya%20seputar%20layanan" target="_blank" class="btn btn-lg" style="background:rgba(255,255,255,.15);color:#fff;border:1.5px solid rgba(255,255,255,.4)">Tanya CS via WhatsApp</a>
  </div>
</div></section>
""" + footer("") + """<script>
initSlider("heroSlider");
var hs=document.getElementById("heroSearch");
if(hs){
  hs.addEventListener("keydown",function(e){if(e.key==="Enter"){window.location="pages/konsultasi.html?q="+encodeURIComponent(this.value);}});
}
</script></body></html>"""

write_file("index.html", index_content)
print("Index.html generated successfully.")
